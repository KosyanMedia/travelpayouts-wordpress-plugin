<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 11:52
 */
namespace app\includes\models\site\shortcodes;
use \app\includes\models\site\TPFlightShortcodeModel;
class TPPopularDestinationsAirlinesShortcodeModel extends TPFlightShortcodeModel{
    /**
     * @param array $args
     * @return array|bool
     * @var $NUMBER 10
     */
    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array(
            'airline' => false,
            'limit' => \app\includes\TPPlugin::$options['shortcodes']['10']['limit'],
            'title' => '',
            'paginate' => true,
            'off_title' => '',
            'subid' => '',
            'return_url' => false,
            'widget' => 0,
            'host' => ''
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if ($return_url == 1){
            $return_url = true;
        }
        $attr =  array(
            'airline' => $airline,
            'limit' => $limit,
            'return_url' => $return_url
        );
        //8. Популярные направления авиакомпании
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 8. Популярные направления авиакомпании ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if($this->cacheSecund() && $return_url == false) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} cache");
            if (false === ($return = get_transient($this->cacheKey('10',
                    $airline, $widget)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false");
                $return = self::$TPRequestApi->get_popular($attr);
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false ".print_r($return, true));
                //if( ! $return )
                //    return false;
                //$rows = array();
                $cacheSecund = 0;
                if( ! $return ) {
                    $return = array();
                    $cacheSecund = $this->cacheEmptySecund();
                } else {
                    $return = $this->iataAutocomplete($return, 10);
                    $cacheSecund = $this->cacheSecund();
                }
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache secund = ".$cacheSecund);

                set_transient( $this->cacheKey('10',
                    $airline, $widget) , $return, $cacheSecund);
            }
        }else{
            $return = self::$TPRequestApi->get_popular($attr);
            if( ! $return )
                return false;
            if ($return_url == false) {
                $return = $this->iataAutocomplete($return, 10);
            }
        }
        if(TPOPlUGIN_ERROR_LOG)
            error_log("{$method} rows = ".print_r($return, true));
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        return array(
            'rows' => $return,
            'type' => 10,
            'airline' => $this->iataAutocomplete($airline, 0 , 'airline'),
            'title' => $title,
            'paginate' => $paginate,
            'off_title' => $off_title,
            'subid' => $subid,
            'return_url' => $return_url,
            'host' => $host
        );
    }
}

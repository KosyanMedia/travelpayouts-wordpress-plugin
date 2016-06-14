<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 11:52
 */
namespace app\includes\models\site\shortcodes;
class TPPopularDestinationsAirlinesShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array(
            'airline' => false,
            'limit' => \app\includes\TPPlugin::$options['shortcodes']['10']['limit'],
            'title' => '',
            'paginate' => true,
            'off_title' => '',
            'subid' => ''
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $attr =  array( 'airline' => $airline,
            'limit' => $limit );
        //8. Популярные направления авиакомпании
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 8. Популярные направления авиакомпании ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if($this->cacheSecund()) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} cache");
            if (false === ($return = get_transient($this->cacheKey('10',
                    $airline)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false");
                $return = \app\includes\TPPlugin::$TPRequestApi->get_popular($attr);
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
                    $airline) , $return, $cacheSecund);
            }
        }else{
            $return = \app\includes\TPPlugin::$TPRequestApi->get_popular($attr);
            if( ! $return )
                return false;
            $return = $this->iataAutocomplete($return, 10);
        }
        if(TPOPlUGIN_ERROR_LOG)
            error_log("{$method} rows = ".print_r($return, true));
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        return array('rows' => $return, 'type' => 10, 'airline' => $this->iataAutocomplete($airline, 0 , 'airline'),
            'title' => $title, 'paginate' => $paginate, 'off_title' => $off_title, 'subid' => $subid);
    }
}
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

        if($this->cacheSecund()) {
            if (false === ($return = get_transient($this->cacheKey('10',
                    $airline)))) {
                $return = \app\includes\TPPlugin::$TPRequestApi->get_popular($attr);
                if( ! $return )
                    return false;
                $return = $this->iataAutocomplete($return, 10);
                set_transient( $this->cacheKey('10',
                    $airline) , $return, $this->cacheSecund());
            }
        }else{
            $return = \app\includes\TPPlugin::$TPRequestApi->get_popular($attr);
            if( ! $return )
                return false;
            $return = $this->iataAutocomplete($return, 10);
        }
        return array('rows' => $return, 'type' => 10, 'airline' => $this->iataAutocomplete($airline, 0 , 'airline'),
            'title' => $title, 'paginate' => $paginate, 'off_title' => $off_title, 'subid' => $subid);
    }
}
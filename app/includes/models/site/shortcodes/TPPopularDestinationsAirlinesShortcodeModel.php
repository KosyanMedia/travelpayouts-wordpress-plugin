<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 11:52
 */

class TPPopularDestinationsAirlinesShortcodeModel extends TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array( 'airline' => false, 'limit' => false, 'title' => '');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $attr =  array( 'airline' => $airline,
            'limit' => $limit );
        if($this->cacheSecund()) {
            if (false === ($return = get_transient($this->cacheKey('tpPopularDestinationsAirlinesShortcodes',
                    $airline)))) {
                $return = TPPlugin::$TPRequestApi->get_popular($attr);
                if( ! $return )
                    return false;
                set_transient( $this->cacheKey('tpPopularDestinationsAirlinesShortcodes',
                    $airline) , $return, $this->cacheSecund());
            }
        }else{
            $return = TPPlugin::$TPRequestApi->get_popular($attr);
            if( ! $return )
                return false;
        }
        return array('rows' => $return, 'type' => 10, 'airline' => $airline,
            'title' => $title);
    }
}
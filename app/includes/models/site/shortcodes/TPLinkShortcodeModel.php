<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 02.10.15
 * Time: 8:32
 */

namespace app\includes\models\site\shortcodes;


class TPLinkShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'text_link' => '',
            'origin_date' => 1,
            'destination_date' => 12,
            'one_way' => false,
            'hotel_id' => false,
            'check_in' => 1,
            'check_out' => 12,
            'type' => 0,
            'subid' => '',
            'return_url' => false,
            'widget' => 0
            );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." Link ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        return  array(
            'origin' => $origin,
            'destination' => $destination,
            'text_link' => $text_link,
            'origin_date' => $origin_date,
            'destination_date' => $destination_date,
            'one_way' => $one_way,
            'hotel_id' => $hotel_id,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'type' => $type,
            'subid' => $subid,
            'return_url' => $return_url
        );
    }
}
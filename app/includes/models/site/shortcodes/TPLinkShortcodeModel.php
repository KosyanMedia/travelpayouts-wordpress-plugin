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
            'subid' => ''
            );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

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
            'subid' => $subid
        );
    }
}
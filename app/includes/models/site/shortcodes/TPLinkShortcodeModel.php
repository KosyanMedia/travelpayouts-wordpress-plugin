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
        $defaults = array( 'origin' => false, 'destination' => false);
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $output = '';
        switch($type){
            case 1:
                error_log(2);
                break;
            case 2:
                error_log(1);
                break;
        }
        return $output;
    }
}
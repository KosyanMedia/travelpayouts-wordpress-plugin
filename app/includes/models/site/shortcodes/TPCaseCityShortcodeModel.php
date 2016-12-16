<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 16.12.16
 * Time: 7:55 PM
 */

namespace app\includes\models\site\shortcodes;

//app\includes\models\site\shortcodes
class TPCaseCityShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel
{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array(
            'iata' => false,
            'case' => 'ro',
        );

        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        var_dump($iata);
        var_dump($case);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 16.12.16
 * Time: 7:55 PM
 */

namespace app\includes\models\site\shortcodes;

use \app\includes\common\TPAutocompleteReplace;

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
        if(empty($iata) || $iata == false) return false;
        return TPAutocompleteReplace::replaceIataCase($iata, $case);

    }
}
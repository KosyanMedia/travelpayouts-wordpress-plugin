<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 22.03.17
 * Time: 12:58 PM
 */

namespace app\includes\views\site\shortcodes;


class TPHotelShortcodeView extends TPShortcodeView
{
    public function renderTable($args = array()) {
        $defaults = array(
            'rows' => array(),
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $html = '';
        $html .= 'hello world';
        return $html;
    }
}
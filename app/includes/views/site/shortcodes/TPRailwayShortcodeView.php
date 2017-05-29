<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.05.17
 * Time: 22:58
 */

namespace app\includes\views\site\shortcodes;


class TPRailwayShortcodeView {
	public function renderTable($args = array()) {
		return var_dump("<pre>", $args, "</pre>");
	}
}
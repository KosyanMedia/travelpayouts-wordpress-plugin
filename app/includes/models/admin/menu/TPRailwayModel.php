<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 24.05.17
 * Time: 14:29
 */

namespace app\includes\models\admin\menu;


class TPRailwayModel extends TPBaseShortcodeOptionModel {

	public function create_option() {
		// TODO: Implement create_option() method.
		register_setting(
			'TPRailway',
			TPOPlUGIN_OPTION_NAME,
			array(&$this,'save_option')
		);
		$field = new TPFieldRailway();
	}
}
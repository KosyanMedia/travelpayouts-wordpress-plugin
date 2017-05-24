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

		add_settings_section( 'tp_settings_railway_themes_table_id', '', '', 'tp_settings_railway_themes_table' );
		add_settings_field('tp_railway_themes_table_td', '', array(&$field ,'TPFieldThemesTable'),
			'tp_settings_railway_themes_table', 'tp_settings_railway_themes_table_id' );
	}
}
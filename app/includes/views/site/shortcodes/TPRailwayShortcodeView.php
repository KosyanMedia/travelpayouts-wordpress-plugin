<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.05.17
 * Time: 22:58
 */

namespace app\includes\views\site\shortcodes;


use app\includes\common\TPLang;
use app\includes\TPPlugin;

class TPRailwayShortcodeView {

	public function __construct()
	{

	}

	public function renderTable($args = array()) {
		$defaults = array(
			'rows' => array(),
			'origin' => '',
			'destination' => '',
			'title' => '',
			'paginate' => 'false',
			'off_title' => '',
			'subid' => '',
			'currency' => TPPlugin::$options['local']['currency'],
			'return_url' => false,
			'language' => TPLang::getLang(),
			'shortcode' => false
		);
		extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
		$html = '';
		if ($shortcode == false) return false;
		if (count($rows) < 1 || $rows == false) return $this->renderViewIfEmptyTable();

		return var_dump("<pre>", $args, "</pre>");
	}

	public function renderViewIfEmptyTable(){
		return '';
	}
}
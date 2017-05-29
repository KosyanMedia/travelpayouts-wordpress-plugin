<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.05.17
 * Time: 22:47
 */

namespace app\includes\models\site;


use app\includes\common\TPRequestApiRailway;

abstract class TPRailwayShortcodeModel extends TPShortcodesChacheModel{
	protected static $TPRequestApi;
	public function __construct()
	{
		parent::__construct();
		//error_log('TPTableShortcodeModel');
		self::$TPRequestApi = TPRequestApiRailway::getInstance();
		//error_log(print_r(get_class_methods(self::$TPRequestApi), true));
	}
}
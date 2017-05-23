<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 23.05.17
 * Time: 14:03
 */

namespace app\includes\common;


class TPRequestApiRailway extends TPRequestApi{

	private static $instance = null;

	public static function getInstance()
	{
		// TODO: Implement getInstance() method.
		if (null === self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}
<?php
/*
Plugin Name: Travelpayouts
Plugin URI: https://wordpress.org/plugins/travelpayouts/
Description: Earn money and make your visitors happy! Offer them useful tools to find cheap flights and hotels. Earn on commission for each booking.
Version: 0.2
Author: travelpayouts
Author URI: http://www.travelpayouts.com/?locale=en
License: GPL2
*/
require_once dirname(__FILE__) . '/TPO.config.php';
require_once dirname(__FILE__) . '/core/TPOAutoload.php';
require_once dirname(__FILE__).'/app/includes/TPPlugin.php';
register_activation_hook( __FILE__, array('app\includes\TPPlugin' ,  'activation' ) );
register_deactivation_hook( __FILE__, array('app\includes\TPPlugin' ,  'deactivation' ) );
register_uninstall_hook( __FILE__, array('app\includes\TPPlugin' ,  'uninstall' ) );

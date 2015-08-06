<?php
/*
Plugin Name: Travelpayouts
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Монетизация туристического трафика с помощью инструментов TravelPayouts.
Version: 1.0
Author: kpdmedia
Author URI: http://kpdmedia.com/
License: A "Slug" license name e.g. GPL2
*/
require_once __DIR__ . '/kpd.config.php';
require_once __DIR__ . '/core/KPDAutoload.php';
require_once __DIR__ . '/app/includes/TPPlugin.php';
register_activation_hook( __FILE__, array('TPPlugin' ,  'activation' ) );
register_deactivation_hook( __FILE__, array('TPPlugin' ,  'deactivation' ) );
register_uninstall_hook( __FILE__, array('TPPlugin' ,  'uninstall' ) );
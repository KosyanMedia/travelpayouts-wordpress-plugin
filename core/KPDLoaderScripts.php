<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 19:33
 */

abstract class KPDLoaderScripts{
    public function __construct(){
        if ( is_admin() ) :
            add_action('admin_head', array(&$this, 'headScript'));
            add_action('admin_enqueue_scripts', array(&$this, 'loadScript' ) );
        else:
            add_action('wp_head', array(&$this, 'headScript'));
            add_action( 'wp_enqueue_scripts', array(&$this, 'loadScript' ) );
        endif;
    }
    abstract public function loadScript($hook);
    abstract public function headScript();
}
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
            add_action('admin_enqueue_scripts', array(&$this, 'loadScriptAdmin' ) );
            add_action('admin_head', array(&$this, 'headScriptAdmin'));
        else:
            add_action( 'wp_enqueue_scripts', array(&$this, 'loadScriptSite' ) );
            add_action('wp_head', array(&$this, 'headScriptSite'));
        endif;
    }
    abstract public function loadScriptAdmin($hook);
    abstract public function headScriptAdmin();
    abstract public function loadScriptSite($hook);
    abstract public function headScriptSite();
}
<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 19:33
 */
namespace core;
abstract class TPOLoaderScripts{
    public function __construct(){
        if ( is_admin() ) :
            add_action('admin_enqueue_scripts', array(&$this, 'loadScriptAdmin' ) );
            add_action('admin_head', array(&$this, 'headScriptAdmin'));
            add_action('customize_controls_print_scripts', array(&$this, 'headScriptAdmin'));
        else:
            add_action( 'wp_enqueue_scripts', array(&$this, 'loadScriptSite' ) );
            add_action('wp_head', array(&$this, 'headScriptSite'));
            add_action( 'wp_footer', array(&$this, 'footerScriptSite'));
        endif;
    }
    abstract public function loadScriptAdmin($hook);
    abstract public function headScriptAdmin();
    abstract public function loadScriptSite($hook);
    abstract public function headScriptSite();
    abstract public function footerScriptSite();
}
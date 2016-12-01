<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 01.12.16
 * Time: 7:22 PM
 */

namespace app\includes\common;


class TPTinyMCE
{
    public function __construct() {
        if ( is_admin() ) {
            add_action( 'init', array( &$this, 'setupTinyMCE' ) );
            add_action( 'admin_print_scripts', array( &$this, 'setupJSTinyMCE' ) );
        }
    }

    public function setupTinyMCE(){
        add_filter( 'mce_external_plugins', array( &$this, 'addTinyMCE' ) );
        add_filter( 'mce_buttons', array( &$this, 'addTinyMCEToolbar' ) );
    }

    public function addTinyMCE( $plugin_array ) {

        $plugin_array['tp_custom_class'] = TPOPlUGIN_URL . 'app/public/js/lib/TPTinyMCE.js';
        return $plugin_array;

    }

    public function addTinyMCEToolbar( $buttons ) {

        array_push( $buttons, 'tp_custom_class' );
        return $buttons;

    }

    public function setupJSTinyMCE(){

    }

}
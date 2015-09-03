<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 08.08.15
 * Time: 0:39
 */
namespace core\controllers;
abstract class TPOAdminBarMenuController {
    public function __construct(){
        add_action('wp_before_admin_bar_render', array(&$this, 'admin_bar_menu') );
    }
    abstract public function admin_bar_menu();

    /**
     * @param $name
     * @param $id
     * @param bool $href
     */
    public function admin_bar_add_root_menu($name, $id, $href = false){
        global $wp_admin_bar;
        if ( !is_super_admin() || !is_admin_bar_showing() )
            return;
        $wp_admin_bar->add_menu( array(
            'id'   => $id,
            'meta' => array(),
            'title' => $name,
            'href' => admin_url().$href ) );
    }
    public function admin_bar_add_sub_menu($name, $link, $root_menu, $id, $meta = false) {
        global $wp_admin_bar;
        if ( ! is_super_admin() || ! is_admin_bar_showing() )
            return;

        $wp_admin_bar->add_menu( array(
            'parent' => $root_menu,
            'id' => $id,
            'title' => $name,
            'href' => admin_url().$link,
            'meta' => $meta
        ) );
    }
}
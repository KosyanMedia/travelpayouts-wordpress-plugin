<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 12.08.15
 * Time: 15:30
 */
namespace core\controllers;
abstract class TPOAdminMediaButtonsController extends TPOBaseController{
    public function __construct(){
        add_action('media_buttons', array( &$this, 'action'));

        add_action('category_edit_form_fields',  array( &$this, 'action'));
        add_action('category_add_form_fields',  array( &$this, 'action'));
        add_action('edit_tag_form_fields', array( &$this, 'action'));
        add_action('add_tag_form_fields', array( &$this, 'action'));
        /*add_action('taxonomy_edit_form_fields',  array( &$this, 'buttonCat'));
        add_action('taxonomy_add_form_fields',  array( &$this, 'buttonCat'));
        add_action('edit_category_form_fields',  array( &$this, 'buttonCat'));
        add_action('add_category_form_fields',  array( &$this, 'buttonCat'));
         //add_action('taxonomy_edit_form',  array( &$this, 'buttonCat'));
        //add_action('edit_category',  array( &$this, 'buttonCat'));
        //add_action('edit_category_form',  array( &$this, 'buttonCat'));
        //add_action('edit_tag_form',  array( &$this, 'buttonCat'));
              //edit_tag_form_fields
        //add_category_form_fields
        //
        //category_add_form_fields
        //category_edit_form_fields
        */

    }
    abstract public function action($args = array());
    abstract public function render();
}
<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 28.01.16
 * Time: 16:22
 */

namespace app\includes\models\admin\menu;


class TPAutoReplacLinksOptionModel extends \app\includes\models\admin\TPOptionModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function create_option()
    {
        // TODO: Implement create_option() method.
        register_setting(
            'TPAutoReplLink',
            TPOPlUGIN_OPTION_NAME,
            array(&$this,'save_option')
        );
        $field = new TPFieldAutoReplLink();
        add_settings_section( 'tp_settings_auto_repl_link_id', '', '', 'tp_settings_auto_repl_link' );
        add_settings_field('tp_auto_repl_link_td', '', array(&$field ,'TPFieldARL'),
            'tp_settings_auto_repl_link', 'tp_settings_auto_repl_link_id' );

    }
    public function save_option($input)
    {
        parent::save_option($input);
        //error_log('test');
    }
}
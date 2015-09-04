<?php
namespace core;
class TPOLocalization {
    public function __construct(){
        add_action('plugins_loaded', array(&$this, 'localization'));
    }
    public function localization(){
        load_plugin_textdomain(TPOPlUGIN_TEXTDOMAIN, false, TPOPlUGIN_DIR_LOCALIZATION);
    }
}
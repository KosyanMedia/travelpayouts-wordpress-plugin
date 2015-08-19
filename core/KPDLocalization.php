<?php
class KPDLocalization {
    public function __construct(){
        add_action('plugins_loaded', array(&$this, 'localization'));
    }
    public function localization(){
        load_plugin_textdomain(KPDPlUGIN_TEXTDOMAIN, false, KPDPlUGIN_DIR_LOCALIZATION);
    }
}
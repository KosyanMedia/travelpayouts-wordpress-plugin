<?php
namespace core;
class TPOLocalization {
    protected static $isLocalization = array(
        'en_US',
        'ru_RU',
        'it_IT'
    );
    const TPO_DEFAULT_LOCALIZATION = 'en_US';
    public function __construct(){
        add_action('plugins_loaded', array(&$this, 'localization'));
        //add_action('init', array(&$this, 'localization'));

    }
    public function localization(){
        //load_plugin_textdomain(TPOPlUGIN_TEXTDOMAIN, false, TPOPlUGIN_DIR_LOCALIZATION);*/
        if (self::isLocale() == true || TPOPlUGIN_CUSTOM_LOCALIZATION == true){
            //error_log('standart or custom local');
            load_plugin_textdomain(TPOPlUGIN_TEXTDOMAIN, false, TPOPlUGIN_DIR_LOCALIZATION);
        } else {
            //error_log('default local');
            load_textdomain( TPOPlUGIN_TEXTDOMAIN,
                TPOPlUGIN_ABSPATH_DIR_LOCALIZATION.'/'.TPOPlUGIN_TEXTDOMAIN.'-'
                .self::TPO_DEFAULT_LOCALIZATION.'.mo' );
        }


    }
    protected static function isLocale(){
        return in_array(get_locale(), self::$isLocalization);
    }
}
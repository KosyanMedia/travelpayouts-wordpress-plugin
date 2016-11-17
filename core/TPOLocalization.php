<?php
namespace core;
class TPOLocalization {
    const TPO_IS_LOCALIZATION = array(
        'en_US',
        'ru_RU',
        'it_IT'
    );
    public function __construct(){
        add_action('plugins_loaded', array(&$this, 'localization'));
        //add_action('init', array(&$this, 'localization'));

    }
    public function localization(){
        //load_plugin_textdomain(TPOPlUGIN_TEXTDOMAIN, false, TPOPlUGIN_DIR_LOCALIZATION);
        /*error_log(TPOPlUGIN_DIR_LOCALIZATION);
        error_log(TPOPlUGIN_TEXTDOMAIN);
        error_log(TPOPlUGIN_DIR);
        error_log(get_locale());
        error_log(TPOPlUGIN_DIR_LOCALIZATION.'/'.TPOPlUGIN_TEXTDOMAIN.'-en_US.mo');*/
        self::isLocale();
        load_textdomain( TPOPlUGIN_TEXTDOMAIN, TPOPlUGIN_ABSPATH_DIR_LOCALIZATION.'/'.TPOPlUGIN_TEXTDOMAIN.'-en_US.mo' );
    }
    protected static function isLocale(){
        if (in_array('en_US', self::TPO_IS_LOCALIZATION)) {
            error_log('true');
        } else {
            error_log('false');
        }
        error_log(print_r(self::TPO_IS_LOCALIZATION, true));
        return in_array(get_locale(), self::TPO_IS_LOCALIZATION);
    }
}
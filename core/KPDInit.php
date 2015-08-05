<?php
class KPDInit {
    public static $path;
    public static $url;
    public static $plugin_slug;
    public static $textdomain;
    public static $option_version;
    public static $option_name;
    public static $ajaxUrl;
    /**
     *
     */
    public function __construct(){
        self::init();
    }

    /**
     *
     */
    protected static function init()
    {
        self::init_path();
        self::$plugin_slug = preg_replace( '/[^\da-zA-Z]/i', '_',  basename(KPDPlUGIN_DIR));
        self::$textdomain = str_replace( '_', '-', self::$plugin_slug );
        self::$option_version = self::$plugin_slug . '_version';
        self::$option_name = self::$plugin_slug . '_options';
        self::$ajaxUrl = admin_url('admin-ajax.php');
    }
    /**
     * @param string $path
     * @param array $url
     * @return mixed
     */
    private static function init_path( $path = KPDPlUGIN_DIR, $url = array() ) {
        self::$path = KPDPlUGIN_DIR;
        self::$url = get_bloginfo('url') . basename(KPDPlUGIN_DIR);
        /*$path               =   dirname( $path );
        error_log(print_r($path, true));
        $path               =   str_replace( '\\', '/', $path );
        error_log(print_r($path, true));
        $explode_path       =   explode( '/', $path );


        $current_dir        =   $explode_path[count( $explode_path ) - 1];
        array_push( $url, $current_dir );

        if( $current_dir == basename(WP_CONTENT_DIR) ) {
            $path           =   '';
            $directories    =   array_reverse( $url );
            foreach( $directories as $dir ) {
                $path       =   $path . '/' . $dir;
            }
            self::$path     =   str_replace( '//', '/', ABSPATH . $path);
            self::$url      =   get_bloginfo('url') . $path;
        } else {
            return self::init_path( $path, $url );
        }*/
    }
}
<?php
class KPDInit {
    public static $plugin_slug;
    public static $textdomain;
    public static $path;
    public static $path_localization;
    public static $url;
    public static $option_version;
    public static $option_name;
    public static $version;
    public static $ajaxUrl;
    public function __construct(){
        self::init();
    }

    private static function init()
    {
        self::init_path();
    }
    /**
     * @param string $path
     * @param array $url
     * @return mixed
     */
    private static function init_path( $path = KPDPlUGIN_DIR, $url = array() ) {
        $path               =   dirname( $path );
        $path               =   str_replace( '\\', '/', $path );
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
        }
    }
}
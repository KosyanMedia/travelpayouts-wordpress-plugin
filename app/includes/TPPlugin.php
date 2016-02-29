<?php

namespace app\includes;
class TPPlugin extends \core\TPOPlugin implements \core\TPOPluginInterface{
    public static $TPRequestApi;
    public function __construct() {
        parent::__construct();
        new TPLoader();
        self::check_plugin_update();
        $anchor = 'Lorem ipsum';
        $url = 'http://kinogo.co/';
        $nofollow = 0;
        $replace = 0;
        $target = '';
        $event = '';
        $str ='<h1><a href="">Lorem ipsum</a></h1> Lorem ipsum <h1>Lorem ipsum</h1>
                <a href="">Lorem ipsum</a> Lorem ipsum <h2>Lorem ipsum</h2>
                <a href="">Lorem ipsum</a> 223232';

        $post_content = preg_replace_callback(
            '/('.preg_quote($anchor).')|(<a(.*?)>'.preg_quote($anchor).'<\/a>)'
            .'|(<h[1-6](.*?)>(.*?)'.preg_quote($anchor).'(.*?)<\/h[1-6]>)/m',
        //(<a(.*?)>(.*?)'.preg_quote($anchor).'(.*?)<\/a>)
        //('.preg_quote($anchor).')|
        //|<h[1-6].*>'.preg_quote($anchor).'<\/h[1-6]>
            function($matches) use ($anchor, $url, $nofollow, $replace, $target, $event){
                error_log(print_r($matches, true));
                if(strpos($matches[0], '<a') === false){
                    //Если в тексте нет ссылки
                    if(strpos($matches[0], '<h') === false){
                        //Если в тексте нет заголовка
                    }else{
                        //Если в тексте есть заголовок
                    }
                    /*if(isset(\app\includes\TPPlugin::$options['auto_repl_link']['not_title'])){
                        //Не вставлять ссылки во все заголовки
                    }else{

                    }*/
                }else{
                    //Если в тексте ссылки
                    if($replace == 1){
                        //Включен флаг замена если ссылка уже есть
                        if(strpos($matches[0], '<h') === false){
                            //Если в тексте нет заголовка
                        }else{
                            //Если в тексте есть заголовок
                        }
                    }
                }

                return $matches[0];
            },
            //array( &$this, 'tp_preg_replace'),
            $str,
            -1,//-1Limit replace
            $count
        );
        error_log($count);
        error_log(print_r($post_content, true));

    }

    static private function check_plugin_update() {
        if( ! get_option(TPOPlUGIN_OPTION_VERSION) || get_option(TPOPlUGIN_OPTION_VERSION) != TPOPlUGIN_VERSION) {
            if( ! get_option(TPOPlUGIN_OPTION_NAME) ){
                update_option( TPOPlUGIN_OPTION_NAME, TPDefault::defaultOptions() );
            } else{
                //$settings = array_replace_recursive(self::$options, TPDefault::defaultOptions());
                $settings = array_replace_recursive(TPDefault::defaultOptions(), self::$options);
                update_option( TPOPlUGIN_OPTION_NAME, $settings);
            }

            if(!empty(self::$options['account']['marker'])){
                $request = 'http://metrics.aviasales.ru/?goal=tp_wp_plugin_activation&data={"merker":'
                    .self::$options['account']['marker'].',"domain":"'.preg_replace("(^https?://)", "", get_option('home')).'"}';
                $string = htmlspecialchars($request);
                $response = wp_remote_get( $string, array('headers' => array(
                    'Accept-Encoding' => 'gzip, deflate',
                )) );

            }

            update_option(TPOPlUGIN_OPTION_VERSION, TPOPlUGIN_VERSION);
        }
    }
    static public function activation()
    {
        // TODO: Implement activation() method.
        if (!version_compare(PHP_VERSION, '5.3.0', '>=')) {
            global $locale;
            $error_msg = '';
            switch($locale) {
                case "ru_RU":
                    $error_msg = '<p>К сожалению, плагин Travelpayouts не работает с версиями PHP ниже чем 5.3.х.
                Ознакомьтесь с информацией о том, <a href="https://support.travelpayouts.com/hc/ru/articles/207794617#02?utm_source=wpplugin&utm_medium=php_error&utm_campaign=ru">
                как вы можете обновиться</a>.</p>';
                    break;
                case "en_US":
                    $error_msg = '<p>Unfortunately, Travelpayouts plugin can not run on PHP versions that are older than 5.3.х.
                Read more information about <a href="https://support.travelpayouts.com/hc/en-us/articles/207794617#02?utm_source=wpplugin&utm_medium=php_error&utm_campaign=en">
                how you can update</a>.</p>';
                    break;
                default:
                    $error_msg = '<p>Unfortunately, Travelpayouts plugin can not run on PHP versions that are older than 5.3.х.
                Read more information about <a href="https://support.travelpayouts.com/hc/en-us/articles/207794617#02?utm_source=wpplugin&utm_medium=php_error&utm_campaign=en">
                how you can update</a>.</p>';
                    break;
            }
            deactivate_plugins(TPOPlUGIN_NAME);
            wp_die($error_msg);
        }else{
            if( ! get_option(TPOPlUGIN_OPTION_NAME) )
                update_option( TPOPlUGIN_OPTION_NAME, TPDefault::defaultOptions() );
            if( ! get_option(TPOPlUGIN_OPTION_VERSION) )
                update_option(TPOPlUGIN_OPTION_VERSION, TPOPlUGIN_VERSION);
            models\admin\menu\TPSearchFormsModel::createTable();
            models\admin\menu\TPAutoReplacLinksModel::createTable();
        }
    }

    static public function deactivation()
    {
        // TODO: Implement deactivation() method.
        //delete_option( TPOPlUGIN_OPTION_NAME);
        //delete_option( TPOPlUGIN_OPTION_VERSION);
        //$settings = array_replace_recursive(TPDefault::defaultOptions(), self::$options);
        //error_log(print_r($settings, true));
        //error_log(print_r(self::$options, true));
        //models\admin\menu\TPAutoReplacLinksModel::deleteTable();
        self::deleteCacheAll();

    }

    static public function uninstall()
    {
        // TODO: Implement uninstall() method.
        models\admin\menu\TPSearchFormsModel::deleteTable();
        models\admin\menu\TPAutoReplacLinksModel::deleteTable();
        delete_option( TPOPlUGIN_OPTION_NAME);
        delete_option( TPOPlUGIN_OPTION_VERSION);
    }

}
$TPPlugin = new TPPlugin();

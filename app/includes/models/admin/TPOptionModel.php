<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 20.08.15
 * Time: 15:17
 */
namespace app\includes\models\admin;
use app\includes\common\TPUpdateOptions;
use app\includes\TPPlugin;
use core\models\TPOOptionModel;

abstract class TPOptionModel extends TPOOptionModel{
    private static $instance;
    private static $result;
    public function save_option($input)
    {
        // TODO: Implement save_option() method.
        if (!isset(self::$instance)) {
            self::$instance = true;
            if(!empty($input['account']['marker']) &&
                TPPlugin::$options['account']['marker'] != $input['account']['marker']){
                $request = 'http://metrics.aviasales.ru/?goal=tp_wp_plugin_activation&data={"merker":'
                    .$input['account']['marker'].',"domain":"'.preg_replace('(^https?://)', '', get_option('home')).'"}';
                $string = htmlspecialchars($request);
                $response = wp_remote_get( $string, ['headers' => [
                    'Accept-Encoding' => 'gzip, deflate',
                ]]);

            }
            if(isset($input['wizard'])){
                TPPlugin::$options['account']['marker'] = $input['account']['marker'];
                TPPlugin::$options['account']['token'] = $input['account']['token'];
                TPPlugin::$options['local']['localization'] = $input['local']['localization'];
                TPPlugin::$options['local']['currency'] = $input['local']['currency'];
                self::$result = TPPlugin::$options;
            }else{
                self::$result = array_merge(TPPlugin::$options, $input);

            }
            TPPlugin::deleteCacheAll();

        }

        $result = TPUpdateOptions::sanitizeSettings(self::$result);

        return $result;
    }
}

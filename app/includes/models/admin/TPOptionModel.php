<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 20.08.15
 * Time: 15:17
 */

abstract class TPOptionModel extends KPDOptionModel{
    private static $instance;
    private static $result;
    public function save_option($input)
    {
        // TODO: Implement save_option() method.
        if (!isset(self::$instance)) {
            self::$instance = true;
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
        return self::$result;
    }
}
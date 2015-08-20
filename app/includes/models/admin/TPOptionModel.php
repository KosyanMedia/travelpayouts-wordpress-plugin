<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 20.08.15
 * Time: 15:17
 */

abstract class TPOptionModel extends KPDOptionModel{
    public function save_option($input)
    {
        // TODO: Implement save_option() method.
        error_log(111);
        if(isset($input['wizard'])){
            TPPlugin::$options['account']['marker'] = $input['account']['marker'];
            TPPlugin::$options['account']['token'] = $input['account']['token'];
            TPPlugin::$options['local']['localization'] = $input['local']['localization'];
            TPPlugin::$options['local']['currency'] = $input['local']['currency'];
            $result = TPPlugin::$options;
        }else{
            $result = array_merge(TPPlugin::$options, $input);
        }
        TPPlugin::deleteCacheAll();
        return $result;
    }
}
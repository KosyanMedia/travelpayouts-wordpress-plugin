<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 03.07.17
 * Time: 3:45 PM
 */

namespace app\includes\common;


use app\includes\TPPlugin;

class TPOption
{
    public static function getExtraMarker(){
        //if(!empty(\app\includes\TPPlugin::$options['account']['extra_marker']))
        //TPPlugin::
        $extraMarker = '';
        $extraMarker = '.wpplugin';
        return $extraMarker;
    }
}
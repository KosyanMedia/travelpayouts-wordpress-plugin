<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 04.05.16
 * Time: 13:04
 */

namespace app\includes\controllers\admin\media_buttons;


use app\includes\TPPlugin;
use core\controllers\TPOAdminMediaButtonsController;

abstract class TPAdminMediaButtonsController extends TPOAdminMediaButtonsController
{
    /**
     * @param string $txtDefault
     * @param string $txtCompact
     * @return string
     */
    public function getTextBtn($txtDefault = '', $txtCompact = ''){
        $txt = '';
        switch( TPPlugin::$options['config']['media_button']['view'] ){
            case 0:
                $txt = $txtDefault;
                break;
            case 1:
                $txt = $txtCompact;
                break;
            default:
                $txt = $txtDefault;
        }
        return $txt;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 05.08.15
 * Time: 11:21
 */

namespace core;
class TPOAutoload
{
    public function register()
    {
        spl_autoload_register([$this, 'autoloadNamespace']);
    }

    /**
     * @param $className
     */
    protected function autoloadNamespace($className)
    {
        $fileClass = TPOPlUGIN_DIR . '/' . str_replace("\\", '/', $className) . '.php';

        if (file_exists($fileClass) && !class_exists($fileClass, false)) {
            require_once $fileClass;
        }
    }
}

$autoloader = new TPOAutoload();
$autoloader->register();

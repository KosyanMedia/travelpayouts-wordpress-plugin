<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 05.08.15
 * Time: 11:21
 */

class KPDAutoload {
    private static $instance = null;
    private function __construct() {
        spl_autoload_register(array($this, 'autoload'));

    }
    public static function getInstance(){
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * @param $className
     */
    private function autoload($className){
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(KPDPlUGIN_DIR));
        foreach ($iterator as $directory){
            if (  ! $directory->isDir()) {
                continue;
            }
            $fileClass = rtrim($directory, '.').$className.'.php';
            if (file_exists($fileClass)) {
                if(!class_exists($fileClass,FALSE)) {
                    require_once $fileClass;
                    $interfaces = class_implements($className,FALSE);
                    foreach($interfaces as $interface){
                        $fileInterface = rtrim($directory, '.').$interface.'.php';
                        if (file_exists($fileInterface)) {
                            if(!class_exists($fileInterface,FALSE)){
                                require_once $fileInterface;
                            }
                        }
                    }
                }
            }
        }
    }
}
KPDAutoload::getInstance();
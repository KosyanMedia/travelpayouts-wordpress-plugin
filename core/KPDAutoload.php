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
        spl_autoload_register(array($this, 'autoloadCustom'));

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
        //error_log($className);
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(KPDPlUGIN_DIR),
            RecursiveIteratorIterator::CHILD_FIRST);
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
    private function autoloadCustom($className){
        //error_log($className);
        $this->getDirectory(KPDPlUGIN_DIR);
    }
    private function getDirectory( $path = '.', $level = 0 ) {
        $ignore = array( 'cgi-bin', '.', '..', '.git', '.idea');
        $dh = @opendir( $path );
        while( false !== ( $file = readdir( $dh ) ) ){
            if( !in_array( $file, $ignore ) ){
                $spaces = str_repeat( ' ', ( $level * 4 ) );
                if( is_dir( "$path/$file" ) ){
                    error_log("222 -".$path);
                    error_log("222 -".$spaces." - ".$file);
                    $this->getDirectory( "$path/$file", ($level+1) );
                } else {
                    error_log("111 -".$path);
                    error_log("111 -".$spaces." - ".$file);
                }
            }
        }
        closedir( $dh );
    }

}
KPDAutoload::getInstance();
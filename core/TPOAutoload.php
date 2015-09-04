<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 05.08.15
 * Time: 11:21
 */
namespace core;
class TPOAutoload {
    private static $instance = null;
    private function __construct() {
        spl_autoload_register(array($this, 'autoloadNamespace'));
        /*if (version_compare(PHP_VERSION, '5.3', '>')) {
            spl_autoload_register(array($this, 'autoload'));
        }else{
            spl_autoload_register(array($this, 'autoloadOld'));
        }*/
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
    public function autoloadNamespace($className){
        $fileClass = TPOPlUGIN_DIR.'/'.str_replace("\\","/",$className).'.php';
        if (file_exists($fileClass)) {
            if (!class_exists($fileClass, FALSE)) {
                require_once $fileClass;
            }
        }
    }
    /**
     * @param $className
     */
    private function autoload($className){
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(TPOPlUGIN_DIR),
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

    /**
     * @param $className
     */
    private function autoloadOld($className){
        $this->getDirectory(TPOPlUGIN_DIR, 0, $className);
    }

    /**
     * @param string $path
     * @param int $level
     * @param string $className
     *
    private function getDirectory( $path = '.', $level = 0, $className = '' ) {
        $ignore = array( 'cgi-bin', '.', '..', '.git', '.idea', 'public', 'lang');
        $dh = @opendir( $path );
        while( false !== ( $file = readdir( $dh ) ) ){
            if( !in_array( $file, $ignore ) ){
                $spaces = str_repeat( ' ', ( $level * 4 ) );
                if( is_dir( "$path/$file" ) ){
                    $this->getDirectory( "$path/$file", ($level+1), $className );
                } else {

                    $fileClass = $path.'/'.$className.'.php';
                    if (file_exists($fileClass)) {
                        if(!class_exists($fileClass,FALSE)) {
                            require_once $fileClass;
                            $interfaces = class_implements($className,FALSE);
                            foreach($interfaces as $interface){
                                $fileInterface = $path.'/'.$interface.'.php';
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
        closedir( $dh );
    }*/
    private function getDirectory( $path = '.', $level = 0, $className = '' ) {
        $sdirs = scandir($path);
        $ignore = array( 'cgi-bin', '.', '..', '.git', '.idea', 'public', 'lang');
        foreach($sdirs as $sdir ){
            if(!in_array( $sdir, $ignore )){
                if( is_dir( "$path/$sdir" ) ){
                    $this->getDirectory( "$path/$sdir", ($level+1), $className );
                } else {
                    $fileClass = $path.'/'.$className.'.php';
                    if (file_exists($fileClass)) {
                        if(!class_exists($fileClass,FALSE)) {
                            require_once $fileClass;
                            $interfaces = class_implements($className,FALSE);
                            foreach($interfaces as $interface){
                                $fileInterface = $path.'/'.$interface.'.php';
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
    }

}
TPOAutoload::getInstance();
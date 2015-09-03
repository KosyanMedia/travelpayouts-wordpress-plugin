<?php
/**
 * Class KPDLoader
 */
namespace core;
abstract class TPOLoader {
    protected function __construct(){
        if ( is_admin() ) :
            $this->admin();
            add_action('plugins_loaded', array(&$this, 'pluginsLoaded'));
        else:
            $this->site();
            endif;
        $this->all();

    }
    abstract protected function admin();
    abstract protected function site();
    abstract protected function all();
    abstract public function pluginsLoaded();
}
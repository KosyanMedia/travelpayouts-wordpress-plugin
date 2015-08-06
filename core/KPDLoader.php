<?php
/**
 * Class KPDLoader
 */

abstract class KPDLoader {
    protected function __construct(){
        new KPDLocalization();
        if ( is_admin() ) :
            $this->admin();
        else:
            $this->site();
            endif;
    }
    abstract protected function admin();
    abstract protected function site();
    abstract protected function all();
}
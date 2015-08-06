<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 06.08.15
 * Time: 11:58
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
}
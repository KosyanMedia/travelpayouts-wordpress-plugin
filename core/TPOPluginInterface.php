<?php
namespace core;
interface TPOPluginInterface{
    static public function activation();
    static public function deactivation();
    static public function uninstall();
}
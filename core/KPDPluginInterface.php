<?php
interface KPDPluginInterface{
    static public function activation();
    static public function deactivation();
    static public function uninstall();
}
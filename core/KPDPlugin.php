<?php
abstract class KPDPlugin {
    abstract public function activation();
    abstract public function deactivation();
    abstract public function uninstall();
}
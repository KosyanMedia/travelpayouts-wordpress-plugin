<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 11.08.15
 * Time: 8:21
 */

abstract class KPDWPTableModel {
    abstract public function insert($data);
    abstract public function update();
    abstract public function delete();
    abstract public function query();
    abstract public function get_data();
}
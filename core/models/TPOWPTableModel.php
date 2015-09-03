<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 11.08.15
 * Time: 8:21
 */
namespace core\models;
abstract class TPOWPTableModel {
    abstract public function insert($data);
    abstract public function update($data);
    abstract public function deleteAll();
    abstract public function deleteId($id);
    abstract public function query();
    abstract public function get_data();
}
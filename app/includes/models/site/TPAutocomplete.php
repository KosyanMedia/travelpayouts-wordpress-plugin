<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 27.08.15
 * Time: 10:32
 */
namespace app\includes\models\site;
class TPAutocomplete {
    private static $instance = null;
    public static $data;
    public static $title;
    public static $data_airline;
    private function __construct() {
        self::getIataAutocomplete();
        self::getIataAutocompleteTitle();
        self::getIataAutocompleteAir();
    }
    public static function getInstance(){
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function getIataAutocomplete(){
        $cities = file_get_contents(TPOPlUGIN_DIR.'/app/public/autocomplete/cities.json');//cities|airports
        $cities = json_decode($cities, true);
        foreach($cities as $value){
            $rows[$value['code']] = $value;
        }
        self::$data = $rows;
    }
    private function getIataAutocompleteTitle(){
        $cases = file_get_contents(TPOPlUGIN_DIR.'/app/public/autocomplete/case.json');
        $cases = json_decode($cases, true);

        self::$title = $cases[0];
    }
    private function getIataAutocompleteAir(){
        $airlines = file_get_contents(TPOPlUGIN_DIR.'/app/public/autocomplete/airlines.json');
        $airlines = json_decode($airlines, true);
        foreach($airlines as $value){
            $rows[$value['iata']] = $value;
        }
        self::$data_airline = $rows;
    }
}
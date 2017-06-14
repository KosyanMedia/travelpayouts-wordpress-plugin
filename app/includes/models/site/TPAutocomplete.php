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

    public static $dataRailway;

    public static $railway;

    //private static $locations;
    private function __construct() {
        self::getIataAutocomplete();
        self::getIataAutocompleteTitle();
        self::getIataAutocompleteAir();
        self::setRailwayAutocomplete();
        //self::setLocations();
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

    /*private function setRailwayAutocomplete(){
        $railway = file_get_contents(TPOPlUGIN_DIR.'/app/public/autocomplete/railway.json');
        $railway = json_decode($railway, true);

        self::$dataRailway = $railway;
    }*/

	private function setRailwayAutocomplete(){
		$railway = file_get_contents(TPOPlUGIN_DIR.'/app/public/autocomplete/railway.json');
		$railway = json_decode($railway, true);
		$rows = array();
		foreach($railway as $value){
			$rows[$value['number']] = $value;
		}
		//error_log(print_r($rows, true));
		self::$railway = $rows;
	}

	/**
	 * @param $number
	 *
	 * @return bool|string
	 */
	public static function getRailwayAutocomplete($number){
		if(empty($number) || $number == false) return false;
		if (!array_key_exists($number, self::$railway)) return $number;
		$name = '';
		$name = self::$railway[$number]['name'];
		return $name;
	}


   /* private function setLocations(){
        $locations = file_get_contents(TPOPlUGIN_DIR.'/app/public/autocomplete/locations.json');
        $locations = json_decode($locations, true);
        $rows = array();
        foreach($locations as $value){
            $rows[$value['id']] = $value;
        }
        error_log(print_r($rows, true));
        self::$locations = $rows;
    }

    public static function getLocationsById($id){
        if (!array_key_exists($id, self::$locations)) return array();
        return self::$locations[$id];
    }*/
}
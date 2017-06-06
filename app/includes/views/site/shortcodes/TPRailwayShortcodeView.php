<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.05.17
 * Time: 22:58
 */

namespace app\includes\views\site\shortcodes;


use app\includes\common\TPFieldsLabelTable;
use app\includes\common\TPLang;
use app\includes\TPPlugin;

class TPRailwayShortcodeView {

	public function __construct()
	{

	}

	public function renderTable($args = array()) {
		$defaults = array(
			'rows' => array(),
			'origin' => '',
			'destination' => '',
			'title' => '',
			'paginate' => 'false',
			'off_title' => '',
			'subid' => '',
			'currency' => TPPlugin::$options['local']['currency'],
			'return_url' => false,
			'language' => TPLang::getLang(),
			'shortcode' => false
		);
		extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
		$html = '';
		if ($shortcode == false) return false;
		if (count($rows) < 1 || $rows == false) return $this->renderViewIfEmptyTable();

		$html .= '<div class="TPTrainTable TP-Plugin-Tables_wrapper clearfix TP-HotelsTableWrapper">'
		         .$this->renderTitleTable($off_title, $title, $shortcode, $origin, $destination)
		         .'<div class="dataTables_wrapper no-footer">'
		            .'<table class="TPTableShortcode TP-Plugin-Tables_box  TP-rwd-table no-footer dataTable" '
		                .'data-paginate="'.$paginate.'" '
		                .'data-paginate_limit="' .TPPlugin::$options['shortcodes_railway'][$shortcode]['paginate'].'" '
		                .'data-sort_column="'.$this->getSortColumn($shortcode).'">'
		                .$this->renderHeadTable($shortcode)
		                .$this->renderBodyTable($shortcode, $origin, $destination, $rows, $subid, $language, $currency)
		            .'</table>'
		         .'</div>';

		return $html;
		//return var_dump("<pre>", $args, "</pre>");
	}

	public function renderViewIfEmptyTable(){
		return '';
	}

	/**
	 * @param $off_title
	 * @param $title
	 * @param $shortcode
	 * @param $city
	 * @return string
	 */
	public function renderTitleTable($off_title, $title, $shortcode, $origin, $destination){
		if($off_title !== 'true'){
			if(empty($title)) {
				if(isset(TPPlugin::$options['shortcodes_railway'][$shortcode]['title'][TPLang::getLang()])){
					$title = TPPlugin::$options['shortcodes_railway'][$shortcode]['title'][TPLang::getLang()];
				}else{
					$title = TPPlugin::$options['shortcodes_railway'][$shortcode]['title'][TPLang::getDefaultLang()];
				}
			}
			if(!empty($title)){

				if(strpos($title, '{origin}') !== false){
					$title = str_replace('{origin}', '<span data-origin="'.$origin.'">'.$origin.'</span>' , $title);
				}

				if(strpos($title, '{destination}') !== false){
					$title = str_replace('{destination}', '<span data-destination="'.$destination.'">'.$destination.'</span>' , $title);
				}
			}
			return '<'.TPPlugin::$options['shortcodes_railway'][$shortcode]['tag'].' class="TP-TitleTables">'.$title.'</'.TPPlugin::$options['shortcodes_railway'][$shortcode]['tag'].'>';
		}
		return '';
	}

	/**
	 * @param $shortcode
	 *
	 * @return mixed
	 */
	public function getSortColumn($shortcode){
		return TPPlugin::$options['shortcodes_hotels'][$shortcode]['sort_column'];
	}

	/**
	 * @param $shortcode
	 *
	 * @return string
	 */
	public function renderHeadTable($shortcode){
		$headTable = '';

		$headTable .= '<thead class="TP-Plugin-Tables_box_thead"><tr>';
		foreach($this->getSelectField($shortcode) as $key=>$selected_field){
			$headTable .= '<td class="TP'.$selected_field.'Td '
			              .$this->tdClassHidden($shortcode, $selected_field)
			              .' TPTableHead">'
			              . $this->getTableTheadTDFieldLabel($selected_field)
			              .'<i class="TP-sort-chevron fa"></i>'
			              .' </td>';
		}
		$headTable .= '</tr></thead>';
		return $headTable;
	}

	/**
	 * @param $shortcode
	 *
	 * @return array
	 */
	public function getSelectField($shortcode){
		return array_unique(TPPlugin::$options['shortcodes_railway'][$shortcode]['selected']);
	}

	/**
	 * @param $shortcode
	 * @param $field
	 * @return string
	 */
	public function tdClassHidden($shortcode, $field){
		$fields = array(
			'1' => array(

			),
		);
		if(in_array($field, $fields[$shortcode])) return 'TP-unessential';
		return '';
	}

	/**
	 * @param $fieldKey
	 * @return string
	 */
	public function getTableTheadTDFieldLabel($fieldKey)
	{
		$fieldLabel = "";
		if(isset(TPPlugin::$options['local']['railway_fields'][TPLang::getLang()]['label'][$fieldKey])){
			$fieldLabel = TPPlugin::$options['local']['railway_fields'][TPLang::getLang()]['label'][$fieldKey];
		}else{
			$fieldLabel = TPPlugin::$options['local']['railway_fields'][TPLang::getDefaultLang()]['label'][$fieldKey];
		}
		return $fieldLabel;
	}


	public function renderBodyTable($shortcode, $origin, $destination, $rows, $subid, $language, $currency){
		$subid = $this->getSubid($subid);
		$bodyTable = '';
		$bodyTable .= '<tbody>';
		$count_row = 0;
		foreach($rows as $key_row => $row){
			$count_row++;
			$count = 0;
			//error_log(print_r($row, true));
			// get Url
			$hotelURL = '';
			/*switch($shortcode){
				case 1:
					$hotelURL = $this->getUrlTable($shortcode, $city,
						$row['hotel_id'], $checkInURL, $checkOutURL, $currency, $subid, $link_without_dates);
					break;
				default:
					$hotelURL = '';
			}*/
			$bodyTable .= '<tr>';
			//error_log($hotelURL);
			foreach($this->getSelectField($shortcode) as $key=>$selected_field){

				$count++;
				switch($selected_field){
					//Номер поезда / Train
					case 'train':
						$bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">'
						              .$this->getTrain($row)
						              .'</td>';
						break;
                    //Маршрут, Route
                    case 'route':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">'
                            .$this->getRoute($row)
                            .'</td>';
                        break;
                    //Отправление / Departure
                    case 'departure':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">'
                                .$this->getDeparture($row)
                            .'</td>';
                        break;
                    //Прибытие / Arrival
                    case 'arrival':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">'
                                .$this->getArrival($row)
                            .'</td>';
                        break;
                    //В пути, Duration
                    case 'duration':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">'
                                .$this->getDuration($row)
                            .'</td>';
                        break;
                    //Примерные цены / Prices
                    case 'prices':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent">'
                                .$this->getPrices($row)
                            .'</p>'
                            .'</td>';
                        break;
                    //Дата поездки/ Dates
                    case 'dates':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent">'
                                .$this->getDates($row, $shortcode)
                            .'</p>'
                            .'</td>';
                        break;
                    //Откуда / From
                    case 'origin':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent">'
                                .$this->getOrigin($row)
                            .'</p>'
                            .'</td>';
                        break;
                    //Куда / To
                    case 'destination':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent">'
                                .$this->getDestination($row)
                            .'</p>'
                            .'</td>';
                        break;
                    //Время отправления / Departure Time
                    case 'departure_time':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent">'
                                .$this->getDepartureTime($row)
                            .'</p>'
                            .'</td>';
                        break;
                    //Время прибытия/ Arrival Time
                    case 'arrival_time':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent">'
                                      .$this->getArrivalTime($row)
                            .'</p>'
                            .'</td>';
                        break;
                    //Начальная станция маршрута / Route's First Station
                    case 'route_first_station':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent">'
                                      .$this->getRouteFirstStation($row)
                            .'</p>'
                            .'</td>';
                        break;
                    //Конечная станция маршрута / Route's Last Station
                    case 'route_last_station':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent">'
                                      .$this->getRouteLastStation($row)
                            .'</p>'
                            .'</td>';
                        break;
					default:
						$bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent">'
						              //.$this->getTextTdTable($hotelURL, $row['name'], $shortcode, 0, $price_pn, $currency)
						              .'</p>'
						              .'</td>';
						break;
				}
			}
			$bodyTable .= '</tr>';
		}
		$bodyTable .= '</tbody>';
		return $bodyTable;
	}

	public function getSubid($subid){
		if(!empty($subid)){
			$subid = trim($subid);
			$subid = preg_replace('/[^a-zA-Z0-9_]/', '', $subid);
			//error_log($subid);
		}
		return $subid;
	}

	/**
	 * Номер поезда / Train
	 * @param array $row
	 *
	 * @return string
	 */
	public function getTrain($row = array()){
		$train = '';
		if (array_key_exists('trainNumber', $row)) {
			$train .= $row['trainNumber'].' ';
		}
		if (array_key_exists('name', $row)) {
			if (!empty($row['name'])){
				$train .= '<span class="train-color t-gray">"'
				            .$row['name']
						.'"</span>';
			} else {
				//error_log(print_r($row, true) );
				if (array_key_exists('firm', $row)) {
					if ($row['firm'] == true){
						$train .= '<span class="train-color t-gray">"'
						        ._x('brand', 'railway shortcode view train', TPOPlUGIN_TEXTDOMAIN)
						        .'"</span>';
					}
				}

			}
		}
		return '<p class="TP-tdContent">'.$train.'</p>';
	}

    /**
     * Маршрут, Route
     * @param array $row
     * @return string
     */
	public function getRoute($row = array()){
        $route = '';
        $departureStation = '';
        $arrivalStation = '';
        $runDepartureStation = '';
        $runArrivalStation = '';
        $departure = '';
        $arrival = '';
        if (array_key_exists('departureStation', $row)) {
            $departureStation = $row['departureStation'];
        }
        if (array_key_exists('arrivalStation', $row)) {
            $arrivalStation = $row['arrivalStation'];
        }
        if (array_key_exists('runDepartureStation', $row)) {
            $runDepartureStation = $row['runDepartureStation'];
        }
        if (array_key_exists('runArrivalStation', $row)) {
            $runArrivalStation = $row['runArrivalStation'];
        }
        $departure = $this->getDepartureStation($runDepartureStation, $departureStation);
        $arrival = $this->getArrivalStation($runArrivalStation, $arrivalStation);
        $route = '<span class="marshrut">'.$departure.' → '.$arrival .'</span>';
        return '<p class="TP-tdContent">'.$route.'</p>';
    }

    /**
     * @param $runDepartureStation
     * @param $departureStation
     * @return string
     */
    public function getDepartureStation($runDepartureStation, $departureStation){
        $departure = '';
        if ($runDepartureStation == $departureStation){
            $departure = $runDepartureStation;
        } else {
            $departure = $runDepartureStation.' → '.$departureStation;
        }
        return $departure;
    }

    /**
     * @param $runArrivalStation
     * @param $arrivalStation
     * @return string
     */
    public function getArrivalStation($runArrivalStation, $arrivalStation){
        $arrival = '';
        if ($runArrivalStation == $arrivalStation){
            $arrival = $runArrivalStation;
        } else {
            $arrival = $arrivalStation.' → '.$runArrivalStation;
        }
        return $arrival;
    }

    /**
     * Отправление / Departure
     * @param array $row
     * @return string
     */
    public function getDeparture($row = array()){
        $departure = '';
        $departureTime = '';
        $departureStation = '';
        if (array_key_exists('departureTime', $row)) {
            $departureTime = $row['departureTime'];
        }
        if (array_key_exists('departureStation', $row)) {
            $departureStation = $row['departureStation'];
        }

        $departure = '<span class="departure_time">'.date('H:i', strtotime($departureTime)).'</span>'
            .' <span class="train-color span-timeComming t-gray">'.$departureStation.'</span>';
        return '<p class="TP-tdContent">'.$departure.'</p>';
    }

    /**
     * Прибытие / Arrival
     * @param array $row
     * @return string
     */
    public function getArrival($row = array()){
        $arrival = '';
        $arrivalTime = '';
        $arrivalStation = '';
        if (array_key_exists('arrivalTime', $row)) {
            $arrivalTime = $row['arrivalTime'];
        }
        if (array_key_exists('arrivalStation', $row)) {
            $arrivalStation = $row['arrivalStation'];
        }
        $arrival = '<span class="comming_time">'.date('H:i', strtotime($arrivalTime)).'</span>'
            .' <span class="train-color span-timeComming t-gray">'.$arrivalStation.'</span>';
        return '<p class="TP-tdContent">'.$arrival.'</p>';
    }

    /**
     * В пути, Duration
     * @param array $row
     * @return string
     */
    public function getDuration($row = array()){
        $duration = '';
        $travelTimeInSeconds = '';
        if (array_key_exists('travelTimeInSeconds', $row)) {
            $travelTimeInSeconds = $this->secondsToTime($row['travelTimeInSeconds']);
        }
        $duration = '<span class="TP-trainWayTime">'.$travelTimeInSeconds.'<span>';
        return '<p class="TP-tdContent">'.$duration.'</p>';
    }

    public function secondsToTime($seconds)
    {
        //$y = floor($seconds / (86400*365.25));
        //$d = floor(($seconds - ($y*(86400*365.25))) / 86400);
	    $string = '';
        $h = gmdate('H', $seconds);
        $m = gmdate('i', $seconds);
        //$s = gmdate('s', $seconds);
	    /*if($y > 0)
        {
            $yw = $y > 1 ? ' years ' : ' year ';
            $string .= $y . $yw;
        }
        if($d > 0)
        {
            $dw = $d > 1 ? ' days ' : ' day ';
            $string .= $d . $dw;
        }*/

        if($h > 0)
        {
            $hw = TPFieldsLabelTable::getDateLabel('hour');
	        //$h > 1 ? ' hours ' : ' hour ';
            $string .= $h.$hw.' ';
        }

        if($m > 0)
        {
            $mw = TPFieldsLabelTable::getDateLabel('minute');
	        //$m > 1 ? ' minutes ' : ' minute ';
            $string .= $m . $mw;
        }

        /*if($s > 0)
        {
            $sw = $s > 1 ? ' seconds ' : ' second ';
            $string .= $s . $sw;
        }*/
        return preg_replace('/\s+/',' ',$string);
    }

	/**
	 * Примерные цены / Prices
	 * @param array $row
	 *
	 * @return string
	 */
    public function getPrices($row = array()){
    	$prices = '';
	    $categories = array();
	    if (array_key_exists('categories', $row)) {
		    $categories = $row['categories'];
	    }
	    if (count($categories) < 1 || $categories == false) return $prices;
		foreach ($categories as $category){
			$type = '';
			$price = '';
			if (array_key_exists('type', $category)) {
				$type = $category['type'];
			}
			if (array_key_exists('price', $category)) {
				$price = $category['price'];
			}
			$prices .= '<div class="TP-train-text">'
				           .'<div class="TP-train-text_left">'.$type.'</div>'
				           .'<div class="TP-train-text_center t-gray">~</div>'
				           .'<div class="TP-train-text_right">'
				                .$this->renderPrice($price, 'RUB')
				           .'</div>'
			           .'</div>';
		}

    	return $prices;
    }

	public function renderPrice($price, $currency){
		$currencyView = '';
		switch (TPPlugin::$options['local']['currency_symbol_display']){
			case 0:
				$currency = mb_strtolower($currency);
				$currencyView = $price.'<i class="TP-currency-icons tp-currency-after"><i class="tp-plugin-icon-'
				                .$currency.'"></i></i>';
				break;
			case 1:
				$currency = mb_strtolower($currency);
				$currencyView = '<i class="TP-currency-icons tp-currency-before"><i class="tp-plugin-icon-'
				                .$currency.'"></i></i>'.$price;
				break;
			case 2:
				$currencyView = $price;
				break;
			case 3:
				$currencyView = $price.'<span class="tp-currency">'.$currency.'</span>';
				break;
			case 4:
				$currencyView = '<span class="tp-currency">'.$currency.'</span>'.$price;
				break;
		}

		return $currencyView;
	}

	/**
	 * Дата поездки/ Dates
	 * @param array $row
	 *
	 * @return string
	 */
	public function getDates($row = array(), $typeShortcode){
		$dates = '';
		$btnTxt = "";
		if(isset(TPPlugin::$options['shortcodes_railway'][$typeShortcode]['title_button'][TPLang::getLang()])){
			$btnTxt = TPPlugin::$options['shortcodes_railway'][$typeShortcode]['title_button'][TPLang::getLang()];
		}else{
			$btnTxt = TPPlugin::$options['shortcodes_railway'][$typeShortcode]['title_button'][TPLang::getDefaultLang()];
		}
		$dates = '<a class="TP-Plugin-Tables_link TPButtonTable">'.$btnTxt.'</a>';
		return $dates;
	}

	/**
	 * Откуда / From
	 * @param array $row
	 *
	 * @return string
	 */
	public function getOrigin($row = array()){
		$origin = '';
		if (array_key_exists('departureStation', $row)) {
			$origin = $row['departureStation'];
		}
		return $origin;
	}

	/**
	 * Куда / To
	 * @param array $row
	 *
	 * @return string
	 */
	public function getDestination($row = array()){
		$destination = '';
		if (array_key_exists('arrivalStation', $row)) {
			$destination = $row['arrivalStation'];
		}
		return $destination;
	}

	/**
	 * Время отправления / Departure Time
	 * @param array $row
	 *
	 * @return string
	 */
	public function getDepartureTime($row = array()){
		$departureTime = '';
		if (array_key_exists('departureTime', $row)) {
			$departureTime = date('H:i', strtotime($row['departureTime']));
		}
		return $departureTime;
	}

	/**
	 * Время прибытия/ Arrival Time
	 * @param array $row
	 *
	 * @return string
	 */
	public function getArrivalTime($row = array()){
		$arrivalTime = '';
		if (array_key_exists('arrivalTime', $row)) {
			$arrivalTime = date('H:i', strtotime($row['arrivalTime']));
		}
		return $arrivalTime;
	}

	/**
	 * Начальная станция маршрута / Route's First Station
	 * @param array $row
	 *
	 * @return mixed|string
	 */
	public function getRouteFirstStation($row = array()){
		$routeFirstStation = '';
		if (array_key_exists('runDepartureStation', $row)) {
			$routeFirstStation = $row['runDepartureStation'];
		}
		return $routeFirstStation;
	}

	/**
	 * Конечная станция маршрута / Route's Last Station
	 * @param array $row
	 *
	 * @return mixed|string
	 */
	public function getRouteLastStation($row = array()){
		$routeLastStation = '';
		if (array_key_exists('runArrivalStation', $row)) {
			$routeLastStation = $row['runArrivalStation'];
		}
		return $routeLastStation;
	}

}
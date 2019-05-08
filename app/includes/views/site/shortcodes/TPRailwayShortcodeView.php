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
use app\includes\common\TPOption;
use app\includes\TPPlugin;
use \app\includes\common\TpPluginHelper;

class TPRailwayShortcodeView {

	public function __construct()
	{

	}

	public function renderTable($args = array()) {
		$defaults = array(
			'rows' => array(),
			'origin' => '',
			'destination' => '',
			'origin_title' => '',
			'destination_title' => '',
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

        if (!is_array($rows) || TpPluginHelper::count($rows) < 1) return $this->renderViewIfEmptyTable();

		$html .= '<div class="TPTrainTable">
                     <div class="TP-Plugin-Tables_wrapper clearfix TP-HotelsTableWrapper">'
                     .$this->renderTitleTable($off_title, $title, $shortcode, $origin_title, $destination_title)
                     .'<div class="dataTables_wrapper no-footer">'
                        .'<table class="TPTableShortcode TP-Plugin-Tables_box  TP-rwd-table no-footer dataTable" '
                            .'data-paginate="'.$paginate.'" '
                            .'data-paginate_limit="' .TPPlugin::$options['shortcodes_railway'][$shortcode]['paginate'].'" '
                            .'data-sort_column="'.$this->getSortColumn($shortcode).'">'
                            .$this->renderHeadTable($shortcode)
                            .$this->renderBodyTable($shortcode, $origin, $destination, $rows, $subid, $language, $currency)
                        .'</table>'
                        .'</div>'
		            .'</div>'
				.'</div>';

		return $html;
		//return var_dump("<pre>", $args, "</pre>");
	}

	public function renderViewIfEmptyTable(){
		//error_log('renderViewIfEmptyTable');
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
		return TPPlugin::$options['shortcodes_railway'][$shortcode]['sort_column'];
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

			switch($selected_field) {
				//Отправление / Departure
				case 'departure':
					$headTable .= '<td class="TP'.$selected_field.'Td '
					              .' TPTH'.$selected_field.'Td '
					              .$this->tdClassHidden($shortcode, $selected_field)
					              .' TPTableHead tp-date-column">'
					              .'<span>'. $this->getTableTheadTDFieldLabel($selected_field) .'</span>'
					              .'<i class="TP-sort-chevron fa"></i>'
					              .' </td>';
					break;
                //Прибытие / Arrival
                case 'arrival':
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .' TPTH'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .'<span>'. $this->getTableTheadTDFieldLabel($selected_field) .'</span>'
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                //Дата поездки/ Dates
                case 'dates':
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .' TPTH'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-nosort-column">'
                        .'<span>'. $this->getTableTheadTDFieldLabel($selected_field) .'</span>'
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                //Примерные цены / Prices
                case 'prices':
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .' TPTH'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-price-column">'
                        .'<span>'. $this->getTableTheadTDFieldLabel($selected_field) .'</span>'
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                //В пути, Duration
                case 'duration':
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .' TPTH'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .'<span>'. $this->getTableTheadTDFieldLabel($selected_field) .'</span>'
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                //Время отправления / Departure Time
                case 'departure_time':
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .' TPTH'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .'<span>'. $this->getTableTheadTDFieldLabel($selected_field) .'</span>'
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                //Время прибытия/ Arrival Time
                case 'arrival_time':
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .' TPTH'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .'<span>'. $this->getTableTheadTDFieldLabel($selected_field) .'</span>'
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
				default:
					$headTable .= '<td class="TP'.$selected_field.'Td '
					              .' TPTH'.$selected_field.'Td '
					              .$this->tdClassHidden($shortcode, $selected_field)
					              .' TPTableHead">'
					              .'<span>'. $this->getTableTheadTDFieldLabel($selected_field) .'</span>'
					              .'<i class="TP-sort-chevron fa"></i>'
					              .' </td>';
					break;
			}

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
				//Маршрут, Route
				'route',
				//В пути, Duration
				'duration',
				//Откуда / From
				'origin',
				//Куда / To
				'destination',
				//Время отправления / Departure Time
				'departure_time',
				//Время прибытия/ Arrival Time
				'arrival_time',
				//Начальная станция маршрута / Route's First Station
				'route_first_station',
				//Конечная станция маршрута / Route's Last Station
				'route_last_station'
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
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).' '
                                    .$this->getTDPriceClass($row).'">'
                                .$this->getPrices($row)
                            .'</td>';
                        break;
                    //Дата поездки/ Dates
                    case 'dates':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">'
                                .$this->getDates($row, $shortcode, $subid, $origin, $destination)
                            .'</td>';
                        break;
                    //Откуда / From
                    case 'origin':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">'
                                .$this->getOrigin($row)
                            .'</td>';
                        break;
                    //Куда / To
                    case 'destination':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">'
                                .$this->getDestination($row)
                            .'</td>';
                        break;
                    //Время отправления / Departure Time
                    case 'departure_time':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">'
                                .$this->getDepartureTime($row)
                            .'</td>';
                        break;
                    //Время прибытия/ Arrival Time
                    case 'arrival_time':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">'
                                      .$this->getArrivalTime($row)
                            .'</td>';
                        break;
                    //Начальная станция маршрута / Route's First Station
                    case 'route_first_station':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">'
                                      .$this->getRouteFirstStation($row)
                            .'</td>';
                        break;
                    //Конечная станция маршрута / Route's Last Station
                    case 'route_last_station':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">'
                                      .$this->getRouteLastStation($row)
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
				$train .= '<span class="train-color">"'
				            .$row['name']
						.'"</span>';
			} else {
				//error_log(print_r($row, true) );
				if (array_key_exists('firm', $row)) {
					if ($row['firm'] == true){
						$train .= '<span class="train-color t-gray">"'
						        ._x('фирм', 'railway shortcode view train', TPOPlUGIN_TEXTDOMAIN)
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
            $departure = '<span class="train-color t-gray">'.$runDepartureStation.'</span>'
                .' → '.$departureStation;
        }
        //
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
            $arrival = $arrivalStation.' → '
                .'<span class="train-color t-gray">'.$runArrivalStation.'</span>';
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

        $date = date('H:i', strtotime($departureTime));
        //error_log($departureTime);
        //error_log(date('d-m-Y H:i', strtotime($departureTime)));

	    /*G*/
        //$subsDate = explode(':',$date);
	    //$secondTime =  ($subsDate[0] * HOUR_IN_SECONDS) + ($subsDate[1] * MINUTE_IN_SECONDS);

        $departure = '<span class="departure_time">'.$date.'</span>'
            .' <span class="train-color span-timeComming t-gray">'.$departureStation.'</span>';
        return '<p class="TP-tdContent" data-tptime="'.strtotime($departureTime).'" '
               .'data-date="'.date('d-m-Y H:i', strtotime($departureTime)).'">'
               .$departure.'</p>';
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
        $arrival = '<span class="comming_time" data-date="'.date('d-m-Y H:i', strtotime($arrivalTime)).'">'
                   .date('H:i', strtotime($arrivalTime)).'</span>'
            .$this->getDurationDay($row)
            .' <span class="train-color span-timeComming t-gray">'.$arrivalStation.'</span>';
        return '<p class="TP-tdContent" data-tptime="'.strtotime($arrivalTime).'" '
        .' data-date="'.date('d-m-Y H:i', strtotime($arrivalTime)).'">'.$arrival.'</p>';
    }

    /**
     * @param $n
     * @return int
     */
    public function getPluralType($n){
        if (TPLang::getLang() == TPLang::getLangRU()){
            return ($n%10==1 && $n%100!=11 ? 0 : ($n%10>=2 && $n%10<=4 && ($n%100<10 || $n%100>=20) ? 1 : 2));
        } else {
            return ($n != 1) ? 1 : 0;
        }

    }

    public function getDurationDay($row = array()){
        $durationDay = '';
        $travelTimeInSeconds = 0;
        if (array_key_exists('travelTimeInSeconds', $row)) {
            $travelTimeInSeconds = $row['travelTimeInSeconds'];
        }
        if ($travelTimeInSeconds > 0){
            $day = 0;
            $day = floor($travelTimeInSeconds/DAY_IN_SECONDS);
            if ($day > 0){
                $durationDay = $day.' '.TPFieldsLabelTable::getDurationDayLabel($this->getPluralType($day));
                $durationDay = ' <span class="tp-duration-day train-color t-gray">+'.$durationDay.'</span>';
            }
        }
        return $durationDay;
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
            $travelTimeInSeconds = $this->durationSecondsToTime($row['travelTimeInSeconds']);
        }
        $duration = '<span class="TP-trainWayTime">'.$travelTimeInSeconds.'<span>';
        return '<p class="TP-tdContent" data-tptime="'.$travelTimeInSeconds.'">'.$duration.'</p>';
    }

    public function durationSecondsToTime($seconds)
    {
        $string = '';
        $day = floor($seconds/DAY_IN_SECONDS);
        $seconds -= $day * DAY_IN_SECONDS;
        $hour = floor($seconds/HOUR_IN_SECONDS);
        $seconds -= $hour * HOUR_IN_SECONDS;
        $minute = floor($seconds/MINUTE_IN_SECONDS);

        if ($day > 0){
            $string .= $day.TPFieldsLabelTable::getDateLabel('day').' ';

            if ($minute > 30){
                $hour += 1;
            }

            if ($hour > 0){
                $string .= $hour.TPFieldsLabelTable::getDateLabel('hour').' ';
            }
        } else {
            if ($hour > 0){
                $string .= $hour.TPFieldsLabelTable::getDateLabel('hour').' ';
            }
            if ($minute > 0){
                $string .= $minute.TPFieldsLabelTable::getDateLabel('minute').' ';
            }

        }


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
	    if (TpPluginHelper::count($categories) < 1 || $categories == false) return $prices;
        $priceData = array();
		foreach ($categories as $category){
			$type = '';
			$price = '';
			if (array_key_exists('type', $category)) {
				$type = $category['type'];
			}
			if (array_key_exists('price', $category)) {
				$price = $category['price'];
                $priceData[] = $price;
			}
			$prices .= '<div class="TP-train-text">'
				           .'<div class="TP-train-text_left">'
			                .TPFieldsLabelTable::getRailwayWagonTypeLabel($type)
			               .'</div>'
				           .'<div class="TP-train-text_center t-gray">~</div>'
				           .'<div class="TP-train-text_right">'
				                .$this->renderPrice($price, 'RUB')
				           .'</div>'
			           .'</div>';
		}
		$priceMin = 0;
        if (TpPluginHelper::count($priceData) > 0){
            $priceMin = min($priceData);
        }
    	return '<p class="TP-tdContent" data-price="'.$priceMin.'">'.$prices.'</p>';
    }

    /**
     * @param array $row
     * @return string
     */
    public function getTDPriceClass($row = array()){
        $tdPriceClass = "";
        if (array_key_exists('categories', $row)) {
            $categories = $row['categories'];
        }
        if (TpPluginHelper::count($categories)  == 1) {
            $tdPriceClass = 'TPTd_1';
        } elseif (TpPluginHelper::count($categories)  == 2) {
            $tdPriceClass = 'TPTd_2';
        } elseif (TpPluginHelper::count($categories)  == 3) {
            $tdPriceClass = 'TPTd_3';
        }

        return $tdPriceClass;
    }

	public function renderPrice($price, $currency){
		$currencyView = '';
		/*switch (TPPlugin::$options['local']['currency_symbol_display']){
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
		}*/
		$price = number_format($price, 0, '.', ' ');
        $currencyView = $price.'<span class="tp-currency">р.</span>';

		return $currencyView;
	}

	/**
	 * Дата поездки/ Dates
	 * @param array $row
	 *
	 * @return string
	 */
	public function getDates($row = array(), $typeShortcode, $subid, $origin, $destination){
		$dates = '';
		$btnTxt = "";
		if (isset(TPPlugin::$options['shortcodes_railway'][$typeShortcode]['title_button'][TPLang::getLang()])){
			$btnTxt = TPPlugin::$options['shortcodes_railway'][$typeShortcode]['title_button'][TPLang::getLang()];
		}else{
			$btnTxt = TPPlugin::$options['shortcodes_railway'][$typeShortcode]['title_button'][TPLang::getDefaultLang()];
		}

        $targetURL = 0;
        $target = '';
        if (isset(TPPlugin::$options['config']['target_url'])) {
            $targetURL = 1;
            $target = ' target="_blank" ';
        }

		/*$dates = '<a href="#" class="TP-Plugin-Tables_link TPButtonTable TPButtonTableDates" '
            .' data-href="'.$this->getURL($row, $subid).'" data-target="'.$targetURL.'">'
            .$btnTxt.'</a>';*/
        $dates = '<a href="'.$this->getURL($row, $subid, $origin, $destination).'" class="TP-Plugin-Tables_link TPButtonTable" '
            .' '.$target.'>'
            .$btnTxt.'</a>';
		return '<p class="TP-tdContent">'.$dates.'</p>';
	}

    /**
     * @param array $row
     * @return string
     */
	public function getURL($row = array(), $subid, $origin, $destination){
        $URL = '';
        $marker = '';
        $promo_id = '';
        $source_type = '';
        $type = '';
        $custom_url = '';
        $departureStation = '';
        $arrivalStation = '';
        $runDepartureStation = '';
        $runArrivalStation = '';
        $numberForUrl = '';
        $from = '';
        $date = '';
        $nnst1 = '';
        $nnst2 = '';
        $URL = 'https://c45.travelpayouts.com/click';
        $marker = TPPlugin::$options['account']['marker'];
        $marker = '?shmarker='.$marker;
        $marker .= TPOption::getExtraMarker();
        if (!empty($subid)){
        	$marker .= '_'.$subid;
        }
        $promo_id = '&promo_id=1294';
        $source_type = '&source_type=customlink';
        $type = '&type=click';
        $custom_url = '&custom_url='.urlencode('https://www.tutu.ru/poezda/rasp_d.php');
        $nnst1 = '?nnst1='.$origin;
        $nnst2 = '&nnst2='.$destination;
        //$custom_url = '&custom_url='.urlencode('https://www.tutu.ru/poezda/order/');
        //$departureStation = '?dep_st=' .$origin;
        /*if (array_key_exists('departureStationCode', $row)) {
            $departureStation .= $row['departureStationCode'];
        }*/
        //$arrivalStation = '&arr_st='.$destination;
        /*if (array_key_exists('arrivalStationCode', $row)) {
            $arrivalStation .= $row['arrivalStationCode'];
        }*/

        /*$numberForUrl = '&tn=';
        if (array_key_exists('numberForUrl', $row)) {
            $numberForUrl .= $row['numberForUrl'];
        }
        $from = '&from=calendar';*/

        /*$runDepartureStation = '&departure_st=';
        if (array_key_exists('runDepartureStationCode', $row)) {
            $runDepartureStation .= $row['runDepartureStationCode'];
        }
        $runArrivalStation = '&arrival_st=';
        if (array_key_exists('runArrivalStationCode', $row)) {
            $runArrivalStation .= $row['runArrivalStationCode'];
        }*/

        //$date = '&date=';

        /*$URL .= $marker.$promo_id.$source_type.$type.$custom_url.urlencode($departureStation.$arrivalStation
                .$numberForUrl.$from.$runDepartureStation.$runArrivalStation.$date);*/

        $URL .= $marker.$promo_id.$source_type.$type.$custom_url.urlencode($nnst1.$nnst2);
        return $URL;
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
		return '<p class="TP-tdContent">'.$origin.'</p>';
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
		return '<p class="TP-tdContent">'.$destination.'</p>';
	}

	/**
	 * Время отправления / Departure Time
	 * @param array $row
	 *
	 * @return string
	 */
	public function getDepartureTime($row = array()){
		$departureTime = '';
        $departureTimeSecond = 0;
		if (array_key_exists('departureTime', $row)) {
			$departureTime = date('H:i', strtotime($row['departureTime']));
            $departureTimeSecond = strtotime($row['departureTime']);
		}
		return '<p class="TP-tdContent" data-tptime="'.$departureTimeSecond.'">'.$departureTime.'</p>';
	}

	/**
	 * Время прибытия/ Arrival Time
	 * @param array $row
	 *
	 * @return string
	 */
	public function getArrivalTime($row = array()){
		$arrivalTime = '';
		$arrivalTimeSecond = 0;
		if (array_key_exists('arrivalTime', $row)) {
			$arrivalTime = date('H:i', strtotime($row['arrivalTime']));
            $arrivalTimeSecond = strtotime($row['arrivalTime']);
		}
		return '<p class="TP-tdContent" data-tptime="'.$arrivalTimeSecond.'">'.$arrivalTime.'</p>';
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
		return '<p class="TP-tdContent">'.$routeFirstStation.'</p>';
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
		return '<p class="TP-tdContent">'.$routeLastStation.'</p>';
	}

}

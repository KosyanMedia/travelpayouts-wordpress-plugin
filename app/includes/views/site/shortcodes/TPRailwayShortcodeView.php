<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.05.17
 * Time: 22:58
 */

namespace app\includes\views\site\shortcodes;


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
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent">'
						              .$this->getTrain($row)
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
		return $train;
	}
}
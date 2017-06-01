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
		            .'</table>'
		         .'</div>';

		         //$this->renderHeadTable($shortcode)
		         //$this->renderBodyTable()
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
			switch($selected_field) {
				//name => Название
				case "name":
					$headTable .= '<td class="TP'.$selected_field.'Td '
					              .$this->tdClassHidden($shortcode, $selected_field)
					              .' TPTableHead">'
					              .$this->getTableTheadTDFieldLabel($selected_field)
					              .'<i class="TP-sort-chevron fa"></i>'
					              .' </td>';
					break;
				// stars => Звезды
				case "stars":
					$headTable .= '<td class="TP'.$selected_field.'Td '
					              .$this->tdClassHidden($shortcode, $selected_field)
					              .' TPTableHead">'
					              .$this->getTableTheadTDFieldLabel($selected_field)
					              .'<i class="TP-sort-chevron fa"></i>'
					              .' </td>';
					break;
				// rating => Оценка пользователей
				case "rating":
					$headTable .= '<td class="TP'.$selected_field.'Td '
					              .$this->tdClassHidden($shortcode, $selected_field)
					              .' TPTableHead">'
					              .$this->getTableTheadTDFieldLabel($selected_field)
					              .'<i class="TP-sort-chevron fa"></i>'
					              .' </td>';
					break;
				// distance => Расстояние до центра
				case "distance":
					$headTable .= '<td class="TP'.$selected_field.'Td '
					              .$this->tdClassHidden($shortcode, $selected_field)
					              .' TPTableHead">'
					              .$this->getTableTheadTDFieldLabel($selected_field)
					              .'<i class="TP-sort-chevron fa"></i>'
					              .' </td>';
					break;

				// price_pn => Цена за ночь
				// [last_price_info][price_pn] => Цена за ночь

				case "price_pn":
					$headTable .= '<td class="TP'.$selected_field.'Td '
					              .$this->tdClassHidden($shortcode, $selected_field)
					              .' TPTableHead tp-price-column">'
					              .$this->getTableTheadTDFieldLabel($selected_field)
					              .'<i class="TP-sort-chevron fa"></i>'
					              .' </td>';
					break;
				// old_price_pn => Цена до скидки
				//  [last_price_info][old_price_pn] => Цена до скидки
				case "old_price_pn":
					$headTable .= '<td class="TP'.$selected_field.'Td '
					              .$this->tdClassHidden($shortcode, $selected_field)
					              .' TPTableHead tp-price-column">'
					              .$this->getTableTheadTDFieldLabel($selected_field)
					              .'<i class="TP-sort-chevron fa"></i>'
					              .' </td>';
					break;
				// discount => Скидка
				case "discount":
					$headTable .= '<td class="TP'.$selected_field.'Td '
					              .$this->tdClassHidden($shortcode, $selected_field)
					              .' TPTableHead tp-price-column">'
					              .$this->getTableTheadTDFieldLabel($selected_field)
					              .'<i class="TP-sort-chevron fa"></i>'
					              .' </td>';
					break;
				// old_price_and_discount => Старая цена и скидка
				//  [last_price_info][price_pn]  -  [last_price_info][discount] %
				case "old_price_and_discount":
					$headTable .= '<td class="TP'.$selected_field.'Td '
					              .$this->tdClassHidden($shortcode, $selected_field)
					              .' TPTableHead tp-price-column">'
					              .$this->getTableTheadTDFieldLabel($selected_field)
					              .'<i class="TP-sort-chevron fa"></i>'
					              .' </td>';
					break;
				// old_price_and_new_price => Старая и новая цена
				//  [last_price_info][old_price_pn]  [last_price_info][price_pn]
				case "old_price_and_new_price":
					$headTable .= '<td class="TP'.$selected_field.'Td '
					              .$this->tdClassHidden($shortcode, $selected_field)
					              .' TPTableHead tp-price-column">'
					              .$this->getTableTheadTDFieldLabel($selected_field)
					              .'<i class="TP-sort-chevron fa"></i>'
					              .' </td>';
					break;
				// button => Кнопка
				case "button":
					$headTable .= '<td class="TP'.$selected_field.'Td '
					              .$this->tdClassHidden($shortcode, $selected_field)
					              .' TPTableHead tp-price-column">'
					              .$this->getTableTheadTDFieldLabel($selected_field)
					              .'<i class="TP-sort-chevron fa"></i>'
					              .' </td>';
					break;
				default:
					$headTable .= '<td class="TP'.$selected_field.'Td '
					              .$this->tdClassHidden($shortcode, $selected_field)
					              .' TPTableHead">'
					              . $this->getTableTheadTDFieldLabel($selected_field)
					              .'<i class="TP-sort-chevron fa"></i>'
					              .' </td>';
					break;

			}
		}
		$headTable .= '</tr></thead>';
		return $headTable;
	}
}
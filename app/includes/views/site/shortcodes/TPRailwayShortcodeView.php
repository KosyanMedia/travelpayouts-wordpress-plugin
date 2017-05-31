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
		         .$this->renderTitleTable($off_title, $title, $shortcode, $city, $city_label,
				$type_selections_label, $dates_label)
		         .'<!--<table class="TPTableShortcode TP-Plugin-Tables_box  TP-rwd-table TP-rwd-table-avio"
                        data-paginate="'.$paginate.'"
                        data-paginate_limit="'
		                .TPPlugin::$options['shortcodes_railway'][$shortcode]['paginate']
		         .'" data-sort_column="$this->getSortColumn($shortcode)">'
		         //$this->renderHeadTable($shortcode)
		         //$this->renderBodyTable()
		         .'</table>-->
                </div>';

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
				if(isset(TPPlugin::$options['shortcodes_hotels'][$shortcode]['title'][TPLang::getLang()])){
					$title = TPPlugin::$options['shortcodes_hotels'][$shortcode]['title'][TPLang::getLang()];
				}else{
					$title = \app\includes\TPPlugin::$options['shortcodes_hotels'][$shortcode]['title'][TPLang::getDefaultLang()];
				}
			}
			if(!empty($title)){

				if(strpos($title, '{location}') !== false){
					$title = str_replace('{location}', '<span data-city-location="'.$cityLabel.'">'.$cityLabel.'</span>' , $title);
				}



			}
			return '<'.\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['tag'].' class="TP-TitleTables">'.$title.'</'.\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['tag'].'>';
		}
		return '';
	}
}
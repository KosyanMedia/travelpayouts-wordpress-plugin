<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 24.05.17
 * Time: 14:34
 */

namespace app\includes\models\admin\menu;
use \app\includes\TPPlugin;
use \app\includes\common\TPLang;

class TPFieldRailway {
	public function TPFieldThemesTable(){
		?>
		<input class="TPThemesNameHidden" type="hidden"
		       name="<?php echo TPOPlUGIN_OPTION_NAME;?>[themes_table_railway][name]"
		       value="<?php echo TPPlugin::$options['themes_table_railway']['name']?>"/>
		<?php
	}
	public function TPFieldShortcode_1(){
		$shortcode = 1;
		?>
        <div class="TP-HeadTable">
			<?php $this->getFieldTitle($shortcode); ?>
			<?php $this->getFieldTitleTag($shortcode); ?>
        </div>
		<?php //$this->getFieldExtraMarker($shortcode); ?>
		<?php //$this->getFieldPaginate($shortcode); ?>
		<?php //$this->getFieldLinkWithoutDates($shortcode); ?>
		<?php //$this->getFieldTitleButton($shortcode); ?>
		<?php //$this->getFieldSortTd($shortcode); ?>
		<?php
		//$this->getFieldSortableSection($shortcode);

	}

	/**
	 * @param $shortcode
	 * @param string $type
	 */
	public function getFieldTitle($shortcode, $type = 'shortcodes_railway'){
		?>
        <label>
            <span>
                <?php _ex('Title',
	                'admin page railway tab tables content title label', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
			<?php

			if (!array_key_exists(TPLang::getLang(), TPPlugin::$options[$type][$shortcode]['title'])){
				foreach(TPPlugin::$options[$type][$shortcode]['title'] as $key_local => $title){
					$typeFields = (TPLang::getDefaultLang() != $key_local)?'hidden':'text';
					?>
                    <input type="<?php echo $typeFields; ?>"
                           name="<?php echo TPOPlUGIN_OPTION_NAME;?>[<?php echo $type; ?>][<?php echo $shortcode; ?>][title][<?php echo $key_local; ?>]"
                           value="<?php echo esc_attr(TPPlugin::$options[$type][$shortcode]['title'][$key_local]) ?>"/>
					<?php
				}
			} else {
				foreach(TPPlugin::$options[$type][$shortcode]['title'] as $key_local => $title){
					$typeFields = (TPLang::getLang() != $key_local)?'hidden':'text';
					?>
                    <input type="<?php echo $typeFields; ?>"
                           name="<?php echo TPOPlUGIN_OPTION_NAME;?>[<?php echo $type; ?>][<?php echo $shortcode; ?>][title][<?php echo $key_local; ?>]"
                           value="<?php echo esc_attr(TPPlugin::$options[$type][$shortcode]['title'][$key_local]) ?>"/>
					<?php
				}
			}


            ?>
            <p>
	            <?php _ex('Use {origin} and {destination} variables to add the city automatically',
		            'admin page railway tab tables content title help', TPOPlUGIN_TEXTDOMAIN); ?>
            </p>
        </label>
		<?php
	}
	/**
	 * @param $shortcode
	 */
	public function getFieldTitleTag($shortcode, $type = 'shortcodes_railway'){
		?>
        <label>
            <span>
                <?php _ex('tp_admin_page_hotels_tab_tables_content_shortcode_select_title_tag_label',
	                '(Title tag)', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>

            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[<?php echo $type; ?>][<?php echo $shortcode; ?>][tag]" class="TP-Zelect">
                <option <?php selected(TPPlugin::$options[$type][$shortcode]['tag'], "div" ); ?>
                        value="div">
					<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_1',
						'(DIV)', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h1" ); ?>
                        value="h1">
					<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_2',
						'(H1)', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h2" ); ?>
                        value="h2">
					<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_3',
						'(H2)', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h3" ); ?>
                        value="h3">
					<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_4',
						'(H3)', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h4" ); ?>
                        value="h4">
					<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_5',
						'(H4)', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
            </select>

        </label>
		<?php
	}
}
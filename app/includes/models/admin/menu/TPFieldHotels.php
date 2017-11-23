<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 30.01.17
 * Time: 11:13 AM
 */

namespace app\includes\models\admin\menu;

use \app\includes\TPPlugin;
use \app\includes\common\TPLang;

class TPFieldHotels
{
    public function __construct(){

    }

    /**
     * Подборка отелей - Скидки
     * Hotels collection - Discounts
     */
    public function TPFieldShortcode_1(){
        $shortcode = 1;
        ?>
        <div class="TP-HeadTable">
            <?php $this->getFieldTitle($shortcode); ?>
            <?php $this->getFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->getFieldExtraMarker($shortcode); ?>
        <?php $this->getFieldPaginate($shortcode); ?>
        <?php $this->getFieldLinkWithoutDates($shortcode); ?>
        <?php $this->getFieldTitleButton($shortcode); ?>
        <?php $this->getFieldSortTd($shortcode); ?>
        <?php
        $this->getFieldSortableSection($shortcode);

    }

    /**
     * Подборки отелей на даты
     * Hotels collections for dates
     */

    public function TPFieldShortcode_2(){
        $shortcode = 2;
        ?>
        <div class="TP-HeadTable">
            <?php $this->getFieldTitle($shortcode); ?>
            <?php $this->getFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->getFieldExtraMarker($shortcode); ?>
        <?php $this->getFieldPaginate($shortcode); ?>
        <?php $this->getFieldLinkWithoutDates($shortcode); ?>
        <?php $this->getFieldTitleButton($shortcode); ?>
        <?php $this->getFieldSortTd($shortcode); ?>
        <?php
        $this->getFieldSortableSection($shortcode);

    }

    /**
     * Отели Города по цене ОТ-ДО
     * City hotels with price from to
     */
    public function TPFieldShortcode_3(){
        $shortcode = 3;
        ?>
        <div class="TP-HeadTable">
            <?php $this->getFieldTitle($shortcode); ?>
            <?php $this->getFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->getFieldExtraMarker($shortcode); ?>
        <?php $this->getFieldPaginate($shortcode); ?>
        <?php $this->getFieldTitleButton($shortcode); ?>
        <?php $this->getFieldSortTd($shortcode); ?>
        <?php
        $this->getFieldSortableSection($shortcode);
    }
    /**
     * Отели в городе по звездам
     * City hotels by stars
     */
    public function TPFieldShortcode_4(){
        $shortcode = 4;
        ?>
        <div class="TP-HeadTable">
            <?php $this->getFieldTitle($shortcode); ?>
            <?php $this->getFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->getFieldExtraMarker($shortcode); ?>
        <?php $this->getFieldPaginate($shortcode); ?>
        <?php $this->getFieldTitleButton($shortcode); ?>
        <?php $this->getFieldSortTd($shortcode); ?>
        <?php
        $this->getFieldSortableSection($shortcode);
    }
    /**
     * Стоимость проживания В ГОРОДЕ на Х дней
     * Stay price in city for X days
     */
    public function TPFieldShortcode_5(){
        $shortcode = 5;
        ?>
        <div class="TP-HeadTable">
            <?php $this->getFieldTitle($shortcode); ?>
            <?php $this->getFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->getFieldExtraMarker($shortcode); ?>
        <?php $this->getFieldPaginate($shortcode); ?>
        <?php $this->getFieldTitleButton($shortcode); ?>
        <?php $this->getFieldSortTd($shortcode); ?>
        <?php
        $this->getFieldSortableSection($shortcode);
    }
    /**
     * Стоимость проживания В ГОРОДЕ на уикенд
     * Stay price in city for weekend
     */
    public function TPFieldShortcode_6(){
        $shortcode = 6;
        ?>
        <div class="TP-HeadTable">
            <?php $this->getFieldTitle($shortcode); ?>
            <?php $this->getFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->getFieldExtraMarker($shortcode); ?>
        <?php $this->getFieldPaginate($shortcode); ?>
        <?php $this->getFieldTitleButton($shortcode); ?>
        <?php $this->getFieldSortTd($shortcode); ?>
        <?php
        $this->getFieldSortableSection($shortcode);
    }

    /**
     * @param $shortcode
     * @param string $type
     */
    public function getFieldTitle($shortcode, $type = 'shortcodes_hotels'){
        ?>
        <label>
            <span>
                <?php _ex('Title',
                    'tp_admin_page_hotels_tab_tables_content_shortcode_input_title_label', TPOPlUGIN_TEXTDOMAIN); ?>
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

            switch($shortcode){
                case 1:
                case 2:
                    ?>
                    <p>
                        <?php _ex('Use {location} variable for city autoset',
                            'tp_admin_page_hotels_tab_tables_content_shortcode_input_title_label_help_1', TPOPlUGIN_TEXTDOMAIN); ?>
                    </p>
                    <?php
                    break;
                case 3:
                    ?>
                    <p>
                        <?php
                        _ex('Use {location} variable for city autoset, {priceAvgMin} - price from, {priceAvgMax} - price to',
                            'tp_admin_page_hotels_tab_tables_content_shortcode_input_title_label_help_2',
                            TPOPlUGIN_TEXTDOMAIN);
                        ?>
                    </p>
                    <?php
                    break;
                case 4:
                    ?>
                    <p>
                        <?php
                        _ex('Use {location} variable for city autoset, {stars} - number of stars',
                            'tp_admin_page_hotels_tab_tables_content_shortcode_input_title_label_help_3',
                            TPOPlUGIN_TEXTDOMAIN);
                        ?>
                    </p>
                    <?php
                    break;
                case 5:
                    ?>
                    <p>
                        <?php
                        _ex('Use {location} variable for city autoset, {number} - number of days',
                            'tp_admin_page_hotels_tab_tables_content_shortcode_input_title_label_help_4',
                            TPOPlUGIN_TEXTDOMAIN);
                        ?>
                    </p>
                    <?php
                    break;
                case 6:
                    ?>
                    <p>
                        <?php
                        _ex('Use {location} variable for city autoset',
                            'tp_admin_page_hotels_tab_tables_content_shortcode_input_title_label_help_5',
                            TPOPlUGIN_TEXTDOMAIN);
                        ?>
                    </p>
                    <?php
                    break;

            }
            ?>
        </label>
        <?php
    }
    /**
     * @param $shortcode
     */
    public function getFieldTitleTag($shortcode, $type = 'shortcodes_hotels'){
        ?>
        <label>
            <span>
                <?php _ex('Title tag',
                    'tp_admin_page_hotels_tab_tables_content_shortcode_select_title_tag_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>

            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[<?php echo $type; ?>][<?php echo $shortcode; ?>][tag]" class="TP-Zelect">
                <option <?php selected(TPPlugin::$options[$type][$shortcode]['tag'], "div" ); ?>
                    value="div">
                    <?php _ex('DIV',
                        'tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_1', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h1" ); ?>
                    value="h1">
                    <?php _ex('H1',
                        'tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_2', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h2" ); ?>
                    value="h2">
                    <?php _ex('H2',
                        'tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_3', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h3" ); ?>
                    value="h3">
                    <?php _ex('H3',
                        'tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_4', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h4" ); ?>
                    value="h4">
                    <?php _ex('H4',
                        'tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_5', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
            </select>

        </label>
        <?php
    }

    /**
     * @param $shortcode
     */
    public function getFieldSortableSection($shortcode){
        $settingsShortcodeSortable = '';
        $settingsShortcodeSortableSelected = '';
        $fieldsInput = '';
        if(!empty(TPPlugin::$options['shortcodes_hotels'][$shortcode]['selected'])){
            $selected = array_unique(TPPlugin::$options['shortcodes_hotels'][$shortcode]['selected']);
            $fields = TPPlugin::$options['shortcodes_hotels'][$shortcode]['fields'];
            $arraySort = array();
            foreach($selected as $key_s => $selec){
                if (($key = array_search($selec, $fields)) !== false) {
                    $arraySort[] = $selec;
                    unset($fields[$key]);
                }
            }
            $arraySort = array_merge($arraySort, $fields);
            foreach($arraySort as $key_f => $field) {
                if(in_array($field, $selected)){
                    $settingsShortcodeSortableSelected .= '<li data-key="' . $field . '"
                              data-input-name="' . TPOPlUGIN_OPTION_NAME . '[shortcodes_hotels][' . $shortcode . '][selected][]"
                              class="">'
                        .$this->getFieldSortTDLabel($field)
                        .'<input type="hidden" class="itemSortableSelected" name="' . TPOPlUGIN_OPTION_NAME . '[shortcodes_hotels][' . $shortcode . '][selected][]" value="' . $field . '"/>'
                        .'</li>';
                } else {
                    $settingsShortcodeSortable .= '<li data-key="' . $field . '"
                              data-input-name="' . TPOPlUGIN_OPTION_NAME . '[shortcodes_hotels][' . $shortcode . '][selected][]"
                              class="">'
                        .$this->getFieldSortTDLabel($field)
                        .'</li>';
                }
                $fieldsInput .= '<input type="hidden"  name="' . TPOPlUGIN_OPTION_NAME . '[shortcodes_hotels][' . $shortcode . '][fields][]" value="' . $field . '"/>';
            }

        }else{

        }
        ?>

        <div class="TP-SortableSection">
            <p class="titleSortable">
                <?php _ex('Table Columns',
                    'tp_admin_page_hotels_tab_tables_content_shortcode_field_sort_column_table_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </p>
            <div class="TP-ContainerSorTable">
                <div data-force="30" class="layer TP-blockSortable" >
                    <p class="TP-titleBlockSortable">
                        <?php _ex('Not selected',
                            'tp_admin_page_hotels_tab_tables_content_shortcode_field_sort_column_table_label_not_select', TPOPlUGIN_TEXTDOMAIN); ?>
                    </p>
                    <ul class="block__list block__list_words connectedSortable settingsShortcodeSortable">
                        <?php echo $settingsShortcodeSortable; ?>
                    </ul>
                </div>

                <div data-force="18" class="layer TP-blockSortable">
                    <p class="TP-titleBlockSortable">
                        <?php _ex('Selected',
                            'tp_admin_page_hotels_tab_tables_content_shortcode_field_sort_column_table_label_select', TPOPlUGIN_TEXTDOMAIN); ?>
                    </p>
                    <ul class="block__list block__list_tags connectedSortable settingsShortcodeSortableSelected">
                        <?php echo $settingsShortcodeSortableSelected; ?>
                    </ul>
                </div>
                <?php echo $fieldsInput; ?>
            </div>
        </div>
        <?php
    }

    /**
     * @param $fieldKey
     * @return string
     */
    public function getFieldSortTDLabel($fieldKey){
        $fieldLabel = "";
        if(isset(TPPlugin::$options['local']['hotels_fields'][TPLang::getLang()]['label_default'][$fieldKey])){
            $fieldLabel = TPPlugin::$options['local']['hotels_fields'][TPLang::getLang()]['label_default'][$fieldKey];
        }else{
            $fieldLabel = TPPlugin::$options['local']['hotels_fields'][TPLang::getDefaultLang()]['label_default'][$fieldKey];
        }
        return $fieldLabel;
    }

    /**
     *
     */
    public function TPFieldHotelsThemesTable(){
        ?>
        <input class="TPThemesNameHidden" type="hidden"
               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[themes_table_hotels][name]"
               value="<?php echo TPPlugin::$options['themes_table_hotels']['name']?>"/>
        <?php
    }

    /**
     * @param $shortcode
     */
    public function getFieldExtraMarker($shortcode){
        ?>
        <div class="TP-HeadTable">
            <label>
                <span>
                    <!-- Extra marker -->
                    <!-- Дополнительный маркер -->
                    <?php _ex('SubId',
                        'tp_admin_page_hotels_tab_tables_content_shortcode_field_extra_table_marker_label', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_hotels][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(TPPlugin::$options['shortcodes_hotels'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
        <?php
    }

    /**
     * @param $shortcode
     */
    public function getFieldPaginate($shortcode){
        ?>
        <div class="ItemSub">
            <span>
                <?php _ex('Rows per page',
                    'tp_admin_page_hotels_tab_tables_content_shortcode_field_paginate_limit_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
            <div class="TP-childF">
                <div class="spinnerW clearfix" data-trigger="spinner">
                    <label>
                        <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_hotels][<?php echo $shortcode; ?>][paginate]"
                               type="text" data-rule="quantity"
                               value="<?php echo esc_attr(TPPlugin::$options['shortcodes_hotels'][$shortcode]['paginate']) ?>">
                    </label>
                    <div class="navSpinner">
                        <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                        <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                    </div>
                </div>
            </div>

        </div>
        <div class="TP-HeadTable">
            <input id="chek-p-<?php echo $shortcode; ?>" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_hotels][<?php echo $shortcode; ?>][paginate_switch]"
                   value="1" <?php checked(isset(TPPlugin::$options['shortcodes_hotels'][$shortcode]['paginate_switch']), 1) ?> hidden />
            <label for="chek-p-<?php echo $shortcode; ?>">
                <?php _ex('Paginate',
                    'tp_admin_page_hotels_tab_tables_content_shortcode_field_paginate_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>
            <label></label>

        </div>


        <?php
    }

    /**
     * @param $shortcode
     */
    public function getFieldLinkWithoutDates($shortcode) {
        ?>
        <div class="TP-HeadTable">
            <input id="chek-p12" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_hotels][<?php echo $shortcode; ?>][link_without_dates]"
                   value="1" <?php checked(isset(TPPlugin::$options['shortcodes_hotels'][$shortcode]['link_without_dates']), 1) ?> hidden />
            <label for="chek-p12">
                <?php _ex('Land without dates',
                    'tp admin page settings сonstructor hotels tables field hotels_link_without_dates label', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>
            <label></label>

        </div>
        <?php
    }


    public function getFieldTitleButton($shortcode){
        ?>
        <div class="TP-HeadTable">
            <label>
                <span>
                    <?php _ex('Button Title',
                        'tp_admin_page_hotels_tab_tables_content_shortcode_input_title_btn_title_label', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <?php

                if (!array_key_exists(TPLang::getLang(), TPPlugin::$options['shortcodes_hotels'][$shortcode]['title'])){
                    foreach(TPPlugin::$options['shortcodes_hotels'][$shortcode]['title_button'] as $key_local => $title){
                        $typeFields = (TPLang::getDefaultLang() != $key_local)?'hidden':'text';
                        ?>
                        <input type="<?php echo $typeFields; ?>" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_hotels][<?php echo $shortcode; ?>][title_button][<?php echo $key_local; ?>]"
                               value="<?php echo esc_attr(TPPlugin::$options['shortcodes_hotels'][$shortcode]['title_button'][$key_local]) ?>"/>
                        <?php
                    }
                } else {
                    foreach(TPPlugin::$options['shortcodes_hotels'][$shortcode]['title_button'] as $key_local => $title){
                        $typeFields = (TPLang::getLang() != $key_local)?'hidden':'text';
                        ?>
                        <input type="<?php echo $typeFields; ?>" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_hotels][<?php echo $shortcode; ?>][title_button][<?php echo $key_local; ?>]"
                               value="<?php echo esc_attr(TPPlugin::$options['shortcodes_hotels'][$shortcode]['title_button'][$key_local]) ?>"/>
                        <?php
                    }
                }


                ?>
                <p>
                    <?php _ex('"price" variable can be used',
                        'tp_admin_page_hotels_tab_tables_content_shortcode_input_title_btn_title_label_help', TPOPlUGIN_TEXTDOMAIN); ?>
                </p>
            </label>
            <label></label>
        </div>
        <?php
    }

    public function getFieldSortTd($shortcode){

        ?>
        <div class="TP-HeadTable TPSortFieldSelect">
            <label class="TPSortFieldLabel">
                <span>
                    <?php _ex('Sort by column',
                        'tp_admin_page_hotels_tab_tables_content_shortcode_field_sort_column_label', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_hotels][<?php echo $shortcode; ?>][sort_column]" class="TP-Zelect TPSortField">
                    <?php
                    if(!empty(TPPlugin::$options['shortcodes_hotels'][$shortcode]['selected'])) {
                        $selected = TPPlugin::$options['shortcodes_hotels'][$shortcode]['selected'];
                        foreach($selected as $key => $sel){
                            ?>
                            <option value="<?php echo $key;?>" <?php selected( TPPlugin::$options['shortcodes_hotels'][$shortcode]['sort_column'], $key ); ?>>
                                <?php echo $this->getFieldSortTDLabel($sel);?>
                            </option>
                            <?php
                        }
                    }else{
                        ?>
                        <option disabled></option>
                        <?php
                    }
                    ?>
                </select>
            </label>
            <label></label>
        </div>
        <?php
    }

}
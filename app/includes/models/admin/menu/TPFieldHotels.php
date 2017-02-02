<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 30.01.17
 * Time: 11:13 AM
 */

namespace app\includes\models\admin\menu;


class TPFieldHotels
{
    public function __construct(){

    }

    /**
     * Подборки отелей
     */
    public function TPFieldShortcode_1(){
        $shortcode = 1;
        ?>
        <div class="TP-HeadTable">
            <?php $this->getFieldTitle($shortcode); ?>
            <?php $this->getFieldTitleTag($shortcode); ?>
        </div>
        <?php

    }
    /**
     * Отели Города по цене ОТ-ДО
     */
    public function TPFieldShortcode_2(){

    }
    /**
     * Отели в городе по звездам
     */
    public function TPFieldShortcode_3(){

    }
    /**
     * Стоимость проживания В ГОРОДЕ на Х дней
     */
    public function TPFieldShortcode_4(){

    }
    /**
     * Стоимость проживания В ГОРОДЕ на уикенд
     */
    public function TPFieldShortcode_5(){

    }

    public function getFieldTitle($shortcode, $type = 'shortcodes'){
        ?>
        <label>
            <span>
                <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_input_title_label',
                    '(Title)', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
            <?php

            if (!array_key_exists(\app\includes\common\TPLang::getLang(), \app\includes\TPPlugin::$options[$type][$shortcode]['title'])){
                foreach(\app\includes\TPPlugin::$options[$type][$shortcode]['title'] as $key_local => $title){
                    $typeFields = (\app\includes\common\TPLang::getDefaultLang() != $key_local)?'hidden':'text';
                    ?>
                    <input type="<?php echo $typeFields; ?>" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[<?php echo $type; ?>][<?php echo $shortcode; ?>][title][<?php echo $key_local; ?>]"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options[$type][$shortcode]['title'][$key_local]) ?>"/>
                    <?php
                }
            } else {
                foreach(\app\includes\TPPlugin::$options[$type][$shortcode]['title'] as $key_local => $title){
                    $typeFields = (\app\includes\common\TPLang::getLang() != $key_local)?'hidden':'text';
                    ?>
                    <input type="<?php echo $typeFields; ?>" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[<?php echo $type; ?>][<?php echo $shortcode; ?>][title][<?php echo $key_local; ?>]"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options[$type][$shortcode]['title'][$key_local]) ?>"/>
                    <?php
                }
            }

            switch($shortcode){
                case 10:
                    ?><p>
                    <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_input_title_label_help_1',
                    '(Use "airline" variable to add the Airlines automatically)', TPOPlUGIN_TEXTDOMAIN); ?>

                    </p><?php
                    break;
                default:
                    ?><p>
                    <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_input_title_label_help_2',
                    '(Use "origin" and "destination" variables to add the city automatically)', TPOPlUGIN_TEXTDOMAIN); ?>
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
    public function getFieldTitleTag($shortcode, $type = 'shortcodes'){
        ?>
        <label>
            <span>
                <?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_label',
                    '(Title tag)', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>

            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[<?php echo $type; ?>][<?php echo $shortcode; ?>][tag]" class="TP-Zelect">
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "div" ); ?>
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
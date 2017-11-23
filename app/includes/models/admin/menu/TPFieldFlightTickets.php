<?php
namespace app\includes\models\admin\menu;

use app\includes\models\admin\menu\TPSearchFormsModel;
use \app\includes\TPPlugin;
use \app\includes\common\TPLang;

class TPFieldFlightTickets {

    public function __construct(){

    }
    public function TPFieldThemesTable(){
        ?>
        <input class="TPThemesNameHidden" type="hidden"
               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[themes_table][name]"
               value="<?php echo \app\includes\TPPlugin::$options['themes_table']['name']?>"/>
        <?php
    }
    public function TPFieldStyleTable(){
        $classNotShowOption = '';
        if(\app\includes\TPPlugin::$options['themes_table']['name'] != 'default-theme')
            $classNotShowOption = 'TPNotShowOption';

        $font_family_attr = array(
            _x('Arial',
                'tp_admin_page_flights_tab_tickets_style_font_arial', TPOPlUGIN_TEXTDOMAIN),
            _x('Arial Black',
                'tp_admin_page_flights_tab_tickets_style_font_arial_black', TPOPlUGIN_TEXTDOMAIN),
            _x('Comic Sans MS',
                'tp_admin_page_flights_tab_tickets_style_font_comic_sans_MS', TPOPlUGIN_TEXTDOMAIN),
            _x('Courier New',
                'tp_admin_page_flights_tab_tickets_style_font_courier_new', TPOPlUGIN_TEXTDOMAIN),
            _x('Georgia',
                'tp_admin_page_flights_tab_tickets_style_font_georgia', TPOPlUGIN_TEXTDOMAIN),
            _x('Impact',
                'tp_admin_page_flights_tab_tickets_style_font_impact', TPOPlUGIN_TEXTDOMAIN),
            _x('Times New Roman',
                'tp_admin_page_flights_tab_tickets_style_times_new_roman', TPOPlUGIN_TEXTDOMAIN),
            _x('Trebuchet MS',
                'tp_admin_page_flights_tab_tickets_style_trebuchet_MS', TPOPlUGIN_TEXTDOMAIN),
            _x('Verdana',
                'tp_admin_page_flights_tab_tickets_style_verdana', TPOPlUGIN_TEXTDOMAIN),
            _x('Roboto',
                'tp_admin_page_flights_tab_tickets_style_roboto', TPOPlUGIN_TEXTDOMAIN),
            _x('Roboto Slab',
                'tp_admin_page_flights_tab_tickets_style_roboto_slab', TPOPlUGIN_TEXTDOMAIN),
            _x('Ubuntu',
                'tp_admin_page_flights_tab_tickets_style_ubuntu', TPOPlUGIN_TEXTDOMAIN),
            _x('Intro',
                'tp_admin_page_flights_tab_tickets_style_intro', TPOPlUGIN_TEXTDOMAIN),
            _x('Open Sans',
                'tp_admin_page_flights_tab_tickets_style_open_sans', TPOPlUGIN_TEXTDOMAIN),
        );
        ?>
        <p class="TP-SettingTitle">
            <?php _ex('Layout',
                'tp_admin_page_flights_tab_tickets_style_paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
        </p>

        <div class="TP-StyleTable">

            <div class="TP-StyleItem">
                <div class="TP-MainStyleTable">
                    <span>
                        <?php _ex('Header style',
                            'tp_admin_page_flights_tab_tickets_style_title_style_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <label class="TP-fontInput">
                        <select class="TP-Zelect" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][title_style][font_family]">
                            <?php
                            foreach($font_family_attr as $attr){
                                echo '<option '.selected( \app\includes\TPPlugin::$options['style_table']['title_style']['font_family'], $attr )
                                    .' value="'.$attr.'">'.$attr.'</option>';
                            }
                            ?>
                        </select>
                    </label>
                    <label class="TP-fontSizeInput">
                        <select class="TP-Zelect" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][title_style][font_size]">
                            <?php
                            for($i = 10; $i < 31; $i++){
                                echo '<option '.selected( \app\includes\TPPlugin::$options['style_table']['title_style']['font_size'], $i )
                                    .' value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </label>
                    <div class="TP-tracingFont">
                        <a class="BoldTracing <?php echo isset(\app\includes\TPPlugin::$options['style_table']['title_style']['font_style']['bold']) ? 'activeTracing' : ''; ?>" href="#">
                            <input type="checkbox" id="font-style-radio1"
                                   name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][title_style][font_style][bold]"
                                   value="1"
                                <?php checked(isset(\app\includes\TPPlugin::$options['style_table']['title_style']['font_style']['bold']), 1) ?>>
                            B
                        </a>
                        <a class="ItalicTracing <?php echo isset(\app\includes\TPPlugin::$options['style_table']['title_style']['font_style']['italic']) ? 'activeTracing' : ''; ?>" href="#">
                            <input type="checkbox" id="font-style-radio2"
                                   name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][title_style][font_style][italic]"
                                   value="1"
                                <?php checked(isset(\app\includes\TPPlugin::$options['style_table']['title_style']['font_style']['italic']), 1) ?>>
                            B
                        </a>
                        <a class="UnderlineTracing <?php echo isset(\app\includes\TPPlugin::$options['style_table']['title_style']['font_style']['underline']) ? 'activeTracing' : ''; ?>" href="#">
                            <input type="checkbox" id="font-style-radio3"
                                   name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][title_style][font_style][underline]"
                                   value="1"
                                <?php checked(isset(\app\includes\TPPlugin::$options['style_table']['title_style']['font_style']['underline']), 1) ?>>
                            B
                        </a>
                    </div>
                </div>
                <div class="TP-ColorStyle">
                    <label>
                        <input class="TP-ColorStyleInput color no-alpha" type="text"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][title_style][color]"
                               value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['title_style']['color']) ?>"/>
                        <!--<a class="btnColor"><?php //_e('select color', TPOPlUGIN_TEXTDOMAIN ); ?></a>-->
                    </label>
                </div>
            </div>

            <div class="TP-StyleItem  <?php echo $classNotShowOption; ?>">
                <div class="TP-MainStyleTable">
                    <span>
                        <?php _ex('Content',
                            'tp_admin_page_flights_tab_tickets_style_table_style_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <label class="TP-fontInput">
                        <select class="TP-Zelect" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][font_family]">
                            <?php
                            foreach($font_family_attr as $attr){
                                echo '<option '.selected( \app\includes\TPPlugin::$options['style_table']['table']['font_family'], $attr )
                                    .' value="'.$attr.'">'.$attr.'</option>';
                            }
                            ?>
                        </select>
                    </label>
                    <label class="TP-fontSizeInput">
                        <select class="TP-Zelect" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][font_size]">
                            <?php
                            for($i = 10; $i < 31; $i++){
                                echo '<option '.selected( \app\includes\TPPlugin::$options['style_table']['table']['font_size'], $i )
                                    .' value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </label>
                    <div class="TP-tracingFont">
                        <a class="BoldTracing <?php echo isset(\app\includes\TPPlugin::$options['style_table']['table']['font_style']['bold']) ? 'activeTracing' : ''; ?>" href="#">
                            <input type="checkbox" id="font-style-radio1"
                                   name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][font_style][bold]"
                                   value="1"
                                <?php checked(isset(\app\includes\TPPlugin::$options['style_table']['table']['font_style']['bold']), 1) ?>>
                            B
                        </a>
                        <a class="ItalicTracing <?php echo isset(\app\includes\TPPlugin::$options['style_table']['table']['font_style']['italic']) ? 'activeTracing' : ''; ?>" href="#">
                            <input type="checkbox" id="font-style-radio2"
                                   name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][font_style][italic]"
                                   value="1"
                                <?php checked(isset(\app\includes\TPPlugin::$options['style_table']['table']['font_style']['italic']), 1) ?>>
                            B
                        </a>
                        <a class="UnderlineTracing <?php echo isset(\app\includes\TPPlugin::$options['style_table']['table']['font_style']['underline']) ? 'activeTracing' : ''; ?>" href="#">
                            <input type="checkbox" id="font-style-radio3"
                                   name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][font_style][underline]"
                                   value="1"
                                <?php checked(isset(\app\includes\TPPlugin::$options['style_table']['table']['font_style']['underline']), 1) ?>>
                            B
                        </a>
                    </div>
                </div>
                <div class="TP-ColorStyle">
                    <label>
                        <input class="TP-ColorStyleInput color no-alpha" type="text"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][color]"
                               value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['table']['color']) ?>"/>
                        <!--<a class="btnColor"><?php //_e('select color', TPOPlUGIN_TEXTDOMAIN ); ?></a>-->
                    </label>
                </div>
            </div>

            <div class="TP-StyleItem  <?php echo $classNotShowOption; ?>">
                <div class="TP-MainStyleTable">
                    <span>
                        <?php _ex('Borders',
                            'tp_admin_page_flights_tab_tickets_style_table_border_style_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <label class="TP-lb-1" id="TPLineType" >
                        <select class="TP-Zelect" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][line_type]">
                            <option value="solid" <?php selected( \app\includes\TPPlugin::$options['style_table']['table']['line_type'], "solid" ) ?>>
                                <?php _ex('solid',
                                    'tp_admin_page_flights_tab_tickets_style_table_border_style_label_solid', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="dotted" <?php selected( \app\includes\TPPlugin::$options['style_table']['table']['line_type'], "dotted" ) ?>>
                                <?php _ex('dotted',
                                    'tp_admin_page_flights_tab_tickets_style_table_border_style_label_dotted', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="dashed" <?php selected( \app\includes\TPPlugin::$options['style_table']['table']['line_type'], "dashed" ) ?>>
                                <?php _ex('dashed',
                                    'tp_admin_page_flights_tab_tickets_style_table_border_style_label_dashed', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                        </select>
                    </label>
                    <label class="TP-lb-1">
                        <select class="TP-Zelect" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][line_size]">
                            <?php
                            for($i = 1; $i < 11; $i++){
                                echo '<option '.selected( \app\includes\TPPlugin::$options['style_table']['table']['line_size'], $i )
                                    .' value="'.$i.'">'.$i.' px</option>';
                            }
                            ?>
                        </select>
                    </label>
                    <div class="TP-ColorStyle TP-ColorStyle--cus">
                        <label>
                            <input class="TP-ColorStyleInput color no-alpha" type="text"
                                   name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][line_color]"
                                   value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['table']['line_color']) ?>"/>
                            <!--<a class="btnColor"><?php //_e('select color', TPOPlUGIN_TEXTDOMAIN ); ?></a>-->
                        </label>
                    </div>
                </div>

            </div>

            <div class="TP-StyleItem <?php echo $classNotShowOption; ?>">
                <div class="TP-ColorStyle TP-ColorStyle--cus">
                    <span>
                        <?php _ex('Background',
                            'tp_admin_page_flights_tab_tickets_style_table_background_color_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <label class="TP-BackgroundTables">
                        <input class="TP-ColorStyleInput color no-alpha" type="text"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][background_color]"
                               value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['table']['background_color']) ?>"/>
                        <!--<a class="btnColor"><?php //_e('select color', TPOPlUGIN_TEXTDOMAIN ); ?></a>-->

                    </label>
                </div>
                <div class="TP-ColorStyle TP-ColorStyle--cus TP-ColorStyleHead">
                    <span>
                        <?php _ex('Table header background',
                            'tp_admin_page_flights_tab_tickets_style_table_head_color_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <label class="TP-BackgroundTables">
                        <input class="TP-ColorStyleInput color no-alpha" type="text"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][head_color]"
                               value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['table']['head_color']) ?>"/>

                    </label>
                </div>
                <div class="TP-ColorStyle TP-ColorStyle--cus TP-ColorStyleHead">
                    <span>
                        <?php _ex('Table header font',
                            'tp_admin_page_flights_tab_tickets_style_table_head_text_color_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <label class="TP-BackgroundTables">
                        <input class="TP-ColorStyleInput color no-alpha" type="text"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][head_text_color]"
                               value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['table']['head_text_color']) ?>"/>

                    </label>
                </div>

            </div>

            <div class="TP-StyleItem <?php echo $classNotShowOption; ?>">
                <div class="TP-ColorStyle TP-ColorStyle--cus">
                    <span>
                        <?php _ex('Button background',
                            'tp_admin_page_flights_tab_tickets_style_button_background_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <label class="TP-BackgroundTables">
                        <input class="TP-ColorStyleInput color no-alpha" type="text"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][button][background]"
                               value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['button']['background']) ?>"/>
                        <!--<a class="btnColor"><?php //_e('select color', TPOPlUGIN_TEXTDOMAIN ); ?></a>-->

                    </label>
                </div>
                <div class="TP-ColorStyle TP-ColorStyle--cus TP-ColorStyleHead">
                    <span>
                        <?php _ex('Button border',
                            'tp_admin_page_flights_tab_tickets_style_button_border_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <label class="TP-BackgroundTables">
                        <input class="TP-ColorStyleInput color no-alpha" type="text"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][button][border]"
                               value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['button']['border']) ?>"/>

                    </label>
                </div>
                <div class="TP-ColorStyle TP-ColorStyle--cus TP-ColorStyleHead">
                    <span>
                        <?php _ex('Button font',
                            'tp_admin_page_flights_tab_tickets_style_button_font_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <label class="TP-BackgroundTables">
                        <input class="TP-ColorStyleInput color no-alpha" type="text"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][button][color]"
                               value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['button']['color']) ?>"/>

                    </label>
                </div>
                <div class="TP-tracingFont TP-tracingFontBtn">
                    <a class="BoldTracing <?php echo isset(\app\includes\TPPlugin::$options['style_table']['button']['font_style']['bold']) ? 'activeTracing' : ''; ?>" href="#">
                        <input type="checkbox" id="btn-font-style-radio1"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][button][font_style][bold]"
                               value="1"
                            <?php checked(isset(\app\includes\TPPlugin::$options['style_table']['button']['font_style']['bold']), 1) ?>>
                        B
                    </a>
                    <a class="ItalicTracing <?php echo isset(\app\includes\TPPlugin::$options['style_table']['button']['font_style']['italic']) ? 'activeTracing' : ''; ?>" href="#">
                        <input type="checkbox" id="btn-font-style-radio2"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][button][font_style][italic]"
                               value="1"
                            <?php checked(isset(\app\includes\TPPlugin::$options['style_table']['button']['font_style']['italic']), 1) ?>>
                        B
                    </a>
                    <a class="UnderlineTracing <?php echo isset(\app\includes\TPPlugin::$options['style_table']['button']['font_style']['underline']) ? 'activeTracing' : ''; ?>" href="#">
                        <input type="checkbox" id="btn-font-style-radio3"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][title_style][button][underline]"
                               value="1"
                            <?php checked(isset(\app\includes\TPPlugin::$options['style_table']['button']['font_style']['underline']), 1) ?>>
                        B
                    </a>
                </div>

            </div>
            <div class="TP-StyleItem">
                <input id="chek677" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][hyperlink]"
                       value="1" <?php checked(isset(\app\includes\TPPlugin::$options['style_table']['table']['hyperlink']), 1) ?> hidden />
                <label for="chek677">
                    <?php _ex('Show data as hyperlinks',
                        'tp_admin_page_flights_tab_tickets_style_input_hyperlink_label', TPOPlUGIN_TEXTDOMAIN); ?>
                </label>
            </div>
            <div class="TP-StyleItem">
                <input id="chek66" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][responsive]"
                       value="1" <?php checked(isset(\app\includes\TPPlugin::$options['style_table']['table']['responsive']), 1) ?> hidden />
                <label for="chek66">
                    <?php _ex('Enable Horizontal Scroll',
                        'tp_admin_page_flights_tab_tickets_style_input_responsive_label', TPOPlUGIN_TEXTDOMAIN); ?>
                </label>
                <div class="svg-img-1 svg-img-style-table">
                    <a href="#" class="tooltip-settings">
                        <span>
                             <?php _ex('The tables\' width won\'t be 100% of your content zone. When you resize your content zone (e.g. you have a responsible WP theme) - tables won\'t affect your design, but will have a horizontal scroll.',
                                 'tp_admin_page_flights_tab_tickets_style_input_responsive_label_help', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><g fill="#00B0DD">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 16 16"><g fill="#00B0DD">
                                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                    </a>
                </div>
            </div>
            <div class="TP-StyleItem">
                <a href="#" class="TP-deleteShortLincks TP-deleteShortLincks--cust TP-BtnDefaultStyle">
                    <i></i>
                    <?php _ex('Reset to Default styles',
                        'tp_admin_page_flights_tab_tickets_style_btn_default_style', TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
            </div>

        </div>


    <?php
    }
    /**
     * @param $shortcode
     */
    public function TPFieldTitle($shortcode, $type = 'shortcodes'){
        ?>
        <label>
            <span>
                <?php _ex('Title',
                    'tp_admin_page_flights_tab_tables_content_shortcode_input_title_label', TPOPlUGIN_TEXTDOMAIN); ?>
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
                    <?php _ex('Use "airline" variable to add the Airlines automatically',
                    'tp_admin_page_flights_tab_tables_content_shortcode_input_title_label_help_1', TPOPlUGIN_TEXTDOMAIN); ?>

                    </p><?php
                    break;
                default:
                    ?><p>
                    <?php _ex('Use "origin" and "destination" variables to add the city automatically',
                    'tp_admin_page_flights_tab_tables_content_shortcode_input_title_label_help_2', TPOPlUGIN_TEXTDOMAIN); ?>
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
    public function TPFieldTitleTag($shortcode, $type = 'shortcodes'){
        ?>
        <label>
            <span>
                <?php _ex('Title tag',
                    'tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>

            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[<?php echo $type; ?>][<?php echo $shortcode; ?>][tag]" class="TP-Zelect">
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "div" ); ?>
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
    public function TPFieldTitleButton($shortcode){
        ?>
        <label>
            <span>
                <?php _ex('Button Title',
                    'tp_admin_page_flights_tab_tables_content_shortcode_input_title_btn_title_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
            <?php

            if (!array_key_exists(\app\includes\common\TPLang::getLang(), \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['title'])){
                foreach(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['title_button'] as $key_local => $title){
                    $typeFields = (\app\includes\common\TPLang::getDefaultLang() != $key_local)?'hidden':'text';
                    ?>
                    <input type="<?php echo $typeFields; ?>" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][title_button][<?php echo $key_local; ?>]"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['title_button'][$key_local]) ?>"/>
                    <?php
                }
            } else {
                foreach(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['title_button'] as $key_local => $title){
                    $typeFields = (\app\includes\common\TPLang::getLang() != $key_local)?'hidden':'text';
                    ?>
                    <input type="<?php echo $typeFields; ?>" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][title_button][<?php echo $key_local; ?>]"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['title_button'][$key_local]) ?>"/>
                    <?php
                }
            }


            ?>
            <p>
                <?php _ex('"price" variable can be used',
                    'tp_admin_page_flights_tab_tables_content_shortcode_input_title_btn_title_label_help', TPOPlUGIN_TEXTDOMAIN); ?>
            </p>
        </label>
    <?php
    }
    /**
     * @param $shortcode
     */
    public function TPFieldPeriodType($shortcode){
        ?>
        <!--<select name="<?php //echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php //echo $shortcode;?>][period_type]" class="TP-Zelect">
            <option <?php //selected( \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['period_type'], "day" ); ?>
                value="day">day</option>
            <option <?php //selected( \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['period_type'], "year" ); ?>
                value="year">year</option>
            <option <?php //selected( \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['period_type'], "month" ); ?>
                value="month">month</option>
            <option <?php //selected( \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['period_type'], "season" ); ?>
                value="season">season</option>
        </select> -->
        <input type="hidden" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode;?>][period_type]"
               value="<?php echo \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['period_type'];?>">
    <?php
    }
    /**
     * @param $shortcode
     */
    public function TPFieldSortPrice($shortcode){
        ?>
        <span>
            <?php _ex('Order by price',
                'tp_admin_page_flights_tab_tables_content_shortcode_field_order_price_label', TPOPlUGIN_TEXTDOMAIN); ?>
        </span>
        <div class="TP-FormItem">
            <div class="ItemSub">
                <ul class="TP-listSet TP-listSet--cust">
                    <li>
                        <input id="rchek2" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][sort]"
                            <?php checked(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['sort'], 2) ?> hidden value="2" />
                        <label for="rchek2">
                            <?php _ex('Ascending',
                                'tp_admin_page_flights_tab_tables_content_shortcode_input_order_price_ascending', TPOPlUGIN_TEXTDOMAIN); ?>
                        </label>
                    </li>
                    <li>
                        <input id="rchek1" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][sort]"
                            <?php checked(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['sort'], 1) ?> hidden value="1" />
                        <label for="rchek1">
                            <?php _ex('Descending',
                                'tp_admin_page_flights_tab_tables_content_shortcode_input_order_price_descending', TPOPlUGIN_TEXTDOMAIN); ?>
                        </label>
                    </li>
                    <li>
                        <input id="rchek0" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][sort]"
                            <?php checked(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['sort'], 0) ?> hidden value="1" />
                        <label for="rchek0">
                            <?php _ex('Do not sort',
                                'tp_admin_page_flights_tab_tables_content_shortcode_input_order_price_do_not_sort', TPOPlUGIN_TEXTDOMAIN); ?>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    <?php
    }
    /**
     * @param $shortcode
     */
    public function TPSortableSection($shortcode){
        $settingsShortcodeSortable = '';
        $settingsShortcodeSortableSelected = '';
        $fieldsInput = '';
        if(!empty(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['selected'])){
            //$selected = \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['selected'];
            $selected = array_unique(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['selected']);
            $fields = \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['fields'];
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
                              data-input-name="' . TPOPlUGIN_OPTION_NAME . '[shortcodes][' . $shortcode . '][selected][]"
                              class="">'
                        .$this->getFieldSortTDLabel($field)
                        .'<input type="hidden" class="itemSortableSelected" name="' . TPOPlUGIN_OPTION_NAME . '[shortcodes][' . $shortcode . '][selected][]" value="' . $field . '"/>'
                        .'</li>';
                } else {
                    $settingsShortcodeSortable .= '<li data-key="' . $field . '"
                              data-input-name="' . TPOPlUGIN_OPTION_NAME . '[shortcodes][' . $shortcode . '][selected][]"
                              class="">'
                        .$this->getFieldSortTDLabel($field)
                        .'</li>';
                }
                $fieldsInput .= '<input type="hidden"  name="' . TPOPlUGIN_OPTION_NAME . '[shortcodes][' . $shortcode . '][fields][]" value="' . $field . '"/>';
            }

        }else{

        }
        ?>

        <div class="TP-SortableSection">
            <p class="titleSortable">
                <?php _ex('Table Columns',
                    'tp_admin_page_flights_tab_tables_content_shortcode_field_sort_column_table_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </p>
            <div class="TP-ContainerSorTable">
                <div data-force="30" class="layer TP-blockSortable" >
                    <p class="TP-titleBlockSortable">
                        <?php _ex('Not selected',
                            'tp_admin_page_flights_tab_tables_content_shortcode_field_sort_column_table_label_not_select', TPOPlUGIN_TEXTDOMAIN); ?>
                    </p>
                    <ul class="block__list block__list_words connectedSortable settingsShortcodeSortable">
                        <?php echo $settingsShortcodeSortable; ?>
                    </ul>
                </div>

                <div data-force="18" class="layer TP-blockSortable">
                    <p class="TP-titleBlockSortable">
                        <?php _ex('Selected',
                            'tp_admin_page_flights_tab_tables_content_shortcode_field_sort_column_table_label_select', TPOPlUGIN_TEXTDOMAIN); ?>
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
     * @param $shortcode
     */
    public function TPFieldPaginate($shortcode){
        ?>
        <div class="ItemSub">
            <span>
                <?php _ex('Rows per page',
                    'tp_admin_page_flights_tab_tables_content_shortcode_field_paginate_limit_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
            <div class="TP-childF">
                <div class="spinnerW clearfix" data-trigger="spinner">
                    <label>
                        <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][paginate]"
                               type="text" data-rule="quantity"
                               value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['paginate']) ?>">
                    </label>
                    <div class="navSpinner">
                        <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                        <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                    </div>
                </div>
            </div>

        </div>
        <div class="TP-HeadTable">
            <input id="chek-p1" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][paginate_switch]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['paginate_switch']), 1) ?> hidden />
            <label for="chek-p1">
                <?php _ex('Paginate',
                    'tp_admin_page_flights_tab_tables_content_shortcode_field_paginate_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>
            <label></label>

        </div>


    <?php
    }
    /**
     * @param $shortcode
     */
    public function TPFieldLimit($shortcode){
        ?>
        <div class="ItemSub">
            <span>
                <?php _ex('Limit',
                    'tp_admin_page_flights_tab_tables_content_shortcode_field_limit_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
            <div class="TP-childF">
                <div class="spinnerW clearfix" data-trigger="spinner">
                    <label>
                        <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][limit]"
                               type="text" data-rule="quantity"
                               value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['limit']) ?>">
                    </label>
                    <div class="navSpinner">
                        <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                        <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    /**
     * @param $shortcode
     */
    public function TPFieldPlusDate($shortcode){
        ?>
        <div class="ItemSub">
            <span>
                <?php _ex('Departure date',
                    'tp_admin_page_flights_tab_tables_content_shortcode_field_departure_date_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
            <div class="TP-childF">
                <div class="spinnerW clearfix" data-trigger="spinner">
                    <label>
                        <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][plus_depart_date]"
                               type="text" data-rule="quantity"
                               value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['plus_depart_date']) ?>">
                    </label>
                    <div class="navSpinner">
                        <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                        <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ItemSub">
            <span>
                <?php _ex('Return date',
                    'tp_admin_page_flights_tab_tables_content_shortcode_field_return_date_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
            <div class="TP-childF">
                <div class="spinnerW clearfix" data-trigger="spinner">
                    <label>
                        <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][plus_return_date]"
                               type="text" data-rule="quantity"
                               value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['plus_return_date']) ?>">
                    </label>
                    <div class="navSpinner">
                        <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                        <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    public function TPFieldTransplant($shortcode){
        ?>
        <div class="TP-HeadTable">
            <label>
                <span>
                    <?php _ex('Number of stops',
                        'tp_admin_page_flights_tab_tables_content_shortcode_field_number_stops_label', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][transplant]" class="TP-Zelect">
                    <option <?php selected( \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['transplant'], 0 ); ?>
                        value="0">
                        <?php _ex('All',
                            'tp_admin_page_flights_tab_tables_content_shortcode_field_number_stops_value_1', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option <?php selected( \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['transplant'], 1 ); ?>
                        value="1">
                        <?php _ex('No more than one stop',
                            'tp_admin_page_flights_tab_tables_content_shortcode_field_number_stops_value_2', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option <?php selected( \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['transplant'], 2 ); ?>
                        value="2">
                        <?php _ex('Direct',
                            'tp_admin_page_flights_tab_tables_content_shortcode_field_number_stops_value_3', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                </select>
            </label>
            <label>

            </label>
        </div>
        <?php
    }

    public function getFieldSortTDLabel($fieldKey){
        $fieldLabel = "";
        if(isset(\app\includes\TPPlugin::$options['local']['fields'][\app\includes\common\TPLang::getLang()]['label_default'][$fieldKey])){
            $fieldLabel = \app\includes\TPPlugin::$options['local']['fields'][\app\includes\common\TPLang::getLang()]['label_default'][$fieldKey];
        }else{
            $fieldLabel = \app\includes\TPPlugin::$options['local']['fields'][\app\includes\common\TPLang::getDefaultLang()]['label_default'][$fieldKey];
        }
        return $fieldLabel;
    }

    public function TPFieldSortTd($shortcode){

        ?>
        <div class="TP-HeadTable TPSortFieldSelect">
            <label class="TPSortFieldLabel">
                <span>
                    <?php _ex('Sort by column',
                        'tp_admin_page_flights_tab_tables_content_shortcode_field_sort_column_label', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][sort_column]" class="TP-Zelect TPSortField">
                     <?php
                         if(!empty(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['selected'])) {
                             $selected = \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['selected'];
                             foreach($selected as $key => $sel){
                                 ?>
                                 <option value="<?php echo $key;?>" <?php selected( \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['sort_column'], $key ); ?>>
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
    public function TPFieldExtraMarker($shortcode){
        ?>
        <div class="TP-HeadTable">
            <label>
                <span>
                    <!-- Extra marker -->
                    <!-- Дополнительный маркер -->
                    <?php _ex('SubId',
                        'tp_admin_page_flights_tab_tables_content_shortcode_field_extra_table_marker_label', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
        <?php
    }

    //Shortcode 1
    public function TPFieldShortcode_1(){
        $shortcode = 1;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->TPFieldExtraMarker($shortcode); ?>
        <?php $this->TPFieldTransplant($shortcode); ?>
        <?php $this->TPFieldPaginate($shortcode); ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitleButton($shortcode); ?>
            <label></label>
        </div>
        <?php
        $this->TPFieldSortTd($shortcode);
        $this->TPSortableSection($shortcode);
    }
    //Shortcode 2
    public function TPFieldShortcode_2(){
        $shortcode = 2;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->TPFieldExtraMarker($shortcode); ?>
        <div class="TP-ListSub TP-ListSubS-2">
            <?php $this->TPFieldPlusDate($shortcode); ?>
            <?php //$this->TPFieldPaginate($shortcode); ?>
            <div class="ItemSub">
                <span>
                    <?php _ex('Rows per page',
                        'tp_admin_page_flights_tab_tables_content_shortcode_field_paginate_limit_label', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <div class="TP-childF">
                    <div class="spinnerW clearfix" data-trigger="spinner">
                        <label>
                            <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][paginate]"
                                   type="text" data-rule="quantity"
                                   value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['paginate']) ?>">
                        </label>
                        <div class="navSpinner">
                            <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                            <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="TP-HeadTable">
            <input id="chek-p1" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][paginate_switch]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['paginate_switch']), 1) ?> hidden />
            <label for="chek-p1">
                <?php _ex('Paginate',
                    'tp_admin_page_flights_tab_tables_content_shortcode_field_paginate_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>
            <label></label>

        </div>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitleButton($shortcode); ?>
            <label></label>
        </div>
        <?php
        $this->TPFieldSortTd($shortcode);
        $this->TPSortableSection($shortcode);
    }
    //Shortcode 4
    public function TPFieldShortcode_4(){
        $shortcode = 4;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->TPFieldExtraMarker($shortcode); ?>
        <?php $this->TPFieldPaginate($shortcode); ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitleButton($shortcode); ?>
            <label></label>
        </div>
        <?php
        $this->TPFieldSortTd($shortcode);
        $this->TPSortableSection($shortcode);
    }
    //Shortcode 5
    public function TPFieldShortcode_5(){
        $shortcode = 5;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->TPFieldExtraMarker($shortcode); ?>
        <?php $this->TPFieldTransplant($shortcode); ?>
        <?php $this->TPFieldPaginate($shortcode); ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitleButton($shortcode); ?>
            <label></label>
        </div>
        <?php
        $this->TPFieldSortTd($shortcode);
        $this->TPSortableSection($shortcode);
    }
    //Shortcode 6
    public function TPFieldShortcode_6(){
        $shortcode = 6;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->TPFieldExtraMarker($shortcode); ?>
        <?php $this->TPFieldPaginate($shortcode); ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitleButton($shortcode); ?>
            <label></label>
        </div>
        <?php
        $this->TPFieldSortTd($shortcode);
        $this->TPSortableSection($shortcode);
    }
    //Shortcode 7
    public function TPFieldShortcode_7(){
        $shortcode = 7;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->TPFieldExtraMarker($shortcode); ?>
        <?php $this->TPFieldPaginate($shortcode); ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitleButton($shortcode); ?>
            <label></label>
        </div>
        <?php
        $this->TPFieldSortTd($shortcode);
        $this->TPSortableSection($shortcode);
    }
    //Shortcode 8
    public function TPFieldShortcode_8(){
        $shortcode = 8;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->TPFieldExtraMarker($shortcode); ?>
        <?php $this->TPFieldLimit($shortcode); ?>
        <?php $this->TPFieldPaginate($shortcode); ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitleButton($shortcode); ?>
            <label></label>
        </div>
        <?php
        $this->TPFieldSortTd($shortcode);
        $this->TPSortableSection($shortcode);
    }
    //Shortcode 9
    public function TPFieldShortcode_9(){
        $shortcode = 9;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->TPFieldExtraMarker($shortcode); ?>
        <?php $this->TPFieldPaginate($shortcode); ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitleButton($shortcode); ?>
            <label></label>
        </div>
        <?php
        $this->TPFieldSortTd($shortcode);
        $this->TPSortableSection($shortcode);
    }
    //Shortcode 10
    public function TPFieldShortcode_10(){
        $shortcode = 10;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->TPFieldExtraMarker($shortcode); ?>
        <?php $this->TPFieldLimit($shortcode); ?>
        <?php $this->TPFieldPaginate($shortcode); ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitleButton($shortcode); ?>
            <label></label>
        </div>
        <?php
        $this->TPFieldSortTd($shortcode);
        $this->TPSortableSection($shortcode);
    }
    //Shortcode 11
    public function TPFieldShortcode_11(){
        $shortcode = 11;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <!--<div class="TP-HeadTable">
            <label>
                <span><?php// _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php //echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php// echo $shortcode; ?>][extra_table_marker]"
                       value="<?php //echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>-->
        <?php $this->TPFieldPaginate($shortcode); ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitleButton($shortcode); ?>
            <label></label>
        </div>
        <?php
        $this->TPFieldSortTd($shortcode);
        $this->TPSortableSection($shortcode);
    }
    //Shortcode 12
    public function TPFieldShortcode_12(){
        $shortcode = 12;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->TPFieldExtraMarker($shortcode); ?>
        <?php $this->TPFieldLimit($shortcode); ?>

        <?php $this->TPFieldPeriodType($shortcode); ?>
        <!--<div class="TP-HeadTable">
            <label>
                <span><?php //_e('Type of period', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <?php //$this->TPFieldPeriodType($shortcode); ?>
            </label>
            <label>

            </label>
        </div>--
        <div class="TP-HeadTable">
            <label>
                <?php //$this->TPFieldSortPrice($shortcode); ?>
            </label>
            <label>

            </label>
        </div>-->
        <?php $this->TPFieldTransplant($shortcode); ?>
        <?php $this->TPFieldPaginate($shortcode); ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitleButton($shortcode); ?>
            <label></label>
        </div>
        <?php
        $this->TPFieldSortTd($shortcode);
        $this->TPSortableSection($shortcode);
    }
    //Shortcode 13
    public function TPFieldShortcode_13(){
        $shortcode = 13;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->TPFieldExtraMarker($shortcode); ?>
        <?php $this->TPFieldLimit($shortcode); ?>
        <?php $this->TPFieldPeriodType($shortcode); ?>
        <!--<div class="TP-HeadTable">
            <label>
                <span><?php //_e('Type of period', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <?php //$this->TPFieldPeriodType($shortcode); ?>
            </label>
            <label>

            </label>
        </div>--
        <div class="TP-HeadTable">
            <label>
                <?php //$this->TPFieldSortPrice($shortcode); ?>
            </label>
            <label>

            </label>
        </div>-->
        <?php $this->TPFieldTransplant($shortcode); ?>
        <?php $this->TPFieldPaginate($shortcode); ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitleButton($shortcode); ?>
            <label></label>
        </div>
        <?php
        $this->TPFieldSortTd($shortcode);
        $this->TPSortableSection($shortcode);
    }
    //Shortcode 14
    public function TPFieldShortcode_14(){
        $shortcode = 14;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <?php $this->TPFieldExtraMarker($shortcode); ?>
        <?php $this->TPFieldLimit($shortcode); ?>
        <?php $this->TPFieldPeriodType($shortcode); ?>
        <!--<div class="TP-HeadTable">
            <label>
                <span><?php //_e('Type of period', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <?php //$this->TPFieldPeriodType($shortcode); ?>
            </label>
            <label>

            </label>
        </div>--
        <div class="TP-HeadTable">
            <label>
                <?php //$this->TPFieldSortPrice($shortcode); ?>
            </label>
            <label>

            </label>
        </div>-->
        <?php $this->TPFieldTransplant($shortcode); ?>
        <?php $this->TPFieldPaginate($shortcode); ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitleButton($shortcode); ?>
            <label></label>
        </div>
        <?php
        $this->TPFieldSortTd($shortcode);
        $this->TPSortableSection($shortcode);
    }

    public function TPFieldOtherSettings(){

        $searchForms = TPSearchFormsModel::getAllSearchForms();


        //if ($searchForms != false):
        ?>
          <div class="TPTab-check">
            <div class="TPTab-check__inner">
            <span class="title">
                <?php _ex('If empty answer received',
                    'tp_admin_page_flights_tab_other_settings_field_label_empty_table', TPOPlUGIN_TEXTDOMAIN); ?>
                <div class="svg-img-1">
                    <a href="#" class="tooltip-settings">
                                <span>
                                    <?php
                                    _ex('Sometimes it happens our cash doesn\'t contain relevant data to the request you have set. Here you can set what users will see in such cases',
                                        'tp_admin_page_flights_tab_other_settings_field_label_empty_table_help',
                                        TPOPlUGIN_TEXTDOMAIN);
                                    ?>
                                </span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                    </a>
                </div>
            </span>
                <ul class="TP-listSet">
                    <li>
                        <input id="chekar-tabs-4" type="radio"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][type]"
                               value="3" <?php checked(TPPlugin::$options['shortcodes_settings']['empty']['type'], 3) ?>
                               hidden="">
                        <label for="chekar-tabs-4" id="cheker-label-4">
                            <?php _ex('Don\'t show a table',
                                'tp_admin_page_flights_tab_other_settings_field_label_empty_table_type_value_4_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </label>
                    </li>
                    <li>
                        <input id="chekar-tabs-1" type="radio"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][type]"
                               value="0" <?php checked(TPPlugin::$options['shortcodes_settings']['empty']['type'], 0) ?>
                               hidden="">
                        <label for="chekar-tabs-1" id="cheker-label-1">
                            <?php _ex('Show notification (link)',
                                'tp_admin_page_flights_tab_other_settings_field_label_empty_table_type_value_0_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </label>
                    </li>
                    <li>
                        <input id="chekar-tabs-3" type="radio"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][type]"
                               value="2" <?php checked(TPPlugin::$options['shortcodes_settings']['empty']['type'], 2) ?>
                               hidden="">
                        <label for="chekar-tabs-3" id="cheker-label-3">
                            <?php _ex('Show notification (button)',
                                'tp_admin_page_flights_tab_other_settings_field_label_empty_table_type_value_2_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </label>
                    </li>
                    <?php if ($searchForms != false): ?>
                        <li>
                            <input id="chekar-tabs-2" type="radio"
                                   name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][type]"
                                   value="1" <?php checked(TPPlugin::$options['shortcodes_settings']['empty']['type'], 1) ?>
                                   hidden="">
                            <label for="chekar-tabs-2" id="cheker-label-2">
                                <?php _ex('Show search form',
                                    'tp_admin_page_flights_tab_other_settings_field_label_empty_table_type_value_1_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
            <div class="TPTab-check__inner">
                <div class="block-swap-four <?php echo (TPPlugin::$options['shortcodes_settings']['empty']['type'] == 3)?'active':''; ?>"
                     id="chekar-content-4">
                    <input type="hidden" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][value][3]"
                           value="<?php echo  TPPlugin::$options['shortcodes_settings']['empty']['value'][3]; ?>">
                </div>
                <div class="block-swap-one <?php echo (TPPlugin::$options['shortcodes_settings']['empty']['type'] == 0)?'active':''; ?>"
                     id="chekar-content-1">
                    <?php $this->TPFieldOtherSettingsTableValueMsg(false, 0); ?>
                </div>
                <div class="block-swap-three <?php echo (TPPlugin::$options['shortcodes_settings']['empty']['type'] == 2)?'active':''; ?>"
                     id="chekar-content-3">
                    <?php $this->TPFieldOtherSettingsTableValueMsg(false, 2); ?>
                </div>
                <?php if ($searchForms != false): ?>
                    <div class="block-swap-two <?php echo (TPPlugin::$options['shortcodes_settings']['empty']['type'] == 1)?'active':''; ?>"
                         id="chekar-content-2">
                        <?php $this->TPFieldOtherSettingsTableValueSearchForm($searchForms); ?>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][value][1]"
                           value="<?php echo  TPPlugin::$options['shortcodes_settings']['empty']['value'][1]; ?>">
                <?php endif; ?>
            </div>
        </div>
        <?php
        /*else:
            ?>
            <div class="TPTab-check">
                <div class="TPTab-check__innerAll">
                    <span class="title">
                        <?php _ex('tp_admin_page_flights_tab_other_settings_field_label_empty_table',
                            '(If empty answer received)', TPOPlUGIN_TEXTDOMAIN); ?>
                        <div class="svg-img-1">
                            <a href="#" class="tooltip-settings">
                                        <span>
                                            <?php _ex('tp_admin_page_flights_tab_other_settings_field_label_empty_table_help',
                                                '(Sometimes it happens our cash doesn\'t contain relevant '
                                                .'data to the request you have set. Here you can set what '
                                                .'users will see in such cases)', TPOPlUGIN_TEXTDOMAIN); ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                                <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                                <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                            </a>
                        </div>
                    </span>
                    <?php $this->TPFieldOtherSettingsTableValueMsg(true); ?>
                </div>
            </div>
            <input type="hidden" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][type]" value="0">
            <input type="hidden" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][value][1]"
                   value="<?php echo  TPPlugin::$options['shortcodes_settings']['empty']['value'][1]; ?>">
            <?php
        endif;*/


    }
    public function TPFieldOtherSettings2(){
        ?>
        <div class="TP-HeadTable">
            <label>
                <h3 class="TPFieldEmptyResultH3"><?php _ex('If empty answer received',
                    'tp_admin_page_flights_tab_other_settings_field_label_empty_table', TPOPlUGIN_TEXTDOMAIN); ?>

                    <div class="svg-img-1">
                        <a href="#" class="tooltip-settings">
                                    <span>
                                        <?php _ex('Sometimes it happens our cash doesn\'t contain relevant data to the request you have set. Here you can set what users will see in such cases',
                                            'tp_admin_page_flights_tab_other_settings_field_label_empty_table_help', TPOPlUGIN_TEXTDOMAIN); ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                            <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                            <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                        </a>
                    </div>
                </h3>

            </label>
            <label></label>
        </div>
        <?php
        $searchForms = TPSearchFormsModel::getAllSearchForms();

        if ($searchForms != false):
            ?>
            <div class="TP-colForm">
                <div class="TP-FormItem">
                    <div class="ItemSub">
                        <ul class="TP-listSet">
                            <li>
                                <input id="shortcoderchek1" class="TPEmptyTableType" type="radio"
                                       name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][type]"
                                    <?php checked(TPPlugin::$options['shortcodes_settings']['empty']['type'], 0) ?> hidden value="0" />
                                <label for="shortcoderchek1">
                                    <?php _ex('Show notification',
                                        'tp_admin_page_flights_tab_other_settings_field_label_empty_table_type_value_0_label', TPOPlUGIN_TEXTDOMAIN); ?>
                                </label>
                            </li>


                            <li>
                                <input id="shortcoderchek2" class="TPEmptyTableType"  type="radio"
                                       name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][type]"
                                    <?php checked(TPPlugin::$options['shortcodes_settings']['empty']['type'], 1) ?> hidden value="1" />
                                <label for="shortcoderchek2">
                                    <?php _ex('Show search form',
                                        'tp_admin_page_flights_tab_other_settings_field_label_empty_table_type_value_1_label', TPOPlUGIN_TEXTDOMAIN); ?>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="TP-colForm">
                <div class="TP-FormItem">
                    <?php $this->TPFieldOtherSettingsTableValueMsg(); ?>
                    <div class="ItemSub" id="TPEmptyTableShowSearchForm">
                        <?php $this->TPFieldOtherSettingsTableValueSearchForm($searchForms); ?>
                    </div>
                </div>
            </div>
            <?php
        else:
            $this->TPFieldOtherSettingsTableValueMsg(true);
            ?>
            <input type="hidden" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][type]" value="0">
            <input type="hidden" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][value][1]"
                   value="<?php echo  TPPlugin::$options['shortcodes_settings']['empty']['value'][1]; ?>">
            <?php
        endif;
    }

    public function TPFieldOtherSettingsTableValueMsg($show = false, $type = 0){
        $parameters = "";
        if($show == false) $parameters = 'id="TPEmptyTableShowNotification"';


        if (!array_key_exists(TPLang::getLang(), TPPlugin::$options['shortcodes_settings']['empty']['value'][$type])){
            foreach(TPPlugin::$options['shortcodes_settings']['empty']['value'][$type] as $key_local => $title){

                if (TPLang::getDefaultLang() != $key_local):
                    ?>
                    <input type="hidden"
                           name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][value][<?php echo $type; ?>][<?php echo $key_local; ?>]"
                           value="<?php echo esc_attr(TPPlugin::$options['shortcodes_settings']['empty']['value'][$type][$key_local]) ?>"/>
                    <?php
                else:

                    $TPEditorEmptyTableValueMsg = array(
                        'textarea_name' => TPOPlUGIN_OPTION_NAME.'[shortcodes_settings][empty][value]['.$type.']['.$key_local.']',
                        'media_buttons' => false,
                        'textarea_rows' => 10,
                        'quicktags' => 1,
                        'wpautop' => 0,
                        'editor_class' => 'TPEditorEmptyTableValueMsg',
                        'tinymce' => true
                    );

                    wp_editor(
                        TPPlugin::$options['shortcodes_settings']['empty']['value'][$type][$key_local],
                        'TPEditorEmptyTableValueMsg-'.$type,
                        $TPEditorEmptyTableValueMsg
                    );

                endif;

            }
        } else {
            foreach(TPPlugin::$options['shortcodes_settings']['empty']['value'][$type] as $key_local => $title){

                if (TPLang::getLang() != $key_local):
                    ?>
                    <input type="hidden"
                           name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][value][<?php echo $type; ?>][<?php echo $key_local; ?>]"
                           value="<?php echo esc_attr(TPPlugin::$options['shortcodes_settings']['empty']['value'][$type][$key_local]) ?>"/>
                    <?php
                else:

                    $TPEditorEmptyTableValueMsg = array(
                        'textarea_name' => TPOPlUGIN_OPTION_NAME.'[shortcodes_settings][empty][value]['.$type.']['.$key_local.']',
                        'media_buttons' => false,
                        'textarea_rows' => 10,
                        'quicktags' => 1,
                        'wpautop' => 0,
                        'editor_class' => 'TPEditorEmptyTableValueMsg',
                        'tinymce' => true
                    );

                    wp_editor(
                        TPPlugin::$options['shortcodes_settings']['empty']['value'][$type][$key_local],
                        'TPEditorEmptyTableValueMsg-'.$type,
                        $TPEditorEmptyTableValueMsg
                    );

                endif;
            }
        }


    }

    public function TPFieldOtherSettingsTableValueSearchForm($searchForms){
        ?>
        <label>
            <span>
                <?php _ex('Choose form',
                    'tp_admin_page_flights_tab_other_settings_field_label_empty_table_search_form', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>

            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_settings][empty][value][1]" class="TP-Zelect">
                <?php foreach($searchForms as $searchForm): ?>
                <option <?php selected( TPPlugin::$options['shortcodes_settings']['empty']['value'][1], $searchForm['id'] ); ?>
                    value="<?php echo $searchForm['id']; ?>">
                    <?php echo $searchForm['title']; ?>
                </option>
                <?php endforeach; ?>
            </select>

        </label>
        <?php
    }
}
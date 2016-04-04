<?php
namespace app\includes\models\admin\menu;
class TPFieldFlightTickets {
    public $local = array(
        1 => 'ru',
        2 => 'en',
        3 => 'de',
    );
    public function __construct(){

    }
    public function TPFieldStyleTable(){
        $font_family_attr = array(
            'Arial',
            'Arial Black',
            'Comic Sans MS',
            'Courier New',
            'Georgia',
            'Impact',
            'Times New Roman',
            'Trebuchet MS',
            'Verdana',
            'Roboto'
        );
        ?>
        <p class="TP-SettingTitle"><?php _e('Layout', TPOPlUGIN_TEXTDOMAIN ); ?></p>

        <div class="TP-StyleTable">

            <div class="TP-StyleItem">
                <div class="TP-MainStyleTable">
                    <span><?php _e('Header style', TPOPlUGIN_TEXTDOMAIN ); ?></span>
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

            <div class="TP-StyleItem">
                <div class="TP-MainStyleTable">
                    <span><?php _e('Content', TPOPlUGIN_TEXTDOMAIN ); ?></span>
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

            <div class="TP-StyleItem">
                <div class="TP-MainStyleTable">
                    <span><?php _e('Borders', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label class="TP-lb-1" id="TPLineType" >
                        <select class="TP-Zelect" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][line_type]">
                            <option value="solid" <?php selected( \app\includes\TPPlugin::$options['style_table']['table']['line_type'], "solid" ) ?>>
                                <?php echo _x('solid', 'select_type_table', TPOPlUGIN_TEXTDOMAIN) ?>
                            </option>
                            <option value="dotted" <?php selected( \app\includes\TPPlugin::$options['style_table']['table']['line_type'], "dotted" ) ?>>
                                <?php echo _x('dotted', 'select_type_table', TPOPlUGIN_TEXTDOMAIN) ?>
                            </option>
                            <option value="dashed" <?php selected( \app\includes\TPPlugin::$options['style_table']['table']['line_type'], "dashed" ) ?>>
                                <?php echo _x('dashed', 'select_type_table', TPOPlUGIN_TEXTDOMAIN) ?>
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

            <div class="TP-StyleItem">
                <div class="TP-ColorStyle TP-ColorStyle--cus">
                    <span><?php _e('Background', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label class="TP-BackgroundTables">
                        <input class="TP-ColorStyleInput color no-alpha" type="text"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][background_color]"
                               value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['table']['background_color']) ?>"/>
                        <!--<a class="btnColor"><?php //_e('select color', TPOPlUGIN_TEXTDOMAIN ); ?></a>-->

                    </label>
                </div>
                <div class="TP-ColorStyle TP-ColorStyle--cus TP-ColorStyleHead">
                    <span><?php _e('Table header background', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label class="TP-BackgroundTables">
                        <input class="TP-ColorStyleInput color no-alpha" type="text"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][head_color]"
                               value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['table']['head_color']) ?>"/>

                    </label>
                </div>
                <div class="TP-ColorStyle TP-ColorStyle--cus TP-ColorStyleHead">
                    <span><?php _e('Table header font', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label class="TP-BackgroundTables">
                        <input class="TP-ColorStyleInput color no-alpha" type="text"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][head_text_color]"
                               value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['table']['head_text_color']) ?>"/>

                    </label>
                </div>

            </div>

            <div class="TP-StyleItem">
                <div class="TP-ColorStyle TP-ColorStyle--cus">
                    <span><?php _e('Button background', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label class="TP-BackgroundTables">
                        <input class="TP-ColorStyleInput color no-alpha" type="text"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][button][background]"
                               value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['button']['background']) ?>"/>
                        <!--<a class="btnColor"><?php //_e('select color', TPOPlUGIN_TEXTDOMAIN ); ?></a>-->

                    </label>
                </div>
                <div class="TP-ColorStyle TP-ColorStyle--cus TP-ColorStyleHead">
                    <span><?php _e('Button border', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label class="TP-BackgroundTables">
                        <input class="TP-ColorStyleInput color no-alpha" type="text"
                               name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][button][border]"
                               value="<?php echo strtoupper(\app\includes\TPPlugin::$options['style_table']['button']['border']) ?>"/>

                    </label>
                </div>
                <div class="TP-ColorStyle TP-ColorStyle--cus TP-ColorStyleHead">
                    <span><?php _e('Button font', TPOPlUGIN_TEXTDOMAIN ); ?></span>
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
                <label for="chek677"><?php _e('Show data as hyperlinks', TPOPlUGIN_TEXTDOMAIN ); ?></label>
            </div>
            <div class="TP-StyleItem">
                <input id="chek66" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[style_table][table][responsive]"
                       value="1" <?php checked(isset(\app\includes\TPPlugin::$options['style_table']['table']['responsive']), 1) ?> hidden />
                <label for="chek66"><?php _e('Enable Horizontal Scroll', TPOPlUGIN_TEXTDOMAIN ); ?></label>
                <div class="svg-img-1 svg-img-style-table">
                    <a href="#" class="tooltip-settings">
                        <span><?php _e("The tables' width won't be 100% of your content zone. When you resize your content zone (e.g. you have a responsible WP theme) - tables won't affect your design, but will have a horizontal scroll.", TPOPlUGIN_TEXTDOMAIN); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><g fill="#00B0DD">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 16 16"><g fill="#00B0DD">
                                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                    </a>
                </div>
            </div>
            <div class="TP-StyleItem">
                <a href="#" class="TP-deleteShortLincks TP-deleteShortLincks--cust TP-BtnDefaultStyle">
                    <i></i><?php _e('Reset to Default styles', TPOPlUGIN_TEXTDOMAIN ); ?>
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
            <span><?php _e('Title', TPOPlUGIN_TEXTDOMAIN ); ?></span>
            <?php
            foreach(\app\includes\TPPlugin::$options[$type][$shortcode]['title'] as $key_local => $title){
                $typeFields = ($this->local[\app\includes\TPPlugin::$options['local']['localization']] != $key_local)?'hidden':'text';
                ?>
                <input type="<?php echo $typeFields; ?>" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[<?php echo $type; ?>][<?php echo $shortcode; ?>][title][<?php echo $key_local; ?>]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options[$type][$shortcode]['title'][$key_local]) ?>"/>
            <?php
            }
            switch($shortcode){
                case 10:
                    ?><p><?php _e('Use "airline" variable to add the Airlines automatically', TPOPlUGIN_TEXTDOMAIN ); ?></p><?php
                    break;
                default:
                    ?><p><?php _e('Use "origin" and "destination" variables to add the city automatically', TPOPlUGIN_TEXTDOMAIN ); ?></p><?php
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
            <span><?php _e('Title tag', TPOPlUGIN_TEXTDOMAIN ); ?></span>

            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[<?php echo $type; ?>][<?php echo $shortcode; ?>][tag]" class="TP-Zelect">
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "div" ); ?>
                    value="div">DIV</option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h1" ); ?>
                    value="h1">H1</option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h2" ); ?>
                    value="h2">H2</option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h3" ); ?>
                    value="h3">H3</option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h4" ); ?>
                    value="h4">H4</option>
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
            <span><?php _e('Button Title', TPOPlUGIN_TEXTDOMAIN ); ?></span>
            <?php
            foreach(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['title_button'] as $key_local => $title){
                $typeFields = ($this->local[\app\includes\TPPlugin::$options['local']['localization']] != $key_local)?'hidden':'text';
                ?>
                <input type="<?php echo $typeFields; ?>" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][title_button][<?php echo $key_local; ?>]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['title_button'][$key_local]) ?>"/>
            <?php
            }
            ?>
            <p><?php _e('"price" variable can be used', TPOPlUGIN_TEXTDOMAIN ); ?></p>
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
        <span><?php _e('Order by price', TPOPlUGIN_TEXTDOMAIN ); ?></span>
        <div class="TP-FormItem">
            <div class="ItemSub">
                <ul class="TP-listSet TP-listSet--cust">
                    <li>
                        <input id="rchek2" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][sort]"
                            <?php checked(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['sort'], 2) ?> hidden value="2" />
                        <label for="rchek2"><?php _e('Ascending', TPOPlUGIN_TEXTDOMAIN ); ?></label>
                    </li>
                    <li>
                        <input id="rchek1" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][sort]"
                            <?php checked(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['sort'], 1) ?> hidden value="1" />
                        <label for="rchek1"><?php _e('Descending', TPOPlUGIN_TEXTDOMAIN ); ?></label>
                    </li>
                    <li>
                        <input id="rchek0" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][sort]"
                            <?php checked(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['sort'], 0) ?> hidden value="1" />
                        <label for="rchek0"><?php _e('Do not sort', TPOPlUGIN_TEXTDOMAIN ); ?></label>
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
            $selected = \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['selected'];
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
                        .\app\includes\TPPlugin::$options['local']['fields'][$this->local[\app\includes\TPPlugin::$options['local']['localization']]]['label_default'][$field]
                        .'<input type="hidden" class="itemSortableSelected" name="' . TPOPlUGIN_OPTION_NAME . '[shortcodes][' . $shortcode . '][selected][]" value="' . $field . '"/>'
                        .'</li>';
                } else {
                    $settingsShortcodeSortable .= '<li data-key="' . $field . '"
                              data-input-name="' . TPOPlUGIN_OPTION_NAME . '[shortcodes][' . $shortcode . '][selected][]"
                              class="">'
                        .\app\includes\TPPlugin::$options['local']['fields'][$this->local[\app\includes\TPPlugin::$options['local']['localization']]]['label_default'][$field]
                        .'</li>';
                }
                $fieldsInput .= '<input type="hidden"  name="' . TPOPlUGIN_OPTION_NAME . '[shortcodes][' . $shortcode . '][fields][]" value="' . $field . '"/>';
            }

        }else{

        }
        ?>

        <div class="TP-SortableSection">
            <p class="titleSortable"><?php _e('Table Columns', TPOPlUGIN_TEXTDOMAIN ); ?></p>
            <div class="TP-ContainerSorTable">
                <div data-force="30" class="layer TP-blockSortable" >
                    <p class="TP-titleBlockSortable"><?php _e('Not selected', TPOPlUGIN_TEXTDOMAIN ); ?></p>
                    <ul class="block__list block__list_words connectedSortable settingsShortcodeSortable">
                        <?php echo $settingsShortcodeSortable; ?>
                    </ul>
                </div>

                <div data-force="18" class="layer TP-blockSortable">
                    <p class="TP-titleBlockSortable"><?php _e('Selected', TPOPlUGIN_TEXTDOMAIN ); ?></p>
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
            <span><?php _e('Rows per page', TPOPlUGIN_TEXTDOMAIN ); ?></span>
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
            <label for="chek-p1"><?php _e('Paginate', TPOPlUGIN_TEXTDOMAIN ); ?></label>
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
            <span><?php _e('Limit', TPOPlUGIN_TEXTDOMAIN ); ?></span>
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
            <span><?php _e('Departure date', TPOPlUGIN_TEXTDOMAIN ); ?></span>
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
            <span><?php _e('Return date', TPOPlUGIN_TEXTDOMAIN ); ?></span>
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
                <span><?php _e('Number of stops', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][transplant]" class="TP-Zelect">
                    <option <?php selected( \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['transplant'], 0 ); ?>
                        value="0"><?php _e('All', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                    <option <?php selected( \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['transplant'], 1 ); ?>
                        value="1"><?php _e('No more than one stop', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                    <option <?php selected( \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['transplant'], 2 ); ?>
                        value="2"><?php _e('Direct', TPOPlUGIN_TEXTDOMAIN ); ?></option>
                </select>
            </label>
            <label>

            </label>
        </div>
        <?php
    }
    public function TPFieldSortTd($shortcode){

        ?>
        <div class="TP-HeadTable TPSortFieldSelect">
            <label class="TPSortFieldLabel">
                <span><?php _e('Sort by column', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][sort_column]" class="TP-Zelect TPSortField">
                     <?php
                         if(!empty(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['selected'])) {
                             $selected = \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['selected'];
                             foreach($selected as $key => $sel){
                                 ?>
                                 <option value="<?php echo $key;?>" <?php selected( \app\includes\TPPlugin::$options['shortcodes'][$shortcode]['sort_column'], $key ); ?>>
                                     <?php echo \app\includes\TPPlugin::$options['local']['fields'][$this->local[\app\includes\TPPlugin::$options['local']['localization']]]['label_default'][$sel];?>
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
    //Shortcode 1
    public function TPFieldShortcode_1(){
        $shortcode = 1;
        ?>
        <div class="TP-HeadTable">
            <?php $this->TPFieldTitle($shortcode); ?>
            <?php $this->TPFieldTitleTag($shortcode); ?>
        </div>
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
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
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
        <div class="TP-ListSub TP-ListSubS-2">
            <?php $this->TPFieldPlusDate($shortcode); ?>
            <?php //$this->TPFieldPaginate($shortcode); ?>
            <div class="ItemSub">
                <span><?php _e('Rows per page', TPOPlUGIN_TEXTDOMAIN ); ?></span>
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
            <label for="chek-p1"><?php _e('Paginate', TPOPlUGIN_TEXTDOMAIN ); ?></label>
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
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
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
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
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
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
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
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
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
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
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
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
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
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
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
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
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
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
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
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes][<?php echo $shortcode; ?>][extra_table_marker]"
                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['extra_table_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
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
}
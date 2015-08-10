<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 15:10
 */

class TPFieldWidgets {
    public function TPFieldWidget_1(){
        $widgets = 1;
        ?>
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][extra_widget_marker]"
                       value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['extra_widget_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
        <div class="TP-HeadTable">
            <input id="chek1" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][direct]"
                   value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['direct']), 1) ?> hidden />
            <label for="chek1"><?php _e('Direct Flights Only', KPDPlUGIN_TEXTDOMAIN ); ?></label>
            <input id="chek2" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][hide_logo]"
                   value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['hide_logo']), 1) ?> hidden />
            <label for="chek2"><?php _e('Hide Logo', KPDPlUGIN_TEXTDOMAIN ); ?></label>

        </div>

        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom"><?php _e('Size', KPDPlUGIN_TEXTDOMAIN ); ?> (px)</span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
            <span class="TP-titleSub TP-titleSub--sdf">X</span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][height]"
                           type="text"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['height']) ?>">
                </label>
            </div>
        </div>
    <?php
    }
    public function TPFieldWidget_2(){
        $widgets = 2;
        ?>
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][extra_widget_marker]"
                       value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['extra_widget_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
        <div class="TP-HeadTable">
            <input id="chek3" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][draggable]"
                   value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['draggable']), 1) ?> hidden />
            <label for="chek3"><?php _e('Draggable', KPDPlUGIN_TEXTDOMAIN ); ?></label>

            <input id="chek4" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][disable_zoom]"
                   value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['disable_zoom']), 1) ?> hidden />
            <label for="chek4"><?php _e('Disable zoom', KPDPlUGIN_TEXTDOMAIN ); ?></label>
            <input id="chek5" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][scrollwheel]"
                   value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['scrollwheel']), 1) ?> hidden />
            <label for="chek5"><?php _e('Scroll wheel', KPDPlUGIN_TEXTDOMAIN ); ?></label>


        </div>
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Markers size', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][base_diameter]"
                       value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['base_diameter']) ?>"
                       class="TPFieldInputText"/>
            </label>

        </div>


        <div class="TP-ListSub ListSub--cust list--db">

            <input id="chek6" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][map_styled]"
                   value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['map_styled']), 1) ?> hidden />
            <label for="chek6"><?php _e('Map styled', KPDPlUGIN_TEXTDOMAIN ); ?></label>

            <div class="TP-ColorStyle">
                <label>
                    <input class="TP-inColot color" type="text"
                           name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][color]"
                           value="<?php echo TPPlugin::$options['widgets'][$widgets]['color'] ?>"/>
                    <a class="btnColor"><?php _e('select color', KPDPlUGIN_TEXTDOMAIN ); ?></a>
                </label>
            </div>
            <div class="TP-ColorStyle">
                <label>
                    <input class="TP-inColot color" type="text"
                           name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][map_color]"
                           value="<?php echo TPPlugin::$options['widgets'][$widgets]['map_color'] ?>"/>
                    <a class="btnColor"><?php _e('select color', KPDPlUGIN_TEXTDOMAIN ); ?></a>
                </label>
            </div>

            <div class="TP-ColorStyle">
                <label>
                    <input class="TP-inColot color" type="text"
                           name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][contrast_color]"
                           value="<?php echo TPPlugin::$options['widgets'][$widgets]['contrast_color'] ?>"/>
                    <a class="btnColor"><?php _e('select color', KPDPlUGIN_TEXTDOMAIN ); ?></a>
                </label>
            </div>

        </div>

        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom"><?php _e('Size', KPDPlUGIN_TEXTDOMAIN ); ?> (px)</span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
            <span class="TP-titleSub TP-titleSub--sdf">X</span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][height]"
                           type="text"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['height']) ?>">
                </label>
            </div>
        </div>
    <?php
    }
    public function TPFieldWidget_3(){
        $widgets = 3;
        ?>
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][extra_widget_marker]"
                       value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['extra_widget_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom"><?php _e('Origin', KPDPlUGIN_TEXTDOMAIN ); ?></span>
            <div class="ItemSub">
                <label>
                    <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][origin]"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['origin']) ?>"
                           class="searchShortcodeAutocomplete">
                </label>
            </div>

            <span class="TP-titleSub--custom"><?php _e('Destination', KPDPlUGIN_TEXTDOMAIN ); ?></span>
            <div class="ItemSub">
                <label>
                    <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][destination]"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['destination']) ?>"
                           class="searchShortcodeAutocomplete">
                </label>
            </div>
        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom"><?php _e('Range, days', KPDPlUGIN_TEXTDOMAIN ); ?> </span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][period_day][from]"
                           type="text"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['period_day']['from']) ?>">
                </label>
            </div>
            <span class="TP-titleSub TP-titleSub--sdf">-</span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][period_day][to]"
                           type="text"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['period_day']['to']) ?>">
                </label>
            </div>
        </div>

        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom"><?php _e('Width', KPDPlUGIN_TEXTDOMAIN ); ?> (px)</span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
            <div class="ItemSub">
                <input id="chek7" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][responsive]"
                       value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['responsive']), 1) ?> hidden />
                <label for="chek7"><?php _e('Responsive', KPDPlUGIN_TEXTDOMAIN ); ?></label>
            </div>
        </div>

        <?php
        global $wp_locale;
        $output_month = '';
        $monthNames = array_map(array(&$wp_locale, 'get_month'), range(1, 12));
        $output_month .= '<option value="year"
                    '.selected( TPPlugin::$options['widgets'][$widgets]['period'], 'year' , false).'>
                    '.__('Year', KPDPlUGIN_TEXTDOMAIN ).'</option>';
        $output_month .= '<option value="current_month"
                '.selected( TPPlugin::$options['widgets'][$widgets]['period'], 'current_month' , false).'>
                '.__('Current month', KPDPlUGIN_TEXTDOMAIN ).'</option>';
        /*foreach($monthNames as $key=>$month){
            $output_month .= '<option value="'.date('Y').'-'.($key+1).'-01'.'"
                                '.selected( TPPlugin::$options['widgets'][$widgets]['period'], date('Y').'-'.($key+1).'-01', false).'>
                                '.$month.'</option>';
        }*/
        $current_date = getdate();
        $m = false;
        //$d_o = array();
        //$d_t = array();
        $out_c = '';
        $out_n = '';
        foreach ($monthNames as $key=>$month) {
            if(($key+1) == $current_date['mon']){
                $m = true;
            }
            if($m){
                $out_c .= '<option value="'.date('Y').'-'.($key+1).'-01'.'"'
                    .selected( TPPlugin::$options['widgets'][$widgets]['period'], date('Y').'-'.($key+1).'-01', false).'>'
                    .$month.'</option>';
                /*$d_o[] = array(
                    'm' => $key+1,
                    'F' => $month,
                );*/
            }else{
                $out_n .= '<option value="'.date('Y', strtotime('+1 year')).'-'.($key+1).'-01'.'"'
                    .selected( TPPlugin::$options['widgets'][$widgets]['period'], date('Y', strtotime('+1 year')).'-'.($key+1).'-01', false).'>'
                    .$month.'</option>';
                /*$d_t[] = array(
                    'm' => $key+1,
                    'F' => $month,
                );*/
            }
        }
        $output_month .= $out_c.$out_n;
        ?>
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Period', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <select name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][period]" class="TP-Zelect">
                    <?php echo $output_month; ?>
                </select>
            </label>
            <label></label>
        </div>
        <div class="TP-HeadTable">
            <input id="chek6" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][only_direct]"
                   value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['only_direct']), 1) ?> hidden />
            <label for="chek6"><?php _e('Direct Flights Only', KPDPlUGIN_TEXTDOMAIN ); ?></label>
            <input id="chek7" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][one_way]"
                   value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['one_way']), 1) ?> hidden />
            <label for="chek7"><?php _e('One way', KPDPlUGIN_TEXTDOMAIN ); ?></label>

        </div>

    <?php
    }
    public function TPFieldWidget_4(){
        $widgets = 4;
        ?>
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][extra_widget_marker]"
                       value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['extra_widget_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom"><?php _e('Origin', KPDPlUGIN_TEXTDOMAIN ); ?></span>
            <div class="ItemSub">
                <label>
                    <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][origin]"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['origin']) ?>"
                           class="searchShortcodeAutocomplete">
                </label>
            </div>

            <span class="TP-titleSub--custom"><?php _e('Destination', KPDPlUGIN_TEXTDOMAIN ); ?></span>
            <div class="ItemSub">
                <label>
                    <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][destination]"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['destination']) ?>"
                           class="searchShortcodeAutocomplete">
                </label>
            </div>
        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <div class="TP-ColorStyle">
                <label>
                    <input class="TP-inColot color" type="text"
                           name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][color]"
                           value="<?php echo TPPlugin::$options['widgets'][$widgets]['color'] ?>"/>
                    <a class="btnColor"><?php _e('select color', KPDPlUGIN_TEXTDOMAIN ); ?></a>
                </label>
            </div>
        </div>
        <div class="TP-HeadTable">
            <input id="chek7" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][responsive]"
                   value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['responsive']), 1) ?> hidden />
            <label for="chek7"><?php _e('Responsive', KPDPlUGIN_TEXTDOMAIN ); ?></label>

        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom"><?php _e('Width', KPDPlUGIN_TEXTDOMAIN ); ?> (px)</span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
        </div>
    <?php
    }
    public function TPFieldWidget_5(){
        $widgets = 5;
        ?>
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][extra_widget_marker]"
                       value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['extra_widget_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom"><?php _e('Width', KPDPlUGIN_TEXTDOMAIN ); ?> (px)</span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
            <div class="ItemSub">
                <input id="chek7" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][responsive]"
                       value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['responsive']), 1) ?> hidden />
                <label for="chek7"><?php _e('Responsive', KPDPlUGIN_TEXTDOMAIN ); ?></label>
            </div>
        </div>

    <?php
    }
    public function TPFieldWidget_6(){
        $widgets = 6;
        ?>
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Extra marker', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][extra_widget_marker]"
                       value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['extra_widget_marker']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom"><?php _e('Width', KPDPlUGIN_TEXTDOMAIN ); ?> (px)</span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
        </div>
        <div class="TP-HeadTable">
            <label>
                <span><?php _e('Count widgets', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][count]"
                       value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['count']) ?>"
                       class="TPFieldInputText"/>
            </label>
            <label>

            </label>
        </div>
    <?php
    }
}
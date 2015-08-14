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
        <a href="#" class="tooltip-img-2"><?php _e('Help Travepayouts', KPDPlUGIN_TEXTDOMAIN ); ?></a>
        <a href="#" class="tooltip-img">
            <span><img src="<?php echo KPDPlUGIN_URL; ?>app/public/images/<?php _e('map-wiget-eng.png', KPDPlUGIN_TEXTDOMAIN) ?>" alt="" height="300px"/></span>
            <?php _e('Example widget', KPDPlUGIN_TEXTDOMAIN ); ?>
            <div class="svg-img-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
            </div>
        </a>

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
        <div class="TP-HeadTable TP-HeadTableCheckbox">
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
        <a href="#" class="tooltip-img-2"><?php _e('Help Travepayouts', KPDPlUGIN_TEXTDOMAIN ); ?></a>
        <a href="#" class="tooltip-img">
            <span><img src="<?php echo KPDPlUGIN_URL; ?>app/public/images/<?php _e('hotel-wiget-eng.png', KPDPlUGIN_TEXTDOMAIN) ?>" alt="" height="300px"/></span>
            <?php _e('Example widget', KPDPlUGIN_TEXTDOMAIN ); ?>
            <div class="svg-img-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
            </div>
        </a>
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
        <div class="TP-HeadTable TPCheckBoxWidget">
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
            <label class="TPMarkerSize">
                <span><?php _e('Markers size', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <div class="width-80">
                    <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][base_diameter]"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['base_diameter']) ?>"
                           class="TPFieldInputText"/>
                </div>
            </label>

        </div>


        <div class="TP-ListSub ListSub--cust list--db">

            <input id="chek6" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][map_styled]"
                   value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['map_styled']), 1) ?> hidden />
            <label for="chek6" class="TPLabelMapStyled"><?php _e('Map styled', KPDPlUGIN_TEXTDOMAIN ); ?></label>

            <div class="TP-ColorStyle TP-ColorStyleWidget">
                <label>
                    <input class="TP-inColot color" type="text"
                           name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][color]"
                           value="<?php echo TPPlugin::$options['widgets'][$widgets]['color'] ?>"/>
                    <a class="btnColor"><?php _e('select color', KPDPlUGIN_TEXTDOMAIN ); ?></a>
                </label>
            </div>
            <div class="TP-ColorStyle TP-ColorStyleWidget">
                <label>
                    <input class="TP-inColot color" type="text"
                           name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][map_color]"
                           value="<?php echo TPPlugin::$options['widgets'][$widgets]['map_color'] ?>"/>
                    <a class="btnColor"><?php _e('select color', KPDPlUGIN_TEXTDOMAIN ); ?></a>
                </label>
            </div>

            <div class="TP-ColorStyle TP-ColorStyleWidget">
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
        <a href="#" class="tooltip-img-2"><?php _e('Help Travepayouts', KPDPlUGIN_TEXTDOMAIN ); ?></a>
        <a href="#" class="tooltip-img">
            <span><img src="<?php echo KPDPlUGIN_URL; ?>app/public/images/<?php _e('calendar-wiget-eng.png', KPDPlUGIN_TEXTDOMAIN) ?>" alt="" height="300px"/></span>
            <?php _e('Example widget', KPDPlUGIN_TEXTDOMAIN ); ?>
            <div class="svg-img-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
            </div>
        </a>
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

            <div class="ItemSub ItemSub-1">
                <span class="TP-titleSub--custom"><?php _e('Departure city', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <label>
                    <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][origin]"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['origin']) ?>"
                           class="searchShortcodeAutocomplete">
                </label>
            </div>


            <div class="ItemSub">
                <span class="TP-titleSub--custom"><?php _e('City arrival', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <label>
                    <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][destination]"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['destination']) ?>"
                           class="searchShortcodeAutocomplete">
                </label>
            </div>
        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom"><?php _e('Range, days', KPDPlUGIN_TEXTDOMAIN ); ?> </span>
            <div class="ItemSub ItemSub-3">
                <label>
                    <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][period_day][from]"
                           type="text"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['period_day']['from']) ?>">
                </label>
            </div>
            <span class="TP-titleSub TP-titleSub--sdf">-</span>
            <div class="ItemSub ItemSub-3">
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
            <div class="ItemSub-5">
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
        <div class="TP-HeadTable TPCheckBoxWidget">
            <input id="chek63" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][only_direct]"
                   value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['only_direct']), 1) ?> hidden />
            <label for="chek63"><?php _e('Direct Flights Only', KPDPlUGIN_TEXTDOMAIN ); ?></label>
            <input id="chek73" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][one_way]"
                   value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['one_way']), 1) ?> hidden />
            <label for="chek73"><?php _e('One way', KPDPlUGIN_TEXTDOMAIN ); ?></label>

        </div>

    <?php
    }
    public function TPFieldWidget_4(){
        $widgets = 4;
        ?>
        <a href="#" class="tooltip-img-2"><?php _e('Help Travepayouts', KPDPlUGIN_TEXTDOMAIN ); ?></a>
        <a href="#" class="tooltip-img">
            <span><img src="<?php echo KPDPlUGIN_URL; ?>app/public/images/<?php _e('subscribe-wiget.png', KPDPlUGIN_TEXTDOMAIN) ?>" alt="" height="300px"/></span>
            <?php _e('Example widget', KPDPlUGIN_TEXTDOMAIN ); ?>
            <div class="svg-img-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
            </div>
        </a>
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

            <div class="ItemSub ItemSub-1">
                <span class="TP-titleSub--custom"><?php _e('Departure city', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <label>
                    <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][origin]"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['origin']) ?>"
                           class="searchShortcodeAutocomplete">
                </label>
            </div>


            <div class="ItemSub">
                <span class="TP-titleSub--custom"><?php _e('City arrival', KPDPlUGIN_TEXTDOMAIN ); ?></span>
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
        <div class="TP-HeadTable  TPCheckBoxWidget">
            <input id="chek7" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][responsive]"
                   value="1" <?php checked(isset(TPPlugin::$options['widgets'][$widgets]['responsive']), 1) ?> hidden />
            <label for="chek7"><?php _e('Responsive', KPDPlUGIN_TEXTDOMAIN ); ?></label>

        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom"><?php _e('Width', KPDPlUGIN_TEXTDOMAIN ); ?> (px)</span>
            <div class="ItemSub ItemSub-3">
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
        <a href="#" class="tooltip-img-2"><?php _e('Help Travepayouts', KPDPlUGIN_TEXTDOMAIN ); ?></a>
        <a href="#" class="tooltip-img">
            <span><img src="<?php echo KPDPlUGIN_URL; ?>app/public/images/<?php _e('one-hotel-wiget-eng.png', KPDPlUGIN_TEXTDOMAIN) ?>" alt="" height="300px"/></span>
            <?php _e('Example widget', KPDPlUGIN_TEXTDOMAIN ); ?>
            <div class="svg-img-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
            </div>
        </a>
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
            <div class="ItemSub ItemSub-3">
                <label>
                    <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
            <div class="ItemSub-5">
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
        <a href="#" class="tooltip-img-2"><?php _e('Help Travepayouts', KPDPlUGIN_TEXTDOMAIN ); ?></a>
        <a href="#" class="tooltip-img">
            <span><img src="<?php echo KPDPlUGIN_URL; ?>app/public/images/<?php _e('popular-destination-wiget-eng.png', KPDPlUGIN_TEXTDOMAIN) ?>" alt="" height="300px"/></span>
            <?php _e('Example widget', KPDPlUGIN_TEXTDOMAIN ); ?>
            <div class="svg-img-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
            </div>
        </a>
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
            <div class="ItemSub  ItemSub-3">
                <label>
                    <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
        </div>
        <div class="TP-HeadTable ">
            <label>
                <span><?php _e('Number of widgets when you insert into the post', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                <select name="<?php echo KPDPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][count]" class="TP-Zelect">
                    <option <?php selected( TPPlugin::$options["widgets"][$widgets]['count'], 1 ); ?>
                        value="1">1</option>
                    <option <?php selected( TPPlugin::$options["widgets"][$widgets]['count'], 2 ); ?>
                        value="2">2</option>
                    <option <?php selected( TPPlugin::$options["widgets"][$widgets]['count'], 3 ); ?>
                        value="3">3</option>
                </select>
            </label>
            <label>

            </label>
        </div>
    <?php
    }
}
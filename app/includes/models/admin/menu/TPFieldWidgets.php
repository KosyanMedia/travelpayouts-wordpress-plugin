<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 15:10
 */
namespace app\includes\models\admin\menu;
class TPFieldWidgets {
    public $local_url;
    public $local_img;
    public $local;
    public function __construct(){
        global $locale;
        switch($locale){
            case "ru_RU":
                $this->local_url = 'ru';
                $this->local_img = '';
                $this->local = 'ru';
                break;
            case "en_US":
                $this->local_url = 'en-us';
                $this->local_img = '-eng';
                $this->local = 'en';
                break;
            default:
                $this->local_url = 'en-us';
                $this->local_img = '-eng';
                $this->local = 'en';
                break;
        }
    }
    public function TPFieldWidget_1(){
        $widgets = 1;
        ?>

        <a href="#" class="tooltip-img">
            <span><img src="<?php echo TPOPlUGIN_URL; ?>app/public/images/map-wiget<?php echo $this->local_img; ?>.png" alt="" height="300px"/></span>
            <?php _ex('tp_admin_page_widgets_shortcode_1_link_example',
                '(Widget Example)', TPOPlUGIN_TEXTDOMAIN); ?>
            <div class="svg-img-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
            </div>
        </a>
        <a href="https://support.travelpayouts.com/hc/<?php echo $this->local_url;?>/articles/203638518-Map-widget?utm_source=wpplugin&utm_medium=widgets&utm_campaign=<?php echo $this->local; ?>&utm_content=map" target="_blank" class="tooltip-img-2">
            <?php _ex('tp_admin_page_widgets_shortcode_1_link_help',
                '(Travepayouts Help)', TPOPlUGIN_TEXTDOMAIN); ?>
        </a>

        <div class="TP-HeadTable TP-HeadTableCheckbox">
            <input id="chek1" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][direct]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['direct']), 1) ?> hidden />
            <label for="chek1">
                <?php _ex('tp_admin_page_widgets_shortcode_1_field_direct_label',
                    '(Direct Flights Only)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>
            <input id="chek2" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][hide_logo]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['hide_logo']), 1) ?> hidden />
            <label for="chek2">
                <?php _ex('tp_admin_page_widgets_shortcode_1_field_hide_logo_label',
                    '(Hide Logo)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>

        </div>

        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom">
                <?php _ex('tp_admin_page_widgets_shortcode_1_field_size_label',
                    '(Size)', TPOPlUGIN_TEXTDOMAIN); ?>
                (px)</span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
            <span class="TP-titleSub TP-titleSub--sdf">X</span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][height]"
                           type="text"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['height']) ?>">
                </label>
            </div>
        </div>
    <?php
    }
    public function TPFieldWidget_2(){
        $widgets = 2;
        ?>

        <a href="#" class="tooltip-img">
            <span><img src="<?php echo TPOPlUGIN_URL; ?>app/public/images/hotel-widget<?php echo $this->local_img; ?>.png" alt="" height="300px"/></span>
            <?php _ex('tp_admin_page_widgets_shortcode_2_link_example',
                '(Widget Example)', TPOPlUGIN_TEXTDOMAIN); ?>
            <div class="svg-img-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
            </div>
        </a>
        <a href="https://support.travelpayouts.com/hc/<?php echo $this->local_url;?>/articles/204395407-Hotels-map?utm_source=wpplugin&utm_medium=widgets&utm_campaign=<?php echo $this->local; ?>&utm_content=hotels_map" target="_blank" class="tooltip-img-2">
            <?php _ex('tp_admin_page_widgets_shortcode_2_link_help',
                '(Travepayouts Help)', TPOPlUGIN_TEXTDOMAIN); ?>
        </a>

        <div class="TP-HeadTable TPCheckBoxWidget">
            <input id="chek3" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][draggable]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['draggable']), 1) ?> hidden />
            <label for="chek3">
                <!-- Draggable -->
                <!-- Возможность перетаскивать -->
                <!-- Not draggable -->
                <?php _ex('tp_admin_page_widgets_shortcode_2_field_draggable_label',
                    '(Draggable)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>

            <input id="chek4" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][disable_zoom]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['disable_zoom']), 1) ?> hidden />
            <label for="chek4">
                <?php _ex('tp_admin_page_widgets_shortcode_2_field_disable_zoom_label',
                    '(Disable zoom)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>
            <input id="chek5" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][scrollwheel]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['scrollwheel']), 1) ?> hidden />
            <label for="chek5">
                <?php _ex('tp_admin_page_widgets_shortcode_2_field_scrollwheel_label',
                    '(Scroll Wheel Zoom)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>


        </div>
        <div class="TP-HeadTable">
            <label class="TPMarkerSize">
                <span>
                    <?php _ex('tp_admin_page_widgets_shortcode_2_field_base_diameter_label',
                        '(Pin Size)', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <div class="width-80">
                    <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][base_diameter]"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['base_diameter']) ?>"
                           class="TPFieldInputText"/>
                </div>
            </label>
            <label class="TPMapZoom">
                <span>
                    <?php _ex('tp_admin_page_widgets_shortcode_2_field_zoom_label',
                        '(Zoom)', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][zoom]" class="TP-Zelect">
                    <?php for($z = 0; $z < 20; $z++) {?>
                        <option value="<?php echo $z;?>" <?php selected( \app\includes\TPPlugin::$options['widgets'][$widgets]['zoom'], $z)?>>
                            <?php echo $z;?>
                        </option>
                    <?php } ?>
                </select>
            </label>

        </div>


        <div class="TP-ListSub ListSub--cust list--db">

            <input id="chek6" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][map_styled]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['map_styled']), 1) ?> hidden />
            <label for="chek6" class="TPLabelMapStyled">
                <?php _ex('tp_admin_page_widgets_shortcode_2_field_map_style_label',
                    '(Map Style)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>

            <div class="TP-ColorStyle TP-ColorStyleWidget">
                <label>
                    <input class="TP-inColot color" type="text"
                           name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][color]"
                           value="<?php echo \app\includes\TPPlugin::$options['widgets'][$widgets]['color'] ?>"/>
                    <a class="btnColor">
                        <?php _ex('tp_admin_page_widgets_shortcode_2_field_color_label',
                            '(select color)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </a>
                </label>
            </div>
            <div class="TP-ColorStyle TP-ColorStyleWidget">
                <label>
                    <input class="TP-inColot color" type="text"
                           name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][map_color]"
                           value="<?php echo \app\includes\TPPlugin::$options['widgets'][$widgets]['map_color'] ?>"/>
                    <a class="btnColor">
                        <?php _ex('tp_admin_page_widgets_shortcode_2_field_map_color_label',
                            '(select color)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </a>
                </label>
            </div>

            <div class="TP-ColorStyle TP-ColorStyleWidget">
                <label>
                    <input class="TP-inColot color" type="text"
                           name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][contrast_color]"
                           value="<?php echo \app\includes\TPPlugin::$options['widgets'][$widgets]['contrast_color'] ?>"/>
                    <a class="btnColor">
                        <?php _ex('tp_admin_page_widgets_shortcode_2_field_contrast_color_label',
                            '(select color)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </a>
                </label>
            </div>

        </div>

        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom">
                <?php _ex('tp_admin_page_widgets_shortcode_2_field_size_label',
                    '(Size)', TPOPlUGIN_TEXTDOMAIN); ?>
                (px)</span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
            <span class="TP-titleSub TP-titleSub--sdf">X</span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][height]"
                           type="text"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['height']) ?>">
                </label>
            </div>
        </div>
    <?php
    }
    public function TPFieldWidget_3(){
        $widgets = 3;
        ?>

        <a href="#" class="tooltip-img">
            <span><img src="<?php echo TPOPlUGIN_URL; ?>app/public/images/calendar-wiget<?php echo $this->local_img; ?>.png" alt="" height="300px"/></span>
            <?php _ex('tp_admin_page_widgets_shortcode_3_link_example',
                '(Widget Example)', TPOPlUGIN_TEXTDOMAIN); ?>
            <div class="svg-img-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
            </div>
        </a>
        <a href="https://support.travelpayouts.com/hc/<?php echo $this->local_url;?>/articles/203912008-Calendar-widget?utm_source=wpplugin&utm_medium=widgets&utm_campaign=<?php echo $this->local; ?>&utm_content=calendar" target="_blank" class="tooltip-img-2">
            <?php _ex('tp_admin_page_widgets_shortcode_3_link_help',
                '(Travepayouts Help)', TPOPlUGIN_TEXTDOMAIN); ?>
        </a>

        <div class="TP-ListSub ListSub--cust list--db">

            <div class="ItemSub ItemSub-1">
                <span class="TP-titleSub--custom">
                    <?php _ex('tp_admin_page_widgets_shortcode_3_field_origin_label',
                        '(City of Departure)', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <label>
                    <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][origin]"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['origin']) ?>"
                           class="searchShortcodeAutocomplete">
                </label>
            </div>


            <div class="ItemSub">
                <span class="TP-titleSub--custom">
                    <?php _ex('tp_admin_page_widgets_shortcode_3_field_destination_label',
                        '(City of Arrival)', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <label>
                    <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][destination]"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['destination']) ?>"
                           class="searchShortcodeAutocomplete">
                </label>
            </div>
        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom">
                <?php _ex('tp_admin_page_widgets_shortcode_3_field_period_day_label',
                    '(Range, days)', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
            <div class="ItemSub ItemSub-3">
                <label>
                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][period_day][from]"
                           type="text"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['period_day']['from']) ?>">
                </label>
            </div>
            <span class="TP-titleSub TP-titleSub--sdf">-</span>
            <div class="ItemSub ItemSub-3">
                <label>
                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][period_day][to]"
                           type="text"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['period_day']['to']) ?>">
                </label>
            </div>
        </div>
        <div class="TP-HeadTable  TPCheckBoxWidget">
            <input id="chek73" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][responsive]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['responsive']), 1) ?> hidden />
            <label for="chek73">
                <?php _ex('tp_admin_page_widgets_shortcode_3_field_responsive_label',
                    '(Responsive)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>

        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom">
                <?php _ex('tp_admin_page_widgets_shortcode_3_field_width_label',
                    '(Width)', TPOPlUGIN_TEXTDOMAIN); ?>(px)
            </span>
            <div class="ItemSub">
                <label>
                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
        </div>

        <?php
        global $wp_locale;
        $output_month = '';
        $monthNames = array_map(array(&$wp_locale, 'get_month'), range(1, 12));
        $output_month .= '<option value="year"
                    '.selected( \app\includes\TPPlugin::$options['widgets'][$widgets]['period'], 'year' , false).'>
                    '._x('tp_admin_page_widgets_shortcode_3_field_period_value_year',
                '(Year)', TPOPlUGIN_TEXTDOMAIN ).'</option>';
        $output_month .= '<option value="current_month"
                '.selected( \app\includes\TPPlugin::$options['widgets'][$widgets]['period'], 'current_month' , false).'>
                '._x('tp_admin_page_widgets_shortcode_3_field_period_value_current_month', '(Current month)', TPOPlUGIN_TEXTDOMAIN ).'</option>';
        /*foreach($monthNames as $key=>$month){
            $output_month .= '<option value="'.date('Y').'-'.($key+1).'-01'.'"
                                '.selected( \app\includes\TPPlugin::$options['widgets'][$widgets]['period'], date('Y').'-'.($key+1).'-01', false).'>
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
                $out_c .= '<option value="'.date('Y').'-'.str_pad(($key+1),  2, '0', STR_PAD_LEFT).'-01'.'"'
                    .selected( \app\includes\TPPlugin::$options['widgets'][$widgets]['period'], date('Y').'-'.($key+1).'-01', false).'>'
                    .$month.'</option>';
                /*$d_o[] = array(
                    'm' => $key+1,
                    'F' => $month,
                );*/
            }else{
                $out_n .= '<option value="'.date('Y', strtotime('+1 year')).'-'.str_pad(($key+1),  2, '0', STR_PAD_LEFT).'-01'.'"'
                    .selected( \app\includes\TPPlugin::$options['widgets'][$widgets]['period'], date('Y', strtotime('+1 year')).'-'.($key+1).'-01', false).'>'
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
                <span>
                    <?php _ex('tp_admin_page_widgets_shortcode_3_field_period_label',
                        '(Period)', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][period]" class="TP-Zelect">
                    <?php echo $output_month; ?>
                </select>
            </label>
            <label></label>
        </div>
        <div class="TP-HeadTable TPCheckBoxWidget">
            <input id="chek63" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][only_direct]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['only_direct']), 1) ?> hidden />
            <label for="chek63">
                <?php _ex('tp_admin_page_widgets_shortcode_3_field_only_direct_label',
                    '(Direct Flights Only)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>
            <input id="chek73" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][one_way]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['one_way']), 1) ?> hidden />
            <label for="chek73">
                <?php _ex('tp_admin_page_widgets_shortcode_3_field_one_way_label',
                    '(One way)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>

        </div>

    <?php
    }
    public function TPFieldWidget_4(){
        $widgets = 4;
        ?>

        <a href="#" class="tooltip-img">
            <span class="TP-WidgetHelpImgSubsc">
                <img src="<?php echo TPOPlUGIN_URL; ?>app/public/images/subscribe-wiget.png" alt="" height="300px"/></span>
            <?php _ex('tp_admin_page_widgets_shortcode_4_link_example',
                '(Widget Example)', TPOPlUGIN_TEXTDOMAIN); ?>
            <div class="svg-img-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
            </div>
        </a>
        <a href="https://support.travelpayouts.com/hc/ru/articles/204596297?utm_source=wpplugin&utm_medium=widgets&utm_campaign=ru&utm_content=subscriptions" target="_blank" class="tooltip-img-2">
            <?php _ex('tp_admin_page_widgets_shortcode_4_link_help',
                '(Travepayouts Help)', TPOPlUGIN_TEXTDOMAIN); ?>
        </a>

        <div class="TP-ListSub ListSub--cust list--db">

            <div class="ItemSub ItemSub-1">
                <span class="TP-titleSub--custom">
                     <?php _ex('tp_admin_page_widgets_shortcode_4_field_origin_label',
                         '(City of Departure)', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <label>
                    <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][origin]"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['origin']) ?>"
                           class="searchShortcodeAutocomplete">
                </label>
            </div>


            <div class="ItemSub">
                <span class="TP-titleSub--custom">
                    <?php _ex('tp_admin_page_widgets_shortcode_4_field_destination_label',
                        '(City of Arrival)', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <label>
                    <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][destination]"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['destination']) ?>"
                           class="searchShortcodeAutocomplete">
                </label>
            </div>
        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <div class="TP-ColorStyle">
                <label>
                    <input class="TP-inColot color" type="text"
                           name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][color]"
                           value="<?php echo \app\includes\TPPlugin::$options['widgets'][$widgets]['color'] ?>"/>
                    <a class="btnColor">
                        <?php _ex('tp_admin_page_widgets_shortcode_4_field_color_label',
                            '(select color)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </a>
                </label>
            </div>
        </div>
        <div class="TP-HeadTable  TPCheckBoxWidget">
            <input id="chek74" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][responsive]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['responsive']), 1) ?> hidden />
            <label for="chek74">
                <?php _ex('tp_admin_page_widgets_shortcode_4_field_responsive_label',
                    '(Responsive)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>

        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom">
                <?php _ex('tp_admin_page_widgets_shortcode_4_field_width_label',
                    '(Width)', TPOPlUGIN_TEXTDOMAIN); ?> (px)</span>
            <div class="ItemSub ItemSub-3">
                <label>
                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
        </div>
    <?php
    }
    public function TPFieldWidget_5(){
        $widgets = 5;
        ?>

        <a href="#" class="tooltip-img">
            <span><img src="<?php echo TPOPlUGIN_URL; ?>app/public/images/one-hotel-wiget<?php echo $this->local_img; ?>.png" alt="" height="300px"/></span>
            <?php _ex('tp_admin_page_widgets_shortcode_5_link_example',
                '(Widget Example)', TPOPlUGIN_TEXTDOMAIN); ?>
            <div class="svg-img-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
            </div>
        </a>
        <a href="https://support.travelpayouts.com/hc/<?php echo $this->local_url;?>/articles/205451067-Hotel-widget?utm_source=wpplugin&utm_medium=widgets&utm_campaign=<?php echo $this->local; ?>&utm_content=chansey" target="_blank" class="tooltip-img-2">
            <?php _ex('tp_admin_page_widgets_shortcode_5_link_help',
                '(Travepayouts Help)', TPOPlUGIN_TEXTDOMAIN); ?>
        </a>
        <div class="TP-HeadTable  TPCheckBoxWidget">
            <input id="chek75" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][responsive]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['responsive']), 1) ?> hidden />
            <label for="chek75">
                <?php _ex('tp_admin_page_widgets_shortcode_5_field_responsive_label',
                    '(Responsive)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>

        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom">
                <?php _ex('tp_admin_page_widgets_shortcode_5_field_width_label',
                    '(Width)', TPOPlUGIN_TEXTDOMAIN); ?> (px)</span>
            <div class="ItemSub ItemSub-3">
                <label>
                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
        </div>

    <?php
    }
    public function TPFieldWidget_6(){
        $widgets = 6;
        ?>

        <a href="#" class="tooltip-img">
            <span><img src="<?php echo TPOPlUGIN_URL; ?>app/public/images/popular-destination-wiget<?php echo $this->local_img; ?>.png" alt="" height="300px"/></span>
            <?php _ex('tp_admin_page_widgets_shortcode_6_link_example',
                '(Widget Example)', TPOPlUGIN_TEXTDOMAIN); ?>
            <div class="svg-img-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
            </div>
        </a>
        <a href="https://support.travelpayouts.com/hc/<?php echo $this->local_url;?>/articles/205670418?utm_source=wpplugin&utm_medium=widgets&utm_campaign=<?php echo $this->local; ?>&utm_content=weedle" target="_blank" class="tooltip-img-2">
            <?php _ex('tp_admin_page_widgets_shortcode_6_link_help',
                '(Travepayouts Help)', TPOPlUGIN_TEXTDOMAIN); ?>
        </a>
        <div class="TP-HeadTable  TPCheckBoxWidget">
            <input id="chek76" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][responsive]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['responsive']), 1) ?> hidden />
            <label for="chek76">
                <?php _ex('tp_admin_page_widgets_shortcode_6_field_responsive_label',
                    '(Responsive)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>

        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom">
                <?php _ex('tp_admin_page_widgets_shortcode_6_field_width_label',
                    '(Width)', TPOPlUGIN_TEXTDOMAIN); ?> (px)</span>
            <div class="ItemSub  ItemSub-3">
                <label>
                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
        </div>
        <div class="TP-HeadTable ">
            <label>
                <span>
                    <?php _ex('tp_admin_page_widgets_shortcode_6_field_count_label',
                        '(Number of Widgets)', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][count]" class="TP-Zelect">
                    <option <?php selected( \app\includes\TPPlugin::$options["widgets"][$widgets]['count'], 1 ); ?>
                        value="1">1</option>
                    <option <?php selected( \app\includes\TPPlugin::$options["widgets"][$widgets]['count'], 2 ); ?>
                        value="2">2</option>
                    <option <?php selected( \app\includes\TPPlugin::$options["widgets"][$widgets]['count'], 3 ); ?>
                        value="3">3</option>
                </select>
            </label>
            <label>

            </label>
        </div>
    <?php
    }
    public function TPFieldWidget_7(){
        $widgets = 7;
        $cat = array(
            'ru' => array(
                "0" => "-----",
                "1stars" =>
                    _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_1_ru"
                        , "1 звезда", TPOPlUGIN_TEXTDOMAIN),
                "2stars" =>
                    _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_2_ru"
                        , "2 звезды", TPOPlUGIN_TEXTDOMAIN),
                "3stars" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_3_ru"
                    , "3 звезды", TPOPlUGIN_TEXTDOMAIN),
                "4stars" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_4_ru"
                    , "4 звезды", TPOPlUGIN_TEXTDOMAIN),
                "5stars" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_5_ru"
                    , "5 звёзд", TPOPlUGIN_TEXTDOMAIN),
                "price" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_6_ru"
                    , "Дешёвые", TPOPlUGIN_TEXTDOMAIN),
                "distance" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_7_ru"
                    , "Близко к центру", TPOPlUGIN_TEXTDOMAIN),
                "center" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_8_ru"
                    , "Отели в центре", TPOPlUGIN_TEXTDOMAIN),
                "rating" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_9_ru"
                    , "Рейтинг", TPOPlUGIN_TEXTDOMAIN),
                "tophotels" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_10_ru"
                    , "Популярные", TPOPlUGIN_TEXTDOMAIN),
                "highprice" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_11_ru"
                    , "Дорогие", TPOPlUGIN_TEXTDOMAIN),
            ),
            'en' => array(
                "0" => "-----",
                "1stars" =>
                    _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_1_en"
                        , "1 star", TPOPlUGIN_TEXTDOMAIN),
                "2stars" =>
                    _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_2_en"
                        , "2 stars", TPOPlUGIN_TEXTDOMAIN),
                "3stars" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_3_en"
                    , "3 stars", TPOPlUGIN_TEXTDOMAIN),
                "4stars" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_4_en"
                    , "4 stars", TPOPlUGIN_TEXTDOMAIN),
                "5stars" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_5_en"
                    , "5 stars", TPOPlUGIN_TEXTDOMAIN),
                "price" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_6_en"
                    , "Cheap", TPOPlUGIN_TEXTDOMAIN),
                "distance" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_7_en"
                    , "Close to city center", TPOPlUGIN_TEXTDOMAIN),
                "center" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_8_en"
                    , "Hotels in the center", TPOPlUGIN_TEXTDOMAIN),
                "rating" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_9_en"
                    , "Rating", TPOPlUGIN_TEXTDOMAIN),
                "tophotels" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_10_en"
                    , "Popular", TPOPlUGIN_TEXTDOMAIN),
                "highprice" => _x("tp_admin_page_widgets_shortcode_7_field_select_selection_value_11_en"
                    , "Expensive", TPOPlUGIN_TEXTDOMAIN),
            ),
        );
        $loc = '';
        global $locale;
        switch($locale) {
            case "ru_RU":
                $loc = 'ru';
                break;
            case "en_US":
                $loc = 'en';
                break;
            default:
                $loc = 'ru';
                break;
        }
        ?>
        <a href="#" class="tooltip-img">
            <span><img src="<?php echo TPOPlUGIN_URL; ?>app/public/images/hotel_list_widget<?php echo $this->local_img; ?>.png" alt="" height="300px"/></span>
            <?php _ex('tp_admin_page_widgets_shortcode_7_link_example',
                '(Widget Example)', TPOPlUGIN_TEXTDOMAIN); ?>
            <div class="svg-img-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
            </div>
        </a>
        <a href="https://support.travelpayouts.com/hc/<?php echo $this->local_url;?>/articles/215942897?utm_source=wpplugin&utm_medium=widgets&utm_campaign=<?php echo $this->local; ?>&utm_content=blissey" target="_blank" class="tooltip-img-2">
            <?php _ex('tp_admin_page_widgets_shortcode_7_link_help',
                '(Travepayouts Help)', TPOPlUGIN_TEXTDOMAIN); ?>
        </a>
        <div class="TP-ListSub ListSub--cust list--db">

            <div class="TP-ColorStyle TP-HotelSelectWidget">
                <label>
                    <?php _ex('tp_admin_page_widgets_shortcode_7_field_cat1_label',
                        '(Select selection)', TPOPlUGIN_TEXTDOMAIN); ?>

                </label>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][cat1]" class="TP-Zelect TP-ZelectCat">
                    <?php foreach($cat[$loc] as $key=>$cat_val){ ?>
                        <option value="<?php echo $key ?>"
                            <?php selected( \app\includes\TPPlugin::$options["widgets"][$widgets]['cat1'], $key ); ?>>
                            <?php echo $cat_val ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="TP-ColorStyle TP-HotelSelectWidget">
                <label>
                    <?php _ex('tp_admin_page_widgets_shortcode_7_field_cat2_label',
                        '(Select selection)', TPOPlUGIN_TEXTDOMAIN); ?>
                </label>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][cat2]" class="TP-Zelect TP-ZelectCat">
                    <?php foreach($cat[$loc] as $key=>$cat_val){ ?>
                        <option value="<?php echo $key ?>"
                            <?php selected( \app\includes\TPPlugin::$options["widgets"][$widgets]['cat2'], $key ); ?>>
                            <?php echo $cat_val ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="TP-ColorStyle TP-HotelSelectWidget">
                <label>
                    <?php _ex('tp_admin_page_widgets_shortcode_7_field_cat3_label',
                        '(Select selection)', TPOPlUGIN_TEXTDOMAIN); ?>
                </label>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][cat3]" class="TP-Zelect TP-ZelectCat">
                    <?php foreach($cat[$loc] as $key=>$cat_val){ ?>
                        <option value="<?php echo $key ?>"
                            <?php selected( \app\includes\TPPlugin::$options["widgets"][$widgets]['cat3'], $key ); ?>>
                            <?php echo $cat_val ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

        </div>
        <div class="TP-HeadTable ">
            <label>
                <span>
                    <?php _ex('tp_admin_page_widgets_shortcode_7_field_limit_label',
                        '(Limit)', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][limit]" class="TP-Zelect">
                    <?php for($i = 1; $i < 11; $i++){ ?>
                    <option <?php selected( \app\includes\TPPlugin::$options["widgets"][$widgets]['limit'], $i ); ?>
                        value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>

                </select>
            </label>
            <label>

            </label>
        </div>
        <div class="TP-HeadTable ">
            <label>
                <span>
                    <?php _ex('tp_admin_page_widgets_shortcode_7_field_type_label',
                        '(View widget)', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][type]" class="TP-Zelect">
                    <option <?php selected( \app\includes\TPPlugin::$options["widgets"][$widgets]['type'], 'full'); ?>
                        value="full">
                        <?php _ex('tp_admin_page_widgets_shortcode_7_field_type_value_full',
                            '(Full)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option <?php selected( \app\includes\TPPlugin::$options["widgets"][$widgets]['type'], 'compact'); ?>
                        value="compact">
                        <?php _ex('tp_admin_page_widgets_shortcode_7_field_type_value_compact',
                            '(Compact)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                </select>
            </label>
            <label>

            </label>
        </div>
        <div class="TP-HeadTable  TPCheckBoxWidget">
            <input id="chek77" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][responsive]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['responsive']), 1) ?> hidden />
            <label for="chek77">
                <?php _ex('tp_admin_page_widgets_shortcode_7_field_responsive_label',
                    '(Responsive)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>

        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom">
                <?php _ex('tp_admin_page_widgets_shortcode_7_field_width_label',
                    '(Width)', TPOPlUGIN_TEXTDOMAIN); ?>(px)</span>
            <div class="ItemSub  ItemSub-3">
                <label>
                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
        </div>
        <?php
    }

    public function TPFieldWidget_8(){
        $widgets = 8;
        ?>
        <div class="TP-HeadTable ">
            <label>
                <span>
                    <?php _ex('tp_admin_page_widgets_shortcode_8_field_type_label',
                        '(Widget type)', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][type]" class="TP-Zelect">
                    <option <?php selected( \app\includes\TPPlugin::$options["widgets"][$widgets]['type'], 'full'); ?>
                        value="brickwork">
                        <?php _ex('tp_admin_page_widgets_shortcode_8_field_type_value_tile',
                            '(Tile)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option <?php selected( \app\includes\TPPlugin::$options["widgets"][$widgets]['type'], 'compact'); ?>
                        value="slider">
                        <?php _ex('tp_admin_page_widgets_shortcode_8_field_type_value_slider',
                            '(Slider)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                </select>
            </label>
            <label>

            </label>
        </div>
        <div class="TP-HeadTable ">
            <label>
                <span><?php //_e('Limit', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                <ul class="TP-listSet">
                    <li>
                        <input id="rchek18" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][filter]"
                            <?php checked(\app\includes\TPPlugin::$options['widgets'][$widgets]['filter'], 0) ?> hidden value="0" />
                        <label for="rchek18">
                            <?php _ex('tp_admin_page_widgets_shortcode_8_field_filter_airlines_label',
                                '(Filter by airlines)', TPOPlUGIN_TEXTDOMAIN); ?>
                        </label>
                    </li>
                    <li>
                        <input id="rchek28" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][filter]"
                            <?php checked(\app\includes\TPPlugin::$options['widgets'][$widgets]['filter'], 1) ?> hidden value="1" />
                        <label for="rchek28">
                            <?php _ex('tp_admin_page_widgets_shortcode_8_field_filter_routes_label',
                                '(Filter by routes)', TPOPlUGIN_TEXTDOMAIN); ?>
                        </label>
                    </li>
                </ul>
            </label>
            <label>

            </label>
        </div>
        <div class="TP-HeadTable ">
            <label>
                <span>
                    <?php _ex('tp_admin_page_widgets_shortcode_8_field_limit_label',
                        '(Limit)', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets; ?>][limit]" class="TP-Zelect">
                    <?php for($i = 1; $i < 22; $i++){ ?>
                        <option <?php selected( \app\includes\TPPlugin::$options["widgets"][$widgets]['limit'], $i ); ?>
                            value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>

                </select>
            </label>
            <label>

            </label>
        </div>
        <div class="TP-HeadTable  TPCheckBoxWidget">
            <input id="chek88" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][responsive]"
                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['widgets'][$widgets]['responsive']), 1) ?> hidden />
            <label for="chek88">
                <?php _ex('tp_admin_page_widgets_shortcode_8_field_responsive_label',
                    '(Responsive)', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>

        </div>
        <div class="TP-ListSub ListSub--cust list--db">
            <span class="TP-titleSub--custom">
                <?php _ex('tp_admin_page_widgets_shortcode_8_field_width_label',
                    '(Width)', TPOPlUGIN_TEXTDOMAIN); ?>(px)</span>
            <div class="ItemSub  ItemSub-3">
                <label>
                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[widgets][<?php echo $widgets;?>][width]"
                           type="text"
                           value="<?php echo esc_attr(\app\includes\TPPlugin::$options['widgets'][$widgets]['width']) ?>">
                </label>
            </div>
        </div>
        <?php
    }
}
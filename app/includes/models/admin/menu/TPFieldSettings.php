<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 11:04
 */
namespace app\includes\models\admin\menu;
use app\includes\common\TPHostURL;
use app\includes\common\TPLang;
use app\includes\TPPlugin;


class TPFieldSettings {



    public function __construct(){

    }
    /**/

    /**
     *
     */
    public function TPFieldAccount(){
        ?>
        <div class="TP-colForm">
            <div class="TP-FormItem">
                <div class="ItemSub">
                    <span><?php _ex('Token',
                            'tp_admin_page_settings_tab_account_field_token_label', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label>
                        <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[account][token]"
                               value="<?php echo esc_attr(\app\includes\TPPlugin::$options['account']['token']) ?>"/>
                    </label>
                </div>
                <!--<div class="ItemSub">
                    <span><?php //_ex('tp_admin_page_settings_tab_account_field_extra_marker_label',
                            //'(Extra marker)', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label>
                        <input type="text" name="<?php //echo TPOPlUGIN_OPTION_NAME;?>[account][extra_marker]"
                               value="<?php //echo esc_attr(\app\includes\TPPlugin::$options['account']['extra_marker']) ?>"/>
                    </label>
                </div>-->

                <div class="ItemSub">
                    <span><?php _ex('White Label (Flights)',
                            'tp_admin_page_settings_tab_account_field_white_label', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label>
                        <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[account][white_label]"
                               value="<?php echo esc_attr(\app\includes\TPPlugin::$options['account']['white_label']) ?>"/>
                    </label>
                </div>
            </div>
        </div>
        <div class="TP-colForm">
            <div class="TP-FormItem">
                <div class="ItemSub">
                    <span><?php _ex('Marker',
                            'tp_admin_page_settings_tab_account_field_marker_label', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    <label>
                        <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[account][marker]"
                               value="<?php echo esc_attr(\app\includes\TPPlugin::$options['account']['marker']) ?>"/>
                    </label>
                </div>
                <div class="ItemSub">
                    <span><?php _ex('White Label (Hotels)',
                            'tp_admin_page_settings_tab_account_field_white_label_hotel_label', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label>
                        <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[account][white_label_hotel]"
                               value="<?php echo esc_attr(\app\includes\TPPlugin::$options['account']['white_label_hotel']) ?>"/>
                    </label>
                </div>


            </div>
        </div>
    <?php
    }

    /**
     *
     */
    public function TPFieldConfig(){
        ?>
        <div class="TP-colForm">
            <div class="TP-FormItem">
                <div class="ItemSub">
                    <span><?php  _ex('Error Message',
                            'tp_admin_page_settings_tab_config_field_message_error_label', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    <label>
                        <?php


                        if (!array_key_exists(\app\includes\common\TPLang::getLang(), \app\includes\TPPlugin::$options['config']['message_error'])){
                            foreach(\app\includes\TPPlugin::$options['config']['message_error'] as $key_local => $title){
                                $typeFields = (\app\includes\common\TPLang::getDefaultLang() != $key_local)?'hidden':'text';
                                ?>
                                <input type="<?php echo $typeFields; ?>" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][message_error][<?php echo $key_local; ?>]"
                                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['config']['message_error'][$key_local]) ?>"/>
                                <?php
                            }
                        } else {
                            foreach(\app\includes\TPPlugin::$options['config']['message_error'] as $key_local => $title){
                                $typeFields = (\app\includes\common\TPLang::getLang() != $key_local)?'hidden':'text';
                                ?>
                                <input type="<?php echo $typeFields; ?>" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][message_error][<?php echo $key_local; ?>]"
                                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['config']['message_error'][$key_local]) ?>"/>
                                <?php
                            }
                        }



                        ?>
                    </label>
                </div>
                <div class="ItemSub">
                    <span><?php _ex('Action after click (Flights)',
                            'tp_admin_page_settings_tab_config_field_after_url_label', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    <ul class="TP-listSet">
                        <li>
                            <input id="rchek1" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][after_url]"
                                <?php checked(\app\includes\TPPlugin::$options['config']['after_url'], 0) ?> hidden value="0" />
                            <label for="rchek1">
                                <?php _ex('Show Search Form',
                                    'tp_admin_page_settings_tab_config_field_after_url_value_0_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li>
                            <input id="rchek2" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][after_url]"
                                <?php checked(\app\includes\TPPlugin::$options['config']['after_url'], 1) ?> hidden value="1" />
                            <label for="rchek2">
                                <?php _ex('Show Search Results',
                                    'tp_admin_page_settings_tab_config_field_after_url_value_1_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="ItemSub">
                    <span><?php _ex('Action after click (Hotels)',
                            'tp_admin_page_settings_tab_config_field_hotel_after_url_label', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    <ul class="TP-listSet">
                        <li>
                            <input id="rchek11" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][hotel_after_url]"
                                <?php checked(\app\includes\TPPlugin::$options['config']['hotel_after_url'], 0) ?> hidden value="0" />
                            <label for="rchek11">
                                <?php _ex('Show city page',
                                    'tp_admin_page_settings_tab_config_field_hotel_after_url_value_0_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li>
                            <input id="rchek22" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][hotel_after_url]"
                                <?php checked(\app\includes\TPPlugin::$options['config']['hotel_after_url'], 1) ?> hidden value="1" />
                            <label for="rchek22">
                                <?php _ex('Show hotel page',
                                    'tp_admin_page_settings_tab_config_field_hotel_after_url_value_1_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="ItemSub">
                    <span><?php _ex('Distance Units',
                            'tp_admin_page_settings_tab_config_field_distance_label', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][distance]" class="TP-Zelect">
                        <option <?php selected( \app\includes\TPPlugin::$options['config']['distance'], 1 ); ?> value="1">
                            <?php _ex('km',
                                'tp_admin_page_settings_tab_config_field_distance_value_1_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option <?php selected( \app\includes\TPPlugin::$options['config']['distance'], 2 ); ?>  value="2">
                            <?php _ex('miles',
                                'tp_admin_page_settings_tab_config_field_distance_value_2_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                    </select>
                </div>
                <div class="TP-ListSub ListSub--cust list--db">
                    <span class="TP-titleSub--custom">
                        <?php _ex('Airlines logo size',
                            'tp_admin_page_settings_tab_config_field_airline_logo_size_label', TPOPlUGIN_TEXTDOMAIN); ?> (px)</span>
                    <div class="ItemSub">
                        <div class="spinnerW TP-SpinnerWSize clearfix" data-trigger="spinner">
                            <label>
                                <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][airline_logo_size][width]"
                                       type="text"
                                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['config']['airline_logo_size']['width']) ?>">
                            </label>
                            <div class="navSpinner">
                                <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                                <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                            </div>
                        </div>
                    </div>
                    <span class="TP-titleSub TP-titleSub--sdf">X</span>
                    <div class="ItemSub">
                        <div class="spinnerW TP-SpinnerWSize clearfix" data-trigger="spinner">
                            <label>
                                <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][airline_logo_size][height]"
                                       type="text"
                                       value="<?php echo esc_attr(\app\includes\TPPlugin::$options['config']['airline_logo_size']['height']) ?>">
                            </label>
                            <div class="navSpinner">
                                <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                                <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="ItemSub TPItemSubCompactButtons">
                    <span><?php _ex('Buttons in the editor',
                            'tp_admin_page_settings_tab_config_field_media_button_label', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][media_button][view]"
                            class="TP-Zelect">
                        <option
                            <?php selected( \app\includes\TPPlugin::$options['config']['media_button']['view'], 0 ); ?> value="0">
                            <?php _ex('Default',
                                'tp_admin_page_settings_tab_config_field_media_button_value_1_label' , TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option
                            <?php selected( \app\includes\TPPlugin::$options['config']['media_button']['view'], 1 ); ?> value="1">
                            <?php _ex('Compact',
                                'tp_admin_page_settings_tab_config_field_media_button_value_1_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option
                            <?php selected( \app\includes\TPPlugin::$options['config']['media_button']['view'], 2 ); ?> value="2">
                            <?php _ex('Hide',
                                'tp_admin_page_settings_tab_config_field_media_button_value_2_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>

                    </select>
                    <!--<input id="chek10" class="TPChekCompactButtons" type="checkbox" name="<?php //echo TPOPlUGIN_OPTION_NAME;?>[config][compact_button]"
                           value="1" <?php //checked(isset(\app\includes\TPPlugin::$options['config']['compact_button']), 1) ?> hidden />
                    <label for="chek10"><?php //_e('Compact buttons in the editor', TPOPlUGIN_TEXTDOMAIN); ?></label>-->
                </div>
            </div>

            <div class="TP-FormItem">

                <div class="ItemSub">
                    <ul class="TP-listSet">
                        <li>
                            <input id="chek1" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][redirect]"
                                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['config']['redirect']), 1) ?> hidden />
                            <label for="chek1">
                                <?php _ex('Redirect',
                                    'tp_admin_page_settings_tab_config_field_redirect_label', TPOPlUGIN_TEXTDOMAIN); ?></label>
                            <div class="svg-img-1">
                                <a href="#" class="tooltip-settings">
                                    <span>
                                        <?php _ex('In this case the 301 Redirect, which is more preferable for search engines, will be activated. We recommend that you don’t change this option.',
                                            'tp_admin_page_settings_tab_config_field_redirect_help', TPOPlUGIN_TEXTDOMAIN); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                            <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                            <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                                </a></div>
                        </li>
                        <li>
                            <input id="chek2" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][target_url]"
                                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['config']['target_url']), 1) ?> hidden />
                            <label for="chek2">
                                <?php _ex('Open in a New Window',
                                    'tp_admin_page_settings_tab_config_field_target_url_label', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input id="chek3" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][nofollow]"
                                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['config']['nofollow']), 1) ?> hidden />
                            <label for="chek3">
                                <?php  _ex('Add Nofollow Attribute',
                                    'tp_admin_page_settings_tab_config_field_nofollow_label', TPOPlUGIN_TEXTDOMAIN); ?></label>
                            <div class="svg-img-1">
                                <a href="#" class="tooltip-settings">
                                    <span>
                                        <?php _ex('This attribute avoids getting undesirable search results into the search engines index. We recommend that you don’t change this option.',
                                            'tp_admin_page_settings_tab_config_field_nofollow_help', TPOPlUGIN_TEXTDOMAIN); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                                    <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                                    <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                                </a></div>
                        </li>
                        <li>
                            <input id="chek34" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][statistics]"
                                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['config']['statistics']), 1) ?> hidden />
                            <label for="chek34">
                                <?php _ex('Turn off statistics and blog updates', 'tp_admin_page_settings_tab_config_field_statistics_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </label>

                        </li>
                        <li>
                            <input id="chek35" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][limit_script]"
                                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['config']['limit_script']), 1) ?> hidden />
                            <label for="chek35">
                                <?php _ex('Use plugin\'s scripts on all pages', 'tp_admin_page_settings_tab_config_field_limit_script_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </label>

                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="TP-colForm">
            <div class="TP-FormItem mb--cus">
                <div class="ItemSub">
                    <span>
                        <?php _ex('Cache Timeout',
                            'tp_admin_page_settings_tab_config_field_cache_value_label', TPOPlUGIN_TEXTDOMAIN);?>
                    </span>

                    <div class="TP-childF">


                        <div class="TP-colCacheFlight">
                            <span>
                            <?php _ex('Flights',
                                'tp_admin_page_settings_tab_config_field_cache_value_label_flights', TPOPlUGIN_TEXTDOMAIN);?>
                            </span>

                            <div class="spinnerW clearfix" data-trigger="spinner">
                                <label>
                                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][cache_value][flight]"
                                           type="text" value="<?php echo \app\includes\TPPlugin::$options['config']['cache_value']['flight']; ?>"
                                           data-rule="cache_value">
                                </label>
                                <div class="navSpinner">
                                    <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                                    <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                                </div>
                            </div>
                        </div>

                        <div class="TP-colCacheHotel">
                             <span>
                            <?php _ex('Hotels',
                                'tp_admin_page_settings_tab_config_field_cache_value_label_hotels', TPOPlUGIN_TEXTDOMAIN);?>
                            </span>

                            <div class="spinnerW clearfix" data-trigger="spinner">
                                <label>
                                    <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][cache_value][hotel]"
                                           type="text" value="<?php echo \app\includes\TPPlugin::$options['config']['cache_value']['hotel']; ?>"
                                           data-rule="cache_hotel">
                                </label>
                                <div class="navSpinner">
                                    <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                                    <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                                </div>
                            </div>
                        </div>





                        <!--<div class="spinnerW clearfix" data-trigger="spinner">
                            <label>
                                <input name="<?php //echo TPOPlUGIN_OPTION_NAME;?>[config][cache_value]"
                                       type="text" value="<?php //echo \app\includes\TPPlugin::$options['config']['cache_value']; ?>"
                                       data-rule="cache_value">
                            </label>
                            <div class="navSpinner">
                                <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                                <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                            </div>
                        </div>
                        <ul class="TP-listSet TP-listSet--row">
                            <li>
                                <input  id="rchek3" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][cache]"
                                    <?php //checked(\app\includes\TPPlugin::$options['config']['cache'], 0) ?> value="0" hidden/>
                                <label for="rchek3">
                                    <?php  //_ex('tp_admin_page_settings_tab_config_field_cache_value_0_label',
                                        //'(Day)', TPOPlUGIN_TEXTDOMAIN); ?>
                                </label>
                            </li>
                            <li>
                                <input id="rchek4" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][cache]"
                                    <?php //checked(\app\includes\TPPlugin::$options['config']['cache'], 1) ?> value="1" hidden/>
                                <label for="rchek4">
                                    <?php //_ex('tp_admin_page_settings_tab_config_field_cache_value_1_label',
                                        //'(Hour)', TPOPlUGIN_TEXTDOMAIN); ?>
                                </label>
                            </li>-->
                        </ul>
                    </div>
                </div>




                <div class="ItemSub">
                    <span class="clearfix">
                        <div class="box-span-1">
                            <?php _ex('Script Include',
                                'tp_admin_page_settings_tab_config_field_script_label', TPOPlUGIN_TEXTDOMAIN);?>
                        </div>
                        <div class="svg-img-1">
                            <a href="#" class="tooltip-settings"><span>
                                    <?php  _ex('Select &lt;head&gt; option to speed up the page loading. In case it still goes slow, try switching to &lt;footer&gt;',
                                        'tp_admin_page_settings_tab_config_field_script_help', TPOPlUGIN_TEXTDOMAIN);?>
                                </span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg></a></div></span>
                    <ul class="TP-listSet">
                        <li>
                            <input id="rchek5" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][script]"
                                <?php checked(\app\includes\TPPlugin::$options['config']['script'], 0) ?> value="0" hidden />
                            <label for="rchek5">
                                <?php _ex('Inside &lt;head&gt; tag',
                                    'tp_admin_page_settings_tab_config_field_script_value_0_label', TPOPlUGIN_TEXTDOMAIN);?></label>
                        </li>
                        <li>
                            <input id="rchek6" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][script]"
                                <?php checked(\app\includes\TPPlugin::$options['config']['script'], 1) ?> value="1" hidden />
                            <label for="rchek6">
                                <?php _ex('Inside &lt;footer&gt; tag',
                                    'tp_admin_page_settings_tab_config_field_script_value_1_label', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                    </ul>
                </div>
                <div class="ItemSub ItemSubFormatDate">

                     <span>
                         <div class="box-span">
                             <?php _ex('Date Format',
                                 'tp_admin_page_settings_tab_config_field_format_date_label', TPOPlUGIN_TEXTDOMAIN); ?>
                         </div>
                         <div class="svg-img-1"><a href="#" class="tooltip-settings">
                                 <span>
                                     <ul>
                                         <li>
                                             <?php  _ex('Use variables to set the date:',
                                                 'tp_admin_page_settings_tab_config_field_format_date_help_li_1', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>d - <?php _ex('day',
                                                 'tp_admin_page_settings_tab_config_field_format_date_help_li_2', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>f - <?php _ex('month name (small letters)',
                                                 'tp_admin_page_settings_tab_config_field_format_date_help_li_3', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>F - <?php _ex('month name (capital letters)',
                                                 'tp_admin_page_settings_tab_config_field_format_date_help_li_4', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>m - <?php _ex('month number',
                                                 'tp_admin_page_settings_tab_config_field_format_date_help_li_5', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>M - <?php _ex('month (3 letters)',
                                                 'tp_admin_page_settings_tab_config_field_format_date_help_li_6', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>mm - <?php _ex('month (3 small letters)',
                                                 'tp_admin_page_settings_tab_config_field_format_date_help_li_7', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>y - <?php _ex('last 2 digits of the year',
                                                 'tp_admin_page_settings_tab_config_field_format_date_help_li_8', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>Y - <?php _ex('year',
                                                 'tp_admin_page_settings_tab_config_field_format_date_help_li_9', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                     </ul>

                                 </span>
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                         <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                         <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg></a></div></span>
                    <label>
                        <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][format_date]"
                               value="<?php echo esc_attr(\app\includes\TPPlugin::$options['config']['format_date']) ?>"
                               class=""/>
                    </label>
                    <span class="TPSpanFormatDate">
                        <?php _ex('Current format',
                            'tp_admin_page_settings_tab_config_field_current_format_date_label', TPOPlUGIN_TEXTDOMAIN); ?>:
                        <?php  echo $this->tpDate(); ?>
                    </span>
                </div>
                <div class="ItemSub ItemSub-YM-GA ItemSub-YM-GA-cust ItemSub-Table-YM-GA">
                    <span>
                        <div class="box-span">
                            <?php _ex('Event tracking. "Find" button',
                                'tp_admin_page_settings_tab_config_field_code_ga_ym_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </div>
                        <div class="svg-img-1">
                            <a href="#" class="tooltip-settings">
                            <span><?php _ex('Set a goal in Yandex Metrica or Google Analytics and paste in this field the  code you need to track the event (reaching the goal). In example, "yaCounterXXXXXX.reachGoal(\'TARGET_NAME\');" or "ga(\'send\', \'event\', \'category\', \'action\');"',
                                     'tp_admin_page_settings_tab_config_field_code_ga_ym_help', TPOPlUGIN_TEXTDOMAIN); ?></span>

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                                <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                                <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                            </a></div>
                    </span>


                    <label>
                        <textarea  rows="4" cols="20"
                                   name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][code_ga_ym]"><?php echo esc_attr(\app\includes\TPPlugin::$options['config']['code_ga_ym']) ?></textarea>
                    </label>
                </div>
                <div class="ItemSub ItemSub-YM-GA ItemSub-YM-GA-cust ItemSub-Table-YM-GA">
                    <span>
                        <div class="box-span">
                            <?php _ex('Event tracking. Table is loaded',
                                'tp_admin_page_settings_tab_config_field_code_table_ga_ym_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </div>
                        <div class="svg-img-1">
                            <a href="#" class="tooltip-settings">
                            <span><?php _ex('Google Analytics event that will be fired every time a table loads.',
                                    'tp_admin_page_settings_tab_config_field_code_table_ga_ym_help', TPOPlUGIN_TEXTDOMAIN); ?></span>

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                            </a></div>
                    </span>


                    <label>
                        <textarea  rows="4" cols="20"
                                   name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][code_table_ga_ym]"><?php echo esc_attr(\app\includes\TPPlugin::$options['config']['code_table_ga_ym']) ?></textarea>
                    </label>
                </div>

            </div>
            <div class="TP-FormItem">

                <div class="ItemSub">
                    <span><?php _ex('Import settings',
                            'tp_admin_page_settings_tab_config_btn_import_settings', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    <div class="TP-listNavsSetting">
                        <div class="TP-NavRow">
                            <div class="input_button_style">
                                <div class="input_font_style"><?php  _ex('Browse',
                                        'tp_admin_page_settings_tab_config_btn_browse', TPOPlUGIN_TEXTDOMAIN); ?></div>
                                <input type="file" accept=".txt" name="select_file" id="importFile" size="1" class="input_input_style" multiple="">
                            </div>
                            <a class="TP-BtnTab disable importnBtn">
                                <?php _ex('Import',
                                    'tp_admin_page_settings_tab_config_btn_import', TPOPlUGIN_TEXTDOMAIN); ?></a>
                            <span class="infoFile"><?php _ex('The file is not selected',
                                    'tp_admin_page_settings_tab_config_btn_import_msg_error', TPOPlUGIN_TEXTDOMAIN); ?></span>
                        </div>
                        <div class="TP-NavRow">
                            <a class="TP-BtnTab exportBtn" id="exportSettings">
                                <?php _ex('Export',
                                    'tp_admin_page_settings_tab_config_btn_export_settings', TPOPlUGIN_TEXTDOMAIN); ?>
                            </a>


                        </div>
                    </div>
                </div>
                <div class="TP-FormItem TPDefaultSettingsItem">
                    <a href="#" class="TP-deleteShortLincks TP-deleteShortLincks--cust" id="TPDefaultSettings">
                        <i></i><?php _ex('Default settings',
                            'tp_admin_page_settings_tab_config_btn_default', TPOPlUGIN_TEXTDOMAIN); ?>
                    </a>
                </div>
            </div>

        </div>
    <?php
    }

    /**
     *
     */
    public function TPFieldLocal(){
        ?>
        <div class="TP-LocalHead">
            <label>
                <span><?php _ex('Tables and Widgets Language',
                        'tp_admin_page_settings_tab_localization_field_localization_label', TPOPlUGIN_TEXTDOMAIN); ?></span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[local][localization]" class="TP-Zelect TPFieldLocalization">
                    <option <?php selected( \app\includes\TPPlugin::$options['local']['localization'], 1 ); ?> value="1">
                        <?php _ex('Russian',
                            'tp_admin_page_settings_tab_localization_field_localization_value_1_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option <?php selected( \app\includes\TPPlugin::$options['local']['localization'], 2 ); ?>  value="2">
                        <?php _ex('English',
                            'tp_admin_page_settings_tab_localization_field_localization_value_2_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option <?php selected( \app\includes\TPPlugin::$options['local']['localization'], 3 ); ?>  value="3">
                        <?php _ex('Thai',
                            'tp_admin_page_settings_tab_localization_field_localization_value_3_label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                </select>
            </label>
            <label>

            </label>

        </div>
        <div class="TP-LocalHead">
            <label>
                 <span><?php _ex('Currency',
                         'tp_admin_page_settings_tab_localization_field_currency_label', TPOPlUGIN_TEXTDOMAIN); ?></span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[local][currency]" class="TP-Zelect">
                    <?php foreach(\app\includes\common\TPCurrencyUtils::getCurrencyAll() as $currency){ ?>
                        <option
                            <?php selected( \app\includes\TPPlugin::$options['local']['currency'], $currency ); ?>
                                value="<?php echo $currency ?>">
                            <?php echo $currency; ?>
                        </option>
                    <?php } ?>

                </select>
            </label>
            <label>

                <span>
                    <?php _ex('Show the currency',
                        'Admin page settings tab localization field currency_symbol_display label', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[local][currency_symbol_display]" class="TP-Zelect">
                    <option value="0">
                        <?php
                        _ex('After the price',
                            'Admin page settings tab localization field currency_symbol_display option 0 label',
                            TPOPlUGIN_TEXTDOMAIN);
                        ?>
                    </option>
                    <option value="1">
                        <?php
                        _ex('Before the price',
                            'Admin page settings tab localization field currency_symbol_display option 1 label',
                            TPOPlUGIN_TEXTDOMAIN);
                        ?>
                    </option>
                    <option value="2">
                        <?php
                        _ex('Hide',
                            'Admin page settings tab localization field currency_symbol_display option 2 label',
                            TPOPlUGIN_TEXTDOMAIN);
                        ?>
                    </option>
                    <option value="3">
                        <?php
                        _ex('Сurrency code (after the price)',
                            'Admin page settings tab localization field currency_symbol_display option 3 label',
                            TPOPlUGIN_TEXTDOMAIN);
                        ?>
                    </option>
                    <option value="4">
                        <?php
                        _ex('Currency code (before the price)',
                            'Admin page settings tab localization field currency_symbol_display option 4 label',
                            TPOPlUGIN_TEXTDOMAIN);
                        ?>
                    </option>
                </select>
            </label>
        </div>
         <div class="TP-LocalHead">
             <?php $this->TPFieldHost(); ?>
             <?php $this->tpFieldHostHotel(); ?>

         </div>
        <div class="TP-LocalHead TPFieldTitleCaseDiv">
            <?php $this->TPFieldTitleCase(); ?>
        </div>
        <div class="TP-listColum">
            <span><?php _ex('Fields (you can edit values on your own, e.g. for your own language)',
                    'tp_admin_page_settings_tab_localization_field_table_td_label', TPOPlUGIN_TEXTDOMAIN); ?></span>
            <div id="tabs-local_field">
                <nav class="TPNavigation TPNavigationLocal">
                    <ul class="TPMainMenu TPMainMenuLocal">
                        <li>
                            <a href="#tabs-local_field_flight" class="TPMainMenuA">
                            <span>
                            <?php _ex('Flight Tickets',
                                'tp_admin_page_settings_tab_menu_local_tab_field_local_flight', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                            </a>
                        </li>

                        <li>
                            <a href="#tabs-local_field_hotel" class="TPMainMenuA">
                            <span>
                            <?php _ex('Hotels',
                                'tp_admin_page_settings_tab_menu_local_tab_field_local_hotel', TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                            </a>
                        </li>
                        <li class="tabs-local-field-item-railway">
                            <a href="#tabs-local_field_railway" class="TPMainMenuA">
                            <span>
                            <?php _ex('Railway tables',
                                'admin page settings tab menu local tab field local railway',
                                TPOPlUGIN_TEXTDOMAIN); ?>
                        </span>
                            </a>
                        </li>


                    </ul>
                </nav>
                <div id="tabs-local_field_flight">
                    <?php $this->tabLocalFieldFlight(); ?>
                </div>
                <div id="tabs-local_field_hotel">
                    <?php $this->tabLocalFieldHotel(); ?>
                </div>
                <div id="tabs-local_field_railway">
	                <?php $this->tabLocalFieldRailway(); ?>
                </div>
            </div>




        </div>
    <?php
    }


    public function tabLocalFieldFlight(){
        $local_table_fields = '<ul class="titleHeadTable">
               <li class="TPLangFieldsLi">'.\app\includes\common\TPLang::getLang().'</li>
          </ul>';
        foreach(\app\includes\TPPlugin::$options['local']['fields'] as $key_local => $fields){
            $showFields = (\app\includes\common\TPLang::getLang() != $key_local)?'TP-ListRowColumNot':'';
            $local_table_fields .= '<div class="'.$showFields.' TPFields_'.$key_local.'" >';
            $i = 0;

            foreach(array_chunk($fields['label'], 2, true) as $value){
                $local_table_fields .= '<div class="TP-ListRowColum">';
                foreach( $value as $key_label => $label ){
                    $local_table_fields .= '<div class="infoRow" title="'.$fields['label_default'][$key_label].'"></div>
                                        <div>
                                            <label>
                                                <input name="'.TPOPlUGIN_OPTION_NAME.'[local][fields]['.$key_local.'][label]['.$key_label.']" type="text" value="'.$label.'"/>
                                                <input name="'.TPOPlUGIN_OPTION_NAME.'[local][fields]['.$key_local.'][label_default]['.$key_label.']" type="hidden" value="'.$fields['label_default'][$key_label].'"/>
                                            </label>
                                        </div>';
                }
                $local_table_fields .= '</div>';
            }
            //error_log(print_r(array_chunk($fields['label'], 2, true), TRUE));

            $local_table_fields .= '</div>';
        }
        //error_log($local_table_fields);
        echo $local_table_fields;
    }

    public function tabLocalFieldHotel(){
        $localFields = '';
        $localFields = '<ul class="titleHeadTable">
               <li class="TPLangFieldsLi">'.\app\includes\common\TPLang::getLang().'</li>
          </ul>';
        foreach(TPPlugin::$options['local']['hotels_fields'] as $key_local => $fields){
            $showFields = (TPLang::getLang() != $key_local)?'TP-ListRowColumNot':'';
            $localFields .= '<div class="'.$showFields.' TPFields_'.$key_local.'" >';

            foreach(array_chunk($fields['label'], 2, true) as $value){
                $localFields .= '<div class="TP-ListRowColum">';
                foreach( $value as $key_label => $label ){
                    $localFields .= '<div class="infoRow" title="'.$fields['label_default'][$key_label].'"></div>
                                        <div>
                                            <label>
                                                <input name="'.TPOPlUGIN_OPTION_NAME.'[local][hotels_fields]['.$key_local.'][label]['.$key_label.']" type="text" value="'.$label.'"/>
                                                <input name="'.TPOPlUGIN_OPTION_NAME.'[local][hotels_fields]['.$key_local.'][label_default]['.$key_label.']" type="hidden" value="'.$fields['label_default'][$key_label].'"/>
                                            </label>
                                        </div>';
                }
                $localFields .= '</div>';
            }

            $localFields .= '</div>';
        }
        echo $localFields;
    }

	public function tabLocalFieldRailway(){
		$localFields = '';
		$localFields = '<ul class="titleHeadTable">
               <li class="TPLangFieldsLi">'.\app\includes\common\TPLang::getLang().'</li>
          </ul>';
		foreach(TPPlugin::$options['local']['railway_fields'] as $key_local => $fields){
			$showFields = (TPLang::getLang() != $key_local)?'TP-ListRowColumNot':'';
			$localFields .= '<div class="'.$showFields.' TPFields_'.$key_local.'" >';

			foreach(array_chunk($fields['label'], 2, true) as $value){
				$localFields .= '<div class="TP-ListRowColum">';
				foreach( $value as $key_label => $label ){
					$localFields .= '<div class="infoRow" title="'.$fields['label_default'][$key_label].'"></div>
                                        <div>
                                            <label>
                                                <input name="'.TPOPlUGIN_OPTION_NAME.'[local][railway_fields]['.$key_local.'][label]['.$key_label.']" type="text" value="'.$label.'"/>
                                                <input name="'.TPOPlUGIN_OPTION_NAME.'[local][railway_fields]['.$key_local.'][label_default]['.$key_label.']" type="hidden" value="'.$fields['label_default'][$key_label].'"/>
                                            </label>
                                        </div>';
				}
				$localFields .= '</div>';
			}

			$localFields .= '</div>';
		}
		echo $localFields;
	}

    public function tpFieldHostHotel(){
        $hosts = TPHostURL::getHostsHotel();
        $host_option = \app\includes\TPPlugin::$options['local']['host_hotel'];
        ?>
        <label>
            <span>
                <?php _ex('Host(Hotels)',
                    'tp_admin_page_settings_tab_localization_field_host_hotel_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[local][host_hotel]"
                    class="TP-Zelect TPFieldHostHotel">
                <?php foreach($hosts as $key => $host){ ?>
                    <option <?php selected($host_option, $key ); ?>
                        value="<?php echo $key; ?>">
                        <?php echo $host['label']; ?>
                    </option>
                <?php } ?>
            </select>
        </label>
        <?php
    }

    public function TPFieldHost(){
        $hosts = \app\includes\common\TPHostURL::getHost();
        $host_option = \app\includes\TPPlugin::$options['local']['host'];
        $default_host_option = \app\includes\TPPlugin::$options['local']['host'];
        $default_host_ru = 'aviasales.ru';
        $default_host_en = 'jetradar.com';
        $default_host_th = 'jetradar.co.th';
        switch(\app\includes\common\TPLang::getLang()){
            case \app\includes\common\TPLang::getLangRU():
                if(empty($host_option)) $host_option = $default_host_ru;
                break;
            case \app\includes\common\TPLang::getLangEN():
                if(empty($host_option)) $host_option = $default_host_en;
                break;
            case \app\includes\common\TPLang::getLangTH():
                if(empty($host_option)) $host_option = $default_host_th;
                break;
        }
        ?>
        <label class="TPFieldHostLabel">
            <span>
                <?php _ex('Host(Flights)',
                    'tp_admin_page_settings_tab_localization_field_host_label', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[local][host]"
                    class="TP-Zelect TPFieldHost"
                    data-host="<?php echo $default_host_option; ?>"
                    data-default_host_ru="<?php echo $default_host_ru; ?>"
                    data-default_host_en="<?php echo $default_host_en; ?>"
                    data-default_host_th="<?php echo $default_host_th; ?>">
                <?php foreach($hosts as $host){ ?>
                <option <?php selected($host_option, $host ); ?>
                    value="<?php echo $host; ?>">
                    <?php echo $host; ?>
                </option>
                <?php } ?>
            </select>
        </label>
        <?php
    }
    /**
     *
     */
    public function TPFieldTitleCase(){
        ?>
        <label>
            <span>
                <?php _ex('Origin',
                    'tp_admin_page_settings_tab_localization_title_case_origin_label', TPOPlUGIN_TEXTDOMAIN ); ?>
            </span>
            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[local][title_case][origin]" class="TP-Zelect">
                <!--<option <?php //selected( \app\includes\TPPlugin::$options['local']['title_case']['origin'], "name" ); ?> value="name">
                    <?php //_e('Default', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>-->
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['origin'], "ro" ); ?> value="ro">
                    <?php _ex('Genitive',
                        'tp_admin_page_settings_tab_localization_title_case_origin_value_ro_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['origin'], "da" ); ?> value="da">
                    <?php _ex('Dative',
                        'tp_admin_page_settings_tab_localization_title_case_origin_value_da_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['origin'], "vi" ); ?> value="vi">
                    <?php _ex('Accusative',
                        'tp_admin_page_settings_tab_localization_title_case_origin_value_vi_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['origin'], "tv" ); ?> value="tv">
                    <?php _ex('Ablative',
                        'tp_admin_page_settings_tab_localization_title_case_origin_value_tv_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['origin'], "pr" ); ?> value="pr">
                    <?php _ex('Prepositional',
                        'tp_admin_page_settings_tab_localization_title_case_origin_value_pr_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
            </select>
        </label>
        <label>
            <span><?php _ex('Destination',
                    'tp_admin_page_settings_tab_localization_title_case_destination_label', TPOPlUGIN_TEXTDOMAIN ); ?></span>
            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[local][title_case][destination]" class="TP-Zelect">
                <!--<option <?php //selected( \app\includes\TPPlugin::$options['local']['title_case']['destination'], "name" ); ?> value="name">
                    <?php //_e('Default', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>-->
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['destination'], "ro" ); ?> value="ro">
                    <?php _ex('Genitive',
                        'tp_admin_page_settings_tab_localization_title_case_destination_value_ro_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['destination'], "da" ); ?> value="da">
                    <?php _ex('Dative',
                        'tp_admin_page_settings_tab_localization_title_case_destination_value_da_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['destination'], "vi" ); ?> value="vi">
                    <?php _ex('Accusative',
                        'tp_admin_page_settings_tab_localization_title_case_destination_value_vi_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['destination'], "tv" ); ?> value="tv">
                    <?php _ex('Ablative',
                        'tp_admin_page_settings_tab_localization_title_case_destination_value_tv_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['destination'], "pr" ); ?> value="pr">
                    <?php _ex('Prepositional',
                        'tp_admin_page_settings_tab_localization_title_case_destination_value_pr_label', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
            </select>
        </label>
    <?php
    }
    /**
     * @param string $time
     * @return bool|string
     */
    public function tpDate($time = "") {
        $format = (!empty(\app\includes\TPPlugin::$options['config']['format_date'])) ? \app\includes\TPPlugin::$options['config']['format_date'] : "d.m.Y";
        $translate = array(
            "am" => "дп",
            "pm" => "пп",
            "AM" => "ДП",
            "PM" => "ПП",
            "Monday" => "Понедельник",
            "Mon" => "Пн",
            "Tuesday" => "Вторник",
            "Tue" => "Вт",
            "Wednesday" => "Среда",
            "Wed" => "Ср",
            "Thursday" => "Четверг",
            "Thu" => "Чт",
            "Friday" => "Пятница",
            "Fri" => "Пт",
            "Saturday" => "Суббота",
            "Sat" => "Сб",
            "Sunday" => "Воскресенье",
            "Sun" => "Вс",
            "January" => "Января",
            "Jan" => "Янв",
            "February" => "Февраля",
            "Feb" => "Фев",
            "March" => "Марта",
            "Mar" => "Мар",
            "April" => "Апреля",
            "Apr" => "Апр",
            "May" => "Мая",
            "May" => "Мая",
            "June" => "Июня",
            "Jun" => "Июн",
            "July" => "Июля",
            "Jul" => "Июл",
            "August" => "Августа",
            "Aug" => "Авг",
            "September" => "Сентября",
            "Sep" => "Сен",
            "October" => "Октября",
            "Oct" => "Окт",
            "November" => "Ноября",
            "Nov" => "Ноя",
            "December" => "Декабря",
            "Dec" => "Дек",
            "st" => "ое",
            "nd" => "ое",
            "rd" => "е",
            "th" => "ое"
        );
        switch(\app\includes\TPPlugin::$options['local']['localization']) {
            case 1:

                if (!empty($time)) {
                    if(strpos($format, 'f') !== false){
                        $format = str_replace("f", "F", $format);
                        return  mb_strtolower(strtr(date($format, $time), $translate));
                    }elseif(strpos($format, 'mm') !== false){
                        $format = str_replace("mm", "M", $format);
                        return  mb_strtolower(strtr(date($format, $time), $translate));
                    }else{
                        return strtr(date($format, $time), $translate);
                    }

                } else {
                    if(strpos($format, 'f') !== false){
                        $format = str_replace("f", "F", $format);
                        return  mb_strtolower(strtr(date($format), $translate));
                    }elseif(strpos($format, 'mm') !== false){
                        $format = str_replace("mm", "M", $format);
                        return  mb_strtolower(strtr(date($format), $translate));
                    }else{
                        return strtr(date($format), $translate);
                    }
                }
                break;
            case 2:
                if (!empty($time)) {
                    return date($format, $time);
                } else {
                    return date($format);
                }
                break;
        }
    }
}
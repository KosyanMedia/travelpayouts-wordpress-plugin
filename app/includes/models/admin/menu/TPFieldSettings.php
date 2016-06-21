<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 11:04
 */
namespace app\includes\models\admin\menu;
use app\includes\common\TPHostURL;

class TPFieldSettings {
    public $local = array(
        1 => 'ru',
        2 => 'en',
        3 => 'de',
    );
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
                    <span><?php _e('Token', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label>
                        <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[account][token]"
                               value="<?php echo esc_attr(\app\includes\TPPlugin::$options['account']['token']) ?>"/>
                    </label>
                </div>
                <div class="ItemSub">
                    <span><?php _e('Extra marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label>
                        <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[account][extra_marker]"
                               value="<?php echo esc_attr(\app\includes\TPPlugin::$options['account']['extra_marker']) ?>"/>
                    </label>
                </div>
            </div>
        </div>
        <div class="TP-colForm">
            <div class="TP-FormItem">
                <div class="ItemSub">
                    <span><?php _e('Marker', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label>
                        <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[account][marker]"
                               value="<?php echo esc_attr(\app\includes\TPPlugin::$options['account']['marker']) ?>"/>
                    </label>
                </div>
                <div class="ItemSub">
                    <span><?php _e('White Label', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <label>
                        <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[account][white_label]"
                               value="<?php echo esc_attr(\app\includes\TPPlugin::$options['account']['white_label']) ?>"/>
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
                    <span><?php _e('Error Message', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    <label>
                        <?php
                        foreach(\app\includes\TPPlugin::$options['config']['message_error'] as $key_local => $title){
                                $typeFields = ($this->local[\app\includes\TPPlugin::$options['local']['localization']] != $key_local)?'hidden':'text';
                            ?>
                            <input type="<?php echo $typeFields; ?>" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][message_error][<?php echo $key_local; ?>]"
                                   value="<?php echo esc_attr(\app\includes\TPPlugin::$options['config']['message_error'][$key_local]) ?>"/>
                        <?php
                        }
                        ?>
                    </label>
                </div>
                <div class="ItemSub">
                    <span><?php _e('Action after click', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    <ul class="TP-listSet">
                        <li>
                            <input id="rchek1" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][after_url]"
                                <?php checked(\app\includes\TPPlugin::$options['config']['after_url'], 0) ?> hidden value="0" />
                            <label for="rchek1"><?php _e('Show Search Form', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input id="rchek2" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][after_url]"
                                <?php checked(\app\includes\TPPlugin::$options['config']['after_url'], 1) ?> hidden value="1" />
                            <label for="rchek2"><?php _e('Show Search Results', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                    </ul>
                </div>
                <div class="ItemSub">
                    <span><?php _e('Distance Units', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][distance]" class="TP-Zelect">
                        <option <?php selected( \app\includes\TPPlugin::$options['config']['distance'], 1 ); ?> value="1">
                            <?php _e('km', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option <?php selected( \app\includes\TPPlugin::$options['config']['distance'], 2 ); ?>  value="2">
                            <?php _e('miles', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                    </select>
                </div>
                <div class="TP-ListSub ListSub--cust list--db">
                    <span class="TP-titleSub--custom"><?php _e('Airlines logo size', TPOPlUGIN_TEXTDOMAIN); ?> (px)</span>
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
                    <span><?php _e('Buttons in the editor', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][media_button][view]"
                            class="TP-Zelect">
                        <option
                            <?php selected( \app\includes\TPPlugin::$options['config']['media_button']['view'], 0 ); ?> value="0">
                            <?php echo _x('Default', 'config_media_btn_option', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option
                            <?php selected( \app\includes\TPPlugin::$options['config']['media_button']['view'], 1 ); ?> value="1">
                            <?php echo _x('Compact', 'config_media_btn_option', TPOPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option
                            <?php selected( \app\includes\TPPlugin::$options['config']['media_button']['view'], 2 ); ?> value="2">
                            <?php echo _x('Hide', 'config_media_btn_option', TPOPlUGIN_TEXTDOMAIN); ?>
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
                            <label for="chek1"><?php echo _x('Redirect', 'settings', TPOPlUGIN_TEXTDOMAIN); ?></label>
                            <div class="svg-img-1">
                                <a href="#" class="tooltip-settings">
                                    <span><?php _e('In this case the 301 Redirect, which is more preferable for search engines, will be activated. We recommend that you don’t change this option.', TPOPlUGIN_TEXTDOMAIN); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                            <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                            <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                                </a></div>
                        </li>
                        <li>
                            <input id="chek2" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][target_url]"
                                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['config']['target_url']), 1) ?> hidden />
                            <label for="chek2"><?php _e('Open in a New Window', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input id="chek3" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][nofollow]"
                                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['config']['nofollow']), 1) ?> hidden />
                            <label for="chek3"><?php _e(' Add Nofollow Attribute', TPOPlUGIN_TEXTDOMAIN); ?></label>
                            <div class="svg-img-1">
                                <a href="#" class="tooltip-settings">
                                    <span><?php _e('This attribute avoids getting undesirable search results into the search engines index. We recommend that you don’t change this option.', TPOPlUGIN_TEXTDOMAIN); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                                    <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                                    <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                                </a></div>
                        </li>
                        <li>
                            <input id="chek34" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][statistics]"
                                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['config']['statistics']), 1) ?> hidden />
                            <label for="chek34"><?php _e(' Turn off statistics and blog updates', TPOPlUGIN_TEXTDOMAIN); ?></label>

                        </li>
                    </ul>
                </div>
                <div class="TP-FormItem TPDefaultSettingsItem">
                    <a href="#" class="TP-deleteShortLincks TP-deleteShortLincks--cust" id="TPDefaultSettings">
                        <i></i><?php _e('Default settings', TPOPlUGIN_TEXTDOMAIN); ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="TP-colForm">
            <div class="TP-FormItem mb--cus">
                <div class="ItemSub">
                    <span><?php _e('Cache Timeout', TPOPlUGIN_TEXTDOMAIN);?></span>
                    <div class="TP-childF">
                        <div class="spinnerW clearfix" data-trigger="spinner">
                            <label>
                                <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][cache_value]"
                                       type="text" value="<?php echo \app\includes\TPPlugin::$options['config']['cache_value']; ?>"
                                       data-rule="quantity">
                            </label>
                            <div class="navSpinner">
                                <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                                <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                            </div>
                        </div>
                        <ul class="TP-listSet TP-listSet--row">
                            <li>
                                <input  id="rchek3" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][cache]"
                                    <?php checked(\app\includes\TPPlugin::$options['config']['cache'], 0) ?> value="0" hidden/>
                                <label for="rchek3"><?php _e('Day', TPOPlUGIN_TEXTDOMAIN); ?></label>
                            </li>
                            <li>
                                <input id="rchek4" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][cache]"
                                    <?php checked(\app\includes\TPPlugin::$options['config']['cache'], 1) ?> value="1" hidden/>
                                <label for="rchek4"><?php _e('Hour', TPOPlUGIN_TEXTDOMAIN); ?></label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ItemSub">
                    <span class="clearfix">
                        <div class="box-span-1">
                            <?php _e('Script Include', TPOPlUGIN_TEXTDOMAIN);?>
                        </div>
                        <div class="svg-img-1">
                            <a href="#" class="tooltip-settings"><span>
                                    <?php _e('Select &lt;head&gt; option to speed up the page loading. In case it still goes slow, try switching to &lt;footer&gt;', TPOPlUGIN_TEXTDOMAIN);?>
                                </span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg></a></div></span>
                    <ul class="TP-listSet">
                        <li>
                            <input id="rchek5" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][script]"
                                <?php checked(\app\includes\TPPlugin::$options['config']['script'], 0) ?> value="0" hidden />
                            <label for="rchek5"><?php _e('Inside &lt;head&gt; tag ', TPOPlUGIN_TEXTDOMAIN);?></label>
                        </li>
                        <li>
                            <input id="rchek6" type="radio" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[config][script]"
                                <?php checked(\app\includes\TPPlugin::$options['config']['script'], 1) ?> value="1" hidden />
                            <label for="rchek6"><?php _e('Inside &lt;footer&gt; tag ', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                    </ul>
                </div>
                <div class="ItemSub ItemSubFormatDate">

                     <span>
                         <div class="box-span">
                             <?php _e('Date Format', TPOPlUGIN_TEXTDOMAIN); ?>
                         </div>
                         <div class="svg-img-1"><a href="#" class="tooltip-settings">
                                 <span>
                                     <ul>
                                         <li><?php _e('Use variables to set the date:', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>d - <?php _e('day', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>f - <?php _e('month name (small letters)', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>F - <?php _e('month name (capital letters)', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>m - <?php _e('month number', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>M - <?php _e('month (3 letters)', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>mm - <?php _e('month (3 small letters)', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>y - <?php _e('last 2 digits of the year', TPOPlUGIN_TEXTDOMAIN); ?></li>
                                         <li>Y - <?php _e('year', TPOPlUGIN_TEXTDOMAIN); ?></li>
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
                        <?php _e('Current format', TPOPlUGIN_TEXTDOMAIN); ?>:
                        <?php  echo $this->tpDate(); ?>
                    </span>
                </div>
                <div class="ItemSub ItemSub-YM-GA ItemSub-YM-GA-cust ItemSub-Table-YM-GA">
                    <span>
                        <div class="box-span"><?php _e('Event tracking. "Find" button', TPOPlUGIN_TEXTDOMAIN); ?></div>
                        <div class="svg-img-1">
                            <a href="#" class="tooltip-settings">
                            <span><?php _e('Set a goal in Yandex Metrica or Google Analytics and paste in this field the'
                                    .' code you need to track the event (reaching the goal). In example, "yaCounterXXXXXX.reachGoal(\'TARGET_NAME\');" or "ga(\'send\', \'event\', \'category\', \'action\');"', TPOPlUGIN_TEXTDOMAIN); ?></span>

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
                        <div class="box-span"><?php _e('Event tracking. Table is loaded', TPOPlUGIN_TEXTDOMAIN); ?></div>
                        <div class="svg-img-1">
                            <a href="#" class="tooltip-settings">
                            <span><?php _e('Google Analytics event that will be fired every time a table loads.', TPOPlUGIN_TEXTDOMAIN); ?></span>

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
                    <span><?php _e('Import settings', TPOPlUGIN_TEXTDOMAIN); ?></span>
                    <div class="TP-listNavsSetting">
                        <div class="TP-NavRow">
                            <div class="input_button_style">
                                <div class="input_font_style"><?php _e('Browse', TPOPlUGIN_TEXTDOMAIN); ?></div>
                                <input type="file" accept=".txt" name="select_file" id="importFile" size="1" class="input_input_style" multiple="">
                            </div>
                            <a class="TP-BtnTab disable importnBtn"><?php _e('Import', TPOPlUGIN_TEXTDOMAIN); ?></a>
                            <span class="infoFile"><?php _e('The file is not selected', TPOPlUGIN_TEXTDOMAIN); ?></span>
                        </div>
                        <div class="TP-NavRow">
                            <a class="TP-BtnTab exportBtn" id="exportSettings">
                                <?php _e('Export', TPOPlUGIN_TEXTDOMAIN); ?>
                            </a>


                        </div>
                    </div>
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
                <span><?php _e('Tables and Widgets Language', TPOPlUGIN_TEXTDOMAIN); ?></span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[local][localization]" class="TP-Zelect TPFieldLocalization">
                    <option <?php selected( \app\includes\TPPlugin::$options['local']['localization'], 1 ); ?> value="1">
                        <?php _e('Russian', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option <?php selected( \app\includes\TPPlugin::$options['local']['localization'], 2 ); ?>  value="2">
                        <?php _e('English', TPOPlUGIN_TEXTDOMAIN); ?>
                    </option>
                </select>
            </label>
            <label>
                <span><?php _e('Currency', TPOPlUGIN_TEXTDOMAIN); ?></span>
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

        </div>
         <div class="TP-LocalHead">
             <?php $this->TPFieldHost(); ?>
            <label>
            </label>
         </div>
        <div class="TP-LocalHead TPFieldTitleCaseDiv">
            <?php $this->TPFieldTitleCase(); ?>
        </div>
        <div class="TP-listColum">
            <span><?php _e('Fields (you can edit values on your own, e.g. for your own language)', TPOPlUGIN_TEXTDOMAIN); ?></span>
            <?php
            $local_table_fields = '<ul class="titleHeadTable">
                           <li class="TPLangFieldsLi">'.$this->local[\app\includes\TPPlugin::$options['local']['localization']].'</li>
                      </ul>';
            foreach(\app\includes\TPPlugin::$options['local']['fields'] as $key_local => $fields){
                $showFields = ($this->local[\app\includes\TPPlugin::$options['local']['localization']] != $key_local)?'TP-ListRowColumNot':'';
                $local_table_fields .= '<div class="'.$showFields.' TPFields_'.$key_local.'" >';
                $i = 0;
                // foreach( $fields['label'] as $key_label => $label ){
                /*$local_table_fields .= '<div class="TP-ListRowColum">
                                            <div class="infoRow" title="'.$fields['label_default'][$key_label].'"></div>
                                            <div>
                                                <label>
                                                    <input name="'.TPOPlUGIN_OPTION_NAME.'[local][fields]['.$key_local.'][label]['.$key_label.']" type="text" value="'.$label.'"/>
                                                    <input name="'.TPOPlUGIN_OPTION_NAME.'[local][fields]['.$key_local.'][label_default]['.$key_label.']" type="hidden" value="'.$fields['label_default'][$key_label].'"/>
                                                </label>
                                            </div>
                                        </div>';*/

                //}
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
            ?>


        </div>
    <?php
    }
    public function TPFieldHost(){
        $hosts = \app\includes\common\TPHostURL::getHost();
        $host_option = \app\includes\TPPlugin::$options['local']['host'];
        $default_host_option = \app\includes\TPPlugin::$options['local']['host'];
        $default_host_ru = 'aviasales.ru';
        $default_host_en = 'jetradar.com';
        switch(\app\includes\TPPlugin::$options['local']['localization']){
            case 1:
                if(empty($host_option)) $host_option = $default_host_ru;
                break;
            case 2:
                if(empty($host_option)) $host_option = $default_host_en;
                break;
        }
        ?>
        <label class="TPFieldHostLabel">
            <span>
                <?php echo _x('Host', 'page_settings tab local', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[local][host]"
                    class="TP-Zelect TPFieldHost"
                    data-host="<?php echo $default_host_option; ?>"
                    data-default_host_ru="<?php echo $default_host_ru; ?>"
                    data-default_host_en="<?php echo $default_host_en; ?>">
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
            <span><?php _e('Origin', TPOPlUGIN_TEXTDOMAIN ); ?></span>
            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[local][title_case][origin]" class="TP-Zelect">
                <!--<option <?php //selected( \app\includes\TPPlugin::$options['local']['title_case']['origin'], "name" ); ?> value="name">
                    <?php //_e('Default', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>-->
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['origin'], "ro" ); ?> value="ro">
                    <?php _e('Genitive', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['origin'], "da" ); ?> value="da">
                    <?php _e('Dative', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['origin'], "vi" ); ?> value="vi">
                    <?php _e('Accusative', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['origin'], "tv" ); ?> value="tv">
                    <?php _e('Ablative', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['origin'], "pr" ); ?> value="pr">
                    <?php _e('Prepositional', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
            </select>
        </label>
        <label>
            <span><?php _e('Destination', TPOPlUGIN_TEXTDOMAIN ); ?></span>
            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[local][title_case][destination]" class="TP-Zelect">
                <!--<option <?php //selected( \app\includes\TPPlugin::$options['local']['title_case']['destination'], "name" ); ?> value="name">
                    <?php //_e('Default', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>-->
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['destination'], "ro" ); ?> value="ro">
                    <?php _e('Genitive', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['destination'], "da" ); ?> value="da">
                    <?php _e('Dative', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['destination'], "vi" ); ?> value="vi">
                    <?php _e('Accusative', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['destination'], "tv" ); ?> value="tv">
                    <?php _e('Ablative', TPOPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options['local']['title_case']['destination'], "pr" ); ?> value="pr">
                    <?php _e('Prepositional', TPOPlUGIN_TEXTDOMAIN ); ?>
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
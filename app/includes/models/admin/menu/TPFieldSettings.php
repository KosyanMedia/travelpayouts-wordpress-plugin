<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 11:04
 */

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
                    <span><?php _e('Marker', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                    <label>
                        <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[account][marker]"
                               value="<?php echo esc_attr(TPPlugin::$options['account']['marker']) ?>"/>
                    </label>
                </div>
                <div class="ItemSub">
                    <span><?php _e('Extra marker', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                    <label>
                        <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[account][extra_marker]"
                               value="<?php echo esc_attr(TPPlugin::$options['account']['extra_marker']) ?>"/>
                    </label>
                </div>
            </div>
        </div>
        <div class="TP-colForm">
            <div class="TP-FormItem">
                <div class="ItemSub">
                    <span><?php _e('Token', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                    <label>
                        <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[account][token]"
                               value="<?php echo esc_attr(TPPlugin::$options['account']['token']) ?>"/>
                    </label>
                </div>
                <div class="ItemSub">
                    <span><?php _e('White Lable', KPDPlUGIN_TEXTDOMAIN ); ?></span>
                    <label>
                        <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[account][white_label]"
                               value="<?php echo esc_attr(TPPlugin::$options['account']['white_label']) ?>"/>
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
                    <span><?php _e('Something went worng, please reload page', KPDPlUGIN_TEXTDOMAIN); ?></span>
                    <label>
                        <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][message_error]"
                               value="<?php echo esc_attr(TPPlugin::$options['config']['message_error']) ?>"/>
                    </label>
                </div>
                <div class="ItemSub">
                    <span><?php _e('After clicking on the link', KPDPlUGIN_TEXTDOMAIN); ?></span>
                    <ul class="TP-listSet">
                        <li>
                            <input id="rchek1" type="radio" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][after_url]"
                                <?php checked(TPPlugin::$options['config']['after_url'], 0) ?> hidden value="0" />
                            <label for="rchek1"><?php _e('Show completed forms', KPDPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input id="rchek2" type="radio" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][after_url]"
                                <?php checked(TPPlugin::$options['config']['after_url'], 1) ?> hidden value="1" />
                            <label for="rchek2"><?php _e('Show search results', KPDPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                    </ul>
                </div>
                <div class="ItemSub">
                    <span><?php _e('Unit distances', KPDPlUGIN_TEXTDOMAIN); ?></span>
                    <select name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][distance]" class="TP-Zelect">
                        <option <?php selected( TPPlugin::$options['config']['distance'], 1 ); ?> value="1">
                            <?php _e('km', KPDPlUGIN_TEXTDOMAIN); ?>
                        </option>
                        <option <?php selected( TPPlugin::$options['config']['distance'], 2 ); ?>  value="2">
                            <?php _e('m', KPDPlUGIN_TEXTDOMAIN); ?>
                        </option>
                    </select>
                </div>
                <div class="TP-ListSub ListSub--cust list--db">
                    <span class="TP-titleSub--custom"><?php _e('Size logo Airlines', KPDPlUGIN_TEXTDOMAIN); ?> (px)</span>
                    <div class="ItemSub">
                        <label>
                            <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][airline_logo_size][width]"
                                   type="text"
                                   value="<?php echo esc_attr(TPPlugin::$options['config']['airline_logo_size']['width']) ?>">
                        </label>
                    </div>
                    <span class="TP-titleSub TP-titleSub--sdf">X</span>
                    <div class="ItemSub">
                        <label>
                            <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][airline_logo_size][height]"
                                   type="text"
                                   value="<?php echo esc_attr(TPPlugin::$options['config']['airline_logo_size']['height']) ?>">
                        </label>
                    </div>
                </div>
            </div>
            <div class="TP-FormItem">
                <div class="ItemSub">
                    <ul class="TP-listSet">
                        <li>
                            <input id="chek1" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][redirect]"
                                   value="1" <?php checked(isset(TPPlugin::$options['config']['redirect']), 1) ?> hidden />
                            <label for="chek1"><?php _e('Redirect', KPDPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input id="chek2" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][target_url]"
                                   value="1" <?php checked(isset(TPPlugin::$options['config']['target_url']), 1) ?> hidden />
                            <label for="chek2"><?php _e('A link in a new window', KPDPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input id="chek3" type="checkbox" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][nofollow]"
                                   value="1" <?php checked(isset(TPPlugin::$options['config']['nofollow']), 1) ?> hidden />
                            <label for="chek3"><?php _e('Attribute for links nofollow', KPDPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="TP-colForm">
            <div class="TP-FormItem mb--cus">
                <div class="ItemSub">
                    <span><?php _e('Cache through', KPDPlUGIN_TEXTDOMAIN);?></span>
                    <div class="TP-childF">
                        <div class="spinnerW clearfix" data-trigger="spinner">
                            <label>
                                <input name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][cache_value]"
                                       type="text" value="<?php echo TPPlugin::$options['config']['cache_value']; ?>"
                                       data-rule="quantity">
                            </label>
                            <div class="navSpinner">
                                <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                                <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                            </div>
                        </div>
                        <ul class="TP-listSet TP-listSet--row">
                            <li>
                                <input  id="rchek3" type="radio" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][cache]"
                                    <?php checked(TPPlugin::$options['config']['cache'], 0) ?> value="0" hidden/>
                                <label for="rchek3"><?php _e('Day', KPDPlUGIN_TEXTDOMAIN); ?></label>
                            </li>
                            <li>
                                <input id="rchek4" type="radio" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][cache]"
                                    <?php checked(TPPlugin::$options['config']['cache'], 1) ?> value="1" hidden/>
                                <label for="rchek4"><?php _e('Hour', KPDPlUGIN_TEXTDOMAIN); ?></label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ItemSub">
                    <span><?php _e('Scripts', KPDPlUGIN_TEXTDOMAIN);?></span>
                    <ul class="TP-listSet">
                        <li>
                            <input id="rchek5" type="radio" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][script]"
                                <?php checked(TPPlugin::$options['config']['script'], 0) ?> value="0" hidden />
                            <label for="rchek5"><?php _e('Header', KPDPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input id="rchek6" type="radio" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][script]"
                                <?php checked(TPPlugin::$options['config']['script'], 1) ?> value="1" hidden />
                            <label for="rchek6"><?php _e('Footer', KPDPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                    </ul>
                </div>
                <div class="ItemSub">
                    <span>
                        <?php _e('Format date', KPDPlUGIN_TEXTDOMAIN); ?>
                        <?php
                        //$TPReturnOutput = new TPReturnOutput();
                        //echo $TPReturnOutput->tpDate();
                        ?>
                    </span>
                    <label>
                        <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[config][format_date]"
                               value="<?php echo esc_attr(TPPlugin::$options['config']['format_date']) ?>"
                               class=""/>
                    </label>

                </div>
                <div class="ItemSub">

                </div>
            </div>
            <div class="TP-FormItem">
                <div class="ItemSub">
                    <span><?php _e('Import settings', KPDPlUGIN_TEXTDOMAIN); ?></span>
                    <div class="TP-listNavsSetting">
                        <div class="TP-NavRow">
                            <div class="input_button_style">
                                <div class="input_font_style"><?php _e('Browse', KPDPlUGIN_TEXTDOMAIN); ?></div>
                                <input type="file" accept=".txt" name="select_file" id="importFile" size="1" class="input_input_style" multiple="">
                            </div>
                            <a class="TP-BtnTab disable importnBtn"><?php _e('Import', KPDPlUGIN_TEXTDOMAIN); ?></a>
                            <span class="infoFile"><?php _e('The file is not selected', KPDPlUGIN_TEXTDOMAIN); ?></span>
                        </div>
                        <div class="TP-NavRow">
                            <a class="TP-BtnTab exportBtn" id="exportSettings"><?php _e('Export', KPDPlUGIN_TEXTDOMAIN); ?></a>
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
                <span><?php _e('Language tables', KPDPlUGIN_TEXTDOMAIN); ?></span>
                <select name="<?php echo KPDPlUGIN_OPTION_NAME;?>[local][localization]" class="TP-Zelect TPFieldLocalization">
                    <option <?php selected( TPPlugin::$options['local']['localization'], 1 ); ?> value="1">
                        <?php _e('Russian', KPDPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option <?php selected( TPPlugin::$options['local']['localization'], 2 ); ?>  value="2">
                        <?php _e('English', KPDPlUGIN_TEXTDOMAIN); ?>
                    </option>
                </select>
            </label>
            <label>
                <span><?php _e('Currency', KPDPlUGIN_TEXTDOMAIN); ?></span>
                <select name="<?php echo KPDPlUGIN_OPTION_NAME;?>[local][currency]" class="TP-Zelect">
                    <option <?php selected( TPPlugin::$options['local']['currency'], 1 ); ?> value="1">
                        <?php _e('Ruble', KPDPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option <?php selected( TPPlugin::$options['local']['currency'], 2 ); ?>  value="2">
                        <?php _e('US dollar', KPDPlUGIN_TEXTDOMAIN); ?>
                    </option>
                    <option <?php selected( TPPlugin::$options['local']['currency'], 3 ); ?>  value="3">
                        <?php _e('Euro', KPDPlUGIN_TEXTDOMAIN); ?>
                    </option>
                </select>
            </label>

        </div>
        <div class="TP-LocalHead TPFieldTitleCaseDiv">
            <?php $this->TPFieldTitleCase(); ?>
        </div>
        <div class="TP-listColum">
            <span><?php _e('Names cells', KPDPlUGIN_TEXTDOMAIN); ?></span>
            <?php
            $local_table_fields = '<ul class="titleHeadTable">
                           <li class="TPLangFieldsLi">'.$this->local[TPPlugin::$options['local']['localization']].'</li>
                      </ul>';
            foreach(TPPlugin::$options['local']['fields'] as $key_local => $fields){
                $showFields = ($this->local[TPPlugin::$options['local']['localization']] != $key_local)?'TP-ListRowColumNot':'';
                $local_table_fields .= '<div class="'.$showFields.' TPFields_'.$key_local.'" >';
                $i = 0;
                // foreach( $fields['label'] as $key_label => $label ){
                /*$local_table_fields .= '<div class="TP-ListRowColum">
                                            <div class="infoRow" title="'.$fields['label_default'][$key_label].'"></div>
                                            <div>
                                                <label>
                                                    <input name="'.KPDPlUGIN_OPTION_NAME.'[local][fields]['.$key_local.'][label]['.$key_label.']" type="text" value="'.$label.'"/>
                                                    <input name="'.KPDPlUGIN_OPTION_NAME.'[local][fields]['.$key_local.'][label_default]['.$key_label.']" type="hidden" value="'.$fields['label_default'][$key_label].'"/>
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
                                                            <input name="'.KPDPlUGIN_OPTION_NAME.'[local][fields]['.$key_local.'][label]['.$key_label.']" type="text" value="'.$label.'"/>
                                                            <input name="'.KPDPlUGIN_OPTION_NAME.'[local][fields]['.$key_local.'][label_default]['.$key_label.']" type="hidden" value="'.$fields['label_default'][$key_label].'"/>
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

    /**
     *
     */
    public function TPFieldTitleCase(){
        ?>
        <label>
            <span><?php _e('Origin', KPDPlUGIN_TEXTDOMAIN ); ?></span>
            <select name="<?php echo KPDPlUGIN_OPTION_NAME;?>[local][title_case][origin]" class="TP-Zelect">
                <!--<option <?php //selected( TPPlugin::$options['local']['title_case']['origin'], "name" ); ?> value="name">
                    <?php //_e('Default', KPDPlUGIN_TEXTDOMAIN ); ?>
                </option>-->
                <option <?php selected( TPPlugin::$options['local']['title_case']['origin'], "ro" ); ?> value="ro">
                    <?php _e('Genitive', KPDPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( TPPlugin::$options['local']['title_case']['origin'], "da" ); ?> value="da">
                    <?php _e('Dative', KPDPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( TPPlugin::$options['local']['title_case']['origin'], "vi" ); ?> value="vi">
                    <?php _e('Accusative', KPDPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( TPPlugin::$options['local']['title_case']['origin'], "tv" ); ?> value="tv">
                    <?php _e('Ablative', KPDPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( TPPlugin::$options['local']['title_case']['origin'], "pr" ); ?> value="pr">
                    <?php _e('Prepositional', KPDPlUGIN_TEXTDOMAIN ); ?>
                </option>
            </select>
        </label>
        <label>
            <span><?php _e('Destination', KPDPlUGIN_TEXTDOMAIN ); ?></span>
            <select name="<?php echo KPDPlUGIN_OPTION_NAME;?>[local][title_case][destination]" class="TP-Zelect">
                <!--<option <?php //selected( TPPlugin::$options['local']['title_case']['destination'], "name" ); ?> value="name">
                    <?php //_e('Default', KPDPlUGIN_TEXTDOMAIN ); ?>
                </option>-->
                <option <?php selected( TPPlugin::$options['local']['title_case']['destination'], "ro" ); ?> value="ro">
                    <?php _e('Genitive', KPDPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( TPPlugin::$options['local']['title_case']['destination'], "da" ); ?> value="da">
                    <?php _e('Dative', KPDPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( TPPlugin::$options['local']['title_case']['destination'], "vi" ); ?> value="vi">
                    <?php _e('Accusative', KPDPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( TPPlugin::$options['local']['title_case']['destination'], "tv" ); ?> value="tv">
                    <?php _e('Ablative', KPDPlUGIN_TEXTDOMAIN ); ?>
                </option>
                <option <?php selected( TPPlugin::$options['local']['title_case']['destination'], "pr" ); ?> value="pr">
                    <?php _e('Prepositional', KPDPlUGIN_TEXTDOMAIN ); ?>
                </option>
            </select>
        </label>
    <?php
    }
}
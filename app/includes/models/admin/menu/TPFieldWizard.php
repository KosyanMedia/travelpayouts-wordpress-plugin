<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 20.08.15
 * Time: 0:27
 */
namespace app\includes\models\admin\menu;
class TPFieldWizard {
    public function __construct(){

    }
    public function TPFieldWizard(){
        ?>
        <div class="TP-RowForm">
            <div class="TP-colForm">
                <div class="TP-FormItem">
                    <div class="ItemSub">
                        <span><?php _ex('tp_admin_page_wizard_field_token_label', '(Your API token)', TPOPlUGIN_TEXTDOMAIN); ?>:*</span>
                        <label>
                            <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[account][token]"
                                   value="<?php echo esc_attr(\app\includes\TPPlugin::$options['account']['token']) ?>"/>
                        </label>
                    </div>
                </div>
            </div>
            <div class="TP-colForm">
                <div class="TP-FormItem">
                    <div class="ItemSub">
                        <span><?php _ex('tp_admin_page_wizard_field_marker_label','(Your partner marker)', TPOPlUGIN_TEXTDOMAIN); ?>:*</span>
                        <label>
                            <input type="text" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[account][marker]"
                                   value="<?php echo esc_attr(\app\includes\TPPlugin::$options['account']['marker']) ?>"/>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <p class="TP-deteiledIncome">
            <?php _ex('tp_admin_page_wizard_field_localization_currency_label',
                '(Select Tools Language and Currency)', TPOPlUGIN_TEXTDOMAIN); ?>:
        </p>
        <div class="TP-RowForm">
            <div class="TP-colForm">
                <div class="TP-FormItem">
                    <div class="ItemSub">
                        <span>
                            <?php _ex('tp_admin_page_wizard_field_localization_label',
                                '(Widget and Tables Language)', TPOPlUGIN_TEXTDOMAIN); ?>:
                        </span>
                        <label>
                            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[local][localization]" class="TP-Zelect TPFieldLocalization">
                                <option <?php selected( \app\includes\TPPlugin::$options['local']['localization'], 1 ); ?> value="1">
                                    <?php _ex('tp_admin_page_wizard_field_localization_value_1_label',
                                        '(Russian)', TPOPlUGIN_TEXTDOMAIN); ?>
                                </option>
                                <option <?php selected( \app\includes\TPPlugin::$options['local']['localization'], 2 ); ?>  value="2">
                                    <?php _ex('tp_admin_page_wizard_field_localization_value_2_label',
                                        '(English)', TPOPlUGIN_TEXTDOMAIN); ?>
                                </option>
                                <option <?php selected( \app\includes\TPPlugin::$options['local']['localization'], 3 ); ?>  value="3">
                                    <?php _ex('tp_admin_page_wizard_field_localization_value_3_label',
                                        '(Thai)', TPOPlUGIN_TEXTDOMAIN); ?>
                                </option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>
            <div class="TP-colForm">
                <div class="TP-FormItem">
                    <div class="ItemSub">
                        <span><?php _ex('tp_admin_page_wizard_field_currency_label',
                                '(Currency)', TPOPlUGIN_TEXTDOMAIN); ?>:</span>
                        <label>
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
                </div>
            </div>
        </div>
        <input type="hidden" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[wizard]" value="1">
        <?php
    }
}
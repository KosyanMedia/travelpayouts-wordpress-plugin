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
                        <span><?php _e('Your API token', KPDPlUGIN_TEXTDOMAIN); ?>:*</span>
                        <label>
                            <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[account][token]"
                                   value="<?php echo esc_attr(\app\includes\TPPlugin::$options['account']['token']) ?>"/>
                        </label>
                    </div>
                </div>
            </div>
            <div class="TP-colForm">
                <div class="TP-FormItem">
                    <div class="ItemSub">
                        <span><?php _e('Your partner marker', KPDPlUGIN_TEXTDOMAIN); ?>:*</span>
                        <label>
                            <input type="text" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[account][marker]"
                                   value="<?php echo esc_attr(\app\includes\TPPlugin::$options['account']['marker']) ?>"/>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <p class="TP-deteiledIncome">
            <?php _e('Select Tools Language and Currency', KPDPlUGIN_TEXTDOMAIN); ?>:
        </p>
        <div class="TP-RowForm">
            <div class="TP-colForm">
                <div class="TP-FormItem">
                    <div class="ItemSub">
                        <span><?php _e('Widget and Tables Language', KPDPlUGIN_TEXTDOMAIN); ?>:</span>
                        <label>
                            <select name="<?php echo KPDPlUGIN_OPTION_NAME;?>[local][localization]" class="TP-Zelect TPFieldLocalization">
                                <option <?php selected( \app\includes\TPPlugin::$options['local']['localization'], 1 ); ?> value="1">
                                    <?php _e('Russian', KPDPlUGIN_TEXTDOMAIN); ?>
                                </option>
                                <option <?php selected( \app\includes\TPPlugin::$options['local']['localization'], 2 ); ?>  value="2">
                                    <?php _e('English', KPDPlUGIN_TEXTDOMAIN); ?>
                                </option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>
            <div class="TP-colForm">
                <div class="TP-FormItem">
                    <div class="ItemSub">
                        <span><?php _e('Currency', KPDPlUGIN_TEXTDOMAIN); ?>:</span>
                        <label>
                            <select name="<?php echo KPDPlUGIN_OPTION_NAME;?>[local][currency]" class="TP-Zelect">
                                <option <?php selected( \app\includes\TPPlugin::$options['local']['currency'], 1 ); ?> value="1">
                                    <?php _e('Ruble', KPDPlUGIN_TEXTDOMAIN); ?>
                                </option>
                                <option <?php selected( \app\includes\TPPlugin::$options['local']['currency'], 2 ); ?>  value="2">
                                    <?php _e('US dollar', KPDPlUGIN_TEXTDOMAIN); ?>
                                </option>
                                <option <?php selected( \app\includes\TPPlugin::$options['local']['currency'], 3 ); ?>  value="3">
                                    <?php _e('Euro', KPDPlUGIN_TEXTDOMAIN); ?>
                                </option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="<?php echo KPDPlUGIN_OPTION_NAME;?>[wizard]" value="1">
        <?php
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 28.01.16
 * Time: 16:36
 */

namespace app\includes\models\admin\menu;


class TPFieldAutoReplLink
{
    public function __construct(){

    }
    public function TPFieldARL(){
        ?>
        <div class="TP-colFormCust TP-colFormCustARL">
            <div class="TP-FormItem">
                <div class="ItemSub">
                    <ul class="TP-listSet">
                        <li>
                            <input id="chekarl2" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[auto_repl_link][active]"
                                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['auto_repl_link']['active']), 1) ?> hidden />
                            <label for="chekarl2"><?php _e('Activate inactive links', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input id="chekarl3" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[auto_repl_link][all_link]"
                                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['auto_repl_link']['all_link']), 1) ?> hidden />
                            <label for="chekarl3"><?php _e('Make all the referral links to sites Travelpayouts', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input id="chekarl4" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[auto_repl_link][not_title]"
                                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['auto_repl_link']['not_title']), 1) ?> hidden />
                            <label for="chekarl4"><?php _e('Do not add links to all titles', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                    </ul>
                </div>
                <div class="ItemSub">
                    <span><?php _e('Limit replacements', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <div class="spinnerW TP-SpinnerWSize clearfix" data-trigger="spinner">
                        <label>
                            <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[auto_repl_link][limit]" type="text"
                                   value="<?php echo \app\includes\TPPlugin::$options['auto_repl_link']['limit']; ?>">
                        </label>
                        <div class="navSpinner">
                            <a class="navDown" href="javascript:void(0);" data-spin="down" rollapp-href="javascript:void(0);"></a>
                            <a class="navUp" href="javascript:void(0);" data-spin="up" rollapp-href="javascript:void(0);"></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?php
    }
}
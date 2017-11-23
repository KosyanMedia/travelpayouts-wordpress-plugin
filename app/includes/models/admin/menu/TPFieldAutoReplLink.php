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
        <!--<div class="TP-colFormCust TP-colFormCustARL">
            <div class="TP-FormItem">
                <div class="ItemSub">
                    <ul class="TP-listSet">
                        <li>
                            <input id="chekarl2" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[auto_repl_link][active]"
                                   value="1" <?php //checked(isset(\app\includes\TPPlugin::$options['auto_repl_link']['active']), 1) ?> hidden />
                            <label for="chekarl2"><?php //_e('Activate inactive links', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input id="chekarl3" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[auto_repl_link][all_link]"
                                   value="1" <?php //checked(isset(\app\includes\TPPlugin::$options['auto_repl_link']['all_link']), 1) ?> hidden />
                            <label for="chekarl3"><?php //_e('Make all the referral links to sites Travelpayouts', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input id="chekarl4" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[auto_repl_link][not_title]"
                                   value="1" <?php //checked(isset(\app\includes\TPPlugin::$options['auto_repl_link']['not_title']), 1) ?> hidden />
                            <label for="chekarl4"><?php //_e('Do not add links to all titles', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
        <div class="TP-colFormCust">
            <div class="TP-FormItem">
                <div class="ItemSub">
                    <span><?php //_e('Limit replacements', TPOPlUGIN_TEXTDOMAIN ); ?></span>
                    <div class="spinnerW TP-SpinnerWSize clearfix" data-trigger="spinner">
                        <label>
                            <input name="<?php //echo TPOPlUGIN_OPTION_NAME;?>[auto_repl_link][limit]" type="text"
                                   value="<?php //echo \app\includes\TPPlugin::$options['auto_repl_link']['limit']; ?>">
                        </label>
                        <div class="navSpinner">
                            <a class="navDown" href="javascript:void(0);" data-spin="down" rollapp-href="javascript:void(0);"></a>
                            <a class="navUp" href="javascript:void(0);" data-spin="up" rollapp-href="javascript:void(0);"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="TP-colFormCust">
            <div class="TP-FormItem">
                <div class="ItemSub">
                    <ul class="TP-listSet">
                       <!-- <li>
                            <input id="chekarl2" type="checkbox" name="<?php //echo TPOPlUGIN_OPTION_NAME;?>[auto_repl_link][active]"
                                   value="1" <?php //checked(isset(\app\includes\TPPlugin::$options['auto_repl_link']['active']), 1) ?> hidden />
                            <label for="chekarl2"><?php //_e('Activate inactive links', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input id="chekarl3" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[auto_repl_link][all_link]"
                                   value="1" <?php //checked(isset(\app\includes\TPPlugin::$options['auto_repl_link']['all_link']), 1) ?> hidden />
                            <label for="chekarl3"><?php //_e('Make all the referral links to sites Travelpayouts', TPOPlUGIN_TEXTDOMAIN); ?></label>
                        </li>-->
                        <li>
                            <input id="chekarl4" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[auto_repl_link][not_title]"
                                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['auto_repl_link']['not_title']), 1) ?> hidden />
                            <label for="chekarl4">
                                <?php _ex('Don\'t add links to all titles',
                                    'tp_admin_page_auto_links_input_not_title_label', TPOPlUGIN_TEXTDOMAIN); ?>
                                <a href="#" class="tooltip-settings TPARLHelp">
                                    <span>
                                        <?php _ex('No change in case anchor is inside &lt;h&gt; tags',
                                            'tp_admin_page_auto_links_input_not_title_label_help', TPOPlUGIN_TEXTDOMAIN); ?>
                                    </span>
                                    <div class="svg-img-3 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                                <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                                <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                                    </div>
                                </a>
                            </label>
                        </li>
                        <li>
                            <input id="chekarl5" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[auto_repl_link][tp_auto_replac_link]"
                                   value="1" <?php checked(isset(\app\includes\TPPlugin::$options['auto_repl_link']['tp_auto_replac_link']), 1) ?> hidden />
                            <label for="chekarl5">
                                <?php _ex('Enable auto-links for new posts',
                                    'tp_admin_page_auto_links_input_tp_auto_replac_link_label', TPOPlUGIN_TEXTDOMAIN); ?>
                                <a href="#" class="tooltip-settings TPARLHelp">
                                    <span>
                                        <?php _ex('After you press "Publish" all you anchors will be auto-replaced by links',
                                            'tp_admin_page_auto_links_input_tp_auto_replac_link_label_help', TPOPlUGIN_TEXTDOMAIN); ?>
                                    </span>
                                    <div class="svg-img-3 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                                <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                                <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                                    </div>
                                </a>
                            </label>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="TP-colFormCust">
            <div class="TP-FormItem">
                <div class="ItemSub">
                    <span>
                        <?php _ex('Anchor replacements limit',
                            'tp_admin_page_auto_links_input_limit_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        <a href="#" class="tooltip-settings TPARLHelp">
                            <span>
                                <?php _ex('The maximum number of anchor changes in one post',
                                    'tp_admin_page_auto_links_input_limit_label_help', TPOPlUGIN_TEXTDOMAIN); ?>
                            <div class="svg-img-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                            </div>
                        </a>
                    </span>
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
<div class="TPWrapper TPWrapper-long">

    <p class="TPMainTitle  TPMainTitleSF">
        <?php _e('Substitution links', TPOPlUGIN_TEXTDOMAIN); ?>
    </p>
    <div class="TP-TopImportantInfo TP-shortDescription">
        <p>
            <?php _e('Here you can add referral links that you want to substitute to the specified anchor phrase', TPOPlUGIN_TEXTDOMAIN); ?>
        </p>
    </div>
    <div class="TPmainContent TP-BalanceContent TP-SettingContent">
        <p class="TP-SettingTitle">
            <?php _e('Adding links', TPOPlUGIN_TEXTDOMAIN); ?>
        </p>

        <form method="post" action="admin.php?page=tp_control_substitution_links&action=update_link"
              name="linkAdd">
            <div class="TP-LocalHead TP-shortLocal">
                <label>
                    <span><?php _e('Link ', TPOPlUGIN_TEXTDOMAIN) ?></span>
                    <input type="text" name="arl_url" value="<?php echo $this->data['arl_url'] ?>" required/>
                </label>
                <label></label>
            </div>
            <div  class="TP-LocalHead ">
                <label class="TP-inputTextShortCust">
                        <span>
                            <?php _e('Anchor phrase', TPOPlUGIN_TEXTDOMAIN) ?>
                            <a href="#" class="tooltip-settings">
                                <span><?php _e('', TPOPlUGIN_TEXTDOMAIN); ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                                <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                                <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                            </a>
                        </span>
                    <textarea name="arl_anchor" required><?php echo $this->data['arl_anchor'] ?></textarea>
                </label>
                <label>
                    <input id="chekarla1" type="checkbox" name="arl_nofollow"
                           value="1" hidden <?php checked( $this->data['arl_nofollow'], 1 ); ?>/>
                    <label for="chekarla1"><?php echo _x('Adding attribute nofollow', 'settings', TPOPlUGIN_TEXTDOMAIN); ?></label>
                    <input id="chekarla2" type="checkbox" name="arl_replace"
                           value="1" hidden <?php checked( $this->data['arl_replace'], 1 ); ?>/>
                    <label for="chekarla2"><?php echo _x('Replace the existing links', 'settings', TPOPlUGIN_TEXTDOMAIN); ?></label>
                </label>
                <input type="hidden" name="link_id" value="<?php echo $this->data['id'] ?>">
            </div>
            <div class="TP-navsUserShort">
                <a href="admin.php?page=tp_control_substitution_links" class="TP-deleteShortLincks TP-deleteShortLincks--cust">
                    <i></i><?php _e('cancel', TPOPlUGIN_TEXTDOMAIN) ?>
                </a>
                <button class="TP-BtnTab">
                    <?php _e('save changes', TPOPlUGIN_TEXTDOMAIN) ?>
                </button>
            </div>
        </form>
    </div>
</div>
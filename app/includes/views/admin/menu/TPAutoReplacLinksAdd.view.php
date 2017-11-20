<div class="TPWrapper TPWrapper-long">

    <p class="TPMainTitle  TPMainTitleSF">
        <?php _ex('Auto-links',
            'tp admin page auto links add paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
    </p>
    <div class="TP-TopImportantInfo TP-shortDescription">
        <p>
            <?php _ex('Here you can add referral links that you want to be defined to the specified anchor phrase.  Anchors are case-sensitive.',
                'tp admin page auto links add paragraph_2', TPOPlUGIN_TEXTDOMAIN); ?>
        </p>
    </div>
    <div class="TPmainContent TP-BalanceContent TP-SettingContent">
        <p class="TP-SettingTitle">
            <?php _ex('Adding links',
                'tp admin page auto links add paragraph_3', TPOPlUGIN_TEXTDOMAIN); ?>
        </p>

        <form method="post" action="admin.php?page=tp_control_substitution_links&action=save_link"
             name="linkAdd">
            <div class="TP-LocalHead TP-shortLocal TP-LocalHeadARL">
                <label  id="TPArlUrl">
                    <span>
                        <?php _ex('Link',
                            'tp admin page auto links add input arl url label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </span>
                    <input type="text" name="arl_url" required/>
                </label>
            </div>
            <div  class="TP-LocalHead TP-LocalHeadARL">
                <label class="TP-inputTextShortCust">
                        <span>
                            <?php _ex('Anchor phrase',
                                'tp admin page auto links add textarea arl anchor label', TPOPlUGIN_TEXTDOMAIN); ?>
                            <a href="#" class="tooltip-settings TPARLHelp">
                                <span>
                                    <?php _ex('You may add several anchors, use comma as separator',
                                        'tp admin page auto links add textarea arl anchor label help', TPOPlUGIN_TEXTDOMAIN); ?>
                                </span>
                                <div class="svg-img-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                            <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                            <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                                </div>
                            </a>
                        </span>
                    <textarea name="arl_anchor" required></textarea>
                </label>
                <label class="TP-LabelEvent">
                   <span>
                       <?php _ex('Events onclick',
                           'tp admin page auto links add textarea arl event label', TPOPlUGIN_TEXTDOMAIN); ?>
                       <a href="#" class="tooltip-settings TPARLHelp">
                           <span>
                               <?php _ex('You can add here custom events (e.g. Google Analytics events) that will be fired after the click on a link',
                                   'tp admin page auto links add textarea arl event label help', TPOPlUGIN_TEXTDOMAIN); ?>
                           </span>
                           <div class="svg-img-3">
                               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                       <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                       <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                           </div>
                       </a>
                   </span>
                   <textarea  name="arl_event"></textarea>
                </label>

            </div>
            <div  class="TP-LocalHead TP-LocalHeadARL">
                <label class="TP-inputTextShortCustCheck">
                    <input id="chekarla1" type="checkbox" name="arl_nofollow"
                           value="1" hidden checked="checked"/>
                    <label for="chekarla1">
                        <?php _ex('Add "nofollow" attribute',
                            'tp admin page auto links add input arl nofollow label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </label>
                    <input id="chekarla2" type="checkbox" name="arl_replace"
                           value="1" hidden />
                    <label for="chekarla2">
                        <?php _ex('Replace existing links',
                            'tp admin page auto links add input arl replace label', TPOPlUGIN_TEXTDOMAIN); ?>
                        <a href="#" class="tooltip-settings TPARLHelp">
                            <span>
                                <?php _ex('In case you already have such active links — they\'ll be replaced to the new one',
                                    'tp admin page auto links add input arl replace label help', TPOPlUGIN_TEXTDOMAIN); ?>
                            </span>
                            <div class="svg-img-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 15 15"><g fill="#00B0DD">
                                        <path d="M7.3 11.6c-.3 0-.5.2-.5.5v.4c0 .3.2.5.5.5s.5-.2.5-.5v-.4c.1-.2-.2-.5-.5-.5z"/>
                                        <path d="M7.5 16c4.1 0 7.5-3.4 7.5-7.5S11.6 1 7.5 1 0 4.4 0 8.5 3.4 16 7.5 16zm0-13.9c3.5 0 6.4 2.9 6.4 6.4s-2.9 6.4-6.4 6.4S1.1 12 1.1 8.5 4 2.1 7.5 2.1z"/><path d="M5.2 7.2c.3 0 .5-.2.5-.5 0 0 0-.4.2-.9.3-.6.8-.8 1.5-.8.6 0 1.1.2 1.4.5.2.3.3.7.2 1.1-.1.5-.6 1-1 1.4-.6.6-1.2 1.2-1.2 1.9 0 .3.2.5.5.5s.5-.2.5-.5.4-.7.8-1.1c.6-.5 1.2-1.1 1.4-1.9.2-.7.1-1.5-.4-2-.3-.4-1-1-2.3-1-1.3 0-2 .8-2.3 1.4s-.4 1.3-.4 1.3c0 .3.3.6.6.6z"/></g></svg>
                            </div>
                        </a>
                    </label>
                    <input id="chekarla3" type="checkbox" name="arl_target_blank"
                           value="1" hidden checked="checked"/>
                    <label for="chekarla3">
                        <?php _ex('Open in a new tab',
                            'tp admin page auto links add input arl target blank label', TPOPlUGIN_TEXTDOMAIN); ?>
                    </label>
                </label>
            </div>
            <div class="TP-navsUserShort">
                <a href="admin.php?page=tp_control_substitution_links" class="TP-deleteShortLincks TP-deleteShortLincks--cust">
                    <i></i>
                    <?php _ex('cancel',
                        'tp admin page auto links add btn cancel label', TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
                <button class="TP-BtnTab">
                    <?php _ex('save changes',
                        'tp admin page auto links add btn save changes label', TPOPlUGIN_TEXTDOMAIN); ?>
                </button>
            </div>
        </form>
    </div>
</div>
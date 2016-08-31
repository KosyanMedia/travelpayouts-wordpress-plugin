<div class="TPWrapper TPWrapper-long">

    <p class="TPMainTitle TPMainTitleSF">
        <?php _ex('tp_admin_page_auto_links_paragraph_1',
            '(Auto-links )', TPOPlUGIN_TEXTDOMAIN); ?>
    </p>

    <div class="TP-TopImportantInfo TP-shortDescription">
        <p>
            <?php _ex('tp_admin_page_auto_links_paragraph_2',
                '(Here you can setup auto-links. Define anchor and your referral link for that anchor.)', TPOPlUGIN_TEXTDOMAIN); ?>
        </p>
    </div>

    <div class="TPmainContent TP-BalanceContent TP-SettingContent TPAutoLink">
        <p class="TP-SettingTitle">
            <?php _ex('tp_admin_page_auto_links_paragraph_3',
                '(List of links)', TPOPlUGIN_TEXTDOMAIN); ?>
        </p>

        <div class="TP-navsShort">
            <div class="TP-lincksNavShortCust">
                <a href="admin.php?page=tp_control_substitution_links&action=add_link" class="TP-addShortLincks">
                    <i></i>
                    <?php _ex('tp_admin_page_auto_links_btn_add_link',
                        '(Add link)', TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
                <div class="input_button_style TP-ImportLink">
                    <div class="input_font_style">
                        <?php _ex('tp_admin_page_auto_links_btn_import_links',
                            '(Import links)', TPOPlUGIN_TEXTDOMAIN); ?>
                    </div>
                    <input type="file" accept=".csv" name="select_file"
                           id="importFileCSV" size="1" class="input_input_style"
                           multiple="">
                </div>
                <a href="#" class="TPExportLink TPBtn">
                    <i></i>
                    <?php _ex('tp_admin_page_auto_links_btn_export_links',
                        '(Export links)', TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
                <a href="#"
                   class="TP-deleteShortLincks deleteChecked"
                   data-type="arl_link">
                    <i></i>
                    <?php _ex('tp_admin_page_auto_links_btn_remove',
                        '(Remove)', TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
            </div>
            <a class="TP-AllLincksShort"></a>
        </div>

        <table class="TP-listShort TPTableAutoReplaceLink" id="TPAnchorTable">
            <thead>
            <tr>
                <td class="tp-notsort-column">
                    <input class="checkedAll" id="chekTableS-all" type="checkbox" name="checkedId" hidden="">
                    <label for="chekTableS-all"></label>
                </td>
                <td class="TPTableHead">
                    <?php _ex('tp_admin_page_auto_links_table_td_1_label',
                        '(Anchor)', TPOPlUGIN_TEXTDOMAIN); ?>
                </td>
                <td class="TPTableHead">
                    <?php _ex('tp_admin_page_auto_links_table_td_2_label',
                        '(Link)', TPOPlUGIN_TEXTDOMAIN); ?>
                </td>
            </tr>
            </thead>
            <tbody>
            <?php if ($this->data): ?>
                <?php foreach ($this->data as $key => $record): ?>
                    <tr>
                        <td class="showTableTdCheckbox">
                            <input  class="checkedId" id="chekTableS-<?php echo $record['id'];?>" type="checkbox" name="<?php echo $record['id'];?>"  value="1" hidden="">
                            <label for="chekTableS-<?php echo $record['id'];?>"></label>
                        </td>
                        <td>
                            <a href="admin.php?page=tp_control_substitution_links&action=edit_link&id=<?php echo $record['id'];?>"
                               class="row-title" title="<?php _ex('tp_admin_page_auto_links_btn_edit',
                                '(Edit)', TPOPlUGIN_TEXTDOMAIN); ?> «<?php echo $record['arl_anchor'];?>»">
                                <?php echo $record['arl_anchor'];?></a>
                        </td>
                        <td>
                            <?php echo $record['arl_url'];?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
        <form action="options.php" class="formSettings TPFormNotReload" method="POST">
            <?php settings_fields('TPAutoReplLink'); ?>
            <div class="TPmainContent TP-SettingContent TPSettingsAutoReplacLink clearfix">
                 <?php do_settings_fields('tp_settings_auto_repl_link', 'tp_settings_auto_repl_link_id'); ?>
                <div class="TP-navsPan">
                <input type="submit" name="submit" class="TP-BtnTab"
                       value="<?php _ex('tp_admin_page_auto_links_btn_save_changes',
                           '(Save changes)', TPOPlUGIN_TEXTDOMAIN); ?>">
                </div>
            </div>
            <a href="#" id="TPBtnIsertLink" class="TP-BtnTab">
                <?php _ex('tp_admin_page_auto_links_btn_auto_links',
                    '(Place auto-links in all existing posts)', TPOPlUGIN_TEXTDOMAIN); ?>
            </a>

        </form>

    </div>
</div>

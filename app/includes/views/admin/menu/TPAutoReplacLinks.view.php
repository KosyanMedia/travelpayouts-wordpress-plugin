<div class="TPWrapper TPWrapper-long">

    <p class="TPMainTitle TPMainTitleSF"><?php _e('Substitution links', TPOPlUGIN_TEXTDOMAIN); ?> </p>

    <div class="TP-TopImportantInfo TP-shortDescription">
        <p>
            <?php _e('Here you can put down automatically links for a given phrase in all posts',
                TPOPlUGIN_TEXTDOMAIN); ?>
        </p>
    </div>

    <div class="TPmainContent TP-BalanceContent TP-SettingContent TPAutoLink">
        <p class="TP-SettingTitle">
            <?php _e('List of links', TPOPlUGIN_TEXTDOMAIN); ?>
        </p>

        <div class="TP-navsShort">
            <div class="TP-lincksNavShortCust">
                <a href="admin.php?page=tp_control_substitution_links&action=add_link" class="TP-addShortLincks">
                    <i></i><?php _e('Add link', TPOPlUGIN_TEXTDOMAIN) ?>
                </a>
                <div class="input_button_style TP-ImportLink">
                    <div class="input_font_style">
                        <?php _e('Import links', TPOPlUGIN_TEXTDOMAIN) ?>
                    </div>
                    <input type="file" accept=".csv" name="select_file"
                           id="importFileCSV" size="1" class="input_input_style"
                           multiple="">
                </div>
                <!--<a href="admin.php?page=tp_control_substitution_links&action=import_links" class="TP-ImportLink">
                    <i></i><?php _e('Import links', TPOPlUGIN_TEXTDOMAIN) ?>
                </a>-->
                <a href="#"
                   class="TP-deleteShortLincks deleteChecked"
                   data-type="arl_link">
                    <i></i><?php _e('Remove', TPOPlUGIN_TEXTDOMAIN) ?>
                </a>
            </div>
            <a class="TP-AllLincksShort"></a>
        </div>

        <table class="TP-listShort" id="TP-listShortcode">
            <thead>
            <tr>
                <td class="tp-notsort-column">
                    <input class="checkedAll" id="chekTableS-all" type="checkbox" name="checkedId" hidden="">
                    <label for="chekTableS-all"></label>
                </td>
                <td class="TPTableHead"><?php _e('Anchor', TPOPlUGIN_TEXTDOMAIN) ?></td>
                <td class="TPTableHead"><?php _e('Link', TPOPlUGIN_TEXTDOMAIN) ?></td>
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
                               class="row-title" title="<?php _e('Edit', TPOPlUGIN_TEXTDOMAIN) ?> «<?php echo $record['arl_anchor'];?>»">
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
            <div class="TPmainContent TP-SettingContent">
                 <?php do_settings_fields('tp_settings_auto_repl_link', 'tp_settings_auto_repl_link_id'); ?>
            </div>

                <input type="submit" name="submit" id="TPBtnIsertLink" class="TP-BtnTab"
                       value="<?php _e('Affix link for all existing posts', TPOPlUGIN_TEXTDOMAIN ); ?>">

        </form>

    </div>
</div>

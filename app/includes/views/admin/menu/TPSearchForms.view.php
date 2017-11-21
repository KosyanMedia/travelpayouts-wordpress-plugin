<div class="TPWrapper TPWrapper-long">

    <p class="TPMainTitle TPMainTitleSF">
        <?php _ex('Search forms',
            'tp_admin_page_search_forms_paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
    </p>

    <div class="TP-TopImportantInfo TP-shortDescription">
        <p>
            <?php _ex('Here you can add shortcodes for each search form added to your Travelpayouts account',
                'tp_admin_page_search_forms_paragraph_2', TPOPlUGIN_TEXTDOMAIN); ?>
            <?php
            global $locale;
            $link_help = '';
            switch($locale){
                case "ru_RU":
                    $link_help = 'https://support.travelpayouts.com/hc/ru/articles/207794617?utm_source=wpplugin&utm_medium=forms&utm_campaign=ru#11';
                    ?>
                    <a href="https://www.travelpayouts.com/tools/forms?utm_source=wpplugin&utm_medium=forms&utm_campaign=ru" target="_blank">
                        <?php _ex('https://www.travelpayouts.com/tools/forms',
                            'tp_admin_page_search_forms_paragraph_2_link', TPOPlUGIN_TEXTDOMAIN); ?>
                    </a>
                    <?php
                    break;
                case "en_US":
                    $link_help = 'https://support.travelpayouts.com/hc/en-us/articles/207794617?utm_source=wpplugin&utm_medium=forms&utm_campaign=en#11';
                    ?>
                    <a href="https://www.travelpayouts.com/tools/forms?utm_source=wpplugin&utm_medium=forms&utm_campaign=en" target="_blank">
                        <?php _ex('https://www.travelpayouts.com/tools/forms',
                            'tp_admin_page_search_forms_paragraph_2_link', TPOPlUGIN_TEXTDOMAIN); ?>
                    </a>
                    <?php
                    break;
                default:
                    $link_help = 'https://support.travelpayouts.com/hc/en-us/articles/207794617?utm_source=wpplugin&utm_medium=forms&utm_campaign=en#11';
                    ?>
                    <a href="https://www.travelpayouts.com/tools/forms?utm_source=wpplugin&utm_medium=forms&utm_campaign=en" target="_blank">
                        <?php _ex('https://www.travelpayouts.com/tools/forms',
                            'tp_admin_page_search_forms_paragraph_2_link', TPOPlUGIN_TEXTDOMAIN); ?>
                    </a>
                    <?php
                    break;
            } ?>
        </p>
        <p>
            <?php _ex('Check our step-by-step manual',
                'tp_admin_page_search_forms_paragraph_3', TPOPlUGIN_TEXTDOMAIN); ?>
            <?php
                global $locale;
                $linkHere = '';
                switch($locale) {
                    case "ru_RU":
                        $linkHere = 'https://support.travelpayouts.com/hc/ru/articles/115000456691?utm_source=wpplugin&utm_medium=forms&utm_campaign=ru';
                        break;
                    case "en_US":
                        $linkHere = 'https://support.travelpayouts.com/hc/en-us/articles/115000456691?utm_source=wpplugin&utm_medium=forms&utm_campaign=en';
                        break;
                    default:
                        $linkHere = 'https://support.travelpayouts.com/hc/en-us/articles/115000456691?utm_source=wpplugin&utm_medium=forms&utm_campaign=en';
                        break;
                }
            ?>
            <a href="<?php echo $linkHere; ?>" target="_blank">
                <?php _ex('here',
                    'tp_admin_page_search_forms_paragraph_3_link', TPOPlUGIN_TEXTDOMAIN); ?>
            </a>
        </p>
    </div>

    <div class="TPmainContent TP-BalanceContent TP-SettingContent">
        <p class="TP-SettingTitle">
            <?php _ex('Search Form Shortcodes',
                'tp_admin_page_search_forms_paragraph_4', TPOPlUGIN_TEXTDOMAIN); ?>
        </p>

        <div class="TP-navsShort">
            <div class="TP-lincksNavShort">
                <a href="admin.php?page=tp_control_search_shortcodes&action=add_search_shortcode" class="TP-addShortLincks">
                    <i></i>
                    <?php _ex('Add a shortcode',
                        'tp_admin_page_search_forms_btn_add_shortcode', TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
                <a href="admin.php?page=tp_control_search_shortcodes&action=add_search_shortcode" class="TP-deleteShortLincks deleteChecked"
                   data-type="search_shortcodes">
                    <i></i>
                    <?php _ex('Remove',
                        'tp_admin_page_search_forms_btn_remove', TPOPlUGIN_TEXTDOMAIN); ?>
                </a>
            </div>
            <a class="TP-AllLincksShort" href="javascript:void(0)">
                <?php _ex('All',
                    'tp_admin_page_search_forms_btn_all', TPOPlUGIN_TEXTDOMAIN); ?>
                (<span><?php echo count($this->data); ?></span>)
            </a>
        </div>

        <table class="TP-listShort" id="TP-listShortcode">
            <thead>
            <tr>
                <td class="tp-notsort-column">
                    <input class="checkedAll" id="chekTableS-all" type="checkbox" name="checkedId" hidden="">
                    <label for="chekTableS-all"></label>
                </td>
                <td class="TPTableHead">
                    <?php _ex('Title',
                        'tp_admin_page_search_forms_table_td_1', TPOPlUGIN_TEXTDOMAIN); ?>
                </td>
                <td class="TPTableHead tp-date-column">
                    <?php _ex('Add Date',
                        'tp_admin_page_search_forms_table_td_2', TPOPlUGIN_TEXTDOMAIN); ?>
                </td>
                <td class="tp-notsort-column">
                    <?php _ex('Shortcode',
                        'tp_admin_page_search_forms_table_td_3', TPOPlUGIN_TEXTDOMAIN); ?>
                </td>
                <td class="tp-notsort-column"></td>
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
                            <a href="admin.php?page=tp_control_search_shortcodes&action=edit_search_shortcode&id=<?php echo $record['id'];?>"
                               class="row-title" title="<?php _ex('Edit',
                                'tp_admin_page_search_forms_table_edit_link', TPOPlUGIN_TEXTDOMAIN); ?>«<?php echo $record['title'];?>»">
                                <?php echo $record['title'];?></a>
                        </td>
                        <td>
                            <p data-tptime="<?php echo $record['date_add']; ?>">
                                <?php echo date('d.m.Y', $record['date_add']);?>
                            </p>
                        </td>
                        <?php
                            $shortcodeAttr = '';
                            if (empty($record['slug'])){
                                $shortcodeAttr = ' id="'.$record['id'].'"';
                            } else {
                                $shortcodeAttr = ' slug="'.$record['slug'].'"';
                            }
                        ?>
                        <td>[tp_search_shortcodes <?php echo $shortcodeAttr; ?>]</td>
                        <td>
                            <a class="TP-icoDeleteShortTable" href="admin.php?page=tp_control_search_shortcodes&action=delete_search_shortcode&id=<?php echo $record['id'];?>"></a>
                            <a class="TP-icoFormatShortTable" href="admin.php?page=tp_control_search_shortcodes&action=edit_search_shortcode&id=<?php echo $record['id'];?>"></a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="TPWrapper">
    <p class="TPMainTitle">
        <?php _ex('Widgets',
            'tp_admin_page_widgets_paragraph_1', TPOPlUGIN_TEXTDOMAIN); ?>
    </p>
    <div class="TPmainContent clearfix">
        <form action="options.php" class="formSettings" method="POST" id="TPWidgetConfig">
            <?php settings_fields('TPWidgets'); ?>
            <div class="bellows default">

                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3>
                            <?php _ex('Map Widget',
                                'tp_admin_page_widgets_shortcode_1_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_widget_1', 'tp_settings_widget_1_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsWidget_1" class="TP-BtnTab"
                                   value="<?php _ex('Save changes',
                                       'tp_admin_page_widgets_shortcode_1_btn_save_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                        </div>
                    </div>
                </div>

                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3>
                            <?php _ex('Hotels Map Widget',
                                'tp_admin_page_widgets_shortcode_2_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_widget_2', 'tp_settings_widget_2_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsWidget_2" class="TP-BtnTab"
                                   value="<?php _ex('Save changes',
                                       'tp_admin_page_widgets_shortcode_2_btn_save_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                        </div>
                    </div>
                </div>

                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3>
                            <?php _ex('Calendar Widget',
                                'tp_admin_page_widgets_shortcode_3_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_widget_3', 'tp_settings_widget_3_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsWidget_3" class="TP-BtnTab"
                                   value="<?php _ex('Save changes',
                                       'tp_admin_page_widgets_shortcode_3_btn_save_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                        </div>
                    </div>
                </div>
                <?php if(\app\includes\common\TPLang::getLang() == \app\includes\common\TPLang::getLangRU()){ ?>
                    <div class="bellows__item">
                        <div class="bellows__header">
                            <h3>
                                <?php _ex('Subscription Widget',
                                    'tp_admin_page_widgets_shortcode_4_label', TPOPlUGIN_TEXTDOMAIN); ?>
                            </h3>
                        </div>
                        <div class="bellows__content">
                            <?php do_settings_fields('tp_settings_widget_4', 'tp_settings_widget_4_id'); ?>
                            <div class="TP-navsPan">
                                <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                                <input type="submit" name="submit" id="TPSaveSettingsWidget_4" class="TP-BtnTab"
                                       value="<?php _ex('Save changes',
                                           'tp_admin_page_widgets_shortcode_4_btn_save_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3>
                            <?php _ex('Hotel Widget',
                                'tp_admin_page_widgets_shortcode_5_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_widget_5', 'tp_settings_widget_5_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsWidget_5" class="TP-BtnTab"
                                   value="<?php _ex('Save changes',
                                       'tp_admin_page_widgets_shortcode_5_btn_save_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                        </div>
                    </div>
                </div>
                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3>
                            <?php _ex('Popular Destinations Widget',
                                'tp_admin_page_widgets_shortcode_6_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_widget_6', 'tp_settings_widget_6_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsWidget_6" class="TP-BtnTab"
                                   value="<?php _ex('Save changes',
                                       'tp_admin_page_widgets_shortcode_6_btn_save_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                        </div>
                    </div>
                </div>

                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3>
                            <?php _ex('Hotels Selections Widget',
                                'tp_admin_page_widgets_shortcode_7_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_widget_7', 'tp_settings_widget_7_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsWidget_7" class="TP-BtnTab"
                                   value="<?php _ex('Save changes',
                                       'tp_admin_page_widgets_shortcode_7_btn_save_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                        </div>
                    </div>
                </div>

                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3>
                            <?php _ex('Best deals widget',
                                'tp_admin_page_widgets_shortcode_8_label', TPOPlUGIN_TEXTDOMAIN); ?>
                        </h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_widget_8', 'tp_settings_widget_8_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsWidget_8" class="TP-BtnTab"
                                   value="<?php _ex('Save changes',
                                       'tp_admin_page_widgets_shortcode_8_btn_save_label', TPOPlUGIN_TEXTDOMAIN); ?>">
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
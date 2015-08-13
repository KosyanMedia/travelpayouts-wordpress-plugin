<div class="TPWrapper">
    <p class="TPMainTitle"><?php _e('Widgets', KPDPlUGIN_TEXTDOMAIN ); ?></p>
    <div class="TPmainContent clearfix">
        <form action="options.php" class="formSettings" method="POST" id="TPWidgetConfig">
            <?php settings_fields('TPWidgets'); ?>
            <div class="bellows default">

                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3><?php _e('Widget map', KPDPlUGIN_TEXTDOMAIN ); ?></h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_widget_1', 'tp_settings_widget_1_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsWidget_1" class="TP-BtnTab"
                                   value="<?php _e('Save changes', KPDPlUGIN_TEXTDOMAIN ); ?>">
                        </div>
                    </div>
                </div>

                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3><?php _e('Hotels map', KPDPlUGIN_TEXTDOMAIN ); ?></h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_widget_2', 'tp_settings_widget_2_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsWidget_2" class="TP-BtnTab"
                                   value="<?php _e('Save changes', KPDPlUGIN_TEXTDOMAIN ); ?>">
                        </div>
                    </div>
                </div>

                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3><?php _e('Calendar', KPDPlUGIN_TEXTDOMAIN ); ?></h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_widget_3', 'tp_settings_widget_3_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsWidget_3" class="TP-BtnTab"
                                   value="<?php _e('Save changes', KPDPlUGIN_TEXTDOMAIN ); ?>">
                        </div>
                    </div>
                </div>
                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3><?php _e('Subscriptions', KPDPlUGIN_TEXTDOMAIN ); ?></h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_widget_4', 'tp_settings_widget_4_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsWidget_4" class="TP-BtnTab"
                                   value="<?php _e('Save changes', KPDPlUGIN_TEXTDOMAIN ); ?>">
                        </div>
                    </div>
                </div>
                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3><?php _e('Hotel widget', KPDPlUGIN_TEXTDOMAIN ); ?></h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_widget_5', 'tp_settings_widget_5_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsWidget_5" class="TP-BtnTab"
                                   value="<?php _e('Save changes', KPDPlUGIN_TEXTDOMAIN ); ?>">
                        </div>
                    </div>
                </div>
                <div class="bellows__item">
                    <div class="bellows__header">
                        <h3><?php _e('Widget popular routes', KPDPlUGIN_TEXTDOMAIN ); ?></h3>
                    </div>
                    <div class="bellows__content">
                        <?php do_settings_fields('tp_settings_widget_6', 'tp_settings_widget_6_id'); ?>
                        <div class="TP-navsPan">
                            <!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
                            <input type="submit" name="submit" id="TPSaveSettingsWidget_6" class="TP-BtnTab"
                                   value="<?php _e('Save changes', KPDPlUGIN_TEXTDOMAIN ); ?>">
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
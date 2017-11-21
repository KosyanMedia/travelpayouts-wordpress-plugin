<div class="TPThemes">
    <form action="options.php" class="formSettings TPFormNotReload" method="POST">
	    <?php $numberTheme = 1; ?>
        <?php foreach($data['themes'] as $theme): ?>
            <?php
            $TPThemeActive = ($theme['name'] ==  \app\includes\TPPlugin::$options['themes_table_hotels']['name'])?'TPThemeActive':'';

            ?>
            <div class="TPTheme <?php echo $TPThemeActive; ?>" data-theme_name="<?php echo $theme['name']; ?>">
                <div class="TPThemeScreenshot">
                    <img src="<?php echo TPOPlUGIN_URL.'app/public/themes/hotel/screens-and-names/'.$theme['screenshot']?>" alt="">
                </div>
                <h3 class="TPThemeName">
                    <?php echo $numberTheme.'. '; ?>
                    <?php echo $theme['title']; ?>
                </h3>
                <div class="TPThemeActions">
                    <input type="submit" name="submit"
                           class="button button-secondary activate TPThemeBtnActivate "
                           value="<?php _ex('Activate',
                               'tp_admin_page_hotels_tab_themes_btn_active', TPOPlUGIN_TEXTDOMAIN );?>">
                    <!--<a class="button button-secondary activate TPThemeBtnActivate ">
                                        <?php
                    _ex('Activate',
                        'tp_admin_page_hotels_tab_themes_btn_active', TPOPlUGIN_TEXTDOMAIN );
                    ?>
                                    </a>-->
                </div>
            </div>
	        <?php $numberTheme++; ?>
        <?php endforeach; ?>

        <?php settings_fields('TPHotels'); ?>
        <?php do_settings_fields('tp_settings_hotels_themes_table', 'tp_settings_hotels_themes_table_id'); ?>
    </form>
</div>
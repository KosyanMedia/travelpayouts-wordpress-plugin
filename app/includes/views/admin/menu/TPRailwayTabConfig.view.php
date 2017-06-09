<form action="options.php" class="formSettings TPFormNotReload" method="POST" id="TPHotelsConfig">
	<?php settings_fields('TPRailway'); ?>
	<div class="TPmainContent TP-BalanceContent TPRailwayContent">
		<?php do_settings_fields('tp_settings_railway_shortcode_1', 'tp_settings_railway_shortcode_1_id'); ?>
		<div class="TP-navsPan">
			<!--Кнопка может быть не активной: добавляйте класс disable для достижение такого состояние-->
			<input type="submit" name="submit" id="TPSaveSettingsRailway_1" class="TP-BtnTab"
				   value="<?php _ex('Save changes', 'admin page railway tab tables content save button label', TPOPlUGIN_TEXTDOMAIN); ?>">
		</div>
	</div>

</form>
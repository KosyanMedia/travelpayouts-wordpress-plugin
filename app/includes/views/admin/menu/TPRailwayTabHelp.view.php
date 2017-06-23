<form action="options.php" class="formSettings TPFormNotReload" method="POST">
	<div class="TPmainContent TP-BalanceContent TPRailwayContent">
		<div class="TP-StyleItem">
			<p>
				<?php _ex('You need to activate ',
					'admin page railway tab railway help',
					TPOPlUGIN_TEXTDOMAIN); ?>
				<a href="https://www.travelpayouts.com/campaigns/45" target="_blank">
					<?php _ex('Tutu.ru campaign ',
						'admin page railway tab railway help',
						TPOPlUGIN_TEXTDOMAIN); ?>
				</a>
				<?php _ex('at Travelpayouts.com beforehand. Links won\'t work without campaign activation. ',
					'admin page railway tab railway help',
					TPOPlUGIN_TEXTDOMAIN); ?>
			</p>
			<p>
				<a href="https://www.travelpayouts.com/campaigns/45" target="_blank">
					<?php _ex('Activate Tutu.ru campaign ',
						'admin page railway tab railway help',
						TPOPlUGIN_TEXTDOMAIN); ?>
				</a>
			</p>


		</div>
		<div class="TP-navsPan">
			<input type="submit" name="submit"
			       class="TP-BtnTab tp-help-railway-active "
			       value="<?php _ex('Tutu.ru campaign is activated. Let\'s go',
				       'admin page railway tab railway help',
				       TPOPlUGIN_TEXTDOMAIN); ?>">
		</div>
	</div>

	<?php settings_fields('TPRailway'); ?>
	<?php do_settings_fields('tp_settings_railway_active',
		'tp_settings_railway_active_id'); ?>
</form>
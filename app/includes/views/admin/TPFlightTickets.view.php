<form action="options.php" method="POST">
    <?php
        settings_fields('TPFlightTickets');
        do_settings_fields('tp_settings_shortcode_1', 'tp_settings_shortcode_1_id');
    ?>
</form>
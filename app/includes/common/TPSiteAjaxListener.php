<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 12.07.17
 * Time: 18:14
 */

namespace app\includes\common;


use core\TPRequest;

class TPSiteAjaxListener {
	public function __construct() {
		add_action('wp_ajax_railway_open_link', [&$this, 'openLink']);
		add_action('wp_ajax_nopriv_railway_open_link', [&$this, 'openLink']);
	}

	public function openLink(){
		error_log('openLink');
		error_log(print_r($_POST, true));

		$url = TPRequest::post('url','');
		header("Location: {$url}", true, 302);
		/*echo '<script>
				  $(document).ready(function(){
				      window.open('.$url.', "_blank"); // will open new tab on document ready
				  });
				</script>';*/
	}
}

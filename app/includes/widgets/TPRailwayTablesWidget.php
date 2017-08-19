<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 02.08.17
 * Time: 11:14
 */

namespace app\includes\widgets;

use WP_Widget;

class TPRailwayTablesWidget extends WP_Widget{
	public function __construct()
	{
		parent::__construct(
			'travelpayouts_railway_tables', // Base ID
			_x('Travelpayouts – Railways schedule',
                'Travelpayouts – Railways schedule Widget',
                TPOPlUGIN_TEXTDOMAIN), // Name
			array(
				'description' => __('Travelpayouts – Railways schedule',
                    'Travelpayouts – Railways schedule Widget', TPOPlUGIN_TEXTDOMAIN)
			) // Args
		);
	}

	/**
	 * @param $args
	 * @param $instance
	 */
	public function widget( $args, $instance ) {
		$title = isset( $instance['railway_title'] ) ? esc_attr( $instance['railway_title'] ) : '';
		$origin = isset( $instance['railway_origin'] ) ? esc_attr( $instance['railway_origin'] ) : '';
		$destination = isset( $instance['railway_destination'] ) ? esc_attr( $instance['railway_destination'] ) : '';
		$subid = isset( $instance['railway_subid'] ) ? esc_attr( $instance['railway_subid'] ) : '';
		if (array_key_exists('railway_paginate', $instance)){
			$paginate = true;
		} else {
			$paginate = false;
		}
		if (array_key_exists('railway_off_title', $instance)){
			$off_title = true;
		} else {
			$off_title = false;
		}
		$originCode = $this->getCode($origin);
		if (empty($originCode)) return;
		$destinationCode = $this->getCode($destination);
		if (empty($destinationCode)) return;
		$titleAttr = 'title='.$title.'';
		$originAttr = 'origin="'.$originCode.'"';
		$destinationAttr = 'destination="'.$destinationCode.'"';
		$subidAttr = 'subid="'.$subid.'"';
		$paginateAttr = ($paginate == true) ? 'paginate=true' : 'paginate=false';
		$offTitleAttr = ($off_title == true) ? 'off_title=true' : '';
		$shortcode = '';
		$shortcode .= '[tp_tutu ';
		$shortcode .= $titleAttr.' ';
		$shortcode .= $originAttr.' ';
		$shortcode .= $destinationAttr.' ';
		$shortcode .= $subidAttr.' ';
		$shortcode .= $paginateAttr.' ';
		$shortcode .= $offTitleAttr.' ';
		$shortcode .= ']';
		//error_log($shortcode);
		echo do_shortcode($shortcode);
	}

	/**
	 * @param $new_instance
	 * @param $old_instance
	 * @return mixed
	 */
	public function update( $new_instance, $old_instance ) {
		// Save widget options
		/*if (array_key_exists('railway_origin', $new_instance)){
			if (empty( $new_instance['railway_origin'] )){
				$new_instance['railway_origin'] = $this->getOldInstance($old_instance, 'railway_origin');
			}
		}
		if (array_key_exists('railway_destination', $new_instance)){
			if (empty( $new_instance['railway_destination'] )){
				$new_instance['railway_destination'] = $this->getOldInstance($old_instance, 'railway_destination');
			}
		}
		/*if (array_key_exists('railway_subid', $new_instance)){
			if (empty( $new_instance['railway_subid'] )){
				$new_instance['railway_subid'] = $this->getOldInstance($old_instance, 'railway_subid');
			}
		}*/
		return $new_instance;
	}

	/**
	 * @param $instance
	 */
	public function form( $instance ) {
		$title = isset( $instance['railway_title'] ) ? esc_attr( $instance['railway_title'] ) : '';
		$origin = isset( $instance['railway_origin'] ) ? esc_attr( $instance['railway_origin'] ) : '';
		$destination = isset( $instance['railway_destination'] ) ? esc_attr( $instance['railway_destination'] ) : '';
		$subid = isset( $instance['railway_subid'] ) ? esc_attr( $instance['railway_subid'] ) : '';
		if (array_key_exists('railway_paginate', $instance)){
			$paginate = true;
		} else {
			$paginate = false;
		}
		if (array_key_exists('railway_off_title', $instance)){
			$off_title = true;
		} else {
			$off_title = false;
		}
		?>
		<div class="tp-railway-tables-widget tp-widget">
			<p class="tp-railway-tables-widget-title">
				<label for="<?php echo $this->get_field_id('railway_title'); ?>">
					<?php _ex('Alternate title:', 'Travelpayouts – Railways schedule Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input class="widefat" id="<?php echo $this->get_field_id('railway_title'); ?>"
					       name="<?php echo $this->get_field_name('railway_title'); ?>" type="text"
					       value="<?php echo $title; ?>" />
				</label>
			</p>
			<p class="tp-railway-tables-widget-origin">
				<label for="<?php echo $this->get_field_id('railway_origin'); ?>">
					<?php _ex('Origin:', 'Travelpayouts – Railways schedule Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input class="widefat tpCityRailwayAutocomplete" id="<?php echo $this->get_field_id('railway_origin'); ?>"
					       name="<?php echo $this->get_field_name('railway_origin'); ?>" type="text"
                           value="<?php echo $origin; ?>" />
				</label>
			</p>
			<p class="tp-railway-tables-widget-destination">
				<label for="<?php echo $this->get_field_id('railway_destination'); ?>">
					<?php _ex('Destination:', 'Travelpayouts – Railways schedule Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input class="widefat tpCityRailwayAutocomplete" id="<?php echo $this->get_field_id('railway_destination'); ?>"
					       name="<?php echo $this->get_field_name('railway_destination'); ?>" type="text"
                           value="<?php echo $destination; ?>" />
				</label>
			</p>
			<p class="tp-railway-tables-widget-subid">
				<label for="<?php echo $this->get_field_id('railway_subid'); ?>">
					<?php _ex('Subid:', 'Travelpayouts – Railways schedule Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
					<input class="widefat" id="<?php echo $this->get_field_id('railway_subid'); ?>"
					       name="<?php echo $this->get_field_name('railway_subid'); ?>" type="text"
					       value="<?php echo $subid; ?>" />
				</label>
			</p>
			<p class="tp-railway-tables-widget-paginate">
				<label for="<?php echo $this->get_field_id('railway_paginate'); ?>">
					<input type="checkbox" id="<?php echo $this->get_field_id('railway_paginate'); ?>"
					       name="<?php echo $this->get_field_name('railway_paginate'); ?>"
					       value="1" <?php checked($paginate, true)?>>
					<?php _ex('Paginate', 'Travelpayouts – Railways schedule Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
				</label>
			</p>
			<p class="tp-railway-tables-widget-off-title">
				<label for="<?php echo $this->get_field_id('railway_off_title'); ?>">
					<input type="checkbox" id="<?php echo $this->get_field_id('railway_off_title'); ?>"
					       name="<?php echo $this->get_field_name('railway_off_title'); ?>"
					       value="1" <?php checked($off_title, true)?>>
					<?php _ex('No title', 'Travelpayouts – Railways schedule Widget',
                        TPOPlUGIN_TEXTDOMAIN);?>
				</label>
			</p>
		</div>
		<?php
	}

	/**
	 * @param $oldInstance
	 * @param $key
	 *
	 * @return string
	 */
	public function getOldInstance($oldInstance, $key){
		$instance = '';
		if (array_key_exists($key, $oldInstance)){
			$instance = $oldInstance[$key];
		}
		return $instance;
	}

	/**
	 * @param $data
	 *
	 * @return string
	 */
	public function getCode($data){
		if (empty($data)) return '';
		$dataCode = array();
		preg_match('/\[(.+)\]/', $data, $dataCode);
		$code = '';
		if (array_key_exists(1, $dataCode)){
			$code = $dataCode[1];
		}
		return $code;
	}
}
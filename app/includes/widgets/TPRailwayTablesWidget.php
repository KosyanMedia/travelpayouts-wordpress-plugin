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
		$paginate = isset( $instance['railway_paginate'] ) ? $instance['railway_paginate']  : true;
		$off_title = isset( $instance['railway_off_title'] ) ? $instance['railway_off_title']  : false;

		$originCode = '';
		if(isset($origin)){
			preg_match('/\[(.+)\]/', $origin, $originCode);
		}
		$destinationCode = '';
		if(isset($destination)){
			preg_match('/\[(.+)\]/', $destination, $destinationCode);
		}

		$titleAttr = 'title='.$title.'';
		$originAttr = 'origin="'.$originCode[1].'"';
		$destinationAttr = 'destination="'.$destinationCode[1].'"';
		$subidAttr = 'subid="'.$subid.'"';
		$paginateAttr = (isset($paginate))? 'paginate=true':'paginate=false';
		$offTitleAttr = (isset($off_title))? 'off_title=true':'';

		$shortcode = '';
		$shortcode .= '[tp_tutu ';
		$shortcode .= $titleAttr.' ';
		$shortcode .= $originAttr.' ';
		$shortcode .= $destinationAttr.' ';
		$shortcode .= $subidAttr.' ';
		$shortcode .= $paginateAttr.' ';
		$shortcode .= $offTitleAttr.' ';
		$shortcode .= ']';
		echo do_shortcode($shortcode);
	}

	/**
	 * @param $new_instance
	 * @param $old_instance
	 * @return mixed
	 */
	public function update( $new_instance, $old_instance ) {
		// Save widget options
		$new_instance['railway_title'] = (!empty( $new_instance['railway_title'] )) ? $new_instance['railway_title'] : $old_instance['railway_title'];
		$new_instance['railway_origin'] = (!empty( $new_instance['railway_origin'] )) ? $new_instance['railway_origin'] : $old_instance['railway_origin'];
		$new_instance['railway_destination'] = (!empty( $new_instance['railway_destination'] )) ? $new_instance['railway_destination'] : $old_instance['railway_destination'];
		$new_instance['railway_subid'] = (!empty( $new_instance['railway_subid'] )) ? $new_instance['railway_subid'] : $old_instance['railway_subid'];
		$new_instance['railway_paginate'] = (isset($new_instance['railway_paginate']))? true : false;
		$new_instance['railway_off_title'] = (isset($new_instance['railway_off_title']))? true : false;
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
		$paginate = isset( $instance['railway_paginate'] ) ? $instance['railway_paginate']  : true;
		$off_title = isset( $instance['railway_off_title'] ) ? $instance['railway_off_title']  : false;

		?>
		<div class="tp-railway-tables-widget">
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
}
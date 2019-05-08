<?php

/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 01.08.17
 * Time: 19:36
 */
namespace app\includes\widgets;

use app\includes\models\admin\menu\TPSearchFormsModel;
use WP_Widget;
use \app\includes\common\TpPluginHelper;

class TPSearchFormWidget extends WP_Widget{
	private $model;
	public function __construct()
	{
		parent::__construct(
			'travelpayouts_search_form', // Base ID
			_x('Travelpayouts – Search Form', 'Travelpayouts – Search Form Widget', TPOPlUGIN_TEXTDOMAIN), // Name
			array(
				'description' => _x('Travelpayouts – Search Form', 'Travelpayouts – Search Form Widget', TPOPlUGIN_TEXTDOMAIN)
			) // Args
		);
		$this->model = new TPSearchFormsModel();
	}

	/**
	 * @param $args
	 * @param $instance
	 */
	public function widget( $args, $instance ) {
		$select = isset( $instance['search_form_select'] ) ? esc_attr( $instance['search_form_select'] ) : '';
		$typeForm = isset( $instance['search_form_type_form'] ) ? esc_attr( $instance['search_form_type_form'] ) : '';
		$slug = isset( $instance['search_form_slug'] ) ? esc_attr( $instance['search_form_slug'] ) : '';
		$subid = isset( $instance['search_form_subid'] ) ? esc_attr( $instance['search_form_subid'] ) : '';
		$origin = isset( $instance['search_form_origin'] ) ? esc_attr( $instance['search_form_origin'] ) : '';
		$destination = isset( $instance['search_form_destination'] ) ? esc_attr( $instance['search_form_destination'] ) : '';
		$cityHotel = isset( $instance['search_form_city_hotel'] ) ? esc_attr( $instance['search_form_city_hotel'] ) : '';

		$slugAttr = '';
		if (!empty($slug)){
			$slugAttr = 'slug="'.$slug.'"';
		} else {
			$slugAttr = 'id="'.$select.'"';
		}
		$typeFormAttr = '';
		$typeFormAttr = 'type="'.$typeForm.'"';
		$subidAttr = '';
		$subidAttr = 'subid="'.$subid.'"';

		$originCode = $this->getCode($origin);
		$originAttr = 'origin="'.$originCode.'"';
		$destinationCode = $this->getCode($destination);
		$destinationAttr = 'destination="'.$destinationCode.'"';
		$cityHotelCode = $this->getHotelCity($cityHotel);
		$cityHotelAttr = 'hotel_city="'.$cityHotelCode.'"';

		$shortcodeAttr = '';
		switch ($typeForm){
			case "avia":
				$shortcodeAttr = $originAttr.' '.$destinationAttr;
				break;
			case "hotel":
				$shortcodeAttr = $cityHotelAttr;
				break;
			case "avia_hotel":
				$shortcodeAttr = $originAttr.' '.$destinationAttr.' '.$cityHotelAttr;
				break;
		}

		$shortcode = '';
		$shortcode .= '[tp_search_shortcodes ';
		$shortcode .= $shortcodeAttr.' ';
		$shortcode .= $slugAttr.' ';
		$shortcode .= $typeFormAttr.' ';
		$shortcode .= $subidAttr.' ';
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
		if (array_key_exists('search_form_type_form', $new_instance)){
			if (empty( $new_instance['search_form_type_form'] )){
				$new_instance['search_form_type_form'] = $this->getOldInstance($old_instance, 'search_form_type_form');
			}
		}
		if (array_key_exists('search_form_slug', $new_instance)){
			if (empty( $new_instance['search_form_slug'] )){
				$new_instance['search_form_slug'] = $this->getOldInstance($old_instance, 'search_form_slug');
			}
		}
		if (array_key_exists('search_form_origin', $new_instance)){
			if (empty( $new_instance['search_form_origin'] )){
				$new_instance['search_form_origin'] = $this->getOldInstance($old_instance, 'search_form_origin');
			}
		}
		if (array_key_exists('search_form_destination', $new_instance)){
			if (empty( $new_instance['search_form_destination'] )){
				$new_instance['search_form_destination'] = $this->getOldInstance($old_instance, 'search_form_destination');
			}
		}
		if (array_key_exists('search_form_city_hotel', $new_instance)){
			if (empty( $new_instance['search_form_city_hotel'] )){
				$new_instance['search_form_city_hotel'] = $this->getOldInstance($old_instance, 'search_form_city_hotel');
			}
		}
		return $new_instance;
	}

	/**
	 * @param $instance
	 */
	public function form( $instance ) {
		$searchForms = $this->model->get_data();
		$select = isset( $instance['search_form_select'] ) ? esc_attr( $instance['search_form_select'] ) : '';
		$typeForm = isset( $instance['search_form_type_form'] ) ? esc_attr( $instance['search_form_type_form'] ) : '';
		$slug = isset( $instance['search_form_slug'] ) ? esc_attr( $instance['search_form_slug'] ) : '';
		$subid = isset( $instance['search_form_subid'] ) ? esc_attr( $instance['search_form_subid'] ) : '';
		$origin = isset( $instance['search_form_origin'] ) ? esc_attr( $instance['search_form_origin'] ) : '';
		$destination = isset( $instance['search_form_destination'] ) ? esc_attr( $instance['search_form_destination'] ) : '';
		$cityHotel = isset( $instance['search_form_city_hotel'] ) ? esc_attr( $instance['search_form_city_hotel'] ) : '';
		?>
		<div class="tp-search-form-widget tp-widget">
			<?php if (!empty($searchForms)): ?>
				<p class="tp-search-form-widget-select">
					<label for="<?php echo $this->get_field_id('search_form_select'); ?>"
					       class="tp-search-form-widget-select-label">
						<?php if (TpPluginHelper::count($searchForms) > 1): ?>
							<?php _ex('Select the search form:',
								'Travelpayouts – Search Form Widget',
								TPOPlUGIN_TEXTDOMAIN);?>
							<select class="tp-search-form-widget-select-shortcode widefat"
							        id="<?php echo $this->get_field_id('search_form_select'); ?>"
							        name="<?php echo $this->get_field_name('search_form_select'); ?>"
							        data-select_table="<?php echo $select; ?>"
							        data-type_form="<?php echo $typeForm; ?>"
							        data-slug="<?php echo $slug; ?>"
								>
								<?php foreach ($searchForms as $key => $record): ?>
									<option value="<?php echo $record['id'];?>"
										<?php selected($select, $record['id']); ?>
										    data-type_form="<?php echo $record['type_form'];?>"
										    data-slug="<?php echo $record['slug'];?>">
										<?php echo $record['title'];?>
									</option>
								<?php endforeach; ?>
							</select>
						<?php else: ?>
							<?php foreach ($searchForms as $key => $record): ?>
								<b><?php echo $record['title'] ?></b>
								<input type="hidden" id="<?php echo $this->get_field_id('search_form_select'); ?>"
								       name="<?php echo $this->get_field_name('search_form_select'); ?>"
								       value="<?php echo $record['id']; ?>"
								       data-type_form="<?php echo $typeForm; ?>"
								       data-slug="<?php echo $slug; ?>"
								       class="tp-search-form-widget-select-shortcode" >
								<?php
									$typeForm = $record['type_form'];
									$slug = $record['slug'];
								?>
							<?php endforeach; ?>
						<?php endif; ?>
					</label>
					<input type="hidden" class="tp-search-form-widget-select-type-form"
					       id="<?php echo $this->get_field_id('search_form_type_form'); ?>"
					       name="<?php echo $this->get_field_name('search_form_type_form'); ?>"
						   value="<?php echo $typeForm?>">
					<input type="hidden" class="tp-search-form-widget-select-slug"
					       id="<?php echo $this->get_field_id('search_form_slug'); ?>"
					       name="<?php echo $this->get_field_name('search_form_slug'); ?>"
					       value="<?php echo $slug?>">
				</p>
				<p class="tp-search-form-widget-origin">
					<label for="<?php echo $this->get_field_id('search_form_origin'); ?>">
						<?php _ex('City of departure default:',
							'Travelpayouts – Search Form Widget',
							TPOPlUGIN_TEXTDOMAIN);?>
						<input placeholder="<?php echo $origin; ?>" type="text"
						       id="<?php echo $this->get_field_id('search_form_origin'); ?>"
						       name="<?php echo $this->get_field_name('search_form_origin'); ?>"
						       class="constructorCityWidgetsAutocomplete widefat"/>
					</label>
				</p>
				<p class="tp-search-form-widget-destination">
					<label for="<?php echo $this->get_field_id('search_form_destination'); ?>">
						<?php _ex('City Arrival default:',
							'Travelpayouts – Search Form Widget',
							TPOPlUGIN_TEXTDOMAIN);?>
						<input placeholder="<?php echo $destination; ?>" type="text"
						       id="<?php echo $this->get_field_id('search_form_destination'); ?>"
						       name="<?php echo $this->get_field_name('search_form_destination'); ?>"
						       class="constructorCityWidgetsAutocomplete widefat"/>
					</label>
				</p>
				<p class="tp-search-form-widget-hotel-city">
					<label for="<?php echo $this->get_field_id('search_form_city_hotel'); ?>">
						<?php _ex('Default City/Hotel:',
							'Travelpayouts – Search Form Widget',
							TPOPlUGIN_TEXTDOMAIN);?>
						<input placeholder="<?php echo $cityHotel; ?>" type="text"
						       id="<?php echo $this->get_field_id('search_form_city_hotel'); ?>"
						       name="<?php echo $this->get_field_name('search_form_city_hotel'); ?>"
						       class="searchHotelCityWidgetsAutocomplete TPHotelCityAutocomplete widefat"/>
					</label>
				</p>
				<p class="tp-search-form-widget-subid">
					<label for="<?php echo $this->get_field_id('search_form_subid'); ?>">
						<?php _ex('Subid:',
							'Travelpayouts – Search Form Widget',
							TPOPlUGIN_TEXTDOMAIN);?>
						<input placeholder="<?php echo $subid; ?>" type="text"
						       id="<?php echo $this->get_field_id('search_form_subid'); ?>"
						       name="<?php echo $this->get_field_name('search_form_subid'); ?>"
						       class="widefat"/>
					</label>
				</p>

			<?php else: ?>
				<?php
				_ex(
					'No customized search form.',
					'Travelpayouts – Search Form Widget',
						TPOPlUGIN_TEXTDOMAIN);
				?>
				<a href="admin.php?page=tp_control_search_shortcodes">
				<?php _ex('Go to setting.',
					'Travelpayouts – Search Form Widget',
					TPOPlUGIN_TEXTDOMAIN); ?>
				</a>
			<?php endif; ?>
		</div>
		<?php
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

	/**
	 * @param $hotelCity
	 *
	 * @return mixed|string
	 */
	public function getHotelCity($hotelCity){
		if (empty($hotelCity)) return '';
		$hotelCityCode = array();
		preg_match('/\{(.+)\}/', $hotelCity, $hotelCityCode);
		$code = '';
		if (array_key_exists(1, $hotelCityCode)){
			$code = $hotelCityCode[1];
		}
		return $code;
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
}

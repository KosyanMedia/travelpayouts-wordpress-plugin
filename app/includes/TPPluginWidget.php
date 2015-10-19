<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 19.10.15
 * Time: 10:26
 */

namespace app\includes;




use WP_Widget;

class TPPluginWidget extends WP_Widget{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct(
            'Travelpayouts', // Base ID
            'Travelpayouts', // Name
            array( 'description' => 'Travelpayouts', ) // Args
        );
    }
    public function widget( $args, $instance ) {
        // Widget output
    }

    public function update( $new_instance, $old_instance ) {
        // Save widget options
        $instance['title'] = (!empty( $new_instance['title'] )) ? $new_instance['title'] : $old_instance['title'];
        $instance['origin'] = (!empty( $new_instance['origin'])) ? $new_instance['origin'] : $old_instance['origin'];
        $instance['destination'] = (!empty( $new_instance['destination'] ) ) ? $new_instance['destination'] : $old_instance['destination'];
        $instance['select'] = (!empty( $new_instance['select'])) ? $new_instance['select'] : $old_instance['select'];

        return $instance;
    }

    public function form( $instance ) {
        // Output admin widget options form
        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $origin = isset( $instance['origin'] ) ? esc_attr( $instance['origin'] ) : '';
        $destination = isset( $instance['destination'] ) ? esc_attr( $instance['destination'] ) : '';

        $select = isset( $instance['select'] ) ? esc_attr( $instance['select'] ) : '';
        ?>
        <div class="TP-MainWidget">
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">
                    <?php _e('Title:');?>
                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                           name="<?php echo $this->get_field_name('title'); ?>" type="text"
                           value="<?php echo $title; ?>" />
                </label>
            </p>
            <p class="TP-SelectWidget">
                <label for="<?php echo $this->get_field_id('select'); ?>">
                    <?php _e('Select the table', TPOPlUGIN_TEXTDOMAIN); ?>:
                    <select class="TP-SelectWidget widefat"
                            id="<?php echo $this->get_field_id('select'); ?>"
                            name="<?php echo $this->get_field_name('select'); ?>"
                            style="max-width:400px;">
                        <?php if(\app\includes\TPPlugin::$options['local']['currency'] == 1){ ?>
                            <option value="0">
                                <?php _e('Select the table', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="1" <?php selected( $select, 1 ); ?>>
                                1. <?php _e('Flights from origin to destination, One Way (next month)', TPOPlUGIN_TEXTDOMAIN); ?>
                            </option>
                            <option value="2" <?php selected( $select, 2 ); ?>>
                                2. <?php _e('Flights from Origin to Destination (next few days)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <!--<option value="3">3. Дешевые авиабилеты на празничные дни</option>-->
                            <option value="3" <?php selected( $select, 3 ); ?>>
                                3. <?php _e('Cheapest Flights from origin to destination, Round-trip', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="4" <?php selected( $select, 4 ); ?>>
                                4. <?php _e('Cheapest Flights from origin to destination (next month)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="5" <?php selected( $select, 5 ); ?>>
                                5. <?php _e('Cheapest Flights from origin to destination (next year)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="6" <?php selected( $select, 6 ); ?>>
                                6. <?php _e('Direct Flights from origin to destination', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="7" <?php selected( $select, 7 ); ?>>
                                7. <?php _e('Direct Flights from origin', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="8" <?php selected( $select, 8 ); ?>>
                                8. <?php _e('Popular Destinations from origin', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="9" <?php selected( $select, 9 ); ?>>
                                9. <?php _e('Most popular flights within this Airlines', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <!--<option value="10">10. <?php// _e('Special offers airline', TPOPlUGIN_TEXTDOMAIN); ?></option>-->
                            <option value="11" <?php selected( $select, 11 ); ?>>
                                10. <?php _e('Searched on our website', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="12" <?php selected( $select, 12 ); ?>>
                                11. <?php _e('Cheap Flights from origin', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="13" <?php selected( $select, 13 ); ?>>
                                12. <?php _e('Cheap Flights to destination', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <?php } else { ?>
                            <option selected="selected" value="0"> <?php _e('Select the table', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="1" <?php selected( $select, 1 ); ?>>
                                1. <?php _e('Flights from origin to destination, One Way (next month)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="2" <?php selected( $select, 2 ); ?>>
                                2. <?php _e('Flights from Origin to Destination (next few days)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <!--<option value="3">3. Дешевые авиабилеты на празничные дни</option>-->
                            <option value="3" <?php selected( $select, 3 ); ?>>
                                3. <?php _e('Cheapest Flights from origin to destination, Round-trip', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="4" <?php selected( $select, 4 ); ?>>
                                4. <?php _e('Cheapest Flights from origin to destination (next month)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="5" <?php selected( $select, 5 ); ?>>
                                5. <?php _e('Cheapest Flights from origin to destination (next year)', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="6" <?php selected( $select, 6 ); ?>>
                                6. <?php _e('Direct Flights from origin to destination', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="7" <?php selected( $select, 7 ); ?>>
                                7. <?php _e('Direct Flights from origin', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="9" <?php selected( $select, 9 ); ?>>
                                8. <?php _e('Most popular flights within this Airlines', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <!--<option value="10">10. <?php// _e('Special offers airline', TPOPlUGIN_TEXTDOMAIN); ?></option>-->
                            <option value="11" <?php selected( $select, 11 ); ?>>
                                9. <?php _e('Searched on our website', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="12" <?php selected( $select, 12 ); ?>>
                                10. <?php _e('Cheap Flights from origin', TPOPlUGIN_TEXTDOMAIN); ?></option>
                            <option value="13" <?php selected( $select, 13 ); ?>>
                                11. <?php _e('Cheap Flights to destination', TPOPlUGIN_TEXTDOMAIN); ?></option>
                        <?php }?>

                    </select>
                </label>
            </p>
            <p class="TP-OriginWidget">
                <label for="<?php echo $this->get_field_id('origin'); ?>">
                    <?php _e('Origin', TPOPlUGIN_TEXTDOMAIN); ?>:
                    <input placeholder="<?php echo $origin; ?>" type="text"
                           id="<?php echo $this->get_field_id('origin'); ?>"
                           name="<?php echo $this->get_field_name('origin'); ?>"
                            class="constructorCityWidgetsAutocomplete widefat"/>
                </label>
            </p>
            <p class="TP-DestinationWidget">
                <label for="<?php echo $this->get_field_id('destination'); ?>">
                    <?php _e('Destination', TPOPlUGIN_TEXTDOMAIN); ?>:
                    <input placeholder="<?php echo $destination; ?>" type="text"
                           id="<?php echo $this->get_field_id('destination'); ?>"
                           name="<?php echo $this->get_field_name('destination'); ?>"
                           class="constructorCityWidgetsAutocomplete widefat"/>
                </label>
            </p>
        </div>
        <?php
    }
}
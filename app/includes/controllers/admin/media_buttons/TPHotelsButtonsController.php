<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 07.02.17
 * Time: 13:52
 */

namespace app\includes\controllers\admin\media_buttons;


class TPHotelsButtonsController extends TPAdminMediaButtonsController
{

    public function action($args = array())
    {
        // TODO: Implement action() method.
        $text = $this->getTextBtn(
            _x( 'Insert Hotels Table', 'admin media button insert hotels title', TPOPlUGIN_TEXTDOMAIN  ),
            _x( 'Hotels', 'admin media button hotels title', TPOPlUGIN_TEXTDOMAIN  )
        );

        $args = wp_parse_args( $args, array(
            'target'    => 'content',
            'text'      => $text,
            'class'     => 'button',
            'icon'      =>  TPOPlUGIN_URL.'app/public/images/tp_button_shortcode_hotel.png',
            'echo'      => true,
            'shortcode' => false
        ) );
        // Prepare icon
        if ( $args['icon'] ) $args['icon'] = '<img src="' . $args['icon'] . '" /> ';
        $button = '<a href="#" id="constructorHotelsShortcodesButton" class="su-generator-button '.$args['class'].'">'.
            $args['icon'] . $args['text'].'</a>';
        add_action( 'wp_footer',    array( &$this, 'render' ) );
        add_action( 'admin_footer', array( &$this, 'render' ) );
        wp_enqueue_media();
        if ( $args['echo'] ) echo $button;
        return $button;
    }

    public function render()
    {
        // TODO: Implement render() method.
        $data = array(
            'hotelTypes' => $this->getHotelTypes()
        );
        //error_log(print_r($data, true));
        $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/media_buttons/TPHotelsButtons.view.php";
        parent::loadView($pathView, 0, $data);
    }

    public function getHotelTypes(){
        $file = "";
        global $locale;
        switch($locale) {
            case "ru_RU":
                $file = TPOPlUGIN_DIR.'/app/public/hotel_types/hotelTypesRU.json';
                break;
            case "en_US":
                $file = TPOPlUGIN_DIR.'/app/public/hotel_types/hotelTypesEN.json';
                break;
            default:
                $file = TPOPlUGIN_DIR.'/app/public/hotel_types/hotelTypesRU.json';
                break;
        }
        $hotelTypes = json_decode(file_get_contents($file), true);
        return $hotelTypes;
    }
}
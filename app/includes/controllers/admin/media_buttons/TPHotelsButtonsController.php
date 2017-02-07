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
            _x( 'tp_admin_media_button_insert_hotels_title',
                'admin media button insert hotels title', TPOPlUGIN_TEXTDOMAIN  ),
            _x( 'tp_admin_media_button_hotels_short_title',
                'admin media button hotels title', TPOPlUGIN_TEXTDOMAIN  )
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
        $button = '<a href="#" id="constructorShortcodesButton" class="su-generator-button '.$args['class'].'">'.
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
        $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/media_buttons/TPHotelsButtons.view.php";
        parent::loadView($pathView);
    }
}
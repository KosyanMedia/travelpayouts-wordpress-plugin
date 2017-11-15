<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 01.10.15
 * Time: 9:49
 */

namespace app\includes\controllers\admin\media_buttons;


class TPLinkButtonsController extends TPAdminMediaButtonsController
{

    public function action($args = array())
    {
        // TODO: Implement action() method.
        $text = $this->getTextBtn(
            _x( 'Insert link',  'admin media button link title', TPOPlUGIN_TEXTDOMAIN  ),
            _x( 'Link',  'admin media button link short title', TPOPlUGIN_TEXTDOMAIN  )
        );
        $args = wp_parse_args( $args, array(
            'target'    => 'content',
            'text'      => $text,
            'class'     => 'button',
            'icon'      =>  TPOPlUGIN_URL.'app/public/images/tp_button_link.png',
            'echo'      => true,
            'shortcode' => false
        ) );
        // Prepare icon
        if ( $args['icon'] ) $args['icon'] = '<img src="' . $args['icon'] . '" /> ';
        $button = '<a href="#" id="constructorLinkButton" class="su-generator-button '.$args['class'].'">'.
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
        $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/media_buttons/TPLinkButtons.view.php";
        parent::loadView($pathView);
    }
}
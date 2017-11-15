<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 12.08.15
 * Time: 15:43
 */
namespace app\includes\controllers\admin\media_buttons;
class TPWidgetButtonsController extends TPAdminMediaButtonsController{

    public function action($args = array())
    {
        // TODO: Implement action() method.
        $text = $this->getTextBtn(
            _x( 'Insert widget',  'admin media button insert widget title', TPOPlUGIN_TEXTDOMAIN  ),
            _x( 'Widget',  'admin media button widget title', TPOPlUGIN_TEXTDOMAIN  )
            );

        $args = wp_parse_args( $args, array(
            'target'    => 'content',
            'text'      => $text,
            'class'     => 'button',
            'icon'      =>  TPOPlUGIN_URL.'app/public/images/tp_button_widget.png',
            'echo'      => true,
            'shortcode' => false
        ) );
        // Prepare icon
        if ( $args['icon'] ) $args['icon'] = '<img src="' . $args['icon'] . '" /> ';
        $button = '<a href="#" id="constructorWidgetButton" class="su-generator-button '.$args['class'].'">'.
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
        $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/media_buttons/TPWidgetButtons.view.php";
        parent::loadView($pathView);
    }
}
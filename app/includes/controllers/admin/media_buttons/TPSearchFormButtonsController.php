<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 12.08.15
 * Time: 17:18
 */
namespace app\includes\controllers\admin\media_buttons;
class TPSearchFormButtonsController extends TPAdminMediaButtonsController{
    public $model;
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\includes\models\admin\menu\TPSearchFormsModel();
    }
    public function action($args = array())
    {
        // TODO: Implement action() method.

        $text = $this->getTextBtn(
            _x( 'Insert search form',  'admin media button insert search form title', TPOPlUGIN_TEXTDOMAIN  ),
            _x( 'Form',  'admin media button form short title', TPOPlUGIN_TEXTDOMAIN  )
        );
        $args = wp_parse_args( $args, array(
            'target'    => 'content',
            'text'      => $text,
            'class'     => 'button',
            'icon'      =>  TPOPlUGIN_URL.'app/public/images/tp_button_search.png',
            'echo'      => true,
            'shortcode' => false
        ) );
        // Prepare icon
        if ( $args['icon'] ) $args['icon'] = '<img src="' . $args['icon'] . '" /> ';
        $button = '<a href="#" id="constructorSearchFormButton" class="su-generator-button '.$args['class'].'">'.
            //#TB_inline?width=300&height=300&inlineId=constructorShortcodesModal//.thickbox
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
        $this->data = $this->model->get_data();
        $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/media_buttons/TPSearchFormButtons.view.php";
        parent::loadView($pathView);
    }
}
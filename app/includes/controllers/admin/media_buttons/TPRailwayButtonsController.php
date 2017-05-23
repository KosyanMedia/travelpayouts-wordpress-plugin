<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 23.05.17
 * Time: 18:01
 */

namespace app\includes\controllers\admin\media_buttons;


class TPRailwayButtonsController extends TPAdminMediaButtonsController{

	public function action( $args = array() ) {
		// TODO: Implement action() method.
		$text = $this->getTextBtn(
			_x( 'Railway Schedule',
				'admin media button insert railway title', TPOPlUGIN_TEXTDOMAIN  ),
			_x( 'Railway Schedule',
				'admin media button railway title', TPOPlUGIN_TEXTDOMAIN  )
		);

		$args = wp_parse_args( $args, array(
			'target'    => 'content',
			'text'      => $text,
			'class'     => 'button',
			'icon'      =>  TPOPlUGIN_URL.'app/public/images/tp_button_shortcode_train.png',
			'echo'      => true,
			'shortcode' => false
		) );
		// Prepare icon
		if ( $args['icon'] ) $args['icon'] = '<img src="' . $args['icon'] . '" /> ';
		$button = '<a href="#" id="constructorRailwayShortcodesButton" class="su-generator-button '
		          .$args['class'].'">'. $args['icon'] . $args['text'].'</a>';
		add_action( 'wp_footer',    array( &$this, 'render' ) );
		add_action( 'admin_footer', array( &$this, 'render' ) );
		wp_enqueue_media();
		if ( $args['echo'] ) echo $button;
		return $button;
	}

	public function render() {
		// TODO: Implement render() method.
	}
}
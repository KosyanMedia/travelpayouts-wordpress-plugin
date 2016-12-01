<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 01.12.16
 * Time: 7:22 PM
 */

namespace app\includes\common;


class TPTinyMCE
{
    public $usePages = array(
        'tp_control_tickets'
    );
    public function __construct() {
        $page = isset($_GET['page']) ? $_GET['page'] : null ;
        if ( is_admin() && in_array($page, $this->usePages)) {
            add_action( 'init', array( &$this, 'setupTinyMCE' ) );
            add_action( 'admin_print_scripts', array( &$this, 'setupJSTinyMCE' ) );
            add_action( 'admin_print_footer_scripts', array( &$this, 'addQuicktags') );
        }
    }

    public function setupTinyMCE(){
        add_filter( 'mce_external_plugins', array( &$this, 'addTinyMCE' ) );
        add_filter( 'mce_buttons', array( &$this, 'addTinyMCEToolbar' ) );
    }

    public function addTinyMCE( $plugin_array ) {

        $plugin_array['tp_custom_class'] = TPOPlUGIN_URL . 'app/public/js/lib/TPTinyMCE.js';
        return $plugin_array;

    }

    public function addTinyMCEToolbar( $buttons ) {

        array_push( $buttons, 'tp_link_btn' , 'tp_button_btn' );
        return $buttons;

    }

    public function setupJSTinyMCE(){
        ?>
        <script type="text/javascript">
            var linkShortcode, linkShortcodeBtnLabel, linkShortcodeAttrTitleValue, buttonShortcode, buttonShortcodeBtnLabel,
                buttonShortcodeAttrTitleValue ;

            linkShortcodeBtnLabel = 'Вставить ссылку поиска';//'< ? php _ex('tp_head_script_admin_var_hotel_widget_label', '(Hotel Name)', TPOPlUGIN_TEXTDOMAIN ); ? >'
            linkShortcodeAttrTitleValue = 'Найти билет из {origin} {destination}';
            linkShortcode = '[link title="'+linkShortcodeAttrTitleValue+'"]';

            buttonShortcodeBtnLabel = 'Вставить кнопку поиска';
            buttonShortcodeAttrTitleValue = 'Найти билет из {origin} {destination}';
            buttonShortcode = '[button title="'+buttonShortcodeAttrTitleValue+'"]';

        </script>
        <?php
    }

    public function addQuicktags(){
        if ( ! wp_script_is('quicktags') )
            return;
        ?>
        <script type="text/javascript">
            QTags.addButton( 'eg_tp_link', '[link]', linkShortcode, '', 'h', linkShortcodeBtnLabel, 200 );
            QTags.addButton( 'eg_tp_button', '[button]', buttonShortcode, '', 'h', buttonShortcodeBtnLabel, 201 );
        </script>
        <?php
    }

}
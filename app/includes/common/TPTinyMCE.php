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

            linkShortcodeBtnLabel = '<?php _ex('tp_tinymce_link_shortcode_label',
                '(Press to insert a link into the notification)', TPOPlUGIN_TEXTDOMAIN ); ?>';
            linkShortcodeAttrTitleValue = '<?php _ex('tp_tinymce_link_shortcode_attr_title_value',
                '(Go to tickets search {origin} {destination})', TPOPlUGIN_TEXTDOMAIN ); ?>';
            linkShortcode = '[link title="'+linkShortcodeAttrTitleValue+'"]';

            buttonShortcodeBtnLabel = '<?php _ex('tp_tinymce_button_shortcode_label',
                '(Press to insert a button link into the notification. It will have the same look as search button in the table theme chosen)'
                , TPOPlUGIN_TEXTDOMAIN ); ?>';
            buttonShortcodeAttrTitleValue = '<?php _ex('tp_tinymce_button_shortcode_attr_title_value',
                '(Find tickets {origin} {destination})', TPOPlUGIN_TEXTDOMAIN ); ?>';
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
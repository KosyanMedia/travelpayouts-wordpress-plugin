<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 28.01.16
 * Time: 10:40
 */

namespace app\includes\controllers\admin\menu;


class TPAutoReplacLinksController extends \core\controllers\TPOAdminMenuController
{
    public $model;
    public $modelOption;
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\includes\models\admin\menu\TPAutoReplacLinksModel();
        $this->modelOption = new \app\includes\models\admin\menu\TPAutoReplacLinksOptionModel();
        add_action( 'save_post', array( &$this, 'autoReplacLinksSavePost'), 10, 3 );
        add_filter( 'wp_insert_post_data', array( &$this, 'autoReplacLinksInsertPost'), 10, 2 );
        add_action('add_meta_boxes', array( &$this, 'tp_add_custom_box'));
        //$this->model->getDataAutoReplacLinks();

    }
    public function action()
    {
        // TODO: Implement action() method.
        $plugin_page = add_submenu_page( TPOPlUGIN_TEXTDOMAIN,
            _x('Substitution links',  'add_menu_page page title', TPOPlUGIN_TEXTDOMAIN ),
            _x('Substitution links',  'add_menu_page page title', TPOPlUGIN_TEXTDOMAIN ),
            'manage_options',
            'tp_control_substitution_links',
            array(&$this, 'render'));
        add_action( 'admin_footer-'.$plugin_page, array(&$this, 'TPLinkHelp') );
    }

    public function render()
    {
        // TODO: Implement render() method.
        $action = isset($_GET['action']) ? $_GET['action'] : null ;
        $pathView = "";
        switch($action){
            case "add_link":
                $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPAutoReplacLinksAdd.view.php";
                break;
            case "save_link":
                if(isset($_POST)){
                    $this->model->insert($_POST);
                }
                $this->redirect('admin.php?page=tp_control_substitution_links');
                break;
            case "edit_link":
                if(isset($_GET['id']) && !empty($_GET['id'])){
                    $this->data = $this->model->get_dataID((int)$_GET['id']);
                    $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPAutoReplacLinksEdit.view.php";
                }else{
                    $this->redirect('admin.php?page=tp_control_substitution_links');
                }
                break;
            case "update_link":
                if(isset($_POST)){
                    $this->model->update($_POST);
                }
                $this->redirect('admin.php?page=tp_control_substitution_links');
                break;
            default:
                $this->data = $this->model->get_data();
                $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/menu/TPAutoReplacLinks.view.php";
                break;
        }
        parent::loadView($pathView);
    }

    /**
     * @param $post_id
     * @param $post
     * @param $update
     */
    public function autoReplacLinksSavePost($post_id, $post, $update){
        //error_log(print_r($post_id, true));
        //error_log(print_r($post, true));
        //error_log(print_r($update, true));
    }

    /**
     * Очищенные данные поста.
     * @param $data
     * Оригинальные данные поста переданные в $_POST
     * @param $postarr
     *
     * @return mixed
     * 'publish' - страница или запись опубликована.
     * 'pending' - пост ожидает утверждения администратора.
     * 'draft' - запись имеет статус черновика.
     * 'auto-draft' - новый пост, без контента.
     * 'future' - запись будет опубликована в будущем.
     * 'private' - личное, запись не буде показана неавторизованным посетителям.
     * 'inherit' - ревизия. См.get_children.
     * 'trash' - пост находится в Корзине. Добавлено в WordPress версии 2.9.
     *
     */
    public function autoReplacLinksInsertPost($data, $postarr){
        if ( $data['post_status'] == 'auto-draft' ||
            $data['post_status'] == 'draft' ||
            $data['post_status'] == 'trash' ){
            return $data;
        }
        $dataAutoReplacLinks = array(
            'anchor' => array(
                'test',
                'test'
            )
        );
        error_log(print_r($data, true));
        return $data;
    }

    /**
     *
     */
    public function tp_add_custom_box(){
        $screens = array( 'post', 'page' );
        foreach ( $screens as $screen ){
            add_meta_box(
                'tp_sectionid',
                _x('Substitution links',  'meta_box_post', TPOPlUGIN_TEXTDOMAIN ),
                array( &$this, 'tp_add_custom_box_callback'),
                $screen,
                'side',
                'high'
            );
        }

    }
    public function tp_add_custom_box_callback(){
        // Используем nonce для верификации
        //wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );
        ?>
        <fieldset>
            <legend class="screen-reader-text">
                <?php echo _x('Substitution links',  'meta_box_post', TPOPlUGIN_TEXTDOMAIN ); ?>
            </legend>
            <input type="radio" name="tp_auto_replac_link"
                   class="tp-auto-replac-link" id="tp-auto-replac-link-0" value="0" checked="checked">
            <label for="tp-auto-replac-link-0" class="tp-auto-replac-link-icon">
                <?php _e('Enable', TPOPlUGIN_TEXTDOMAIN ); ?>
            </label>
            <br><input type="radio" name="tp_auto_replac_link"
                       class="tp-auto-replac-link" id="tp-auto-replac-link-1" value="1">
            <label for="tp-auto-replac-link-1" class="tp-auto-replac-link-icon">
                <?php _e('Disable', TPOPlUGIN_TEXTDOMAIN ); ?>
            </label>
        </fieldset>
        <?php
    }

}
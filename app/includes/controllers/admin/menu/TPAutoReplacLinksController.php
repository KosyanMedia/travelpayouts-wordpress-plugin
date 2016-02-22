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
        add_action( 'wp_footer',    array( &$this, 'renderProgressbar' ) );
        add_action( 'admin_footer', array( &$this, 'renderProgressbar' ) );
        //add_action( 'load-edit.php', array( &$this, 'renderButton' ) );
        add_filter('post_row_actions', array( &$this, 'renderButton' ) ,10,2);
        add_filter('page_row_actions', array( &$this, 'renderButton' ) ,10,2);
        add_action('wp_ajax_auto_replace_link_post_by_id',      array( &$this, 'TPAutoReplaceLinkPostById'));
        add_action('wp_ajax_nopriv_auto_replace_link_post_by_id',array( &$this, 'TPAutoReplaceLinkPostById'));
        //page

    }

    public function renderButton($actions,$tag){
        //error_log(print_r($actions, true));
        //error_log(print_r($tag, true));
        $actions['tp-auto-replace-link-action-class'] = '<a href="#" data-post_id="'.$tag->ID .'"
             class="TPAutoReplaceLinkPostById">'
            . __('Substitution links', TPOPlUGIN_TEXTDOMAIN ).'</a>';
        return $actions;
    }

    public function TPAutoReplaceLinkPostById(){
        if(isset($_POST)) {
            $post = get_post( $_POST['id'], ARRAY_A);

            $dataAutoReplacLinks = $this->model->getDataAutoReplacLinks();
            if($dataAutoReplacLinks == false) return false;
            foreach($dataAutoReplacLinks as $key=>$dataAutoReplacLink){
                //error_log(print_r($dataAutoReplacLink['data'], true));
                extract($dataAutoReplacLink['data']);
                foreach($dataAutoReplacLink['anchor'] as $anchor){
                    //error_log(preg_quote($anchor).'  '.$url);
                    //error_log(print_r($dataAutoReplacLink, true));
                    // (\b) (\b) Проверить
                    $post['post_content'] = preg_replace_callback(
                        '/('.preg_quote($anchor).')|(\b)(<a.*?>'.preg_quote($anchor).'<\/a>)(\b)/m',
                        function($matches) use ($anchor, $url, $nofollow, $replace, $target, $event){
                            //error_log(print_r($matches, true));
                            if(strpos($matches[0], '<a') === false){

                                /*if(isset(\app\includes\TPPlugin::$options['auto_repl_link']['not_title'])){
                                    error_log(111);
                                }else{
                                    error_log(222);
                                }*/

                                $matches[0] = '<a href="'.$url.'" '.$nofollow.' class="TPAutoLinks" '.$target
                                    .' '.$event.'>'.$anchor.'</a>';
                            } else{
                                if($replace == 1){
                                    $matches[0] = '<a href="'.$url.'" '.$nofollow.' class="TPAutoLinks" '.$target
                                        .' '.$event.'>'.$anchor.'</a>';
                                }
                            }
                            return $matches[0];
                        },
                        //array( &$this, 'tp_preg_replace'),
                        $post['post_content'],
                        -1,//Limit replace
                        $count
                    );
                }
            }

            wp_update_post(array(
                'ID' => $post['ID'],
                'post_content' => $post['post_content']
            ));

        }
    }

    public function action()
    {
        // TODO: Implement action() method.
        $plugin_page = add_submenu_page( TPOPlUGIN_TEXTDOMAIN,
            _x('Substitution links',  'add_menu_page page title', TPOPlUGIN_TEXTDOMAIN )
            .' (beta)',
            _x('Substitution links',  'add_menu_page page title', TPOPlUGIN_TEXTDOMAIN )
            .'<span class="update-plugins"><span class="plugin-count">beta</span></span>',
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

    /**
     * @param $post
     */
    public function tp_add_custom_box_callback($post){
        //error_log(print_r($post, true));
        $dataAutoReplacLinks = $this->model->getDataAutoReplacLinks();

        $disabled = '';
        if($dataAutoReplacLinks !== false){
            $tp_auto_replac_link = get_post_meta( $post->ID, 'tp_auto_replac_link', true );
            if(empty($tp_auto_replac_link)) {
                $tp_auto_replac_link = 0;
            }
        }else{
            $tp_auto_replac_link = 1;
            $disabled = 'disabled="disabled"';
        }

        // Используем nonce для верификации
        wp_nonce_field( TPOPlUGIN_NAME, 'tp_auto_replac_link_noncename' );
        ?>
        <fieldset>
            <legend class="screen-reader-text">
                <?php echo _x('Substitution links',  'meta_box_post', TPOPlUGIN_TEXTDOMAIN ); ?>
            </legend>
            <input type="radio" name="tp_auto_replac_link" <?php echo $disabled; ?>
                   class="tp-auto-replac-link" id="tp-auto-replac-link-0" value="0"
                    <?php checked( $tp_auto_replac_link, 0 ); ?> >
            <label for="tp-auto-replac-link-0" class="tp-auto-replac-link-icon">
                <?php _e('Enable', TPOPlUGIN_TEXTDOMAIN ); ?>
            </label>
            <br><input type="radio" name="tp_auto_replac_link"
                       class="tp-auto-replac-link" id="tp-auto-replac-link-1" value="1"
                        <?php checked( $tp_auto_replac_link, 1 ); ?>>
            <label for="tp-auto-replac-link-1" class="tp-auto-replac-link-icon">
                <?php _e('Disable', TPOPlUGIN_TEXTDOMAIN ); ?>
            </label>
        </fieldset>
        <?php
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
        if ( ! isset( $_POST['tp_auto_replac_link_noncename'] ) )
            return $post_id;
        if ( ! wp_verify_nonce( $_POST['tp_auto_replac_link_noncename'], TPOPlUGIN_NAME ) )
            return $post_id;
        if ( $post->post_status == 'auto-draft' ||
            $post->post_status == 'draft' ||
            $post->post_status == 'trash' ){
            return $post_id;
        }
        $tp_auto_replac_link = sanitize_text_field( $_POST['tp_auto_replac_link'] );
        // Обновляем данные в базе данных.
        update_post_meta( $post_id, 'tp_auto_replac_link', $tp_auto_replac_link );


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
        if(empty($data['post_content'])) return $data;

        if(isset($postarr['tp_auto_replac_link']) && $postarr['tp_auto_replac_link'] == 0){

            $dataAutoReplacLinks = $this->model->getDataAutoReplacLinks();
            foreach($dataAutoReplacLinks as $key=>$dataAutoReplacLink){
                //error_log(print_r($dataAutoReplacLink['data'], true));
                extract($dataAutoReplacLink['data']);
                foreach($dataAutoReplacLink['anchor'] as $anchor){
                    //error_log(preg_quote($anchor).'  '.$url);
                    //error_log(print_r($dataAutoReplacLink, true));
                    // (\b) (\b) Проверить
                    $data['post_content'] = preg_replace_callback(
                        '/('.preg_quote($anchor).')|(\b)(<a.*?>'.preg_quote($anchor).'<\/a>)(\b)/m',
                        function($matches) use ($anchor, $url, $nofollow, $replace, $target, $event){
                            //error_log(print_r($matches, true));
                            if(strpos($matches[0], '<a') === false){

                                /*if(isset(\app\includes\TPPlugin::$options['auto_repl_link']['not_title'])){
                                    error_log(111);
                                }else{
                                    error_log(222);
                                }*/

                                $matches[0] = '<a href="'.$url.'" '.$nofollow.' class="TPAutoLinks" '.$target
                                              .' '.$event.'>'.$anchor.'</a>';
                            } else{
                                if($replace == 1){
                                    $matches[0] = '<a href="'.$url.'" '.$nofollow.' class="TPAutoLinks" '.$target
                                                  .' '.$event.'>'.$anchor.'</a>';
                                }
                            }
                            return $matches[0];
                        },
                        //array( &$this, 'tp_preg_replace'),
                        $data['post_content'],
                        -1,//Limit replace
                        $count
                    );
                }
            }



            //error_log(print_r($count, true));
            //error_log(print_r($post_content, true));
        }
        //error_log(print_r($data, true));
        //error_log(print_r($postarr['tp_auto_replac_link'], true));
        return $data;
    }
    /*public function tp_preg_replace($matches) {

        error_log(print_r($matches, true));
        if(strpos($matches[1], '<a') === false){
            $matches[1] .= ' 444';
        } else{

        }
        return $matches[1];
    }    */


    public function renderProgressbar(){
        ?>
        <div id="TPProgressbarDialog">
            <div id="TPProgressbar">
                <div class="TPProgressbar-label">
                    <?php _e('Placing links', TPOPlUGIN_TEXTDOMAIN ); ?>...
                </div>
            </div>
        </div>
        <?php
    }

}
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


        add_action( 'admin_footer-edit.php', array( &$this, 'renderButton' ) );
        //add_filter('bulk_actions-edit-post', array( &$this, 'renderButton' ));

        add_filter('post_row_actions', array( &$this, 'renderLinkPost' ) ,10,2);
        add_filter('page_row_actions', array( &$this, 'renderLinkPost' ) ,10,2);
        add_action('wp_ajax_auto_replace_link_post_by_id',      array( &$this, 'TPAutoReplaceLinkPostById'));
        add_action('wp_ajax_nopriv_auto_replace_link_post_by_id',array( &$this, 'TPAutoReplaceLinkPostById'));
        add_action('wp_ajax_auto_replace_link_post_check_by_id',      array( &$this, 'TPAutoReplaceLinkPostCheckById'));
        add_action('wp_ajax_nopriv_auto_replace_link_post_check_by_id',array( &$this, 'TPAutoReplaceLinkPostCheckById'));
        add_action('wp_ajax_replace_all',      array( &$this, 'replaceAll'));
        add_action('wp_ajax_nopriv_replace_all',array( &$this, 'replaceAll'));

        //page

    }


    public function TPAutoReplaceLinkPostCheckById(){
        if($_POST){

            $dataAutoReplacLinks = $this->model->getDataAutoReplacLinks();
            if($dataAutoReplacLinks == false) return false;

            $posts = get_posts( array(
                'numberposts'     => -1, // тоже самое что posts_per_page
                'offset'          => 0,
                'category'        => '',
                'orderby'         => 'post_date',
                'order'           => 'DESC',
                'include'         => $_POST['id'],
                'exclude'         => '',
                'meta_key'        => '',
                'meta_value'      => '',
                'post_type'       => 'any',
                'post_mime_type'  => '', // image, video, video/mp4
                'post_parent'     => '',
                'post_status'     => 'publish'
            ) );
            foreach($posts as $post){ setup_postdata($post);
                // формат вывода
                $post->post_content =
                    $this->postContentReplaceLink($dataAutoReplacLinks, $post->post_content );


                //error_log($post->post_content );
                wp_update_post(array(
                    'ID' => $post->ID,
                    'post_content' => $post->post_content
                ));

            }

            wp_reset_postdata();
        }
    }

    /**
     * @param $actions
     */
    public function renderButton(){
        global $post_type;
        if($post_type == 'post' || $post_type == 'page'){
            ?>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                   // jQuery('<option>').val('full')
                   //     .text('1').appendTo('select[name="action"]');
                });
                jQuery('<a href="#" class="button action TPAutoReplaceLinkPostBtn">'
                    +'<?php _e('Substitution links', TPOPlUGIN_TEXTDOMAIN ); ?></a>')
                    .appendTo('.bulkactions');
            </script>
            <?php
        }
        //error_log(print_r($post_type, true));

    }

    /**
     * @param $actions
     * @param $tag
     * @return mixed
     */
    public function renderLinkPost($actions,$tag){
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

            $post['post_content'] = $this->postContentReplaceLink($dataAutoReplacLinks, $post['post_content'] );

            wp_update_post(array(
                'ID' => $post['ID'],
                'post_content' => $post['post_content']
            ));

        }
    }

    public function replaceAll(){
        if(isset($_POST)) {

            $dataAutoReplacLinks = $this->model->get_dataByArrayId($_POST['id']);
            if($dataAutoReplacLinks == false) return false;

            //error_log(print_r($this->get_dataByArrayId($_POST['id']), true));
            $posts = get_posts( array(
                'numberposts'     => -1, // тоже самое что posts_per_page
                'offset'          => 0,
                'category'        => '',
                'orderby'         => 'post_date',
                'order'           => 'DESC',
                'include'         => '',
                'exclude'         => '',
                'meta_key'        => '',
                'meta_value'      => '',
                'post_type'       => 'any',
                'post_mime_type'  => '', // image, video, video/mp4
                'post_parent'     => '',
                'post_status'     => 'publish'
            ) );
            foreach($posts as $post){ setup_postdata($post);
                // формат вывода
                //error_log(print_r($post->post_content, true));

                $post->post_content = $this->postContentReplaceLink($dataAutoReplacLinks, $post->post_content );


                //error_log($post->post_content );
                wp_update_post(array(
                    'ID' => $post->ID,
                    'post_content' => $post->post_content
                ));

            }

            wp_reset_postdata();

        }
    }


    /**
     * @param $count_anchor
     * @return array|int
     */
    public function getReplaceLimits($count_anchor){
        $limit = \app\includes\TPPlugin::$options['auto_repl_link']['limit'];
        if($limit == 0) return -1;
        if($count_anchor == 1) return (int) $limit;
        return $this->getReplaceLimitRecursive($limit, $count_anchor);

    }

    /**
     * @param $limit
     * @param $count_anchor
     * @param array $limit_array
     * @return array
     */
    public function getReplaceLimitRecursive($limit, $count_anchor, $limit_array = array()){
        if(count($limit_array) == 0) $limit_array = array_pad(array(),$count_anchor,0);
        for($i = 0; $i < $count_anchor; $i++){
            if($limit == 0) break;
            $limit_array[$i] = $limit_array[$i]+1;
            $limit--;
        }
        //error_log(print_r($limit_array, true));
        //error_log($limit);
        if($limit == 0) {
            return $limit_array;
        } else {
            return $this->getReplaceLimitRecursive($limit, $count_anchor, $limit_array);
        }
    }

    public function getReplaceLimit($limitReplace, $key){
        switch(gettype($limitReplace)){
            case "integer":
                return $limitReplace;
                break;
            case "array":
                return $limitReplace[$key];
                break;
        }
    }

    /**
     * @param $dataAutoReplacLinks
     * @param $post_content
     * @return mixed
     */
    public function postContentReplaceLink($dataAutoReplacLinks, $post_content){

        $limitReplace = $this->getReplaceLimits(count($dataAutoReplacLinks));
        //error_log($this->getReplaceLimit($limitReplace, 0));
        $key_limit = 0;
        foreach($dataAutoReplacLinks as $key=>$dataAutoReplacLink){
            //error_log(print_r($dataAutoReplacLink['data'], true));
            //error_log($key_limit);
            extract($dataAutoReplacLink['data']);
            foreach($dataAutoReplacLink['anchor'] as $anchor){
                //error_log(preg_quote($anchor).'  '.$url);
                //error_log(print_r($dataAutoReplacLink, true));
                // (\b) (\b) Проверить
                $post_content = preg_replace_callback(
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
                    $post_content,
                    $this->getReplaceLimit($limitReplace, $key_limit),//-1Limit replace
                    $count
                );
            }
            $key_limit++;
        }
        return $post_content;
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
            $data['post_content'] = $this->postContentReplaceLink($dataAutoReplacLinks, $data['post_content'] );




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
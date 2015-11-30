<?php

/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 30.11.15
 * Time: 11:02
 */
namespace app\includes\controllers\admin;
class TPModalAdminNoticeController extends \core\controllers\TPOBaseController
{
    public function __construct(){
        add_action( 'wp_footer',    array( &$this, 'render' ) );
        add_action( 'admin_footer', array( &$this, 'render' ) );
    }

    public function render()
    {
        $pathView = TPOPlUGIN_DIR."/app/includes/views/admin/TPModalAdminNotice.view.php";
        parent::loadView($pathView);
    }
}
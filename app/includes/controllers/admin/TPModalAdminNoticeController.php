<?php

/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 30.11.15
 * Time: 11:02
 */
namespace app\includes\controllers\admin;
use core\controllers\TPOBaseController;

class TPModalAdminNoticeController extends TPOBaseController
{
    public function __construct(){
        add_action( 'wp_footer',    [&$this, 'render']);
        add_action( 'admin_footer', [&$this, 'render']);
    }

    public function render()
    {
        $pathView = TPOPlUGIN_DIR. '/app/includes/views/admin/TPModalAdminNotice.view.php';
        parent::loadView($pathView);
    }
}

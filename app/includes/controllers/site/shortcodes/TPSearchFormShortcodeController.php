<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 12.08.15
 * Time: 18:27
 */
namespace app\includes\controllers\site\shortcodes;
class TPSearchFormShortcodeController extends \core\controllers\TPOShortcodesController{
    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = new \app\includes\models\site\shortcodes\TPSearchFormShortcodeModel();
    }
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_search_shortcodes', array(&$this, 'action'));
    }

    public function action($args = array())
    {
        // TODO: Implement action() method.
        $defaults = array( 'id' => false);
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $data = $this->model->get_dataId($id);
        $code_form = wp_unslash($data["code_form"]);
        if(!empty($origin)){
            $origin_text = '"origin": {
                                            "iata": "'.$origin.'"
                                        }';
            $code_form = preg_replace('/"origin": \{.*?\}/s', $origin_text, $code_form);
        }
        if(!empty($destination)){
            $destination_text = '"destination": {
                                            "iata": "'.$destination.'"
                                        }';
            $code_form = preg_replace('/"destination": \{.*?\}/s', $destination_text, $code_form);
        }
        return $this->render($code_form);
    }

    public function render($data)
    {
        // TODO: Implement render() method.
        return $data;
    }
}
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
        $defaults = array(
            'id' => false,
            'type' => 'avia',
            'origin' => false,
            'destination' => false,
            'hotel_city' => false,
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if($id == false) return;
        $data = $this->model->get_dataId($id);
        $code_form = wp_unslash($data["code_form"]);
        /*if(!empty($origin)){
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
        return $this->render($code_form);*/
        if(!empty($origin)){

        }
        switch ($type){
            case "avia":
                error_log($id);
                error_log($type);
                error_log($origin);
                error_log($destination);

                break;
            case "hotel":
                error_log($id);
                error_log($type);
                error_log($hotel_city);
                break;
            case "avia_hotel":
                error_log($id);
                error_log($type);
                error_log($hotel_city);
                error_log($origin);
                error_log($destination);
                break;
        }
        error_log("**********************");


    }

    /**
     * @param $origin
     * @param $form
     * @param bool|false $delete
     * @return mixed
     */
    public function replaceOrigin($origin, $form, $delete = false){
        if(!empty($origin)){
            $origin_text = '"origin": {
                                            "iata": "'.$origin.'"
                                        }';
            //$code_form = preg_replace('/"origin": \{.*?\}/s', $origin_text, $code_form);
        }
        error_log($origin_text);
        return $form;
    }

    /**
     * @param $destination
     * @param $form
     * @param bool|false $delete
     * @return mixed
     */
    public function replaceDestination($destination, $form, $delete = false){
        if(!empty($destination)){
            $destination_text = '"destination": {
                                            "iata": "'.$destination.'"
                                        }';
            //$code_form = preg_replace('/"destination": \{.*?\}/s', $destination_text, $code_form);
        }
        error_log($destination_text);
        return $form;
    }

    /**
     * @param $hotel_city
     * @param $form
     * @param bool|false $delete
     * @return mixed
     */
    public function replaceHotelCity($hotel_city, $form, $delete = false){
        if(!empty($hotel_city)){
            $hotel_city_text = '"destination": {
                                            "iata": "'.$hotel_city.'"
                                        }';
            //$code_form = preg_replace('/"destination": \{.*?\}/s', $destination_text, $code_form);
        }
        error_log($hotel_city_text);
        return $form;
    }

    public function render($data)
    {
        // TODO: Implement render() method.
        return $data;
    }
}
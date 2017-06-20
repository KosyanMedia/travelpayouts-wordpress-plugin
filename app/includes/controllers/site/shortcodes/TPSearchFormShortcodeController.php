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
            'slug' => false,
            'type' => 'avia',
            'origin' => false,
            'destination' => false,
            'hotel_city' => false,
            'subid' => ''
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        if ($id == false && $slug == false) return;
        if (empty($slug) || $slug == false){
            $data = $this->model->get_dataId($id);
        } else {
            $data = $this->model->getDataFromSlug($slug);
        }

        //var_dump($data);
        $code_form = wp_unslash($data["code_form"]);
        $typeForm = $this->model->getTypeForm($code_form);
        if (!empty($typeForm)) $type = $typeForm;
        //error_log($type);
        //error_log($typeForm);
        /*error_log($id);

        error_log($origin);
        error_log($destination);
        error_log($hotel_city);*/

        switch ($type){
            case "avia":
                $code_form = $this->replaceOrigin($origin, $code_form, false);
                $code_form = $this->replaceDestination($destination, $code_form, false);
                $code_form = $this->replaceHotelCity($hotel_city, $code_form, true);

                break;
            case "hotel":
                $code_form = $this->replaceOrigin($origin, $code_form, true);
                $code_form = $this->replaceDestination($destination, $code_form, true);
                $code_form = $this->replaceHotelCity($hotel_city, $code_form, false);
                break;
            case "avia_hotel":
                $code_form = $this->replaceOrigin($origin, $code_form, false);
                $code_form = $this->replaceDestination($destination, $code_form, false);
                $code_form = $this->replaceHotelCity($hotel_city, $code_form, false);
                break;
        }
        //error_log($code_form);
        $code_form = $this->getSubid($code_form, $subid);
        //error_log($code_form);
        return $this->render($code_form);


    }

    public function getSubid($form, $subid = ""){
        if(!empty($subid)){
            $subid = trim($subid);
            $subid = preg_replace('/[^a-zA-Z0-9_]/', '', $subid);
            $marker = \app\includes\TPPlugin::$options['account']['marker'];
            $marker_txt = '';
            $marker_txt = '"marker": "'.$marker.'.'.$subid.'",';
            $form = preg_replace('/"marker":.*?,/s', $marker_txt, $form);
            //error_log("getSubid ".$form);
        }
        return $form;
    }
    /**
     * @param $origin
     * @param $form
     * @param bool|false $delete
     * @return mixed
     */
    public function replaceOrigin($origin, $form, $delete = false){
        if($delete == false){
            if(!empty($origin)){
                $origin_text = '"origin": {
                                            "iata": "'.$origin.'"
                                        }';
                $form = preg_replace('/"origin": \{.*?\}/s', $origin_text, $form);
                $form = preg_replace('/"origin": \".*?\"/s', $origin_text, $form);
            }
        } else{
            $form = preg_replace('/"origin": \{.*?\}/s', '"origin": ""', $form);
        }
        return $form;
    }

    /**
     * @param $destination
     * @param $form
     * @param bool|false $delete
     * @return mixed
     */
    public function replaceDestination($destination, $form, $delete = false){
        if($delete == false) {
            if (!empty($destination)) {
                $destination_text = '"destination": {
                                                "iata": "' . $destination . '"
                                            }';
                $form = preg_replace('/"destination": \{.*?\}/s', $destination_text, $form);
                $form = preg_replace('/"destination": \".*?\"/s', $destination_text, $form);
            }
        }else{
            $form = preg_replace('/"destination": \{.*?\}/s', '"destination": ""', $form);
        }

        return $form;
    }

    /**
     * @param $hotel_city
     * @param $form
     * @param bool|false $delete
     * @return mixed
     */
    public function replaceHotelCity($hotel_city, $form, $delete = false){

        if($delete == false){
            if(!empty($hotel_city)){
                $params = explode(", ", $hotel_city);

                if(count($params) == 6){
                    //error_log(print_r($params, true));
                   // error_log($params[4]);
                    $hotel_city_text = "";
                    switch($params[4]){
                        case 'hotel':
                           // error_log('hotel11111111');
                            $hotel_city_text = '"hotel": {
                                            "name": "'.$params[0].'",
                                            "location": "'.$params[1].', '.$params[2].'",
                                            "hotels_count": "",
                                            "search_id": "'.$params[3].'",
                                            "search_type": "'.$params[4].'",
                                            "country_name": "'.$params[5].'"
                                        }';
                            break;
                        case 'city':
                            //error_log('city11111111');
                            $hotel_city_text = '"hotel": {
                                            "name": "'.$params[0].'",
                                            "location": "'.$params[1].'",
                                            "hotels_count": "'.$params[2].'",
                                            "search_id": "'.$params[3].'",
                                            "search_type": "'.$params[4].'",
                                            "country_name": "'.$params[5].'"
                                        }';
                            break;
                    }
                    //error_log('$hotel_city_text = '.$hotel_city_text);
                    $form = preg_replace('/"hotel": \{.*?\}/s', $hotel_city_text, $form);
                    $form = preg_replace('/"hotel": \".*?\"/s', $hotel_city_text, $form);
                }

            }
        }else{
            $form = preg_replace('/"hotel": \{.*?\}/s', '"hotel": ""', $form);
        }


        return $form;
    }

    public function render($data)
    {
        // TODO: Implement render() method.
        return $data;
    }
}
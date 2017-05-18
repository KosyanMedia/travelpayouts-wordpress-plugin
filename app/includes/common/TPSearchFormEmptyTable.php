<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 29.11.16
 * Time: 10:53 PM
 */

namespace app\includes\common;

use app\includes\models\admin\menu\TPSearchFormsModel;

class TPSearchFormEmptyTable
{
    public static function getSearchFormByID($id, $originIata, $destinationIata){
        //type_form
        //code_form
        $searchForm = TPSearchFormsModel::getSearchFormByID($id);
        $codeForm = wp_unslash($searchForm["code_form"]);
        return self::replace($codeForm, $originIata, $destinationIata);
    }

    public static function replace($codeForm, $originIata, $destinationIata){
        $codeForm = self::replaceOrigin($originIata, $codeForm, false);
        $codeForm = self::replaceDestination($destinationIata, $codeForm, false);
        return $codeForm;
    }


    /**
     * @param $origin
     * @param $form
     * @param bool|false $delete
     * @return mixed
     */
    public static function replaceOrigin($origin, $form, $delete = false){
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
    public static function replaceDestination($destination, $form, $delete = false){
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
}
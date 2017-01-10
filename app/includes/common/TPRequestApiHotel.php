<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 04.01.17
 * Time: 2:16 PM
 */

namespace app\includes\common;


class TPRequestApiHotel extends TPRequestApi
{
    const TP_API_URL = 'https://engine.hotellook.com/api/v2';

    public static function getApiUrl(){
        return self::TP_API_URL;
    }

    public function getHotels(){

    }

    public function getCache(){

    }

}
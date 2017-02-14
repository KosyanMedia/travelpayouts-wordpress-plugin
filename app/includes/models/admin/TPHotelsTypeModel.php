<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 14.02.17
 * Time: 3:07 PM
 */

namespace app\includes\models\admin;


use app\includes\common\TPRequestApiHotel;

class TPHotelsTypeModel
{
    protected static $TPRequestApi;
    public function __construct()
    {
        self::$TPRequestApi = TPRequestApiHotel::getInstance();
        add_action( 'wp_loaded', array( &$this, 'setHotelsType') );
    }

    public function setHotelsType(){
        $cacheKey = 'TP_Hotels_Type_Update_file';
        if ( false === ( $hotelsTypeUpdateFile = get_transient( $cacheKey ) ) ) {
            //error_log("setHotelsType");
            $hotelsType = self::$TPRequestApi->getHotelsType();
            $fileEN = TPOPlUGIN_DIR . '/app/public/hotel_types/hotelTypesEN.json';
            $fileRU = TPOPlUGIN_DIR . '/app/public/hotel_types/hotelTypesRU.json';
            if (!empty($hotelsType['en'])) {
                file_put_contents($fileEN, $hotelsType['en']);
            }
            if (!empty($hotelsType['ru'])) {
                file_put_contents($fileRU, $hotelsType['ru']);
            }
            set_transient( $cacheKey, $hotelsTypeUpdateFile, WEEK_IN_SECONDS);
        }

    }
}
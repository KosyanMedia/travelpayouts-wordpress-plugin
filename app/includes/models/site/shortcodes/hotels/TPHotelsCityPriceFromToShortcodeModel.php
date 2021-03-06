<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 19.01.17
 * Time: 5:14 PM
 */

namespace app\includes\models\site\shortcodes\hotels;

use app\includes\models\site\TPHotelShortcodeModel;
use app\includes\common\TPCurrencyUtils;

class TPHotelsCityPriceFromToShortcodeModel extends TPHotelShortcodeModel
{

    public function get_data($args = [])
    {
        // TODO: Implement get_data() method.
        $defaults = [
            'location_id' => false,
            'return_url' => false
        ];
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $attr = [
            'location_id' => $location_id,
            'return_url' => $return_url
        ];

        $cacheKey = "hotel_2_{$location_id}".(int)$return_url;
        if($this->cacheSecund()){
            if ( false === ($rows = get_transient($this->cacheKey($cacheKey)))) {

                $return = self::$TPRequestApi->getHotels($attr);
                $rows = [];
                $cacheSecund = 0;
                if( ! $return ) {
                    $rows = [];
                    $cacheSecund = $this->cacheEmptySecund();
                } else {
                    $rows = $return;
                    //$rows = $this->iataAutocomplete($rows, 13);
                    $cacheSecund = $this->cacheSecund();
                }

                set_transient( $this->cacheKey($cacheKey) , $rows, $cacheSecund);
            }
        }else{
            $return = self::$TPRequestApi->getHotels($attr);
            if( ! $return )
                return false;
            $rows = [];
            $rows = $return;
            //$rows = $this->iataAutocomplete($rows, 13);
        }
        return $rows;
    }

    public function getDataTable($args = []){
        $defaults = [
            'location_id' => false,
            'return_url' => false,
            'subid' => '',
        ];
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

        if ($return_url == 1){
            $return_url = true;
        }

        $return = $this->get_data([
            'location_id' => $location_id,
            'return_url' => $return_url
        ]);


        return [
            'rows' => $return,
            'subid' => $subid,
        ];


    }
}

<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:27
 */
namespace app\includes\models\site\shortcodes;
class TPCheapestTicketEachDayMonthShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array( 'origin' => false, 'destination' => false, 'currency' => 'RUB', 'title' => '' , 'paginate' => true
        , 'stops' => \app\includes\TPPlugin::$options['shortcodes']['5']['transplant'], 'off_title' => '', 'subid' => '');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $attr = array( 'origin' => $origin, 'destination' => $destination,
            'currency' => $this->typeCurrency());

        if($this->cacheSecund()) {
            if (false === ($rows = get_transient($this->cacheKey('5',
                    $origin.$destination)))) {
                $return = (array) \app\includes\TPPlugin::$TPRequestApi->get_calendar($attr);
                if( ! $return )
                    return false;
                $rows = array();
                $rows = $this->iataAutocomplete($this->tpSortCheapestTicketEachDayMonth($return, date('Y-m')), 5);
                set_transient( $this->cacheKey('5',
                    $origin.$destination) , $rows, $this->cacheSecund());
            }
        }else{
            $return = (array) \app\includes\TPPlugin::$TPRequestApi->get_calendar($attr);
            if( ! $return )
                return false;
            $rows = array();
            $rows = $this->iataAutocomplete($this->tpSortCheapestTicketEachDayMonth($return, date('Y-m')), 5);
        }
        $rows_sort = array();
        switch($stops){
            case 0:
                $rows_sort = $rows;
                break;
            case 1:
                foreach($rows as $value){
                    if($value['transfers'] <= 1){
                        $rows_sort[] = $value;
                    }
                }
                break;
            case 2:
                foreach($rows as $value){
                    if($value['transfers'] == 0){
                        $rows_sort[] = $value;
                    }
                }
                break;
        }

        //return var_dump("<pre>", $rows, "</pre>");
        return array('rows' => $rows_sort, 'origin' => $this->iataAutocomplete($origin, 0),
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'), 'type' => 5, 'title' => $title,
            'origin_iata' => $origin, 'destination_iata' => $destination, 'paginate' => $paginate,
            'off_title' => $off_title, 'subid' => $subid);
    }
}
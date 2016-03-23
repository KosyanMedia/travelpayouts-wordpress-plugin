<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 11:21
 */
namespace app\includes\models\site\shortcodes;
class TPDirectFlightsRouteShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        $defaults = array( 'origin' => false, 'destination' => false, 'departure_at' => false, 'return_at' => false,
            'currency' => 'RUB', 'title' => '' , 'paginate' => true,
            'off_title' => '', 'subid' => '');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $current_day = date("d",time());
        $current_month = date("m");

        $attr =  array( 'origin' => $origin, 'destination' => $destination,
            'departure_at' => date('Y-m'), 'return_at' => date('Y-m'),
            'currency' => $this->typeCurrency() );

        $attr_one =  array( 'origin' => $origin, 'destination' => $destination,
            'departure_at' => date('Y-m', mktime(0, 0, 0, $current_month + 1, 1, date("Y"))),
            'return_at' => date('Y-m', mktime(0, 0, 0, $current_month + 1, 1, date("Y"))),
            'currency' => $this->typeCurrency()  );

        $attr_two =  array( 'origin' => $origin, 'destination' => $destination,
            'departure_at' => date('Y-m', mktime(0, 0, 0, $current_month + 2, 1, date("Y"))),
            'return_at' => date('Y-m', mktime(0, 0, 0, $current_month + 2, 1, date("Y"))),
            'currency' => $this->typeCurrency()  );
        $attr_three =  array( 'origin' => $origin, 'destination' => $destination,
            'departure_at' => date('Y-m', mktime(0, 0, 0, $current_month + 3, 1, date("Y"))),
            'return_at' => date('Y-m', mktime(0, 0, 0, $current_month + 3, 1, date("Y"))),
            'currency' => $this->typeCurrency() );

        if($this->cacheSecund()) {
            if (false === ($return = get_transient($this->cacheKey('7',
                    $origin.$destination)))) {
                $return = array();
                if($current_day < 20){
                    $return_null = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr);
                    if($return_null)
                        array_push($return, $return_null[$destination][0]);
                    $return_one = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_one);
                    if($return_one)
                        array_push($return, $return_one[$destination][0]);
                    $return_two = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_two);
                    if($return_two)
                        array_push($return, $return_two[$destination][0]);
                }else{
                    $return_null = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr);
                    if($return_null)
                        array_push($return, $return_null[$destination][0]);
                    $return_one = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_one);
                    if($return_one)
                        array_push($return, $return_one[$destination][0]);
                    $return_two = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_two);
                    if($return_two)
                        array_push($return, $return_two[$destination][0]);
                    $return_three = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_three);
                    if($return_three)
                        array_push($return, $return_three[$destination][0]);
                }
                if( ! $return )
                    return false;
                $return = $this->iataAutocomplete($return, 7);
                set_transient( $this->cacheKey('7',
                    $origin.$destination) , $return, $this->cacheSecund());
            }
        }else{
            $return = array();
            if($current_day < 20){
                $return_null = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr);

                if($return_null)
                    array_push($return, $return_null[$destination][0]);
                $return_one = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_one);
                if($return_one)
                    array_push($return, $return_one[$destination][0]);
                $return_two = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_two);
                if($return_two)
                    array_push($return, $return_two[$destination][0]);
            }else{
                $return_null = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr);
                if($return_null)
                    array_push($return, $return_null[$destination][0]);
                $return_one = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_one);
                if($return_one)
                    array_push($return, $return_one[$destination][0]);
                $return_two = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_two);
                if($return_two)
                    array_push($return, $return_two[$destination][0]);
                $return_three = \app\includes\TPPlugin::$TPRequestApi->get_direct($attr_three);
                if($return_three)
                    array_push($return, $return_three[$destination][0]);
            }
            if( ! $return )
                return false;
            $return = $this->iataAutocomplete($return, 7);
        }
        return array('rows' => $return, 'type' => 7, 'origin' => $this->iataAutocomplete($origin, 0),
            'destination' => $this->iataAutocomplete($destination, 0, 'destination'), 'title' => $title,
            'origin_iata' => $origin, 'destination_iata' => $destination, 'paginate' => $paginate,
            'off_title' => $off_title, 'subid' => $subid);
    }
}
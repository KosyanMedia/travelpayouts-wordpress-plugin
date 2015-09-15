<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 10:52
 */
namespace app\includes\views\site\shortcodes;
class TPShortcodesView {
    public $local;
    public function __construct() {
        add_action( 'wp', array( &$this, 'redirect_plugins') );
        add_filter( 'human_time_diff', array( &$this, 'tpHumanTimeDiff') , 10, 4);
        switch (\app\includes\TPPlugin::$options['local']['localization']){
            case 1:
                $this->local = 'ru';
                break;
            case 2:
                $this->local = 'en';
                break;
        }
    }
    /**
     * @param array $args
     * @return string
     */
    public function tpReturnOutputTable($args = array()){
        $defaults = array( 'rows' => array(), 'type' => null, 'origin' => '', 'destination' => '', 'airline' => '',
            'title' => '', 'limit' => '', 'origin_iata' => '', 'destination_iata' => '', 'paginate' => 'false');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $output = '';
        $sortable_class = '';
        if(count($rows) > 1)
            $sortable_class = 'sortable';
        $title = $this ->returnTitle($title, $type, $origin, $destination, $airline);
        $output .= '<div class="table-container">
                        <div class="table-section">
                            '.$title.'
                            <table class="w-table display '.$sortable_class.'"
                                data-paginate="'.$paginate.'"
                                data-paginate_limit="'.\app\includes\TPPlugin::$options['shortcodes'][$type]['paginate'].'">
                                <thead>
                                    <tr>';
        foreach(\app\includes\TPPlugin::$options['shortcodes'][$type]['selected'] as $key=>$selected_field){
            $class_sort = "";
            if($key == 0)
                $class_sort = "TPTableTbodyTdSort";
            switch($selected_field) {
                //Дата вылета
                case "departure_at":
                    //Дата возвращения
                case "return_at":
                    $output .= '<td class="TPTableHead ' . $class_sort . ' tp-date-column">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                //Дата поиска
                case "found_at":
                    $output .= '<td class="TPTableHead ' . $class_sort . ' tp-found-column">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                case "price":
                    $output .= '<td class="TPTableHead ' . $class_sort . ' tp-price-column">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                case 'place':
                    $output .= '<td class="TPTableHead ' . $class_sort . ' TPPlaceTD">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                case 'direction':
                    $output .= '<td class="TPTableHead ' . $class_sort . ' TPDirectionTD">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                case 'airline_logo':
                    $output .= '<td class="TPTableHead ' . $class_sort . ' TPAirlineLogoTD">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                case 'button':
                    $output .= '<td class="TPTableHead ' . $class_sort . ' TPAirlineLogoTD">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                default:
                    $output .= '<td class="TPTableHead ' . $class_sort . '">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
            }
        }

        $output .= '</tr>
                                </thead>
                                <tbody>';
        $count_row = 0;
        $buttonOnOff = in_array('button', \app\includes\TPPlugin::$options['shortcodes'][$type]['selected']);
        error_log(print_r(\app\includes\TPPlugin::$options['shortcodes'][$type]['selected'], true));
        error_log(print_r($buttonOnOff, true));
        foreach($rows as $key_row => $row){
            $count_row++;
            $output .= '<tr class="TPTableTbodyTr">';
            $count = 0;
            foreach(\app\includes\TPPlugin::$options['shortcodes'][$type]['selected'] as $key=>$selected_field){
                $button = "";
                $count++;
                /*
                 * Buttton
                 */
                if($count == count(\app\includes\TPPlugin::$options['shortcodes'][$type]['selected']) && !$buttonOnOff){
                    switch($type){
                        case 1:
                            $button = $this->return_link(array(
                                'origin' => $origin_iata,
                                'destination' => $destination_iata,
                                'departure_at' => $row['depart_date'],
                                //'return_at' => $row['return_date'],
                                'price' => number_format($row["value"], 0, '.', ' '),
                                'type' => $type
                            ) );
                            break;
                        case 2:
                            $button = $this->return_link(array(
                                'origin' => $origin_iata,
                                'destination' => $destination_iata,
                                'departure_at' => $row['depart_date'],
                                'return_at' => $row['return_date'],
                                'price' => number_format($row["value"], 0, '.', ' '),
                                'type' => $type
                            ) );
                            break;
                        case 8:
                            $citys = explode( '-', $key_row );
                            $button = $this->return_link(array(
                                'origin' => $origin_iata,
                                'destination' => $key_row,
                                'price' => number_format($row["price"], 0, '.', ' '),
                                'type' => $type
                            ) );
                            break;
                        case 9:
                            $button = $this->return_link(array(
                                'origin' => $origin_iata,
                                'destination' => $row['destination_iata'],
                                'departure_at' => $row['departure_at'],
                                'return_at' => $row['return_at'],
                                'price' => number_format($row["price"], 0, '.', ' '),
                                'type' => $type
                            ) );
                            break;
                        case 10:
                            $citys = explode( '-', $key_row );
                            $button = $this->return_link(array(
                                'origin' => $citys[0],
                                'destination' => $citys[1],
                                'departure_at' => date('Y-m-d', time() + DAY_IN_SECONDS),
                                'price' => '',//[tp_popular_destinations_airlines_shortcodes airline=SU title="" limit=6]
                                'type' => $type
                            ) );
                            break;
                        case 12:
                        case 13:
                        case 14:
                            $button = $this->return_link(array(
                                'origin' => $row['origin_iata'],
                                'destination' => $row['destination_iata'],
                                'departure_at' => $row['depart_date'],
                                'return_at' => $row['return_date'],
                                'price' => number_format($row["value"], 0, '.', ' '),
                                'type' => $type
                            ) );

                            break;
                        default:
                            $button = $this->return_link(array(
                                'origin' => $origin_iata,
                                'destination' => $destination_iata,
                                'departure_at' => $row['departure_at'],
                                'return_at' => $row['return_at'],
                                'price' => number_format($row["price"], 0, '.', ' '),
                                'type' => $type
                            ) );
                    }

                }
                /*
                 * Fields
                 */
                switch($selected_field){
                    //Номер рейса
                    case "flight_number":
                        $output .= '<td class="TPTableTbodyTd TPFlightNumberTD"><p>' . $row['airline'].' '. $row[$selected_field].'</p>'.
                            $button.'</td>';
                        break;
                    //Рейс
                    case "flight":
                        $output .= '<td class="TPTableTbodyTd"><p  data-airline-iata="'.$row['airline'].'">' .
                            $row['airline'].'</p><span>('. $row['airline'].' '.
                            $row['flight_number'].')</span>'.$button.'</td>';
                        break;
                    //Дата вылета
                    case "departure_at":
                        switch($type){
                            case 1:
                            case 2:
                            case 12:
                            case 13:
                            case 14:
                                $output .= '<td class="TPTableTbodyTd TPDateTD"><p data-tptime="'.strtotime(  $row['depart_date'] ).'">'
                                    .$this->tpDate(strtotime(  $row['depart_date'] ))
                                    .'</p>'.$button.'</td>';
                                break;
                            default:
                                $output .= '<td class="TPTableTbodyTd TPDateTD"><p data-tptime="'.strtotime(  $row[$selected_field] ).'">'
                                    .$this->tpDate(strtotime(  $row[$selected_field] ))
                                    .'</p>'.$button.'</td>';
                                break;

                        }
                        break;
                    //Дата возвращения
                    case "return_at":
                        switch($type){
                            case 1:
                            case 2:
                            case 12:
                            case 13:
                            case 14:
                                $output .= '<td class="TPTableTbodyTd TPDateTD"><p data-tptime="'.strtotime(  $row['return_date'] ).'">'
                                    .$this->tpDate(strtotime(  $row['return_date'] ))
                                    .'</p>'.$button.'</td>';
                                break;
                            default:
                                $output .= '<td class="TPTableTbodyTd TPDateTD"><p data-tptime="'.strtotime(  $row[$selected_field] ).'">'
                                    .$this->tpDate(strtotime(  $row[$selected_field] ))
                                    .'</p>'.$button.'</td>';
                                break;

                        }
                        break;
                    //Количество пересадок
                    case "number_of_changes":
                        switch($type){
                            case 4:
                                $output .= '<td class="TPTableTbodyTd"><p>'
                                    .$this->tpNumberChangesView(substr($key_row, -1))
                                    .'</p>'.$button.'</td>';
                                break;
                            case 5:
                            case 6:
                                $output .= '<td class="TPTableTbodyTd"><p>'
                                    . $this->tpNumberChangesView($row["transfers"])
                                    .'</p>'.$button.'</td>';
                                break;
                            default:
                                $output .= '<td class="TPTableTbodyTd"><p>'
                                    . $this->tpNumberChangesView($row[$selected_field])
                                    .'</p>'.$button.'</td>';
                        }
                        break;
                    //Стоимость
                    case "price":
                        switch($type) {
                            case 1:
                                $output .= '<td class="TPTableTbodyTd"><p data-price="'.$row["value"].'">'
                                    . number_format($row["value"], 0, '.', ' ') .
                                    $this->currencyView() . '</p>' . $button . '</td>';
                                break;
                            case 2:
                                $output .= '<td class="TPTableTbodyTd"><p data-price="'.$row["value"].'">'
                                    . number_format($row["value"], 0, '.', ' ') .
                                    $this->currencyView() . '</p>' . $button . '</td>';
                                break;
                            case 12:
                            case 13:
                            case 14:
                                $output .= '<td class="TPTableTbodyTd"><p data-price="'.$row["value"].'">'
                                    . number_format($row["value"], 0, '.', ' ') .
                                    $this->currencyView() . '</p>' . $button . '</td>';
                                break;
                            default:
                                $output .= '<td class="TPTableTbodyTd"><p data-price="'.$row[$selected_field].'">'
                                    . number_format($row[$selected_field], 0, '.', ' ') .
                                    $this->currencyView() . '</p>' . $button . '</td>';
                        }
                        break;
                    //Авиакомпания
                    case "airline":
                        $output .= '<td class="TPTableTbodyTd"><p data-airline-iata="'.$row[$selected_field].'">' .
                            $row[$selected_field].'</p>'.$button.'</td>';
                        break;
                    //Лого авиакомпании
                    case "airline_logo":
                        $output .= '<td class="TPTableTbodyTd">
                                                                        <img src="http://pics.avs.io/'.\app\includes\TPPlugin::$options['config']['airline_logo_size']['width']
                            .'/'.\app\includes\TPPlugin::$options['config']['airline_logo_size']['height'].'/'.$row["airline_img"].'@2x.png">
                                                                        '.$button.
                            '</td>';
                        break;
                    //Откуда
                    case "origin":
                        $output .= '<td class="TPTableTbodyTd"><p><span data-city-iata="'.$row[$selected_field].'">'.
                            $row[$selected_field].'</span></p>'.$button.'</td>';
                        break;
                    //Куда
                    case "destination":
                        switch($type){
                            case 8:
                                $output .= '<td class="TPTableTbodyTd"><p><span data-city-iata="'.$key_row.'">'.
                                    $row['city'].'</span></p>'.$button.'</td>';
                                break;
                            case 9:
                            case 12:
                            case 13:
                            case 14:
                                $output .= '<td class="TPTableTbodyTd"><p><span data-city-iata="'.$row[$selected_field].'">'.
                                    $row[$selected_field].'</span></p>'.$button.'</td>';
                                break;
                            default:
                                $output .= '<td class="TPTableTbodyTd"><p><span data-city-iata="'.$destination.'">'.
                                    $destination.'</span></p>'.$button.'</td>';
                        }
                        break;
                    //Место
                    case "place":
                        $output .= '<td class="TPTableTbodyTd TPPlaceTD"><p>'.$count_row.'</p>'.$button.'</td>';
                        break;
                    //Направление
                    case "direction":
                        //$citys = explode( '-', $key_row );
                        $output .= '<td class="TPTableTbodyTd TPDirectionTD"><p>
                            <span>'.$row.'</span></p>'.$button.'</td>';
                        break;
                    //Класс перелета
                    case "trip_class":
                        $output .= '<td class="TPTableTbodyTd"><p>'.
                            $this->returnTripClass($row[$selected_field]).'</p>'.
                            $button.'</td>';
                        break;
                    //Расстояние
                    case "distance":
                        $output .= '<td class="TPTableTbodyTd"><p>'.$this->tpDistanceView($row[$selected_field])
                            .'</p>'.$button.'</td>';
                        break;
                    //Цена за километр
                    case "price_distance":
                        $output .= '<td class="TPTableTbodyTd"><p data-price="'.$row["value"]/$row['distance'].'">'
                            . number_format($row["value"]/$row['distance'], 0, '.', ' ') .
                            $this->currencyView() . '</p>' . $button . '</td>';
                        break;
                    //Дата поиска
                    case "found_at":
                        $output .= '<td class="TPTableTbodyTd"><p data-tptime="'.strtotime(  $row[$selected_field] ).'"
                                                            data-tpctime="'.current_time('timestamp').'"">'
                            .human_time_diff(strtotime(  $row[$selected_field] ), current_time('timestamp'))
                            .'</p>'.$button.'</td>';
                        break;
                    case "button":
                        $buttonShow = '';
                        switch($type){
                            case 1:
                                $buttonShow = $this->return_link(array(
                                    'origin' => $origin_iata,
                                    'destination' => $destination_iata,
                                    'departure_at' => $row['depart_date'],
                                    //'return_at' => $row['return_date'],
                                    'price' => number_format($row["value"], 0, '.', ' '),
                                    'type' => $type
                                ), 1 );
                                break;
                            case 2:
                                $buttonShow = $this->return_link(array(
                                    'origin' => $origin_iata,
                                    'destination' => $destination_iata,
                                    'departure_at' => $row['depart_date'],
                                    'return_at' => $row['return_date'],
                                    'price' => number_format($row["value"], 0, '.', ' '),
                                    'type' => $type
                                ), 1  );
                                break;
                            case 8:
                                $citys = explode( '-', $key_row );
                                $buttonShow = $this->return_link(array(
                                    'origin' => $origin_iata,
                                    'destination' => $key_row,
                                    'price' => number_format($row["price"], 0, '.', ' '),
                                    'type' => $type
                                ), 1  );
                                break;
                            case 9:
                                $buttonShow = $this->return_link(array(
                                    'origin' => $origin_iata,
                                    'destination' => $row['destination_iata'],
                                    'departure_at' => $row['departure_at'],
                                    'return_at' => $row['return_at'],
                                    'price' => number_format($row["price"], 0, '.', ' '),
                                    'type' => $type
                                ), 1  );
                                break;
                            case 10:
                                $citys = explode( '-', $key_row );
                                $buttonShow = $this->return_link(array(
                                    'origin' => $citys[0],
                                    'destination' => $citys[1],
                                    'departure_at' => date('Y-m-d', time() + DAY_IN_SECONDS),
                                    'price' => '',//[tp_popular_destinations_airlines_shortcodes airline=SU title="" limit=6]
                                    'type' => $type
                                ), 1  );
                                break;
                            case 12:
                            case 13:
                            case 14:
                                $buttonShow = $this->return_link(array(
                                    'origin' => $row['origin_iata'],
                                    'destination' => $row['destination_iata'],
                                    'departure_at' => $row['depart_date'],
                                    'return_at' => $row['return_date'],
                                    'price' => number_format($row["value"], 0, '.', ' '),
                                    'type' => $type
                                ) , 1 );

                                break;
                            default:
                                $buttonShow = $this->return_link(array(
                                    'origin' => $origin_iata,
                                    'destination' => $destination_iata,
                                    'departure_at' => $row['departure_at'],
                                    'return_at' => $row['return_at'],
                                    'price' => number_format($row["price"], 0, '.', ' '),
                                    'type' => $type
                                ) , 1 );
                        }
                        $output .= '<td class="TPTableTbodyTd">'.$buttonShow.'</td>';
                        break;
                }
            }

            $output .= '</tr>';
            if(!empty($limit)){
                if($limit == $count_row){
                    break;
                }
            }
        }
        $output .= '            </tbody>
                            </table>
                        </div>
                    </div>';
        //ob_end_clean ();
        return $output;
    }

    /**
     * @param $numberChanges
     * @return string
     */
    public function tpNumberChangesView($numberChanges){
        switch($numberChanges){
            case 0:
                switch(\app\includes\TPPlugin::$options['local']['localization']){
                    case 1:
                        $numberChanges = "Без пересадок";
                        break;
                    case 2:
                        $numberChanges = "Direct";
                        break;
                }
                break;
            case 1:
                switch(\app\includes\TPPlugin::$options['local']['localization']){
                    case 1:
                        $numberChanges = $numberChanges." пересадка";
                        break;
                    case 2:
                        $numberChanges = $numberChanges." stop";
                        break;
                }
                break;
            case 2:
                switch(\app\includes\TPPlugin::$options['local']['localization']){
                    case 1:
                        $numberChanges = $numberChanges." пересадки";
                        break;
                    case 2:
                        $numberChanges = $numberChanges." stops";
                        break;
                }
                break;
        }
        return $numberChanges;
    }
    /**
     * @param int $distance
     * @return int
     */
    public function tpDistanceView($distance = 0){
        switch(\app\includes\TPPlugin::$options['config']['distance']){
            case 1:
                switch(\app\includes\TPPlugin::$options['local']['localization']){
                    case 1:
                        $distance = $distance." км";
                        break;
                    case 2:
                        $distance = $distance." km";
                        break;
                }
                break;
            case 2:
                switch(\app\includes\TPPlugin::$options['local']['localization']){
                    case 1:
                        $distance = ($distance * 0.62137)." м";
                        break;
                    case 2:
                        $distance = ($distance * 0.62137)." m";
                        break;
                }
                break;
        }
        return $distance;
    }
    /**
     * return Trip Class
     * @param $trip_class
     */
    public function returnTripClass($trip_class){
        $class = '';
        switch (\app\includes\TPPlugin::$options['local']['localization']){
            case 1:
                switch($trip_class){
                    case "0":
                        $class = "Эконом";
                        break;
                    case "1":
                        $class = "Бизнес";
                        break;
                    case "2":
                        $class = "Первый";
                        break;
                }
                break;
            case 2:
                switch($trip_class){
                    case "0":
                        $class = "Economy";
                        break;
                    case "1":
                        $class = "Business";
                        break;
                    case "2":
                        $class = "First";
                        break;
                }
                break;
        }

        return $class;
    }
    /**
     * Title
     * @param $title
     * @param $type
     * @param $origin
     * @param $destination
     * @param $airline
     * @return mixed
     */
    public function returnTitle($title, $type, $origin, $destination, $airline){
        if(empty($title)) {
            $title = \app\includes\TPPlugin::$options['shortcodes'][$type]['title'][$this->local];
            if(\app\includes\TPPlugin::$options['local']['title_case']['destination'] == 'vi'){
                $title = str_replace('в destination', 'destination', $title);
            }
        }
        if(!empty($title)){
            if(empty($airline)){
                switch(\app\includes\TPPlugin::$options['local']['localization']){
                    case "1":
                        if(strpos($title, 'origin') !== false){
                            $title = str_replace('origin', '<span data-title-case-origin-iata="'.$origin.'">'.$origin.'</span>' , $title);
                        }
                        if(strpos($title, 'destination') !== false){
                            $title = str_replace('destination', '<span data-title-case-destination-iata="'.$destination.'">'.$destination.'</span>', $title);
                        }
                        break;
                    case "2":
                        if(strpos($title, 'origin') !== false){
                            $title = str_replace('origin', '<span data-city-iata="'.$origin.'">'.$origin.'</span>' , $title);
                        }
                        if(strpos($title, 'destination') !== false){
                            $title = str_replace('destination', '<span data-city-iata="'.$destination.'">'.$destination.'</span>', $title);
                        }
                        break;
                }
            }else{
                if(strpos($title, 'airline') !== false){
                    $title = str_replace('airline', '<span data-airline-iata="'.$airline.'">'.$airline.'</span>' , $title);
                }
            }
        }
        return '<'.\app\includes\TPPlugin::$options['shortcodes'][$type]['tag'].' class="TP-TitleTablezs">'.$title.'</'.\app\includes\TPPlugin::$options['shortcodes'][$type]['tag'].'>';

    }

    /**
     * Link
     * @param array $args
     * @return string
     */
    public function return_link($args = array(), $type = 0){
        $defaults = array( 'origin' => false, 'destination' => false, 'departure_at' => false, 'return_at' => false,
            'link_text' => '', 'price' => '');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $link_text = "<span>".\app\includes\TPPlugin::$options['shortcodes'][$type]['title_button'][$this->local]."</span>";
        if(!empty($link_text)){
            if(strpos($link_text, 'price') !== false){
                $link_text = str_replace('price', $price, $link_text);
                $link_text .= $this->currencyView();
            }
        }
        $white_label = \app\includes\TPPlugin::$options['account']['white_label'];
        if(!empty($white_label)){
            if(strpos($white_label, 'http') === false){
                $white_label = 'http://'.$white_label;
            }
        }
        if( ! $white_label || empty( $white_label ) ){
            switch (\app\includes\TPPlugin::$options['local']['localization']){
                case 1:
                    $white_label = 'http://engine.aviasales.ru';
                    break;
                case 2:
                    $white_label = 'http://jetradar.com';
                    break;
            }
        }
        $marker = \app\includes\TPPlugin::$options['account']['marker'];
        $marker = '&marker='.$marker;
        if(!empty(\app\includes\TPPlugin::$options['account']['extra_marker']))
            $marker = $marker .'.'.\app\includes\TPPlugin::$options['account']['extra_marker'];
        if(!empty(\app\includes\TPPlugin::$options['shortcodes'][$type]['extra_table_marker']))
            $marker = $marker.'_'.\app\includes\TPPlugin::$options['shortcodes'][$type]['extra_table_marker'];
        $marker = $marker.'.$69';
        if( (int) \app\includes\TPPlugin::$options['config']['after_url'] == 1 )
            $marker = $marker . '&with_request=true';
        $rel = '';
        if(isset(\app\includes\TPPlugin::$options['config']['nofollow'])) $rel ='rel="nofollow"';
        $target_url = '';
        if(isset(\app\includes\TPPlugin::$options['config']['target_url'])) $target_url ='target="_blank"';
        $redirect = false;
        if(isset(\app\includes\TPPlugin::$options['config']['redirect'])){
            $redirect = true;
        }


        $origin = ( false !== $origin ) ? "?origin_iata={$origin}" : "?origin_iata=";
        $destination = ( false !== $destination ) ? "&destination_iata={$destination}" : "&destination_iata=";
        $departure_at = ( false !== $departure_at ) ? '&depart_date='.date('Y-m-d', strtotime( $departure_at ))  : "";
        $return_at = ( false !== $return_at ) ? '&return_date='.date('Y-m-d', strtotime( $return_at ) )  : "";


        $url = '/searches/new'.$origin.$destination.$departure_at.$return_at.$marker;
        switch($type){
            case 1:
            case 10:
            $url .= '&one_way=true';
                break;
        }
        $link = '';
        if($redirect){
            $home = '';
            $home = get_option('home');
            $url = substr($url, 10);
            //urldecode()
            switch($type){
                case 0:
                    $link = '<a class="btn-table" href="'.$home.'/?searches='.rawurlencode($url).'" '.$target_url.' '.$rel.'>'
                        .$link_text.'</a>';
                    break;
                case 1:
                    $link = '<a class="btn-tableShow" href="'.$home.'/?searches='.rawurlencode($url).'" '.$target_url.' '.$rel.'>'
                        .$link_text.'</a>';
                    break;
            }

        }else{
            switch($type){
                case 0:
                    $link = '<a class="btn-table" href="'.$white_label.$url.'" '.$target_url.' '.$rel.'>'.$link_text.'</a>';
                    break;
                case 1:
                    $link = '<a class="btn-tableShow" href="'.$white_label.$url.'" '.$target_url.' '.$rel.'>'.$link_text.'</a>';
                    break;
            }

        }
        return $link;
    }
    /**
     * @return string
     */
    public function currencyView(){
        switch(\app\includes\TPPlugin::$options['local']['currency']){
            case "1":
                $currency = '<i class="TPCurrencyIco" >i</i>';

                break;
            case "2":
                $currency = '<i class="TPCurrencyIco">$</i>';//&#8364;
                break;
            case "3":
                $currency = '<i class="TPCurrencyIco">€</i>';//&#8364;
                break;

        }
        return $currency;
    }

    /**
     * @param $currency
     * @return string
     */
    public function getCurrencyView($currency){
        switch($currency){
            case "RUB":
            case "rub":
                $currency = '<i class="TPCurrencyIco" >i</i>';
                break;
            case "USD":
            case "usd":
                $currency = '<i class="TPCurrencyIco">$</i>';
                break;
            case "EUR":
            case "eur":
                $currency = '<i class="TPCurrencyIco">€</i>';//&#8364;
                break;
        }
        return $currency;
    }

    /**
     * @param string $time
     * @return bool|string
     */
    public function tpDate($time = "") {
        $format = (!empty(\app\includes\TPPlugin::$options['config']['format_date'])) ? \app\includes\TPPlugin::$options['config']['format_date'] : "d.m.Y";
        $translate = array(
            "am" => "дп",
            "pm" => "пп",
            "AM" => "ДП",
            "PM" => "ПП",
            "Monday" => "Понедельник",
            "Mon" => "Пн",
            "Tuesday" => "Вторник",
            "Tue" => "Вт",
            "Wednesday" => "Среда",
            "Wed" => "Ср",
            "Thursday" => "Четверг",
            "Thu" => "Чт",
            "Friday" => "Пятница",
            "Fri" => "Пт",
            "Saturday" => "Суббота",
            "Sat" => "Сб",
            "Sunday" => "Воскресенье",
            "Sun" => "Вс",
            "January" => "Января",
            "Jan" => "Янв",
            "February" => "Февраля",
            "Feb" => "Фев",
            "March" => "Марта",
            "Mar" => "Мар",
            "April" => "Апреля",
            "Apr" => "Апр",
            "May" => "Мая",
            "May" => "Мая",
            "June" => "Июня",
            "Jun" => "Июн",
            "July" => "Июля",
            "Jul" => "Июл",
            "August" => "Августа",
            "Aug" => "Авг",
            "September" => "Сентября",
            "Sep" => "Сен",
            "October" => "Октября",
            "Oct" => "Окт",
            "November" => "Ноября",
            "Nov" => "Ноя",
            "December" => "Декабря",
            "Dec" => "Дек",
            "st" => "ое",
            "nd" => "ое",
            "rd" => "е",
            "th" => "ое"
        );
        switch(\app\includes\TPPlugin::$options['local']['localization']) {
            case 1:

                if (!empty($time)) {
                    if(strpos($format, 'f') !== false){
                        $format = str_replace("f", "F", $format);
                        return  mb_strtolower(strtr(date($format, $time), $translate));
                    }elseif(strpos($format, 'mm') !== false){
                        $format = str_replace("mm", "M", $format);
                        return  mb_strtolower(strtr(date($format, $time), $translate));
                    }else{
                        return strtr(date($format, $time), $translate);
                    }

                } else {
                    if(strpos($format, 'f') !== false){
                        $format = str_replace("f", "F", $format);
                        return  mb_strtolower(strtr(date($format), $translate));
                    }elseif(strpos($format, 'mm') !== false){
                        $format = str_replace("mm", "M", $format);
                        return  mb_strtolower(strtr(date($format), $translate));
                    }else{
                        return strtr(date($format), $translate);
                    }
                }
                break;
            case 2:
                if (!empty($time)) {
                    return date($format, $time);
                } else {
                    return date($format);
                }
                break;
        }
    }
    /** **/
    public function redirect_plugins(){
        $redirect = false;
        if(isset(\app\includes\TPPlugin::$options['config']['redirect']))
            $redirect = true;
        if($redirect){
            if(isset($_GET['searches'])){
                $white_label = \app\includes\TPPlugin::$options['account']['white_label'];
                if(!empty($white_label)){
                    if(strpos($white_label, 'http') === false){
                        $white_label = 'http://'.$white_label;
                    }
                }else{
                    switch (\app\includes\TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'http://engine.aviasales.ru';
                            break;
                        case 2:
                            $white_label = 'http://jetradar.com';
                            break;
                    }
                }
                $white_label = "{$white_label}/searches/".urldecode($_GET['searches']);
                header("Location: {$white_label}", true, 302);
                /*
                 * wp_redirect($white_label.'/searches/'.urldecode($_GET['searches']));
                 * problem
                 * $location = wp_sanitize_redirect($location);
                 * delete marker special symbol.
                 */
            }
        }
    }
    /**
     * @param $since
     * @param $diff
     * @param $from
     * @param $to
     * @return string
     */
    public function tpHumanTimeDiff($since, $diff, $from, $to) {
        switch(\app\includes\TPPlugin::$options['local']['localization']){
            case 1:
                $seconds = array( 'секунда', 'секунды', 'секунд' );
                $minutes = array( 'минута', 'минуты', 'минут' );
                $hours   = array( 'час', 'часа', 'часов' );
                $days    = array( 'день', 'дня', 'дней' );
                $weeks   = array( 'неделя', 'недели', 'недель' );
                $months  = array( 'месяц', 'месяца', 'месяцев' );
                $years   = array( 'год', 'года', 'лет' );
                break;
            case 2:
                $seconds = array( 'second', 'seconds');
                $minutes = array( 'minute', 'minutes');
                $hours   = array( 'hour', 'hours' );
                $days    = array( 'day', 'days' );
                $weeks   = array( 'week', 'weeks');
                $months  = array( 'month', 'months');
                $years   = array( 'year', 'years' );
                break;
        }

        $phrase = array( $seconds, $minutes, $hours, $days, $weeks, $months, $years);


        if ( $diff < HOUR_IN_SECONDS ) {
            $mins = round( $diff / MINUTE_IN_SECONDS );
            if ( $mins <= 1 )
                $mins = 1;
            $since = sprintf( '%s '.$this->getPhrase($mins, $phrase[1]), $mins );
        } elseif ( $diff < DAY_IN_SECONDS && $diff >= HOUR_IN_SECONDS ) {
            $hours = round( $diff / HOUR_IN_SECONDS );
            if ( $hours <= 1 )
                $hours = 1;
            $since = sprintf( '%s '.$this->getPhrase($hours, $phrase[2]), $hours );
            //$since = sprintf( _n( '%s hour', '%s hours', $hours ), $hours );
        } elseif ( $diff < WEEK_IN_SECONDS && $diff >= DAY_IN_SECONDS ) {
            $days = round( $diff / DAY_IN_SECONDS );
            if ( $days <= 1 )
                $days = 1;
            $since = sprintf( '%s '.$this->getPhrase($days, $phrase[3]), $days );
            //$since = sprintf( _n( '%s day', '%s days', $days ), $days );
        } elseif ( $diff < 30 * DAY_IN_SECONDS && $diff >= WEEK_IN_SECONDS ) {
            $weeks = round( $diff / WEEK_IN_SECONDS );
            if ( $weeks <= 1 )
                $weeks = 1;
            $since = sprintf( '%s '.$this->getPhrase($weeks, $phrase[4]), $weeks );
            //$since = sprintf( _n( '%s week', '%s weeks', $weeks ), $weeks );
        } elseif ( $diff < YEAR_IN_SECONDS && $diff >= 30 * DAY_IN_SECONDS ) {
            $months = round( $diff / ( 30 * DAY_IN_SECONDS ) );
            if ( $months <= 1 )
                $months = 1;
            $since = sprintf( '%s '.$this->getPhrase($months, $phrase[5]), $months );
            //$since = sprintf( _n( '%s month', '%s months', $months ), $months );
        } elseif ( $diff >= YEAR_IN_SECONDS ) {
            $years = round( $diff / YEAR_IN_SECONDS );
            if ( $years <= 1 )
                $years = 1;
            $since = sprintf( '%s '.$this->getPhrase($years, $phrase[6]), $years );
            //$since = sprintf( _n( '%s year', '%s years', $years ), $years );
        }
        switch(\app\includes\TPPlugin::$options['local']['localization']) {
            case 1:
                return $since." назад";
                break;
            case 2:
                return $since." ago";
                break;
        }

    }

    /**
     * @param $number
     * @param $titles
     * @return mixed
     */
    public function getPhrase( $number, $titles ) {
        $cases = array( 2, 0, 1, 1, 1, 2 );
        switch(\app\includes\TPPlugin::$options['local']['localization']) {
            case 1:
                return $titles[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];
                break;
            case 2:
                return ($number == 1) ? $titles[0] : $titles[1];
                break;
        }
    }

}
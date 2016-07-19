<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 11.11.15
 * Time: 8:23
 */

namespace app\includes\views\site\shortcodes;


class TPShortcodeView {
    public $local;
    public function __construct()
    {
        add_action('wp', array(&$this, 'redirect_plugins'));
        switch (\app\includes\TPPlugin::$options['local']['localization']){
            case 1:
                $this->local = 'ru';
                break;
            case 2:
                $this->local = 'en';
                break;
        }
        \app\includes\models\site\TPAutocomplete::getInstance();
    }

    public function renderPrice($price, $currency){
        return '<span class="TPPriceSpan">'.number_format($price, 0, '.', ' ').$this->currencyView($currency).'</span>';
    }
    /**
     * @param array $args
     * @return bool|string
     */
    public function renderTable($args = array()) {
        $defaults = array(
            'rows' => array(),
            'type' => null,
            'origin' => '',
            'destination' => '',
            'airline' => '',
            'title' => '',
            'limit' => '',
            'origin_iata' => '',
            'destination_iata' => '',
            'paginate' => 'false',
            'one_way' => 'false',
            'off_title' => '',
            'subid' => '',
            'currency' => \app\includes\TPPlugin::$options['local']['currency']
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        //error_log('currency = '.$currency);
        $html = '';
        if(count($rows) < 1) return false;

        if($one_way === 'false'){
            $sort_column = \app\includes\TPPlugin::$options['shortcodes'][$type]['sort_column'];
        }else{
            $sort_column = \app\includes\TPPlugin::$options['shortcodes'][$type]['sort_column'];
            if($sort_column == count(\app\includes\TPPlugin::$options['shortcodes'][$type]['selected']) - 1){
                --$sort_column;
            }
        }

        $html .= '<div class="TP-Plugin-Tables_wrapper clearfix">
                    '.$this->renderTitleTable($off_title, $title, $type, $origin, $destination, $airline).'
                    <table class="TPTableShortcode TP-Plugin-Tables_box  TP-rwd-table TP-rwd-table-avio"
                        data-paginate="'.$paginate.'"
                        data-paginate_limit="'.\app\includes\TPPlugin::$options['shortcodes'][$type]['paginate'].'"
                        data-sort_column="'.$sort_column.'">
                        '.$this->renderHeadTable($type, $one_way).'
                        '.$this->renderBodyTable($type, $one_way, $rows, $origin_iata, $destination_iata, $origin, $destination, $limit, $subid, $currency).'
                    </table>
                </div>';
        return $html;
    }

    /**
     * @param $off_title
     * @param $title
     * @param $type
     * @param $origin
     * @param $destination
     * @param $airline
     * @return mixed
     */
    public function renderTitleTable($off_title, $title, $type, $origin, $destination, $airline){
        if($off_title !== 'true'){
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
            return '<'.\app\includes\TPPlugin::$options['shortcodes'][$type]['tag'].' class="TP-TitleTables">'.$title.'</'.\app\includes\TPPlugin::$options['shortcodes'][$type]['tag'].'>';
        }
        return '';

    }

    /**
     * @param $type
     * @return string
     */
    public function renderHeadTable($type, $one_way){

        $headTable = '';



        $headTable .= '<thead class="TP-Plugin-Tables_box_thead"><tr>';
        foreach(\app\includes\TPPlugin::$options['shortcodes'][$type]['selected'] as $key=>$selected_field){
            switch($selected_field) {
                //Дата вылета
                case "departure_at":
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead tp-date-column">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                //Дата возвращения
                case "return_at":
                    if($one_way === 'false'){
                        $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead tp-date-column">' .
                            \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                            .' </td>';
                    }

                    break;
                //Дата поиска
                case "found_at":
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead tp-found-column">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                case "price":
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead tp-price-column">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                case 'place':
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                case 'direction':
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                case 'airline_logo':
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                case 'button':
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead tp-price-column">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
                default:
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead">' .
                        \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        .' </td>';
                    break;
            }
        }
        $headTable .= '</tr></thead>';
        return $headTable;
    }

    /**
     * @param $type
     * @param $one_way
     * @param $rows
     * @return string
     */
    public function renderBodyTable($type, $one_way, $rows, $origin_iata, $destination_iata, $origin, $destination, $limit, $subid, $currency){
        //error_log("renderBodyTable subid = ".$subid);
        if(!empty($subid)){
            $subid = trim($subid);
            $subid = preg_replace('/[^a-zA-Z0-9_]/', '', $subid);
            //error_log($subid);
        }
        $delimiter = '';
        if($one_way === 'false'){
            $delimiter = ' &#8596 ';
        }else {
            $delimiter = ' &#8594 ';
        }
        $bodyTable = '';
        $bodyTable .= '<tbody>';
        $count_row = 0;
        foreach($rows as $key_row => $row){
            $count_row++;
            $bodyTable .= '<tr>';
            $count = 0;
            foreach(\app\includes\TPPlugin::$options['shortcodes'][$type]['selected'] as $key=>$selected_field){
                $count++;
                // get Url
                switch($type){
                    case 1:
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $origin_iata,
                            'destination' => $destination_iata,
                            'departure_at' => $row['depart_date'],
                            //'return_at' => $row['return_date'],
                            'price' => number_format($row["value"], 0, '.', ' '),
                            'type' => $type,
                            'subid' => $subid
                        ) );
                        break;
                    case 2:
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $origin_iata,
                            'destination' => $destination_iata,
                            'departure_at' => $row['depart_date'],
                            'return_at' => $row['return_date'],
                            'price' => number_format($row["value"], 0, '.', ' '),
                            'type' => $type,
                            'subid' => $subid
                        ));
                        break;
                    case 8:
                        $citys = explode( '-', $key_row );
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $origin_iata,
                            'destination' => $key_row,
                            'departure_at' => $row['departure_at'],
                            'return_at' => $row['return_at'],
                            'price' => number_format($row["price"], 0, '.', ' '),
                            'type' => $type,
                            'subid' => $subid
                        ) );
                        break;
                    case 9:
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $origin_iata,
                            'destination' => $row['destination_iata'],
                            'departure_at' => $row['departure_at'],
                            'return_at' => $row['return_at'],
                            'price' => number_format($row["price"], 0, '.', ' '),
                            'type' => $type,
                            'subid' => $subid
                        ));
                        break;
                    case 10:
                        $citys = explode( '-', $key_row );
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $citys[0],
                            'destination' => $citys[1],
                            'departure_at' => date('Y-m-d', time() + DAY_IN_SECONDS),
                            'price' => '',//[tp_popular_destinations_airlines_shortcodes airline=SU title="" limit=6]
                            'type' => $type,
                            'subid' => $subid
                        ));
                        break;
                    case 12:
                    case 13:
                    case 14:
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $row['origin_iata'],
                            'destination' => $row['destination_iata'],
                            'departure_at' => $row['depart_date'],
                            'return_at' => $row['return_date'],
                            'price' => number_format($row["value"], 0, '.', ' '),
                            'type' => $type,
                            'one_way' =>  '&one_way='.$one_way,
                            'subid' => $subid
                        ));
                        break;
                    default:
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $origin_iata,
                            'destination' => $destination_iata,
                            'departure_at' => $row['departure_at'],
                            'return_at' => $row['return_at'],
                            'price' => number_format($row["price"], 0, '.', ' '),
                            'type' => $type,
                            'subid' => $subid
                        ));
                }
                // get Price
                $price = '';
                if($type != 10){

                    switch($type) {
                        case 1:
                        case 2:
                        case 12:
                        case 13:
                        case 14:
                            $price = $row["value"];
                            break;
                        default:
                            $price = $row["price"];
                    }
                }


                //Td
                switch($selected_field){
                    //Номер рейса
                    case "flight_number":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                $row['airline_iata'].' '. $row[$selected_field],
                                $type, $count, $price, 0, $currency).'
                            </p></td>';
                        break;
                    //Рейс
                    case "flight":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                $row['airline']
                                .' ('. $row['airline_iata'].' '.$row['flight_number'].')',
                                $type, $count, $price, 0, $currency).'
                            </p>
                            </td>';
                        /*
                         * $this->getTextTdTable(
                                $urlLink,
                                '<p  data-airline-iata="'.$row['airline'].'">' .
                                $row['airline'].'</p><span>('. $row['airline_iata'].' '.
                                $row['flight_number'].')</span>',
                                $type, $count, $price)
                         */
                        break;
                    //Дата вылета
                    case "departure_at":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">';
                        switch($type) {
                            case 1:
                            case 2:
                            case 12:
                            case 13:
                            case 14:
                                $bodyTable .=  '<p data-tptime="'.strtotime(  $row['depart_date']  ).'" class="TP-tdContent">';
                                $bodyTable .= $this->getTextTdTable(
                                    $urlLink,
                                    $this->tpDate(strtotime(  $row['depart_date'] )),
                                    $type, $count, $price, 0, $currency);
                                $bodyTable .= '</p>';
                                break;
                            default:
                                $bodyTable .= '<p data-tptime="'.strtotime(  $row[$selected_field] ).'" class="TP-tdContent">';

                                $bodyTable .= $this->getTextTdTable(
                                    $urlLink,
                                    $this->tpDate(strtotime(  $row[$selected_field] )),
                                    $type, $count, $price, 0, $currency);
                                $bodyTable .= '</p>';

                                break;
                        }

                        $bodyTable .= '</td>';
                        break;
                    //Дата возвращения
                    case "return_at":
                        switch($type){
                            case 1:
                            case 2:
                            case 12:
                            case 13:
                            case 14:
                                if($one_way === 'false') {
                                    $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                                        class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                                        <p data-tptime="' . strtotime($row['return_date']) . '" class="TP-tdContent">
                                            '.$this->getTextTdTable(
                                            $urlLink,
                                            $this->tpDate(strtotime($row['return_date'])),
                                            $type, $count, $price, 0, $currency).'
                                        </p>
                                        </td>';
                                }
                                break;
                            default:
                                $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                                    class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                                    <p data-tptime="' . strtotime($row[$selected_field]) . '" class="TP-tdContent">
                                        '.$this->getTextTdTable(
                                        $urlLink,
                                        $this->tpDate(strtotime($row[$selected_field])),
                                        $type, $count, $price, 0, $currency).'
                                    </p>
                                    </td>';
                                break;

                        }

                        break;
                    //Количество пересадок
                    case "number_of_changes":
                        $number_of_changes = '';
                        switch($type){
                            case 4:
                                $number_of_changes = $this->getNumberChangesView(substr($key_row, -1));
                                break;
                            case 5:
                            case 6:
                                $number_of_changes = $this->getNumberChangesView($row["transfers"]);
                                break;
                            default:
                                $number_of_changes = $this->getNumberChangesView($row[$selected_field]);
                        }
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                $number_of_changes,
                                $type, $count, $price, 0, $currency).'
                            </p>
                            </td>';
                        break;
                    //Стоимость
                    case "price":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                                <p data-price="'.$price.'" class="TP-tdContent">
                                '.$this->getTextTdTable(
                                $urlLink,
                                number_format($price, 0, '.', ' '),
                                $type, $count, $price, 0, $currency).$this->currencyView($currency).'
                                </p>
                            </td>';
                        break;
                    //Авиакомпания
                    case "airline":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                                <p class="TP-tdContent">
                                '.$this->getTextTdTable(
                                $urlLink,
                                '<p data-airline-iata="'.$row[$selected_field].'">' .
                                $row[$selected_field].'</p>',
                                $type, $count, $price, 0, $currency).'
                                </p>
                            </td>';
                        break;
                    //Лого авиакомпании
                    case "airline_logo":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent TP-AirlineLogo">
                            '.$this->getTextTdTable(
                                $urlLink,
                                '<img src="http://pics.avs.io/'.\app\includes\TPPlugin::$options['config']['airline_logo_size']['width']
                                .'/'.\app\includes\TPPlugin::$options['config']['airline_logo_size']['height'].'/'.$row["airline_img"].'@2x.png">'
                                ,
                                $type, $count, $price, 0, $currency).'
                                </p>
                            </td>';
                        break;
                    //Откуда
                    case "origin":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                '<span data-city-iata="'.$row[$selected_field].'">'.
                                $row[$selected_field].'</span>',
                                $type, $count, $price, 0, $currency).'
                                </p>
                            </td>';
                        break;
                    //Куда
                    case "destination":
                        $destination_txt = '';
                        switch($type){
                            case 8:
                                $destination_txt = '<span data-city-iata="'.$key_row.'">'. $row['city'].'</span>';
                                break;
                            case 9:
                            case 12:
                            case 13:
                            case 14:
                                $destination_txt = '<span data-city-iata="'.$row[$selected_field].'">'.
                                    $row[$selected_field].'</span>';
                                break;
                            default:
                                $destination_txt = '<span data-city-iata="'.$destination.'">'.
                                    $destination.'</span>';
                        }
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                $destination_txt,
                                $type, $count, $price, 0, $currency).'
                                </p>
                            </td>';
                        break;
                    // ОткудаКуда
                    case "origin_destination":
                        $origin_destination = '';
                        switch($type){
                            case 8:
                                $origin_destination .= '<span data-city-iata="'.$origin_iata.'">'
                                    .\app\includes\models\site\TPAutocomplete::$data[$origin_iata]['name_translations'][$this->local]
                                    .'</span>'
                                    .$delimiter
                                    .'<span data-city-iata="'.$row['city'].'">'
                                    .$row['city'].'</span>';
                                break;
                            case 9:
                                $origin_destination .= '<span data-city-iata="'.$row['origin'].'">'
                                    .$row['origin']
                                    .'</span>'
                                    .$delimiter
                                    .'<span data-city-iata="'.$row['destination'].'">'
                                    .$row['destination'].'</span>';
                                break;
                            case 12:
                            case 13:
                            case 14:
                                $origin_destination .= $row['origin'].$delimiter.$row['destination'];
                                break;
                            default:
                                $origin_destination .=  $row['origin'].$delimiter.$row['destination'];

                        }

                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                $origin_destination,
                                $type, $count, $price, 0, $currency).'
                                </p>
                            </td>';
                        break;
                    //Место
                    case "place":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                $count_row,
                                $type, $count, $price, 0, $currency).'
                                </p>
                            </td>';
                        break;
                    //Направление
                    case "direction":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                $row,
                                $type, $count, $price, 0, $currency).'
                                </p>
                            </td>';
                        break;
                    //Класс перелета
                    case "trip_class":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                $this->getTripClass($row[$selected_field]),
                                $type, $count, $price, 0, $currency).'
                                </p>
                            </td>';
                        break;
                    //Расстояние
                    case "distance":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                $this->tpDistanceView($row[$selected_field]),
                                $type, $count, $price, 0, $currency).'
                                </p>
                            </td>';
                        break;
                    //Цена за километр
                    case "price_distance":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p data-price="'.$row["value"]/$row['distance'].'" class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                number_format($row["value"]/$row['distance'], 0, '.', ' ').$this->currencyView(),
                                $type,
                                $count,
                                $price, 0, $currency).'
                            </p>
                            </td>';
                        break;
                    //Дата поиска
                    case "found_at":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p data-tptime="'.strtotime(  $row[$selected_field] ).'"
                                data-tpctime="'.current_time('timestamp').'"" class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                human_time_diff(strtotime(  $row[$selected_field] ), current_time('timestamp')),
                                $type,
                                $count,
                                $price, 0, $currency).'
                            </p>
                            </td>';
                        break;
                    case "button":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p data-price="'.$price.'">
                            '.$this->getTextTdTable($urlLink, "", $type, $count, $price, 1, $currency).'
                            </p>
                            </td>';
                        break;
                }
            }
            $bodyTable .= '</tr>';
            if(!empty($limit)){
                if($limit == $count_row){
                    break;
                }
            }
        }
        $bodyTable .= '</tbody>';
        return $bodyTable;
    }

    /**
     * @param array $args
     * @return string
     */
    public function getUrlTable($args = array()){
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'departure_at' => false,
            'return_at' => false,
            'link_text' => '',
            'price' => '',
            'one_way' => '',
            'subid' => '');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        //error_log("getUrlTable subid = ".$subid);
        $isWhiteLabel = false;
        $white_label = \app\includes\TPPlugin::$options['account']['white_label'];
        if(!empty($white_label)){
            if(strpos($white_label, 'http') === false){
                $white_label = 'http://'.$white_label;
            }
            $isWhiteLabel = true;
        }
        if( ! $white_label || empty( $white_label ) ){
            $white_label = \app\includes\common\TPHostURL::getHostTable();
            $isWhiteLabel = false;
        }
        $marker = \app\includes\TPPlugin::$options['account']['marker'];
        $marker = '&marker='.$marker;
        if(!empty(\app\includes\TPPlugin::$options['account']['extra_marker']))
            $marker = $marker .'.'.\app\includes\TPPlugin::$options['account']['extra_marker'];
        if(!empty(\app\includes\TPPlugin::$options['shortcodes'][$type]['extra_table_marker']))
            $marker = $marker.'_'.\app\includes\TPPlugin::$options['shortcodes'][$type]['extra_table_marker'];
        if(!empty($subid))
            $marker = $marker.'_'.$subid;
        $marker = $marker.'.$69';
        if( (int) \app\includes\TPPlugin::$options['config']['after_url'] == 1 )
            $marker = $marker . '&with_request=true';
        $redirect = false;
        if(isset(\app\includes\TPPlugin::$options['config']['redirect'])){
            $redirect = true;
        }
        $origin = ( false !== $origin ) ? "?origin_iata={$origin}" : "?origin_iata=";
        $destination = ( false !== $destination ) ? "&destination_iata={$destination}" : "&destination_iata=";
        $departure_at = (!empty($departure_at) && false !== $departure_at) ? '&depart_date='.date('Y-m-d', strtotime( $departure_at ))  : "";
        $return_at = ( !empty($return_at) && false !== $return_at) ? '&return_date='.date('Y-m-d', strtotime( $return_at ) )  : "";
        $url = '/searches/new'.$origin.$destination.$departure_at.$return_at.$marker;
        if ($isWhiteLabel == true){
            if (\app\includes\TPPlugin::$options['local']['localization'] == 2){
                $url .= '&locale=en';
                $url .= '&currency='.\app\includes\TPPlugin::$options['local']['currency'];
            }
        }
        switch($type){
            case 1:
            case 10:
                $url .= '&one_way=true';
                break;
            case 12:
            case 13:
            case 14:
                $url .= $one_way;
                break;
        }

        if($redirect){
            $home = '';
            $home = get_option('home');
            $url = substr($url, 10);
            return $home.'/?searches='.rawurlencode($url);
        }else{
            return $white_label.$url;
        }
    }

    /**
     * @param $typeShortcode
     * @param $price
     * @return mixed|string
     */
    public function getButtonText($typeShortcode, $price, $currency){
        $button_text = "<span>".\app\includes\TPPlugin::$options['shortcodes'][$typeShortcode]['title_button'][$this->local]."</span>";
        if(!empty($button_text)){
            if(strpos($button_text, 'price') !== false){
                if (!is_string($price)) {
                    $price = number_format($price, 0, '.', ' ');
                }
                $button_text = str_replace('price', $price, $button_text);
                $button_text .= $this->currencyView($currency);
            }
        }
        return $button_text;
    }
    /**
     * @param $url
     * @param $text
     * @param $typeShortcode
     * @param $count
     * @param $price
     * @param int $type
     * @return string
     */
    public function getTextTdTable($url, $text, $typeShortcode, $count, $price, $type = 0, $currency){

        $textTd = '';
        $rel = '';
        if(isset(\app\includes\TPPlugin::$options['config']['nofollow'])) $rel ='rel="nofollow"';
        $target_url = '';
        if(isset(\app\includes\TPPlugin::$options['config']['target_url'])) $target_url ='target="_blank"';
        $redirect = false;
        if(isset(\app\includes\TPPlugin::$options['config']['redirect'])){
            $redirect = true;
        }



        if(isset(\app\includes\TPPlugin::$options['style_table']['table']['hyperlink'])){
            //error_log("hyperlink");
            //hyperlink
            switch($type){
                //link
                case 0:
                    $textTd = '<a href="'.$url.'" class="TPLinkTable" '.$target_url.'  '.$rel.'>'.$text.'</a>';
                    break;
                //button
                case 1:
                    $textTd = '<a href="'.$url.'" class="TP-Plugin-Tables_link TPButtonTable" '.$target_url.' '.$rel.'>'
                        .$this->getButtonText($typeShortcode, $price, $currency).'</a>';
                    break;
            }
        }else{
            //error_log("button");
            //pop-up button
            /*$buttonOnOff = in_array('button', \app\includes\TPPlugin::$options['shortcodes'][$typeShortcode]['selected']);
            if(!$buttonOnOff){

                if($count == count(\app\includes\TPPlugin::$options['shortcodes'][$typeShortcode]['selected'])){
                    //pop-up button
                    $textTd = $text.' <a href="'.$url.'" class="TPPopUpButtonTable">'.$button_text.'</a>';
                    //error_log($textTd);
                }else{
                    $textTd = $text;
                }

            }else{       */
            switch($type){
                //text When hyperlinks are disabled
                case 0:
                    $textTd = $text;
                    break;
                //button
                case 1:
                    //error_log($this->getButtonText($typeShortcode, $price));
                    //error_log($price);
                    $textTd = '<a href="'.$url.'" class="TP-Plugin-Tables_link TPButtonTable " '.$target_url.' '.$rel.'>'
                        .$this->getButtonText($typeShortcode, $price, $currency).'</a>';
                    break;
            }
            // }

        }

        return $textTd;
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
     * @return string
     */
    public function currencyView($currency){
        //$currency = mb_strtolower(\app\includes\TPPlugin::$options['local']['currency']);
        //return '<i class="TP-currency-icons"><i class="demo-icon icon-'.$currency.'"></i></i>';
        $currency = mb_strtolower($currency);
        return '<i class="TP-currency-icons"><i class="tp-plugin-icon-'.$currency.'"></i></i>';
    }

    /**
     * return Trip Class
     * @param $trip_class
     */
    public function getTripClass($trip_class){
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
     * @param $numberChanges
     * @return string
     */
    public function getNumberChangesView($numberChanges){
        switch($numberChanges){
            case 0:
                switch(\app\includes\TPPlugin::$options['local']['localization']){
                    case 1:
                        //$numberChanges = "Без пересадок";
                        $numberChanges = "Прямой";
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
     * @param $type
     * @param $field
     * @return string
     */
    public function tdClassHidden($type, $field){
        $fields = array(
            '1' => array(
                'trip_class',
                'distance',
                'price'
            ),
            '2' => array(
                'return_at',
                'trip_class',
                'distance',
                'price'
            ),
            '4' => array(
                'number_of_changes',
                'airline_logo',
                'flight_number',
                'flight',
                'airline',
                'price'
            ),
            '5' => array(
                'number_of_changes',
                'airline_logo',
                'flight_number',
                'flight',
                'airline',
                'price'
            ),
            '6' => array(
                'number_of_changes',
                'airline_logo',
                'flight_number',
                'flight',
                'airline',
                'price'
            ),
            '7' => array(
                'airline_logo',
                'flight_number',
                'flight',
                'airline',
                'price'
            ),
            '8' => array(
                'airline_logo',
                'return_at',
                'flight_number',
                'flight',
                'airline',
                'origin_destination',
                'price'
            ),
            '9' => array(
                'airline_logo',
                'return_at',
                'flight_number',
                'flight',
                'airline',
                'origin_destination',
                'price'
            ),
            '10' => array(),
            '12' => array(
                'found_at',
                'number_of_changes',
                'trip_class',
                'distance',
                'price_distance',
                'origin_destination',
                'price',
                'departure_at',
                'return_at',
            ),
            '13' => array(
                'origin',
                'found_at',
                'number_of_changes',
                'trip_class',
                'distance',
                'price_distance',
                'origin_destination',
                'price',
                'return_at',
            ),
            '14' => array(
                'destination',
                'found_at',
                'number_of_changes',
                'trip_class',
                'distance',
                'price_distance',
                'origin_destination',
                'price'
            ),
        );
        if(in_array($field, $fields[$type])) return 'TP-unessential';
        return '';
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
                //error_log('redirect_plugins');
                //error_log(print_r($_GET['searches'], true));
                $white_label = \app\includes\TPPlugin::$options['account']['white_label'];
                if(!empty($white_label)){
                    if(strpos($white_label, 'http') === false){
                        $white_label = 'http://'.$white_label;
                    }
                }else{
                    /*switch (\app\includes\TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'http://engine.aviasales.ru';
                            break;
                        case 2:
                            $white_label = 'http://jetradar.com';
                            break;
                    }*/
                    $white_label = \app\includes\common\TPHostURL::getHostTable();
                    //error_log('0 = '.$white_label);

                }
                //error_log('1 = '.$_GET['searches']);
                //error_log('1 = '.urldecode($_GET['searches']));
                $white_label = "{$white_label}/searches/".urldecode($_GET['searches']);
                //error_log('2 = '.$white_label);
                header("Location: {$white_label}", true, 302);
                die;
                /*
                 * wp_redirect($white_label.'/searches/'.urldecode($_GET['searches']));
                 * problem
                 * $location = wp_sanitize_redirect($location);
                 * delete marker special symbol.
                 */
            }
            if(isset($_GET['searches_ticket'])){
                $white_label = \app\includes\TPPlugin::$options['account']['white_label'];
                if(!empty($white_label)){
                    if(strpos($white_label, 'http') === false){
                        $white_label = 'http://'.$white_label;
                    }
                }else{
                    switch (\app\includes\TPPlugin::$options['local']['localization']){
                        case 1:
                            $white_label = 'http://hydra.aviasales.ru';
                            break;
                        case 2:
                            $white_label = 'http://jetradar.com';
                            break;
                    }
                }
                $white_label = "{$white_label}/searches/".urldecode($_GET['searches_ticket']);
                header("Location: {$white_label}", true, 302);
                die;
                /*
                 * wp_redirect($white_label.'/searches/'.urldecode($_GET['searches']));
                 * problem
                 * $location = wp_sanitize_redirect($location);
                 * delete marker special symbol.
                 */
            }
            if(isset($_GET['searches_hotel'])){
                $white_label = \app\includes\TPPlugin::$options['account']['white_label'];
                if(!empty($white_label)){
                    if(strpos($white_label, 'http') === false){
                        $white_label = 'http://'.$white_label;
                    }
                }else{
                    $white_label = 'http://search.hotellook.com/';
                }
                $white_label = "{$white_label}".urldecode($_GET['searches_hotel']);
                header("Location: {$white_label}", true, 302);
                die;
                /*
                 * wp_redirect($white_label.'/searches/'.urldecode($_GET['searches']));
                 * problem
                 * $location = wp_sanitize_redirect($location);
                 * delete marker special symbol.
                 */
            }


        }
    }
}
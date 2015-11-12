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
            'off_title' => '');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $html = '';
        if(count($rows) < 1) return false;
        $html .= '<div class="TP-Plugin-Tables_wrapper">
                    '.$this->titleTable($off_title, $title, $type, $origin, $destination, $airline).'
                    <table class="TP-Plugin-Tables_box  TP-rwd-table TP-rwd-table-avio">
                        '.$this->headTable($type, $one_way).'
                        '.$this->bodyTable($type, $one_way, $rows, $origin_iata, $destination_iata).'
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
    public function titleTable($off_title, $title, $type, $origin, $destination, $airline){
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
            return '<'.\app\includes\TPPlugin::$options['shortcodes'][$type]['tag'].'>'.$title.'</'.\app\includes\TPPlugin::$options['shortcodes'][$type]['tag'].'>';
        }
        return '';

    }

    /**
     * @param $type
     * @return string
     */
    public function headTable($type, $one_way){
        $headTable = '';
        $headTable .= '<thead class="TP-Plugin-Tables_box_thead"><tr>';
            foreach(\app\includes\TPPlugin::$options['shortcodes'][$type]['selected'] as $key=>$selected_field){
                switch($selected_field) {
                    //Дата вылета
                    case "departure_at":
                        $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">' .
                            \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                            .' </td>';
                        break;
                    //Дата возвращения
                    case "return_at":
                        if($one_way === 'false'){
                            $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">' .
                                \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                                .' </td>';
                        }

                        break;
                    //Дата поиска
                    case "found_at":
                        $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">' .
                            \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                            .' </td>';
                        break;
                    case "price":
                        $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">' .
                            \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                            .' </td>';
                        break;
                    case 'place':
                        $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">' .
                            \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                            .' </td>';
                        break;
                    case 'direction':
                        $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">' .
                            \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                            .' </td>';
                        break;
                    case 'airline_logo':
                        $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">' .
                            \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                            .' </td>';
                        break;
                    case 'button':
                        $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">' .
                            \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                            .' </td>';
                        break;
                    default:
                        $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">' .
                            \app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                            .' </td>';
                        break;
                }
            }
        $headTable .= '</tr></thead>';
        /*$headTable = '<thead class="TP-Plugin-Tables_box_thead">
                        <tr>
                            <td class="TP-active TP-sorting_asc">Куда</td>
                            <td>Дата вылета</td>
                            <td>Дата возвращения</td>
                            <td>Авиакомпания</td>
                            <td>Найти билет</td>
                            <td class="TP-unessential">Номер рейса</td>
                            <td class="TP-unessential">Рейс</td>
                            <td class="TP-unessential">Авиакомпания</td>
                            <td class="TP-unessential">Авиакомпания</td>
                        </tr>
                        </thead>';*/
        return $headTable;
    }

    /**
     * @param $type
     * @param $one_way
     * @param $rows
     * @return string
     */
    public function bodyTable($type, $one_way, $rows, $origin_iata, $destination_iata){
        $bodyTable = '';
        $bodyTable .= '<tbody>';
        foreach($rows as $key_row => $row){
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
                            'type' => $type
                        ) );
                        break;
                    case 2:
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $origin_iata,
                            'destination' => $destination_iata,
                            'departure_at' => $row['depart_date'],
                            'return_at' => $row['return_date'],
                            'price' => number_format($row["value"], 0, '.', ' '),
                            'type' => $type
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
                            'type' => $type
                        ) );
                        break;
                    case 9:
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $origin_iata,
                            'destination' => $row['destination_iata'],
                            'departure_at' => $row['departure_at'],
                            'return_at' => $row['return_at'],
                            'price' => number_format($row["price"], 0, '.', ' '),
                            'type' => $type
                        ));
                        break;
                    case 10:
                        $citys = explode( '-', $key_row );
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $citys[0],
                            'destination' => $citys[1],
                            'departure_at' => date('Y-m-d', time() + DAY_IN_SECONDS),
                            'price' => '',//[tp_popular_destinations_airlines_shortcodes airline=SU title="" limit=6]
                            'type' => $type
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
                            'one_way' =>  '&one_way='.$one_way
                        ));
                        break;
                    default:
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $origin_iata,
                            'destination' => $destination_iata,
                            'departure_at' => $row['departure_at'],
                            'return_at' => $row['return_at'],
                            'price' => number_format($row["price"], 0, '.', ' '),
                            'type' => $type
                        ));
                }
                //Td
                switch($selected_field){
                    //Номер рейса
                    case "flight_number":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    //Рейс
                    case "flight":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
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
                                $bodyTable .= '<p data-tptime="'.strtotime(  $row['depart_date']  ).'">'
                                    .$this->tpDate(strtotime(  $row['depart_date'] ))
                                    .'</p>';
                                break;
                            default:
                                $bodyTable .= '<p data-tptime="'.strtotime(  $row[$selected_field] ).'">'
                                    .$this->tpDate(strtotime(  $row[$selected_field] ))
                                    .'</p>';
                                break;
                        }
                        $bodyTable .= '</td>';
                        break;
                    //Дата возвращения
                    case "return_at":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    //Количество пересадок
                    case "number_of_changes":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    //Стоимость
                    case "price":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    //Авиакомпания
                    case "airline":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    //Лого авиакомпании
                    case "airline_logo":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    //Откуда
                    case "origin":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    //Куда
                    case "destination":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    // ОткудаКуда
                    case "origin_destination":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    //Место
                    case "place":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    //Направление
                    case "direction":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    //Класс перелета
                    case "trip_class":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    //Расстояние
                    case "distance":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    //Цена за километр
                    case "price_distance":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    //Дата поиска
                    case "found_at":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                    case "button":
                        $bodyTable .= '<td data-th="'.\app\includes\TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field].'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            Санкт-Петербург
                            </td>';
                        break;
                }
            }
            $bodyTable .= '</tr>';
        }
        $bodyTable .= '</tbody>';
        return $bodyTable;
        /*
         <tbody>
            <tr>
                <td data-th="Куда">Санкт-Петербург</td>
                <td data-th="Дата вылета">FFFFFFF</td>
                <td data-th="Дата возвращения">FFFFFFF</td>
                <td data-th="Авиакомпания">FFFFFFF</td>
                <td class="TP-unessential" data-th="Найти билет">FFFFFFF</td>
                <td data-th="Номер рейса">
                    <a class="TP-Plugin-Tables_link" href="javascript:void (0);"><span>RT from 73</span><i>$</i></a>
                </td>
                <td class="TP-unessential" data-th="Рейс">FFFFFFF</td>
                <td class="TP-unessential" data-th="Авиакомпания">FFFFFFF</td>
                <td class="TP-unessential" data-th="Авиакомпания">FFFFFFF</td>
            </tr>
            </tbody>
         */
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
            'one_way' => '');
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
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
        $redirect = false;
        if(isset(\app\includes\TPPlugin::$options['config']['redirect'])){
            $redirect = true;
        }
        $origin = ( false !== $origin ) ? "?origin_iata={$origin}" : "?origin_iata=";
        $destination = ( false !== $destination ) ? "&destination_iata={$destination}" : "&destination_iata=";
        $departure_at = (!empty($departure_at) && false !== $departure_at) ? '&depart_date='.date('Y-m-d', strtotime( $departure_at ))  : "";
        $return_at = ( !empty($return_at) && false !== $return_at) ? '&return_date='.date('Y-m-d', strtotime( $return_at ) )  : "";
        $url = '/searches/new'.$origin.$destination.$departure_at.$return_at.$marker;
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

    public function getTextTdTable($url, $text, $typeShortcode, $type = 0){

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
            switch($type){
                //link
                case 0:
                    $textTd = '<a href="'.$url.'">'.$text.'</a>';
                    break;
                //button
                case 1:
                    $textTd = '<a href="'.$url.'">'.$text.'</a>';
                    break;
            }
        }else{
            $buttonOnOff = in_array('button', \app\includes\TPPlugin::$options['shortcodes'][$typeShortcode]['selected']);
        }
        //if($count == count(\app\includes\TPPlugin::$options['shortcodes'][$type]['selected']) && !$buttonOnOff){}
        return $textTd;
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
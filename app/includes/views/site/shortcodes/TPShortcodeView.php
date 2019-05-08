<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 11.11.15
 * Time: 8:23
 */

namespace app\includes\views\site\shortcodes;

use app\includes\common\TPCurrencyUtils;
use app\includes\common\TPOption;
use app\includes\common\TPSearchFormEmptyTable;

use \app\includes\TPPlugin;
use \app\includes\common\TPLang;
use \app\includes\common\TPHostURL;
use \app\includes\common\TPAutocompleteReplace;
use \app\includes\common\TPFieldsLabelTable;
use \app\includes\common\TpPluginHelper;

class TPShortcodeView {
    public function __construct()
    {
        add_action('wp', array(&$this, 'redirect_plugins'));
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
            'currency' => TPPlugin::$options['local']['currency'],
            'host' => ''
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        //error_log('currency = '.$currency);
        $html = '';

        //error_log(count($rows).' type = '.$type);
        if(TpPluginHelper::count($rows) < 1 || $rows == false) return $this->renderViewIfEmptyTable($type, $one_way, $rows, $origin_iata, $destination_iata,
            $origin, $destination, $limit, $subid, $currency);

        if($one_way === 'false'){
            $sort_column = TPPlugin::$options['shortcodes'][$type]['sort_column'];
        }else{
            $sort_column = TPPlugin::$options['shortcodes'][$type]['sort_column'];
            if($sort_column == TpPluginHelper::count($this->getSelectField($type)) - 1){
                --$sort_column;
            }
        }
        //error_log('$paginate = '.$paginate);
        //error_log('$rows count = '.count($rows));
        $html .= '<div class="TP-Plugin-Tables_wrapper clearfix">
                    '.$this->renderTitleTable($off_title, $title, $type, $origin, $destination, $airline).'
                    <table class="TPTableShortcode TP-Plugin-Tables_box  TP-rwd-table TP-rwd-table-avio"
                        data-paginate="'.$paginate.'"
                        data-paginate_limit="'.TPPlugin::$options['shortcodes'][$type]['paginate'].'"
                        data-sort_column="'.$sort_column.'">
                        '.$this->renderHeadTable($type, $one_way).'
                        '.$this->renderBodyTable($type, $one_way, $rows, $origin_iata, $destination_iata, $origin, $destination, $limit, $subid, $currency, $host).'
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
                if(isset(TPPlugin::$options['shortcodes'][$type]['title'][TPLang::getLang()])){
                    $title = TPPlugin::$options['shortcodes'][$type]['title'][TPLang::getLang()];
                }else{
                    $title = TPPlugin::$options['shortcodes'][$type]['title'][TPLang::getDefaultLang()];
                }
                //$title = TPPlugin::$options['shortcodes'][$type]['title'][$this->local];
                if(TPPlugin::$options['local']['title_case']['destination'] === 'vi'){
                    $title = str_replace('в destination', 'destination', $title);
                }
            }
            if(!empty($title)){
                if(empty($airline)){
                    if (TPLang::getLang() === 'ru'){
                        if(strpos($title, 'origin') !== false){
                            $title = str_replace('origin', '<span data-title-case-origin-iata="'.$origin.'">'.$origin.'</span>' , $title);
                        }
                        if(strpos($title, 'destination') !== false){
                            $title = str_replace('destination', '<span data-title-case-destination-iata="'.$destination.'">'.$destination.'</span>', $title);
                        }
                    } else {
                        if(strpos($title, 'origin') !== false){
                            $title = str_replace('origin', '<span data-city-iata="'.$origin.'">'.$origin.'</span>' , $title);
                        }
                        if(strpos($title, 'destination') !== false){
                            $title = str_replace('destination', '<span data-city-iata="'.$destination.'">'.$destination.'</span>', $title);
                        }
                    }
                }else{
                    if(strpos($title, 'airline') !== false){
                        $title = str_replace('airline', '<span data-airline-iata="'.$airline.'">'.$airline.'</span>' , $title);
                    }
                }
            }
            return '<'.TPPlugin::$options['shortcodes'][$type]['tag'].' class="TP-TitleTables">'.$title.'</'.TPPlugin::$options['shortcodes'][$type]['tag'].'>';
        }
        return '';

    }

    /**
     * @param $fieldKey
     * @return string
     */
    public function getTableTheadTDFieldLabel($fieldKey)
    {
        $fieldLabel = '';
        if(isset(TPPlugin::$options['local']['fields'][TPLang::getLang()]['label'][$fieldKey])){
            $fieldLabel = TPPlugin::$options['local']['fields'][TPLang::getLang()]['label'][$fieldKey];
        }else{
            $fieldLabel = TPPlugin::$options['local']['fields'][TPLang::getDefaultLang()]['label'][$fieldKey];
        }
        return $fieldLabel;
    }
    /**
     * @param $type
     * @return string
     */
    public function renderHeadTable($type, $one_way){

        $headTable = '';

        $headTable .= '<thead class="TP-Plugin-Tables_box_thead"><tr>';
        foreach($this->getSelectField($type) as $key=>$selected_field){
            switch($selected_field) {
                //Дата вылета
                case 'departure_at':
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead tp-date-column">' .
                        //TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        $this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                //Дата возвращения
                case 'return_at':
                    if($one_way === 'false'){
                        $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead tp-date-column">' .
                            //TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                            $this->getTableTheadTDFieldLabel($selected_field)
                            .'<i class="TP-sort-chevron fa"></i>'
                            .' </td>';
                    }

                    break;
                //Дата поиска
                case 'found_at':
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead tp-found-column">' .
                        //TPPlugin::$options['local']['fields'][$this->local]['label'][$selected_field]
                        $this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                case 'price':
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead tp-price-column">' .
                        $this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                case 'place':
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead">' .
                        $this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                case 'direction':
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead">' .
                        $this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                case 'airline_logo':
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead tp-airline_logo-column">' .
                        $this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                case 'button':
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead tp-price-column">' .
                        $this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                default:
                    $headTable .= '<td class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).' TPTableHead">' .
                        $this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
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
    public function renderBodyTable($type, $one_way, $rows, $origin_iata, $destination_iata, $origin, $destination, $limit, $subid, $currency, $host){
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
            foreach($this->getSelectField($type) as $key=>$selected_field){
                $count++;
                // get Url
                switch($type){
                    case 1:
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $origin_iata,
                            'destination' => $destination_iata,
                            'departure_at' => isset($row['depart_date'])? $row['depart_date'] : '',
                            //'return_at' => (isset($row['return_date'])? $row['return_date'] : ''),
                            'price' => number_format((isset($row['value'])? $row['value'] : 0), 0, '.', ' '),
                            'type' => $type,
                            'subid' => $subid,
                            'currency' => $currency,
                            'host' => $host
                        ) );
                        break;
                    case 2:
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $origin_iata,
                            'destination' => $destination_iata,
                            'departure_at' => isset($row['depart_date'])? $row['depart_date'] : '',
                            'return_at' => isset($row['return_date'])? $row['return_date'] : '',
                            'price' => number_format((isset($row['value'])? $row['value'] : 0), 0, '.', ' '),
                            'type' => $type,
                            'subid' => $subid,
                            'currency' => $currency,
                            'host' => $host
                        ));
                        break;
                    case 8:
                        $citys = explode( '-', $key_row );
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $origin_iata,
                            'destination' => $key_row,
                            'departure_at' => isset($row['departure_at'])? $row['departure_at'] : '',
                            'return_at' => isset($row['return_at'])? $row['return_at'] : '',
                            'price' => number_format((isset($row['price'])? $row['price'] : 0), 0, '.', ' '),
                            'type' => $type,
                            'subid' => $subid,
                            'currency' => $currency,
                            'host' => $host
                        ) );
                        break;
                    case 9:
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $origin_iata,
                            'destination' => isset($row['destination_iata'])? $row['destination_iata'] : '',
                            'departure_at' => isset($row['departure_at'])? $row['departure_at'] : '',
                            'return_at' => isset($row['return_at'])? $row['return_at'] : '',
                            'price' => number_format((isset($row['price'])? $row['price'] : 0), 0, '.', ' '),
                            'type' => $type,
                            'subid' => $subid,
                            'currency' => $currency,
                            'host' => $host
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
                            'subid' => $subid,
                            'currency' => $currency,
                            'host' => $host
                        ));
                        break;
                    case 12:
                    case 13:
                    case 14:
                        $urlLink = $this->getUrlTable(array(
                            'origin' => isset($row['origin_iata'])? $row['origin_iata'] : '',
                            'destination' => isset($row['destination_iata'])? $row['destination_iata'] : '',
                            'departure_at' => isset($row['depart_date'])? $row['depart_date'] : '',
                            'return_at' => isset($row['return_date'])? $row['return_date'] : '',
                            'price' => number_format((isset($row['value'])? $row['value'] : 0), 0, '.', ' '),
                            'type' => $type,
                            'one_way' =>  '&one_way='.$one_way,
                            'subid' => $subid,
                            'currency' => $currency,
                            'host' => $host
                        ));
                        break;
                    default:
                        $urlLink = $this->getUrlTable(array(
                            'origin' => $origin_iata,
                            'destination' => $destination_iata,
                            'departure_at' => isset($row['departure_at'])? $row['departure_at'] : '',
                            'return_at' => isset($row['return_at'])? $row['return_at'] : '',
                            'price' => number_format((isset($row['price'])? $row['price'] : 0), 0, '.', ' '),
                            'type' => $type,
                            'subid' => $subid,
                            'currency' => $currency,
                            'host' => $host
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
                            $price = (isset($row['value'])? $row['value'] : '');
                            break;
                        default:
                            $price = (isset($row['price'])? $row['price'] : '');
                    }
                }


                //Td
                switch($selected_field){
                    //Номер рейса
                    case 'flight_number':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                (isset($row['airline_iata'])? $row['airline_iata'] : '').' '. $row[$selected_field],
                                $type, $count, $price, 0, $currency).'
                            </p></td>';
                        break;
                    //Рейс
                    case 'flight':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                (isset($row['airline'])? $row['airline'] : '')
                                .' ('. (isset($row['airline_iata'])? $row['airline_iata'] : '').' '.(isset($row['flight_number'])? $row['flight_number'] : '').')',
                                $type, $count, $price, 0, $currency).'
                            </p>
                            </td>';
                        /*
                         * $this->getTextTdTable(
                                $urlLink,
                                '<p  data-airline-iata="'.(isset($row['airline'])? $row['airline'] : '').'">' .
                                (isset($row['airline'])? $row['airline'] : '').'</p><span>('. (isset($row['airline_iata'])? $row['airline_iata'] : '').' '.
                                (isset($row['flight_number'])? $row['flight_number'] : '').')</span>',
                                $type, $count, $price)
                         */
                        break;
                    //Дата вылета
                    case 'departure_at':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">';
                        switch($type) {
                            case 1:
                            case 2:
                            case 12:
                            case 13:
                            case 14:
                                $bodyTable .=  '<p data-tptime="'.strtotime(  (isset($row['depart_date'])? $row['depart_date'] : '')  ).'" class="TP-tdContent">';
                                $bodyTable .= $this->getTextTdTable(
                                    $urlLink,
                                    $this->tpDate(strtotime(  (isset($row['depart_date'])? $row['depart_date'] : '') )),
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
                    case 'return_at':
                        switch($type){
                            case 1:
                            case 2:
                            case 12:
                            case 13:
                            case 14:
                                if($one_way === 'false') {
                                    $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                        class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                                        <p data-tptime="' . strtotime((isset($row['return_date'])? $row['return_date'] : '')) . '" class="TP-tdContent">
                                            '.$this->getTextTdTable(
                                            $urlLink,
                                            $this->tpDate(strtotime((isset($row['return_date'])? $row['return_date'] : ''))),
                                            $type, $count, $price, 0, $currency).'
                                        </p>
                                        </td>';
                                }
                                break;
                            default:
                                $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
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
                    case 'number_of_changes':
                        $number_of_changes = '';
                        switch($type){
                            case 4:
                                $number_of_changes = $this->getNumberChangesView(substr($key_row, -1));
                                break;
                            case 5:
                            case 6:
                                $number_of_changes = $this->getNumberChangesView((isset($row['transfers'])? $row['transfers'] : ''));
                                break;
                            default:
                                $number_of_changes = $this->getNumberChangesView($row[$selected_field]);
                        }
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                $number_of_changes,
                                $type,
                                $count,
                                $price,
                                0,
                                $currency).'
                            </p>
                            </td>';
                        break;
                    //Стоимость
                    case 'price':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                                <p data-price="'.$price.'" class="TP-tdContent">
                                '.$this->getTextTdTable(
                                    $urlLink,
                                    $this->renderPrice(number_format($price, 0, '.', ' '), $currency),
                                    $type,
                                    $count,
                                    $price,
                                    0,
                                    $currency
                                ).'
                                </p>
                            </td>';
                        break;
                    //Авиакомпания
                    case 'airline':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
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
                    case 'airline_logo':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p class="TP-tdContent TP-AirlineLogo" data-tpairline="'.(isset($row['airline'])? $row['airline'] : '').'">

                            '.$this->getTextTdTable(
                                $urlLink,
                                '<img src="'
                                .TPHostURL::getHostUrlAirlineLogo()
                                .TPPlugin::$options['config']['airline_logo_size']['width']
                                .'/'.TPPlugin::$options['config']['airline_logo_size']['height'].'/'.(isset($row['airline_img'])? $row['airline_img'] : '').'@2x.png">'
                                ,
                                $type, $count, $price, 0, $currency).'
                                </p>
                            </td>';
                        break;
                    //Откуда
                    case 'origin':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
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
                    case 'destination':
                        $destination_txt = '';
                        switch($type){
                            case 8:
                                $destination_txt = '<span data-city-iata="'.$key_row.'">'. (isset($row['city'])? $row['city'] : '').'</span>';
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
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
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
                    case 'origin_destination':
                        $origin_destination = '';
                        switch($type){
                            case 8:
                                $origin_destination .= '<span data-city-iata="'.$origin_iata.'">'
                                    .TPAutocompleteReplace::getTableIataReplace($origin_iata)
                                    .'</span>'
                                    .$delimiter
                                    .'<span data-city-iata="'.(isset($row['city'])? $row['city'] : '').'">'
                                    .(isset($row['city'])? $row['city'] : '').'</span>';
                                break;
                            case 9:
                                $origin_destination .= '<span data-city-iata="'.(isset($row['origin'])? $row['origin'] : '').'">'
                                    .(isset($row['origin'])? $row['origin'] : '')
                                    .'</span>'
                                    .$delimiter
                                    .'<span data-city-iata="'.(isset($row['destination'])? $row['destination'] : '').'">'
                                    .(isset($row['destination'])? $row['destination'] : '').'</span>';
                                break;
                            case 12:
                            case 13:
                            case 14:
                                $origin_destination .= (isset($row['origin'])? $row['origin'] : '').$delimiter.(isset($row['destination'])? $row['destination'] : '');
                                break;
                            default:
                                $origin_destination .=  (isset($row['origin'])? $row['origin'] : '').$delimiter.(isset($row['destination'])? $row['destination'] : '');

                        }

                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
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
                    case 'place':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
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
                    case 'direction':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
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
                    case 'trip_class':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
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
                    case 'distance':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
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
                    case 'price_distance':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p data-price="'.(isset($row['value'])? $row['value'] : '')/(isset($row['distance'])? $row['distance'] : '').'" class="TP-tdContent">
                            '.$this->getTextTdTable(
                                $urlLink,
                                $this->renderPrice(number_format((isset($row['value'])? $row['value'] : 0)/(isset($row['distance'])? $row['distance'] : ''), 0, '.', ' '), $currency),
                                $type,
                                $count,
                                $price,
                                0,
                                $currency
                            ).'
                            </p>
                            </td>';
                        break;
                    //Дата поиска
                    case 'found_at':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
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
                    case 'button':
                        $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                            class="TP'.$selected_field.'Td '.$this->tdClassHidden($type, $selected_field).'">
                            <p data-price="'.$price.'">
                            '.$this->getTextTdTable($urlLink, '', $type, $count, $price, 1, $currency).'
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
            'subid' => '',
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'host' => ''
            );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        //error_log("getUrlTable subid = ".$subid);
        $isWhiteLabel = false;
        if (!empty($host)) {
            // shortcode param host
            $white_label = $host;
            if(strpos($white_label, 'http') === false){
                $white_label = 'http://'.$white_label;
            }
        } else {
            // host or white label
            $white_label = TPPlugin::$options['account']['white_label'];
            if(!empty($white_label)){
                if(strpos($white_label, 'http') === false){
                    $white_label = 'http://'.$white_label;
                }
                $isWhiteLabel = true;
            }
            if( ! $white_label || empty( $white_label ) ){
                $white_label = TPHostURL::getHostTable();
                $isWhiteLabel = false;
            }
        }

        $marker = TPPlugin::$options['account']['marker'];
        $marker = '&marker='.$marker;
        $marker .= TPOption::getExtraMarker();
        if(!empty(TPPlugin::$options['shortcodes'][$type]['extra_table_marker']))
            $marker = $marker.'_'.TPPlugin::$options['shortcodes'][$type]['extra_table_marker'];
        if(!empty($subid))
            $marker = $marker.'_'.$subid;
        $marker = $marker.'.$69';
        if( (int) TPPlugin::$options['config']['after_url'] == 1 )
            $marker = $marker . '&with_request=true';
        $redirect = false;
        if(isset(TPPlugin::$options['config']['redirect'])){
            $redirect = true;
        }
        $origin = ( false !== $origin ) ? "?origin_iata={$origin}" : '?origin_iata=';
        $destination = ( false !== $destination ) ? "&destination_iata={$destination}" : '&destination_iata=';
        $departure_at = (!empty($departure_at) && false !== $departure_at) ? '&depart_date='.date('Y-m-d', strtotime( $departure_at ))  : '';
        $return_at = ( !empty($return_at) && false !== $return_at) ? '&return_date='.date('Y-m-d', strtotime( $return_at ) )  : '';
        $currency = '&currency='.$currency;

        $url = $origin.$destination.$departure_at.$return_at.$currency.$marker;

        if(strpos($white_label, 'aviasales.kz') === false){
            $url = 'new'.$url;
        }

        //aviasales.kz
        /*if ($isWhiteLabel == true){
            if (TPLang::getLang() == TPLang::getLangEN()){
                //$url .= '&locale=en';
                $url .= '&currency='.TPPlugin::$options['local']['currency'];
            }
        }*/

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

        if ($isWhiteLabel == true) {
            $url = '/flights/'.$url;
        } else {
            if(strpos($white_label, 'aviasales.kz') === false){
                $url = '/searches/'.$url;
            } else {
                $url = '/search/'.$url;
            }

        }

        $url = $white_label.$url;

        if($redirect){
            $home = '';
            $home = get_option('home');
            //$url = substr($url, 10);
            $url = $home.'/?searches='.rawurlencode($url);
        }

        return $url;
    }

    /**
     * @param $typeShortcode
     * @param $price
     * @return mixed|string
     */
    public function getButtonText($typeShortcode, $price, $currency){
        $btnTxt = '';
        if(isset(TPPlugin::$options['shortcodes'][$typeShortcode]['title_button'][TPLang::getLang()])){
            $btnTxt = TPPlugin::$options['shortcodes'][$typeShortcode]['title_button'][TPLang::getLang()];
        }else{
            $btnTxt = TPPlugin::$options['shortcodes'][$typeShortcode]['title_button'][TPLang::getDefaultLang()];
        }
        $button_text = '<span>' .$btnTxt. '</span>';
        if(!empty($button_text)){
            if(strpos($button_text, 'price') !== false){
                if (!is_string($price)) {
                    $price = number_format($price, 0, '.', ' ');
                    $price = $this->renderPrice($price, $currency);
                }
                $button_text = str_replace('price', $price, $button_text);

            }
        }
        return $button_text;
    }


    /**
     * @param $price
     * @param $currency
     *
     * @return string
     */
    public function renderPrice($price, $currency){
        $currencyView = '';
        switch (TPPlugin::$options['local']['currency_symbol_display']){
            case 0:
                $currency = mb_strtolower($currency);
                $currencyView = $price.'<i class="TP-currency-icons tp-currency-after"><i class="tp-plugin-icon-'
                                .$currency.'"></i></i>';
                break;
            case 1:
                $currency = mb_strtolower($currency);
                $currencyView = '<i class="TP-currency-icons tp-currency-before"><i class="tp-plugin-icon-'
                                .$currency.'"></i></i>'.$price;
                break;
            case 2:
                $currencyView = $price;
                break;
            case 3:
                $currencyView = $price.'<span class="tp-currency">'.$currency.'</span>';
                break;
	        case 4:
		        $currencyView = '<span class="tp-currency">'.$currency.'</span>'.$price;
		        break;
        }

        return $currencyView;
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
        if(isset(TPPlugin::$options['config']['nofollow'])) $rel ='rel="nofollow"';
        $target_url = '';
        if(isset(TPPlugin::$options['config']['target_url'])) $target_url ='target="_blank"';
        $redirect = false;
        if(isset(TPPlugin::$options['config']['redirect'])){
            $redirect = true;
        }



        if(isset(TPPlugin::$options['style_table']['table']['hyperlink'])){
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

            switch($type){

                case 0:
                    $textTd = $text;
                    break;
                //button
                case 1:

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
        switch(TPPlugin::$options['config']['distance']){
            case 2:
                $distance = ($distance * 0.62137);
                break;
        }
        $distance = number_format($distance, 2, '.', ' '). ' '
            .TPFieldsLabelTable::getDistanceLabel(TPPlugin::$options['config']['distance']);
        return $distance;
    }



    /**
     * return Trip Class
     * @param $trip_class
     */
    public function getTripClass($trip_class){
        $class = '';
        $class = TPFieldsLabelTable::getTripClassLabel($trip_class);

        return $class;
    }

    /**
     * @param $numberChanges
     * @return string
     */
    public function getNumberChangesView($numberChanges){
        if ($numberChanges > 0)
            return $numberChanges. ' ' .TPFieldsLabelTable::getNumberChangesLabel($numberChanges);
        else
            return TPFieldsLabelTable::getNumberChangesLabel($numberChanges);
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
                //'price'
            ),
            '2' => array(
                'return_at',
                'trip_class',
                'distance',
                //'price'
            ),
            '4' => array(
                'number_of_changes',
                'airline_logo',
                'flight_number',
                'flight',
                'airline',
                //'price'
            ),
            '5' => array(
                'number_of_changes',
                'airline_logo',
                'flight_number',
                'flight',
                'airline',
                //'price'
            ),
            '6' => array(
                'number_of_changes',
                'airline_logo',
                'flight_number',
                'flight',
                'airline',
                //'price'
            ),
            '7' => array(
                'airline_logo',
                'flight_number',
                'flight',
                'airline',
                //'price'
            ),
            '8' => array(
                'airline_logo',
                'return_at',
                'flight_number',
                'flight',
                'airline',
                'origin_destination',
                //'price'
            ),
            '9' => array(
                'airline_logo',
                'return_at',
                'flight_number',
                'flight',
                'airline',
                'origin_destination',
                //'price'
            ),
            '10' => array(),
            '12' => array(
                'found_at',
                'number_of_changes',
                'trip_class',
                'distance',
                'price_distance',
                'origin_destination',
                //'price',
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
                //'price',
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
                //'price'
            ),
        );

        if(in_array($field, $fields[$type])) return 'TP-unessential';
        return '';
    }

    /**
     * @param string $time
     * @return bool|string
     */
    public function tpDate($time = '') {
        $format = !empty(TPPlugin::$options['config']['format_date']) ? TPPlugin::$options['config']['format_date'] : 'd.m.Y';
        $translate = array(
            'am' => 'дп',
            'pm' => 'пп',
            'AM' => 'ДП',
            'PM' => 'ПП',
            'Monday' => 'Понедельник',
            'Mon' => 'Пн',
            'Tuesday' => 'Вторник',
            'Tue' => 'Вт',
            'Wednesday' => 'Среда',
            'Wed' => 'Ср',
            'Thursday' => 'Четверг',
            'Thu' => 'Чт',
            'Friday' => 'Пятница',
            'Fri' => 'Пт',
            'Saturday' => 'Суббота',
            'Sat' => 'Сб',
            'Sunday' => 'Воскресенье',
            'Sun' => 'Вс',
            'January' => 'Января',
            'Jan' => 'Янв',
            'February' => 'Февраля',
            'Feb' => 'Фев',
            'March' => 'Марта',
            'Mar' => 'Мар',
            'April' => 'Апреля',
            'Apr' => 'Апр',
            'May' => 'Мая',
            'May' => 'Мая',
            'June' => 'Июня',
            'Jun' => 'Июн',
            'July' => 'Июля',
            'Jul' => 'Июл',
            'August' => 'Августа',
            'Aug' => 'Авг',
            'September' => 'Сентября',
            'Sep' => 'Сен',
            'October' => 'Октября',
            'Oct' => 'Окт',
            'November' => 'Ноября',
            'Nov' => 'Ноя',
            'December' => 'Декабря',
            'Dec' => 'Дек',
            'st' => 'ое',
            'nd' => 'ое',
            'rd' => 'е',
            'th' => 'ое'
        );
        switch(TPLang::getLang()) {
            case 'ru':

                if (!empty($time)) {
                    if(strpos($format, 'f') !== false){
                        $format = str_replace('f', 'F', $format);
                        return  mb_strtolower(strtr(date($format, $time), $translate));
                    }elseif(strpos($format, 'mm') !== false){
                        $format = str_replace('mm', 'M', $format);
                        return  mb_strtolower(strtr(date($format, $time), $translate));
                    }else{
                        return strtr(date($format, $time), $translate);
                    }

                } else {
                    if(strpos($format, 'f') !== false){
                        $format = str_replace('f', 'F', $format);
                        return  mb_strtolower(strtr(date($format), $translate));
                    }elseif(strpos($format, 'mm') !== false){
                        $format = str_replace('mm', 'M', $format);
                        return  mb_strtolower(strtr(date($format), $translate));
                    }else{
                        return strtr(date($format), $translate);
                    }
                }
                break;
            case 'en':
                if (!empty($time)) {
                    return date($format, $time);
                } else {
                    return date($format);
                }
                break;
            default:
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
        if(isset(TPPlugin::$options['config']['redirect']))
            $redirect = true;
        if($redirect){

            if(isset($_GET['searches'])){
                //error_log('redirect_plugins');
                //error_log(print_r($_GET['searches'], true));


                /*$white_label = TPPlugin::$options['account']['white_label'];
                if(!empty($white_label)){
                    if(strpos($white_label, 'http') === false){
                        $white_label = 'http://'.$white_label;
                    }
                    $white_label = "{$white_label}/flights/".urldecode($_GET['searches']);
                }else{

                    $white_label = TPHostURL::getHostTable();
                    //error_log('0 = '.$white_label);
                    $white_label = "{$white_label}/searches/".urldecode($_GET['searches']);

                }*/

                //error_log('1 = '.$_GET['searches']);
                //error_log('1 = '.urldecode($_GET['searches']));

                $white_label = urldecode($_GET['searches']);

                //header("Location: {$white_label}", true, 302);
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
                $white_label = TPPlugin::$options['account']['white_label'];
                if(!empty($white_label)){
                    if(strpos($white_label, 'http') === false){
                        $white_label = 'http://'.$white_label;
                    }
                    $white_label = "{$white_label}/flights/".urldecode($_GET['searches_ticket']);
                }else{
                    $white_label = TPHostURL::getHostSearchLinkWhenEmptyWhiteLabel(1);
                    $white_label = "{$white_label}/searches/".urldecode($_GET['searches_ticket']);

                }
                //error_log("searches_ticket");
                //error_log($white_label);

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
                $white_label = TPPlugin::$options['account']['white_label_hotel'];
                if(!empty($white_label)){
                    if(strpos($white_label, 'http') === false){
                        $white_label = 'http://'.$white_label;
                        $white_label =  rtrim($white_label, '/' ).'/hotels';
                    }
                }else{
                    $white_label = TPHostURL::getHostSearchLinkWhenEmptyWhiteLabel(2);
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

    /**
     * @param array $args
     * @return string
     */
    public function returnTpLink($args = array()){
        $defaults = array(
            'origin' => false,
            'destination' => false,
            'text_link' => '',
            'origin_date' => 1,
            'destination_date' => 12,
            'one_way' => false,
            'hotel_id' => false,
            'check_in' => 1,
            'check_out' => 12,
            'type' => 0,
            'subid' => ''
        );

        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );

        switch($type){
            case 1:
                $white_label = TPPlugin::$options['account']['white_label'];
                break;
            case 2:
                $white_label = TPPlugin::$options['account']['white_label_hotel'];
                break;
        }

        if(!empty($white_label)){
            if(strpos($white_label, 'http') === false){
                $white_label = 'http://'.$white_label;
            }
        }
        if(!empty($subid)){
            $subid = trim($subid);
            $subid = preg_replace('/[^a-zA-Z0-9_]/', '', $subid);
            //error_log($subid);
        }
        $marker = TPPlugin::$options['account']['marker'];
        $marker = '&marker='.$marker;
        $marker .= TPOption::getExtraMarker();
        $marker = $marker.'_link';
        if(!empty($subid))
            $marker = $marker.'_'.$subid;
        $marker = $marker.'.$69';

        $rel = '';
        if(isset(TPPlugin::$options['config']['nofollow'])) $rel ='rel="nofollow"';
        $target_url = '';
        if(isset(TPPlugin::$options['config']['target_url'])) $target_url ='target="_blank"';
        $redirect = false;
        if(isset(TPPlugin::$options['config']['redirect'])){
            $redirect = true;
        }


        $output = '';
        switch($type){
            case 1:
                if( (int) TPPlugin::$options['config']['after_url'] == 1 )
                    $marker = $marker . '&with_request=true';
                if( ! $white_label || empty( $white_label ) )
                    $white_label = TPHostURL::getHostSearchLinkWhenEmptyWhiteLabel($type);

                $origin = ( false !== $origin ) ? "?origin_iata={$origin}" : '?origin_iata=';
                $destination = ( false !== $destination ) ? "&destination_iata={$destination}" : '&destination_iata=';
                $departure_at = (!empty($origin_date) && false !== $origin_date) ? '&depart_date='.date('Y-m-d', time()+(DAY_IN_SECONDS*$origin_date))  : '';
                $return_at = ( !empty($destination_date) && false !== $destination_date) ? '&return_date='.date('Y-m-d', time()+(DAY_IN_SECONDS*$destination_date)) : '';
                $one_way = "&one_way={$one_way}";


                $url = '/searches/new'.$origin.$destination.$departure_at.$return_at.$one_way.$marker;

                if($redirect) {
                    $home = '';
                    $home = get_option('home');
                    $url = substr($url, 10);
                    $output = '<a class="TPLink" href="'
                        .$home.'/?searches_ticket='.rawurlencode($url).'" '
                        .$target_url.' '
                        .$rel.'>'
                        .$text_link.'</a>';
                }else{
                    $output  = '<a class="TPLink" href="'.$white_label.$url.'" '.$target_url.' '.$rel.'>'
                        .$text_link.'</a>';
                }

                break;
            case 2:

                $locationId = ( false !== $hotel_id ) ? "?{$hotel_id}" : '?locationId=';

                $checkIn = (!empty($check_in) && false !== $check_in) ? '&checkIn='.date('Y-m-d', time()+(DAY_IN_SECONDS*$check_in )) : '';
                $checkOut = ( !empty($check_out) && false !== $check_out) ? '&checkOut='.date('Y-m-d', time()+(DAY_IN_SECONDS*$check_out )) : '';

                $lang = TPHostURL::getHostLangParamSearchHotel();
                $url = $locationId.$checkIn.$checkOut.'&adults=1'.$lang.$marker;

                if( ! $white_label || empty( $white_label ) )
                    $white_label = TPHostURL::getHostSearchLinkWhenEmptyWhiteLabel($type);

                if($redirect) {
                    $home = '';
                    $home = get_option('home');
                    $output = '<a class="TPLink" href="'
                        .$home.'/?searches_hotel='.rawurlencode($url).'" '
                        .$target_url.' '
                        .$rel.'>'
                        .$text_link.'</a>';
                }else{
                    $output  = '<a class="TPLink" href="'.$white_label.$url.'" '.$target_url.' '.$rel.'>'
                        .$text_link.'</a>';
                }
                break;

        }

        return $output;
    }

    public function getSelectField($shortcode){
        //error_log(print_r(TPPlugin::$options['shortcodes'][$shortcode]['selected'], true));
        return array_unique(TPPlugin::$options['shortcodes'][$shortcode]['selected']);
    }

    /**
     * @param $type
     * @param $oneWay
     * @param $rows
     * @param $originIata
     * @param $destinationIata
     * @param $origin
     * @param $destination
     * @param $limit
     * @param $subid
     * @param $currency
     * @return bool|mixed
     */
    public function renderViewIfEmptyTable($type, $oneWay, $rows, $originIata, $destinationIata, $origin, $destination,
                                           $limit, $subid, $currency){

        //error_log('renderViewIfEmptyTable type = '.$type);
        $typeShortcodesSettings = TPPlugin::$options['shortcodes_settings']['empty']['type'];
        $valueShortcodesSettings = TPPlugin::$options['shortcodes_settings']['empty']['value'][$typeShortcodesSettings];
        switch ($typeShortcodesSettings){
            //text
            case 0:
            case 2:
                $valueShortcodesSettings = $this->getMsgValueEmptyTableFromLang($valueShortcodesSettings);
                //error_log($valueShortcodesSettings);
                $valueShortcodesSettings = $this->replaceOriginDestinationShortcodeEmptyTableMsg($valueShortcodesSettings,
                    $origin, $destination);
                $valueShortcodesSettings = $this->replaceLinkButtonShortcodeMsgValueEmptyTable($valueShortcodesSettings, $originIata,
                    $destinationIata, $origin, $destination, $type, $subid, $currency);
                break;
            //search form
            case 1:
                $searchForm = TPSearchFormEmptyTable::getSearchFormByID($valueShortcodesSettings, $originIata, $destinationIata);
                if ($searchForm == false) return false;

                $valueShortcodesSettings = $searchForm;
                break;
        }
        //error_log(print_r($valueShortcodesSettings, true));
        return $valueShortcodesSettings;
    }

    /**
     * @param $msg
     * @param $originIata
     * @param $destinationIata
     * @param $origin
     * @param $destination
     * @param $type
     * @param $subid
     * @return mixed
     */
    public function replaceLinkButtonShortcodeMsgValueEmptyTable($msg, $originIata, $destinationIata, $origin, $destination,
                                                       $type, $subid, $currency){
        //[link]
        //[button]
        $shortcodesMsg = array(
            'link',
            'button'
        );
        $rel = '';
        if(isset(TPPlugin::$options['config']['nofollow'])) $rel ='rel="nofollow"';
        $target_url = '';
        if(isset(TPPlugin::$options['config']['target_url'])) $target_url ='target="_blank"';
        $url = $this->getUrlTable(array(
            'origin' => $originIata,
            'destination' => $destinationIata,
            'departure_at' => date('Y-m-d'),
            'return_at' => '',
            'type' => $type,
            'subid' => $subid,
            'currency' => $currency,
        ) );

        $msg = preg_replace_callback(
            '/\['.$shortcodesMsg[0].'(.*?)\]|\['.$shortcodesMsg[1].'(.*?)\]/',//m
            function($matches) use ($shortcodesMsg, $origin, $destination, $rel, $target_url, $url){
                $title = TPShortcodeView::getAttrTitleShortcodeEmptyTableMsg($matches[0], $origin, $destination);
                $replace = '';
                if(strpos($matches[0], $shortcodesMsg[0]) !== false){
                    $replace = '<a href="'.$url.'" class="TPLinkTable TPEmptyTableLink" '.$target_url.'  '.$rel.'>'.$title.'</a>';
                } else if (strpos($matches[0], $shortcodesMsg[1]) !== false){
                    $replace = '<a href="'.$url.'" class="TP-Plugin-Tables_link TPButtonTable TPEmptyTableButton" '
                        .$target_url.' '.$rel.'>'.$title.'</a>';
                }
                return $replace;
            },
            $msg,
            -1,
            $count
        );
        return $msg;
    }

    /**
     * @param $msg
     * @return mixed
     */
    public function getMsgValueEmptyTableFromLang($msg){
        if (!array_key_exists(TPLang::getLang(), $msg)){
            $msg = $msg[TPLang::getDefaultLang()];
        } else {
            $msg = $msg[TPLang::getLang()];
        }
        return $msg;
    }

    /**
     * @param $msg
     * @param $origin
     * @param $destination
     * @return mixed
     */
    public function replaceOriginDestinationShortcodeEmptyTableMsg($msg, $origin, $destination){
        if(strpos($msg, '{origin}') !== false){
            $msg = str_replace('{origin}', $origin , $msg);
        }
        if(strpos($msg, '{destination}') !== false){
            $msg = str_replace('{destination}', $destination , $msg);
        }
        //error_log($msg);
        return $msg;
    }

    public static function getAttrTitleShortcodeEmptyTableMsg($shortcode, $origin, $destination){
        preg_match('/title=\"(.*?)\"/',  $shortcode, $titleData);
        if (array_key_exists(1, $titleData)){
            //{origin} {destination}
            $title = $titleData[1];
            /*if(strpos($title, '{origin}') !== false){
                $title = str_replace('{origin}', $origin , $title);
            }
            if(strpos($title, '{destination}') !== false){
                $title = str_replace('{destination}', $destination , $title);
            }*/
            return $title;
        }
        return '';
    }




}

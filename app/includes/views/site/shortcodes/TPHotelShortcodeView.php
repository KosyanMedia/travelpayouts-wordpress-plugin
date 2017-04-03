<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 22.03.17
 * Time: 12:58 PM
 */

namespace app\includes\views\site\shortcodes;

use \app\includes\TPPlugin;
use \app\includes\common\TPCurrencyUtils;
use \app\includes\common\TPLang;
use \app\includes\common\TPAutocompleteReplace;
use \app\includes\common\TPHostURL;

class TPHotelShortcodeView //extends TPShortcodeView
{
    public function renderTable($args = array()) {
        $defaults = array(
            'rows' => array(),
            'city' => false,
            'title' => '',
            'paginate' => true,
            'off_title' => '',
            'type' => 'all',
            'day' => 3,
            'star' => 'all',
            'rating_from' => 7,
            'rating_to' => 10,
            'distance_from' => 0,
            'distance_to' => 3,
            'number_results' => 20,
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'return_url' => false,
            'language' => TPLang::getLang(),
            'type_selections' => 'popularity',
            'subid' => '',
            'shortcode' => false,
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $html = '';
        if ($shortcode == false) return false;

        if (count($rows) < 1 || $rows == false) return $this->renderViewIfEmptyTable();

        $html .= '<div class="TP-Plugin-Tables_wrapper clearfix TP-HotelsTableWrapper">'
                        .$this->renderTitleTable($off_title, $title, $shortcode, $city)
                    .'<table class="TPTableShortcode TP-Plugin-Tables_box  TP-rwd-table TP-rwd-table-avio"
                        data-paginate="'.$paginate.'"
                        data-paginate_limit="'.TPPlugin::$options['shortcodes_hotels'][$shortcode]['paginate']
                        .'" data-sort_column="'.$this->getSortColumn($shortcode).'">'
                        .$this->renderHeadTable($shortcode)
                        .$this->renderBodyTable($shortcode, $city, $rows, $subid, $number_results, $currency)
                    .'</table>
                </div>';

        return $html;
    }


    public function getSortColumn($shortcode){
        return TPPlugin::$options['shortcodes_hotels'][$shortcode]['sort_column'];
    }

    /**
     * @param $shortcode
     * @param $city
     * @param $rows
     * @param $subid
     * @param $limit
     * @param $currency
     * @return string
     *
     *
     * name => Название
     * stars => Звезды
     * distance => Расстояние до центра
     * rating => Оценка пользователей
     * address => Адрес
     * property_type => Тип
     * popularity => Популярность
     * price_from => Цена от
     * price_avg => Средняя цена
     * button => Кнопка
     */
    public function renderBodyTable($shortcode, $city, $rows, $subid, $limit, $currency){

        //error_log("renderBodyTable subid = ".$subid);
        if(!empty($subid)){
            $subid = trim($subid);
            $subid = preg_replace('/[^a-zA-Z0-9_]/', '', $subid);
            //error_log($subid);
        }

        $bodyTable = '';
        $bodyTable .= '<tbody>';
        $count_row = 0;
        foreach($rows as $key_row => $row){
            $count_row++;
            $bodyTable .= '<tr>';
            $count = 0;

            // get Url
            $hotelURL = '';
            switch($shortcode){
                 case 1:
                 case 2:
                     $hotelURL = $this->getUrlTable($shortcode, $city,
                         $row['hotel_id'], false, false, $currency);
                     break;

                 default:
                     $hotelURL = '';
             }

             error_log($hotelURL);
            foreach($this->getSelectField($shortcode) as $key=>$selected_field){
                 $count++;



                 /*
                  * 'name',
                     'stars',
                     'rating',
                     'distance',
                     'price_pn',
                     'old_price_pn',
                     'discount',
                     'old_price_and_discount',
                     'old_price_and_new_price',
                     'button',
                  */
                    //Td
                    switch($selected_field){
                        // name => Название
                        case "name":
                            $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent">'
                                    .$row['name']
                                    .'</p>'
                                .'</td>';
                            break;
                        // stars => Звезды
                        case "stars":
                            $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent">'
                                .$row['stars']
                                .'</p>'
                                .'</td>';
                            break;

                        // rating => Оценка пользователей
                        case "rating":
                            $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent"> '
                                .$row['rating']
                                .'</p>'
                                .'</td>';
                            break;
                        // distance => Расстояние до центра
                        case "distance":
                            $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent">'
                                .$row['distance']
                                .'</p>'
                                .'</td>';
                            break;
                        // price_pn => Цена за ночь
                        case "price_pn":
                            $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent"> price_pn '
                                //.$row['address']
                                .'</p>'
                                .'</td>';
                            break;
                        // old_price_pn => Цена до скидки
                        case "old_price_pn":
                            $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent"> old_price_pn'
                                //.$row['property_type']
                                .'</p>'
                                .'</td>';
                            break;
                        // discount => Скидка
                        case "discount":
                            $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent"> Скидка'
                                .'</p>'
                                .'</td>';
                            break;
                        // old_price_and_discount => Старая цена и скидка
                        case "old_price_and_discount":
                            $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent"> Старая цена и скидка'
                                    //.$row['last_price_info']['price']
                                .'</p>'
                                .'</td>';
                            break;
                        // old_price_and_new_price => Старая и новая цена
                        case "old_price_and_new_price":
                            $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent"> Старая и новая цена'

                                .'</p>'
                                .'</td>';
                            break;
                        // button => Кнопка
                        case "button":
                            $bodyTable .= '<td data-th="'.$this->getTableTheadTDFieldLabel($selected_field).'"
                                class="TP'.$selected_field.'Td '.$this->tdClassHidden($shortcode, $selected_field).'">
                                    <p class="TP-tdContent"> button'

                                .'</p>'
                                .'</td>';
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
     * adults — число взрослых;
     * children[] — возраст каждого ребенка (может быть несколько). Так же можно указать в виде
     *              children=1,2,3, где 1, 2 и 3 — возраста детей;
     * checkIn & checkOut — дата въезда/выезда в формате yyyy-mm-dd. Вместо точной даты въезда и выезда
     *                      можно указать параметр autoDates=1. В этом случае поиск будет произведен на
     *                      ближайшие даты;
     * currency — валюта (3 буквы ISO-кода), в которой отображается стоимость номера;
     * marker — партнерский маркер;
     * language — язык результата, поддерживаемые: ru-ru, en-us, de-de, es-es, fr-fr, th-th, pl-pl, it-it.
     * Пункт назначение указывается одним из следующих вариантов:
     * destination=MOW — IATA код города (только буквы верхнего регистра);
     * destination=paris — название города;
     * destination=hotel%20metropole — название отеля;
     * locationId=123 — id города;
     * hotelId=8992 — id отеля.
     * https://search.hotellook.com/?locationId=12153&checkIn=2016-12-15&checkOut=2016-12-19&adults=2&children=7,2&language=ru-ru¤cy=rub&marker=УкажитеЗдесьВашМаркер#f%5Btypes%5D=7
     */
    public function getUrlTable($shortcode, $locationId, $hotelId, $checkIn, $checkOut, $currency){
        $white_label = '';
        $language = '';
        $URL = '';
        $white_label = TPPlugin::$options['account']['white_label_hotel'];
        if(!empty($white_label)){
            if(strpos($white_label, 'http') === false){
                $white_label = 'http://'.$white_label;
            }
        }
        if( ! $white_label || empty( $white_label ) ){
            $white_label = TPHostURL::getHostHotel();
            $language = '&language='.$white_label['language'];
            $white_label = 'https://'.$white_label['host'].'/';
        }
        $URL = '?locationId='.$locationId;
        if ((int) TPPlugin::$options['config']['hotel_after_url'] == 1){
            $URL .= '&hotelId='.$hotelId;
        }

        if ($shortcode !== 1){
            if ($checkIn !== false){
                $URL .= '&checkIn'.$checkIn;
            }

            if ($checkOut !== false){
                $URL .= '&checkOut'.$checkOut;
            }
        }


        return $white_label.$URL;
    }

    public function getMarker(){

    }

    /**
     * @param $shortcode
     * @return string
     *
     * name => Название
     * stars => Звезды
     * distance => Расстояние до центра
     * rating => Оценка пользователей
     * address => Адрес
     * property_type => Тип
     * popularity => Популярность
     * price_from => Цена от
     * price_avg => Средняя цена
     * button => Кнопка
     */
    public function renderHeadTable($shortcode){
        $headTable = '';

        /*
         * 'name',
            'stars',
            'rating',
            'distance',
            'price_pn',
            'old_price_pn',
            'discount',
            'old_price_and_discount',
            'old_price_and_new_price',
            'button',
         */

        $headTable .= '<thead class="TP-Plugin-Tables_box_thead"><tr>';
        foreach($this->getSelectField($shortcode) as $key=>$selected_field){
            switch($selected_field) {
                //name => Название
                case "name":
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .$this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                // stars => Звезды
                case "stars":
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .$this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                // rating => Оценка пользователей
                case "rating":
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .$this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                // distance => Расстояние до центра
                case "distance":
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .$this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;

                // price_pn => Цена за ночь
                // [last_price_info][price_pn] => Цена за ночь

                case "price_pn":
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .$this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                // old_price_pn => Цена до скидки
                //  [last_price_info][old_price_pn] => Цена до скидки
                case "old_price_pn":
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .$this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                // discount => Скидка
                case "discount":
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .$this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                // old_price_and_discount => Старая цена и скидка
                //  [last_price_info][price_pn]  -  [last_price_info][discount] %
                case "old_price_and_discount":
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .$this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                // old_price_and_new_price => Старая и новая цена
                //  [last_price_info][old_price_pn]  [last_price_info][price_pn]
                case "old_price_and_new_price":
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .$this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                // button => Кнопка
                case "button":
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead tp-date-column">'
                        .$this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;
                default:
                    $headTable .= '<td class="TP'.$selected_field.'Td '
                        .$this->tdClassHidden($shortcode, $selected_field)
                        .' TPTableHead">'
                        . $this->getTableTheadTDFieldLabel($selected_field)
                        .'<i class="TP-sort-chevron fa"></i>'
                        .' </td>';
                    break;

            }
        }
        $headTable .= '</tr></thead>';
        return $headTable;
    }

    /**
     * @param $shortcode
     * @return array
     */
    public function getSelectField($shortcode){
        //error_log(print_r(\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['selected'], true));
        return array_unique(TPPlugin::$options['shortcodes_hotels'][$shortcode]['selected']);
    }

    /**
     * @param $shortcode
     * @param $field
     * @return string
     */
    public function tdClassHidden($shortcode, $field){
        /*
         * Скрывать (в порядке неважности): Тип, Скидка, Старая Цена, Рейтинг, Расстояние до центра
         */
        $fields = array(
            '1' => array(
                'rating',
                'distance',
                'price_pn',
                'old_price_pn',
                'old_price_and_discount',
                'old_price_and_new_price',

            ),
            '2' => array(
                'rating',
                'distance',
                'price_pn',
            )
        );
        if(in_array($field, $fields[$shortcode])) return 'TP-unessential';
        return '';
    }

    /**
     * @param $fieldKey
     * @return string
     */
    public function getTableTheadTDFieldLabel($fieldKey)
    {
        $fieldLabel = "";
        if(isset(TPPlugin::$options['local']['hotels_fields'][TPLang::getLang()]['label'][$fieldKey])){
            $fieldLabel = TPPlugin::$options['local']['hotels_fields'][TPLang::getLang()]['label'][$fieldKey];
        }else{
            $fieldLabel = TPPlugin::$options['local']['hotels_fields'][TPLang::getDefaultLang()]['label'][$fieldKey];
        }
        return $fieldLabel;
    }

    /**
     * @return string
     */
    public function renderViewIfEmptyTable(){
        return 'Empty table';
    }

    /**
     * @param $off_title
     * @param $title
     * @param $shortcode
     * @param $city
     * @return string
     */
    public function renderTitleTable($off_title, $title, $shortcode, $city){
        if($off_title !== 'true'){
            if(empty($title)) {
                if(isset(TPPlugin::$options['shortcodes_hotels'][$shortcode]['title'][TPLang::getLang()])){
                    $title = TPPlugin::$options['shortcodes_hotels'][$shortcode]['title'][TPLang::getLang()];
                }else{
                    $title = \app\includes\TPPlugin::$options['shortcodes_hotels'][$shortcode]['title'][TPLang::getDefaultLang()];
                }

                /*if(\app\includes\TPPlugin::$options['local']['title_case']['destination'] == 'vi'){
                    $title = str_replace('в destination', 'destination', $title);
                }*/
            }
            if(!empty($title)){

                /*if (TPLang::getLang() == "ru"){
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
                }*/

            }
            return '<'.\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['tag'].' class="TP-TitleTables">'.$title.'</'.\app\includes\TPPlugin::$options['shortcodes'][$shortcode]['tag'].'>';
        }
        return '';
    }
}
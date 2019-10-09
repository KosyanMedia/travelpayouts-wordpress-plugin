<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 22:57
 */

namespace app\includes\models\admin\menu;

use app\includes\common\TpPluginHelper;
use core\helpers\TPDbHelper;
use core\models\TPOWPTableInterfaceModel;
use core\models\TPOWPTableModel;
use core\TPRequest;

class TPSearchFormsModel extends TPOWPTableModel implements TPOWPTableInterfaceModel
{
    public static $tableName = 'tp_search_shortcodes';

    public function __construct()
    {
        add_action('wp_ajax_delete_all', [&$this, 'deleteAll']);
        //add_action('wp_ajax_nopriv_delete_all',array( &$this, 'deleteAll'));
    }

    /**
     * @param $form
     * @return string
     */
    public function getTypeForm($form)
    {
        $type = '';
        preg_match('/"form_type":\s*"(.*?)"/', $form, $matches);
        if (isset($matches[1]) && !empty($matches[1])) {
            return $matches[1];
        }
        return $type;
    }

    /**
     * @param $type
     * @param $form
     * @param $origin_iata
     * @param $destination_iata
     * @param $hotel_city
     * @return mixed
     */
    public function replaceDefault($type, $form, $origin_iata, $destination_iata, $hotel_city)
    {
        switch ($type) {
            case 'avia':
                $form = $this->replaceOrigin($origin_iata, $form);
                $form = $this->replaceDestination($destination_iata, $form);
                break;
            case 'hotel':
                $form = $this->replaceHotelCity($hotel_city, $form);
                break;
            case 'avia_hotel':
                $form = $this->replaceOrigin($origin_iata, $form);
                $form = $this->replaceDestination($destination_iata, $form);
                $form = $this->replaceHotelCity($hotel_city, $form);
                break;
        }
        return $form;

    }

    /**
     * @param $hotel_city
     * @param $form
     * @return mixed
     */
    public function replaceHotelCity($hotel_city, $form)
    {
        if (!empty($hotel_city)) {
            preg_match('/\{(.+)\}/', $hotel_city, $hotel_iata);
            if (!empty($hotel_iata[1])) {
                $params = explode(', ', $hotel_iata[1]);
                if (TpPluginHelper::count($params) == 6) {
                    //error_log($params[4]);
                    $hotel_city_text = '';
                    switch ($params[4]) {
                        case 'hotel':
                            //error_log('hotel11111111');
                            $hotel_city_text = '"hotel": {
                                            "name": "' . $params[0] . '",
                                            "location": "' . $params[1] . ', ' . $params[2] . '",
                                            "hotels_count": "",
                                            "search_id": "' . $params[3] . '",
                                            "search_type": "' . $params[4] . '",
                                            "country_name": "' . $params[5] . '"
                                        }';
                            break;
                        case 'city':
                            //error_log('city11111111');
                            $hotel_city_text = '"hotel": {
                                            "name": "' . $params[0] . '",
                                            "location": "' . $params[1] . '",
                                            "hotels_count": "' . $params[2] . '",
                                            "search_id": "' . $params[3] . '",
                                            "search_type": "' . $params[4] . '",
                                            "country_name": "' . $params[5] . '"
                                        }';
                            break;
                    }
                    //error_log('$hotel_city_text = ' . $hotel_city_text);
                    $form = preg_replace('/"hotel": \{.*?\}/s', $hotel_city_text, $form);
                    $form = preg_replace('/"hotel": \".*?\"/s', $hotel_city_text, $form);
                }
            }
        }
        return $form;
    }

    /**
     * @param $destination_iata
     * @param $form
     * @return mixed
     */
    public function replaceDestination($destination_iata, $form)
    {
        if (!empty($destination_iata)) {
            preg_match('/\[(.+)\]/', $destination_iata, $to_iata);
            if (!empty($to_iata[1])) {
                $to_city = explode(',', $destination_iata);
                $destination = '"destination": {
                                            "name": "' . $to_city[0] . '",
                                            "iata": "' . $to_iata[1] . '"
                                        }';
                $form = preg_replace('/"destination": \{.*?\}/s', $destination, $form);
                $form = preg_replace('/"destination": \".*?\"/s', $destination, $form);
            }

        }
        return $form;
    }

    /**
     * @param $origin_iata
     * @param $form
     * @return mixed
     */
    public function replaceOrigin($origin_iata, $form)
    {
        if (!empty($origin_iata)) {
            preg_match('/\[(.+)\]/', $origin_iata, $from_iata);
            if (!empty($from_iata[1])) {
                $from_city = explode(',', $origin_iata);
                $origin = '"origin": {
                                            "name": "' . $from_city[0] . '",
                                            "iata": "' . $from_iata[1] . '"
                                        }';
                $form = preg_replace('/"origin": \{.*?\}/s', $origin, $form);
                $form = preg_replace('/"origin": \".*?\"/s', $origin, $form);
            }

        }
        return $form;
    }


    /**
     * @param $searchForms
     * @return mixed
     */
    public static function importSearchForm($searchForms)
    {
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        if (TpPluginHelper::count($searchForms) < 1 || $searchForms == false) {
            return;
        }
        foreach ($searchForms as $searchForm) {
            $wpdb->insert($tableName, $searchForm);
        }
        return true;
    }


    public function getTableName()
    {
        $tableName = '';
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        return $tableName;
    }


    public function insert($data)
    {
        global $wpdb;
        $inputData = $this->getModelByRequestData(true);
        if ($inputData) {
            $tableName = $wpdb->prefix . self::$tableName;
            $wpdb->insert($tableName, $inputData);
        }
    }


    public function update($data)
    {
        global $wpdb;

        $inputData = $this->getModelByRequestData();
        if ($inputData) {
            $tableName = $wpdb->prefix . self::$tableName;
            if ($id = TPRequest::post('search_shortcodes_id')) {

                $whereQuery = ['id' => $id];
                $whereQueryFormat = TPDbHelper::getFormat($whereQuery, ['id' => '%d']);

                $wpdb->update($tableName, $inputData, $whereQuery, TPDbHelper::getFormat($inputData, []), $whereQueryFormat);
            }
        }
    }

    /**
     * Получаем модель из POST параметров
     * @param bool $isNew
     * @return array|null
     */
    protected function getModelByRequestData($isNew = false)
    {
        if (
            TpRequest::post('search_shortcode_code_form') &&
            TpRequest::post('search_shortcode_title')
        ) {
            $code_form = wp_unslash(TPRequest::post('search_shortcode_code_form', ''));
            $type_form = $this->getTypeForm($code_form);

            $code_form = $this->replaceDefault(
                $type_form,
                $code_form,
                TPRequest::post('search_shortcode_from', ''),
                TPRequest::post('search_shortcode_to', ''),
                TPRequest::post('search_shortcode_hotel_city', '')
            );

            $inputData = [
                'title' => TPRequest::post('search_shortcode_title', ''),
                'date_add' => time(),
                'type_shortcode' => TPRequest::post('search_shortcode_type', ''),
                'code_form' => $code_form,
                'from_city' => TPRequest::post('search_shortcode_from', ''),
                'to_city' => TPRequest::post('search_shortcode_to', ''),
                'hotel_city' => TPRequest::post('search_shortcode_hotel_city', ''),
                'type_form' => $type_form,
            ];
            if ($isNew) {
                $inputData['slug'] = $this->get_nextId() . substr(uniqid('', true), -7);
            }
            return $inputData;
        }
        return null;
    }

    public function deleteAll()
    {
        // TODO: Implement delete() method.
        global $wpdb;

        if (TPRequest::post('type') === 'search_shortcodes' && $ids = TPRequest::post('id')) {
            $tableName = $wpdb->prefix . self::$tableName;
            if (is_array($ids)) {
                foreach ($ids as $id) {
                    $wpdb->query('DELETE FROM ' . $tableName . " WHERE id = '" . (int)$id . "'");
                }
            }
        }
    }

    public function deleteId($id)
    {
        // TODO: Implement deleteId() method.
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        $wpdb->query('DELETE FROM ' . $tableName . " WHERE id = '" . $id . "'");
    }

    public function query()
    {
        // TODO: Implement query() method.
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
    }

    /**
     * @return bool
     */
    public function get_data()
    {
        // TODO: Implement get_data() method.
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        $data = $wpdb->get_results('SELECT * FROM ' . $tableName . ' ORDER BY date_add DESC', ARRAY_A);

        return TpPluginHelper::count($data) > 0
            ? $data
            : false;
    }

    /**
     * @param $id
     * @return bool
     */
    public function get_dataID($id)
    {
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;

        $query = $wpdb->prepare('SELECT * FROM ' . $tableName . ' WHERE id=%d', $id);
        $data = $wpdb->get_row($query, ARRAY_A);

        return TpPluginHelper::count($data) > 0
            ? $data
            : false;
    }

    public static function getData()
    {
        // TODO: Implement get_data() method.
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        $data = $wpdb->get_results('SELECT * FROM ' . $tableName . ' ORDER BY date_add DESC', ARRAY_A);

        return TpPluginHelper::count($data) > 0
            ? $data
            : false;
    }

    public static function getAllSearchForms()
    {
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        $data = $wpdb->get_results(
            $wpdb->prepare('SELECT * FROM ' . $tableName . ' WHERE type_shortcode = %d ORDER BY date_add DESC', 0),
            ARRAY_A);

        return TpPluginHelper::count($data) > 0
            ? $data
            : false;
    }

    public static function getSearchFormByID($id)
    {
        global $wpdb;
        var_dump('\ss');
        $tableName = $wpdb->prefix . self::$tableName;
        $data = $wpdb->get_row(
            $wpdb->prepare('SELECT * FROM ' . $tableName . ' WHERE id = %d ', $id),
            ARRAY_A);

        return TpPluginHelper::count($data) > 0
            ? $data
            : false;
    }

    /**
     *
     */
    public static function createTable()
    {
        // TODO: Implement createTable() method.
        $version = get_option(TPOPlUGIN_TABLE_SF_VERSION);
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        $sql = 'CREATE TABLE ' . $tableName . '(
                  id int(11) NOT NULL AUTO_INCREMENT,
                  title varchar(255) NOT NULL,
                  date_add int(11) NOT NULL,
                  type_shortcode varchar(255) NOT NULL,
                  code_form text NOT NULL,
                  from_city varchar(255) NOT NULL,
                  to_city varchar(255) NOT NULL,
                  hotel_city varchar(255) NOT NULL,
                  type_form varchar(255) NOT NULL,
                  slug varchar(255) NOT NULL,
                  PRIMARY KEY (id)
                ) CHARACTER SET utf8 COLLATE utf8_general_ci;';
        if ($version != TPOPlUGIN_DATABASE) {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            if ($wpdb->get_var("show tables like '$tableName'") != $tableName) {
                dbDelta($sql);
            } else {
                $data = self::getData();
                //error_log(print_r($data, true));
                self::deleteTable();
                dbDelta($sql);
                if ($data != false) {
                    $rows = [];
                    foreach ($wpdb->get_col('DESC ' . $tableName) as $column_name) {
                        foreach ($data as $key => $values) {
                            $rows[$key][$column_name] = (isset($values[$column_name])) ? $values[$column_name] : '';
                        }

                    }
                    //error_log('$rows = '.print_r($rows, true));
                    foreach ($rows as $row) {
                        $wpdb->insert($tableName, $row);
                    }
                }
            }
            update_option(TPOPlUGIN_TABLE_SF_VERSION, TPOPlUGIN_DATABASE);
        }

    }

    /**
     *
     */
    public static function deleteTable()
    {
        // TODO: Implement deleteTable() method.
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        $wpdb->query("DROP TABLE IF EXISTS $tableName");
    }

    /**
     * @return mixed
     */
    public function get_nextId()
    {
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        $next_id = $wpdb->get_var('SELECT MAX(id) FROM ' . $tableName);
        $next_id++;
        return $next_id;
    }


}

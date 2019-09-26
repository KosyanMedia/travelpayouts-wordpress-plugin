<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 28.01.16
 * Time: 11:13
 */

namespace app\includes\models\admin\menu;

use app\includes\common\TpPluginHelper;
use app\includes\common\TPUpdateOptions;
use core\helpers\TPDbHelper;
use core\models\TPOWPTableInterfaceModel;
use core\models\TPOWPTableModel;
use core\TPRequest;

class TPAutoReplacLinksModel extends TPOWPTableModel implements TPOWPTableInterfaceModel
{
    public static $tableName = 'tp_auto_replac_links';

    public function __construct()
    {
        add_action('wp_ajax_delete_all', [&$this, 'deleteAll']);
        //add_action('wp_ajax_nopriv_delete_all',array( &$this, 'deleteAll'));

        //add_action('wp_ajax_replace_all',      array( &$this, 'replaceAll'));
        //add_action('wp_ajax_nopriv_replace_all',array( &$this, 'replaceAll'));

        add_action('wp_ajax_import_csv', [&$this, 'importCsv']);
        //add_action('wp_ajax_nopriv_import_csv',array( &$this, 'importCsv'));
    }

    public static function createTable()
    {
        // TODO: Implement createTable() method.
        $version = get_option(TPOPlUGIN_TABLE_ARL_VERSION);
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        $sql = 'CREATE TABLE ' . $tableName . '(
                  id int(11) NOT NULL AUTO_INCREMENT,
                  arl_url varchar(255) NOT NULL,
                  arl_anchor text NOT NULL,
                  arl_event text NOT NULL,
                  arl_nofollow int(11) NOT NULL,
                  arl_replace int(11) NOT NULL,
                  arl_target_blank int(11) NOT NULL,
                  date_add int(11) NOT NULL,
                  PRIMARY KEY (id)
                ) CHARACTER SET utf8 COLLATE utf8_general_ci;';
        //
        if ($version != TPOPlUGIN_DATABASE) {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            if ($wpdb->get_var("show tables like '$tableName'") != $tableName) {
                dbDelta($sql);
            } else {
                $data = self::getData();
                self::deleteTable();
                dbDelta($sql);
                if ($data != false) {
                    $rows = [];
                    foreach ($wpdb->get_col('DESC ' . $tableName, 0) as $column_name) {
                        foreach ($data as $key => $values) {
                            $rows[$key][$column_name] = (isset($values[$column_name])) ? $values[$column_name] : '';
                        }

                    }
                    foreach ($rows as $row) {
                        $wpdb->insert($tableName, $row);
                    }
                }
            }
            update_option(TPOPlUGIN_TABLE_ARL_VERSION, TPOPlUGIN_DATABASE);
        }
    }

    public static function deleteTable()
    {
        // TODO: Implement deleteTable() method.
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        $wpdb->query("DROP TABLE IF EXISTS $tableName");
    }

    public function insert($data)
    {
        global $wpdb;
        $inputData = $this->getInsertOrUpdateData();

        if ($inputData) {
            $tableName = $wpdb->prefix . self::$tableName;
            $wpdb->insert($tableName, $inputData);
        }
    }

    public function update($data)
    {
        global $wpdb;

        $inputData = $this->getInsertOrUpdateData();
        if ($inputData) {
            $tableName = $wpdb->prefix . self::$tableName;
            if ($linkId = TPRequest::post('link_id')) {

                $whereQuery = ['id' => $linkId];
                $whereFormat = TPDbHelper::getFormat($whereQuery, ['id' => '%d']);
                $inputDataFormat = TPDbHelper::getFormat($inputData, [
                    'arl_nofollow' => '%d',
                    'arl_replace' => '%d',
                    'arl_target_blank' => '%d',
                ]);
                $wpdb->update($tableName, $inputData, $whereQuery, $inputDataFormat, $whereFormat);
            }
        }

    }

    protected function getInsertOrUpdateData()
    {
        if (
            TPRequest::post('arl_url') &&
            TPRequest::post('arl_anchor')
        ) {
            $inputData = [
                'arl_url' => TPRequest::post('arl_url'),
                'arl_anchor' => TPRequest::post('arl_anchor'),
                'arl_event' => TPRequest::post('arl_event', ''),
                'arl_nofollow' => TPRequest::post('arl_nofollow') ? 1 : 0,
                'arl_replace' => TPRequest::post('arl_replace') ? 1 : 0,
                'arl_target_blank' => TPRequest::post('arl_target_blank') ? 1 : 0,
                'date_add' => time(),
            ];
            $inputData = TPUpdateOptions::sanitizeLinks($inputData);
            $inputData = TPUpdateOptions::unescapeOptions($inputData);
            return $inputData;
        }
        return null;
    }

    public function deleteAll()
    {
        // TODO: Implement deleteAll() method.
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        if (TPRequest::post('type') === 'arl_link' && $itemsIdList = TpRequest::post('id')) {
            foreach ($itemsIdList as $id) {
                $query = $wpdb->prepare("DELETE FROM {$tableName} WHERE id = %s", [$id]);
                $wpdb->query($query);
            }
        }
    }

    public function get_dataByArrayId($arrayId)
    {
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;

        $query = $wpdb->prepare("SELECT * FROM {$tableName} WHERE id IN (%s)", [$arrayId]);
        $data = $wpdb->get_results($query, ARRAY_A);


        return TpPluginHelper::count($data) > 0
            ? $this->getDataAutoReplacLinks($data)
            : false;
    }


    public function importCsv()
    {
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        if ($postValue = TPRequest::post('value')) {
            //error_log(print_r($_POST, true));
            //$csv = array_map('str_getcsv', $_POST['value']);
            //error_log(print_r($csv, true));
            foreach ($postValue as $key => $value) {
                if ($key == 0) {
                    continue;
                }
                $inputData = [
                    'arl_url' => (isset($value[0])) ? $value[0] : '',
                    'arl_anchor' => (isset($value[1])) ? $value[1] : '',
                    'arl_event' => (isset($value[2])) ? $value[2] : '',
                    'arl_nofollow' => (isset($value[3])) ? $value[3] : 0,
                    'arl_replace' => (isset($value[4])) ? $value[4] : 0,
                    'arl_target_blank' => (isset($value[5])) ? $value[5] : 0,
                    'date_add' => time(),
                ];
                $inputData = TPUpdateOptions::sanitizeLinks($inputData);
                $inputData = TPUpdateOptions::unescapeOptions($inputData);

                $wpdb->insert($tableName, $inputData);
            }


        }
    }


    public function deleteId($id)
    {
        // TODO: Implement deleteId() method.
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        $query = $wpdb->prepare("DELETE FROM {$tableName} WHERE id = %s", [$id]);

        $wpdb->query($query);
    }

    public function query()
    {
        // TODO: Implement query() method.
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
     * @return array|bool
     */
    public function getDataAutoReplacLinks($data = false)
    {
        if ($data == false) {
            $data = $this->get_data();
        }
        if ($data == false) {
            return false;
        }
        $dataResult = [];
        foreach ($data as $item) {
            $dataResult[$item['id']]['data']['url'] = $item['arl_url'];
            $dataResult[$item['id']]['data']['nofollow'] = ($item['arl_nofollow'] == 1) ? 'rel="nofollow"' : '';
            $dataResult[$item['id']]['data']['target'] = ($item['arl_target_blank'] == 1) ? 'target="_blank"' : '';
            $dataResult[$item['id']]['data']['replace'] = $item['arl_replace'];
            $dataResult[$item['id']]['anchor'] = explode(',', trim(str_replace(["\r\n", "\r", "\n"], '', $item['arl_anchor']), ','));
            $dataResult[$item['id']]['data']['event'] = (!empty($item['arl_event'])) ? 'onclick="' . $item['arl_event'] . '"' : '';
        }
        return $dataResult;

    }

    /**
     * @param $id
     * @return bool
     */
    public function get_dataID($id)
    {
        global $wpdb;
        $tableName = $wpdb->prefix . self::$tableName;
        $data = $wpdb->get_row('SELECT * FROM ' . $tableName . ' WHERE id= ' . $id, ARRAY_A);

        return TpPluginHelper::count($data) > 0
            ? $data
            : false;
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

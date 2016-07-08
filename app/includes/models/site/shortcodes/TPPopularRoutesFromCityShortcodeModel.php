<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:33
 */
namespace app\includes\models\site\shortcodes;
class TPPopularRoutesFromCityShortcodeModel extends \app\includes\models\site\TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        if(\app\includes\TPPlugin::$options['local']['currency'] != 'RUB') return false;
        $defaults = array('origin' => false, 'departure_at' => false, 'return_at' => false,
            'currency' => 'RUB', 'limit' => false, 'title' => '', 'paginate' => true,
            'off_title' => '', 'subid' => '');
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        $attr = array('origin' => $origin,
            'departure_at' => $departure_at, 'return_at' => $return_at,
            'currency' => $this->typeCurrency());
        $name_method = "***************".__METHOD__."***************";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        $method = __CLASS__." -> ". __METHOD__." -> ".__LINE__
            ." 8. Популярные направления из города ";
        if(TPOPlUGIN_ERROR_LOG)
            error_log($method);
        if ($this->cacheSecund()) {
            if(TPOPlUGIN_ERROR_LOG)
                error_log("{$method} cache");
            if (false === ($return = get_transient($this->cacheKey('9',
                    $origin)))) {
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false");
                $return = \app\includes\TPPlugin::$TPRequestApi->get_popular_routes_from_city($attr);
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache false ".print_r($return, true));
                //if (!$return)
                //    return false;
                $cacheSecund = 0;
                if( ! $return ) {
                    $return = array();
                    $cacheSecund = $this->cacheEmptySecund();
                } else {
                    $cacheSecund = $this->cacheSecund();
                }
                if(TPOPlUGIN_ERROR_LOG)
                    error_log("{$method} cache secund = ".$cacheSecund);
                set_transient($this->cacheKey('9',
                    $origin), $return, $cacheSecund);
            }
        } else {
            $return = \app\includes\TPPlugin::$TPRequestApi->get_popular_routes_from_city($attr);
            if (!$return)
                return false;
        }
        if(TPOPlUGIN_ERROR_LOG)
            error_log("{$method} rows = ".print_r($return, true));
        //error_log("{$method} rows = ".print_r($return, true));
        if(TPOPlUGIN_ERROR_LOG)
            error_log($name_method);
        return array('rows' => $this->iataAutocomplete($return, 9), 'origin' => $this->iataAutocomplete($origin, 0),
                'type' => 9, 'title' => $title, 'origin_iata' => $origin, 'paginate' => $paginate,
            'off_title' => $off_title, 'subid' => $subid, 'currency' => $this->typeCurrency());

    }
}
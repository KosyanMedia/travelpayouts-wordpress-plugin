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
        if(\app\includes\TPPlugin::$options['local']['currency'] != 1) return false;
        $defaults = array('origin' => false, 'departure_at' => false, 'return_at' => false,
            'currency' => 'RUB', 'limit' => false, 'title' => '', 'paginate' => true,
            'off_title' => '', 'subid' => '');
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        $attr = array('origin' => $origin,
            'departure_at' => $departure_at, 'return_at' => $return_at,
            'currency' => $this->typeCurrency());
        if ($this->cacheSecund()) {
            if (false === ($return = get_transient($this->cacheKey('9',
                    $origin)))
            ) {
                $return = \app\includes\TPPlugin::$TPRequestApi->get_popular_routes_from_city($attr);
                if (!$return)
                    return false;
                set_transient($this->cacheKey('9',
                    $origin), $return, $this->cacheSecund());
            }
        } else {
            $return = \app\includes\TPPlugin::$TPRequestApi->get_popular_routes_from_city($attr);
            if (!$return)
                return false;
        }

        return array('rows' => $this->iataAutocomplete($return, 9), 'origin' => $this->iataAutocomplete($origin, 0),
                'type' => 9, 'title' => $title, 'origin_iata' => $origin, 'paginate' => $paginate,
            'off_title' => $off_title, 'subid' => $subid);

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 12:33
 */

class TPPopularRoutesFromCityShortcodeModel extends TPShortcodesChacheModel{

    public function get_data($args = array())
    {
        // TODO: Implement get_data() method.
        if(TPPlugin::$options['local']['currency'] != 1) return false;
        $defaults = array('origin' => false, 'departure_at' => false, 'return_at' => false,
            'currency' => 'RUB', 'limit' => false, 'title' => '');
        extract(wp_parse_args($args, $defaults), EXTR_SKIP);
        $attr = array('origin' => $origin,
            'departure_at' => $departure_at, 'return_at' => $return_at,
            'currency' => $this->typeCurrency());
        if ($this->cacheSecund()) {
            if (false === ($return = get_transient($this->cacheKey('tpPopularRoutesFromCityShortcodes',
                    $origin)))
            ) {
                $return = TPPlugin::$TPRequestApi->get_popular_routes_from_city($attr);
                if (!$return)
                    return false;
                set_transient($this->cacheKey('tpPopularRoutesFromCityShortcodes',
                    $origin), $return, $this->cacheSecund());
            }
        } else {
            $return = TPPlugin::$TPRequestApi->get_popular_routes_from_city($attr);
            if (!$return)
                return false;
        }
        return array('rows' => $return, 'origin' => $origin,
                'type' => 9, 'title' => $title);

    }
}
<?php
/**
 * Created by: Andrey Polyakov (andrey@polyakov.im)
 */

namespace app\includes\common;


use app\includes\TPPlugin;

class TpStatistics
{
    public static function write()
    {
        $collectionName = 'plugin_activation';
        $projectId = '5a97f593c9e77c00010a8ef1';
        $publicKey = '587E43D1198FD5D0B215514CB785AF25AC0E10D175C1F7844F1BFD35B684518B0F3C8A6CAD424ECF5E8F5A6BCD4F7DA140D7D8D56B524FCAA568D6FFDD51C1125845D447EA5F920C14B7D323228E064FF5B0BC6F05A262C0B120706ABE19C512';

        $requestOptions = [
            CURLOPT_URL => "https://api.keen.io/3.0/projects/$projectId/events/$collectionName",
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $publicKey,
                'Content-Type: application/json',
            ],
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => json_encode(self::get_data())
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $requestOptions);
        curl_exec($ch);
        curl_close($ch);
    }

    protected static function get_data()
    {
        return [
            'marker' => isset(TPPlugin::$options['account']) && TPPlugin::$options['account']['marker']
                ? TPPlugin::$options['account']['marker']
                : '',
            'domain' => preg_replace('(^https?://)', '', get_option('home')),
            'plugin_version' => TPOPlUGIN_VERSION,
            'php' => PHP_VERSION,
        ];
    }
}

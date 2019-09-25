<?php

namespace core;


class TPRequest
{
    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    /**
     * Get POST data by key name
     * @param string $key
     * @param $default
     * @return null|mixed
     */
    public static function post($key, $default = null)
    {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    /**
     * Get GET data by key name
     * @param string $key
     * @param $default
     * @return null|mixed
     */
    public static function get($key, $default = null)
    {
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    /**
     * Get Request date by key name
     * @param string $key
     * @param $default
     * @return mixed|null
     */
    public static function request($key, $default = null)
    {
        return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
    }

    /**
     * Check Ajax request
     * @return bool
     */
    public static function isAjax()
    {
        return strtolower(isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : '') === 'xmlhttprequest';
    }

    /**
     * Check POST request
     * @return bool
     */
    public static function isPost()
    {
        return strtoupper(isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : '') === self::METHOD_POST;
    }

    /**
     * Check GET request
     * @return bool
     */
    public static function isGet()
    {
        return strtoupper(isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : '') === self::METHOD_GET;
    }

    /**
     * Get request uri
     * @param $default
     * @return null|string
     */
    public static function getRequestUri($default = null)
    {
        return self::isAjax()
            ? isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $default
            : isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $default;
    }
}

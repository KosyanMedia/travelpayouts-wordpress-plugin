<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 10.08.15
 * Time: 17:52
 */
namespace app\includes\views\admin;
abstract class TPView {
    abstract public function __construct($model);
    /**
     * @param $currency
     * @return string
     */
    public function getCurrencyView($currency){
        switch($currency){
            case "RUB":
            case "rub":
                $currency = '<i class="TPCurrencyIco" >i</i>';
                break;
            case "USD":
            case "usd":
                $currency = '<i class="TPCurrencyIco">$</i>';
                break;
            case "EUR":
            case "eur":
                $currency = '<i class="TPCurrencyIco">€</i>';//&#8364;
                break;
        }
        return $currency;
    }

}
<?php

namespace App\Util;

// Juan José Escudero

class CurrencyExchange
{

    public function convert($currency, $amount)
    {
        $apikey = 'd1ded944220ca6b0c442';

        $from_Currency = 'USD';
        $to_Currency = $currency;
        $query =  "{$from_Currency}_{$to_Currency}";

        $json = file_get_contents("https://free.currconv.com/api/v7/convert?q=USD_$currency&compact=ultra&apiKey=$apikey");

        $obj = json_decode($json, true);
        $val = $obj["$query"];
        $total = $val * $amount;

        return $total;
    }
}

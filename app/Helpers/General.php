<?php
/**
 * Created by PhpStorm.
 * User: JAMES
 * Date: 18/08/2019
 * Time: 15:58
 */

namespace App\Helpers;


class General
{
    public static function moneyFormat($number, $fractional = false)
    {
        return number_format((float)$number, 0, '.', ',');
    }
}
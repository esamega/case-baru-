<?php

namespace App\Helpers;

use Exception;

class CalculatorHelper
{
    public static function add($a, $b)
    {
        return $a + $b;
    }

    public static function subtract($a, $b)
    {
        return $a - $b;
    }

    public static function perkalian($a, $b){
        return $a * $b; // ada typo harusnya *
    }
}

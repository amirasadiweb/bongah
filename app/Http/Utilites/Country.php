<?php
/**
 * Created by PhpStorm.
 * User: amirasadi
 * Date: 11/7/2017
 * Time: 2:03 PM
 */

namespace App\Http\Utilites;

class Country{

    protected  static $counteries=[
        'Iran'=>'ir',
        'Afganestan'=>'afg',
        'UnitedState'=>'us'
    ];

    public static function all()
    {
        return static::$counteries;
    }

}


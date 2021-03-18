<?php

namespace App\Services\Http\Core;

use App\Services\Http\Core\MovieTransformOMDB;

class MovieTransformFactory{
    public static function getTrasformer($source) {
        switch ($source) {
            case 'OMDB':
                return new MovieTransformOMDB();
            // To be added other movies sources...
            default:
                return null;
        }
    }
}
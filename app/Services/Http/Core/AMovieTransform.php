<?php

namespace App\Services\Http\Core;

use App\Services\Http\Core\IMovieTransform;

abstract class AMovieTransform implements IMovieTransform
{
    
    public function getResponse($success, $status, $data) {
        return [
            "success" => $success,
            "status" => $status,
            "data" => $data
        ];
    }
}
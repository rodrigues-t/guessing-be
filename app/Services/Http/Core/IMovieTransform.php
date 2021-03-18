<?php

namespace App\Services\Http\Core;

interface IMovieTransform
{
    public function getSearchResponse($response, $count);
    public function getFindResponse($response);
    function getResponse($success, $status, $data);
}
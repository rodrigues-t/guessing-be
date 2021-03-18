<?php

namespace App\Services\Http\Core;

use Illuminate\Support\Collection;
use App\Models\Movie;
use App\Services\Http\Core\AMovieTransform;

class MovieTransformOMDB extends AMovieTransform {
    public function getSearchResponse($response, $count) {
        $responseBody = json_decode($response->getBody(), true);
        if(isset($responseBody["Search"])) {
            $movies = json_decode(json_encode($responseBody["Search"]), true);
            if(count($movies) > $count) {
                $movies = array_splice($movies, $count);
            }
            $movies = collect($movies)->map(function($movie) {                
                        return new Movie($movie["imdbID"], $movie["Title"], $movie["Poster"]);
                    });
            return $this->getResponse(true, 200, $movies);
        }

        if(isset($responseBody["Error"])) {
            if(str_contains($responseBody["Error"], "not found")) {
                return $this->getResponse(false, 404, ['error' => $responseBody["Error"]]);
            }
            if(str_contains($responseBody["Error"], "Too many results")) {
                return $this->getResponse(false, 422, ['error' => $responseBody["Error"]]);
            }
            return $this->getResponse(false, 500, ['error' => $responseBody["Error"]]);
        }
    } 

    public function getFindResponse($response) {
        $responseBody = json_decode($response->getBody(), true);
        if($responseBody["Response"] == "True") {
            return $this->getResponse(
                true, 
                200, 
                new Movie(
                        $responseBody["imdbID"], 
                        $responseBody["Title"], 
                        $responseBody["Poster"],
                        $responseBody["Plot"],
                        $responseBody["imdbRating"]
                    )
            );
        }
        if(str_contains($responseBody["Error"], "Incorrect IMDb ID")) {
            return $this->getResponse(false, 404, ['error' => $responseBody["Error"]]);
        }
        return $this->getResponse(false, 500, ['error' => $responseBody["Error"]]);
    }
}
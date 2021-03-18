<?php

namespace App\Services\Http;

use Illuminate\Support\Collection;
use App\Models\Movie;
use App\Services\Http\Core\MovieTransformFactory;

class MovieService {

    private $uri;
    private $apikey;
    private $source;

    public function __construct() {
        $this->uri = \Config::get('app.MOVIE_BASE_ENDPOINT');
        $this->apikey = \Config::get('app.MOVIE_SERVICE_KEY');
        $this->source = \Config::get('app.MOVIE_SERVICE_NAME');
    }
    
    public function search($searchTerm) {
        $client = new \GuzzleHttp\Client();
        $response = $client->request(
            'GET', 
            $this->uri,
            [
                'query' => [
                    's' => $searchTerm,
                    'apikey' => $this->apikey
                ]
            ]
        );
        return MovieTransformFactory::getTrasformer($this->source)->getSearchResponse($response, 5);
    }

    public function find($movieId) {
        $client = new \GuzzleHttp\Client();
        $response = $client->request(
            'GET', 
            $this->uri,
            [
                'query' => [
                    'i' => $movieId,
                    'apikey' => $this->apikey
                ]
            ]
        );

        return MovieTransformFactory::getTrasformer($this->source)->getFindResponse($response);
    }
}

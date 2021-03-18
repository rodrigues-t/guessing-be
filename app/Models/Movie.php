<?php

namespace App\Models;

class Movie
{
    public $imdbID;
    public $title;
    public $poster;
    public $plot;
    public $imdbRating;
    public function __construct($imdbID, $title, $poster, $plot = null, $imdbRating = null) {
        $this->imdbID = $imdbID;
        $this->title = $title;
        $this->poster = $poster;
        $this->plot = $plot;
        $this->imdbRating = $imdbRating;
    }
}

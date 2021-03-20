<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMovieSearch()
    {
        $response = $this->get('/api/movie/search/terminator');
        $response->assertStatus(200);
        $response->assertJsonCount(
            5
        )->assertJsonStructure([
            '*' => ['imdbID', 'title', 'poster', 'plot', 'imdbRating']
        ]);
    }

    public function testMovieFind()
    {
        $response = $this->get('/api/movie/find/tt3896198');
        $response->assertStatus(200);
        $response->assertJson([
            'imdbID' => "tt3896198",
        ])->assertJsonStructure(
            ['imdbID', 'title', 'poster', 'plot', 'imdbRating']
        );
    }
}

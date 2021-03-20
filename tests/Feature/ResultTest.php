<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResultTest extends TestCase
{
    use RefreshDatabase;

    public function testPostResult()
    {
        $response = $this->get(
            '/api/result', 
            [ 
                "score" => 5,
                "userName" => "Joseph",
                "searchTerm" => "armagedon"
            ]);
        $response->assertStatus(
            200
        );
    }
    
    public function testGetResult()
    {
        $response = $this->get('/api/result');
        $response->assertStatus(
            200
        )->assertJsonStructure([
            '*' => ['score', 'created_at', 'userName', 'searchTerm']
        ]);
    }
}

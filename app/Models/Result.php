<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = "results";
    protected $primaryKey = "id";
    public $timestamps = true;

    protected $casts = [
        'id' => 'int',
        'score' => 'int',
        'users_id' => 'int',
        'search_terms_id' => 'int'
    ];

    protected $fillable = [
        'score',
        'users_id',
        'search_terms_id'
    ];
    
    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'users_id', 'id');
    }

    public function searchTerm() {
        return $this->belongsTo(\App\Models\SearchTerm::class, 'search_terms_id', 'id');
    }
}

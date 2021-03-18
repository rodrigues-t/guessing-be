<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchTerm extends Model
{
    protected $table = "search_terms";
    protected $primaryKey ="id";
    public $timestamps = false;

    protected $casts = [
        'id' => 'int'
    ];

    protected $fillable = [
        'term'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    protected $primaryKey ="id";
    public $timestamps = false;

    protected $casts = [
        'id' => 'int'
    ];

    protected $fillable = [
        'name'
    ];
}

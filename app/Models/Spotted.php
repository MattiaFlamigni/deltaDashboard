<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spotted extends Model
{
    protected $table = 'spotted';
    protected $casts = [
        'data' => 'datetime',
        "location" => "array",
    ];
    protected $primaryKey = 'id';
    protected $fillable = ["data", "image_path", "comment", "category", "subCategory"];
    public $timestamps = false;
    const CREATED_AT = 'data';
}

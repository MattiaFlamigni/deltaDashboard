<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poi extends Model
{
    protected $table = 'poi';
    protected $primaryKey = 'id';
    protected $fillable = ["location", "title", "description","category", "image_url"];
}

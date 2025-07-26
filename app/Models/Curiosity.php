<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curiosity extends Model
{
    public $timestamps = false;

    protected $table = "curiosity";
    protected $fillable = ["title", "subtitle", "description"];
    protected $primaryKey = "id";

}

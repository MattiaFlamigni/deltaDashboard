<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    public $timestamps = false;
    const CREATED_AT = 'data';
    protected $fillable = ["data", "image_path", "comment","type","position","verified","isResolved"];
}

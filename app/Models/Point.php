<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = 'points';
    protected $fillable = [];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }


}

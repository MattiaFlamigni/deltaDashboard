<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class quizAnswer extends Model
{
    protected $table = 'answer';
    public $timestamps = false;

    protected $fillable = ["answer", "correct", "questionID"];


    function question()
    {
        return $this->belongsTo(quizQuestion::class, "questionID");
    }
}

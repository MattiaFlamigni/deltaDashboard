<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class quizAnswer extends Model
{
    protected $table = 'answer';


    function question()
    {
        return $this->belongsTo(quizQuestion::class, "questionID");
    }
}

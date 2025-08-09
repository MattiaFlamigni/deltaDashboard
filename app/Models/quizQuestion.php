<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class quizQuestion extends Model
{
    protected $table = 'questionsQuiz';
    protected $fillable = ["question"];


    function answers()
    {
        return $this->hasMany(quizAnswer::class, "questionID");
    }
}

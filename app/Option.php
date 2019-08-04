<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['question_id', 'option'];

    public function question() {
        return $this->belongsTo('App\Question', 'question_id', 'correct_option_id');
    }
}

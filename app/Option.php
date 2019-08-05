<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['question_id', 'option', 'value'];

    public function question() {
        return $this->belongsTo('App\Question');
    }
}

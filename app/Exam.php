<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{

    protected $fillable = ['name'];

    public function questions() {
        return $this->belongsToMany('App\Question', 'exam_questions', 'exam_id', 'question_id')
                    ->withPivot('marks')->withTimestamps();
    }

    public function users() {
        return $this->belongsToMany('App\User', 'scores', 'exam_id', 'user_id')
                    ->withPivot('score')->withTimestamps();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'correct_option_id'];

    public function options() {
        return $this->hasMany('App\Option', 'correct_option_id');
    }

    public function exams() {
        return $this->hasMany('App\Exam', 'exam_questions', 'question_id', 'exam_id')
                    ->withPivot('marks')->withTimeStamps();
    }
}

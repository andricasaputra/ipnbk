<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table        = 'ipnbk_answer';
    protected $guarded      = ['id', 'created_at', 'updated_at'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function result()
    {
    	return $this->belongsToMany(Result::class, 'ipnbk_answer', 'id');
    }

    public function question_answer()
    {
    	return $this->belongsToMany(Answer::class, 'ipnbk_answer_question');
    }

}

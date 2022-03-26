<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table 	    = 'ipnbk_question';
    protected $guarded 	    = ['id', 'created_at', 'updated_at'];
    protected $with         = ['question_answer', 'answer'];

    public function answer()
    {
    	return $this->hasMany(Answer::class);
    }

    public function question_answer()
    {
    	return $this->belongsToMany(Answer::class, 'ipnbk_answer_question');
    }

    public function result()
    {
        return $this->hasMany(Result::class, 'ipnbk_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table        = 'ipnbk_result';
    protected $guarded      = ['id', 'created_at', 'updated_at'];
    protected $with         = ['answer', 'responden', 'question', 'answer', 'ipnbk'];

    public function ipnbk()
    {
    	return $this->belongsTo(Jadwal::class);
    }

    public function responden()
    {
    	return $this->belongsTo(User::class);
    }

    public function question()
    {
    	return $this->belongsTo(Question::class);
    }

    public function answer()
    {
    	return $this->belongsTo(Answer::class);
    }

    public function scopeQuestionGroup($query, $id)
    {
        return $query->whereIpnbkId($id)->get()->groupBy('question_id');
    }

    public function scopeRespondenDone($query, $user_id, $jadwal_id)
    {
        return $query->whereRespondenId($user_id)->whereJadwalid($jadwal_id)->first();
    }

    public function scopeRespondenGroup($query, $id)
    {
        return $query->whereIpnbkId($id)->get()->groupBy('responden_id');
    }

    public function scopeCountResponden($query)
    {
        $query->selectRaw('ipnbk_id, COUNT(responden_id)')->groupBy('responden_id');
    }

    public function scopeCountQuestion($query)
    {
        $query->selectRaw('ipnbk_id, COUNT(question_id)')->groupBy('question_id');
    }

}

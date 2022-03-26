<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    protected $table        = 'ipnbk_responden';
    protected $guarded      = ['id', 'created_at', 'updated_at'];
    protected $hidden       = ['layanan_id', 'pendidikan_id', 'umur_id', 'pekerjaan_id', 'updated_at'];
    protected $with         = ['pendidikan', 'layanan', 'umur', 'pekerjaan', 'ipnbk', 'answer'];

    public function getJenisKelaminAttribute($value)
    {
        return $value == 1 ? 'Laki-laki' : 'Perempuan';
    }

    public function result()
    {   
        return $this->hasMany(Result::class);
    }

    /*Ini Cara Lama ketika kolom ipnbk_id belum ditambahkan ke table responden*/
    public function ipnbk()
    {   
        /*This hasManyThrough relation query = this query
        select `ipnbk`.*, `ipnbk_result`.`responden_id` from `ipnbk` inner join `ipnbk_result` on `ipnbk_result`.`ipnbk_id` = `ipnbk`.`id` where `ipnbk_result`.`responden_id` = whatever_responden_id*/

        return $this->hasManyThrough(Jadwal::class, Result::class, 'responden_id', 'id', 'id', 'ipnbk_id')
        ->groupBy('ipnbk_result.responden_id');
    }

    /*Ini Cara yang Baru - kolom ipnbk_id sudah ditambahkan ke table responden untuk mempermudah pembacaan relasi*/
    public function jadwal()
    {   
        return $this->belongsTo(Jadwal::class, 'ipnbk_id');
    }

    public function question()
    {   
        return $this->hasManyThrough(Question::class, Result::class, 'responden_id', 'id', 'id', 'question_id');
    }

    public function answer()
    {   
        return $this->hasManyThrough(Answer::class, Result::class, 'responden_id', 'id', 'id', 'answer_id');
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
	protected $table        = 'ipnbk';
    protected $guarded      = ['id', 'created_at', 'updated_at'];
    protected $hidden       = ['id','start_date', 'end_date', 'is_open', 'created_at', 'updated_at'];

    public function result()
    {
        return $this->hasMany(Result::class, 'ipnbk_id');
    }

    /*Ini Cara yang Baru - kolom ipnbk_id sudah ditambahkan ke table responden untuk mempermudah pembacaan relasi*/
    public function responden()
    {   
        return $this->hasMany(Result::class, 'responden_id');
    }

    public function scopeActive($query)
    {
        return $query->whereIsOpen(1)->where('is_open', 1);
    }
}

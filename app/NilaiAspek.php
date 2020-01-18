<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAspek extends Model
{
    protected $table = 'nilaiaspek';
    protected $fillable = ['tglnilaiaspk','id_datasiswa','id_kegiatanharian', 'id_aspek', 'nilaiaspk'];

    public function siswaaspek(){
    	return $this->hasMany('App\Siswa', 'id_datasiswa');
    }

    public function kegiatanaspek(){
    	return $this->belongsTo('App\KegiatanHarian', 'id_kegiatanharian');
    }

    public function aspekaspek(){
    	return $this->belongsTo('App\Aspek', 'id_aspek');
    }
}

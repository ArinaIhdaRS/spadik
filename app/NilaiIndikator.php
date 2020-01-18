<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiIndikator extends Model
{
    protected $table = 'nilaiindikator';
    protected $fillable = ['id_datasiswa','kompetensidasar','indikator', 'id_harian', 'id_aspek', 'nilaiindikator'];

    public function siswaindikator(){
    	return $this->belongsTo('App\Siswa', 'id_datasiswa');
    }

    public function harianindikator(){
    	return $this->belongsTo('App\Harian', 'id_harian');
    }

    public function aspekindikator(){
    	return $this->belongsTo('App\Aspek', 'id_aspek');
    }
}

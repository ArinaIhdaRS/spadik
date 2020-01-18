<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAnekdot extends Model
{
    protected $table = 'nilaianekdot';
    protected $fillable = ['id_datasiswa','tglanekdot', 'tempatanekdot', 'waktuanekdot', 'peristiwa'];

    public function siswaanekdot(){
    	return $this->belongsTo('App\Siswa', 'id_datasiswa');
    }
}

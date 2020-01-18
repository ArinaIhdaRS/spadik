<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harian extends Model
{
    protected $table = 'harian';
    protected $fillable = ['kodepemb','tglpemb','tahunajaran', 'id_kelas', 'semester', 'minggu', 'tema', 'subtema', 'strategipemb','id_kompdasar', 'indikatorharian', 'id_materi', 'tujuanpemb', 'status'];

    public function kelas(){
    	return $this->belongsTo('App\Kelas', 'id_kelas');
    }
}

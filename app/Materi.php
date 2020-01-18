<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';
    protected $fillable = ['id_kelas','id_kategorimateri','kodemateri', 'isimateri'];

    public function kelass()
    {
    	return $this->belongsTo('App\Kelas', 'id_kelas');
    }

    public function ktgmateri()
    {
    	return $this->belongsTo('App\KtgMateri', 'id_kategorimateri');
    }
}

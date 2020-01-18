<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'datasiswa';
    protected $fillable = ['nisn','namalengkap','namapanggil','jeniskelamin','tempatlahir','tgllahir','agama','anakke', 'namaibu','namaayah','statusorangtua','pekerjaanibu','pekerjaanayah','alamat','desakelurahan','kecamatan','kabupatenkota','provinsi','photo','id_kelas','id_sentra','tingkat','tahunmasuk'];

    public function kelass(){
    	return $this->belongsTo('App\Kelas', 'id_kelas');
    }

    public function sentras(){
    	return $this->belongsTo('App\Sentra', 'id_sentra');
    }
}
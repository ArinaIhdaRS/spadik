<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KegiatanHarian extends Model
{
    protected $table = 'kegiatanharian';
    protected $fillable = ['id_harian','tahapanharian','waktuharian', 'kegiatanharian', 'id_aspek', 'mediaharian'];

    public function harians(){
    	return $this->belongsTo('App\Harian', 'id_harian');
    }
}

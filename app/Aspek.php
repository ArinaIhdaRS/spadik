<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    protected $table = 'aspek';
    protected $fillable = ['kodeaspek', 'namaaspek', 'id_ranah'];

    public function ranahs(){
    	return $this->belongsTo('App\Ranah', 'id_ranah');
    }
}

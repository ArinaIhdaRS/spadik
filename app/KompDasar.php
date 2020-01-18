<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KompDasar extends Model
{
    protected $table = 'kompdasar';
    protected $fillable = ['nomorkompdasar','id_kompinti','isikompetensidasar'];

    public function ki(){
    	return $this->belongsTo('App\KompInti', 'id_kompinti');
    }
}

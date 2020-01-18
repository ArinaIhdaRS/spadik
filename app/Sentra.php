<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentra extends Model
{
    protected $table = 'sentra';
    protected $fillable = ['namasentra','mediasentra','id_users'];

    public function user(){
    	return $this->belongsTo('App\User', 'id_users');
    }
}

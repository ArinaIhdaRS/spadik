<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['namakelas','usiasiswa','id_users'];

    public function user(){
    	return $this->belongsTo('App\User', 'id_users');
    }
}

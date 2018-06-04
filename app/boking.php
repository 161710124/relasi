<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class boking extends Model
{
	protected $table='bokings';
    protected $fillable=array('tanggal_boking','id_customer','id_mobil');

    public function customer(){
    		return $this->belongsTo('App\customer','id_customer');
    	}
    	public function mobil(){
    		return $this->belongsTo('App\mobil','id_mobil');
    	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
	protected $table = 'customers';
	protected $fillable = ['nama','alamat','no_hp'];

    public function boking()
	{
	return $this->hasMany('App\boking','id_customer');
}

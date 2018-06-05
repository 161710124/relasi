<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
	protected $table = 'mobils';
	protected $fillable = ['nama','plat_no','kapasitas','harga','jenis','warna','tahun','type','id_galeri'];

    public function boking()
	{
	return $this->hasOne('App\boking','id_mobil');
}
	public function galeri()
	{
	return $this->belongsTo('App\galeri','id_galeri');
}
}
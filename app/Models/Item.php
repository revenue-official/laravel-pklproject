<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {
	use HasFactory;

	protected $table = 'tableAset';
	protected $primaryKey = 'id_aset';
	protected $dates = ['date_registered'];
	public $timestamps = false;

	protected $fillable = [
		'kode_aset',
		'nama_aset',
		'harga_aset',
		'id_jenis',
		'id_lokasi',
		'id_status',
		'date_registered',
		'date_modified',
	];

}

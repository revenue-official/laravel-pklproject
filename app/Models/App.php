<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model {
	use HasFactory;

	protected $table = 'pkl_project';

	protected $primaryKey = 'id_aset';

	protected $fillable = [
		'kode_aset',
		'nama_aset',
		'harga_aset',
		'id_jenis',
		'id_lokasi',
		'id_status',
		'deskripsi',
		'date_modified',
	];
}

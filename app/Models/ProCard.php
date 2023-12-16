<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProCard extends Model {
	use HasFactory;

	protected $table = 'proCardTable';

	protected $primaryKey = 'id';

	protected $fillable = [
		'title',
		'image',
		'link',
		'status',
		'description',
		'created_at',
		'updated_at',

	];
}

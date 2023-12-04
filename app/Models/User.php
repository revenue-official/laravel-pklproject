<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
	use HasFactory;

	protected $table = 'tableAccount';

	protected $primaryKey = 'id';

	protected $fillable = [
		'id',
		'username',
		'email',
		'avatar',
		'created_at',
		'updated_at',
	];

}

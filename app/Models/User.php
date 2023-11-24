<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
	use HasFactory;

	protected $table = 'tableAccount';
	protected $primaryKey = 'id_account';
	protected $fillable = [
		'id_account',
		'username',
		'email',
		'profile_picture',
		'google_picture',
		'access_token',
		'refresh_token',
		'platform_with',
		'created_at',
		'updated_at',

	];

}

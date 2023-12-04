<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oauth extends Model {
	use HasFactory;

	protected $table = 'oauthAccount';

	protected $primaryKey = 'id';

	protected $fillable = [
		'id',
		'provider',
		'provider_id',
		'username',
		'email',
		'avatar',
		'access_token',
		'refresh_token',
		'created_at',
		'updated_at',
	];
}

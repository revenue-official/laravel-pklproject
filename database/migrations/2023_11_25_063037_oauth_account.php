<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create('oauthAccount', function (Blueprint $table) {
			$table->id('id');
			$table->string('provider');
			$table->string('provider_id');
			$table->string('name');
			$table->string('email');
			$table->string('avatar');
			$table->string('access_token');
			$table->string('refresh_token');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		//
	}
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create('proCardTable', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->string('title');
			$table->string('image');
			$table->string('link');
			$table->string('status')->default('active');
			$table->text('description')->nullable();
			$table->timestamps()->default(now());
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {

		Schema::dropIfExists('proCardTable');
	}
};

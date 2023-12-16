<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\App;
use Tests\TestCase;

class AppEnvironmentTest extends TestCase {
	/**
	 * A basic feature test example.
	 */
	public function test_example(): void {
		var_dump(App::environment());
		if (App::environment('testing')) {
			self::assertTrue(true);
		}
	}
}

<?php

namespace Tests\Feature;

use Tests\TestCase;

class ConfigurationTest extends TestCase {
	/**
	 * A basic feature test example.
	 */
	public function testConfig(): void {
		$FirstName = config('contoh.author.first');
		$LastName = config('contoh.author.last');
		$email = config('contoh.email');
		$web = config('contoh.web');

		// dd($FirstName, $LastName, $email, $web);

		self::assertEquals('revenue', $FirstName);
		self::assertEquals('Not', $LastName);
		self::assertEquals('akunku5521@gmail.com', $email);
		self::assertEquals('https://www.youtube.com', $web);

	}
}

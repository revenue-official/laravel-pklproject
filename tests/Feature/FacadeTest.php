<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadeTest extends TestCase {

	// public function testConfig(): void {
	// 	$firstname = config('contoh.author.first');
	// 	$firstname2 = Config::get('contoh.author.first');

	// 	self::assertEquals($firstname, $firstname2);
	// 	// var_dump(Config::all());
	// }

	public function testConfig(): void {

		$config = $this->app->make('config');
		$firstname3 = $config->get('contoh.author.first');

		$firstname = config('contoh.author.first');
		$firstname2 = Config::get('contoh.author.first');

		self::assertEquals($firstname, $firstname2);
		self::assertEquals($firstname, $firstname3);
		// var_dump(Config::all());
	}

	public function testFacadeMock() {
		Config::shouldReceive('get')
			->with('contoh.author.first')
			->andReturn('revenue');

		$firstname = Config::get('contoh.author.first');

		self::assertEquals('revenue', $firstname);
	}

}

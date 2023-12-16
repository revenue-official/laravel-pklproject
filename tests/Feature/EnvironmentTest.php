<?php

namespace Tests\Feature;

use Tests\TestCase;

class EnvironmentTest extends TestCase {

	public function testGetEnv() {

		$appkey = env('YOUTUBE');

		self::assertEquals('revenue', $appkey);

	}

	public function testDefaultenv() {

		$author = env('AUTHOR');
		self::assertEquals('revenue', $author);
	}

}

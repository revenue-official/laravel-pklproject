<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase {
	/**
	 * A basic feature test example.
	 */
	public function testDependencyInjection() {
		$foo = new Foo();
		$bar = new Bar($foo);

		self::assertEquals('Foo and bar', $bar->bar());
	}
}

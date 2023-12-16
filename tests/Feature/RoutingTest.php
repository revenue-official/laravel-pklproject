<?php

namespace Tests\Feature;

use Tests\TestCase;

class RoutingTest extends TestCase {
	/**
	 * A basic feature test example.
	 */
	public function testGet(): void {
		$this->get('/')
			->assertStatus(200);

	}

	public function fallback() {
		$this->get('/home')
			->assertRedirect('/');

		$this->get('/tidakada')
			->assertSeeText('404 Error By Laravel');
	}
}

<?php

namespace Tests\Feature;

use Tests\TestCase;

class ViewTest extends TestCase {
	/**
	 * A basic feature test example.
	 */
	public function testView(): void {
		$this->view('layouts.app', ['title' => 'home'])
			->assertSeeText('HOME');
	}
}

<?php

namespace Tests\Feature;

use App\Models\App;
use Tests\TestCase;

class ModelTest extends TestCase {

	// check table in database

	public function testModelApp(): void {
		$model = new App();
		$table = $model->getTable();
		$primary = $model->getKeyName();
		// dd($table);
		// dd($primary);
		$this->assertEquals('pkl_project', $table);
		self::assertEquals('id_aset', $primary);
		$this->assertSame('pkl_project', $table);
		self::assertSame('id_aset', $primary);

	}
}

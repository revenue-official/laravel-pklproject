<?php

// app/Services/AsetService.php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ItemServices {
	public function tableAset() {
		return DB::table('tableAset')
			->orderBy(DB::raw('IFNULL(date_modified, date_registered)'))
			->get();
	}
	public function tableJenis() {
		return DB::table('tableJenis')
			->get();
	}
	public function tableLokasi() {
		return DB::table('tableLokasi')
			->get();
	}
	public function tableStatus() {
		return DB::table('tableStatus')
			->get();
	}
	public function tableAccount() {
		return DB::table('tableAccount')
			->get();
	}
}

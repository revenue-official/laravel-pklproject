<?php
// app/Http/Controllers/ItemController.php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Services\ItemServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ItemController extends Controller {
	// private property
	private $itemServices;

	public function __construct(ItemServices $itemServices) {
		$this->itemServices = $itemServices;
	}

	public function home(Request $request) {

		$tableAset = $this->itemServices->tableAset();
		$tableJenis = $this->itemServices->tableJenis();
		$tableLokasi = $this->itemServices->tableLokasi();
		$tableStatus = $this->itemServices->tableStatus();
		return view(
			'home',
			[
				'getAset' => $tableAset,
				'getJenis' => $tableJenis,
				'getLokasi' => $tableLokasi,
				'getStatus' => $tableStatus,
				'title' => 'Home',
			]
		);
	}

	public function searching(Request $request) {
		$query = $request->get('query');
		$category = $request->get('category');

		if ($category == 'kode_aset' or $category == 'nama_aset' or $category == 'harga_aset') {
			$tableAset = Item::where($category, 'like', '%' . $query . '%')->get();
		}

		if ($category == 'id_jenis') {
			$getSelectId = DB::table('tableJenis')
				->where('nama_jenis', 'like', '%' . $query . '%')
				->pluck($category);
			$tableAset = Item::whereIn($category, $getSelectId)->get();
		}

		if ($category == 'id_lokasi') {
			$getSelectId = DB::table('tableLokasi')
				->where('nama_lokasi', 'like', '%' . $query . '%')
				->pluck($category);
			$tableAset = Item::whereIn($category, $getSelectId)->get();
		}

		if ($category == 'id_status') {
			$getSelectId = DB::table('tableStatus')
				->where('status', 'like', '%' . $query . '%')
				->pluck($category);
			$tableAset = Item::whereIn($category, $getSelectId)->get();
		}

		$tableJenis = $this->itemServices->tableJenis();
		$tableLokasi = $this->itemServices->tableLokasi();
		$tableStatus = $this->itemServices->tableStatus();

		return view('home', [
			'getAset' => $tableAset,
			'getJenis' => $tableJenis,
			'getLokasi' => $tableLokasi,
			'getStatus' => $tableStatus,
			'title' => 'Home',
		]);
	}

	// add data
	public function add($target) {
		// $item = Item::find($id);
		$tableJenis = $this->itemServices->tableJenis();
		$tableLokasi = $this->itemServices->tableLokasi();
		$tableStatus = $this->itemServices->tableStatus();

		return view('partials.modal-form', [
			'target' => $target,
			// 'item' => $item,
			'getJenis' => $tableJenis,
			'getLokasi' => $tableLokasi,
			'getStatus' => $tableStatus,
		]);
	}

	public function save(Request $request) {
		$dateRegistered = date("Y-m-d");
		$validatedData = $request->validate([
			'kode_aset' => 'required',
			'nama_aset' => 'required',
			'harga_aset' => 'required',
			'id_jenis' => 'required',
			'id_lokasi' => 'required',
			'id_status' => 'required',
		]);

		if ($validatedData) {
			$item = Item::create([
				'kode_aset' => $request->input('kode_aset'),
				'nama_aset' => $request->input('nama_aset'),
				'harga_aset' => $request->input('harga_aset'),
				'id_jenis' => $request->input('id_jenis'),
				'id_lokasi' => $request->input('id_lokasi'),
				'id_status' => $request->input('id_status'),
				'deskripsi' => $request->input('deskripsi'),
				'date_registered' => $dateRegistered,
			]);
			if ($item) {
				return redirect()->route('home')->with('success', 'Item save successfully.');
			} else {
				return redirect()->route('home')->with('error', 'Item not save.');
			}
		}
	}

	// Update data
	public function edit($id, $target) {
		$item = Item::find($id);
		$tableJenis = $this->itemServices->tableJenis();
		$tableLokasi = $this->itemServices->tableLokasi();
		$tableStatus = $this->itemServices->tableStatus();
		$tableAccount = $this->itemServices->tableAccount();

		return view('partials.modal-form', [
			'target' => $target,
			'item' => $item,
			'getJenis' => $tableJenis,
			'getLokasi' => $tableLokasi,
			'getStatus' => $tableStatus,
		]);
	}

	public function update(Request $request, $id) {
		$item = Item::find($id);
		$dateModified = date("Y-m-d");

		if (!$item) {
			return redirect()->route('home')->with('error', 'Item not found.');
		}
		$item->update([
			'kode_aset' => $request->input('kode_aset'),
			'nama_aset' => $request->input('nama_aset'),
			'harga_aset' => $request->input('harga_aset'),
			'id_jenis' => $request->input('id_jenis'),
			'id_lokasi' => $request->input('id_lokasi'),
			'id_status' => $request->input('id_status'),
			'deskripsi' => $request->input('deskripsi'),
		]);
		if ($item->wasChanged()) {
			$item->save([
				'date_modified' => $dateModified,
			]);
			return redirect()->route('home')->with('success', 'Item updated successfully.');
		} else {
			return redirect()->route('home')->with('error', 'Item not updated.');
		}
	}

	public function read($id, $target) {
		$item = Item::find($id);
		$tableJenis = $this->itemServices->tableJenis();
		$tableLokasi = $this->itemServices->tableLokasi();
		$tableStatus = $this->itemServices->tableStatus();
		$tableAccount = $this->itemServices->tableAccount();
		return view('partials.modal-form', [
			'target' => $target,
			'item' => $item,
			'getJenis' => $tableJenis,
			'getLokasi' => $tableLokasi,
			'getStatus' => $tableStatus,
		]);
	}

	// method delete data
	public function delete($id, $target) {
		$item = Item::find($id);

		// Kembalikan form pengeditan dalam bentuk HTML
		return view('partials.modal-form', [
			'target' => $target,
			'item' => $item,
		]);
	}

	public function destroy($id) {
		$item = Item::find($id);
		$item->delete();
		if ($item) {
			return redirect()->route('home')->with('success', 'Item deleted successfully.');
		} else {
			return redirect()->route('home')->with('error', 'Item not deleted.');
		}
	}
}
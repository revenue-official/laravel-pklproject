<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\ProCard;
use Illuminate\Http\Request;

class AppController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function app() {
		$getData = ProCard::all();

		return view('home',
			[
				'title' => 'home',
				'getData' => $getData,
			]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(App $app) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(App $app) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, App $app) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(App $app) {
		//
	}
}

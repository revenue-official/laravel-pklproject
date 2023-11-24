<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller {

// GOOGLE CONTROL AUTHENTICATION
	public function redirectToGoogle() {
		return Socialite::driver('google')->redirect();
	}

	public function handleGoogleCallback() {
		$googleUser = Socialite::driver('google')->user();

		$user = User::updateOrCreate(
			['email' => $googleUser->email],
			[
				'id_account' => $googleUser->id,
				'username' => $googleUser->name,
				'email' => $googleUser->email,
				'google_picture' => $googleUser->avatar,
				'access_token' => $googleUser->token,
				'refresh_token' => $googleUser->refreshToken,
				'platform_with' => 'google',
			],
		);
		if ($user) {
			$expired_time = time() + (7 * 24 * 60 * 60);
			setcookie('userId', $googleUser->id, $expired_time, '/');
			setcookie('userName', $googleUser->name, $expired_time, '/');
			return redirect()->route('home')->with('success', 'Login Successfully');
		} else {
			return redirect()->route('login')->with('error', 'Login Failed');
		}
	}

	// GITHUB CONTROL AUTHENTICATION
	public function redirectToGithub() {
		return Socialite::driver('github')->redirect();
	}

	public function handleGithubCallback() {
		$githubUser = Socialite::driver('github')->user();

		// Lakukan proses login atau registrasi dengan $githubUser

		// Contoh penyimpanan data user ke dalam session atau database
		// ...

		return redirect()->route('home'); // Ganti dengan halaman setelah login
	}

}

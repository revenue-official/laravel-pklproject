<?php

namespace App\Http\Controllers;

use App\Models\Oauth;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller {

// GOOGLE CONTROL AUTHENTICATION
	public function redirectToGoogle() {
		return Socialite::driver('google')->redirect();
	}

	public function handleGoogleCallback() {
		$googleUser = Socialite::driver('google')->user();

		$existingUser = Oauth::where('email', $googleUser->email)
			->where('provider', 'google')
			->first();

		if ($existingUser) {

			if (
				$existingUser->provider_id === $googleUser->id &&
				$existingUser->provider === 'google'
			) {

				$expired_time = time() + (7 * 24 * 60 * 60);
				setcookie('userId', $googleUser->id, $expired_time, '/');
				setcookie('userName', $googleUser->name, $expired_time, '/');
				setcookie('avatar', $googleUser->avatar, $expired_time, '/');
				return redirect()->route('home')->with('success', 'Login with Google Successfully');
			} else {
				return redirect()->route('login')->with('error', 'Authentication Failed. Please try again.');
			}
		} else {
			$randA = random_int(2023, 99999);
			$randB = mt_rand(3025, 99999);
			$id = $randA . $randB;
			$user = Oauth::create([
				'id' => $id,
				'provider' => 'google',
				'provider_id' => $googleUser->id,
				'username' => $googleUser->name,
				'email' => $googleUser->email,
				'avatar' => $googleUser->avatar,
				'access_token' => $googleUser->token,
				'refresh_token' => $googleUser->refreshToken,
			]);

			if ($user) {
				// Buat cookie dan arahkan ke halaman home
				$expired_time = time() + (7 * 24 * 60 * 60);
				setcookie('userId', $googleUser->id, $expired_time, '/');
				setcookie('userName', $googleUser->name, $expired_time, '/');
				setcookie('avatar', $googleUser->avatar, $expired_time, '/');
				return redirect()->route('home')->with('success', 'Create & Login with Google Successfully');
			} else {
				return redirect()->route('login')->with('error', 'Login Failed');
			}
		}
	}

	// GITHUB CONTROL AUTHENTICATION
	public function redirectToGithub() {
		return Socialite::driver('github')->redirect();
	}

	public function handleGithubCallback() {
		$githubUser = Socialite::driver('github')->user();

		$existingUser = Oauth::where('email', $githubUser->email)
			->where('provider', 'github')
			->first();

		if ($existingUser) {

			if (
				$existingUser->provider_id === strval($githubUser->id) &&
				$existingUser->provider === 'github'
			) {
				$expired_time = time() + (7 * 24 * 60 * 60);
				setcookie('userId', $githubUser->id, $expired_time, '/');
				setcookie('userName', $githubUser->name, $expired_time, '/');
				setcookie('avatar', $githubUser->avatar, $expired_time, '/');
				return redirect()->route('home')->with('success', 'Login with Github Successfully');
			} else {
				return redirect()->route('login')->with('error', 'Authentication Failed. Please try again.');
			}
		} else {
			$randA = random_int(2023, 99999);
			$randB = mt_rand(3025, 99999);
			$id = $randA . $randB;
			$user = Oauth::create([
				'id' => $id,
				'provider' => 'github',
				'provider_id' => $githubUser->id,
				'username' => $githubUser->name,
				'email' => $githubUser->email,
				'avatar' => $githubUser->avatar,
				'access_token' => $githubUser->token,
				'refresh_token' => $githubUser->refreshToken,
			]);

			if ($user) {
				// Buat cookie dan arahkan ke halaman home
				$expired_time = time() + (7 * 24 * 60 * 60);
				setcookie('userId', $githubUser->id, $expired_time, '/');
				setcookie('userName', $githubUser->name, $expired_time, '/');
				setcookie('avatar', $githubUser->avatar, $expired_time, '/');
				return redirect()->route('home')->with('success', 'Create & Login with Github Successfully');
			} else {
				return redirect()->route('login')->with('error', 'Login Failed');
			}

		}

	}

}

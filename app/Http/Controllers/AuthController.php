<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

	public function login() {
		return view('authentication', [
			'title' => 'login',
		]);
	}

	public function goLogin(Request $request) {
		$email = $request->input('email');
		$password = $request->input('password');

		$user = User::where('email', $email)->first();

		if (!$user) {
			return redirect()->route('login')->with('error', "Email not Found.");
		} else if ($user->password === null) {
			return redirect()->route('login')->with('error', "login failed! your account is available on another platform.");
		}

		if (hash::check($password, $user->password)) {

			$expired_time = time() + (7 * 24 * 60 * 60); // 7 hari (1 minggu)

			$encUserName = encrypt($user->username);
			$encUserId = encrypt($user->id);
			$encAvatar = encrypt($user->avatar ?: 'undefined');

			Cookie::queue('userName', $encUserName, $expired_time, '/');
			Cookie::queue('userId', $encUserId, $expired_time, '/');
			Cookie::queue('avatar', $encAvatar, $expired_time, '/');

			return redirect()->route('home')->with('success', 'Login Successfully.');
		} else {
			return redirect()->route('login')->with('error', 'Invalid Password.');
		}
	}

	public function register() {

		return view('authentication', [
			'title' => 'register',
		]);
	}

	public function goRegister(Request $request) {

		$randA = random_int(2023, 99999);
		$randB = mt_rand(3025, 99999);

		$id = $randA . $randB;
		$email = $request->input('email');
		$username = $request->input('user');
		$password = $request->input('password');
		$repassword = $request->input('re-password');

		$emailCheck = User::where('email', $email)->first();
		if (!$emailCheck) {
			if ($username !== $password) {
				$existingUser = User::where('id', $id)->first();

				if (!$existingUser) {
					$userWithUsername = User::where('username', $username)->first();

					if (!$userWithUsername) {
						if ($password === $repassword) {
							$passhash = Hash::make($password, [
								'memory' => 1024,
								'time' => 2,
								'threads' => 2,
							]);
							$user = new User();
							$user->id = $id;
							$user->email = $email;
							$user->username = $username;
							$user->password = $passhash;
							$user->save();

							return redirect()->route('register')->with('success', 'Created successfully. Username: ' . $username);
						} else {
							return redirect()->route('register')->with('error', 'Password not same.');
						}
					} else {
						return redirect()->route('register')->with('error', 'Username is already in use.');
					}
				}
			} else {
				return redirect()->route('register')->with('error', 'Error: Username & Password cannot be the same.');
			}
		} else {
			return redirect()->route('register')->with('error', 'Email already exists.');
		}
	}

	public function forgot(Request $request) {
		$email = $request->input('email');
		$user = User::where('email', $email)->first();

		if ($user) {
			return view('forgot', [
				'title' => 'forgot',
				'getHeader' => 'Confirm your Identity',
				'getButton' => 'Next',
				'method2' => 'method2',
			]);
		} else {
			return view('authentication', [
				'title' => 'forgot',
				'getHeader' => 'Search Account',
				'getButton' => 'Next',
			]);
		}
	}

	public function goForgot(Request $request) {
	}

	public function logout() {
		$expired_time = time() - 3600;
		setcookie('userName', '', $expired_time, '/');
		setcookie('userId', '', $expired_time, '/');
		setcookie('avatar', '', $expired_time, '/');
		return redirect()->route('login')
		// ->with('success', 'Logout successfully.'
		;
	}
}

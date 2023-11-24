<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller {

	public function login() {
		return view('authentication', [
			'title' => 'login',
		]);
	}

	public function goLogin(Request $request) {

		// Validasi input
		$email = $request->input('email');
		$password = $request->input('password');

		$user = User::where('email', $email)->first();

		if (!$user) {
			return redirect()->route('login')->with('error', "Email not Found.");
		} else if ($user->password === null) {
			return redirect()->route('login')->with('error', "login failed! your account is available on another platform.");
		}

		if (password_verify($password, $user->password)) {

			$expired_time = time() + (7 * 24 * 60 * 60); // 7 hari(1 minggu)

			setcookie('userName', $user->username, $expired_time, '/');
			setcookie('userId', $user->id_account, $expired_time, '/');

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
		$rand1 = random_int(1928, 9182);
		$rand2 = mt_rand(1928, 9182);
		$id = $rand1 . $rand2;
		$email = $request->input('email');
		$username = $request->input('user');
		$password = $request->input('password');
		$repassword = $request->input('re-password');

		$emailCheck = User::where('email', $email)->first();
		if (!$emailCheck) {
			if ($username !== $password) {
				$existingUser = User::where('id_account', $id)->first();

				if (!$existingUser) {
					$userWithUsername = User::where('username', $username)->first();

					if (!$userWithUsername) {
						if ($password === $repassword) {
							$passhash = password_hash($password, PASSWORD_BCRYPT);

							$user = new User();
							$user->id_account = $id;
							$user->email = $email;
							$user->username = $username;
							$user->password = $passhash;
							$user->platform_with = 'default';
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
		if ($request->input('email')) {

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
		return redirect()->route('login')->with('success', 'Logout successfully.');
	}

}

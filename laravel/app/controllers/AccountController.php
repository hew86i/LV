<?php 

class AccountController extends BaseController {

	public function getCreate() {
		return View::make('account.create');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(),
			array(
				'email' 			=> 'required|max:50|email|unique:users',
				'username' 			=> 'required|max:20|min:5|unique:users',
				'password' 			=> 'required|min:6',
				'password_again'	=> 'required|same:password'
			)

		);

		if($validator->fails()) {
			// die('Failed.');
			return Redirect::route('account-create')
					->withErrors($validator)
					->withInput();
		} else {
			// Create account
			$email = Input::get('email');
			$username = Input::get('username');
			$password = Input::get('password');

			// Activation code
			$code = str_random(60);

			$user = User::create(array(
				'email' => $email,
				'username' => $username,
				'password' => Hash::make($password),
				'code' => $code,
				'active' => 0
			));

			if($user) {

				Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'username' => $username), function($message) use ($user) {
					$message->to($user->email, $user->username)->subject('Activate your LV account');
				});

				return Redirect::route('home')
						->with('global', 'Your account has been created! We have sent you activation email');
			}
		}
		// print_r(Input::all());
	}

	public function getActivate($code) {
		// return $code;
		$user = User::where('code','=', $code)->where('active', '=', 0);

		// echo '<pre>', print_r($user->first()), '</pre>';		

		if($user->count()) {
			$user = $user->first();

			// Update user to active state
			$user->active = 1;
			$user->code = '';

			if($user->save()) {
				return Redirect::route('home')
						->with('global', 'Activated! You can now sign in!');
			}
		}

		return Redirect::route('home')
				->with('global', 'We could not activate your account. Try again later.');
	}
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {

	public function login(Request $request)
	{
		session()->put('redirect_offer_id', $request->offer);

		return view('frontend.auth.login');
	}

	public function authenticate(LoginRequest $request)
	{
		$request->authenticate();

		$request->session()->regenerate();

		$user = auth()->user();

		if (!$user->is_active || $user->type != 'Candidate') {
			Auth::guard('web')->logout();

			$request->session()->invalidate();

			$request->session()->regenerateToken();

			Session::flash('error', 'Acceso denegado');

			return redirect()->route('frontend.login');
		}

		Session::flash('success', 'Ingreso exitoso');

		if (session('redirect_offer_id')) {
			return redirect()->route('frontend.offers.show', ['offer' => session('redirect_offer_id')]);
		}

		return redirect()->route('frontend.login');
	}

	public function register()
	{
		return view('frontend.auth.register');
	}

	public function createAccount(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name'      => 'required',
			'last_name' => 'required',
			'email'     => 'required|email|unique:users',
			'password'  => 'required|confirmed',
		])->validate();

		$candidate = new Candidate();
		$candidate->is_verified = 0;
		$candidate->is_active = 1;
		$candidate->save();

		$user = new User();
		$user->candidate_id = $candidate->id;
		$user->type = 'Candidate';
		$user->name = $request->name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->is_active = 1;
		$user->save();

		Auth::login($user);

		Session::flash('success', 'Bienvenido a EmpleosPY');

		if (session('redirect_offer_id')) {
			return redirect()->route('frontend.offers.show', ['offer' => session('redirect_offer_id')]);
		}

		return redirect()->route('frontend.home.index');
	}

	public function logout(Request $request)
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect()->route('frontend.home.index');
	}

}

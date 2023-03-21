<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller {

	public function login()
	{
		return view('backend.auth.login');
	}

	public function authenticate(LoginRequest $request)
	{
		$request->authenticate();

		$request->session()->regenerate();

		$user = auth()->user();

		if (!$user->is_active) {
			Session::flash('error', 'Su usuario está inactivo');

			return redirect()->route('backend.login');
		}

		if ($user->type == 'Administrator' || $user->type == 'Company') {
			session()->put('global_company_id', $user->company_id);

			return redirect()->route('backend.dashboard.index');
		}

		Auth::guard('web')->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		Session::flash('error', 'Acceso denegado');

		return redirect()->route('backend.login');
	}

	public function logout(Request $request)
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect()->route('backend.login');
	}

	public function startImpersonation(Request $request)
	{
		$company = Company::find($request->company);

		session()->put('global_company_id', $company->id);

		Session::flash('success', 'Imitando a ' . $company->name);

		return redirect()->route('backend.dashboard.index');
	}

	public function stopImpersonation()
	{
		session()->put('global_company_id', null);

		Session::flash('success', 'Imitación abandonada');

		return redirect()->route('backend.dashboard.index');
	}

}

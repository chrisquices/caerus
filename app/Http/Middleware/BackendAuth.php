<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class BackendAuth {

	/**
	 * Handle an incoming request.
	 *
	 * @param Request                                       $request
	 * @param Closure(Request): (Response|RedirectResponse) $next
	 * @return Response|RedirectResponse
	 */
	public function handle(Request $request, Closure $next)
	{
		$user = auth()->user();

		if (!$user) {
			return redirect()->route('backend.login');
		}

		if (!$user->is_active) {
			Session::flash('error', 'Su usuario está inactivo');

			return redirect()->route('backend.login');
		}

		if ($user->type == 'Candidate') {
			Session::flash('error', 'Acceso denegado');

			return redirect()->route('frontend.home.index');
		}

		return $next($request);
	}

}

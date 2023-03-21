<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class AdministratorOnly {

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

		if ($user->type == 'Administrator') {
			return $next($request);
		}

		Session::flash('error', 'Acceso denegado');

		return redirect()->route('backend.dashboard.index');
	}

}

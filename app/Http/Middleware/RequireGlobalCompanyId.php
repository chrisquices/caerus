<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class RequireGlobalCompanyId {

	/**
	 * Handle an incoming request.
	 *
	 * @param Request                                       $request
	 * @param Closure(Request): (Response|RedirectResponse) $next
	 * @return Response|RedirectResponse
	 */
	public function handle(Request $request, Closure $next)
	{
		if (session('global_company_id')) {
			return $next($request);
		}

		Session::flash('error', 'Acceso denegado');

		return redirect()->route('backend.dashboard.index');

	}

}

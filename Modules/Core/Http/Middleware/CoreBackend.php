<?php

namespace Modules\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoreBackend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

    	//check user is logged in
	    if (Auth::guest())
	    {
		    if ($request->ajax()) {
			    return response('Unauthorized.', 401);
		    } else {
			    return redirect()->guest(route('core.frontend.login'))
				    ->withErrors([getConstant("login.required")]);
		    }
	    }

	    if(Auth::user()->enable == 0)
	    {
		    return redirect()->guest(route('core.frontend.login'))
		                     ->withErrors([getConstant("account.disabled")]);
	    }
	    //check user have permission to back login
	    if(!Auth::user()->hasPermission('backend-login'))
	    {
		    return redirect()->guest(route('core.frontend.login'))
		                     ->withErrors([getConstant("permission.denied")]);
	    }


        return $next($request);
    }
}
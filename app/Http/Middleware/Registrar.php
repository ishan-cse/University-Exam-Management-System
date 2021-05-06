<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Registrar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if(Auth::user()->role_name=='Registrar'){
        return $next($request);
      }
      else {
        return redirect('permission');
      }
    }
}

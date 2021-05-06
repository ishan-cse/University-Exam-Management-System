<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CourseCoordinator
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
      if(Auth::user()->role_name=='Course Coordinator'){
        return $next($request);
      }
      else {
        return redirect('permission');
      }
    }
}

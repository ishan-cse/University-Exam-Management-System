<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ExamController
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
      if(Auth::user()->role_name=='Exam Controller'){
        return $next($request);
      }
      else {
        return redirect('permission');
      }
    }
}

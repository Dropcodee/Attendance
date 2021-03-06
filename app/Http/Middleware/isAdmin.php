<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
    if (Auth::check()) {
      $user = Auth::user();
      if ($user->user_rank == 'admin' || $user->user_rank == 'developer') {
        return $next($request);
      }
      return redirect()->back();
    }
    return redirect()->back();
  }
}

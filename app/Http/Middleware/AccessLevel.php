<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class AccessLevel {

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if(!Session::has('connected')){
      return redirect(route('home'))->with('error', Lang::get('flashMessage.user.connected'));
    }

    if(Session::get('user.access_level') < $this->getLevel($request)){
      return redirect(route('home'))->with('error', Lang::get('flashMessage.user.not_access_level'));
    }

    return $next($request);
  }

  /**
   * Return the accel_level properties in the route
   * @param $request
   * @return mixed
   */
  private function getLevel($request)
  {
    $level = $request->route()->getAction();

    return $level['access_level'];
  }

}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class CheckCustomerLogin
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
    if($request->session()->has('token') == false){
        return $next($request);
    }
    //JWTAuth
    try {
      JWTAuth::setToken($request->session()->get('token'));
      $token = JWTAuth::getToken();
      $user = JWTAuth::toUser($token);
      if($user != null){
        if($user->customer_id == null || $user->employee_id != null){
          return redirect()->route('login')->withErrors(array(
            'email' => 'Your session is invalid. Please relogin'
          ));
        }

        return redirect()->route('dashboard-customer'); //token null
      }
      return $next($request);
    }
    catch (TokenExpiredException $e) {
      return redirect()->route('login')->withErrors(array(
        'email' => 'Your session is expired. Please relogin'
      ));
    } catch (TokenInvalidException $e) {
      return redirect()->route('login')->withErrors(array(
        'email' => 'Your session is invalid. Please relogin'
      ));
    } catch (JWTException $e) {
      return redirect()->route('login')->withErrors(array(
        'email' => 'Your session is invalid. Please relogin'
      ));
    }
    catch (Exception $e){
      return redirect()->route('login')->withErrors(array(
        'email' => 'Your session is invalid. Please relogin'
      ));
    }
  }
}

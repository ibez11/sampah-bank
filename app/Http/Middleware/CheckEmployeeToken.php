<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class CheckEmployeeToken
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
      return redirect()->route('home'); //token null
    }

    //JWTAuth
    try {
      JWTAuth::setToken($request->session()->get('token'));
      $token = JWTAuth::getToken();
      $user = JWTAuth::toUser($token);
      if($user != null){
        if($user->employee_id == null || $user->customer_id != null){
          return redirect()->route('login_employee')->withErrors(array(
            'email' => 'Your session is invalid. Please relogin'
          ));
        }
        return $next($request);
      }
      else{
        return redirect()->route('login')->withErrors(array(
          'email' => 'Invalid user. Please relogin'
        ));
      }

    } catch (TokenExpiredException $e) {
      return redirect()->route('login_employee')->withErrors(array(
        'email' => 'Your session is expired. Please relogin'
      ));
    } catch (TokenInvalidException $e) {
      return redirect()->route('login_employee')->withErrors(array(
        'email' => 'Your session is invalid. Please relogin'
      ));
    } catch (JWTException $e) {
      return redirect()->route('login_employee')->withErrors(array(
        'email' => 'Your session is invalid. Please relogin'
      ));
    }
    catch (Exception $e){
      return redirect()->route('login_employee')->withErrors(array(
        'email' => 'Your session is invalid. Please relogin'
      ));
    }
  }
}

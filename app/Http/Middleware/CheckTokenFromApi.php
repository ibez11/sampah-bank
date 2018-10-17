<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class CheckTokenFromApi
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
            return response(json_encode(array(
                'status' => 1,
                'desc' => 'Your session is invalid. Please relogin'
            )));
          }
      
          //JWTAuth
          try {
            JWTAuth::setToken($request->session()->get('token'));
            $token = JWTAuth::getToken();
            $user = JWTAuth::toUser($token);
            if($user != null){
              if($user->employee_id == null || $user->customer_id != null){
                return response(json_encode(array(
                    'status' => 1,
                    'desc' => 'Your session is invalid. Please relogin'
                )));
              }
              return $next($request);
            }
            else{
                return response(json_encode(array(
                    'status' => 1,
                    'desc' => 'Invalid user. Please relogin'
                )));
            }
          } catch (TokenExpiredException $e) {
            return response(json_encode(array(
                'status' => 1,
                'desc' => 'Your session is expired'
            )));
          } catch (TokenInvalidException $e) {
            return response(json_encode(array(
                'status' => 1,
                'desc' => 'Your session is expired'
            )));
          } catch (JWTException $e) {
            return response(json_encode(array(
                'status' => 1,
                'desc' => 'Your session is expired'
            )));
          }
          catch (Exception $e){
            return response(json_encode(array(
                'status' => 1,
                'desc' => 'Your session is expired'
            )));
          }
    }
}

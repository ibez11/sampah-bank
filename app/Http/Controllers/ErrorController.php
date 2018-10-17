<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    //
    public function displayError($errorId){
      $message = '';
      if($errorId == 100){
        $message = 'Token is not defined or token is invalid';
      }
      else if($errorId == 101){
        $message = 'Invalid token';
      }
      return view('500', [ 'message' => $message]);
    }
}

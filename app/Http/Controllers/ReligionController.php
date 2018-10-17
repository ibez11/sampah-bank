<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Religion as Religion;

class ReligionController extends Controller
{
    public function getAllReligions(){
      $religions = Religion::all();
      return json_encode($religions);
    }
}

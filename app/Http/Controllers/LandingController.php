<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Gallery;
use App\Http\Controllers\Tool\ImageGetTool;

class LandingController extends Controller
{
  protected $tool_image;

  public function __construct()
    {
        
        $this->tool_image = new ImageGetTool();
    }

    public function index() {
      $output['transactions'] = User::selectRaw('customers.fullname AS fullname, transactions.amount_kg AS amount_kg')
      ->join('transactions', 'transactions.user_id', 'users.id')
      ->join('customers', 'users.customer_id', 'customers.id')
      ->orderBy('transactions.created_at', 'DESC')
      ->where('transactions.is_debit', '=', 1)
      ->get();
      $output['logo']   = $this->tool_image->resize('img/tdb.png', 50, 50);
      $output['iphone_img']   = $this->tool_image->resize('img/iphone-screen.png', 325, 650);
      $output['galleries'] = Gallery::orderBy('galleries.updated_at', 'DESC')->paginate(6);

      return view('landing')->with($output);
    }
}

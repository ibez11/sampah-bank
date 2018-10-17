<?php

namespace App\Http\Controllers;

use App\User;
use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Carbon\Carbon; 
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Tool\ImageGetTool;

class LoginController extends Controller
{
  protected $tool_image;

  public function __construct()
    {
        
        $this->tool_image = new ImageGetTool();
    }

    public function index() {
      
      $output['logo']   = $this->tool_image->resize('img/tdb.png', 50, 50);
      return view('pages.login')->with($output);
    }

    public function logout(Request $request){
      $output['logo']   = $this->tool_image->resize('img/tdb.png', 50, 50);
      $output['transactions'] = User::selectRaw('customers.fullname AS fullname, transactions.amount_kg AS amount_kg')
      ->join('transactions', 'transactions.user_id', 'users.id')
      ->join('customers', 'users.customer_id', 'customers.id')
      ->orderBy('transactions.created_at', 'DESC')
      ->where('transactions.is_debit', '=', 1)
      ->get();

      $output['galleries'] = Gallery::orderBy('galleries.updated_at', 'DESC')->paginate(6);

      $request->session()->flush();

      return view('landing')->with($output);
    }

    public function try_login(Request $request) {
      $output['logo']   = $this->tool_image->resize('img/tdb.png', 50, 50);
       if(filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
        $user = User::where('email', $request['email'])->first();

        if($user == null)
          return redirect()->route('login')->withErrors(array(
            'email' => 'Email does not exist'
          ));

        //check customer role
        if($user->customer_id == null || $user->employee_id != null){
          return redirect()->route('login')->withErrors(array(
            'email' => 'Email does not exist'
          ));
        }

        //check password here
        $valid = Hash::check($request['password'], $user->password);

        if($valid == false)
          return redirect()->route('login')->withErrors(array(
            'password' => 'Password is incorrect'
          ));

        //use JWT
        $token = JWTAuth::fromUser($user); //automatically generate JWT using plugin
        $request->session()->put('token', $token); //for example use ID first
        return redirect()->route('dashboard-customer');
       }

      return redirect()->route('login');
    }

    public function login_employee(Request $request) {

       if(filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
        $user = User::where('email', $request['email'])->first();

        if($user == null)
          return redirect()->route('login_employee')->withErrors(array(
            'email' => 'Email does not exist'
          ));

        //check employee role
        if($user->employee_id == null || $user->customer_id != null){
          return redirect()->route('login')->withErrors(array(
              'email' => 'You are trying to login with customer account'
          ));
        }

        

        //check password here
        
        $valid = Hash::check('$2y$12$aJEsfPmFzsPpnKX2p7Qgg.AuDLXxJUuwSEKpI32VykzDzxc5.79tO', $user->password);
        print_R($valid);exit;
        

        if($valid == false)
          return redirect()->route('login_employee')->withErrors(array(
            'password' => 'Password is incorrect'
          ));

        $user->last_login = Carbon::now()->tz('Asia/Jakarta');
        $user->save();

        //use JWT
        $token = JWTAuth::fromUser($user); //automatically generate JWT using plugin
        $request->session()->put('token', $token); //for example use ID first
        return redirect()->route('dashboard-employee.index');
       }

      return redirect()->route('login_employee');
    }

    public function employee_login() {
      $output['logo']   = $this->tool_image->resize('img/tdb.png', 50, 50);
      return view('employee.login')->with($output);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Transactions\Dashboard;
use App\Http\Controllers\Customers\Helper;
use Session;
use App\Transaction;
use App\Customer;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Carbon\Carbon;
use App\Religion;
use App\Http\Controllers\Tool\ImageGetTool;

class CustomerController extends Controller
{
  public $dashboard;
  public $helper;
  protected $tool_image;

  public function __construct(){
      $this->middleware('checkcustomertoken');
      $this->dashboard = new Dashboard();
      $this->helper = new Helper();
      $this->tool_image = new ImageGetTool();
  }

  public function index() {
    $user = $this->helper->getUser();
    $customer = Customer::where('id', $user->customer_id)->first();
    $output['email'] = $user->email;
    $output['fullname'] = $customer->fullname;
    $output['customerAvatar'] = $customer->customerAvatar;
    $output['page'] = 'dashboard';
    $output['logo']   = $this->tool_image->resize('img/tdb.png', 50, 50);
    $output['type'] = strtoupper($customer->customer_type);

    //calculate balance
    $balance = $this->helper->getBalanceByUserId($user->id);

    $output = $output + $balance; //append array

    $output['today'] = Carbon::now()->format('d M Y'); 
    $output['max_withdraw'] = $this->helper->getMaxWithdrawAmount($user);

    return view('pages.dashboard-customer')->with($output);
  }

    public function generateReport(Request $request) {
      $user = $this->helper->getUser();
      $customer = Customer::where('id', $user->customer_id)->first();

      $errors = array();

      $output['email'] = $user->email;
      $output['fullname'] = $customer->first()->fullname;
      $output['page'] = 'dashboard';
      $output['today'] = Carbon::now()->format('d M Y');
      $output['customerAvatar'] = $customer->customerAvatar;
      $output['max_withdraw'] = $this->helper->getMaxWithdrawAmount($user);
      $output['type'] = strtoupper($customer->customer_type);

      //balance
      $balance = $this->helper->getBalanceByUserId($user->id);
      $output = $output + $balance; //append array

      //report
      if($request['reporttype'] == 1){ //daily
        $chartjs = $this->dashboard->getChartDataDaily($request['startdate'],
          $request['enddate'], $user->id);
        if(array_key_exists('error', $chartjs)){
          $errors['notification'] = $chartjs['error']; //set errors to show to view
          $chartjs = array();
        }
      }
      else{ //monthly
        $chartjs = $this->dashboard->getChartDataMonthly($request['startdate'],
          $request['enddate'], $user->id);
        if(array_key_exists('error', $chartjs)){
          $errors['notification'] = $chartjs['error']; //set errors to show to view
          $chartjs = array();
        }
      }

      return view('pages.dashboard-customer', compact('chartjs'))->with($output)->withErrors($errors);
    }

    public function showProfile() {
      $user = $this->helper->getUser();
      $customer = Customer::where('id', $user->customer_id)->first();
      $output = $this->helper->getBalanceByUserId($user->id);
      $output['email'] = $user->email;
      $output['customerAvatar'] = $customer->customerAvatar;
      $output['type'] = strtoupper($customer->customer_type);
      $output['logo']   = $this->tool_image->resize('img/tdb.png', 50, 50);

      //get customer data
      $output =  $this->helper->getCustomer($user->customer_id, $output);

      $output['transactions'] = Transaction::where('user_id', $user->id)->orderBy('id', 'desc')->skip(0)->take(5)->get();

      $output['now'] = Carbon::now('Asia/Jakarta');
      return view('pages.dashboard-profile')->with($output);
    }

    public function showProfileSettings() {
      $user = $this->helper->getUser();
      $customer = Customer::where('id', $user->customer_id)->first();
      $output = $this->helper->getBalanceByUserId($user->id);
      $output['email'] = $user->email;
      $output['fullname'] = $customer->fullname;
      $output['customerAvatar'] = $customer->customerAvatar;
      $output['type'] = strtoupper($customer->customer_type);
      $output['logo']   = $this->tool_image->resize('img/tdb.png', 50, 50);

      $output = $this->helper->getCustomer($user->customer_id, $output);
      $output['religions'] = Religion::all();

      return view('pages.dashboard-profile-settings')->with($output);
    }

    public function updateProfile(Request $request) {
      $user = $this->helper->getUser();
      $customer = Customer::where('id', $user->customer_id)->first();
      $output = $this->helper->getBalanceByUserId($user->id);
      $output['email'] = $user->email;
      $output['fullname'] = $customer->fullname;
      $output['customerAvatar'] = $customer->customerAvatar;
      $output['type'] = strtoupper($customer->customer_type);

      $identity_no = $request['identity_no'];
      $fullname = $request['fullname'];
      $birthplace = $request['birthplace'];
      $birthdate = $request['birthdate'];
      $address = $request['address'];
      $city = $request['city'];
      $customer_type = $request['customer_type'];
      $corporate_name = $request['corporate_name'];
      $religion_id = (int)$request['religion'];
      $sex = $request['sex'];
      $phone_number = $request['phone_number'];
      $customerAvatar = time().".".$request->customerAvatar->getClientOriginalExtension();
      $request->customerAvatar->move(public_path('img/customers-image'), $customerAvatar);

      $customer = Customer::where('id', $user->customer_id)->first();
      $customer->identity_no = $identity_no;
      $customer->fullname = $fullname;
      $customer->birthplace = $birthplace;
      $customer->birthdate = $birthdate;
      $customer->address = $address;
      $customer->city = $city;
      $customer->customer_type = $customer_type;
      $customer->corporate_name = $corporate_name;
      $customer->religion_id = $religion_id;
      $customer->sex = $sex;
      $customer->phone_number = $phone_number;
      $customer->customerAvatar = $customerAvatar;
      $customer->save();

      return redirect()->route('dashboard-profile');
    }

    public function accountMutation() {
      $user = $this->helper->getUser();
      $customer = Customer::where('id', $user->customer_id)->first();
      $output = $this->helper->getBalanceByUserId($user->id);
      $output['email'] = $user->email;
      $output['fullname'] = $customer->fullname;
      $output['customerAvatar'] = $customer->customerAvatar;
      $output['type'] = strtoupper($customer->customer_type);
      $output['logo']   = $this->tool_image->resize('img/tdb.png', 50, 50);

      $output['transactions'] = Transaction::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(30)->get();

      return view('pages.dashboard-mutation')->with($output);
    }

    public function searchByDate(Request $request) {
      $user = $this->helper->getUser();
      $customer = Customer::where('id', $user->customer_id)->first();
      $output = $this->helper->getBalanceByUserId($user->id);
      $output['email'] = $user->email;
      $output['fullname'] = $customer->fullname;
      $output['customerAvatar'] = $customer->customerAvatar;
      $output['type'] = strtoupper($customer->customer_type);

      /*
      $date_keyword = $request['keyword'];

      $output['transactions'] = Transaction::where('user_id', $user->id)->whereDate('created_at', $date_keyword)->orderBy('id', 'desc')->get();
      */

      $sd = Carbon::parse($request['startdate']);
      $ed = Carbon::parse($request['enddate']);

      if($sd->gt($ed)){
        $output['error'] = array(
          'error' => 'Tanggal Mulai harus lebih kecil dari Tanggal Akhir'
        );
        return view('pages.dashboard-mutation')->with($output)->withErrors($output);
      }

      if($sd->diffInDays($ed) > 31){
        $output['error'] = array(
          'error' => 'Mutasi rekening harus dalam rentang maksimal 31 hari'
        );
        return view('pages.dashboard-mutation')->with($output)->withErrors($output);
      }

      $output['transactions'] = Transaction::whereDate('created_at', '>=', $sd->format('Y-m-d'))
                                ->whereDate('created_at', '<=', $ed->format('Y-m-d'))
                                ->where('user_id', $user->id)
                                ->get();

      return view('pages.dashboard-mutation')->with($output)->withErrors($output);
    }
}

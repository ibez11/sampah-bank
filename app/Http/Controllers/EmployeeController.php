<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Session;
use JWTAuth;
use App\Employee;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Transaction;
use App\User;
use App\Settings;
use App\OperatingCosts;
use App\Product;
use App\City;
use Carbon\Carbon;
use App\Http\Controllers\Transactions\Helper;
use App\Http\Controllers\Customers\Helper as CustHelper;

class EmployeeController extends Controller
{
  public $helper;
  public $cust_helper;
  public $dashboard;
  public function __construct(){
      $this->middleware('checkemployeetoken');
      $this->helper = new Helper();
      $this->cust_helper = new CustHelper();
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $user = $this->cust_helper->getUser();
    $output['email'] = $user->email;
    $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
    $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
    $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

    $output['transactions'] = User::selectRaw('customers.fullname AS fullname, transactions.amount_money AS amount_money,
    transactions.amount_kg AS amount_kg, transactions.created_at AS created_at, transactions.is_debit AS is_debit, transactions.amount_used AS amount_used')
    ->orderBy('transactions.id', 'desc')
    ->join('transactions', 'transactions.user_id', 'users.id')
    ->join('customers', 'users.customer_id', 'customers.id')
    ->get();

    return view('employee.dashboard-employee')->with($output);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(Request $request)
  {
    if($request->has('email')){
      $output['emailCustomer'] = $request->input('email');
    }

    $user = $this->cust_helper->getUser();
    $employee_id = $user->employee_id;
    $employee = Employee::where('id', $employee_id)->first();
    $city_id = $employee->city_id;

    $city = City::find($city_id);

    $output['email'] = $user->email;
    $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
    $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
    $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    $output['city'] = $city->city;
    $output['city_id'] = $city->id;
    $output['products'] = Product::all();

    $output['users'] = User::all();

    return view('employee.dashboard-create')->with($output);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $user = $this->cust_helper->getUser();
    $output['email'] = $user->email;
    $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
    $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
    $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

    //decode amount money
    $request['amount_money'] = str_replace('.', '', $request['amount_money']);
    $request['amount_money'] = str_replace(',', '.', $request['amount_money']);
    $request['amount_used'] =  str_replace('.', '', $request['amount_used']);
    $request['amount_used'] =  str_replace(',', '.', $request['amount_used']);

    $is_debit = $request['is_debit'];
    $product_id = $request['products'];
    $amount_kg = (float)$request['amount_kg'];
    $amount_unit = (float)$request['amount_unit'];
    $amount_money = (float)$request['amount_money'];
    $amount_profit = (float)$request['amount_profit'];
    $amount_used = (float)$request['amount_used'];
    $customer = User::with('customer')->where('email', $request['email'])->get();

    $city_id = Employee::where('id', $user->employee_id)->first()->city_id;
    $city = City::find($city_id);
    $product = Product::find($product_id);

    //check email customer exists
    if($customer->isEmpty()){
      return redirect()->back()
      ->withErrors( array(
          'user' => 'Nasabah dengan email tersebut tidak ditemukan'
        ))
      ->withInput($request->except('email'));
    }

    $customer_id = $customer->first()->id;

   //calculate user current balance
    $balance = 0;
    $debit = Transaction::where('user_id', $customer_id)->where('is_debit', 1)->sum('amount_money');
    $credit = Transaction::where('user_id', $customer_id)->where('is_debit', 0)->sum('amount_used');
    $balance = $debit - $credit;
    $maxwithdraw = $this->cust_helper->getMaxWithdrawAmount($customer->first());
    //if credit, check user balance
    if($is_debit == 0){
        if($maxwithdraw < $amount_used){
        //send error message
        return redirect()->back()
        ->withErrors( array(
            'user' => 'Saldo rekening dari email ' . $customer->first()->email . ' tidak mencukupi. Saldo sekarang: ' .
            number_format($balance, 2) . '. Saldo dapat ditarik: ' . number_format($maxwithdraw, 2)
          ))
        ->withInput();
        }
    }

    //get amount profit for this transaction

    $transaction = new Transaction();
    $transaction->is_debit = $is_debit;
    $transaction->amount_kg = $amount_kg;
    $transaction->amount_money = $amount_money;
    $transaction->amount_profit = $amount_profit;
    $transaction->amount_used = $amount_used;
    $transaction->amount_unit = $amount_unit;
    $transaction->city = $city->city;
    $transaction->product = $product->jenis_barang;
    $transaction->user_id = $customer_id;

    $transaction->save();

    //calculate balance after saving
    if($is_debit == 0){
      $balance = $balance - $amount_used;
      $this->helper->sendWithdrawalEmail($customer->first(), $customer->first()->customer,
        $amount_used, $balance
        );
    }
    else{
        $balance = $balance + $amount_money;
        $this->helper->sendDepositEmail($customer->first(), $customer->first()->customer,
        $product->jenis_barang, $amount_kg, $amount_unit, $amount_money, $balance
          );
    }

    return redirect()->route('dashboard-employee.create')->with($output)
    ->withErrors(array(
      'customername' => $customer->first()->customer->fullname,
      'amount_money' =>  $amount_money,
      'amount_used' => $amount_used,
      'is_debit' => $is_debit
    ));
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    Log::debug('destroying...');
    $user = $this->cust_helper->getUser();
    $output['email'] = $user->email;
    $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
    $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
    $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

    //$id = user id
    //Remove all related transactions
    $users = DB::table('users')->where('id', $id);
    if($users->count() <= 0){
      $output['customer_data'] = User::groupBy('id')->groupBy('email')->groupBy('customers.fullname')->groupBy('customers.created_at')
      ->selectRaw('users.id, users.email, customers.fullname, customers.created_at, SUM(amount_money-amount_used) AS balance, SUM(amount_kg) AS amount_kg')
      ->leftjoin('transactions', 'transactions.user_id', 'users.id')
      ->leftjoin('customers', 'users.customer_id', 'customers.id')
      ->whereNotNull('users.customer_id')
      ->get();
      return view('employee.dashboard-list-customers')->with($output)
      ->withErrors(array(
        'message' => 'User tidak ditemukan. Harap menghubungi Administrator untuk menghapus nasabah.'
      ));
    }

    $customers = DB::table('customers')->where('id', $users->first()->customer_id);
    if($customers->count() <= 0){
      $output['customer_data'] = User::groupBy('id')->groupBy('email')->groupBy('customers.fullname')->groupBy('customers.created_at')
      ->selectRaw('users.id, users.email, customers.fullname, customers.created_at, SUM(amount_money-amount_used) AS balance, SUM(amount_kg) AS amount_kg')
      ->leftjoin('transactions', 'transactions.user_id', 'users.id')
      ->leftjoin('customers', 'users.customer_id', 'customers.id')
      ->whereNotNull('users.customer_id')
      ->get();
      return view('employee.dashboard-list-customers')->with($output)
      ->withErrors(array(
        'message' => 'Nasabah tidak ditemukan. Harap menghubungi Administrator untuk menghapus nasabah.'
      ));
    }

    DB::table('transactions')->where('user_id', $users->first()->id)->delete();
    DB::table('users')->where('id', $users->first()->id)->delete();
    DB::table('customers')->where('id', $customers->first()->id)->delete();

    $output['customer_data'] = User::groupBy('id')->groupBy('email')->groupBy('customers.fullname')->groupBy('customers.created_at')
    ->selectRaw('users.id, users.email, customers.fullname, customers.created_at, SUM(amount_money-amount_used) AS balance, SUM(amount_kg) AS amount_kg')
    ->leftjoin('transactions', 'transactions.user_id', 'users.id')
    ->leftjoin('customers', 'users.customer_id', 'customers.id')
    ->whereNotNull('users.customer_id')
    ->get();
    return view('employee.dashboard-list-customers')->with($output)
    ->withErrors(array(
      'success' => 'Nasabah dan histori transaksi berhasil dihapus'
    ));
  }
}

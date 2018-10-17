<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Employee;
use App\Religion;
use App\User;
use App\Institution;
use App\Subinstitution;
use App\Http\Controllers\Transactions\Helper;
use App\Http\Controllers\Customers\Helper as CustHelper;

class CustomerEditController extends Controller
{
    public $helper;
    public $cust_helper;
    public $dashboard;
    public function __construct(){
        $this->middleware('checkemployeetoken');
        $this->helper = new Helper();
        $this->cust_helper = new CustHelper();
    }

    public function customerList(Request $request) {
        $user = $this->cust_helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

      
    
        $customers = User::groupBy('id')->groupBy('email')->groupBy('customers.fullname')->groupBy('customers.created_at')
        ->selectRaw('users.id, users.email, customers.fullname, customers.created_at, SUM(amount_money-amount_used) AS balance, SUM(amount_kg) AS amount_kg')
        ->leftjoin('transactions', 'transactions.user_id', 'users.id')
        ->leftjoin('customers', 'users.customer_id', 'customers.id');
        
        //read query
        if($request->has('query')){
            $query = $request->input('query');
            $customers = $customers->whereRaw("users.email LIKE '%" . $query . "%' or 
                customers.fullname LIKE '%" . $query . "%'");
            $output['query'] = $query;
        }
        $customers = $customers->whereNotNull('users.customer_id')->get();
        
        $output['customer_data'] = $customers;
    
        return view('employee.dashboard-list-customers')->with($output);
      }

  public function customerEdit($id) { //user id
    $userCustomers = User::where('id', $id);

    if($userCustomers->count() <= 0){
      $output['customer_data'] = User::groupBy('id')->groupBy('email')->groupBy('customers.fullname')->groupBy('customers.created_at')
      ->selectRaw('users.id, users.email, customers.fullname, customers.created_at, SUM(amount_money-amount_used) AS balance, SUM(amount_kg) AS amount_kg')
      ->leftjoin('transactions', 'transactions.user_id', 'users.id')
      ->leftjoin('customers', 'users.customer_id', 'customers.id')
      ->whereNotNull('users.customer_id')
      ->get();
      return view('employee.dashboard-list-customers')->with($output);
    }

    $userCustomer = $userCustomers->get()->first();

    $customer = Customer::where('id', $userCustomer->customer_id)->first();
    $output = $this->cust_helper->getBalanceByUserId($userCustomer->id);

    //assign output for sidebar
    $user = $this->cust_helper->getUser();
    $output['id'] = $userCustomer->customer_id;
    $output['email'] = $user->email;
    $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
    $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
    $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

    $output = $this->cust_helper->getCustomer($userCustomer->customer_id, $output);
    $output['religions'] = Religion::all();
    $output['customerAvatar'] = $customer->customerAvatar;
    $output['institutions'] = Institution::get();

    return view('employee.dashboard-customer-edit')->with($output);
  }

  public function customerUpdate($id, Request $request) { //customer id
    //assign output for sidebar
    $user = $this->cust_helper->getUser();
    $output['email'] = $user->email;
    $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
    $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
    $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

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
    $subinstitution_id = $request['subinstitution'] != -1 && $request['subinstitution'] != null ? $request['subinstitution'] : null;
    if(!empty($request->customerAvatar)){
        $customerAvatar = time().".".$request->customerAvatar->getClientOriginalExtension();
        $request->customerAvatar->move(public_path('img/customers-image'), $customerAvatar);
    }

    $customer = Customer::where('id', $id)->get()->first();
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
    $customer->subinstitution_id = $subinstitution_id;
    if(!empty($request->customerAvatar))
        $customer->customerAvatar = $customerAvatar;
    $customer->save();

    $output['customer_data'] = User::groupBy('id')->groupBy('email')->groupBy('customers.fullname')->groupBy('customers.created_at')
    ->selectRaw('users.id, users.email, customers.fullname, customers.created_at, SUM(amount_money-amount_used) AS balance, SUM(amount_kg) AS amount_kg')
    ->leftjoin('transactions', 'transactions.user_id', 'users.id')
    ->leftjoin('customers', 'users.customer_id', 'customers.id')
    ->whereNotNull('users.customer_id')
    ->get();

    return view('employee.dashboard-list-customers')->with($output)->withErrors(array(
        'success' => 'Data nasabah berhasil diubah'
    ));
  }

  public function getSubinstitutionByInstitutionId($id)
  {
      $subinstitutions = Subinstitution::where('institution_id', $id)->get();
      return json_encode($subinstitutions);
  }
}

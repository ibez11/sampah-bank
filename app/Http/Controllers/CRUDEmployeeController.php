<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Session;
use JWTAuth;
use App\Employee;
use App\User;
use App\Division;
use App\Settings;
use App\City;
use Carbon\Carbon;
use App\Http\Controllers\Transactions\Helper;
use App\Http\Controllers\Transactions\Dashboard;
use App\Http\Controllers\Customers\Helper as CustHelper;
use Illuminate\Support\Facades\Hash;

class CRUDEmployeeController extends Controller
{
    public $helper;
    public $cust_helper;
    public $dashboard;
    public function __construct(){
        $this->middleware('checkemployeetoken');
        $this->helper = new Helper();
        $this->cust_helper = new CustHelper();
        $this->dashboard = new Dashboard();
    }

    private function getUser(){
      $userid = 0;

      try {
        JWTAuth::setToken(Session::get('token'));
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);
        if($user != null){
          return $user;
        }
        return null;
      }
      catch (Exception $e){
        return null;
      }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

        $output['user_employees'] = User::whereNotNull('employee_id')->get();

        return view('employee.dashboard-employee-data')->with($output);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = $this->getUser();
      $output['email'] = $user->email;
      $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
      $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
      $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

      $output['cities'] = City::all();
      $output['divisions'] = Division::all();

      return view('employee.dashboard-employee-create')->with($output);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = $this->getUser();
      $output['email'] = $user->email;
      $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
      $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
      $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

      $employee = new Employee();
      $employee->employee_no = $request['employee_no'];
      $employee->fullname = $request['fullname'];
      $employee->birthplace = $request['birthplace'];
      $employee->birthdate = $request['birthdate'];
      $employee->address = $request['address'];
     // $employee->city = ucfirst($city);
      $employee->division_id = $request['division_id'];
      $employee->city_id = $request['city'];
      $employee->sex = $request['sex'];
      $employee->phone_number = $request['phone_number'];
      $employee->save();

      $employee = Employee::all()->sortByDesc('id')->first();
      $employee_id = $employee->id;

      $user = new User();
      $user->email = $request['email'];
      $user->password = Hash::make($request['password']);
      $user->employee_id = $employee_id;
      $user->save();

      $output['user_employees'] = User::whereNotNull('employee_id')->get();

      return view('employee.dashboard-employee-data')->with($output)
          ->withErrors(array(
            'success' => 'Pegawai berhasil ditambahkan!'
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
      $user = $this->getUser();
      $employee = Employee::where('id', $user->employee_id)->first();
      $output['email'] = $user->email;
      $output['fullname'] = $employee->fullname;
      $output['employeeAvatar'] = $employee->employeeAvatar;
      $output['divisi'] = $employee->division_id;

      //$output['employee'] = Employee::find($id);
      $output['employee'] = Employee::selectRaw('employees.employee_no, employees.fullname, employees.birthplace, employees.birthdate, employees.address, 
                                                  divisions.name, employees.sex, employees.phone_number, employees.city_id')
                                                 ->join('divisions', 'employees.division_id', 'divisions.id')
                                                 ->join('users', 'users.employee_id', 'employees.id')
                                                 ->where('users.employee_id', $id)
                                                 ->first();
       $output['city'] = City::where('id', $output['employee']->city_id)->first()->city;

      return view('employee.dashboard-employee-detail')->with($output);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = $this->getUser();
      $output['email'] = $user->email;
      $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
      $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
      $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

      $output['user'] = User::where('employee_id', $id)->first();
      $output['employee'] = Employee::find($id);
      $output['cities'] = City::all();
      $output['divisions'] = Division::all();

      /* debugging using hash, cannot use bcrypt, has different value for Hash::check method
      $mbak_nora = User::find(7);
      $password = $mbak_nora->password;
      if (Hash::check('themoneygo', $password)) {
        $output['result'] = 'benar';
      } else {
        $output['result'] = 'salah';
      }
      */

      return view('employee.dashboard-employee-edit')->with($output);
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
      $user = $this->getUser();
      $output['email'] = $user->email;
      $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
      $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
      $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

      $output['user'] = User::where('employee_id', $id)->first();
      $output['employee'] = Employee::find($id);
      $output['divisions'] = Division::all();
      $output['cities'] = City::all();

      /* update in users table */
      if ($request['change_pass'] == 1) {
        if (!Hash::check($request['password_old'], $output['user']->password)) {
          return view('employee.dashboard-employee-edit')->with($output)
            ->withErrors(array(
              'error' => 'Password lama salah'
            ));
        }

        if ($request['password_new'] != $request['password_new_cfm']) {
          return view('employee.dashboard-employee-edit')->with($output)
            ->withErrors(array(
              'error' => 'Konfirmasi password salah. Silahkan ulangi lagi'
            ));
        }

        $password_new = $request['password_new_cfm'];

        $user = User::where('employee_id', $id)->first();
        $user->email = $request['email'];
        $user->password = Hash::make($password_new);
        $user->save();
      }

      if ($request['change_pass'] == 0) {
        $user = User::where('employee_id', $id)->first();
        $user->email = $request['email'];
        $user->save();
      }

      $employee = Employee::where('id', $id)->first();
      $employee->employee_no = $request['employee_no'];
      $employee->fullname = $request['fullname'];
      $employee->birthplace = $request['birthplace'];
      $employee->birthdate = $request['birthdate'];
      $employee->address = $request['address'];
      $employee->city_id = $request['city'];
      $employee->division_id = $request['division_id'];
      $employee->sex = $request['sex'];
      $employee->phone_number = $request['phone_number'];
      $employee->save();

      $output['user'] = User::where('employee_id', $id)->first();

      $output['user_employees'] = User::whereNotNull('employee_id')->get();

      return view('employee.dashboard-employee-data')->with($output)
        ->withErrors(array(
          'success' => 'Pegawai berhasil diperbaharui!'
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = $this->getUser();
      $output['email'] = $user->email;
      $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
      $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
      $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
      $output['cities'] = City::all();

      User::where('employee_id', $id)->delete();
      Employee::find($id)->delete();

      $output['user_employees'] = User::whereNotNull('employee_id')->get();

      return view('employee.dashboard-employee-data')->with($output)
        ->withErrors(array(
          'success' => 'Pegawai berhasil dihapus!'
        ));
    }
}

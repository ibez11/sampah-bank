<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\User;
use App\Transaction;
use App\OperatingCosts;
use App\Institution;
use App\Http\Controllers\Customers\Helper;
use App\Http\Controllers\Transactions\Dashboard;

class ReportController extends Controller
{
    public $helper;
    public $dashboard;
    public function __construct(){
        $this->helper = new Helper();
        $this->dashboard = new Dashboard();
    }

    public function report(){
        $user = $this->helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
      
        $output['institutions'] = Institution::get();

        return view('employee.dashboard-employee-report')->with($output);
      }
    
      public function generateReport(Request $request){
        $user = $this->helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
        $output['institutions'] = Institution::get();
    
        $errors = array();
        $email = $request['email'];
        $customers = User::where('email', $email);

        if($customers->count() == 0 && $email != ''){
          $errors['error'] = 'Email nasabah tidak ditemukan';
          return redirect()->back()->with($output)->withErrors($errors)->withInput();
        }

        $customer = $customers->first();
    
        $customerid;
        if($customers->count() == 0){
          $customerid = null;
        }
        else{
          $customerid = $customer->id;
        }
    
        //report
        if($request['reporttype'] == 1){ //daily
          $chartjs = $this->dashboard->getChartDataDaily($request['startdate'],
            $request['enddate'], $customerid,  $request['institution'], $request['subinstitution']);
          if(array_key_exists('error', $chartjs)){
            $errors['error'] = $chartjs['error']; //set errors to show to view
            $chartjs = array();
          }
        }
        else{ //monthly
          $chartjs = $this->dashboard->getChartDataMonthly($request['startdate'],
            $request['enddate'], $customerid, $request['institution'], $request['subinstitution']);
          if(array_key_exists('error', $chartjs)){
            $errors['error'] = $chartjs['error']; //set errors to show to view
            $chartjs = array();
          }
        }
    
        //generate detailed report
        $report = $this->dashboard->generateOverallReport($request['startdate'], $request['enddate'], $customerid,
          $request['reporttype'], $request['institution'], $request['subinstitution']);
        $output['transactions'] = $report['trans'];
        $output['totaldebit'] = $report['debit'];
        $output['totalcredit'] = $report['credit'];
        $output['totalprofit'] = $report['profit'];
    
    
        return view('employee.dashboard-employee-report', compact('chartjs'))->with($output)->withErrors($errors);
      }
    
      public function inoutReport() {
        $user = $this->helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        $output['transactions'] = Transaction::orderByDesc('created_at')->get();
        $output['operating_costs'] = OperatingCosts::orderByDesc('created_at')->get();
    
    
        $output['total_profit'] = Transaction::where('is_debit', 1)->sum('amount_profit');
        $output['total_debit'] = Transaction::where('is_debit', 1)->sum('amount_money');
        $output['total_credit'] = Transaction::where('is_debit', 0)->sum('amount_used');
        $output['total_op_costs'] = OperatingCosts::sum('amount_unit');
    
        //$output['result'] = $output
        return view('employee.dashboard-report')->with($output);
      }
}

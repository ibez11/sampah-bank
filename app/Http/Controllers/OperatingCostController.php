<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\OperatingCosts;
use Carbon\Carbon;
use App\Http\Controllers\Customers\Helper;


class OperatingCostController extends Controller
{
    public $helper;
    public function __construct(){
        $this->helper = new Helper();
    }
    
    public function showOperatingCosts() {
        $user = $this->helper->getUser();
    
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        $output['operating_costs'] = OperatingCosts::orderBy('transaction_date', 'desc')->get();
        $output['total_costs'] = OperatingCosts::sum('amount_unit');
    
        return view('employee.dashboard-operating-costs')->with($output);
      }
    
      public function addOperatingCosts() {
        $user = $this->helper->getUser();
    
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        return view('employee.dashboard-operating-costs-add')->with($output);
      }
    
      public function saveOperatingCosts(Request $request) {
        $user = $this->helper->getUser();
    
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        $request['amount_unit'] = str_replace('.', '', $request['amount_unit']);
        $request['description'] = str_replace(',', '.', $request['description']);
        $td = Carbon::parse($request['transaction_date']);
    
        $operatingCosts = new OperatingCosts();
        $operatingCosts->amount_unit = $request['amount_unit'];
        $operatingCosts->description = $request['description'];
        $operatingCosts->transaction_date = $td->format('Y-m-d');
        $operatingCosts->save();
    
        $output['operating_costs'] = OperatingCosts::orderBy('transaction_date', 'desc')->get();
        $output['total_costs'] = OperatingCosts::sum('amount_unit');
    
        return view('employee.dashboard-operating-costs')->with($output)
          ->withErrors(array(
            'success' => 'Biaya Operasional Berhasil Di Tambahkan'
          ));
      }
    
      public function deleteOperatingCosts($id) {
        OperatingCosts::find($id)->delete();
    
        $user = $this->helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        $output['operating_costs'] = OperatingCosts::orderBy('transaction_date', 'desc')->get();
        $output['total_costs'] = OperatingCosts::sum('amount_unit');
    
        return view('employee.dashboard-operating-costs')->with($output)
          ->withErrors(array(
            'success' => 'Biaya Berhasil Dihapus'
          ));
      }
    
}

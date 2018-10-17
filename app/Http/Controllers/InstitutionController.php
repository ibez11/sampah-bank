<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;
use App\Subinstitution;
use App\Employee;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Transactions\Helper;
use App\Http\Controllers\Customers\Helper as CustHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class InstitutionController extends Controller
{
    public $cust_helper;
    public $helper;
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

        $institutions = Institution::get();
        foreach ($institutions as $institution) {
            $date = Carbon::parse($institution->created_at);
            $institution->date = $date->format('d M Y H:i:s');
        }
        $output['institutions'] = $institutions;

        return view('employee.dashboard-employee-institutions')->with($output);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->cust_helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

        return view('employee.dashboard-employee-institutions-create')->with($output);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $institution = new Institution;
        $institution->name = $request['name'];
        $institution->address = $request['address'];
        $institution->phone = $request['phone'];
        $institution->description = $request['desc'];
        $institution->save();

        $user = $this->cust_helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

        $institutions = Institution::get();
        foreach ($institutions as $institution) {
            $date = Carbon::parse($institution->created_at);
            $institution->date = $date->format('d M Y H:i:s');
        }
        $output['institutions'] = $institutions;

        return view('employee.dashboard-employee-institutions')->with($output)->withErrors(array(
            'success' => 'Institusi telah berhasil ditambahkan'
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
    public function edit(Request $request, $id)
    {
        $user = $this->cust_helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

        $errors = array();
        if($request->has('success')){
            $errors = array(
                'success' => 'Institusi berhasil diubah'
            );
        }

        $institution = Institution::where('id', $id)->get()->first();
        $output['institution'] = $institution;
        $output['subinstitutions'] = Subinstitution::where('institution_id', $id)->get();

        return view('employee.dashboard-employee-institutions-create')->with($output)->withErrors($errors);
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
        $institution = Institution::where('id', $id)->get()->first();
        $institution->name = $request['name'];
        $institution->address = $request['address'];
        $institution->phone = $request['phone'];
        $institution->description = $request['desc'];
        $institution->save();

        $user = $this->cust_helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

        $institutions = Institution::get();
        foreach ($institutions as $institution) {
            $date = Carbon::parse($institution->created_at);
            $institution->date = $date->format('d M Y H:i:s');
        }
        $output['institutions'] = $institutions;

        return view('employee.dashboard-employee-institutions')->with($output)->withErrors(array(
            'success' => 'Institusi telah berhasil diubah'
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
        //delete subinstitutions
        Subinstitution::where('institution_id', $id)->delete();

        Institution::where('id', $id)->delete();
        $user = $this->cust_helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

        $institutions = Institution::get();
        foreach ($institutions as $institution) {
            $date = Carbon::parse($institution->created_at);
            $institution->date = $date->format('d M Y H:i:s');
        }
        $output['institutions'] = $institutions;

        return view('employee.dashboard-employee-institutions')->with($output)->withErrors(array(
            'success' => 'Institusi telah berhasil dihapus'
        ));
    }
}

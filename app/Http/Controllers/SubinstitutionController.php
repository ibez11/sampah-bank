<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Institution;
use App\Subinstitution;
use App\Customer;
use App\Http\Controllers\Transactions\Helper;
use App\Http\Controllers\Customers\Helper as CustHelper;

class SubinstitutionController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = trim($request['name']);
        $institution_id = $request['institution_id'];

        $lookups = Subinstitution::where('name', $name)->where('institution_id', $institution_id);

        if($lookups->count() > 0){
            return json_encode(array(
                'status' => 1,
                'message' => 'Nama subsinstitusi sudah dipakai pada institusi ini'
            ));
        }

        $subinstitution = new Subinstitution;
        $subinstitution->name = $name;
        $subinstitution->description = $request['desc'];
        $subinstitution->institution_id = $request['institution_id'];
        $subinstitution->save();
        return json_encode(array(
            'status' => 0,
            'message' => 'Subinstitusi berhasil ditambah'
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
        $subinstitution = Subinstitution::where('id', $id)->get()->first();
        return json_encode($subinstitution);
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
        $name = trim($request['name']);
        $institution_id = $request['institution_id'];

        $lookups = Subinstitution::where('name', $name)->where('institution_id', $institution_id)->
            where('id', '!=', $id);

        if($lookups->count() > 0){
            return json_encode(array(
                'status' => 1,
                'message' => 'Nama subsinstitusi sudah dipakai pada institusi ini'
            ));
        }

        $subinstitution = Subinstitution::where('id', $id)->get()->first();
        $subinstitution->name = $name;
        $subinstitution->description = $request['desc'];
        $subinstitution->save();
        return json_encode(array(
            'status' => 0,
            'message' => 'Subinstitusi berhasil diubah'
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
        $user = $this->cust_helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

        $institution_id = Subinstitution::where('id', $id)->get()->first()->institution_id;

        $customers = Customer::where('subinstitution_id', $id);
        if($customers->count() > 0){
            $institution = Institution::where('id', $institution_id)->get()->first();
            $output['institution'] = $institution;
            $output['subinstitutions'] = Subinstitution::where('institution_id', $institution_id)->get();

            return view('employee.dashboard-employee-institutions-create')->with($output)->withErrors(
                array(
                    'error' => 'Subinstitusi tidak dapat dihapus karena telah digunakan di nasabah'
                )
            );
        }
       
        Subinstitution::where('id', $id)->delete();

        $institution = Institution::where('id', $institution_id)->get()->first();
        $output['institution'] = $institution;
        $output['subinstitutions'] = Subinstitution::where('institution_id', $institution_id)->get();

        return view('employee.dashboard-employee-institutions-create')->with($output)->withErrors(
            array(
                'success' => 'Subinstitusi berhasil dihapus'
            )
        );
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Customers\Helper as CustHelper;
use App\Http\Controllers\Transactions\Helper;
use App\Employee;
use App\Customer;
use App\Donation;
use App\User;
use Carbon\Carbon;

class DonationController extends Controller
{
    public $cust_helper;
    public $dashboard;
    public $helper;
    public function __construct(){
        $this->cust_helper = new CustHelper();
        $this->helper = new Helper();
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

        $donations = Donation::selectRaw('donations.id, donations.amount_unit, donations.message, donations.transaction_date,
        customers.fullname, subinstitutions.name as subinstitution, institutions.name as institution')
        ->leftJoin('customers', 'customers.id', '=', 'donations.customer_id')
        ->leftJoin('subinstitutions', 'subinstitutions.id', '=', 'customers.subinstitution_id')
        ->leftJoin('institutions', 'institutions.id', '=', 'subinstitutions.institution_id')
        ->get();
        
        foreach ($donations as $donation) {
            $donation->trans_date_str = Carbon::parse($donation->transaction_date)->format('d M Y');
        }

        $output['donations'] = $donations;

        return view('employee.dashboard-donation-data')->with($output);
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
        $output['customers'] = Customer::selectRaw('customers.id, customers.fullname,
            users.email')
            ->leftJoin('users', 'users.customer_id', '=', 'customers.id')
            ->get();

        return view('employee.dashboard-donation-create')->with($output);
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

        $customer_id = $request['customer'];

        //validate customer ID
        if($customer_id == -1){
            $output['customers'] = Customer::selectRaw('customers.id, customers.fullname,
            users.email')
            ->leftJoin('users', 'users.customer_id', '=', 'customers.id')
            ->get();

            return redirect()->back()->withErrors(array(
                'error' => 'Nasabah harus diisi'
            ))->withInput();
        }

        $amount_unit = str_replace('.', '', $request['amount_unit']);
        $amount_unit = str_replace(',', '.', $amount_unit);
        $message = $request['message'];
        $td = Carbon::parse($request['transaction_date']);
        $transaction_date = $td->format('Y-m-d');

        $donation = new Donation();
        $donation->amount_unit = floatval($amount_unit);
        $donation->message = $message;
        $donation->customer_id = $customer_id;
        $donation->transaction_date = $transaction_date;
        $donation->save();

        $customer = Customer::where('id', $customer_id)->get()->first();
        $customer_user = User::where('customer_id', $customer_id)->get()->first();
        $trans_date = $td->format('d F Y');
        $this->helper->sendDonationEmail($customer_user, $customer, $amount_unit, $message, $trans_date);

        $donations = Donation::selectRaw('donations.id, donations.amount_unit, donations.message, donations.transaction_date,
        customers.fullname, subinstitutions.name as subinstitution, institutions.name as institution')
        ->leftJoin('customers', 'customers.id', '=', 'donations.customer_id')
        ->leftJoin('subinstitutions', 'subinstitutions.id', '=', 'customers.subinstitution_id')
        ->leftJoin('institutions', 'institutions.id', '=', 'subinstitutions.institution_id')
        ->get();
        
        foreach ($donations as $donation) {
            $donation->trans_date_str = Carbon::parse($donation->transaction_date)->format('d M Y');
        }

        $output['donations'] = $donations;

        return view('employee.dashboard-donation-data')->with($output)->withErrors(array(
            'success' => 'Sumbangan berhasil ditambahkan. Pesan Anda telah dikirim ke nasabah bersangkutan'
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
        $user = $this->cust_helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

        Donation::where('id', $id)->delete();

        $donations = Donation::selectRaw('donations.id, donations.amount_unit, donations.message, donations.transaction_date,
        customers.fullname, subinstitutions.name as subinstitution, institutions.name as institution')
        ->leftJoin('customers', 'customers.id', '=', 'donations.customer_id')
        ->leftJoin('subinstitutions', 'subinstitutions.id', '=', 'customers.subinstitution_id')
        ->leftJoin('institutions', 'institutions.id', '=', 'subinstitutions.institution_id')
        ->get();
        
        foreach ($donations as $donation) {
            $donation->trans_date_str = Carbon::parse($donation->transaction_date)->format('d M Y');
        }

        $output['donations'] = $donations;

        return view('employee.dashboard-donation-data')->with($output)->withErrors(array(
            'success' => 'Sumbangan berhasil dihapus'
        ));
    }
}

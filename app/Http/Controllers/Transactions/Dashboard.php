<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Transactions\Helper;
use Illuminate\Support\Facades\Log;
use App\Transaction;
use App\Customer;
use App\OperatingCosts;
use App\User;
use Carbon\Carbon;


class Dashboard{
  public $helper;

  public function __construct(){
    $this->helper = new Helper();
  }

  public function getChartDataDaily($startdate, $enddate, $userid, $institutionid, $subinstitutionid){

    $sd = Carbon::parse($startdate);
    $ed = Carbon::parse($enddate);

    if($sd->diffInDays($ed) > 31){
      $error = array(
        'error' => 'Laporan harian maksimal hanya dalam rentang 30 hari'
      );
      return $error;
    }



    $operator = '=';
    if($userid == null){
      $operator = '<>';
      $userid = 'NULL';
    }



    $debit_transactions = Transaction::groupBy('month')->groupBy('year')->groupBy('day')
    ->selectRaw("sum(amount_money) as total, DAY(transactions.created_at) as day, MONTH(transactions.created_at) as month, YEAR(transactions.created_at) as year")
    ->where('user_id', $operator, $userid)
    ->where('is_debit', 1)
    ->leftjoin('users', 'users.id', '=', 'transactions.user_id')
    ->leftjoin('customers', 'customers.id', '=', 'users.customer_id')
    ->leftjoin('subinstitutions', 'customers.subinstitution_id', '=' , 'subinstitutions.id')
    ->leftjoin('institutions', 'institutions.id', '=', 'subinstitutions.institution_id')
    ->whereDate('transactions.created_at', '>=', $sd->format('Y-m-d'))
    ->whereDate('transactions.created_at', '<=', $ed->format('Y-m-d'));
    $credit_transactions = Transaction::groupBy('month')->groupBy('year')->groupBy('day')
    ->selectRaw("sum(amount_used) as total, DAY(transactions.created_at) as day, MONTH(transactions.created_at) as month, YEAR(transactions.created_at) as year")
    ->where('user_id', $operator, $userid)
    ->where('is_debit', 0)
    ->leftjoin('users', 'users.id', '=', 'transactions.user_id')
    ->leftjoin('customers', 'customers.id', '=', 'users.customer_id')
    ->leftjoin('subinstitutions', 'customers.subinstitution_id', '=' , 'subinstitutions.id')
    ->leftjoin('institutions', 'institutions.id', '=', 'subinstitutions.institution_id')
    ->whereDate('transactions.created_at', '>=', $sd->format('Y-m-d'))
    ->whereDate('transactions.created_at', '<=', $ed->format('Y-m-d'));

    if($institutionid != -1 && $institutionid != ''){
      $debit_transactions = $debit_transactions->where('institutions.id', '=', $institutionid);
      $credit_transactions = $credit_transactions->where('institutions.id', '=', $institutionid);
    }  
    if($subinstitutionid != -1 && $subinstitutionid != ''){
      $debit_transactions = $debit_transactions->where('customers.subinstitution_id', '=', $subinstitutionid);
      $credit_transactions = $credit_transactions->where('customers.subinstitution_id', '=', $subinstitutionid);
    }

    $debit = $debit_transactions->get();
    $credit = $credit_transactions->get();

    $title_debit =  "Debit " . $sd->format('d F Y') . " s/d " . $ed->format('d F Y');
    $title_credit =  "Kredit " . $sd->format('d F Y') . " s/d " . $ed->format('d F Y');

    $labels = $this->helper->generateDateRange($sd, $ed);
    //convert to collection in order to filter
    $trans_debit = collect($debit);
    $trans_credit = collect($credit);

    //sum all transaction on a date based on labels
    foreach($labels as $label){
      $filtered_debit = $trans_debit->filter(function($value, $key) use ($label){
        $dtlabel = Carbon::parse($label);

        //compare if date in database equals to date in label
        return $dtlabel->day == $value['day'] && $dtlabel->month == $value['month'] && $dtlabel->year == $value['year'];
      });

      $filtered_credit = $trans_credit->filter(function($value, $key) use ($label){
        $dtlabel = Carbon::parse($label);

        //compare if date in database equals to date in label
        return $dtlabel->day == $value['day'] && $dtlabel->month == $value['month'] && $dtlabel->year == $value['year'];
      });

      //sum filtered data on a date (example: sum amount in date 1 Aug 2017)
      $data_debit[] = $filtered_debit->sum('total');
      $data_credit[] =  $filtered_credit->sum('total');
    }
    return $this->helper->renderChart($labels, $title_debit, $title_credit, $data_debit, $data_credit);

  }

  public function getChartDataMonthly($startdate, $enddate, $userid, $institutionid, $subinstitutionid){
    $sd = Carbon::createFromFormat('m-Y', $startdate);
    $ed = Carbon::createFromFormat('m-Y',$enddate);

    if($sd->gt($ed)){
      $error = array(
        'error' => 'Bulan akhir harus lebih besar dari bulan mulai'
      );
      return $error;
    }
    if($sd->diffInDays($ed) > 366){
      $error = array(
        'error' => 'Laporan bulanan maksimal hanya dalam rentang 1 tahun'
      );
      return $error;
    }

    $operator = '=';
    if($userid == null){
      $operator = '<>';
      $userid = 'NULL';
    }

    $debit_transactions = Transaction::groupBy('month')->groupBy('year')
    ->selectRaw("sum(amount_money) as total, MONTH(transactions.created_at) as month, YEAR(transactions.created_at) as year")
    ->where('user_id', $operator, $userid)->where('is_debit', 1)
    ->leftjoin('users', 'users.id', '=', 'transactions.user_id')
    ->leftjoin('customers', 'customers.id', '=', 'users.customer_id')
    ->leftjoin('subinstitutions', 'customers.subinstitution_id', '=' , 'subinstitutions.id')
    ->leftjoin('institutions', 'institutions.id', '=', 'subinstitutions.institution_id')
    ->having('year', '>=', $sd->year)
    ->having('year', '<=', $ed->year);
    $credit_transactions = Transaction::groupBy('month')->groupBy('year')
    ->selectRaw("sum(amount_used) as total, MONTH(transactions.created_at) as month, YEAR(transactions.created_at) as year")
    ->where('user_id', $operator, $userid)->where('is_debit', 0)
    ->leftjoin('users', 'users.id', '=', 'transactions.user_id')
    ->leftjoin('customers', 'customers.id', '=', 'users.customer_id')
    ->leftjoin('subinstitutions', 'customers.subinstitution_id', '=' , 'subinstitutions.id')
    ->leftjoin('institutions', 'institutions.id', '=', 'subinstitutions.institution_id')
    ->having('year', '>=', $sd->year)
    ->having('year', '<=', $ed->year);

    if($institutionid != -1 && $institutionid != ''){
      $debit_transactions = $debit_transactions->where('institutions.id', '=', $institutionid);
      $credit_transactions = $credit_transactions->where('institutions.id', '=', $institutionid);
    }  
    if($subinstitutionid != -1 && $subinstitutionid != ''){
      $debit_transactions = $debit_transactions->where('customers.subinstitution_id', '=', $subinstitutionid);
      $credit_transactions = $credit_transactions->where('customers.subinstitution_id', '=', $subinstitutionid);
    }

    $debit = $debit_transactions->get();
    $credit = $credit_transactions->get();

    $title_debit =  "Debit " . $sd->format('F Y') . " s/d " . $ed->format('F Y');
    $title_credit =  "Kredit " . $sd->format('F Y') . " s/d " . $ed->format('F Y');

    $labels = $this->helper->generateMonthRange($sd, $ed);

    //convert to collection in order to filter
    $trans_debit = collect($debit);
    $trans_credit = collect($credit);

    //sum all transaction on a date based on labels
    foreach($labels as $label){
      $filtered_debit = $trans_debit->filter(function($value, $key) use ($label){
        $dtlabel = Carbon::createFromFormat('m-Y', $label);

        //compare if date in database equals to date in label
        return $dtlabel->month == $value['month'] && $dtlabel->year == $value['year'];
      });

      $filtered_credit = $trans_credit->filter(function($value, $key) use ($label){
        $dtlabel = Carbon::createFromFormat('m-Y', $label);
        //compare if date in database equals to date in label
        return $dtlabel->month == $value['month'] && $dtlabel->year == $value['year'];
      });

      //sum filtered data on a date (example: sum amount in date 1 Aug 2017)
      $data_debit[] = $filtered_debit->sum('total');
      $data_credit[] =  $filtered_credit->sum('total');
    }
    return $this->helper->renderChart($labels, $title_debit, $title_credit, $data_debit, $data_credit);
  }

  public function generateOverallReport($startdate, $enddate, $userid, $reporttype,
    $institutionid, $subinstitutionid){
    $sd;
    $ed;
    if($reporttype == 1) {//daily
      $sd = Carbon::parse($startdate)->setTime(0,0,0); //set in the beginning of the day
      $ed = Carbon::parse($enddate)->setTime(24,0,0); //set in the end of the day
    }
    else{ //monthly
      $sd_buffer = Carbon::createFromFormat('m-Y', $startdate)->format('F Y'); //output example: January 2017
      $sd = Carbon::parse('first day of '. $sd_buffer); //first day of January 2017 = 01 Jan 2017 (2017/01/01)
      $ed_buffer = Carbon::createFromFormat('m-Y', $enddate)->format('F Y'); //output example: January 2017
      $ed = Carbon::parse('last day of ' . $ed_buffer); //last day of January 2017 = 31 Jan 2017 (2017/01/31)
    }

    $transactions = Transaction::selectRaw('transactions.is_debit, customers.fullname, users.email, transactions.created_at,
    transactions.amount_money, transactions.amount_profit, transactions.amount_used, transactions.product, 
    subinstitutions.name as subinstitution_name, institutions.name as institution_name')
    ->where('transactions.created_at', '>=', $sd->format('Y/m/d'))
    ->where('transactions.created_at', '<=', $ed->format('Y/m/d'));

   
    if($institutionid != -1 && $institutionid != ''){
      $transactions = $transactions->where('institutions.id', '=', $institutionid);
    }  
    if($subinstitutionid != -1 && $subinstitutionid != ''){
      $transactions = $transactions->where('customers.subinstitution_id', '=', $subinstitutionid);
    }
    
    $transactions = $transactions->leftjoin('users', 'users.id', '=', 'transactions.user_id')
    ->leftjoin('customers', 'customers.id', '=', 'users.customer_id')
    ->leftjoin('subinstitutions', 'customers.subinstitution_id', '=' , 'subinstitutions.id')
    ->leftjoin('institutions', 'institutions.id', '=', 'subinstitutions.institution_id');
   
    if($userid != null){
      $transactions = $transactions->where('transactions.user_id', '=', $userid);
    }

    $transactions = $transactions->get();

    $operating_costs = OperatingCosts::where('transaction_date', '>=', $sd->format('Y/m/d'))
    ->where('transaction_date', '<=', $ed->format('Y/m/d'))->get();

    //put operating costs to transactions object array
    foreach ($operating_costs as $op) {
      $trans_op = array(
        'amount_used' => $op->amount_unit,
        'amount_money' => 0,
        'amount_profit' => 0,
        'is_debit' => 0,
        'created_at' => $op->transaction_date,
        'fullname' => 'Administrator',
        'email' => 'admin',
        'operational' => 1,
        'product' => '',
        'subinstitution_name' => '',
        'institution_name' => ''
      );
      $transactions[] = $trans_op;
    }

    $transactions = collect($transactions)->sortBy('created_at')
    ->sortBy('operational');

    $totaldebit = Transaction::selectRaw('sum(transactions.amount_money) as debit')
    ->where('transactions.is_debit', '=', '1')
    ->where('transactions.created_at', '>=', $sd->format('Y/m/d'))
    ->where('transactions.created_at', '<=', $ed->format('Y/m/d'))
    ->leftjoin('users', 'users.id', '=', 'transactions.user_id')
    ->leftjoin('customers', 'customers.id', '=', 'users.customer_id');

    $totalcredit = Transaction::selectRaw('SUM(amount_used) as credit')
    ->where('transactions.is_debit', '=', '0')
    ->where('transactions.created_at', '>=', $sd->format('Y/m/d'))
    ->where('transactions.created_at', '<=', $ed->format('Y/m/d'))
    ->leftjoin('users', 'users.id', '=', 'transactions.user_id')
    ->leftjoin('customers', 'customers.id', '=', 'users.customer_id');

    $totalprofit = Transaction::selectRaw('SUM(amount_profit) as profit')
    ->where('transactions.is_debit', '=', '1')
    ->where('transactions.created_at', '>=', $sd->format('Y/m/d'))
    ->where('transactions.created_at', '<=', $ed->format('Y/m/d'))
    ->leftjoin('users', 'users.id', '=', 'transactions.user_id')
    ->leftjoin('customers', 'customers.id', '=', 'users.customer_id');

    if($userid != null){
      $totaldebit = $totaldebit->where('transactions.user_id', '=', $userid);
      $totalcredit = $totalcredit->where('transactions.user_id', '=', $userid);
      $totalprofit = $totalprofit->where('transactions.user_id', '=', $userid);
    }

    $totaldebit = $totaldebit->get();
    $totalcredit = $totalcredit->get();
    $totalprofit = $totalprofit->get();

    $debit = 0;
    $credit = 0;
    $profit = 0;
    if($totaldebit->count() > 0){
      $debit = $totaldebit->first()->debit;
    }
    if($totalcredit->count() > 0){
      $credit = $totalcredit->first()->credit;
    }
    if($totalprofit->count() > 0){
      $profit = $totalprofit->first()->profit;
    }

    $totalcosts = OperatingCosts::selectRaw('SUM(amount_unit) as cost')
    ->where('transaction_date', '>=', $sd->format('Y/m/d'))
    ->where('transaction_date', '<=', $ed->format('Y/m/d'))->get();

    //convert to JSON then convert to object from Laravel collection
    $json = $transactions->toJson();
    $transactions = json_decode($json);

    $accumulative = 0;
    foreach ($transactions as $trans) {
     $trans->date = Carbon::parse($trans->created_at)->format('d M Y');
      if($trans->is_debit == 1){
        $accumulative = $accumulative + $trans->amount_money;
      }
      else{
        $accumulative = $accumulative - $trans->amount_used;
      }
      $trans->accumulative = $accumulative;
    }

    $output = array(
      'trans' => $transactions,
      'debit' => $debit,
      'credit' => $credit + $totalcosts->first()->cost,
      'profit' => $profit
    );

    return $output;
  }
}


 ?>

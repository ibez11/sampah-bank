<?php
namespace App\Http\Controllers\Customers;

use Illuminate\Support\Facades\Log;
use App\Customer;
use App\User;
use App\Settings;
use App\Transaction;
use Carbon\Carbon;
use App\Subinstitution;
use Mail;
use JWTAuth;
use Session;
use Tymon\JWTAuth\Exceptions\JWTException;

class Helper{
  public function getMaxWithdrawAmount($user){
    $userid = $user->id;
    $isCorporate = false;
    $isDisbursementDismissed = false;

    //get customer to read the type
    $customer = Customer::where('id', $user->customer_id)->first();
    if($customer->customer_type == 'organization'){
      $isCorporate = true;
    }

    //get global settings to get minimum balance for disbursement date dismiss
    $settings = Settings::first();
    $min_balance = $settings->minimum_balance;
    $current_balance = $this->getBalanceByUserId($userid)['debit'];
    if($current_balance >= $min_balance){
      $isDisbursementDismissed = true;
    }

    //set only half of amount that can be withdrawn
    $debit_query = 'SUM(amount_money) AS total_amount';
    // if($isCorporate){
    //   $debit_query = 'SUM(amount_money/2) AS total_amount';
    // }

    $transactions_credit = Transaction::selectRaw('SUM(amount_used) AS total_credit')->where('user_id', $userid)->get();
    $transactions_avail = Transaction::selectRaw($debit_query)
    ->where('user_id', $userid);
    // if($isDisbursementDismissed == false){
    //   $transactions_avail = $transactions_avail->whereDate('created_at', '<=', Carbon::now()->addMonth(-3)->toDateString());
    // }
    $transactions_avail = $transactions_avail->get();

    return $transactions_avail->first()->total_amount - $transactions_credit->first()->total_credit;
  }

  public function getUser(){
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

  public function getCustomer($customerid, $output){ //$output = output to append to
    $customer = Customer::where('id', $customerid)->first() ;
    if($customer->subinstitution_id != null){
        $subinstitution = Subinstitution::where('id', $customer->subinstitution_id)->get()->first();
        $output['institution_id'] = $subinstitution->institution_id;
    }
    $output['identity_no'] = $customer->identity_no;
    $output['fullname'] = $customer->fullname;
    $output['corporate_name'] = $customer->corporate_name;
    $output['religion'] = $customer->religion->religion;
    $output['birthplace'] = $customer->birthplace;
    $output['birthdate'] = $customer->birthdate;
    $output['address'] = $customer->address;
    $output['city'] = $customer->city;
    $output['customer_type'] = $customer->customer_type;
    $output['sex'] = $customer->sex;
    $output['phone_number'] = $customer->phone_number;
    $output['subinstitution_id']= $customer->subinstitution_id;
    $output['customerAvatar'] = $customer->customerAvatar;
    $output['created_at'] = $customer->created_at;
    return $output;
  }

  public function getBalanceByUserId($userid){
    if($userid == null){
      return array(
        'debit' => 0,
        'credit' => 0
      );
    }
    $debit = Transaction::where('user_id', $userid)->where('is_debit', 1)->sum('amount_money');
    $credit = Transaction::where('user_id', $userid)->where('is_debit', 0)->sum('amount_used');
    $total_weight = Transaction::where('user_id', $userid)->where('is_debit', 1)->sum('amount_kg');
    return array(
      'debit' => $debit,
      'credit' => $credit,
      'weight' => $total_weight
    );
  }
}

 ?>

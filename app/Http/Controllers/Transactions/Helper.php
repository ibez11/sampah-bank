<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Support\Facades\Log;
use App\Transaction;
use App\Customer;
use App\User;
use Carbon\Carbon;
use Mail;
use Session;

class Helper{
  public function sendWithdrawalEmail($user, $customer, $amount_used, $finalBalance){
    Mail::send('emails.withdraw', ['user' => $user, 'customer' => $customer,
      'amount_used' => $amount_used, 'balance' => $finalBalance
      ], function ($message) use ($user, $customer) {
        $message->from('no-reply@tdbangarna.com', 'Tuan Di Bangarna Bank');
        if($customer != null){
          $message->to($user->email, $customer->fullname)
          ->bcc('theodorusyoga@outlook.com')
          ->subject('Penarikan Berhasil - Tuan Di Bangarna Bank');
        }
        else{
          $message->to($user->email, 'Customer')
          ->bcc('theodorusyoga@outlook.com')
          ->subject('Penarikan Berhasil - Tuan Di Bangarna Bank');
        }

    });
  }
  
  public function sendDepositEmail($user, $customer, $product, $amount_kg, $amount_unit, $amount_money, $finalBalance){
    Mail::send('emails.deposit', ['user' => $user, 'customer' => $customer, 'product' => $product,
      'amount_kg' => $amount_kg, 'amount_unit' => $amount_unit, 'amount_money' => $amount_money, 'balance' => $finalBalance
      ], function ($message) use ($user, $customer) {
        $message->from('no-reply@tdbangarna.com', 'Tuan Di Bangarna Bank');
        if($customer != null){
          $message->to($user->email, $customer->fullname)
          ->bcc('theodorusyoga@outlook.com')
          ->subject('Deposit Berhasil - Tuan Di Bangarna Bank');
        }
        else{
          $message->to($user->email, 'Customer')
          ->bcc('theodorusyoga@outlook.com')
          ->subject('Deposit Berhasil - Tuan Di Bangarna Bank');
        }

    });
  }

  public function sendDonationEmail($user, $customer, $amount_unit, $message_admin, $transaction_date){
    Log::debug('masuk');
    Log::debug(json_encode($user));
    Log::debug(json_encode($customer));
    Log::debug($amount_unit);
    Log::debug($message_admin);
    Log::debug($transaction_date);
    Mail::send('emails.donation', ['user' => $user, 'customer' => $customer,
      'amount_unit' => $amount_unit, 'message_admin' => $message_admin, 'transaction_date' => $transaction_date
      ], function ($message) use ($user, $customer) {
        $message->from('no-reply@tdbangarna.com', 'Tuan Di Bangarna Bank');
        if($customer != null){
          $message->to($user->email, $customer->fullname)
          ->bcc('theodorusyoga@outlook.com')
          ->subject('Notifikasi Penerimaan Sumbangan - Tuan Di Bangarna Bank');
        }
        else{
          $message->to($user->email, 'Customer')
          ->bcc('theodorusyoga@outlook.com')
          ->subject('Notifikasi Penerimaan Sumbangan - Tuan Di Bangarna Bank');
        }

    });
  }

  public function generateDateRange(Carbon $start_date, Carbon $end_date)
  {
    $dates = [];
    for($date = $start_date; $date->lte($end_date); $date->addDay()) {
        //$dates[] = $date->format('Y-m-d'); //if you want to display all
        $dates[] = $date->format('d-m-Y');
    }

    return $dates;
  }

  public function generateMonthRange(Carbon $start_date, Carbon $end_date)
  {
    $dates = [];
    for($date = $start_date; $date->lte($end_date); $date->addMonth()) {
        //$dates[] = $date->format('Y-m-d'); //if you want to display all
        $dates[] = $date->format('m-Y');
    }

    return $dates;
  }
  public function renderChart($labels, $title_debit, $title_credit, $data_debit, $data_credit){
    return app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 200])
        ->labels($labels)
        ->datasets([
            [
                "label" => $title_debit,
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $data_debit,
            ],
            [
               "label" =>  $title_credit,
               'backgroundColor' => "rgba(255, 99, 132, 0.2)",
               'borderColor' => "rgba(255, 99, 132, 0.7)",
               "pointBorderColor" => "rgba(255, 99, 132, 0.7)",
               "pointBackgroundColor" => "rgba(255, 99, 132, 0.7)",
               "pointHoverBackgroundColor" => "#fff",
               "pointHoverBorderColor" => "rgba(255, 99, 132, 1)",
               'data' => $data_credit,
           ]
        ])
        ->options([]);
  }
}

 ?>

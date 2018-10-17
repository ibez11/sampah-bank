<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Religion;
use Mail;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Hash;
use App\Http\Controllers\Tool\ImageGetTool;

class RegisterController extends Controller
{
    public function index($customer_type = '') {
      $religions = Religion::all();
      $message = '';
      $feature = 0;

      if ($customer_type != 1 and $customer_type != 2) {
        return redirect('customer-type');
      }

      if ($customer_type == 1) {
        $customer_type_name = 'Perorangan';
      }

      if ($customer_type == 2) {
        $customer_type_name = 'Instansi';
        $feature = 1;
      }


      /*
      if ($customer_type != 1 and $customer_type != 2) {
        $message = 'Silahkan pilih tipe customer terlebih dahulu.';

        return view('500', [ 'message' => $message]);
      }
      */

      return view('pages.register')->with(compact('religions'))
                                    ->with(compact('customer_type_name'))
                                    ->with(compact('customer_type'))
                                    ->with(compact('feature'));
    }

    public function chooseType() {
      $tool_image = new ImageGetTool();
      $output['logo']   = $tool_image->resize('img/tdb.png', 50, 50); 
      return view('pages.choosetype')->with($output);
    }

    public function register(Request $request) {
      if(filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
        $user = User::where('email', $request['email'])->first();
        if ($user) {
          return redirect()->back()->withErrors(array(
            'email' => 'Email already used by someone else'
          ));
        }
      }

      /* customer part */
      $corporate_name = '';
      $identity_no = $request['identity_id'];
      $fullname = $request['fullname'];
      $birthplace = $request['birthplace'];
      $birthdate = $request['birthdate'];
      $address = $request['address'];
      $city = $request['city'];
      $customer_type = $request['customer_type'];
      $corporate_name = $request['corporate_name'];
      $religion_id = $request['religion'];
      $sex = $request['sex'];
      $phone_number = $request['phone_number'];

      /* put in the database */
      $customer = new Customer();
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
      $customer->save();

      $customer = Customer::all()->sortByDesc('id')->first();
      $customer_id = $customer->id;

      /* user part */

      $email = $request['email'];
      $password = $request['password'];

      $user = new User();
      $user->email = $email;
      $password_buffer = $password;
      $user->password = Hash::make($password);
      $user->customer_id = $customer_id;

      $user->save();

      //send confirmation
      $user->password = $password_buffer;
      $this->sendEmail($user, $customer);
      return view('auth.login');
    }

    public function testEmail(Request $request){
      JWTAuth::setToken($request->session()->get('token'));
      $token = JWTAuth::getToken();
      $user = JWTAuth::toUser($token);
      $this->sendEmail($user);
      return 'test email sent';
    }

    private function sendEmail($user, $customer){
      Mail::send('emails.registration', ['user' => $user, 'customer' => $customer], function ($message) use ($user, $customer) {
          $message->from('no-reply@tdbangarna.com', 'Tuan Di Bangarna Bank');
          if($customer != null){
            $message->to($user->email, $customer->fullname)
            ->bcc('theo@tampilin.com')
            ->subject('Detail Akun Nasabah Tuan Di Bangarna Bank');
          }
          else{
            $message->to($user->email, 'Customer')
            ->bcc('theo@tampilin.com')
            ->subject('Detail Akun Nasabah Tuan Di Bangarna Bank');
          }

      });
    }
}

<?php

namespace App\Http\Controllers;
use App\Settings;
use App\Product;
use App\City;
use App\Employee;
use App\Http\Controllers\Customers\Helper;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public $helper;
    public function __construct(){
        $this->helper = new Helper();
    }

    public function getSettings(Request $req){
      $city_id = $req->query('cityid');
      $product_id = $req->query('productid');
      
      $setting = Settings::where('city_id', $city_id)->where('product_id', $product_id);
      $result;
      if($setting->count() > 0){
        $result = $setting->first();
      }
      else{
        $result = array(
          'amount_unit' => 0,
          'amount_profit' => 0
        );
      }

      return json_encode($result);
    }

    public function showCityList() {
        $user = $this->helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        $output['cities'] = City::all();
    
        return view('employee.dashboard-city-list')->with($output);
      }
    public function editCityList($id) {
        $user = $this->helper->getUser();
    
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        /* get settings data of current id */
        $city = City::where('id', $id)->first();
        $products = Product::all();
    
        $output['id'] = $city->id;
        $output['minimum_balance'] = $city->minimum_balance;
        $output['city'] = $city->city;
    
        foreach($products as $product){
          $setting = Settings::where('product_id', $product->id)->where('city_id', $id)->get();
          if($setting->count() > 0 ){
            $product->amount_unit = $setting->first()->amount_unit;
            $product->amount_profit = $setting->first()->amount_profit;
          }
        }
    
        $output['products'] = $products;
    
        return view('employee.dashboard-city-list-edit')->with($output);
      }

      public function addCityList() {
        $user = $this->helper->getUser();
    
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        $products = Product::all();
    
        $output['products'] = $products;
    
        return view('employee.dashboard-city-list-edit')->with($output);
      }

      public function createSettings(Request $request){
        $user = $this->helper->getUser();

        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        //deformat money
        $request['min-balance'] = str_replace('.', '', $request['min-balance']);
        $request['min-balance'] = str_replace(',', '.', $request['min-balance']);

        $city = new City();
        $city->city = $request['city'];
        $city->minimum_balance = $request['min-balance'];
        $city->save();

        $products = Product::all();

        foreach($products as $product){
          $product_id = $product->id;
    
          //deformat money
          $request['unit-' . $product_id] = str_replace('.00', '', $request['unit-' . $product_id]);
          $request['profit-' . $product_id] = str_replace('.00', '', $request['profit-' . $product_id]);

          $setting = new Settings();
          $setting->city_id = $city->id;
          $setting->product_id = $product_id;
          $setting->amount_unit = $request['unit-' . $product_id];
          $setting->amount_profit = $request['profit-' . $product_id];
          $setting->save();
        }

         /* get value to pass for view */
         $output['cities'] = City::all();
    
         //return view
     
         return view('employee.dashboard-city-list')->with($output)
           ->withErrors(array(
             'success' => 'Pengaturan kota dan harga berhasil ditambahkan'
           ));

      }
    
      public function updateSettings($id, Request $request) { 
        $user = $this->helper->getUser();
    
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        //deformat money
        $request['min-balance'] = str_replace('.', '', $request['min-balance']);
        $request['min-balance'] = str_replace(',', '.', $request['min-balance']);
    
        $city = City::find($id);
        $city->city = $request['city'];
        $city->minimum_balance = $request['min-balance'];
        $city->save();
    
        $products = Product::all();
    
        foreach($products as $product){
          $product_id = $product->id;
    
          //deformat money
          $request['unit-' . $product_id] = str_replace('.00', '', $request['unit-' . $product_id]);
          $request['profit-' . $product_id] = str_replace('.00', '', $request['profit-' . $product_id]);
    
          //search for current settings
          $setting = Settings::where('city_id', $id)->where('product_id', $product_id);
          if($setting->count() > 0){
            $setting = $setting->first();
            $setting->amount_unit = $request['unit-' . $product_id];
            $setting->amount_profit = $request['profit-' . $product_id];
            $setting->save();
          }
          else{
            $setting = new Settings();
            $setting->city_id = $id;
            $setting->product_id = $product_id;
            $setting->amount_unit = $request['unit-' . $product_id];
            $setting->amount_profit = $request['profit-' . $product_id];
            $setting->save();
          }
        }
    
        /* get value to pass for view */
        $output['cities'] = City::all();
    
        //return view
    
        return view('employee.dashboard-city-list')->with($output)
          ->withErrors(array(
            'success' => 'Pengaturan kota dan harga berhasil disimpan'
          ));
      }
    
      public function deleteSettings($id) {
        $user = $this->helper->getUser();
    
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        //delete all settings for the city

        $settings = Settings::where('city_id', $id);
        if($settings->count() > 0){
          $settings->delete();
        }

        //delete the city
        City::find($id)->delete();

        $output['cities'] = City::all();
    
        return view('employee.dashboard-city-list')->with($output)
          ->withErrors(array(
            'success' => 'Kota & harga berhasil dihapus'
          ));
      }
    
}

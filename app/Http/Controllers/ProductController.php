<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Product;
use App\City;
use App\Settings;
use App\Http\Controllers\Customers\Helper;

class ProductController extends Controller
{
    public $helper;
    public function __construct(){
        $this->helper = new Helper();
    }

    public function showProducts(){
        $user = $this->helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        $products = Product::all();
        
        if($output['divisi'] == 1)
          $output['type'] = 'owner';
        else{
          $output['type']= 'cashier';
          $city_id = Employee::where('id', $user->employee_id)->first()->city_id;
          $output['city'] = City::where('id', $city_id)->first()->city;
    
          $products = Product::all();
          foreach($products as $product){
            $setting = Settings::where('product_id', $product->id)->where('city_id', $city_id)->first();
            if($setting != null){
              $product->amount_unit = $setting->amount_unit;
              $product->amount_profit = $setting->amount_profit;
            }
          }
        }
       
        $output['products'] = $products;
    
        return view('employee.dashboard-product-list')->with($output);
      }
    
      public function editProduct($id){
        $user = $this->helper->getUser();
    
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        $product = Product::find($id);
        $output['product'] = $product;
    
        return view('employee.dashboard-product-list-edit')->with($output);
      }
    
    
      public function addProduct(){
        $user = $this->helper->getUser();
    
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        return view('employee.dashboard-product-list-edit')->with($output);
      }
    
      public function createProduct(Request $req){
        $user = $this->helper->getUser();
    
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        $product = new Product;
        $product->jenis_barang = $req['jenis-barang'];  
        $product->save();
    
        $products = Product::all();
    
        if($output['divisi'] == 1)
          $output['type'] = 'owner';
        else{
          $output['type']= 'cashier';
          $city_id = Employee::where('id', $user->employee_id)->first()->city_id;
          $output['city'] = City::where('id', $city_id)->first()->city;
    
          $products = Product::all();
          foreach($products as $product){
            $setting = Settings::where('product_id', $product->id)->where('city_id', $city_id)->first();
            $product->amount_unit = $setting->amount_unit;
            $product->amount_profit = $setting->amount_profit;
          }
        }  
        $output['products'] = $products;
    
        return view('employee.dashboard-product-list')->with($output)
        ->withErrors(array(
          'success' => 'Jenis sampah berhasil disimpan'
        ));
      }
    
      public function updateProduct($id, Request $req){
        $user = $this->helper->getUser();
    
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
        $product = Product::find($id);
        $product->jenis_barang = $req['jenis-barang'];  
    
        $product->save();
    
        $products = Product::all();
    
        if($output['divisi'] == 1)
          $output['type'] = 'owner';
        else{
          $output['type']= 'cashier';
          $city_id = Employee::where('id', $user->employee_id)->first()->city_id;
          $output['city'] = City::where('id', $city_id)->first()->city;
    
          $products = Product::all();
          foreach($products as $product){
            $setting = Settings::where('product_id', $product->id)->where('city_id', $city_id)->first();
            if($setting != null){
              $product->amount_unit = $setting->amount_unit;
              $product->amount_profit = $setting->amount_profit;
            }
          }
        }  
        $output['products'] = $products;
    
        return view('employee.dashboard-product-list')->with($output)
        ->withErrors(array(
          'success' => 'Jenis sampah berhasil disimpan'
        ));
      }
    
      public function deleteProduct($id){
        $user = $this->helper->getUser();
    
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
    
         //delete related settings
         Settings::where('product_id', $id)->delete();
    
         $product = Product::find($id);
         $product->delete();
     
         $products = Product::all();
        
        if($output['divisi'] == 1)
          $output['type'] = 'owner';
        else{
          $output['type']= 'cashier';
          $city_id = Employee::where('id', $user->employee_id)->first()->city_id;
          $output['city'] = City::where('id', $city_id)->first()->city;
    
          $products = Product::all();
          foreach($products as $product){
            $setting = Settings::where('product_id', $product->id)->where('city_id', $city_id)->first();
            if($setting != null){
              $product->amount_unit = $setting->amount_unit;
              $product->amount_profit = $setting->amount_profit;
            }
          }
        }  
        $output['products'] = $products;
    
        return view('employee.dashboard-product-list')->with($output)
        ->withErrors(array(
          'success' => 'Jenis sampah berhasil dihapus'
        ));
      }
}

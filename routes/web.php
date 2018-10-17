<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('landing', [ 'balance' => -100  ]);
})->middleware('checkbalance');
Route::get('/500/{errorId}', 'ErrorController@displayError');
*/

//test routing
Route::get('/hello/{name}', function($names){
    return 'hello! ' . $names; 
});

/* landing and dashboard route */
Route::get('/', 'LandingController@index')->name('home');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/contact', 'ContactController@index')->name('about');

Route::get('/dashboard', 'CustomerController@index')->name('dashboard');

/* register route */
Route::get('/customer-type', ['uses' => 'RegisterController@chooseType', 'as' => 'customer-type']);
Route::get('/register/{customer_type?}', 'RegisterController@index');
Route::post('register-user', [
  'uses' => 'RegisterController@register',
  'as'  => 'register-user'
]);

/* login route */
Route::post('/try_login', ['uses' => 'LoginController@try_login', 'as' => 'try_login']);
Route::get('/login',  ['uses' => 'LoginController@index', 'as' => 'login']);
Route::get('/500/{errorId}', 'ErrorController@displayError');
Route::get('/logout', 'LoginController@logout');

//Route::get('/dashboard-customer', 'CustomerController@index');
Route::get('/dashboard-customer', 'CustomerController@index')->name('dashboard-customer');
Route::get('/dashboard-profile', 'CustomerController@showProfile')->name('dashboard-profile');
Route::get('/dashboard-mutation', 'CustomerController@accountMutation')->name('dashboard-mutation');
Route::post('/dashboard-mutation-search', 'CustomerController@searchByDate')->name('dashboard-mutation-search');
Route::get('/dashboard-profile-settings', 'CustomerController@showProfileSettings')->name('dashboard-profile-settings');
Route::post('/dashboard-profile-settings', 'CustomerController@updateProfile')->name('dashboard-profile-settings');
Route::post('/generate-report', 'ReportController@generateReport');

/* Employee Routes */
Route::get('/admin', 'LoginController@employee_login')->name('login_employee');
Route::post('/employee-log', 'LoginController@login_employee')->name('employee-log');
Route::get('/customer_list', 'CustomerEditController@customerList')->name('customer_list');
Route::get('/customer_edit/{id}', 'CustomerEditController@customerEdit')->name('customer_edit');
Route::post('/customer-update/{id}', 'CustomerEditController@customerUpdate')->name('customer_update');
Route::get('/customer_edit_getsubinstitutions/{id}', 'CustomerEditController@getSubinstitutionByInstitutionId')->name('customer_edit_getsubinstitutions');
Route::get('/employee-report', 'ReportController@report')->name('employee-report');
Route::post('/generate-employee-report', 'ReportController@generateReport');
/* settings part */
Route::get('/settings', 'EmployeeController@settings')->name('settings');
Route::get('/product-list', 'ProductController@showProducts')->name('product-list');
Route::get('/add-product', 'ProductController@addProduct')->name('add-product');
Route::post('/create-product', 'ProductController@createProduct')->name('create-product');
Route::get('/edit-product/{id}', 'ProductController@editProduct')->name('edit-product');
Route::post('/update-product/{id}', 'ProductController@updateProduct')->name('update-product');
Route::get('/delete-product/{id}', 'ProductController@deleteProduct')->name('delete-product');
Route::post('/save-settings', 'EmployeeController@saveSettings');
Route::post('/save-settings2', 'EmployeeController@saveSettings2');
Route::post('/update-settings/{id}', 'EmployeeController@updateSettings')->name('update-settings');
Route::get('/delete-settings/{id}', 'EmployeeController@deleteSettings')->name('delete-settings');
Route::get('/operating-costs', 'OperatingCostController@showOperatingCosts');
Route::get('/operating-costs-add', 'OperatingCostController@addOperatingCosts');
Route::get('/operating-costs-delete/{id}', 'OperatingCostController@deleteOperatingCosts')->name('operating-costs-delete');
Route::get('/inout-report', 'ReportController@inoutReport')->name('inout-report');
Route::post('/operating-costs-add', 'OperatingCostController@saveOperatingCosts');
Route::get('/city-list', 'SettingController@showCityList')->name('city-list');
Route::get('/city-list-edit/{id}', 'SettingController@editCityList')->name('city-list-edit');
Route::get('/city-list-add', 'SettingController@addCityList')->name('city-list-add');
Route::post('/create-settings', 'SettingController@createSettings')->name('create-settings');
Route::get('/edit-settings/{id}', 'SettingController@editSettings')->name('edit-settings');
Route::post('/edit-settings/{id}', 'SettingController@updateSettings')->name('update-settings');
Route::get('/delete-settings/{id}', 'SettingController@deleteSettings')->name('delete-settings');
Route::resource('/institution', 'InstitutionController');
Route::resource('/donation', 'DonationController');
Route::resource('/dashboard-employee', 'EmployeeController');
Route::resource('/gallery', 'GalleryController');
Route::post('/gallery/post', 'GalleryController@post_upload');
Route::resource('/employee', 'CRUDEmployeeController');

Route::middleware('checktokenfromapi')->resource('/subinstitution', 'SubinstitutionController');
// TESTING SECTION

// Email test
Route::get('/test-register-email', 'RegisterController@testEmail');
Route::get('/register-email', function(){
  $data = array('user' => array(
    'email' => 'Username',
    'password' => 'Password'
  ), 'customer' => array(
    'fullname' => 'Fullname'
  ));
  return view('emails.registration')->with($data);
});
Route::get('/deposit-email', function(){
  $data = array( 'amount_kg' => 5,
    'amount_unit' => 1000,
    'amount_money' => 5000,
    'balance' => 125000,
    'user' => array(
    'email' => 'Username',
    'password' => 'Password'
  ), 'customer' => array(
    'fullname' => 'Fullname'
  ));
  return view('emails.deposit')->with($data);
});

Auth::routes();

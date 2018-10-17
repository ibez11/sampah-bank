<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Transactions\Helper;
use App\Http\Controllers\Customers\Helper as CustHelper;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManagerStatic as Image;

class GalleryController extends Controller
{
    public $helper;
    public $cust_helper;
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
        $output['galleries'] = Gallery::orderBy('galleries.updated_at', 'DESC')->paginate(6);

        return view('employee.dashboard-gallery')->with($output);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->session()->put('upload', '');

        $user = $this->cust_helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

        return view('employee.dashboard-gallery-edit')->with($output);
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

        $title = $request['title'];
        $desc = $request['description'];
        $employeeid = $user->employee_id;
        $upload =  $request->session()->get('upload');;

        if($upload == ''){
            return redirect()->back()->withErrors(array(
                'error' => 'Belum ada foto'
            ))->withInput();
        }

        $gallery = new Gallery();
        $gallery->title = $title;
        $gallery->description = $desc;
        $gallery->path = $upload;
        $gallery->uploaded_employee_id = $employeeid;
        $gallery->save();

        $output['galleries'] = Gallery::orderBy('galleries.updated_at', 'DESC')->paginate(6);

        return view('employee.dashboard-gallery')->with($output)->withErrors(array(
            'success' => 'Foto berhasil ditambah'
        ));
    }

    public function post_upload(Request $request){
        $input = Input::all();
      
        $rules = array(
		    'file' => 'image',
        );
        
        $validation = Validator::make($input, $rules);

        if ($validation->fails())
		{
			return Response::make($validation->errors->first(), 400);
        }
        
        $file = $request->file('file');

        $extension = $file->getClientOriginalExtension();

        $directory = public_path().'uploads/'.sha1(time());
        $filename = sha1(time().time()).".{$extension}";

         $upload_success = Storage::disk('public')->putFileAs(
             'uploads', $file, $filename
         );

         //resize
         $img = Image::make(public_path() . '/uploads/' . $filename);
         $img->resize(1280,720);
         $img->save(public_path() . '/uploads/' . $filename);

         //set upload path
         $request->session()->put('upload', '/public/uploads/' . $filename);

        if( $upload_success ) {
        	return Response::json('success', 200);
        } else {
        	return Response::json('error', 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //reset upload path
        $request->session()->put('upload', '');

        $user = $this->cust_helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;
        
        $output['photo'] = Gallery::where('galleries.id', $id)
            ->join('employees', 'employees.id', '=', 'galleries.uploaded_employee_id')
            ->join('users', 'users.employee_id', '=', 'employees.id')
            ->select('galleries.*', 'employees.fullname', 'users.email')
            ->orderBy('galleries.updated_at', 'DESC')
            ->first();

        return view('employee.dashboard-gallery-edit')->with($output);
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
        $user = $this->cust_helper->getUser();
        $output['email'] = $user->email;
        $output['fullname'] = Employee::where('id', $user->employee_id)->first()->fullname;
        $output['employeeAvatar'] = Employee::where('id', $user->employee_id)->first()->employeeAvatar;
        $output['divisi'] = Employee::where('id', $user->employee_id)->first()->division_id;

        $title = $request['title'];
        $desc = $request['description'];
        $employeeid = $user->employee_id;
        $upload =  $request->session()->get('upload');;

        $gallery = Gallery::where('id', $id)->first();
        $gallery->title = $title;
        $gallery->description = $desc;

        if($upload != '')
            $gallery->path = $upload;

        $gallery->uploaded_employee_id = $employeeid;
        $gallery->save();

        $output['photo'] = Gallery::where('galleries.id', $id)
        ->join('employees', 'employees.id', '=', 'galleries.uploaded_employee_id')
        ->join('users', 'users.employee_id', '=', 'employees.id')
        ->select('galleries.*', 'employees.fullname', 'users.email')
        ->orderBy('galleries.updated_at', 'DESC')
        ->first();

        return view('employee.dashboard-gallery-edit')->with($output)->withErrors(array(
            'success' => 'Foto berhasil diubah'
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
        $output['galleries'] = Gallery::paginate(6);

        Gallery::where('id', $id)->delete();

        return redirect('gallery')->withErrors(array(
            'success' => 'Foto berhasil dihapus'
        ));
    }
}

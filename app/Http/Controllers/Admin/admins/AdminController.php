<?php

namespace App\Http\Controllers\Admin\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Carbon\Carbon;
use App\Http\Helpers\Datatable;

use App\Models\Admin;
use App\Models\Role;
use Toastr;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
    {

        $admin=Admin::select('admins.id','admins.name','admins.last_login_at',
                'admins.last_login_ip','roles.guard_name','admins.status','admins.website')
            ->join('roles', 'roles.id', '=', 'admins.role_id')
            ->where('admins.role_id', '!=', 1)
            ->where('admins.website', '!=', null)
            ->get();
        $page="Admins";
        return view('admin.admins.list',compact('admin','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('admin.admins.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = Hash::make($request->password);

        $this->validate($request, [
            'name' => 'required|max:255|regex:/^[a-z ,.\'-]+$/i',
            'password' => 'required|confirmed',
            'email' => 'required|email|unique:admins,email',
        ]);
        
        Admin::create([

             'name'=>$request->name,
             'role_id'=>$request->role,
             'email'=>$request->email,
             'password'=>$password,
             'last_login'=>Carbon::now(),
             'ip'=>$_SERVER['REMOTE_ADDR'],


         ]);

         Toastr::success('Created Successfully');
        return redirect('admin/admin-users');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
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
        $admin = Admin::find($id);
//        dd($admin);
        $role = Role::all();
        return view('admin.admins.edit', compact('admin','role'));
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
        $admin = Admin::find($id);
        $input = request()->validate([

            'name' => 'required|max:255|regex:/^[a-z ,.\'-]+$/i',
            'password' => 'confirmed',
        ]);
        
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $admin->update($input);
        return redirect()->route('admin.admin-users.index')->with('success','Admin details updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('id', $id)->delete();
        return redirect()->route('admin.admin-users.index')->with('success','Admin user deleted Successfully.');
    }
    
    public function data(Request $request)
    {
//        return (new Datatable(Admin::class, $request))
//            ->select(array('id','name'))
//            ->generalSearchOn(array('name'))
//            ->setSortFieldMap(array('id' => 'id'))
//            ->getData();
        
        return (new Datatable(Admin::class, $request))
            ->select(array('admins.id','admins.name','admins.last_login_at',
                'admins.last_login_ip','roles.guard_name','admins.status'))
            ->join('roles', 'roles.id', '=', 'admins.role_id')
            ->where('admins.role_id', '!=', 1)    
            ->generalSearchOn(array('admins.name'))
            ->setSortFieldMap(array('id' => 'admins.id'))
            ->getData();
    }
}

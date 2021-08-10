<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Toastr;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $profile = Admin::find($id);
        $input = request()->validate([
            'name' => 'required|max:255|regex:/^[a-z ,.\'-]+$/i',
//            'email' => 'required|email|unique:admins,email',
            'password' => 'confirmed',
        ]);
        if (Hash::check($request['current_password'], Auth::guard('admin')->user()->password)) {
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $profile->update($input);
            $notification = array(
                'message' => 'Profile Updated successfully!',
                'alert-type' => 'success'
            );
            Toastr::success('Profile updated Successfully', 'Updated');
            return redirect()->route('profile.index');
        } else {
            Toastr::error('You Entered Wrong Password!!');
        }
        
        return redirect()->route('profile.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}

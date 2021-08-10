<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request as Requests;
use App\Http\Controllers\Controller;
use App\Models\UserLog;
use DB;
use App\Http\Helpers\Datatable;
use Auth;
use Request;


class UserLogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return type
     */
    public function index()
    {
        return view('admin.user-log.index');
    }

    public function ktData(Requests $request)
    {
        return (new Datatable( UserLog::class, $request))
            ->select(array('id',DB::raw('CONCAT(first_name , " ", last_name) AS full_name'),
                            'email', 'product_id', 'postal_code', 'last_seen', 'ip_address'))
            ->generalSearchOn(array('first_name', 'last_name'))
            ->setSortFieldMap(array('id' => 'id'))
            ->getData();
    
    }
    
    /**
     * Remove the specified resource from storage.
     * @param type $id
     */
    public function delete($id)
    {
        UserLog::where('id', $id)->delete();
        return redirect()->route('user-log');
    }

    public function adminlogin(Requests $request){

        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);
        $url =Request::getHost();
        $host = str_replace('www.','',$url);
        
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password ,'website' => $host])) {
            
            return redirect('admin/home');
        }else{


            return redirect('admin')->with('error',' Invalid Username/Password');
        }


    }
}

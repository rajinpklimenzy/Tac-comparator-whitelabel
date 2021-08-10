<?php

namespace App\Http\Controllers\Admin;

use App\Models\Whitelabel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artisan;
use DB;
use Image;

class WhitelabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page="Whitelabel app";
        
        $whitelabel=Whitelabel::orderBy('id', 'DESC')->get();

        return view('admin.whitelabel.index',compact('page','whitelabel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $name=$request->name;
        $subdomain=$request->domain_name;
        $email=$request->email;
        $password=$request->password;
        $conf_password=$request->conf_password;
       // $logo=$request->logo;

        $image       = $request->file('logo');
        $filename    = time().'.'.$image->extension();

       

        //Fullsize
        $image->move(public_path().'/full/',$filename);

        $image_resize = Image::make(public_path().'/full/'.$filename);
        $image_resize->fit(600, 300);
        $image_resize->save(public_path('uploads/logos/' .$filename));


        

        Artisan::call("tenant:create", ['name' => $name, 'subdomain' => $subdomain ,'email' => $email ,'password' => $password , 'logo' => $filename ]);

        return back()->withErrors(['Whitelabel app created successfully']);

    }


    public function delete($id,$webid)
    {
        

        Whitelabel::where('id',$id)->delete();
        DB::table('websites')->where('id',$webid)->delete();
        
        return back()->withErrors(['Whitelabel app deleted successfully']);

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
     * @param  \App\Models\Whitelabel  $whitelabel
     * @return \Illuminate\Http\Response
     */
    public function show(Whitelabel $whitelabel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Whitelabel  $whitelabel
     * @return \Illuminate\Http\Response
     */
    public function edit(Whitelabel $whitelabel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Whitelabel  $whitelabel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Whitelabel $whitelabel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Whitelabel  $whitelabel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Whitelabel $whitelabel)
    {
        //
    }
}

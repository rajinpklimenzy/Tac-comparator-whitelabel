<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Footer;
use App\Http\Helpers\Datatable;
use Toastr;
use Request as Requests;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);
        $footer=Footer::select('id','eng','nl','fr', 'link_nl', 'link_fr') 
            ->where('website',$domain) 
            ->get();
        $page=" Manage Footer";
        return view('admin.footer.index',compact('footer','page'));
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
        $footer = Footer::find($id);
        return view('admin.footer.edit', compact('footer'));
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
        Footer::where('id', $id)
                ->update([
                    'eng' => $request->eng,
                    'nl' => $request->nl,
                    'fr' => $request->fr,
                    'link_nl' => $request->link_nl,
                    'link_fr' => $request->link_fr,
                    'link_status'   => $request->has('link_status')? 1 : 0,
                ]);
        Toastr::success('Footer content updated Successfully', 'Updated'); 
        return redirect()->route('footer.index')->with('success','Footer content updated Successfully');
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

    public function data(Request $request)
    {
        return (new Datatable(Footer::class, $request))
            ->select(array('id','eng','nl','fr', 'link_nl', 'link_fr'))   
            ->generalSearchOn(array('eng'))
            ->setSortFieldMap(array('id' => 'id'))
            ->getData();
    }
}

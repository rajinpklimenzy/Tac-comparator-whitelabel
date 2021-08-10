<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Datatable;
use App\Models\Tooltip;
use Toastr;

class TooltipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tooltip=Tooltip::select('id','slug','field_name','NL_tooltip','FR_tooltip')  
            ->get();
        $page="Tool tips";
        return view('admin.tooltip.index',compact('tooltip','page'));
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
        $tooltip = Tooltip::find($id);
        return view('admin.tooltip.edit', compact('tooltip'));
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
        Tooltip::where('id', $id)
                ->update([
                    'NL_tooltip' => $request->NL_tooltip,
                    'FR_tooltip' => $request->FR_tooltip,
                ]);
        Toastr::success('Tooltip content updated Successfully', 'Updated'); 
        return redirect()->route('tooltip.index')->with('success','Tooltip content updated Successfully');
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
        return (new Datatable(Tooltip::class, $request))
            ->select(array('id','slug','field_name','NL_tooltip','FR_tooltip'))   
            ->generalSearchOn(array('slug'))
            ->setSortFieldMap(array('id' => 'id'))
            ->getData();
    }
}

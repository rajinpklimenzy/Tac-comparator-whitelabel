<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContractDetail;
use App\Models\Feature;
use App\Models\ServiceLimitation;
use App\Http\Helpers\Datatable;
use Toastr;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $features=Feature::select('features.id','contract_details.part','contract_details.field', 'features.condition', 'features.NL_description', 'features.FR_description')
            ->join('contract_details', 'contract_details.id', '=', 'features.contract_id')  
            ->get();


            $servicelimitation=ServiceLimitation::select('id','SL_payment','SL_invoice','SL_contact','NL_description','FR_description')
                ->get();



        return view('admin.features.index',compact('features','servicelimitation'));
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
        ServiceLimitation::where('id', $request->id)
                ->update([
                    'NL_description' => $request->NL_description,
                    'FR_description' => $request->FR_description,
                ]);
        Toastr::success('Service limitations updated Successfully', 'Updated'); 
        return redirect()->route('feature.index')->with('success','Service limitations updated Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = ServiceLimitation::find($id);
        $page="Edit Service Limitations";
        return view('admin.features.editservice', compact('service','page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $feature = Feature::select('features.id','contract_details.part','contract_details.field', 'features.condition', 'features.NL_description', 'features.FR_description')
                            ->join('contract_details', 'contract_details.id', '=', 'features.contract_id')
                            ->where('features.id', $id)
                            ->first();
        $page="Edit Contract details";
        return view('admin.features.edit', compact('feature','page'));
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
        Feature::where('id', $id)
                ->update([
                    'NL_description' => $request->NL_description,
                    'FR_description' => $request->FR_description,
                ]);
        Toastr::success('Contract details updated Successfully', 'Updated'); 
        return redirect()->route('feature.index')->with('success','Contract details updated Successfully.');
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
        return (new Datatable(Feature::class, $request))
            ->select(array('features.id','contract_details.part','contract_details.field', 'features.condition', 'features.NL_description', 'features.FR_description'))
            ->join('contract_details', 'contract_details.id', '=', 'features.contract_id')    
            ->generalSearchOn(array('contract_details.part'))
            ->setSortFieldMap(array('id' => 'features.id'))
            ->getData();
    }
    
    public function serviceData(Request $request)
    {
        return (new Datatable(ServiceLimitation::class, $request))
                ->select(array('id','SL_payment','SL_invoice','SL_contact','NL_description','FR_description'))
                ->generalSearchOn(array('SL_payment','SL_invoice','SL_contact'))
                ->setSortFieldMap(array('id' => 'id'))
                ->getData();
    }
}

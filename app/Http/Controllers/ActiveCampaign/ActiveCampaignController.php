<?php

namespace App\Http\Controllers\ActiveCampaign;

use App\Models\ActiveCampaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiveCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact_update(Request $request)
    {
        $data=$request->all();

      

      

        $contact=$data['contact'];

      



            ActiveCampaign::create([

            'ac_id'=>$contact['id'],
            'first_name'=>$contact['first_name'],
            'last_name'=>$contact['last_name'],
            'phone'=>$contact['phone'],
            'email'=>$contact['email'],
            'tags'=>$contact['tags'],
            'initiated_from'=>$data['initiated_from'],
            'customer_acct_name'=>$contact['customer_acct_name'],
            'orgname'=>$contact['orgname'],

        ]);

 

        
      
        logger($data);
    }

       public function contact_delete(Request $request)
    {
        $data=$request->all();

        $contact=$data['contact'];

        ActiveCampaign::where('ac_id',$contact['id'])->delete();

        logger($data);


    }


    public function subscriptions(){


        dd('hii');


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
     * @param  \App\Models\ActiveCampaign  $activeCampaign
     * @return \Illuminate\Http\Response
     */
    public function show(ActiveCampaign $activeCampaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActiveCampaign  $activeCampaign
     * @return \Illuminate\Http\Response
     */
    public function edit(ActiveCampaign $activeCampaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActiveCampaign  $activeCampaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActiveCampaign $activeCampaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActiveCampaign  $activeCampaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActiveCampaign $activeCampaign)
    {
        //
    }
}

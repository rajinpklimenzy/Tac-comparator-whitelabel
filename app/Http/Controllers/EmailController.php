<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DealsMail;
use Session;
use Toastr;
use Request as Requests;

class EmailController extends Controller
{
    public function index()
    {   
        //
    }
    
    public function dealsMail(Request $request)
    {
        $email=$to = $request->recipient;
        Mail::to($to)->send( new DealsMail($to));
        $cat=Session::get('customer_type');
        $postal_code=Session::get('postal_code');


       



     $parameters = Session::get('getParameters');
        // active campaig updating
        
             $activeQueries['uuid']=$uuid=$parameters['parameters']['uuid'];
            $activeQueries['customer_group']=$parameters['parameters']['values']['customer_group'];
            $activeQueries['region']=$parameters['parameters']['values']['region'];
            $activeQueries['usage_single']=$parameters['parameters']['values']['usage_single'];
            $activeQueries['usage_day']=$parameters['parameters']['values']['usage_day'];
            $activeQueries['usage_night']=$parameters['parameters']['values']['usage_night'];
            $activeQueries['usage_excl_night']=$parameters['parameters']['values']['usage_excl_night'];

           
             $activeQueries['estimate_cunsomption'] =$parameters['parameters']['values']['estimate_cunsomption'];
            $activeQueries['residence'] =$parameters['parameters']['values']['residence'];
            $activeQueries['building_type'] =$parameters['parameters']['values']['building_type'];
            $activeQueries['isolation_level'] =$parameters['parameters']['values']['isolation_level'];
            $activeQueries['heating_system'] =$parameters['parameters']['values']['heating_system'];

             $activeQueries['residents']= $parameters['parameters']['values']['residents'];
            $activeQueries['first_residence']= $parameters['parameters']['values']['first_residence'];
            $activeQueries['decentralise_production']= $parameters['parameters']['values']['decentralise_production'];
             if($parameters['parameters']['values']['capacity_decentalise']==null || $parameters['parameters']['values']['capacity_decentalise']==0){

                $capacity_decentalise=0;

            }else{
                $capacity_decentalise=$parameters['parameters']['values']['capacity_decentalise'];    
            }
            $activeQueries['capacity_decentalise']=$capacity_decentalise;
            $activeQueries['includeG']= $parameters['parameters']['values']['includeG'];
            $activeQueries['includeE']= $parameters['parameters']['values']['includeE'];


            $activeQueries['usage_gas']=$parameters['parameters']['values']['usage_gas'];
            
             $activeQueries['meter_type']=$parameters['parameters']['values']['meter_type'];
            
            $activeQueries['comparison_type']=$parameters['parameters']['values']['comparison_type'];
            $activeQueries['email']=$email;
            $activeQueries['postalcode']=$parameters['parameters']['values']['postal_code'];

            $curUrl='https://energievergelijker.tariefchecker.be/overzicht/'.$parameters['parameters']['values']['comparison_type'].'/'.$parameters['parameters']['values']['dgo_id_electricity'].'-'.$parameters['parameters']['values']['dgo_id_gas'].'-'.$parameters['parameters']['values']['postal_code'].'?u='.$uuid;
            Session::put('actual_link',$curUrl);
            $activeQueries['url']=$curUrl;
            
        
       
        
        $activeQueries['CurrentSupplierE'] = $parameters['parameters']['values']['current_supplier_name_electricity'];
        $activeQueries['CurrentSupplierG'] = $parameters['parameters']['values']['current_supplier_name_gas'];
        $domain=Requests::getHost();
        $activeQueries['from'] = $domain;
           

        try{ 


       $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('https://apistaging.wx.agency/api/change-data-sync', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZmUyOGMwNWM2NzE4MTBkYjZjYjhkMTkzOTRjMmIzZmIxNmI0NDBjYzBjMjY3YTUyNjEwZTIyMmI0MTc5NDhiZTk4YjcxMWRiNjNhMzJmY2UiLCJpYXQiOjE1Nzk3NTQ1MDUsIm5iZiI6MTU3OTc1NDUwNSwiZXhwIjoxNjExMzc2OTA1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.jFlrQGmkZoGM1mQxXENavux18TEZi6M3QswdlLXzYOcM3CvUM_Z7UgdWVa0DWLNrbzfshhcnrXD-TgI2xrgWaqn70GverBocki5a33oiYf4NAHFdwps8nZfVYmXhGXOBWBSAO5zp4vohnE3vHFXy8icO2JWNOaNl4MUCjEFYBw1LMWlkzUL_Tr_juGDjEhs6h992RFJ0hUKhOQAQAlBr_hUqPA_zRQiciLzJ3WR7jVNinX9_3842X_Fen0GOFSbpmKz0s6rF1RyeurStkEYT8d1vNKKMfq1w-FMZhdMCTN-DQdsxjl4LXMDDGEBGTeM8irAvSkRl0zOo45k9-Vh8NhS137eYZs-k1zqWKgqyo_jij0QgbuwyT41GXd0IoCe6d5VI-XDh7VQIs9ZhpHUAE2fH8-hx-pPy4OLoqJt9K2YiqdRsreTfDLfBbe0XoKLVlgShexv-6EBangjbZLK9Kh_2PNEqLXDWZlOBnlcZfbY76w9XzXLIMUuwAR8nIUWC_xzN46JYbmedspr-8342avpbmXOBV8k6f7EqSmRMfWUWajOmA1s3W9l-LsBFgOnaeenuhfquIiqMflXPonR-r8IRulg2S-82vvsrkHPL0rddjokV_PpJuBV4X1fgQ_CZ3Gp58f8lYYvSCkhZW1HLLwPbgqlCC3CQ1B-G-YLFax4'
                      ],
                      'query' => $activeQueries 
                  ]);
        

        }catch (\Exception $e) {
        
        
        $response = ['status' => false, 'message' => $e->getMessage()];
        }

      
       
        $cat='pack';
        Toastr::success('Email Sent Successfully', 'Updated');
        return redirect('overzicht/'.$cat.'/'.$postal_code);
        
        
       // return redirect()->route('basic-data');
    }
}

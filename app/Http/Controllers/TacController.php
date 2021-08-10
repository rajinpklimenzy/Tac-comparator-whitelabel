<?php

namespace App\Http\Controllers;

use App\Models\Tac;
use Illuminate\Http\Request;
use Auth;
use Session;
use GuzzleHttp\Psr7\Request as GuzzleHttp;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Hash;
use Carbon\Carbon;
use Lang;
use DB;
use DateTime;
use Response;
use Request as Requests;
use Cookie;


class TacController extends Controller
{
  

    public function test(Request $request){ 
        
        
        dd(Hash::make("fA1hNpyLWPfrrpTw"));
        //return view('test');
        exit();

         $query['locale'] = 'nl';
        $query['postalCode'] = Session::get('po');
        $query['first_residence']=true;
        $query['customerGroup'] = 'residential';
      
        $query['registerG'] = 25000;
       
        
        try {

        $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('https://apistaging.wx.agency/api/calculation', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZmUyOGMwNWM2NzE4MTBkYjZjYjhkMTkzOTRjMmIzZmIxNmI0NDBjYzBjMjY3YTUyNjEwZTIyMmI0MTc5NDhiZTk4YjcxMWRiNjNhMzJmY2UiLCJpYXQiOjE1Nzk3NTQ1MDUsIm5iZiI6MTU3OTc1NDUwNSwiZXhwIjoxNjExMzc2OTA1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.jFlrQGmkZoGM1mQxXENavux18TEZi6M3QswdlLXzYOcM3CvUM_Z7UgdWVa0DWLNrbzfshhcnrXD-TgI2xrgWaqn70GverBocki5a33oiYf4NAHFdwps8nZfVYmXhGXOBWBSAO5zp4vohnE3vHFXy8icO2JWNOaNl4MUCjEFYBw1LMWlkzUL_Tr_juGDjEhs6h992RFJ0hUKhOQAQAlBr_hUqPA_zRQiciLzJ3WR7jVNinX9_3842X_Fen0GOFSbpmKz0s6rF1RyeurStkEYT8d1vNKKMfq1w-FMZhdMCTN-DQdsxjl4LXMDDGEBGTeM8irAvSkRl0zOo45k9-Vh8NhS137eYZs-k1zqWKgqyo_jij0QgbuwyT41GXd0IoCe6d5VI-XDh7VQIs9ZhpHUAE2fH8-hx-pPy4OLoqJt9K2YiqdRsreTfDLfBbe0XoKLVlgShexv-6EBangjbZLK9Kh_2PNEqLXDWZlOBnlcZfbY76w9XzXLIMUuwAR8nIUWC_xzN46JYbmedspr-8342avpbmXOBV8k6f7EqSmRMfWUWajOmA1s3W9l-LsBFgOnaeenuhfquIiqMflXPonR-r8IRulg2S-82vvsrkHPL0rddjokV_PpJuBV4X1fgQ_CZ3Gp58f8lYYvSCkhZW1HLLwPbgqlCC3CQ1B-G-YLFax4'],
                      'query' => $query 
                  ]);

        Session::forget('msg');
        $response = $request->getBody()->getContents();       
        $json = json_decode($response, true);

          } catch (\Exception $e) {

            $response = ['status' => false, 'message' => $e->getMessage()];

        }  
         
         $products = collect($json['products']);

        dd(count($json['products']));
        
       

    $arr = array(
            'properties' => array(
                array(
                    'property' => 'email',
                    'value' => 'rpk@wx.agency'
                ),
                array(
                    'property' => 'firstname',
                    'value' => 'wx'
                ),
                array(
                    'property' => 'lastname',
                    'value' => 'developer'
                ),
                array(
                    'property' => 'phone',
                    'value' => '123456789'
                )
            )
        );

    
        $post_json = json_encode($arr);
        $hapikey = "15fe8021-3f44-4533-bdf6-8c6c3182666b";
        $endpoint = 'https://api.hubapi.com/contacts/v1/contact?hapikey=' . $hapikey;

        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
        @curl_setopt($ch, CURLOPT_URL, $endpoint);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = @curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
        @curl_close($ch);
        echo "curl Errors: " . $curl_errors;
        echo "\nStatus code: " . $status_code;
        echo "\nResponse: " . $response;
        dd($hapikey);
        
      

    }

    public function index(){
        
        $url =Requests::getHost();
        $host = str_replace('www.','',$url);
        $domain=DB::table('hostnames')->where('fqdn',$host)->first();
        session::put('locale',$domain->locale);
        
       
        $data=DB::table('landing_page')->where('website',$host)->first();
   
        $agent = new \Jenssegers\Agent\Agent;
        $result = $agent->isDesktop();
         
         return view('index',compact('data'));
        if($agent->isTablet() || $agent->isMobile() || $agent->isDesktop()){
        }
    
    }

    public function fr(){
        $url =Requests::getHost();
        $host = str_replace('www.','',$url);
        $domain=DB::table('hostnames')->where('fqdn',$host)->first();
        session::put('locale','fr');
        
        
        $data=DB::table('landing_page')->where('website',$host)->first();
    
        $agent = new \Jenssegers\Agent\Agent;
        $result = $agent->isDesktop();
         return view('index',compact('data'));
        if($agent->isTablet() || $agent->isMobile() || $agent->isDesktop()){
        }

    }

     public function nl(){
        $url =Requests::getHost();
        $host = str_replace('www.','',$url);
        $domain=DB::table('hostnames')->where('fqdn',$host)->first();
        session::put('locale','nl');
        
        
        $data=DB::table('landing_page')->where('website',$host)->first();
    
        $agent = new \Jenssegers\Agent\Agent;
        $result = $agent->isDesktop();
         return view('index',compact('data'));
        if($agent->isTablet() || $agent->isMobile() || $agent->isDesktop()){
        }

    }
  
    public function basic_data(Request $request){      
      
      $gas=$request->gas;
      $elec=$request->elec;
      $post_code=$request->po;  
      return redirect('overview/pack');
      
    }

    public function refresh_uuid(){


        unset($_COOKIE['uuid']); 
        setcookie('uuid', '', time() - 3600);

        return redirect('/');
    }



}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App;
use App\Models\Feature;
use App\Models\ServiceLimitation;
use Jenssegers\Agent\Agent;
use Storage;

class ChangedataController extends Controller
{
    public function changedata_private(Request $request){
                      


        Session::forget('customer_type');      
        Session::forget('postal_code');       
        Session::forget('usage_elec_day');      
        Session::forget('usage_elec_night');       
        Session::forget('usage_gas');
        Session::forget('sel_type');
        Session::forget('meter_type');
        $postal_code=$po=$postal=$request->postal;
        $family_size=$request->family_size;         
        $elec=$electricity=$request->electricity;         
        $group1=$request->group1;
        $meter_type1=$request->meter_type1;
        $email=$request->email;
        $digital=false;
        $meter_inj=null;
        $consuption_day_elec1_inj=0;
        $consuption_night_elec1_inj=0;
        $consuption1_inj=0;

        
        
        
        $usage_elec_day=$consuption_day_elec1=$request->consuption_day_elec1;
        $usage_elec_dayse=$consuption_day_elec1=$request->consuption_day_elec1se;
        $usage_elec_dayde=$consuption_day_elec1=$request->consuption_day_elec1de;
        
        
        $usage_elec_night=$consuption_night_elec1=$request->consuption_night_elec1;
        $usage_elec_nightse=$consuption_night_elec1se=$request->consuption_night_elec1se;
        $usage_elec_nightde=$consuption_night_elec1de=$request->consuption_night_elec1de;
        
        
        $consuption_excl_nightse=$consuption_excl_nightse=$request->consuption_excl_nightse;
        $consuption_excl_nightde=$consuption_excl_nightde=$request->consuption_excl_nightde;
        
        
        $usage_gas=$consumtion_gas1=$request->consumtion_gas1;
        
        $consuption1=$request->consuption1;
        $consuption1se=$request->consuption1se;
        $consuption1de=$request->consuption1de;
        
        $current_supp_elec_1=$request->current_supp_elec_1;
        $current_tariff_elec_1=$request->current_tariff_elec_1;
        
        $contract_date=$request->contract_date;
        $type_home=$request->type_home;
        $pre_in_home=$request->pre_in_home;
        $meter_type2=$request->meter_type2;
        $consuption_elec2=$request->consuption_elec2;
        $current_supp_elec_2=$request->current_supp_elec_2;        
        $gas=$request->gas; 
       
        
        // estimate-consumption
        
        $residence=$request->residence; 
        $building_type=$request->building_type; 
        $isolation_level=$request->isolation_level; 
        $heating_system=$request->heating_system; 
        $est=$request->group1;

        if($request->digital=='digital'){

            $digital=true;
            
        }


        if($request->meter_type1_inj){

            $meter_inj_type=$request->meter_type1_inj;
        }
        if($request->consuption_day_elec1_inj){

            $consuption_day_elec1_inj=$request->consuption_day_elec1_inj;
        }

        if($request->consuption_night_elec1_inj){

            $consuption_night_elec1_inj=$request->consuption_night_elec1_inj;
        }
        if($request->consuption1_inj){

            $consuption1_inj=$request->consuption1_inj;
        }
        
        if($request->history_date){

        $query['history_date'] = $request->history_date;

        }

        $query['digitalMeter'] =$digital;
        $query['meterTypeInj'] =$meter_inj_type;
        $query['injectionNormal'] =$consuption1_inj;
        $query['injectionDay'] =$consuption_day_elec1_inj;
        $query['injectionNight'] =$consuption_night_elec1_inj;

        if($est=="estimate_consuption"){

        $query['estimate_cunsomption'] = 'true';
        $query['residence'] = $residence;
        $query['building_type'] = $building_type;
        $query['isolation_level'] = $isolation_level;
        $query['heating_system'] = $heating_system;

        }else{

        $query['estimate_cunsomption'] = 'false';
        $query['residence'] = "";
        $query['building_type'] = "";
        $query['isolation_level'] = "";
        $query['heating_system'] = "";

        }


        $capacity=0;
        
        if($request->dec_pro==true){
            
            $query['dec_pro'] = $request->dec_pro;
            $query['capacity_decen_pro'] = $request->capacity_decen_pro;
            //$capacity=$request->capacity_decen_pro;
            $capacity=0;
        }else{
            
            $query['capacity_decen_pro'] = 0;
            
        }
        
        
        Session::put('group1',$request->group1);
        Session::put('residence',$residence);
        Session::put('building_type',$building_type);
        Session::put('isolation_level',$isolation_level);
        Session::put('heating_system',$heating_system);
        
        
        if($capacity==1){
            
            
            $e_mono=800;
            $e_day=600;
            $e_night=200;
            $e_exnight=0;
            
            
        }
        if($capacity==2){
            
            $e_mono=1600;
            $e_day=1100;
            $e_night=500;
            $e_exnight=0;
            
            
        }
        if($capacity==3){
            
            $e_mono=2400;
            $e_day=1700;
            $e_night=700;
            $e_exnight=0;
            
        }
        if($capacity==4){
            
            $e_mono=3200;
            $e_day=2300;
            $e_night=900;
            $e_exnight=0;
            
        }
        if($capacity==5){
            
            $e_mono=4000;
            $e_day=2900;
            $e_night=1100;
            $e_exnight=0;
            
        }
        if($capacity==6){
            
            $e_mono=4800;
            $e_day=3400;
            $e_night=1400;
            $e_exnight=0;
            
        }
        if($capacity==7){
            
           $e_mono=5600;
            $e_day=4000;
            $e_night=1600;
            $e_exnight=0;
            
        }
        if($capacity==8){
            
            $e_mono=6400;
            $e_day=4600;
            $e_night=1800;
            $e_exnight=0;
            
        }
        if($capacity==9){
            
            $e_mono=7200;
            $e_day=5100;
            $e_night=2100;
            $e_exnight=0;
            
        }
        if($capacity==10){
            
            $e_mono=8000;
            $e_day=5700;
            $e_night=2300;
            $e_exnight=0;
            
        }
        
        // estimate-consumption-end
        
        if($request->meter_type1=='single'){
            $consuption1=$consuption1;
            
            $usage_elec_day=null;
            $usage_elec_night=null;
            
            $usage_elec_dayde=null;
            $usage_elec_nightde=null;
            $consuption_excl_nightde=null;
            
            $consuption1se=null;
            $consuption_excl_nightse=null;
            
        }
        if($request->meter_type1=='double'){
            
            $usage_elec_day=$usage_elec_day;
            $usage_elec_night=$usage_elec_night;
            
            $consuption1=null;
           
            
            
            $usage_elec_dayde=null;
            $usage_elec_nightde=null;
            $consuption_excl_nightde=null;
            
            $consuption1se=null;
            $consuption_excl_nightse=null;
            
            
            
       
            
            
        }
        if($request->meter_type1=='single_excl_night'){
            
            $consuption1se=$consuption1se;
            $consuption_excl_nightse=$consuption_excl_nightse;
            
            $consuption1=null;
            
            
            
            $usage_elec_day=null;
            $usage_elec_night=null;
            
            $usage_elec_dayde=null;
            $usage_elec_nightde=null;
            $consuption_excl_nightde=null;
            
        }
        if($request->meter_type1=='double_excl_night'){
            
            $usage_elec_dayde=$usage_elec_dayde;
            $usage_elec_nightde=$usage_elec_nightde;
            $consuption_excl_nightde=$consuption_excl_nightde;
            
            $consuption1=null;
            
            $consuption1se=null;
            $consuption_excl_nightse=null;
            
            $usage_elec_day=null;
            $usage_elec_night=null;
            
          
            
            
        }
        
        
        
        $current_supp_gas1=$request->current_supp_gas1;
        $page='sort';         
        $locale=App::getLocale(); 
        
        $customer_type='residential';        
        
        Session::put('elec',$elec);       
        Session::put('gas',$gas);      
        Session::put('po',$po);       
        Session::put('customer_type',$customer_type);       
        Session::put('postal_code',$postal_code);        
        Session::put('usage_elec_day',$usage_elec_day);      
        Session::put('usage_elec_night',$usage_elec_night);       
        Session::put('usage_gas',$usage_gas);
        Session::put('search_email',$email);
        Session::forget('elec');
        Session::forget('gas');
        $checkZero=0;
        
        if(Session::get('locale')){
        
        $query['locale'] = Session::get('locale');
        
        }
        if($customer_type){
        
        $query['customerGroup'] = $customer_type;
        }
        if($postal){
        
        $query['postalCode'] = $postal;
        }
        if($family_size){
        
        $query['residents'] = $family_size;
        }

        if($request->meter_type1){
        
        $query['meterType'] = $request->meter_type1;
        }

          $current_tariff_elec="";
        $current_tariff_gas="";
        if($request->current_tariff_elec_1){
        
        $query['CurrentSupplierE'] = $current_tariff_elec= $request->current_tariff_elec_1;
        }

        if($request->current_tariff_gas){
        
        $query['CurrentSupplierG'] = $current_tariff_gas= $request->current_tariff_gas;
        }

        if($request->dec_pro){
        
        $query['decentralisedProduction'] = $request->dec_pro;

        }else{

        $query['decentralisedProduction'] = false;

        }

        if($request->capacity_decen_pro){
        
        $query['decentralisedProduction'] = $request->capacity_decen_pro;
        
        }

        if($request->gas==true){
        
        $query['IncludeG'] = true;
        
        }else{

            $query['IncludeG'] =false;
        }
        
        if(isset($request->electricity)){
            
            if($request->electricity==true){
                 $query['IncludeE'] = true;
            }else{
                
                $query['IncludeE'] = false;
            }
        
        
        
        }else{

            $query['IncludeE'] = false;
        }
        if($request->email){

            $query['email']=$request->email;
        }


        if($request->first_res==true){

            $query['first_residence']=true;

        }else{

           $query['first_residence']=false;

        }       
   
        if($consuption1!=null && $request->meter_type1=='single'){
            
         
        if($residence && $building_type && $heating_system && $capacity){
            
           
            $consuption1=$consuption1-$e_mono;
            if($consuption1<=0){
                
                $consuption1=0;
                
                $checkZero=1;
            }
        }
        
        $query['registerNormal'] = $consuption1;
        //$query['meterType'] = 'single';
        
        }
        
        
          
        if($usage_elec_day!=null && $usage_elec_night!=null && $request->meter_type1=='double'){
             
             $consuption_day_elec1 = $request->consuption_day_elec1;
             $consuption_night_elec1 = $request->consuption_night_elec1;
            
            if($residence && $building_type && $heating_system && $capacity){
            
           
            $consuption_day_elec1=$consuption_day_elec1-$e_day;
            $consuption_night_elec1=$consuption_night_elec1-$e_night;
            
                if($consuption_night_elec1<=0){
                
                $consuption_night_elec1=0;
                $checkZero=1;
                 }
                 
                if($consuption_day_elec1<=0){
                
                $consuption_day_elec1=0;
                $checkZero=1;
                 }
           }
        
        $query['registerDay'] = $consuption_day_elec1;
        $query['registerNight'] = $consuption_night_elec1;
       // $query['meterType'] = 'double';
        
        }
       
        
        
        if($usage_elec_dayde!=null && $usage_elec_nightde!=null && $consuption_excl_nightde!=null && $request->meter_type1=='double_excl_night'){
            
         
            if($residence && $building_type && $heating_system && $capacity){
            
            
            $usage_elec_dayde=$usage_elec_dayde-$e_day;
            $usage_elec_nightde=$usage_elec_nightde-$e_night;
            $consuption_excl_nightde=$consuption_excl_nightde-$e_exnight;
            
                    if($usage_elec_dayde<=0){
                
                        $usage_elec_dayde=0;
                        $checkZero=1;
                    }
                    if($usage_elec_nightde<=0){
                
                        $usage_elec_nightde=0;
                        $checkZero=1;
                    }
                    if($consuption_excl_nightde<=0){
                
                        $consuption_excl_nightde=0;
                        $checkZero=1;
                    }
            
                
            }
            
            
        
        $query['registerDay'] = $usage_elec_dayde;
        $query['registerNight'] = $usage_elec_nightde;
        $query['registerExclNight'] = $consuption_excl_nightde;
        //$query['meterType'] = 'double_excl_night';
      
        }
        
         
        
        if($consuption1se!=null && $consuption_excl_nightse!=null && $request->meter_type1=='single_excl_night'){
           
            
                    if($residence && $building_type && $heating_system && $capacity){
            
           
            $consuption1se=$consuption1se-$e_mono;
            $consuption_excl_nightse=$consuption_excl_nightse-$e_exnight;
            
                    if($consuption1se<=0){
                
                        $consuption1se=0;
                        $checkZero=1;
                    }
                    if($consuption_excl_nightse<=0){
                
                        $consuption_excl_nightse=0;
                        $checkZero=1;
                    }
            
            
                
            }
        
        $query['registerNormal'] = $consuption1se;
        $query['registerExclNight'] = $consuption_excl_nightse;
        //$query['meterType'] = 'single_excl_night';
        
        }
        
      
         
        if($consumtion_gas1>=0){
        
        $query['registerG'] = $consumtion_gas1;
        
        
        }
        
        
        
        if(isset($_COOKIE['uuid'])){
            $query['uuid'] = $_COOKIE['uuid'];
        }
        
        
        
        
        if(!$request->electricity && !$request->gas){
            
            
           return redirect()->back(); 
            
        }
        
         
        $query['save_uuid']=1;
        $query['url']=Session::get('actual_link');
   
         if($request->subpo){
            
            $query['sub_po']=$request->input('subpo');
            
        }
   
   if(isset($query['registerDay'])){
       $registerDay=$query['registerDay'];
   }else{
       $registerDay=0;
   }
   
   if(isset($query['registerNight'])){
       $registerNight=$query['registerNight'];
   }else{
       $registerNight=0;
   }
   
   if(isset($query['registerExclNight'])){
       $registerExclNight=$query['registerExclNight'];
   }else{
       $registerExclNight=0;
   }
   
   if(isset($query['registerNormal'])){
       $registerNormal=$query['registerNormal'];
   }else{
       $registerNormal=0;
   }
   
    if(isset($query['registerExclNight'])){
       $registerExclNight=$query['registerExclNight'];
   }else{
       $registerExclNight=0;
   }
   
    if(isset($query['registerG'])){
       $registerG=$query['registerG'];
   }else{
       $registerG=0;
   }
   
   
   if($query['IncludeE']==1){
       
       $CuntotalE=$registerDay+$registerNight+$registerExclNight+$registerNormal+$registerExclNight;
   }else{
       
       $CuntotalE=0;
   }
   
   if($query['IncludeG']==1){
       
       $CuntotalG=$registerG;
       
   }else{
       
       $CuntotalG=0;
   }
   
   
      $Cuntotal=$CuntotalE+$CuntotalG;
      
      
      if($Cuntotal==0){
          
          return back();
          
      }

        /*query-end*/
        
        try{ 

        $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('https://apistaging.wx.agency/api/calculation', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTcxY2I0YWU4M2NlOWZmZjYyNjE5NWE2NjFhZmJlMjVlNjJhOTEwZDFhNjM2YzIwYmNkZmJiN2ViMjk4M2FhZTlmNzZhYWE5YmZkYTQzMDEiLCJpYXQiOjE2MTIzNDM0ODAsIm5iZiI6MTYxMjM0MzQ4MCwiZXhwIjoxNjQzODc5NDgwLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.VgGAKbnfbxKmsfpsNtztvigJksRFxhHjgMug0v_dipxZbHJFXlSr95yThwZL8YtkDYTkDUpsngRMCvXH8Gs4EiGzHkjnvdViZy3yBZHzHMxrG9Hj1gIpMgNCViBunJfbiKeQfyIgMXiCWGzynn4Z7ib-yQyAI7OF1FtzJfo5ZpZt5-T0XALC4b0nxofQm5nLxg-I9ToOrmMYi30-tzjgFLce1TEnwbLuUJfG27OU6JC4WuftrSN18RXBOeE_RZmHm72R5CFw8TZoFylGqViHN4Qm_Z0cBRf98Vm9mc6oAUmSMgWzBiCIJB2gYQZJwQDQ4Qqorq9XSFJ3wZa5C-Xwb7yOUcZEKMpjp9ymzdaodTcnrpr9zOHq9jUXLc2R6Z8PCdzB5q8UHaqvACXFlW0JKQPbvUU2-pTvCfRJBR1d_EiBw8kW6iFmClcnWww1VZlm1dOdJ0rkFp1Ho0E-mfBgMyXcxTAnH-mnHbXs-k_6FRrnZF6WSpEYaLDn18zMXizTQpqsjKpjwGGPcOngMGDV7BUeT_AVwseij9OEJNEWFES3dvI2vmExvt_y2bZ8PdSRi7_5tMIf8zqWjZfpe8RExdWBg9365wf2TO_1knduQJiStXNYNDU356n5ea13npPVU4JtxauqxVAMgA29aHIGE4NURshJZcv5lSeZQ8st3HE'
                      ],
                      'query' => $query 
                  ]);
         
        $response = $request->getBody()->getContents();
        }catch (\Exception $e) {
          
        $response = ['status' => false, 'message' => $e->getMessage()];
        if($e->getCode()==400 || $e->getCode()==true){                
        Session::put('msg','Ongeldige Postcode');
       // return redirect('/');
        
        
        }
        }

     
       

        if($response=='false'){
            
            
           return redirect()->back(); 
            
        }


     
        Session::forget('msg');
        
        
        $json = $request->getBody()->getContents();   
        $json = json_decode($response, true);
        
        $products = collect($json['products']);
       
     
       if(Session::get('promo')=='true' || Session::get('domi')=='true' || Session::get('email')=='true'){
              
                if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')!='true'){
                
               
                
                $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
          
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                
                $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_slD'];
                });

                $sorted->values()->all();
                
                
               
                
            }
            
            if(Session::get('promo')!='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                
                $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                
                
            }
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                
                 $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_slD'];
                });

                $sorted->values()->all();
                
                
               
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                 $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
               
                
            }
           
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                 $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_slD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
            }
               
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_slD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
               
                
            }
            
            
                
         }else{
             
             
             $sorted = $products->sort(function($a, $b) {
                  if ($a['price']['totals']['year']['excl_promo'] == $b['price']['totals']['year']['excl_promo']) {
                  return 0;
                  }
                  return ($a['price']['totals']['year']['excl_promo'] < $b['price']['totals']['year']['excl_promo']) ? -1 : 1;
                });
             
         }
        $products = $sorted;
        
       
        
        Session::put('pro_data',$products);
        Session::put('getParameters',$products[0]);
        Session::put('uuid',$products[0]['parameters']['uuid']);
        Session::put('customer_group',$products[0]['parameters']['values']['customer_group']);
        Session::put('region',$products[0]['parameters']['values']['region']);
        Session::put('usage_single',$products[0]['parameters']['values']['usage_single']);
        Session::put('usage_day',$products[0]['parameters']['values']['usage_day']);
        Session::put('usage_night',$products[0]['parameters']['values']['usage_night']);
        Session::put('usage_excl_night',$products[0]['parameters']['values']['usage_excl_night']);
        Session::put('usage_gas',$products[0]['parameters']['values']['usage_gas']);
        Session::put('meter_type',$products[0]['parameters']['values']['meter_type']);
        Session::put('comparison_type',$products[0]['parameters']['values']['comparison_type']);
       
        
        $uuid=$products[0]['parameters']['uuid'];
        
        
        if($products[0]['parameters']['values']['comparison_type']=='pack'){
        // elec product count
        
        $queryelec['locale'] = $products[0]['parameters']['values']['locale'];
        $queryelec['postalCode'] = $products[0]['parameters']['values']['postal_code'];
        $queryelec['first_residence']=true;
        $queryelec['customerGroup'] = $products[0]['parameters']['values']['customer_group'];
        
        if($products[0]['parameters']['values']['meter_type']=='single'){
            
        // $queryelec['registerDay'] = -1;
        // $queryelec['registerNight'] = -1;
        // $queryelec['registerExclNight'] =-1;
        $queryelec['registerNormal'] = $products[0]['parameters']['values']['usage_single'];
        }
        if($products[0]['parameters']['values']['meter_type']=='double'){
            
            $queryelec['registerDay'] = $products[0]['parameters']['values']['usage_day'];
        $queryelec['registerNight'] = $products[0]['parameters']['values']['usage_night'];
        // $queryelec['registerExclNight'] = -1;
        // $queryelec['registerNormal'] = -1;
        }
        if($products[0]['parameters']['values']['meter_type']=='single_excl_night'){
            
        //     $queryelec['registerDay'] = -1;
        // $queryelec['registerNight'] = null;
        $queryelec['registerExclNight'] = $products[0]['parameters']['values']['usage_excl_night'];
        $queryelec['registerNormal'] = $products[0]['parameters']['values']['usage_single'];
        }
        if($products[0]['parameters']['values']['meter_type']=='double_excl_night'){
            
            $queryelec['registerDay'] = $products[0]['parameters']['values']['usage_day'];
        $queryelec['registerNight'] = $products[0]['parameters']['values']['usage_night'];
        $queryelec['registerExclNight'] = $products[0]['parameters']['values']['usage_excl_night'];
        // $queryelec['registerNormal'] = null;
        }
        
        //$queryelec['uuid']= $products[0]['parameters']['uuid'];
        $queryelec['meterType']= $products[0]['parameters']['values']['meter_type'];
        $queryelec['IncludeE'] = 1;
        $queryelec['IncludeG'] = 0;
        $queryelec['category'] = 'electricity';
       
        
        try {
        $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('https://apistaging.wx.agency/api/calculation', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTcxY2I0YWU4M2NlOWZmZjYyNjE5NWE2NjFhZmJlMjVlNjJhOTEwZDFhNjM2YzIwYmNkZmJiN2ViMjk4M2FhZTlmNzZhYWE5YmZkYTQzMDEiLCJpYXQiOjE2MTIzNDM0ODAsIm5iZiI6MTYxMjM0MzQ4MCwiZXhwIjoxNjQzODc5NDgwLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.VgGAKbnfbxKmsfpsNtztvigJksRFxhHjgMug0v_dipxZbHJFXlSr95yThwZL8YtkDYTkDUpsngRMCvXH8Gs4EiGzHkjnvdViZy3yBZHzHMxrG9Hj1gIpMgNCViBunJfbiKeQfyIgMXiCWGzynn4Z7ib-yQyAI7OF1FtzJfo5ZpZt5-T0XALC4b0nxofQm5nLxg-I9ToOrmMYi30-tzjgFLce1TEnwbLuUJfG27OU6JC4WuftrSN18RXBOeE_RZmHm72R5CFw8TZoFylGqViHN4Qm_Z0cBRf98Vm9mc6oAUmSMgWzBiCIJB2gYQZJwQDQ4Qqorq9XSFJ3wZa5C-Xwb7yOUcZEKMpjp9ymzdaodTcnrpr9zOHq9jUXLc2R6Z8PCdzB5q8UHaqvACXFlW0JKQPbvUU2-pTvCfRJBR1d_EiBw8kW6iFmClcnWww1VZlm1dOdJ0rkFp1Ho0E-mfBgMyXcxTAnH-mnHbXs-k_6FRrnZF6WSpEYaLDn18zMXizTQpqsjKpjwGGPcOngMGDV7BUeT_AVwseij9OEJNEWFES3dvI2vmExvt_y2bZ8PdSRi7_5tMIf8zqWjZfpe8RExdWBg9365wf2TO_1knduQJiStXNYNDU356n5ea13npPVU4JtxauqxVAMgA29aHIGE4NURshJZcv5lSeZQ8st3HE'],
                      'query' => $queryelec 
                  ]);
        Session::forget('msg');
        $responseelec = $request->getBody()->getContents();       
        $jsonelec = json_decode($responseelec, true);
          } catch (\Exception $e) {
            $responseelec = ['status' => false, 'message' => $e->getMessage()];
        }  
        
       
       
         $productselec = collect($jsonelec['products']);
         Session::put('elec_count',count($productselec));
         
           
         
        // end elec product
                
                
                
        // gas product data
        $getParameters=Session::get('getParameters');
        $queryGas['locale'] = $getParameters['parameters']['values']['locale'];
        $queryGas['postalCode'] = $getParameters['parameters']['values']['postal_code'];
        $queryGas['first_residence']=true;
        $queryGas['customerGroup'] = $getParameters['parameters']['values']['customer_group'];
        $queryGas['registerG'] = $getParameters['parameters']['values']['usage_gas'];
       // $queryGas['category']=  $getParameters['parameters']['values']['comparison_type'];
        $queryGas['IncludeG'] = 1;
        $queryGas['IncludeE'] = 0;
        $queryGas['category'] = 'gas';
        
      
        
        try {

        $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('https://apistaging.wx.agency/api/calculation', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTcxY2I0YWU4M2NlOWZmZjYyNjE5NWE2NjFhZmJlMjVlNjJhOTEwZDFhNjM2YzIwYmNkZmJiN2ViMjk4M2FhZTlmNzZhYWE5YmZkYTQzMDEiLCJpYXQiOjE2MTIzNDM0ODAsIm5iZiI6MTYxMjM0MzQ4MCwiZXhwIjoxNjQzODc5NDgwLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.VgGAKbnfbxKmsfpsNtztvigJksRFxhHjgMug0v_dipxZbHJFXlSr95yThwZL8YtkDYTkDUpsngRMCvXH8Gs4EiGzHkjnvdViZy3yBZHzHMxrG9Hj1gIpMgNCViBunJfbiKeQfyIgMXiCWGzynn4Z7ib-yQyAI7OF1FtzJfo5ZpZt5-T0XALC4b0nxofQm5nLxg-I9ToOrmMYi30-tzjgFLce1TEnwbLuUJfG27OU6JC4WuftrSN18RXBOeE_RZmHm72R5CFw8TZoFylGqViHN4Qm_Z0cBRf98Vm9mc6oAUmSMgWzBiCIJB2gYQZJwQDQ4Qqorq9XSFJ3wZa5C-Xwb7yOUcZEKMpjp9ymzdaodTcnrpr9zOHq9jUXLc2R6Z8PCdzB5q8UHaqvACXFlW0JKQPbvUU2-pTvCfRJBR1d_EiBw8kW6iFmClcnWww1VZlm1dOdJ0rkFp1Ho0E-mfBgMyXcxTAnH-mnHbXs-k_6FRrnZF6WSpEYaLDn18zMXizTQpqsjKpjwGGPcOngMGDV7BUeT_AVwseij9OEJNEWFES3dvI2vmExvt_y2bZ8PdSRi7_5tMIf8zqWjZfpe8RExdWBg9365wf2TO_1knduQJiStXNYNDU356n5ea13npPVU4JtxauqxVAMgA29aHIGE4NURshJZcv5lSeZQ8st3HE'],
                      'query' => $queryGas 
                  ]);

        Session::forget('msg');
        $responseGas = $request->getBody()->getContents();       
        $jsonGas = json_decode($responseGas, true);

          } catch (\Exception $e) {

            $responseGas = ['status' => false, 'message' => $e->getMessage()];

        }  
        
         $productsGas = collect($jsonGas['products']);
         
         
         Session::put('gas_count',count($jsonGas['products']));
         
      
         
        //  end-gas
        
        }
        
      



        // active campaig updating

        if($email){



            $activeQueries['uuid']=$uuid;
            $activeQueries['customer_group']=$products[0]['parameters']['values']['customer_group'];
            $activeQueries['region']=$products[0]['parameters']['values']['region'];
            $activeQueries['usage_single']=$products[0]['parameters']['values']['usage_single'];
            $activeQueries['usage_day']=$products[0]['parameters']['values']['usage_day'];
            $activeQueries['usage_night']=$products[0]['parameters']['values']['usage_night'];
            $activeQueries['usage_excl_night']=$products[0]['parameters']['values']['usage_excl_night'];

            $activeQueries['estimate_cunsomption'] =$products[0]['parameters']['values']['estimate_cunsomption'];
            $activeQueries['residence'] =$products[0]['parameters']['values']['residence'];
            $activeQueries['building_type'] =$products[0]['parameters']['values']['building_type'];
            $activeQueries['isolation_level'] =$products[0]['parameters']['values']['isolation_level'];
            $activeQueries['heating_system'] =$products[0]['parameters']['values']['heating_system'];

            $activeQueries['residents']= $products[0]['parameters']['values']['residents'];
            $activeQueries['first_residence']= $products[0]['parameters']['values']['first_residence'];
            $activeQueries['decentralise_production']= $products[0]['parameters']['values']['decentralise_production'];
             if($products[0]['parameters']['values']['capacity_decentalise']==null || $products[0]['parameters']['values']['capacity_decentalise']==0){

                $capacity_decentalise=0;

            }else{
                $capacity_decentalise=$products[0]['parameters']['values']['capacity_decentalise'];    
            }
            $activeQueries['capacity_decentalise']=$capacity_decentalise;
            $activeQueries['includeG']= $products[0]['parameters']['values']['includeG'];
            $activeQueries['includeE']= $products[0]['parameters']['values']['includeE'];


            $activeQueries['usage_gas']=$products[0]['parameters']['values']['usage_gas'];
            if(isset($query['meterType'])){
                
                $activeQueries['meter_type']=$products[0]['parameters']['values']['meter_type'];
                $activeQueries['meter_type']=null;
            }
            $activeQueries['meter_type']=$products[0]['parameters']['values']['meter_type'];
            
            $activeQueries['comparison_type']=$products[0]['parameters']['values']['comparison_type'];
            $activeQueries['email']=$email;
            $activeQueries['postalcode']=$products[0]['parameters']['values']['postal_code'];

            $curUrl='https://energievergelijker.tariefchecker.be/overzicht/'.$products[0]['parameters']['values']['comparison_type'].'/'.$products[0]['parameters']['values']['dgo_id_electricity'].'-'.$products[0]['parameters']['values']['dgo_id_gas'].'-'.$products[0]['parameters']['values']['postal_code'].'?u='.$uuid;
            Session::put('actual_link',$curUrl);
            $activeQueries['url']=$curUrl;
            
        
        if($current_tariff_elec){
        
        $activeQueries['CurrentSupplierE'] = $current_tariff_elec;
        }

        if($current_tariff_gas){
        
        $activeQueries['CurrentSupplierG'] = $current_tariff_gas;
        }
            
            
        
           try{ 


       $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('https://apistaging.wx.agency/api/change-data-sync', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTcxY2I0YWU4M2NlOWZmZjYyNjE5NWE2NjFhZmJlMjVlNjJhOTEwZDFhNjM2YzIwYmNkZmJiN2ViMjk4M2FhZTlmNzZhYWE5YmZkYTQzMDEiLCJpYXQiOjE2MTIzNDM0ODAsIm5iZiI6MTYxMjM0MzQ4MCwiZXhwIjoxNjQzODc5NDgwLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.VgGAKbnfbxKmsfpsNtztvigJksRFxhHjgMug0v_dipxZbHJFXlSr95yThwZL8YtkDYTkDUpsngRMCvXH8Gs4EiGzHkjnvdViZy3yBZHzHMxrG9Hj1gIpMgNCViBunJfbiKeQfyIgMXiCWGzynn4Z7ib-yQyAI7OF1FtzJfo5ZpZt5-T0XALC4b0nxofQm5nLxg-I9ToOrmMYi30-tzjgFLce1TEnwbLuUJfG27OU6JC4WuftrSN18RXBOeE_RZmHm72R5CFw8TZoFylGqViHN4Qm_Z0cBRf98Vm9mc6oAUmSMgWzBiCIJB2gYQZJwQDQ4Qqorq9XSFJ3wZa5C-Xwb7yOUcZEKMpjp9ymzdaodTcnrpr9zOHq9jUXLc2R6Z8PCdzB5q8UHaqvACXFlW0JKQPbvUU2-pTvCfRJBR1d_EiBw8kW6iFmClcnWww1VZlm1dOdJ0rkFp1Ho0E-mfBgMyXcxTAnH-mnHbXs-k_6FRrnZF6WSpEYaLDn18zMXizTQpqsjKpjwGGPcOngMGDV7BUeT_AVwseij9OEJNEWFES3dvI2vmExvt_y2bZ8PdSRi7_5tMIf8zqWjZfpe8RExdWBg9365wf2TO_1knduQJiStXNYNDU356n5ea13npPVU4JtxauqxVAMgA29aHIGE4NURshJZcv5lSeZQ8st3HE'
                      ],
                      'query' => $activeQueries 
                  ]);
        
                  $response = $request->getBody()->getContents();
        }catch (\Exception $e) {
        
        
        $response = ['status' => false, 'message' => $e->getMessage()];
        
        }

         

          
          

    }
        


        // end - active campaign updatind



        return redirect('overzicht/'.$products[0]['parameters']['values']['comparison_type'].'/'.$products[0]['parameters']['values']['dgo_id_electricity'].'-'.$products[0]['parameters']['values']['dgo_id_gas'].'?&po='.$products[0]['parameters']['values']['postal_code'].'&u='.$uuid);




        
    }    
    
     public function changedata_prefosional(Request $request){ 
        
       
        
        Session::forget('customer_type');      
        Session::forget('postal_code');       
        Session::forget('usage_elec_day');      
        Session::forget('usage_elec_night');       
        Session::forget('usage_gas');
        Session::forget('sel_type');
        
        $postal_code=$po=$postal=$request->postal;
        $family_size=$request->family_size;         
        $elec=$electricity=$request->electricity_pr1p;         
        $group1=$request->group1;
        $meter_type1=$request->meter_type1;
        $email=$request->email;
        $digital=false;
        $meter_inj=null;
        $consuption_day_elec1_inj=0;
        $consuption_night_elec1_inj=0;
        $consuption1_inj=0;
        
        $usage_elec_day=$consuption_day_elec1=$request->consuption_day_elec1;
        $usage_elec_dayse=$consuption_day_elec1=$request->consuption_day_elec1se;
        $usage_elec_dayde=$consuption_day_elec1=$request->consuption_day_elec1de;
        
        
        $usage_elec_night=$consuption_night_elec1=$request->consuption_night_elec1;
        $usage_elec_nightse=$consuption_night_elec1se=$request->consuption_night_elec1se;
        $usage_elec_nightde=$consuption_night_elec1de=$request->consuption_night_elec1de;
        
        
        $consuption_excl_nightse=$consuption_excl_nightse=$request->consuption_excl_nightse;
        $consuption_excl_nightde=$consuption_excl_nightde=$request->consuption_excl_nightde;
        
        
        $usage_gas=$consumtion_gas1=$request->consumtion_gas1;
        
        $consuption1=$request->consuption1;
        $consuption1se=$request->consuption1se;
        $consuption1de=$request->consuption1de;
        
        $current_supp_elec_1=$request->current_supp_elec_1;
        $current_tariff_elec_1=$request->current_tariff_elec_1;
        
        $contract_date=$request->contract_date;
        $type_home=$request->type_home;
        $pre_in_home=$request->pre_in_home;
        $meter_type2=$request->meter_type2;
        $consuption_elec2=$request->consuption_elec2;
        $current_supp_elec_2=$request->current_supp_elec_2;        
        $gas=$request->gasp; 

        if($request->digital=='digital'){

            $digital=true;
            
        }


        if($request->meter_type1_inj){

            $meter_inj_type=$request->meter_type1_inj;
        }
        if($request->consuption_day_elec1_inj){

            $consuption_day_elec1_inj=$request->consuption_day_elec1_inj;
        }

        if($request->consuption_night_elec1_inj){

            $consuption_night_elec1_inj=$request->consuption_night_elec1_inj;
        }
        if($request->consuption1_inj){

            $consuption1_inj=$request->consuption1_inj;
        }
        
        if($request->history_date){

        $query['history_date'] = $request->history_date;

        }

        $query['digitalMeter'] =$digital;
        $query['meterTypeInj'] =$meter_inj_type;
        $query['injectionNormal'] =$consuption1_inj;
        $query['injectionDay'] =$consuption_day_elec1_inj;
        $query['injectionNight'] =$consuption_night_elec1_inj;
        
        
        
        $current_supp_gas1=$request->current_supp_gas1;
        $page='sort';         
        $locale=App::getLocale(); 
        
        $customer_type='professional';        
        
        Session::put('elec',$elec);       
        Session::put('gas',$gas);      
        Session::put('po',$po);       
        Session::put('customer_type',$customer_type);       
        Session::put('postal_code',$postal_code);        
        Session::put('usage_elec_day',$usage_elec_day);      
        Session::put('usage_elec_night',$usage_elec_night);       
        Session::put('usage_gas',$usage_gas);
        Session::put('search_email',$email);
        Session::forget('elec');
        Session::forget('gas');

        $query['estimate_cunsomption'] = 'false';
        $query['residence'] = "";
        $query['building_type'] = "";
        $query['isolation_level'] = "";
        $query['heating_system'] = "";
        
        if(Session::get('locale')){
        
        $query['locale'] = Session::get('locale');
        
        }
        if($customer_type){
        
        $query['customerGroup'] = $customer_type;
        }
        if($postal){
        
        $query['postalCode'] = $postal;
        }
        if($family_size){
        
        $query['residents'] = $family_size;
        }

        if($request->meter_type1){
        
        $query['meterType'] = $request->meter_type1;
        }

        $current_tariff_elec="";
        $current_tariff_gas="";
        if($request->current_tariff_elec_1){
        
        $query['CurrentSupplierE'] = $current_tariff_elec= $request->current_tariff_elec_1;
        }

        if($request->current_tariff_gas){
        
        $query['CurrentSupplierG'] = $current_tariff_gas= $request->current_tariff_gas;
        }

        if($request->dec_pro){
        
        $query['decentralisedProduction'] = $request->dec_pro;

        }else{

        $query['decentralisedProduction'] = false;

        }

        if($request->capacity_decen_pro){
        
        $query['decentralisedProduction'] = $request->capacity_decen_pro;
        
        }

        if($request->gasp==true){
        
        $query['IncludeG'] = true;
        
        }else{

            $query['IncludeG'] =false;
        }
        
        if(isset($request->electricity_pr1p)){
            
            if($request->electricity_pr1p==true){
                 $query['IncludeE'] = true;
            }else{
                
                $query['IncludeE'] = false;
            }
        
        
        
        }else{

            $query['IncludeE'] = false;
        }
        if($request->email){

            $query['email']=$request->email;
        }


        if($request->first_res==true){

            $query['first_residence']=true;

        }else{

           $query['first_residence']=false;

        }       
       
        if($request->meter_type1=='single'){
        
        $query['registerNormal'] = $consuption1;
        //$query['meterType'] = 'single';
        
        }
        
        if($request->meter_type1=='double'){
        
        $query['registerDay'] = $request->consuption_day_elec1;
        $query['registerNight'] = $request->consuption_night_elec1;
       // $query['meterType'] = 'double';
        
        }
        
        if($request->meter_type1=='double_excl_night'){
        
        $query['registerDay'] = $usage_elec_dayde;
        $query['registerNight'] = $usage_elec_nightde;
        $query['registerExclNight'] = $consuption_excl_nightde;
        //$query['meterType'] = 'double_excl_night';
        
        }
        
        if($request->meter_type1=='single_excl_night'){
        
        $query['registerNormal'] = $consuption1se;
        $query['registerExclNight'] = $consuption_excl_nightse;
        //$query['meterType'] = 'single_excl_night';
        
        }
        
        if($consumtion_gas1){
        
        $query['registerG'] = $consumtion_gas1;
        
        
        }
        
        
        
        if(isset($_COOKIE['uuid'])){
            $query['uuid'] = $_COOKIE['uuid'];
        }
        
        if($request->dec_pro==true){
            
            $query['dec_pro'] = $request->dec_pro;
            $query['capacity_decen_pro'] = $request->capacity_decen_pro;
        }
        
         if(!$request->electricity_pr1p && !$request->gasp){
            
            
           return redirect()->back(); 
            
        }
      
       
        if($request->subpo){
            
            $query['sub_po']=$request->input('subpo');
            
        }




          if(isset($query['registerDay'])){
       $registerDay=$query['registerDay'];
   }else{
       $registerDay=0;
   }
   
   if(isset($query['registerNight'])){
       $registerNight=$query['registerNight'];
   }else{
       $registerNight=0;
   }
   
   if(isset($query['registerExclNight'])){
       $registerExclNight=$query['registerExclNight'];
   }else{
       $registerExclNight=0;
   }
   
   if(isset($query['registerNormal'])){
       $registerNormal=$query['registerNormal'];
   }else{
       $registerNormal=0;
   }
   
    if(isset($query['registerExclNight'])){
       $registerExclNight=$query['registerExclNight'];
   }else{
       $registerExclNight=0;
   }
   
    if(isset($query['registerG'])){
       $registerG=$query['registerG'];
   }else{
       $registerG=0;
   }
   
   
   if($query['IncludeE']==1){
       
       $CuntotalE=$registerDay+$registerNight+$registerExclNight+$registerNormal+$registerExclNight;
   }else{
       
       $CuntotalE=0;
   }
   
   if($query['IncludeG']==1){
       
       $CuntotalG=$registerG;
       
   }else{
       
       $CuntotalG=0;
   }
   
   
      $Cuntotal=$CuntotalE+$CuntotalG;
      
      
      if($Cuntotal==0){
          
          return back();
          
      }
       
        /*query-end*/
        
        try{ 

        $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('https://apistaging.wx.agency/api/calculation', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTcxY2I0YWU4M2NlOWZmZjYyNjE5NWE2NjFhZmJlMjVlNjJhOTEwZDFhNjM2YzIwYmNkZmJiN2ViMjk4M2FhZTlmNzZhYWE5YmZkYTQzMDEiLCJpYXQiOjE2MTIzNDM0ODAsIm5iZiI6MTYxMjM0MzQ4MCwiZXhwIjoxNjQzODc5NDgwLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.VgGAKbnfbxKmsfpsNtztvigJksRFxhHjgMug0v_dipxZbHJFXlSr95yThwZL8YtkDYTkDUpsngRMCvXH8Gs4EiGzHkjnvdViZy3yBZHzHMxrG9Hj1gIpMgNCViBunJfbiKeQfyIgMXiCWGzynn4Z7ib-yQyAI7OF1FtzJfo5ZpZt5-T0XALC4b0nxofQm5nLxg-I9ToOrmMYi30-tzjgFLce1TEnwbLuUJfG27OU6JC4WuftrSN18RXBOeE_RZmHm72R5CFw8TZoFylGqViHN4Qm_Z0cBRf98Vm9mc6oAUmSMgWzBiCIJB2gYQZJwQDQ4Qqorq9XSFJ3wZa5C-Xwb7yOUcZEKMpjp9ymzdaodTcnrpr9zOHq9jUXLc2R6Z8PCdzB5q8UHaqvACXFlW0JKQPbvUU2-pTvCfRJBR1d_EiBw8kW6iFmClcnWww1VZlm1dOdJ0rkFp1Ho0E-mfBgMyXcxTAnH-mnHbXs-k_6FRrnZF6WSpEYaLDn18zMXizTQpqsjKpjwGGPcOngMGDV7BUeT_AVwseij9OEJNEWFES3dvI2vmExvt_y2bZ8PdSRi7_5tMIf8zqWjZfpe8RExdWBg9365wf2TO_1knduQJiStXNYNDU356n5ea13npPVU4JtxauqxVAMgA29aHIGE4NURshJZcv5lSeZQ8st3HE'
                      ],
                      'query' => $query 
                  ]);
        
       $response = $request->getBody()->getContents();
       
       }catch (\Exception $e) {
       // $response = $request->getBody()->getContents();   
        $response = ['status' => false, 'message' => $e->getMessage()];
        
        if($e->getCode()==400 || $e->getCode()==true){                
        Session::put('msg','Ongeldige Postcode');
       // return redirect('/');
        
         
        }
        }

 
     
         Session::forget('msg');
       // $response = $request->getBody()->getContents();
        
       // $json = $request->getBody()->getContents();   
        $json = json_decode($response, true);
        
        
        $products = collect($json['products']);
     
        
        if(Session::get('promo')=='true' || Session::get('domi')=='true' || Session::get('email')=='true'){
              
                if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')!='true'){
                
               
                
                $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
          
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                
                $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_slD'];
                });

                $sorted->values()->all();
                
                
               
                
            }
            
            if(Session::get('promo')!='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                
                $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                
                
            }
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                
                 $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_slD'];
                });

                $sorted->values()->all();
                
                
               
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                 $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
               
                
            }
           
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                 $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_slD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
            }
               
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_slD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
               
                
            }
                
         }else{
             
             
             $sorted = $products->sort(function($a, $b) {
                  if ($a['price']['totals']['year']['excl_promo'] == $b['price']['totals']['year']['excl_promo']) {
                  return 0;
                  }
                  return ($a['price']['totals']['year']['excl_promo'] < $b['price']['totals']['year']['excl_promo']) ? -1 : 1;
                });
             
         }
        $products = $sorted;
        
        Session::put('pro_data',$products);
       
        Session::put('getParameters',$products[0]);
        
        Session::put('uuid',$products[0]['parameters']['uuid']);
        Session::put('customer_group',$products[0]['parameters']['values']['customer_group']);
        Session::put('region',$products[0]['parameters']['values']['region']);
        Session::put('usage_single',$products[0]['parameters']['values']['usage_single']);
        Session::put('usage_day',$products[0]['parameters']['values']['usage_day']);
        Session::put('usage_night',$products[0]['parameters']['values']['usage_night']);
        Session::put('usage_excl_night',$products[0]['parameters']['values']['usage_excl_night']);
        Session::put('usage_gas',$products[0]['parameters']['values']['usage_gas']);
        Session::put('meter_type',$products[0]['parameters']['values']['meter_type']);
        Session::put('comparison_type',$products[0]['parameters']['values']['comparison_type']);
       
        
        $uuid=$products[0]['parameters']['uuid'];
        
        
        
        
        
        
        if($products[0]['parameters']['values']['comparison_type']=='pack'){
        // elec product count
        
        $queryelec['locale'] = $products[0]['parameters']['values']['locale'];
        $queryelec['postalCode'] = $products[0]['parameters']['values']['postal_code'];
        $queryelec['first_residence']=true;
        $queryelec['customerGroup'] = $products[0]['parameters']['values']['customer_group'];
        $queryelec['registerDay'] = $products[0]['parameters']['values']['usage_day'];
        $queryelec['registerNight'] = $products[0]['parameters']['values']['usage_night'];
        $queryelec['registerExclNight'] = $products[0]['parameters']['values']['usage_excl_night'];
        $queryelec['registerNormal'] = $products[0]['parameters']['values']['usage_single'];
        //$queryelec['uuid']= $products[0]['parameters']['uuid'];
        $queryelec['meter_type']= $products[0]['parameters']['values']['meter_type'];
        $queryelec['IncludeG'] = 0;
        $queryelec['IncludeE'] = 1;
        $queryelec['category'] = 'electricity';
        $queryelec['digitalMeter'] =$products[0]['parameters']['values']['digital_meter'];
        $queryelec['meterTypeInj'] =$products[0]['parameters']['values']['meterTypeInj'];
        $queryelec['injectionNormal'] =$products[0]['parameters']['values']['injectionNormal'];
        $queryelec['injectionDay'] =$products[0]['parameters']['values']['injectionDay'];
        $queryelec['injectionNight'] =$products[0]['parameters']['values']['injectionNight'];
        try {
        $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('https://apistaging.wx.agency/api/calculation', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTcxY2I0YWU4M2NlOWZmZjYyNjE5NWE2NjFhZmJlMjVlNjJhOTEwZDFhNjM2YzIwYmNkZmJiN2ViMjk4M2FhZTlmNzZhYWE5YmZkYTQzMDEiLCJpYXQiOjE2MTIzNDM0ODAsIm5iZiI6MTYxMjM0MzQ4MCwiZXhwIjoxNjQzODc5NDgwLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.VgGAKbnfbxKmsfpsNtztvigJksRFxhHjgMug0v_dipxZbHJFXlSr95yThwZL8YtkDYTkDUpsngRMCvXH8Gs4EiGzHkjnvdViZy3yBZHzHMxrG9Hj1gIpMgNCViBunJfbiKeQfyIgMXiCWGzynn4Z7ib-yQyAI7OF1FtzJfo5ZpZt5-T0XALC4b0nxofQm5nLxg-I9ToOrmMYi30-tzjgFLce1TEnwbLuUJfG27OU6JC4WuftrSN18RXBOeE_RZmHm72R5CFw8TZoFylGqViHN4Qm_Z0cBRf98Vm9mc6oAUmSMgWzBiCIJB2gYQZJwQDQ4Qqorq9XSFJ3wZa5C-Xwb7yOUcZEKMpjp9ymzdaodTcnrpr9zOHq9jUXLc2R6Z8PCdzB5q8UHaqvACXFlW0JKQPbvUU2-pTvCfRJBR1d_EiBw8kW6iFmClcnWww1VZlm1dOdJ0rkFp1Ho0E-mfBgMyXcxTAnH-mnHbXs-k_6FRrnZF6WSpEYaLDn18zMXizTQpqsjKpjwGGPcOngMGDV7BUeT_AVwseij9OEJNEWFES3dvI2vmExvt_y2bZ8PdSRi7_5tMIf8zqWjZfpe8RExdWBg9365wf2TO_1knduQJiStXNYNDU356n5ea13npPVU4JtxauqxVAMgA29aHIGE4NURshJZcv5lSeZQ8st3HE'],
                      'query' => $queryelec 
                  ]);
        Session::forget('msg');
        $responseelec = $request->getBody()->getContents();       
        $jsonelec = json_decode($responseelec, true);
          } catch (\Exception $e) {
            $responseelec = ['status' => false, 'message' => $e->getMessage()];
        }  
        
         
         $productselec = collect($jsonelec['products']);
         Session::put('elec_count',count($productselec));
         
        // end elec product
                
               
               
        // gas product data
         $getParameters=Session::get('getParameters');
        $queryGas['locale'] = $getParameters['parameters']['values']['locale'];
        $queryGas['postalCode'] = $getParameters['parameters']['values']['postal_code'];
        $queryGas['first_residence']=true;
        $queryGas['customerGroup'] = $getParameters['parameters']['values']['customer_group'];
        $queryGas['registerG'] = $getParameters['parameters']['values']['usage_gas'];
       // $queryGas['category']=  $getParameters['parameters']['values']['comparison_type'];
        $queryGas['IncludeG'] = 1;
        $queryGas['IncludeE'] = 0;
        $queryGas['category'] = 'gas';
       
        
        try {

        $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('https://apistaging.wx.agency/api/calculation', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTcxY2I0YWU4M2NlOWZmZjYyNjE5NWE2NjFhZmJlMjVlNjJhOTEwZDFhNjM2YzIwYmNkZmJiN2ViMjk4M2FhZTlmNzZhYWE5YmZkYTQzMDEiLCJpYXQiOjE2MTIzNDM0ODAsIm5iZiI6MTYxMjM0MzQ4MCwiZXhwIjoxNjQzODc5NDgwLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.VgGAKbnfbxKmsfpsNtztvigJksRFxhHjgMug0v_dipxZbHJFXlSr95yThwZL8YtkDYTkDUpsngRMCvXH8Gs4EiGzHkjnvdViZy3yBZHzHMxrG9Hj1gIpMgNCViBunJfbiKeQfyIgMXiCWGzynn4Z7ib-yQyAI7OF1FtzJfo5ZpZt5-T0XALC4b0nxofQm5nLxg-I9ToOrmMYi30-tzjgFLce1TEnwbLuUJfG27OU6JC4WuftrSN18RXBOeE_RZmHm72R5CFw8TZoFylGqViHN4Qm_Z0cBRf98Vm9mc6oAUmSMgWzBiCIJB2gYQZJwQDQ4Qqorq9XSFJ3wZa5C-Xwb7yOUcZEKMpjp9ymzdaodTcnrpr9zOHq9jUXLc2R6Z8PCdzB5q8UHaqvACXFlW0JKQPbvUU2-pTvCfRJBR1d_EiBw8kW6iFmClcnWww1VZlm1dOdJ0rkFp1Ho0E-mfBgMyXcxTAnH-mnHbXs-k_6FRrnZF6WSpEYaLDn18zMXizTQpqsjKpjwGGPcOngMGDV7BUeT_AVwseij9OEJNEWFES3dvI2vmExvt_y2bZ8PdSRi7_5tMIf8zqWjZfpe8RExdWBg9365wf2TO_1knduQJiStXNYNDU356n5ea13npPVU4JtxauqxVAMgA29aHIGE4NURshJZcv5lSeZQ8st3HE'],
                      'query' => $queryGas 
                  ]);

        Session::forget('msg');
        $responseGas = $request->getBody()->getContents();       
        

          } catch (\Exception $e) {

            $responseGas = ['status' => false, 'message' => $e->getMessage()];

        }  
        
        
         $jsonGas = json_decode($responseGas, true);
         $productsGas = collect($jsonGas['products']);
        
         
         Session::put('gas_count',count($jsonGas['products']));
         
      
         
        //  end-gas
        
        }
        
      



        // active campaig updating


            $activeQueries['uuid']=$uuid;
            $activeQueries['customer_group']=$products[0]['parameters']['values']['customer_group'];
            $activeQueries['region']=$products[0]['parameters']['values']['region'];
            $activeQueries['usage_single']=Session::get('usage_single');
            $activeQueries['usage_day']=Session::get('usage_day');
            $activeQueries['usage_night']=Session::get('usage_night');
            $activeQueries['usage_excl_night']=Session::get('usage_excl_night');
            $activeQueries['usage_gas']=Session::get('usage_gas');
            if(isset($query['meterType'])){
                
                $activeQueries['meter_type']=$query['meterType'];
            }
            
            $activeQueries['comparison_type']=Session::get('comparison_type');
            $activeQueries['email']=$email;
            $activeQueries['postalcode']=Session::get('postal_code');
            $curUrl='https://energievergelijker.tariefchecker.be/overzicht/'.$products[0]['parameters']['values']['comparison_type'].'/'.$products[0]['parameters']['values']['dgo_id_electricity'].'-'.$products[0]['parameters']['values']['dgo_id_gas'].'?&po='.$products[0]['parameters']['values']['postal_code'].'&u='.$uuid;
            Session::put('actual_link',$curUrl);
            $activeQueries['url']=$curUrl;

        if($current_tariff_elec){
        
        $activeQueries['CurrentSupplierE'] = $current_tariff_elec;
        }

        if($current_tariff_gas){
        
        $activeQueries['CurrentSupplierG'] = $current_tariff_gas;
        }

            $activeQueries['estimate_cunsomption'] =$products[0]['parameters']['values']['estimate_cunsomption'];
            $activeQueries['residence'] =$products[0]['parameters']['values']['residence'];
            $activeQueries['building_type'] =$products[0]['parameters']['values']['building_type'];
            $activeQueries['isolation_level'] =$products[0]['parameters']['values']['isolation_level'];
            $activeQueries['heating_system'] =$products[0]['parameters']['values']['heating_system'];

             $activeQueries['residents']= $products[0]['parameters']['values']['residents'];
            $activeQueries['first_residence']= $products[0]['parameters']['values']['first_residence'];
            $activeQueries['decentralise_production']= $products[0]['parameters']['values']['decentralise_production'];
             if($products[0]['parameters']['values']['capacity_decentalise']==null || $products[0]['parameters']['values']['capacity_decentalise']==0){

                $capacity_decentalise=0;

            }else{
                $capacity_decentalise=$products[0]['parameters']['values']['capacity_decentalise'];    
            }
            $activeQueries['capacity_decentalise']=$capacity_decentalise;
            $activeQueries['includeG']= $products[0]['parameters']['values']['includeG'];
            $activeQueries['includeE']= $products[0]['parameters']['values']['includeE'];
           
            
        
           

        try{ 


       $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('https://apistaging.wx.agency/api/change-data-sync', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTcxY2I0YWU4M2NlOWZmZjYyNjE5NWE2NjFhZmJlMjVlNjJhOTEwZDFhNjM2YzIwYmNkZmJiN2ViMjk4M2FhZTlmNzZhYWE5YmZkYTQzMDEiLCJpYXQiOjE2MTIzNDM0ODAsIm5iZiI6MTYxMjM0MzQ4MCwiZXhwIjoxNjQzODc5NDgwLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.VgGAKbnfbxKmsfpsNtztvigJksRFxhHjgMug0v_dipxZbHJFXlSr95yThwZL8YtkDYTkDUpsngRMCvXH8Gs4EiGzHkjnvdViZy3yBZHzHMxrG9Hj1gIpMgNCViBunJfbiKeQfyIgMXiCWGzynn4Z7ib-yQyAI7OF1FtzJfo5ZpZt5-T0XALC4b0nxofQm5nLxg-I9ToOrmMYi30-tzjgFLce1TEnwbLuUJfG27OU6JC4WuftrSN18RXBOeE_RZmHm72R5CFw8TZoFylGqViHN4Qm_Z0cBRf98Vm9mc6oAUmSMgWzBiCIJB2gYQZJwQDQ4Qqorq9XSFJ3wZa5C-Xwb7yOUcZEKMpjp9ymzdaodTcnrpr9zOHq9jUXLc2R6Z8PCdzB5q8UHaqvACXFlW0JKQPbvUU2-pTvCfRJBR1d_EiBw8kW6iFmClcnWww1VZlm1dOdJ0rkFp1Ho0E-mfBgMyXcxTAnH-mnHbXs-k_6FRrnZF6WSpEYaLDn18zMXizTQpqsjKpjwGGPcOngMGDV7BUeT_AVwseij9OEJNEWFES3dvI2vmExvt_y2bZ8PdSRi7_5tMIf8zqWjZfpe8RExdWBg9365wf2TO_1knduQJiStXNYNDU356n5ea13npPVU4JtxauqxVAMgA29aHIGE4NURshJZcv5lSeZQ8st3HE'
                      ],
                      'query' => $activeQueries 
                  ]);
        

        }catch (\Exception $e) {
        
        
        $response = ['status' => false, 'message' => $e->getMessage()];
        }

         $response = $request->getBody()->getContents();
         
         
         

       
         
         

        return redirect('overzicht/'.$products[0]['parameters']['values']['comparison_type'].'/'.$products[0]['parameters']['values']['dgo_id_electricity'].'-'.$products[0]['parameters']['values']['dgo_id_gas'].'-'.$products[0]['parameters']['values']['postal_code'].'?u='.$uuid);



    }
    
}

<?php
namespace App\Http\Controllers\wp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StaticElecticResidential;
use App\Models\StaticGasResidential;
use App\Models\StaticElectricProfessional;
use App\Models\StaticGasProfessional;
use App\Models\PostalcodeElectricity;
use App\Models\PostalcodeGas;
use App\Models\StaticPackResidential;
use App\Models\StaticPackProfessional;
use App\Models\Netcostes;
use App\Models\Netcostgs;
use App\Models\TaxElectricity;
use App\Models\TaxGas;

use App\Models\DynamicElectricProfessional;
use App\Models\DynamicGasProfessional;
use App\Models\DynamicElectricResidential;
use App\Models\DynamicGasResidential;

use App\Models\Discount;
use App\Models\Supplier;
use Response;
use Lang;
use DateTime;
use Carbon;

class wpController extends Controller
{
    public function supplier_details(Request $request){
        
        

        $pack=StaticPackResidential::where('check_elec',$request->supplier)->pluck('pack_id'); 

        $electricity=StaticElecticResidential::where('supplier',$request->supplier)->pluck('product_id');

        $product['electricity'] = $electricity;
        $product['pack'] = $pack;
        return $product;
        exit();

        $packs= array();
        $electricity= array();

        foreach ($pack as $key => $value) {
                $packs[]=utf8_encode($value);
            } 
        foreach ($electricity as $key => $value) {
                $electricity[]=utf8_encode($value);
            }   


        $pdoduct['electricity'] = $electricity;
        $pdoduct['pack'] = $packs;    
        return $pdoduct;
    }
    
    public function productset(Request $request){
        
        
        $locale="nl";
        if(isset($request->api_locale)){
        $query['locale']=$locale=$request->api_locale;
        }else{
          
          $query['locale']='nl';  
            
        }
        if(isset($request->api_postal_code)){
        $query['postalCode']=$request->api_postal_code;
        }else{
            
         $query['postalCode']=2000;
        }
        if(isset($request->api_locale)){
        $query['customerGroup']=$request->api_comparison_type;
        }else{
            
           $query['customerGroup']='residential';
        }
        if(isset($request->api_locale)){
        $query['registerNormal']=$request->api_usage_single;
        }else{
            
            $query['registerNormal']=3500;
        }
        if(isset($request->api_locale)){
        $query['registerG']=$request->api_usage_gas;
        }else{
            
         $query['registerG']=25000;   
        }
        
        $query['first_residence']=1;
        $query['meterType']=$request->api_register;
        $query['category']=$category=$request->api_fuel_type;
       
       
        
        
          try {

        $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('http://apistaging.wx.agency/api/calculation', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTcxY2I0YWU4M2NlOWZmZjYyNjE5NWE2NjFhZmJlMjVlNjJhOTEwZDFhNjM2YzIwYmNkZmJiN2ViMjk4M2FhZTlmNzZhYWE5YmZkYTQzMDEiLCJpYXQiOjE2MTIzNDM0ODAsIm5iZiI6MTYxMjM0MzQ4MCwiZXhwIjoxNjQzODc5NDgwLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.VgGAKbnfbxKmsfpsNtztvigJksRFxhHjgMug0v_dipxZbHJFXlSr95yThwZL8YtkDYTkDUpsngRMCvXH8Gs4EiGzHkjnvdViZy3yBZHzHMxrG9Hj1gIpMgNCViBunJfbiKeQfyIgMXiCWGzynn4Z7ib-yQyAI7OF1FtzJfo5ZpZt5-T0XALC4b0nxofQm5nLxg-I9ToOrmMYi30-tzjgFLce1TEnwbLuUJfG27OU6JC4WuftrSN18RXBOeE_RZmHm72R5CFw8TZoFylGqViHN4Qm_Z0cBRf98Vm9mc6oAUmSMgWzBiCIJB2gYQZJwQDQ4Qqorq9XSFJ3wZa5C-Xwb7yOUcZEKMpjp9ymzdaodTcnrpr9zOHq9jUXLc2R6Z8PCdzB5q8UHaqvACXFlW0JKQPbvUU2-pTvCfRJBR1d_EiBw8kW6iFmClcnWww1VZlm1dOdJ0rkFp1Ho0E-mfBgMyXcxTAnH-mnHbXs-k_6FRrnZF6WSpEYaLDn18zMXizTQpqsjKpjwGGPcOngMGDV7BUeT_AVwseij9OEJNEWFES3dvI2vmExvt_y2bZ8PdSRi7_5tMIf8zqWjZfpe8RExdWBg9365wf2TO_1knduQJiStXNYNDU356n5ea13npPVU4JtxauqxVAMgA29aHIGE4NURshJZcv5lSeZQ8st3HE'],
                      'query' => $query 
                  ]);

       
        $response = $request->getBody()->getContents();       
        $json = json_decode($response, true);

          } catch (\Exception $e) {

            $response = ['status' => false, 'message' => $e->getMessage()];

            }
            
              $collection = collect($json['products']);
              
              $sorted = $collection->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promo'];
                })->first();
                
                $cheapest_price=$sorted['price']['totals']['year']['excl_promo'];
            
                $filter = $collection->filter(function($value, $key) use ($category) {
                    $satisfied = 0;
                    $total_condition = 0;
                     $total_condition++;

                if($category=='pack'){
                    if ($value['product']['contract_duration']>=3 && $value['product']['underlying_products']['electricity']['pricing_type']=="fixed" && $value['product']['underlying_products']['gas']['pricing_type']=="fixed") {
                       
                                        
                            $satisfied ++;
                       
                    }
                }
                if($category=='gas'){
                    if ($value['product']['contract_duration']>=3 && $value['product']['pricing_type']=="fixed") {
                       
                                        
                            $satisfied ++;
                       
                    }
                }
                if($category=='electricity'){
                    if ($value['product']['contract_duration']>=3 && $value['product']['pricing_type']=="fixed") {
                       
                                        
                            $satisfied ++;
                       
                    }
                }
                    
                    
                    return $satisfied == $total_condition;
                });
        
                $getProducts= $filter->all();
                
              
                $getProducts=collect($getProducts);
                $sorted = $getProducts->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promo'];
                })->first();
                
            
              
                    $price_incl_promo_month_raw=number_format($sorted['price']['totals']['year']['incl_promo']/100,2,',', '.');
                    $price_excl_promo_month=number_format($sorted['price']['totals']['month']['excl_promo']/100,2,',', '.');
                    $price_incl_promo_year=number_format($sorted['price']['totals']['year']['incl_promo']/100,2,',', '.');
                    
                    $price_excl_promo_year=number_format($sorted['price']['totals']['year']['excl_promo']/100,2,',', '.');
                    
                    $cheapest_price3=number_format(($sorted['price']['totals']['year']['excl_promo']-$cheapest_price)/100,2,',', '.');
                   
                    $price_promo_montha=$sorted['price']['totals']['month']['excl_promo']-$sorted['price']['totals']['year']['incl_promo'];
                    $price_promo_month=number_format($price_promo_montha,2,',', '.');
                    
                    $price_promo_yeara=$sorted['price']['totals']['year']['incl_promo']-$sorted['price']['totals']['year']['excl_promo'];
                    $price_promo_year=number_format($price_promo_yeara/100,2,',', '.');
                    
                    if($sorted['product']['pricing_type']=='Fix'){
                        if($locale=='nl'){
                        $pricing_type='vast tarief';
                        }else{
                          $pricing_type='tarif fix';  
                            
                        }
                    }else{
                        if($locale=='nl'){
                        $pricing_type='variabele prijs';
                        }else{
                          $pricing_type='tarif variable ';  
                            
                        }
                    }
                    
                    $time=strtotime($sorted['price']['validity_period']['end']);
                    //$month=strtolower(date("F",$time));
                    $month=date('m');
                    Lang::setLocale('nl');
                   
                     if($month==1){
            $x2=trans("home.1");
            }
            if($month==2){
            $x2=ucfirst(trans("home.2"));
            }
            if($month==3){
            $x2=ucfirst(trans("home.3"));
            }
            if($month==4){
            $x2=ucfirst(trans("home.4"));
            }
            if($month==5){
            $x2=ucfirst(trans("home.5"));
            }
            if($month==6){
            $x2=ucfirst(trans("home.6"));
            }
            if($month==7){
            $x2=ucfirst(trans("home.7"));
            }
            if($month==8){
            $x2=ucfirst(trans("home.8"));
            }
            if($month==9){
            $x2=ucfirst(trans("home.9"));
            }
            if($month==10){
            $x2=ucfirst(trans("home.10"));
            }
            if($month==11){
            $x2=ucfirst(trans("home.11"));
            }
            if($month==12){
            $x2=ucfirst(trans("home.12"));
            }
            
            if($sorted['product']['service_level_payment']=='free' && $sorted['product']['service_level_invoicing']=='free' && $sorted['product']['service_level_contact']=='free'){
                
                
                $service_text="Volwaardige dienstverlening";
                
            }else{
                
                $service_text="Verplichte facturatie per email en uitsluitend elektronische communicatie";
                
            }
            
                    
                   $products['3jrvast'] =[
                        'supplier_name'=> $sorted['supplier']['name'],
                        'supplier_logo'=>$sorted['supplier']['logo'],
                        'supplier_url'=>$sorted['supplier']['url'],
                        'supplier_origin'=>$sorted['supplier']['origin'],
                        'supplier_customer_rating'=>$sorted['supplier']['customer_rating'],
                        'supplier_greenpeace_rating'=>$sorted['supplier']['greenpeace_rating'],
                        'product_name'=>$sorted['product']['name'],
                        'product_type'=>$sorted['product']['type'],
                        'product_contract_duration'=>3,
                        'product_service_level_payment'=>$sorted['product']['service_level_payment'],
                        'product_service_level_invoicing'=>$sorted['product']['service_level_invoicing'],
                        'product_service_level_contact'=>$sorted['product']['service_level_contact'],
                        'product_pricing_type'=>$pricing_type,
                        'product_subscribe_url'=>$sorted['product']['subscribe_url'],
                        'product_prices_url'=>$sorted['product']['terms_url'],
                        'product_green_percentage'=>$sorted['product']['green_percentage'],
                        'product_origin'=>$sorted['product']['origin'],
                        'product_terms_url'=>$sorted['product']['terms_url'],
                        'product_tariff_description'=>$sorted['product']['tariff_description'],
                        'name'=>$sorted['product']['name'],
                        'price_incl_promo_month'=>'€'.$price_incl_promo_month_raw,
                        'price_incl_promo_month_raw'=>$sorted['price']['totals']['month']['incl_promo'],
                        'price_excl_promo_month'=>'€'.$price_excl_promo_month,
                        'price_excl_promo_month_raw'=>$sorted['price']['totals']['month']['excl_promo'],
                        'price_incl_promo_year'=>'€'.str_replace('.', '.', $price_incl_promo_year),
                        'price_incl_promo_year_raw'=>$sorted['price']['totals']['year']['incl_promo'],
                        'price_excl_promo_year'=>'€'.str_replace('.', '.', $price_excl_promo_year),
                        'price_excl_promo_year_raw'=>$sorted['price']['totals']['year']['excl_promo'],
                        'price_promo_month'=>'€'.$price_promo_month,
                        'price_promo_month_raw'=>$price_promo_montha,
                        'price_promo_year'=>'€'.str_replace('.', '.', $price_promo_year),
                        'price_promo_year_raw'=>$price_promo_yeara,
                        'price_period_start'=>strtotime($sorted['price']['validity_period']['start']),
                        'price_period_end'=>strtotime($sorted['price']['validity_period']['end']),
                        'price_end_month'=>$x2,
                        'name'=>$sorted['supplier']['name']." ".$sorted['product']['name'],
                        'cheapest_price'=>'€'.$cheapest_price3,
                        'service_text'=>$service_text,
                        ];
                        
                        
                        
                        
               
             $filter = $collection->filter(function($value, $key) use ($category) {
                    $satisfied = 0;
                    $total_condition = 0;
                     $total_condition++;
                if($category=="pack"){
                    if ($value['product']['contract_duration']==1 && $value['product']['underlying_products']["electricity"]["pricing_type"]=="fixed" && $value['product']['underlying_products']["gas"]["pricing_type"]=="fixed") {
                       
                                        
                            $satisfied ++;
                       
                    }
                }

                if($category=="gas"){
                    if ($value['product']['contract_duration']==1 && $value['product']["pricing_type"]=="fixed") {
                       
                                        
                            $satisfied ++;
                       
                    }
                }

                if($category=="electricity"){
                    if ($value['product']['contract_duration']==1 && $value['product']["pricing_type"]=="fixed") {
                       
                                        
                            $satisfied ++;
                       
                    }
                }
                    
                   
                    
                    
                    
                    return $satisfied == $total_condition;
                });
        
                $getProducts= $filter->all();
                
            
                
            
                $getProducts=collect($getProducts);
                $sorted = $getProducts->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promo'];
                })->first();
                
            
              
                    $price_incl_promo_month_raw=number_format($sorted['price']['totals']['year']['incl_promo']/100,2,',', '.');
                    $price_excl_promo_month=number_format($sorted['price']['totals']['month']['excl_promo']/100,2,',', '.');
                    $price_incl_promo_year=number_format($sorted['price']['totals']['year']['incl_promo']/100,2,',', '.');
                    
                    $price_excl_promo_year=number_format($sorted['price']['totals']['year']['excl_promo']/100,2,',', '.');
                    $price_promo_montha=$sorted['price']['totals']['month']['excl_promo']-$sorted['price']['totals']['year']['incl_promo'];
                    $price_promo_month=number_format($price_promo_montha,2,',', '.');
                    
                    $cheapest_price1=number_format(($sorted['price']['totals']['year']['excl_promo']-$cheapest_price)/100,2,',', '.');
                    
                    $price_promo_yeara=$sorted['price']['totals']['year']['incl_promo']-$sorted['price']['totals']['year']['excl_promo'];
                    $price_promo_year=number_format($price_promo_yeara/100,2,',', '.');
                    
                      if($sorted['product']['pricing_type']=='Fix'){
                        if($locale=='nl'){
                        $pricing_type='vast tarief';
                        }else{
                          $pricing_type='tarif fix';  
                            
                        }
                    }else{
                        if($locale=='nl'){
                        $pricing_type='variabele prijs';
                        }else{
                          $pricing_type='tarif variable ';  
                            
                        }
                    }
                    
                    $time=strtotime($sorted['price']['validity_period']['end']);
                    $month=strtolower(date("F",$time));
                    Lang::setLocale('nl');
                   
                     if($month=='january'){
            $x2=trans("home.1");
            }
            if($month=='february'){
            $x2=trans("home.2");
            }
            if($month=='march'){
            $x2=trans("home.3");
            }
            if($month=='april'){
            $x2=trans("home.4");
            }
            if($month=='may'){
            $x2=trans("home.5");
            }
            if($month=='june'){
            $x2=trans("home.6");
            }
            if($month=='july'){
            $x2=trans("home.7");
            }
            if($month=='august'){
            $x2=trans("home.8");
            }
            if($month=='september'){
            $x2=trans("home.9");
            }
            if($month=='october'){
            $x2=trans("home.10");
            }
            if($month=='november'){
            $x2=trans("home.11");
            }
            if($month=='december'){
            $x2=trans("home.12");
            }
            
             if($sorted['product']['service_level_payment']=='free' && $sorted['product']['service_level_invoicing']=='free' && $sorted['product']['service_level_contact']=='free'){
                
                
                $service_text="Volwaardige dienstverlening";
                
            }else{
                
                $service_text="Verplichte facturatie per email en uitsluitend elektronische communicatie";
                
            }
                        
                  $products['1jrvast'] =[
                        'supplier_name'=> $sorted['supplier']['name'],
                        'supplier_logo'=>$sorted['supplier']['logo'],
                        'supplier_url'=>$sorted['supplier']['url'],
                        'supplier_origin'=>$sorted['supplier']['origin'],
                        'supplier_customer_rating'=>$sorted['supplier']['customer_rating'],
                        'supplier_greenpeace_rating'=>$sorted['supplier']['greenpeace_rating'],
                        'product_name'=>$sorted['product']['name'],
                        'product_type'=>$sorted['product']['type'],
                        'product_contract_duration'=>$sorted['product']['contract_duration'],
                        'product_service_level_payment'=>$sorted['product']['service_level_payment'],
                        'product_service_level_invoicing'=>$sorted['product']['service_level_invoicing'],
                        'product_service_level_contact'=>$sorted['product']['service_level_contact'],
                        'product_pricing_type'=>$pricing_type,
                        'product_subscribe_url'=>$sorted['product']['subscribe_url'],
                        'product_prices_url'=>$sorted['product']['terms_url'],
                        'product_green_percentage'=>$sorted['product']['green_percentage'],
                        'product_origin'=>$sorted['product']['origin'],
                        'product_terms_url'=>$sorted['product']['terms_url'],
                        'product_tariff_description'=>$sorted['product']['tariff_description'],
                        'name'=>$sorted['product']['name'],
                        'price_incl_promo_month'=>$sorted['price']['totals']['month']['incl_promo'],
                        'price_incl_promo_month_raw'=>'€'.$price_incl_promo_month_raw,
                        'price_excl_promo_month'=>'€'.$price_excl_promo_month,
                        'price_excl_promo_month_raw'=>$sorted['price']['totals']['month']['excl_promo'],
                        'price_incl_promo_year'=>'€'.str_replace('.', '.', $price_incl_promo_year),
                        'price_incl_promo_year_raw'=>$sorted['price']['totals']['year']['incl_promo'],
                        'price_excl_promo_year'=>$price_excl_promo_year,
                        'price_excl_promo_year_raw'=>$sorted['price']['totals']['year']['excl_promo'],
                        'price_promo_month'=>'€'.$price_promo_month,
                        'price_promo_month_raw'=>$price_promo_montha,
                        'price_promo_year'=>'€'.str_replace('.', ',', $price_promo_year),
                        'price_promo_year_raw'=>$price_promo_yeara,
                        'price_period_start'=>strtotime($sorted['price']['validity_period']['start']),
                        'price_period_end'=>strtotime($sorted['price']['validity_period']['end']),
                        'name'=>$sorted['supplier']['name']." ".$sorted['product']['name'],
                        'cheapest_price'=>'€'.$cheapest_price1,
                        'service_text'=>$service_text,
                        ];
                        
                        
               
               
            
                              $filter = $collection->filter(function($value, $key) {
                    $satisfied = 0;
                    $total_condition = 0;
                     $total_condition++;
                    if ($value['product']['green_percentage']==100 ) {
                       
                                        
                            $satisfied ++;
                       
                    }
                    
                   
                    
                    
                    
                    return $satisfied == $total_condition;
                });
        
                $getProducts= $filter->all();
                
              
                $getProducts=collect($getProducts);
                $sorted = $getProducts->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promo'];
                })->first();
                
           
              
                    $price_incl_promo_month_raw=number_format($sorted['price']['totals']['year']['incl_promo']/100,2,',', '.');
                    $price_excl_promo_month=number_format($sorted['price']['totals']['month']['excl_promo']/100,2,',', '.');
                    $price_incl_promo_year=number_format($sorted['price']['totals']['year']['incl_promo']/100,2,',', '.');
                    
                    $price_excl_promo_year=number_format($sorted['price']['totals']['year']['excl_promo']/100,2,',', '.');
                    $price_promo_montha=$sorted['price']['totals']['month']['excl_promo']-$sorted['price']['totals']['year']['incl_promo'];
                    $price_promo_month=number_format($price_promo_montha,2,',', '.');
                    
                    $price_promo_yeara=$sorted['price']['totals']['year']['incl_promo']-$sorted['price']['totals']['year']['excl_promo'];
                    $price_promo_year=number_format($price_promo_yeara/100,2,',', '.');
                    
                     $cheapest_pricegreen=number_format(($sorted['price']['totals']['year']['excl_promo']-$cheapest_price)/100,2,',', '.');
                   
                    
                     if($sorted['product']['pricing_type']=='Fix'){
                        if($locale=='nl'){
                        $pricing_type='vast tarief';
                        }else{
                          $pricing_type='tarif fix';  
                            
                        }
                    }else{
                        if($locale=='nl'){
                        $pricing_type='variabele prijs';
                        }else{
                          $pricing_type='tarif variable ';  
                            
                        }
                    }
                    
                    $time=strtotime($sorted['price']['validity_period']['end']);
                    $month=strtolower(date("F",$time));
                    Lang::setLocale('nl');
                   
                     if($month=='january'){
            $x2=trans("home.1");
            }
            if($month=='february'){
            $x2=trans("home.2");
            }
            if($month=='march'){
            $x2=trans("home.3");
            }
            if($month=='april'){
            $x2=trans("home.4");
            }
            if($month=='may'){
            $x2=trans("home.5");
            }
            if($month=='june'){
            $x2=trans("home.6");
            }
            if($month=='july'){
            $x2=trans("home.7");
            }
            if($month=='august'){
            $x2=trans("home.8");
            }
            if($month=='september'){
            $x2=trans("home.9");
            }
            if($month=='october'){
            $x2=trans("home.10");
            }
            if($month=='november'){
            $x2=trans("home.11");
            }
            if($month=='december'){
            $x2=trans("home.12");
            }   
                        
                        
                        if($sorted['product']['service_level_payment']=='free' && $sorted['product']['service_level_invoicing']=='free' && $sorted['product']['service_level_contact']=='free'){
                
                
                $service_text="Volwaardige dienstverlening";
                
            }else{
                
                $service_text="Verplichte facturatie per email en uitsluitend elektronische communicatie";
                
            }
                        
            $products['Groene'] =[
                        'supplier_name'=> $sorted['supplier']['name'],
                        'supplier_logo'=>$sorted['supplier']['logo'],
                        'supplier_url'=>$sorted['supplier']['url'],
                        'supplier_origin'=>$sorted['supplier']['origin'],
                        'supplier_customer_rating'=>$sorted['supplier']['customer_rating'],
                        'supplier_greenpeace_rating'=>$sorted['supplier']['greenpeace_rating'],
                        'product_name'=>$sorted['product']['name'],
                        'product_type'=>$sorted['product']['type'],
                        'product_contract_duration'=>$sorted['product']['contract_duration'],
                        'product_service_level_payment'=>$sorted['product']['service_level_payment'],
                        'product_service_level_invoicing'=>$sorted['product']['service_level_invoicing'],
                        'product_service_level_contact'=>$sorted['product']['service_level_contact'],
                        'product_pricing_type'=>$pricing_type,
                        'product_subscribe_url'=>$sorted['product']['subscribe_url'],
                        'product_prices_url'=>$sorted['product']['terms_url'],
                        'product_green_percentage'=>$sorted['product']['green_percentage'],
                        'product_origin'=>$sorted['product']['origin'],
                        'product_terms_url'=>$sorted['product']['terms_url'],
                        'product_tariff_description'=>$sorted['product']['tariff_description'],
                        'name'=>$sorted['product']['name'],
                        'price_incl_promo_month'=>$sorted['price']['totals']['month']['incl_promo'],
                        'price_incl_promo_month_raw'=>'€'.$price_incl_promo_month_raw,
                        'price_excl_promo_month'=>'€'.$price_excl_promo_month,
                        'price_excl_promo_month_raw'=>$sorted['price']['totals']['month']['excl_promo'],
                        'price_incl_promo_year'=>'€'.str_replace('.', '.', $price_incl_promo_year),
                        'price_incl_promo_year_raw'=>$sorted['price']['totals']['year']['incl_promo'],
                        'price_excl_promo_year'=>$price_excl_promo_year,
                        'price_excl_promo_year_raw'=>$sorted['price']['totals']['year']['excl_promo'],
                        'price_promo_month'=>'€'.$price_promo_month,
                        'price_promo_month_raw'=>$price_promo_montha,
                        'price_promo_year'=>'€'.str_replace('.', ',', $price_promo_year),
                        'price_promo_year_raw'=>$price_promo_yeara,
                        'price_period_start'=>strtotime($sorted['price']['validity_period']['start']),
                        'price_period_end'=>strtotime($sorted['price']['validity_period']['end']),
                        'name'=>$sorted['supplier']['name']." ".$sorted['product']['name'],
                        'cheapest_price'=>'€ 0,00',
                        'service_text'=>$service_text,
                        ];
                        
                        
                        
                        
                
              
                $getProducts=collect($getProducts);
                $sorted = $collection->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promo'];
                })->first();
                
            
              
                    $price_incl_promo_month_raw=number_format($sorted['price']['totals']['year']['incl_promo']/100,2,',', '.');
                    $price_excl_promo_month=number_format($sorted['price']['totals']['month']['excl_promo']/100,2,',', '.');
                    $price_incl_promo_year=number_format($sorted['price']['totals']['year']['incl_promo']/100,2,',', '.');
                    
                    $price_excl_promo_year=number_format($sorted['price']['totals']['year']['excl_promo']/100,2,',', '.');
                    $price_promo_montha=$sorted['price']['totals']['month']['incl_promo']-$sorted['price']['totals']['month']['excl_promo'];
                    $price_promo_month=number_format($price_promo_montha,2,',', '.');
                    
                    $price_promo_yeara=$sorted['price']['totals']['year']['excl_promo']-$sorted['price']['totals']['year']['incl_promo'];
                    $price_promo_year=number_format($price_promo_yeara/100,2,',', '.');
                    
                    if($sorted['product']['pricing_type']=='Fix'){
                        if($locale=='nl'){
                        $pricing_type='vast tarief';
                        }else{
                          $pricing_type='tarif fix';  
                            
                        }
                    }else{
                        if($locale=='nl'){
                        $pricing_type='variabele prijs';
                        }else{
                          $pricing_type='tarif variable ';  
                            
                        }
                    }
                    
                    $time=strtotime($sorted['price']['validity_period']['end']);
                    $month=strtolower(date("F",$time));
                    
                    Lang::setLocale('nl');
                   
                     if($month=='january'){
            $x2=trans("home.1");
            }
            if($month=='february'){
            $x2=trans("home.2");
            }
            if($month=='march'){
            $x2=trans("home.3");
            }
            if($month=='April'){
            $x2=trans("home.4");
            }
            if($month=='may'){
            $x2=trans("home.5");
            }
            if($month=='june'){
            $x2=trans("home.6");
            }
            if($month=='july'){
            $x2=trans("home.7");
            }
            if($month=='august'){
            $x2=trans("home.8");
            }
            if($month=='september'){
            $x2=trans("home.9");
            }
            if($month=='october'){
            $x2=trans("home.10");
            }
            if($month=='november'){
            $x2=trans("home.11");
            }
            if($month=='december'){
            $x2=trans("home.12");
            }
            
            
             if($sorted['product']['service_level_payment']=='free' && $sorted['product']['service_level_invoicing']=='free' && $sorted['product']['service_level_contact']=='free'){
                
                
                $service_text="Volwaardige dienstverlening";
                
            }else{
                
                $service_text="Verplichte facturatie per email en uitsluitend elektronische communicatie";
                
            }
                        
                $products['Goedkoopste'] =[
                        'supplier_name'=> $sorted['supplier']['name'],
                        'supplier_logo'=>$sorted['supplier']['logo'],
                        'supplier_url'=>$sorted['supplier']['url'],
                        'supplier_origin'=>$sorted['supplier']['origin'],
                        'supplier_customer_rating'=>$sorted['supplier']['customer_rating'],
                        'supplier_greenpeace_rating'=>$sorted['supplier']['greenpeace_rating'],
                        'product_name'=>$sorted['product']['name'],
                        'product_type'=>$sorted['product']['type'],
                        'product_contract_duration'=>$sorted['product']['contract_duration'],
                        'product_service_level_payment'=>$sorted['product']['service_level_payment'],
                        'product_service_level_invoicing'=>$sorted['product']['service_level_invoicing'],
                        'product_service_level_contact'=>$sorted['product']['service_level_contact'],
                        'product_pricing_type'=>$pricing_type,
                        'product_subscribe_url'=>$sorted['product']['subscribe_url'],
                        'product_prices_url'=>$sorted['product']['terms_url'],
                        'product_green_percentage'=>$sorted['product']['green_percentage'],
                        'product_origin'=>$sorted['product']['origin'],
                        'product_terms_url'=>$sorted['product']['terms_url'],
                        'product_tariff_description'=>$sorted['product']['tariff_description'],
                        'name'=>$sorted['product']['name'],
                        'price_incl_promo_month'=>$sorted['price']['totals']['month']['incl_promo'],
                        'price_incl_promo_month_raw'=>'€'.$price_incl_promo_month_raw,
                        'price_excl_promo_month'=>'€'.$price_excl_promo_month,
                        'price_excl_promo_month_raw'=>$sorted['price']['totals']['month']['excl_promo'],
                        'price_incl_promo_year'=>'€'.number_format($sorted['price']['totals']['year']['incl_promo']/100,2,',', '.'),
                        'price_incl_promo_year_raw'=>$sorted['price']['totals']['year']['incl_promo'],
                        'price_excl_promo_year'=>$price_excl_promo_year,
                        'price_excl_promo_year_raw'=>$sorted['price']['totals']['year']['excl_promo'],
                        'price_promo_month'=>'€'.$price_promo_month,
                        'price_promo_month_raw'=>$price_promo_montha,
                        'price_promo_year'=>'€'.str_replace('.', ',', $price_promo_year),
                        'price_promo_year_raw'=>$price_promo_yeara,
                        'price_period_start'=>strtotime($sorted['price']['validity_period']['start']),
                        'price_period_end'=>strtotime($sorted['price']['validity_period']['end']),
                        'price_end_month'=>$x2,
                        'name'=>$sorted['supplier']['name']." ".$sorted['product']['name'],
                        'service_text'=>$service_text
                        ];
                        
                $products['Poweo'] =[
                        'supplier_name'=> $sorted['supplier']['name'],
                        'supplier_logo'=>$sorted['supplier']['logo'],
                        'supplier_url'=>$sorted['supplier']['url'],
                        'supplier_origin'=>$sorted['supplier']['origin'],
                        'supplier_customer_rating'=>$sorted['supplier']['customer_rating'],
                        'supplier_greenpeace_rating'=>$sorted['supplier']['greenpeace_rating'],
                        'product_name'=>$sorted['product']['name'],
                        'product_type'=>$sorted['product']['type'],
                        'product_contract_duration'=>$sorted['product']['contract_duration'],
                        'product_service_level_payment'=>$sorted['product']['service_level_payment'],
                        'product_service_level_invoicing'=>$sorted['product']['service_level_invoicing'],
                        'product_service_level_contact'=>$sorted['product']['service_level_contact'],
                        'product_pricing_type'=>$pricing_type,
                        'product_subscribe_url'=>$sorted['product']['subscribe_url'],
                        'product_prices_url'=>$sorted['product']['terms_url'],
                        'product_green_percentage'=>$sorted['product']['green_percentage'],
                        'product_origin'=>$sorted['product']['origin'],
                        'product_terms_url'=>$sorted['product']['terms_url'],
                        'product_tariff_description'=>$sorted['product']['tariff_description'],
                        'name'=>$sorted['product']['name'],
                        'price_incl_promo_month'=>$sorted['price']['totals']['month']['incl_promo'],
                        'price_incl_promo_month_raw'=>'€'.$price_incl_promo_month_raw,
                        'price_excl_promo_month'=>'€'.$price_excl_promo_month,
                        'price_excl_promo_month_raw'=>$sorted['price']['totals']['month']['excl_promo'],
                        'price_incl_promo_year'=>'€'.str_replace('.', '.', $price_incl_promo_year),
                        'price_incl_promo_year_raw'=>$sorted['price']['totals']['year']['incl_promo'],
                        'price_excl_promo_year'=>$price_excl_promo_year,
                        'price_excl_promo_year_raw'=>$sorted['price']['totals']['year']['excl_promo'],
                        'price_promo_month'=>'€'.$price_promo_month,
                        'price_promo_month_raw'=>$price_promo_montha,
                        'price_promo_year'=>'€'.str_replace('.', ',', $price_promo_year),
                        'price_promo_year_raw'=>$price_promo_yeara,
                        'price_period_start'=>strtotime($sorted['price']['validity_period']['start']),
                        'price_period_end'=>strtotime($sorted['price']['validity_period']['end']),
                        'name'=>$sorted['supplier']['name']." ".$sorted['product']['name'],
                        'service_text'=>$service_text
                        ];
                    
                    
           
             
             
              return Response::json($products);
              //return json($products);
           
           
    }
    
    public function supplier(Request $request)
    {
        
        if($request->type=='elec'){
        $supplier = DynamicElectricResidential::whereHas('staticData', function($q) {
                    $q->where('acticve', 'Y');
                })
                 ->where('supplier',$request->supplier)
                ->get();
                
                 $html="";
         
         foreach($supplier as $suppliers){
             
             
             if($suppliers->staticData->service_level_payment=="Free" && $suppliers->staticData->service_level_invoicing=="Free" && $suppliers->staticData->service_level_contact=="Free"){
                 
                 $SAE="free";
             }else{
                 
                 $SAE="active";
             }
             
            
             
             
             if($SAE=="free"){
                 
                 $SAtext="Volwaardige dienstverlening";
             }else{
                 
                 $SAtext="Verplichte facturatie per email en uitsluitend elektronische communicatie";
                 
             }
            
             
             if($suppliers->duration==0){
             $duration="Onbepaald";     
             }else{
                 
              $duration=$suppliers->duration;   
             }
             
             if($suppliers->fixed_indexed=='Ind'){
             $fixed_indiableE="Variabel";   
             }else{
                 
              $fixed_indiableE='Vast';   
             }
             
             if($suppliers->staticData->green_percentage=='100%'){
             $green_percentage="Ja";    
             }else{
                 
              $green_percentage='Nee';   
             }
             
             
         $html.='<tr>
      <td><span data-ps-field="supplier_name" data-ps-product="Cheapest">'.$suppliers->product.'</span></td>
      <td data-ps-field="Duurtijd" data-ps-product="Cheapest">'.$duration.' jaar</td>
      <td data-ps-field="Vast of variabel" data-ps-product="Cheapest">'.$fixed_indiableE.'</td>
      <td data-ps-field="Groene energie" data-ps-product="Cheapest">'.$green_percentage.'</td>
      <td data-ps-field="Dienstverlening" data-ps-product="Cheapest">'.$SAtext.'</td>
      <td data-ps-field="Klant worden" data-ps-product="Cheapest"><a href="'.$suppliers->prices_url_nl.'" target="_blank">Klik hier</a></td>
      </tr>';
         }
      
      
      echo $html;
                
               
                
        }else{
                
                
        
        $supplier=StaticPackResidential::select(
                'static_pack_residentials.*',
                'dynamic_electric_residentials.product_id as product_idE','dynamic_electric_residentials.date as dateE','dynamic_electric_residentials.valid_from as valid_fromE','dynamic_electric_residentials.valid_till as valid_tillE','dynamic_electric_residentials.supplier as supplierE','dynamic_electric_residentials.product as productE','dynamic_electric_residentials.fuel as fuelE','dynamic_electric_residentials.duration as durationE','dynamic_electric_residentials.fixed_indexed as fixed_indiableE','dynamic_electric_residentials.fixed_indexed as fixed_indiableE','dynamic_electric_residentials.customer_segment as segmentE','dynamic_electric_residentials.VL as VLE','dynamic_electric_residentials.WA as WAE','dynamic_electric_residentials.BR as BRE','dynamic_electric_residentials.volume_lower as volume_lowerE','dynamic_electric_residentials.volume_upper as volume_upperE','dynamic_electric_residentials.price_single as price_singleE','dynamic_electric_residentials.price_day as price_dayE','dynamic_electric_residentials.price_night as price_nightE','dynamic_electric_residentials.price_excl_night as price_excl_nightE','dynamic_electric_residentials.ff_single as ff_singleE','dynamic_electric_residentials.ff_day_night as ff_day_nightE','dynamic_electric_residentials.ff_excl_night as ff_excl_nightE','dynamic_electric_residentials.gsc_vl as gsc_vlE','dynamic_electric_residentials.wkc_vl as wkc_vlE','dynamic_electric_residentials.gsc_wa as gsc_waE','dynamic_electric_residentials.gsc_br as gsc_brE','dynamic_electric_residentials.prices_url_nl as prices_url_nlE','dynamic_electric_residentials.prices_url_fr as prices_url_frE','dynamic_electric_residentials.index_name as indexE','dynamic_electric_residentials.index_value as waardeE','dynamic_electric_residentials.coeff_single as coeff_singleE','dynamic_electric_residentials.term_single as term_singleE','dynamic_electric_residentials.coeff_day as coeff_dayE','dynamic_electric_residentials.term_day as term_dayE','dynamic_electric_residentials.coeff_night as coeff_nightE','dynamic_electric_residentials.term_night as term_nightE','dynamic_electric_residentials.coeff_excl as coeff_exclE','dynamic_electric_residentials.term_excl as term_exclE',
                'dynamic_gas_residentials.product_id as product_idG','dynamic_gas_residentials.date as dateG','dynamic_gas_residentials.valid_from as valid_fromG','dynamic_gas_residentials.valid_till as valid_tillG','dynamic_gas_residentials.supplier as supplierG','dynamic_gas_residentials.product as productG','dynamic_gas_residentials.fuel as fuelG','dynamic_gas_residentials.duration as durationG','dynamic_gas_residentials.fixed_indexed as fixed_indiableG','dynamic_gas_residentials.fixed_indexed as fixed_indiableG','dynamic_gas_residentials.segment as segmentG','dynamic_gas_residentials.VL as VLG','dynamic_gas_residentials.WA as WAG','dynamic_gas_residentials.BR as BRG','dynamic_gas_residentials.volume_lower as volume_lowerG','dynamic_gas_residentials.volume_upper as volume_upperG',
                'dynamic_gas_residentials.ff as ffG',
                'dynamic_gas_residentials.price_gas as price_gasG','dynamic_gas_residentials.prices_url_nl as prices_url_nlG','dynamic_gas_residentials.prices_url_fr as prices_url_frG','dynamic_gas_residentials.index_name as indexG','dynamic_gas_residentials.index_value as waardeG','dynamic_gas_residentials.coeff as coeffG','dynamic_gas_residentials.term as term')            
            ->Join('dynamic_electric_residentials','dynamic_electric_residentials.product_id','=','static_pack_residentials.pro_id_E')
            ->Join('dynamic_gas_residentials','dynamic_gas_residentials.product_id','=','static_pack_residentials.pro_id_G')   
            //->where('dynamic_gas_residentials.'.$region.'','=','Y') 
            //->whereDate('dynamic_gas_residentials.valid_from','<=',$currentDate)->whereDate('dynamic_gas_residentials.valid_till','>=',$currentDate)
            //->whereDate('dynamic_electric_residentials.valid_from','<=',$currentDate)->whereDate('dynamic_electric_residentials.valid_till','>=',$currentDate)
            ->where('static_pack_residentials.active','Y')
            ->where('dynamic_gas_residentials.supplier',$request->supplier)
            ->where('dynamic_electric_residentials.supplier',$request->supplier)
            ->get();
        //$supplier=StaticPackResidential::where('supplier',$request->supplier)->get();
        
         //return Response::json($supplier);
         
         $html="";
         
         foreach($supplier as $suppliers){
             $product_idE=StaticElecticResidential::where('product_id',$suppliers->product_idE)->first();
             $product_idG=StaticGasResidential::where('product_id',$suppliers->product_idG)->first();
             
             if($product_idE->service_level_payment=="Free" && $product_idE->service_level_invoicing=="Free" && $product_idE->service_level_contact=="Free"){
                 
                 $SAE="free";
             }else{
                 
                 $SAE="active";
             }
             
             if($product_idG->service_level_payment=="Free" && $product_idG->service_level_invoicing=="Free" && $product_idG->service_level_contact=="Free"){
                 
                 $SAG="free";
             }else{
                 
                 $SAG="active";
             }
             
             
             if($SAE=="free"){
                 
                 $SAtext="Volwaardige dienstverlening";
             }else{
                 
                 $SAtext="Verplichte facturatie per email en uitsluitend elektronische communicatie";
                 
             }
             
             if($suppliers->durationE==0){
             $duration="Onbepaald";     
             }else{
                 
              $duration=$suppliers->durationE;   
             }
             
             if($suppliers->fixed_indiableE=='Ind'){
             $fixed_indiableE="Variabel";   
             }else{
                 
              $fixed_indiableE='Vast';   
             }
             
             if($product_idE->green_percentage=='100%'){
             $green_percentage="Ja";    
             }else{
                 
              $green_percentage='Nee';   
             }
             
             
             
             
         $html.='<tr>
      <td><span data-ps-field="supplier_name" data-ps-product="Cheapest">'.$suppliers->productE.'</span> + <span data-ps-field="product_name" data-ps-product="Cheapest">Gas '.$suppliers->productG.'</span></td>
      <td data-ps-field="Duurtijd" data-ps-product="Cheapest">'.$duration.' jaar</td>
      <td data-ps-field="Vast of variabel" data-ps-product="Cheapest">'.$fixed_indiableE.'</td>
      <td data-ps-field="Groene energie" data-ps-product="Cheapest">'.$green_percentage.'</td>
      <td data-ps-field="Dienstverlening" data-ps-product="Cheapest">'.$SAtext.'</td>
      <td data-ps-field="Klant worden" data-ps-product="Cheapest"><a href="'.$suppliers->URL_NL.'" target="_blank">Klik hier</a></td>
      </tr>';
         }
      
      
      echo $html;
      
        }
    }
    
        public function supplier_detail(Request $request)
    {
        
        
         if($request->type=='elec'){
             
        $supplier = DynamicElectricResidential::whereHas('staticData', function($q) {
                    $q->where('acticve', 'Y');
                })
                 ->where('supplier',$request->supplier)
                ->get();
                
                
                 // pro list
        
            if(isset($request->api_locale)){
        $query['locale']=$locale=$request->api_locale;
        }else{
          
          $query['locale']='nl';  
            
        }
        if(isset($request->api_postal_code)){
        $query['postalCode']=$request->api_postal_code;
        }else{
            
         $query['postalCode']=2000;
        }
        if(isset($request->api_locale)){
        $query['customerGroup']=$request->api_comparison_type;
        }else{
            
           $query['customerGroup']='residential';
        }
        if(isset($request->api_locale)){
        $query['registerNormal']=$request->api_usage_single;
        }else{
            
            $query['registerNormal']=3500;
        }
        
        
        $query['first_residence']=1;
        $query['meterType']='single';
        $query['category']='electricity';
       
       
        
        
          try {

        $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('http://apistaging.wx.agency/api/calculation', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTcxY2I0YWU4M2NlOWZmZjYyNjE5NWE2NjFhZmJlMjVlNjJhOTEwZDFhNjM2YzIwYmNkZmJiN2ViMjk4M2FhZTlmNzZhYWE5YmZkYTQzMDEiLCJpYXQiOjE2MTIzNDM0ODAsIm5iZiI6MTYxMjM0MzQ4MCwiZXhwIjoxNjQzODc5NDgwLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.VgGAKbnfbxKmsfpsNtztvigJksRFxhHjgMug0v_dipxZbHJFXlSr95yThwZL8YtkDYTkDUpsngRMCvXH8Gs4EiGzHkjnvdViZy3yBZHzHMxrG9Hj1gIpMgNCViBunJfbiKeQfyIgMXiCWGzynn4Z7ib-yQyAI7OF1FtzJfo5ZpZt5-T0XALC4b0nxofQm5nLxg-I9ToOrmMYi30-tzjgFLce1TEnwbLuUJfG27OU6JC4WuftrSN18RXBOeE_RZmHm72R5CFw8TZoFylGqViHN4Qm_Z0cBRf98Vm9mc6oAUmSMgWzBiCIJB2gYQZJwQDQ4Qqorq9XSFJ3wZa5C-Xwb7yOUcZEKMpjp9ymzdaodTcnrpr9zOHq9jUXLc2R6Z8PCdzB5q8UHaqvACXFlW0JKQPbvUU2-pTvCfRJBR1d_EiBw8kW6iFmClcnWww1VZlm1dOdJ0rkFp1Ho0E-mfBgMyXcxTAnH-mnHbXs-k_6FRrnZF6WSpEYaLDn18zMXizTQpqsjKpjwGGPcOngMGDV7BUeT_AVwseij9OEJNEWFES3dvI2vmExvt_y2bZ8PdSRi7_5tMIf8zqWjZfpe8RExdWBg9365wf2TO_1knduQJiStXNYNDU356n5ea13npPVU4JtxauqxVAMgA29aHIGE4NURshJZcv5lSeZQ8st3HE'],
                      'query' => $query 
                  ]);

       
        $response = $request->getBody()->getContents();       
        $json = json_decode($response, true);

          } catch (\Exception $e) {

            $response = ['status' => false, 'message' => $e->getMessage()];

            }
            
              $collection = collect($json['products']);
              
        
        // end-pro list
         
         
         
         $html="";
         
         foreach($supplier as $suppliers){
             $product_idE=StaticElecticResidential::where('product_id',$suppliers->product_idE)->first();
            
             
             if($suppliers->staticData->service_level_payment=="Free" && $suppliers->staticData->service_level_invoicing=="Free" && $suppliers->staticData->service_level_contact=="Free"){
                 
                 $SAE="free";
             }else{
                 
                 $SAE="active";
             }
             
             
             
             
             if($SAE=="free"){
                 
                 $SAtext="Volwaardige dienstverlening";
             }else{
                 
                 $SAtext="Verplichte facturatie per email en uitsluitend elektronische communicatie";
                 
             }
             
             
             if($suppliers->duration==0){
             $duration="Onbepaald";     
             }else{
                 
             $duration=$suppliers->durationE." "."jaar";      
             }
             
             if($suppliers->fixed_indexed=='Ind'){
             $fixed_indiableE="Variabel";   
             }else{
                 
              $fixed_indiableE='Vast';   
             }
             
             if($suppliers->staticData->green_percentage=='100%'){
             $green_percentage="100% groene energie";   
             }else{
                 
              $green_percentage='0% groene energie';   
             }
             
            
             $proID=$suppliers->product_id;
             $filter = $collection->filter(function($value, $key) use($proID) {
                    $satisfied = 0;
                    $total_condition = 0;
                     $total_condition++;
                    if ($value['product']['id']==$proID) {
                       
                                        
                            $satisfied ++;
                       
                    }
                    
                    
                    return $satisfied == $total_condition;
                });
        
                $getProducts= $filter->first();
                $disc=($getProducts['price']['totals']['year']['excl_promo']-$getProducts['price']['totals']['year']['incl_promo'])/100;
                 if($getProducts['product']['service_level_payment']=="free" && $getProducts['product']['service_level_invoicing']=="free" && $getProducts['product']['service_level_contact']=="free" )
                {
                    $text="Volwaardige dienstverlening";
                    $SA='true';
                    
                }else{
                    
                   
                     
                     $text="Verplichte facturatie per email en uitsluitend elektronische communicatie";
                     $SA='false';
                }
                
             
             
         $html.='<div class="col-md-12 col-lg-12 details"><div class="col-md-6 col-lg-5 detail-info">
         <h3>'.$suppliers->product.'</h3>
         <ul><li>Duurtijd: '.$duration.'</li><li>'.$fixed_indiableE.' prijs</li><li>'.$green_percentage.'</li><li>'.$text.'</li>';
         if($disc>0){
         $html.='<li><strong>korting van&nbsp;€'.number_format(($getProducts['price']['totals']['year']['excl_promo']-$getProducts['price']['totals']['year']['incl_promo'])/100,2,',', '.').'/jaar</strong>. Enkel geldig voor nieuwe klanten die zich <strong>via Tariefchecker</strong> registreren voor 30/'.date('m').'/'.date('Y').'</li>';
         }
         $html.='</ul>
         </div>
         <div class="col-md-6 col-lg-6 col-lg-offset-1">
         <h5>Voor wie is dit tarief?</h5>';
         if($SA=='false'){
         $html.='<p>Verlaagd tarief voor groene stroom aan een '.$fixed_indiableE.' tarief gedurende '.$duration.' jaar met de verplichting facturen per email te ontvangen en enkel online contact op te nemen met '.$suppliers->supplierE.'.</p>';
         
         }else{
             
            $html.='<p>'.$fixed_indiableE.' tarief gedurende '.$duration.'  jaar voor groene stroom van Belgische bodem.</p>';  
         }
         
         $html.='<p><strong class="dark">Tariefkaarten:</strong> <a href="'.$suppliers->URL_NL.'">Elektriciteit</a> 
         
        
         <p><a href="'.$suppliers->URL_NL.'" target="_blank" class="red">Word klant</a> of <a href="http://www.tariefchecker.be">bereken jouw persoonlijk tarief</a></p>
         </div></div>';
         }
      
      
      echo $html;
                
                
                
                
         }else{
  
        
        $supplier=StaticPackResidential::select(
                'static_pack_residentials.*',
                'dynamic_electric_residentials.product_id as product_idE','dynamic_electric_residentials.date as dateE','dynamic_electric_residentials.valid_from as valid_fromE','dynamic_electric_residentials.valid_till as valid_tillE','dynamic_electric_residentials.supplier as supplierE','dynamic_electric_residentials.product as productE','dynamic_electric_residentials.fuel as fuelE','dynamic_electric_residentials.duration as durationE','dynamic_electric_residentials.fixed_indexed as fixed_indiableE','dynamic_electric_residentials.fixed_indexed as fixed_indiableE','dynamic_electric_residentials.customer_segment as segmentE','dynamic_electric_residentials.VL as VLE','dynamic_electric_residentials.WA as WAE','dynamic_electric_residentials.BR as BRE','dynamic_electric_residentials.volume_lower as volume_lowerE','dynamic_electric_residentials.volume_upper as volume_upperE','dynamic_electric_residentials.price_single as price_singleE','dynamic_electric_residentials.price_day as price_dayE','dynamic_electric_residentials.price_night as price_nightE','dynamic_electric_residentials.price_excl_night as price_excl_nightE','dynamic_electric_residentials.ff_single as ff_singleE','dynamic_electric_residentials.ff_day_night as ff_day_nightE','dynamic_electric_residentials.ff_excl_night as ff_excl_nightE','dynamic_electric_residentials.gsc_vl as gsc_vlE','dynamic_electric_residentials.wkc_vl as wkc_vlE','dynamic_electric_residentials.gsc_wa as gsc_waE','dynamic_electric_residentials.gsc_br as gsc_brE','dynamic_electric_residentials.prices_url_nl as prices_url_nlE','dynamic_electric_residentials.prices_url_fr as prices_url_frE','dynamic_electric_residentials.index_name as indexE','dynamic_electric_residentials.index_value as waardeE','dynamic_electric_residentials.coeff_single as coeff_singleE','dynamic_electric_residentials.term_single as term_singleE','dynamic_electric_residentials.coeff_day as coeff_dayE','dynamic_electric_residentials.term_day as term_dayE','dynamic_electric_residentials.coeff_night as coeff_nightE','dynamic_electric_residentials.term_night as term_nightE','dynamic_electric_residentials.coeff_excl as coeff_exclE','dynamic_electric_residentials.term_excl as term_exclE',
                'dynamic_gas_residentials.product_id as product_idG','dynamic_gas_residentials.date as dateG','dynamic_gas_residentials.valid_from as valid_fromG','dynamic_gas_residentials.valid_till as valid_tillG','dynamic_gas_residentials.supplier as supplierG','dynamic_gas_residentials.product as productG','dynamic_gas_residentials.fuel as fuelG','dynamic_gas_residentials.duration as durationG','dynamic_gas_residentials.fixed_indexed as fixed_indiableG','dynamic_gas_residentials.fixed_indexed as fixed_indiableG','dynamic_gas_residentials.segment as segmentG','dynamic_gas_residentials.VL as VLG','dynamic_gas_residentials.WA as WAG','dynamic_gas_residentials.BR as BRG','dynamic_gas_residentials.volume_lower as volume_lowerG','dynamic_gas_residentials.volume_upper as volume_upperG',
                'dynamic_gas_residentials.ff as ffG',
                'dynamic_gas_residentials.price_gas as price_gasG','dynamic_gas_residentials.prices_url_nl as prices_url_nlG','dynamic_gas_residentials.prices_url_fr as prices_url_frG','dynamic_gas_residentials.index_name as indexG','dynamic_gas_residentials.index_value as waardeG','dynamic_gas_residentials.coeff as coeffG','dynamic_gas_residentials.term as term')            
            ->Join('dynamic_electric_residentials','dynamic_electric_residentials.product_id','=','static_pack_residentials.pro_id_E')
            ->Join('dynamic_gas_residentials','dynamic_gas_residentials.product_id','=','static_pack_residentials.pro_id_G')   
            //->where('dynamic_gas_residentials.'.$region.'','=','Y') 
            //->whereDate('dynamic_gas_residentials.valid_from','<=',$currentDate)->whereDate('dynamic_gas_residentials.valid_till','>=',$currentDate)
            //->whereDate('dynamic_electric_residentials.valid_from','<=',$currentDate)->whereDate('dynamic_electric_residentials.valid_till','>=',$currentDate)
            ->where('static_pack_residentials.active','Y')
            ->where('dynamic_gas_residentials.supplier',$request->supplier)
            ->where('dynamic_electric_residentials.supplier',$request->supplier)
            ->get();
        //$supplier=StaticPackResidential::where('supplier',$request->supplier)->get();
        
         //return Response::json($supplier);
         
         
               // pro list
        
            if(isset($request->api_locale)){
        $query['locale']=$locale=$request->api_locale;
        }else{
          
          $query['locale']='nl';  
            
        }
        if(isset($request->api_postal_code)){
        $query['postalCode']=$request->api_postal_code;
        }else{
            
         $query['postalCode']=2000;
        }
        if(isset($request->api_locale)){
        $query['customerGroup']=$request->api_comparison_type;
        }else{
            
           $query['customerGroup']='residential';
        }
        if(isset($request->api_locale)){
        $query['registerNormal']=$request->api_usage_single;
        }else{
            
            $query['registerNormal']=3500;
        }
        if(isset($request->api_locale)){
        $query['registerG']=$request->api_usage_gas;
        }else{
            
         $query['registerG']=25000;   
        }
        
        $query['first_residence']=1;
        $query['meterType']='single';
        $query['category']='pack';
       
       
        
        
          try {

        $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('http://apistaging.wx.agency/api/calculation', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTcxY2I0YWU4M2NlOWZmZjYyNjE5NWE2NjFhZmJlMjVlNjJhOTEwZDFhNjM2YzIwYmNkZmJiN2ViMjk4M2FhZTlmNzZhYWE5YmZkYTQzMDEiLCJpYXQiOjE2MTIzNDM0ODAsIm5iZiI6MTYxMjM0MzQ4MCwiZXhwIjoxNjQzODc5NDgwLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.VgGAKbnfbxKmsfpsNtztvigJksRFxhHjgMug0v_dipxZbHJFXlSr95yThwZL8YtkDYTkDUpsngRMCvXH8Gs4EiGzHkjnvdViZy3yBZHzHMxrG9Hj1gIpMgNCViBunJfbiKeQfyIgMXiCWGzynn4Z7ib-yQyAI7OF1FtzJfo5ZpZt5-T0XALC4b0nxofQm5nLxg-I9ToOrmMYi30-tzjgFLce1TEnwbLuUJfG27OU6JC4WuftrSN18RXBOeE_RZmHm72R5CFw8TZoFylGqViHN4Qm_Z0cBRf98Vm9mc6oAUmSMgWzBiCIJB2gYQZJwQDQ4Qqorq9XSFJ3wZa5C-Xwb7yOUcZEKMpjp9ymzdaodTcnrpr9zOHq9jUXLc2R6Z8PCdzB5q8UHaqvACXFlW0JKQPbvUU2-pTvCfRJBR1d_EiBw8kW6iFmClcnWww1VZlm1dOdJ0rkFp1Ho0E-mfBgMyXcxTAnH-mnHbXs-k_6FRrnZF6WSpEYaLDn18zMXizTQpqsjKpjwGGPcOngMGDV7BUeT_AVwseij9OEJNEWFES3dvI2vmExvt_y2bZ8PdSRi7_5tMIf8zqWjZfpe8RExdWBg9365wf2TO_1knduQJiStXNYNDU356n5ea13npPVU4JtxauqxVAMgA29aHIGE4NURshJZcv5lSeZQ8st3HE'],
                      'query' => $query 
                  ]);

       
        $response = $request->getBody()->getContents();       
        $json = json_decode($response, true);

          } catch (\Exception $e) {

            $response = ['status' => false, 'message' => $e->getMessage()];

            }
            
              $collection = collect($json['products']);
        
        // end-pro list
         
         
         
         $html="";
         
         foreach($supplier as $suppliers){
             $product_idE=StaticElecticResidential::where('product_id',$suppliers->product_idE)->first();
             $product_idG=StaticGasResidential::where('product_id',$suppliers->product_idG)->first();
             
              if($product_idE->service_level_payment=="Free" && $product_idE->service_level_invoicing=="Free" && $product_idE->service_level_contact=="Free"){
                 
                 $SAE="free";
             }else{
                 
                 $SAE="active";
             }
             
             
             
             
             if($SAE=="free"){
                 
                 $SAtext="Volwaardige dienstverlening";
             }else{
                 
                 $SAtext="Verplichte facturatie per email en uitsluitend elektronische communicatie";
                 
             }
             
             if($suppliers->durationE==0){
             $duration="Onbepaald";     
             }else{
                 
              $duration=$suppliers->durationE." "."jaar";   
             }
             
             if($suppliers->fixed_indiableE=='Ind'){
             $fixed_indiableE="Variabel";   
             }else{
                 
              $fixed_indiableE='Vast';   
             }
             
             if($product_idE->green_percentage=='100%'){
             $green_percentage="100% groene energie";   
             }else{
                 
              $green_percentage='0% groene energie';   
             }
             
            
             $proID=$suppliers->pack_id;
             $filter = $collection->filter(function($value, $key) use($proID) {
                    $satisfied = 0;
                    $total_condition = 0;
                     $total_condition++;
                    if ($value['product']['id']==$proID) {
                       
                                        
                            $satisfied ++;
                       
                    }
                    
                    
                    return $satisfied == $total_condition;
                });
        
                $getProducts= $filter->first();
                $disc=($getProducts['price']['totals']['year']['excl_promo']-$getProducts['price']['totals']['year']['incl_promo'])/100;
                
                if($getProducts['product']['service_level_payment']=="free" && $getProducts['product']['service_level_invoicing']=="free" && $getProducts['product']['service_level_contact']=="free" )
                {
                    
                     $text="Volwaardige dienstverlening";
                     $SA='true';
                   
                    
                }else{
                    
                    $text="Verplichte facturatie per email en uitsluitend elektronische communicatie";
                    $SA="false";
                    
                }
             
             
         $html.='<div class="col-md-12 col-lg-12 details"><div class="col-md-6 col-lg-5 detail-info">
         <h3>'.$suppliers->productE.' + Gas '.$suppliers->productG.'</h3>
         <ul><li>Duurtijd: '.$duration.'</li><li>'.$fixed_indiableE.' prijs</li><li>'.$green_percentage.'</li>
         <li>'.$text.'</li>';
         if($disc>0){
         $html.='<li><strong>korting van&nbsp;€'.number_format(($getProducts['price']['totals']['year']['excl_promo']-$getProducts['price']['totals']['year']['incl_promo'])/100,2,',', '.').'/jaar</strong>. Enkel geldig voor nieuwe klanten die zich <strong>via Tariefchecker</strong> registreren voor 30/'.date('m').'/'.date('Y').'</li>';
         }
         $html.='</ul>
         </div>
         <div class="col-md-6 col-lg-6 col-lg-offset-1">
         <h5>Voor wie is dit tarief?</h5>';
         if($SA=='false'){
         $html.='<p>Verlaagd tarief voor groene stroom + aardgas aan een '.$fixed_indiableE.' tarief gedurende '.$duration.' jaar met de verplichting facturen per email te ontvangen en enkel online contact op te nemen met '.$suppliers->supplierE.'.</p>';
         
         }else{
             
            $html.='<p>'.$fixed_indiableE.' tarief gedurende '.$duration.' jaar voor groene stroom van Belgische bodem + aardgas.</p>';  
         }
         $html.='<p><strong class="dark">Tariefkaarten:</strong> <a href="'.$product_idE->subscribe_url_NL.'">Elektriciteit</a> 
         <span class="gasvergelijken">/ <a href="'.$product_idG->subscribe_url_NL.'">Gas</a></span></p>
         <p><a href="'.$suppliers->URL_NL.'" target="_blank" class="red">Word klant</a> of <a href="http://www.tariefchecker.be">bereken jouw persoonlijk tarief</a></p>
         </div></div>';
         }
      
      
      echo $html;
      
         }
    }


    public function singleProduct(){



        //  if(isset($request->api_locale)){
        // $query['locale']=$locale=$request->api_locale;
        // }else{
          
        //   $query['locale']=$locale='nl';  
            
        // }
        // if(isset($request->api_postal_code)){
        // $query['postalCode']=$request->api_postal_code;
        // }else{
            
        //  $query['postalCode']=2000;
        // }
        // if(isset($request->api_locale)){
        // $query['customerGroup']=$request->api_comparison_type;
        // }else{
            
        //    $query['customerGroup']='professional';
        // }
        // if(isset($request->api_locale)){
        // $query['registerNormal']=$request->api_usage_single;
        // }else{
            
        //     $query['registerNormal']=3570;
        // }
        // if(isset($request->api_locale)){
        // $query['registerG']=$request->api_usage_gas;
        // }else{
            
        //  $query['registerG']=25000;   
        // }
        
        // $query['first_residence']=1;
        // $query['meterType']='single';
        // $query['category']='pack';
        // $query['wp_pack_id']='LUM-PRO-COMFY-1-DF';

        $query['locale']=$locale='nl';
        $query['uuid']='549d2lw7-x8v6-04yt-1lz7-ydai8rywp4nu';
        $query['postalCode']='2000';
        $query['customerGroup']='professional';
        $query['IncludeE']=1;
        $query['IncludeG']=1;
        $query['digitalMeter']=1;
        $query['capacity_decen_pro']=5;
        $query['meterType']='single_excl_night';
        $query['registerNormal']=3500;
        $query['registerExclNight']=10000;
        $query['registerG']=25000;
        $query['meterTypeInj']='single';
        $query['injectionNormal']=2;
        $query['injectionDay']=4;
        $query['injectionNight']=4;
        $query['wp_pack_id']='LUM-PRO-COMFY-1-DF';
       

       
       
        
        
          try {

        $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('http://apistaging.wx.agency/api/calculation', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTcxY2I0YWU4M2NlOWZmZjYyNjE5NWE2NjFhZmJlMjVlNjJhOTEwZDFhNjM2YzIwYmNkZmJiN2ViMjk4M2FhZTlmNzZhYWE5YmZkYTQzMDEiLCJpYXQiOjE2MTIzNDM0ODAsIm5iZiI6MTYxMjM0MzQ4MCwiZXhwIjoxNjQzODc5NDgwLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.VgGAKbnfbxKmsfpsNtztvigJksRFxhHjgMug0v_dipxZbHJFXlSr95yThwZL8YtkDYTkDUpsngRMCvXH8Gs4EiGzHkjnvdViZy3yBZHzHMxrG9Hj1gIpMgNCViBunJfbiKeQfyIgMXiCWGzynn4Z7ib-yQyAI7OF1FtzJfo5ZpZt5-T0XALC4b0nxofQm5nLxg-I9ToOrmMYi30-tzjgFLce1TEnwbLuUJfG27OU6JC4WuftrSN18RXBOeE_RZmHm72R5CFw8TZoFylGqViHN4Qm_Z0cBRf98Vm9mc6oAUmSMgWzBiCIJB2gYQZJwQDQ4Qqorq9XSFJ3wZa5C-Xwb7yOUcZEKMpjp9ymzdaodTcnrpr9zOHq9jUXLc2R6Z8PCdzB5q8UHaqvACXFlW0JKQPbvUU2-pTvCfRJBR1d_EiBw8kW6iFmClcnWww1VZlm1dOdJ0rkFp1Ho0E-mfBgMyXcxTAnH-mnHbXs-k_6FRrnZF6WSpEYaLDn18zMXizTQpqsjKpjwGGPcOngMGDV7BUeT_AVwseij9OEJNEWFES3dvI2vmExvt_y2bZ8PdSRi7_5tMIf8zqWjZfpe8RExdWBg9365wf2TO_1knduQJiStXNYNDU356n5ea13npPVU4JtxauqxVAMgA29aHIGE4NURshJZcv5lSeZQ8st3HE'],
                      'query' => $query 
                  ]);

       
        $response = $request->getBody()->getContents();       
        $response = json_decode($response, true);

          } catch (\Exception $e) {

            $response = ['status' => false, 'message' => $e->getMessage()];

            }
            

            
              // $collection = collect($json['products']);
        
        // end-pro list

            $html="";
            $html.='';

            if($response['products'][0]['product']['contract_duration']==0){

            	if($locale=='nl'){
            		$details['duration']="Onbepaalde duurtijd";
            	}else{
            		$details['duration']="Durée indéterminée";
            	}
            	
            }

            if($response['products'][0]['product']['contract_duration']==1){

            	if($locale=='nl'){
            		$details['duration']="1 Jaar";
            	}else{
            		$details['duration']="1 an";
            	}
            	
            }

            if($response['products'][0]['product']['contract_duration']==2){

            	if($locale=='nl'){
            		$details['duration']="2 Jaars";
            	}else{
            		$details['duration']="2 ans";
            	}
            	
            }

            if($response['products'][0]['product']['contract_duration']==3){

            	if($locale=='nl'){
            		$details['duration']="3 Jaars";
            	}else{
            		$details['duration']="3 ans";
            	}
            	
            }

            if($response['products'][0]['product']['contract_duration']==4){

            	if($locale=='nl'){
            		$details['duration']="4 Jaars";
            	}else{
            		$details['duration']="4 ans";
            	}
            	
            }

            if($response['products'][0]['product']['contract_duration']==123){

            	if($locale=='nl'){
            		$details['duration']="1, 2 of 3 jaars";
            	}else{
            		$details['duration']="1, 2 ou 3 ans";
            	}
            	
            }

            if($response['products'][0]['product']['contract_duration']==13){

            	if($locale=='nl'){
            		$details['duration']="1 of 3 jaars";
            	}else{
            		$details['duration']="1 ou 3 ans";
            	}
            	
            }

            if($response['products'][0]['product']['contract_duration']==13){

            	if($locale=='nl'){
            		$details['duration']="1 of 3 jaars";
            	}else{
            		$details['duration']="1 ou 3 ans";
            	}
            	
            }

            if($response['products'][0]['product']['underlying_products']['electricity']['pricing_type']!=$response['products'][0]['product']['underlying_products']['gas']['pricing_type']){

            	if($locale=='nl'){
            		$details['price_type']="Combinatie vast en variabel";
            	}else{
            		$details['price_type']="Combinaison fixe et variable";
            	}
            	
            }
            if($response['products'][0]['product']['underlying_products']['electricity']['pricing_type']=='fixed' && $response['products'][0]['product']['underlying_products']['gas']['pricing_type']=='fixed'){

            	if($locale=='nl'){
            		$details['price_type']="Vast tarief";
            	}else{
            		$details['price_type']="Fix tarief";
            	}
            	
            }else{


            	if($locale=='nl'){
            		$details['price_type']="Variabel tarief";
            	}else{
            		$details['price_type']="Variable tarief";
            	}

            }

            if($response['products'][0]['product']['origin']=='BE'){

            		$details['be_flag']='<img src="https://whitelable.wx.agency/images/bel-flag.png" >';
            }else{

            	$details['be_flag']=null;
            }

			if($response['products'][0]['product']['origin']=='BE'){

            		$details['be_flag']='<img src="https://whitelable.wx.agency/images/bel-flag.png" >';
            }else{

            	$details['be_flag']=null;
            }
            $details['green_percentage']=$response['products'][0]['product']['green_percentage'];
            $details['description']=$response['products'][0]['product']['description'];
            $details['validity']=$response['products'][0]['price']['validity_period']['end'];
            
            if($locale=='nl'){
            		$details['green']="groen";
            		
            	}else{
            		$details['green']="vert";
            		
            }

            if($response['products'][0]['parameters']['values']['customer_group']=='professional'){

            	if($locale=='nl'){
            		$details['customer_type']= 'Professionelen';
            		
            	}else{
            		$details['customer_type']= 'Professionels';
            		
                }
            	
            }else{

            	if($locale=='nl'){
            		$details['customer_type']= 'Particulieren';
            		
            	}else{
            		$details['customer_type']= 'Résidentiels';
            		
                }


            }

            $details['region']= $response['products'][0]['parameters']['values']['region'];

            if($response['products'][0]['product']['underlying_products']['electricity']['customer_condition']=='CH'){

            	if($locale=='nl'){
            		$details['customer_condition']= 'Dit contract is enkel voor eigenaars van een specifieke gasketelinstallatie.&nbsp;';
            		
            	}else{
            		$details['customer_condition']= "Ce contract est uniquement pour les propriétaires d'une chaudière à gaz de type spécifique.";
            		
                }


            }elseif($response['products'][0]['product']['underlying_products']['electricity']['customer_condition']=='PV'){

            	if($locale=='nl'){
            		$details['customer_condition']= 'Dit contract is enkel voor eigenaars van photovoltaïsche zonnepanelen.';
            		
            	}else{
            		$details['customer_condition']= "Ce contract est uniquement pour les propriétaires de paneaux solaires photo-voltaïques.";
            		
                }

            }elseif($response['products'][0]['product']['underlying_products']['electricity']['customer_condition']=='EV'){

            	if($locale=='nl'){
            		$details['customer_condition']= 'Dit contract is enkel voor eigenaars van een elektrische wagen.';
            		
            	}else{
            		$details['customer_condition']= "Ce contract est uniquement pour les propriétaires d'une voiture électrique.";
            		
                }

            }elseif($response['products'][0]['product']['underlying_products']['electricity']['customer_condition']=='DM'){

            	if($locale=='nl'){
            		$details['customer_condition']= 'Dit tarief is enkel beschikbaar voor digitale meters.';
            		
            	}else{
            		$details['customer_condition']= "Ce tarif est uniquement disponible pour des compteurs digitaux.";
            		
                }

            }elseif($response['products'][0]['product']['underlying_products']['electricity']['customer_condition']=='Comp'){

            	if($locale=='nl'){
            		$details['customer_condition']= 'Dit tarief is enkel beschikbaar via online vergelijkers.';
            		
            	}else{
            		$details['customer_condition']= "Ce tarif est uniquement disponible via les comparateurs d'énergie.";
            		
                }

            }elseif($response['products'][0]['product']['underlying_products']['electricity']['customer_condition']=='None'){

            	if($locale=='nl'){
            		$details['customer_condition']= 'Tarief met groene energie aan variabele prijs gedurende {duration}, met extra korting als u alle facturen tijdig per domiciliëring betaalt. Speciaal aanbod dat enkel beschikbaar is via vergelijkingssites zoals Tariefchecker.be';
            		
            	}else{
            		$details['customer_condition']= "Tarif variable d'un an pour de l'électricité 100% verte. Si vous payer toutes vos factures à temps via domiciliation, vous recevez une réduction supplémentaire. Offre spéciale, uniquement disponible via les sites de comparaison comme Veriftarif.be";
            		
                }

            }

            if($response['products'][0]['parameters']['values']['digital_meter']==1){

            	if($locale=='nl'){
            		$details['injection']= '<li><i class="fa fa-check" aria-hidden="true"></i> Injection</li>';
            		
            	}else{
            		$details['injection']= '<li><i class="fa fa-check" aria-hidden="true"></i> Injection</li>';
            		
                }


            }
            $details['logo']='<img src="'.$response['products'][0]['supplier']['logo'].'" alt="supplier-logo">';

            $details['totalG']=number_format(($response['products'][0]['price']['breakdown']['gas']['taxes']['tax']+$response['products'][0]['price']['breakdown']['gas']['distribution_and_transport']['transport']+$response['products'][0]['price']['breakdown']['gas']['distribution_and_transport']['distribution']+$response['products'][0]['price']['breakdown']['gas']['energy_cost']['usage']+$response['products'][0]['price']['breakdown']['gas']['energy_cost']['fixed_fee'])/100,2,',', '.');


            if($response['products'][0]['price']['totals']['year']['incl_promo']==$response['products'][0]['price']['totals']['year']['excl_promo'])
            {

            	$incl_promo=number_format(($response['products'][0]['price']['totals']['year']['incl_promo']/100),2,',', '.');
            	$sp_pricea=preg_split("/,/",$incl_promo);

            	$details['price_button']='<ul class="price-list">
                            <li>
                                <p class="years">All-in prijs/jaar</p>
                            </li>
                            <li>
                                <p class="   euro years "><b>€  '.$sp_pricea[0].'</b><sup>,'.$sp_pricea[1].'</sup></p><p class=" red  euro month" style="display:none;"><b>€ 122</b><sup>,00</sup></p>
                            </li>
                            
                        </ul>
                        <div class="select-btn">
                            <button>SELECTERN</button>  
                      </div>';



            }else{

            	$incl_promo=number_format(($response['products'][0]['price']['totals']['year']['incl_promo']/100),2,',', '.');
            	$excl_promo=number_format(($response['products'][0]['price']['totals']['year']['excl_promo']/100),2,',', '.');

            	$sp_pricea_in=preg_split("/,/",$incl_promo);
            	$sp_pricea_ex=preg_split("/,/",$excl_promo);

            	$details['price_button']='<ul class="price-list">
                            <li>
                                <p class=" red  years">All-in prijs/jaar</p>
                            </li>
                            <li>
                                <p class=" red  euro years "><b>€ '.$sp_pricea_in[0].'</b><sup>,'.$sp_pricea_in[1].'</sup></p><p class=" red  euro month" style="display:none;"><b>€ 122</b><sup>,00</sup></p>
                            </li>
                            <li class="promo">
                                <p class="strike years"> <strike><b> € '.$sp_pricea_ex[0].'</b><sup>,'.$sp_pricea_ex[1].'</sup></strike></p>
                            </li>
                        </ul>
                        <div class="select-btn">
                            <button>SELECTERN</button>  
                      </div>';


            }

            if($locale=='nl'){

            		if($response['products'][0]['parameters']['values']['meter_type']=='single')
            		{

            			$details['meter']= 'Enkelvoudig';
            			

            		}elseif($response['products'][0]['parameters']['values']['meter_type']=='double'){

            			$details['meter']= 'Dubbelvoudig';


            		}elseif($response['products'][0]['parameters']['values']['meter_type']=='single_excl_night'){

            			$details['meter']= 'Enkelvoudig + excl. nacht';

            		}elseif($response['products'][0]['parameters']['values']['meter_type']=='double_excl_night'){

            			$details['meter']= 'Dubbelvoudig + excl. nacht';

            		}


            		$details['comparison_details']=''.(int)$response['products'][0]['parameters']['values']['usage_single']+(int)$response['products'][0]['parameters']['values']['usage_day']+(int)$response['products'][0]['parameters']['values']['usage_night']+(int)$response['products'][0]['parameters']['values']['usage_excl_night'].' kWh elektriciteit, '.$response['products'][0]['parameters']['values']['usage_gas'].' kWh gas, postcode '.$response['products'][0]['parameters']['values']['postal_code'].',';
            		
            		
            		
            	}else{

            		if($response['products'][0]['parameters']['values']['meter_type']=='single')
            		{

            			$details['meter']= 'Conso simple';

            		}elseif($response['products'][0]['parameters']['values']['meter_type']=='double'){

            			$details['meter']= 'Conso jour/nuit';

            		}elseif($response['products'][0]['parameters']['values']['meter_type']=='single_excl_night'){

            			$details['meter']= 'Conso simple + excl nuit';

            		}elseif($response['products'][0]['parameters']['values']['meter_type']=='double_excl_night'){

            			$details['meter']= 'Conso jour/nuit + excl nuit';

            		}

            		$details['comparison_details']=''.$response['products'][0]['parameters']['values']['usage_single']+$response['products'][0]['parameters']['values']['usage_day']+$response['products'][0]['parameters']['values']['usage_night']+$response['products'][0]['parameters']['values']['usage_excl_night'].' kWh Electricité, '.$response['products'][0]['parameters']['values']['usage_gas'].' kWh gaz, Code postal '.$response['products'][0]['parameters']['values']['postal_code'].',';
            		
            }




            		$details['right_side']='<h3>'.$response['products'][0]['supplier']['name'].' '.$response['products'][0]['product']['name'].'</h3> 
							               <img src="'.$response['products'][0]['supplier']['logo'].'" alt="supplier-logo">
							               <div class="select-btn">
							                <button>SELECTERN</button>  
							              </div>
							              <div class="select-btn start-btn">
							                <button>START VERGELIJKING</button>  
							              </div>';


            

            $discount="";
            
            $discountE=0; $discountG=0; 
			if(!empty($response['products'][0]['price']['breakdown']['discounts'])){
				
			        foreach ($response['products'][0]['price']['breakdown']['discounts'] as $value) {
			        	if($value['parameters']['fuel_type']=='electricity'){

			        		$discountE=$discountE+$value['amount'];

			        	}else{

			        		$discountG=$discountG+$value['amount'];
			        	}
			        	
			        	$discount.='<li><i class="fa fa-check" aria-hidden="true"></i>'.$value['name'].' – '.$value['amount'].' '.$value['parameters']['unit'].'  '.$value['parameters']['fuel_type'].'</li>';

			        }
			}

			$details['fixed_fee']=number_format($response['products'][0]['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100,2,',', '.');
			$details['consumption']=number_format($response['products'][0]['price']['breakdown']['electricity']['energy_cost']['single']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['day']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['night']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['excl_night']/100,2,',', '.');
			$details['cretificate']=number_format($response['products'][0]['price']['breakdown']['electricity']['energy_cost']['certificates']/100,2,',', '.');

			$details['discount_amount']=number_format(($discountE),2,',', '.');

			$details['distribution']=number_format($response['products'][0]['price']['breakdown']['electricity']['distribution_and_transport']['distribution']/100,2,',', '.');

			$details['transport']=number_format($response['products'][0]['price']['breakdown']['electricity']['distribution_and_transport']['transport']/100,2,',', '.');
			$details['tax']=number_format($response['products'][0]['price']['breakdown']['electricity']['taxes']['tax']/100,2,',', '.');
			$inj=0;
			$details['total_elec']=number_format($response['products'][0]['price']['breakdown']['electricity']['taxes']['tax']/100+$response['products'][0]['price']['breakdown']['electricity']['distribution_and_transport']['transport']/100+$response['products'][0]['price']['breakdown']['electricity']['distribution_and_transport']['distribution']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['certificates']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['single']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['day']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['night']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['excl_night']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100+$inj/100,2,',', '.');


			if($response['products'][0]['parameters']['values']['digital_meter']==1){

					$details['inj_text']='<li>Vaste vergoeding Inj</li>
                              <li>Injectie</li>';
			}else{


				   $details['inj_text']='';


			}

			if($response['products'][0]['parameters']['values']['digital_meter']==1){

					$details['inj_val']='<li>€ '.number_format($response['products'][0]['price']['breakdown']['electricity']['energy_cost']['fixed_fee_inj']/100,2,',', '.').'</li>
					<li>€ '.number_format($response['products'][0]['price']['breakdown']['electricity']['energy_cost']['injection']/100,2,',', '.').'</li>';
			}else{


				   $details['inj_val']='';


			}

			$details['fixed_fee_gas']=number_format($response['products'][0]['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100,2,',', '.');
			$details['consumption_gas']=number_format($response['products'][0]['price']['breakdown']['gas']['energy_cost']['usage']/100,2,',', '.');
			$details['discountG']=number_format(($discountG),2,',', '.');
			$details['distributionG']=number_format($response['products'][0]['price']['breakdown']['gas']['distribution_and_transport']['distribution']/100,2,',', '.');
			$details['transportG']=number_format($response['products'][0]['price']['breakdown']['gas']['distribution_and_transport']['transport']/100,2,',', '.');
			$details['taxG']=number_format($response['products'][0]['price']['breakdown']['gas']['taxes']['tax']/100,2,',', '.');
			
			$details['totalE_G']=number_format(($response['products'][0]['price']['totals']['year']['excl_promo']/100),2,',', '.');
			$details['totalDiscount']=number_format(($discountG+$discountE),2,',', '.');
			$details['totalIncPromo']=number_format(($response['products'][0]['price']['totals']['year']['incl_promo']/100),2,',', '.');

			$totalElecConsumption=(int)$response['products'][0]['parameters']['values']['usage_single']+(int)$response['products'][0]['parameters']['values']['usage_day']+(int)$response['products'][0]['parameters']['values']['usage_night']+(int)$response['products'][0]['parameters']['values']['usage_excl_night'];
			$details['unitCostE']=number_format(((($response['products'][0]['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($response['products'][0]['price']['breakdown']['electricity']['energy_cost']['single']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['day']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['night']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['excl_night']/100)+($response['products'][0]['price']['breakdown']['electricity']['energy_cost']['certificates']/100)+$inj/100)/$totalElecConsumption)*100,2,',', '.');
			$totalgas=(int)$response['products'][0]['parameters']['values']['usage_gas'];
			$details['unitCostG']=number_format(((($response['products'][0]['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($response['products'][0]['price']['breakdown']['gas']['energy_cost']['usage']/100))/$totalgas)*100,2,',', '.');

			if($response['products'][0]['parameters']['values']['digital_meter']==0){

			 if($locale=='nl'){
				$details['documents']='<ul>
			             <li><a href="'.$response['products'][0]['product']['underlying_products']['electricity']['terms_url_dynamic'].'" target="_block"><img src="https://energievergelijker.tariefchecker.be/images/pdf-image.png">&nbsp; Tariefkaart Elektriciteit</a></li>
			             <li><a href="'.$response['products'][0]['product']['underlying_products']['gas']['terms_url_dynamic'].'" target="_block"><img src="https://energievergelijker.tariefchecker.be/images/pdf-image.png">&nbsp; Tariefkaart Gas</a></li>
			             </ul>';
			    }else{


			    	$details['documents']='<ul>
			             <li><a href="'.$response['products'][0]['product']['underlying_products']['electricity']['terms_url_dynamic'].'" target="_block"><img src="https://energievergelijker.tariefchecker.be/images/pdf-image.png">&nbsp; Tariefkaart Elektriciteit</a></li>
			             <li><a href="'.$response['products'][0]['product']['underlying_products']['gas']['terms_url_dynamic'].'" target="_block"><img src="https://energievergelijker.tariefchecker.be/images/pdf-image.png">&nbsp; Tariefkaart Gas</a></li>
			             </ul>';



			    }
			}else{

				 if($locale=='nl'){
			$details['documents']='<ul>
			             <li><a href="'.$response['products'][0]['product']['underlying_products']['electricity']['terms_url_dynamic'].'" target="_block"><img src="https://energievergelijker.tariefchecker.be/images/pdf-image.png">&nbsp; Tariefkaart Elektriciteit</a></li>
			             <li><a href="'.$response['products'][0]['product']['underlying_products']['gas']['terms_url_dynamic'].'" target="_block"><img src="https://energievergelijker.tariefchecker.be/images/pdf-image.png">&nbsp; Tariefkaart Gas</a></li>
			             <li><a href="'.$response['products'][0]['product']['underlying_products']['electricity']['terms_url_dynamic_inj'].'" target="_block"><img src="https://energievergelijker.tariefchecker.be/images/pdf-image.png">&nbsp Tariefkaart Injectie</a></li>
			             </ul>
			             ';


			         }else{

			$details['documents']='<ul>
			             <li><a href="'.$response['products'][0]['product']['underlying_products']['electricity']['terms_url_dynamic'].'" target="_block"><img src="https://energievergelijker.tariefchecker.be/images/pdf-image.png">&nbsp; Tariefkaart Elektriciteit</a></li>
			             <li><a href="'.$response['products'][0]['product']['underlying_products']['gas']['terms_url_dynamic'].'" target="_block"><img src="https://energievergelijker.tariefchecker.be/images/pdf-image.png">&nbsp; Tariefkaart Gas</a></li>
			             <li><a href="'.$response['products'][0]['product']['underlying_products']['electricity']['terms_url_dynamic_inj'].'" target="_block"><img src="https://energievergelijker.tariefchecker.be/images/pdf-image.png">&nbsp Carte Tarifaire Injection</a></li>
			             </ul>
			             ';



			         }


			}


			// price text

			if($locale=='nl'){

				$string = 'Deze prijzen zijn enkel geldig voor {X5} klanten die een nieuw leveringscontract aangaan voor {X2} {X3}.';
				$string1 = 'Kunnen een andere geldigheidsperiode en specifieke voorwaarden hebben. Alle prijzen zijn {X6}.';

			}else{

				$string = 'Ces prix sont uniquement pour les clients {X5} qui signent un nouveau contrat de fourniture avant {X2} {X3}.';
				$string1 = 'Kunnen een andere geldigheidsperiode en specifieke voorwaarden hebben. Alle prijzen zijn {X6}.';

			}

			
            $replace = ['{X5}','{X2}','{X3}'];
            
            $replace1 = ['{X6}'];

            $time=strtotime($response['products'][0]['price']['validity_period']['end']);
            $date = new DateTime('now');
            $modifiedDate=$date->modify('last day of this month');
            $month=$date->format('d/m/Y');

            $year=date("Y",$time);
            $x1=trans('home.Electricity');
            $customer_type=$response['products'][0]['parameters']['values']['customer_group'];
            $x2="";
           
            if($month=='january'){
            $x2=trans("home.1");
            }
            if($month=='february'){
            $x2=trans("home.2");
            }
            if($month=='march'){
            $x2=trans("home.3");
            }
            if($month=='april'){
            $x2=trans("home.4");
            }
            if($month=='may'){
            $x2=trans("home.5");
            }
            if($month=='june'){
            $x2=trans("home.6");
            }
            if($month=='july'){
            $x2=trans("home.7");
            }
            if($month=='august'){
            $x2=trans("home.8");
            }
            if($month=='september'){
            $x2=trans("home.9");
            }
            if($month=='october'){
            $x2=trans("home.10");
            }
            if($month=='november'){
            $x2=trans("home.11");
            }
            if($month=='december'){
            $x2=trans("home.12");
            }
           

            if($customer_type=='residential'){
            $x5=trans('home.x5_res');
            $x6=trans('home.x6_res');
            }
            if($customer_type=='professional'){
            $x5=trans('home.x5_pro');
            $x6=trans('home.x6_pro');
            }
            $info = [
            'X5' => $x5,
            'X2'  => $x2,
            'X3'   => $month,

            ];
            $info1 = [
            'X6'      => $x6,
            ];

            $details['price_text']='<p>'.str_replace($replace, $info, $string).' <a href="" class="disctab-active" onclick="">'. ucfirst(trans('home.Discounts')).'</a> '.str_replace($replace1, $info1, $string1).'</p> <br>';

            
			// price text end

			// discount text

            if($locale=='nl'){
            	$string = 'Stap over naar {SUPPLIER} - {PRODUCT} met Tariefchecker voor <b>{VALIDITYDATE}</b> en verzeker je van volgende kortingen:';

            }else{

            	$string = 'Choisissez {SUPPLIER} - {PRODUCT} avant le <b>{VALIDITYDATE}</b> avec Veriftarif et assurez vous des réductions ci-dessous:';
            }
            
                $replace = ['{SUPPLIER}','{PRODUCT}','{VALIDITYDATE}'];
                $info = [
                'SUPPLIER' => $response['products'][0]['supplier']['name'],
                'PRODUCT' => $response['products'][0]['product']['name'],
                'VALIDITYDATE'=>"",

                ];
            
            $details['discount_text']= str_replace($replace, $info, $string);


             $filtered = collect($response['products'][0]['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                        $s++;
                        }
                        return $s;
                        });

            $filteredE=$filtered->all();

            		$filtered = collect($response['products'][0]['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                        $s++;
                        }
                        return $s;
                        });

            $filteredG=$filtered->all();

            		$filtered = collect($response['products'][0]['price']['breakdown']['discounts'])->filter(function ($value, $key) {
					$s=0;
					if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
					$s++;
					}
					return $s;
					});

			$filteredAll=$filtered->all();

			 $filtered = collect($response['products'][0]['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['discount_type']=='servicelevel'){
                        $s++;
                        }
                        return $s;
                        });

            $filteredS=$filtered->all();

            $filtered = collect($response['products'][0]['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['discount_type']=='loyalty'){
                        $s++;
                        }
                        return $s;
                        });

             $filteredL=$filtered->all();
            
           

                  
                    
                $view = view('wp.wp-product-discount',compact('filteredE','filteredG','filteredAll','filteredS','filteredL','response','locale'));
                $details['discount_list']=$view->render();

                $view = view('wp.wp-product-description',compact('filteredE','filteredG','filteredAll','filteredS','filteredL','response','locale'));
                $details['discount_description']=$view->render();

                $view = view('wp.wp-product-details',compact('response','locale'));
                $details['product_details']=$view->render();
             

			// discount text end

            $data['discount']=$discount;
			$data['supplier']=$response['products'][0]['supplier'];
            $data['product']=$response['products'][0]['product'];
            $data['details']=$details;

            return $data;





    }
    
    
}

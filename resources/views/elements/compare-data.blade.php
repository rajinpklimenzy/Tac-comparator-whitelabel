<?php
    /*Just for your server-side code*/
    //header('Content-Type: text/html; charset=ISO-8859-1');
    header('Content-Type:text/html; charset=UTF-8');
?>
<div class="compare-sec-1">
			<div class="container">
				<div class="row">
					<div class="col-md-3 sec-part-1">
						<a href="#" class="back-2"><i class="fa fa-arrow-left"></i> @lang('home.Back_to_plans')</a>
						<h5>@lang('home.Compare_your')</h5>
					</div>         
                    @php
                    $si="0"; @endphp   
                    @foreach ($res as $logo)
                    @php $si++;  
                    @endphp        
					<div class="col-md-3 sec-part-2">
						<div class="selected">
							<div class="row">
								<div class="col-md-6">
									<img src="{{$logo['supplier']['logo']}}">
								</div>
								<div class="col-md-6 close-sec">
									@if(count($res)!=1)<i data-id="{{$logo['product']['id']}}" class="fa fa-times-circle delete-com"></i>@endif
								</div>
							</div>
							<p>{{$logo['supplier']['name']}} - {{$logo['product']['name']}}</p>
                                                        
                                        <form action="{{url('bevestiging')}}" method="get">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pri_save" class="pri_save{{$si}}">
                                        <input type="hidden" name="pro_id"  value="{{$logo['product']['id']}}">
                                        <input type="hidden" name="supplier"  value="{{$logo['supplier']['name']}}">
                                        <input type="hidden" name="product"  value="{{$logo['product']['name']}}">
                                         <input type="hidden" name="pro_type"  value="{{$logo['parameters']['values']['comparison_type']}}">
                                        <input type="hidden" name="type"  value="{{Session::get('customer_type')}}">
                                        <input type="hidden" name="postalcode"  value="{{Session::get('postal_code')}}">
                                        <input type="hidden" name="elect_day" id="" @if (isset($usage_elec_day)) value="{{$usage_elec_day}}" @endif>
                                        <input type="hidden" name="elect_night" @if (isset($usage_elec_night)) value="{{$usage_elec_night}}" @endif >
                                        <input type="hidden" name="gas_cons" @if (isset($usage_gas)) value="{{$usage_gas}}" @endif>
                                        
                                        <input type="hidden" name="sub_url"  value="{{$logo['product']['subscribe_url']}}">
                                       
                                        <input type="hidden" name="from" value="pack" >
                                        <input type="hidden" name="pr_type" id="pr_type" value="">
					                    <button id="choose{{$logo['product']['id']}}" data-id="{{$logo['product']['id']}}" type="submit" class="choose1">@lang('home.To_Request')</button>
                                        </form>
                                        </div>
					</div>
                                        @endforeach
                                    
					
					
				</div>
			</div>
		</div>

		<!-- Contract Details -->


		<div class="com-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2>@lang('home.Contract_Details')</h2>
					</div>
				</div>
                            
				<div class="row duration-sec">
                                    
					<div class="col-md-3 col-3">
						<h5>@lang('home.Duration')</h5>
					</div>
                                    
					@foreach ($res as $duration)
					
					<div class="col-md-3 col-3">
						<p class="duration-p2">
						    @if(Session::get('locale')=='nl') 
                                @if($duration['product']['contract_duration']=='123') @lang('home.123year')@elseif($duration['product']['contract_duration']=='13') @lang('home.13year')@elseif($duration['product']['contract_duration']=='0') @lang('home.Undetermined')@else {{$duration['product']['contract_duration']}} @lang('home.Year')@endif
                            @else
                                @if($duration['product']['contract_duration']=='123') @lang('home.123year')@elseif($duration['product']['contract_duration']=='13') @lang('home.13year')@elseif($duration['product']['contract_duration']=='0') @lang('home.Undetermined')@else {{$duration['product']['contract_duration']}} @lang('home.Year')@endif
                            @endif 
						</p>
					</div>
                                        
                                        @endforeach
                                    
                                    
				</div>   
                               
                                <div class="row">
	@if($duration['product']['type']=='pack')
          </div>
		<div class="com-price">
			<h5>@lang('home.price_type')</h5>
			<div class="row">
				<div class="col-md-3 col-3">
					<ul>
						<li>@lang('home.Electricity')</li>
						<li>@lang('home.Gas')</li>
						<li>@lang('home.Source_Power')</li>
					</ul>
				</div>

        @endif
        
          @if($duration['product']['type']!='pack')
        </div>
		<div class="com-price">
			<h5>@lang('home.Price_type')</h5>
			<div class="row">
				<div class="col-md-3 col-3">
					<ul>
						<li>{{$duration['product']['pricing_type']}}</li>
					@if($duration['product']['type'] =='electricity')	
						<li>@lang('home.Source_Power')</li>
					@endif
					</ul>
				</div>
        @endif                           
                                            
	@foreach ($res as $pricing_type) 
            
            @if($pricing_type['product']['type']=='pack')
            
           <div class="col-md-3 col-3">
	    <ul>
                <li>@if($pricing_type['product']['underlying_products']['electricity']['pricing_type']== 'variable') @lang('home.variable') @else @lang('home.fixed') @endif</li>
                <li>@if($pricing_type['product']['underlying_products']['gas']['pricing_type']=='variable') @lang('home.variable') @else  @lang('home.fixed') @endif</li>
                <li>
            @if ($pricing_type['product']['green_percentage'] > '0' && $pricing_type['product']['origin'] == 'BE')
                <img src="/images/bel-flag.png">{{$pricing_type['product']['green_percentage']}} % @lang('home.green_from_Belgium')
           @else

                {{$pricing_type['product']['green_percentage']}} % @lang('home.green')
           @endif
                </li>                       
            </ul>
           </div>
        @endif
        
        @if($pricing_type['product']['type']!='pack' && $pricing_type['product']['type']=='electricity')
            
           <div class="col-md-3 col-3">
					<ul>
						<li>@if($pricing_type['product']['pricing_type'] == 'variable') @lang('home.variable') @else @lang('home.fixed') @endif</li>
						<li>
            @if ($pricing_type['product']['green_percentage'] > '0' && $pricing_type['product']['origin'] == 'BE')
                <img src="/images/bel-flag.png">{{$pricing_type['product']['green_percentage']}} % @lang('home.green_from_Belgium')
           @else

                {{$pricing_type['product']['green_percentage']}} % @lang('home.green')
           @endif

            </li>                       
					</ul>
				        </div>
       @endif
       
       @if($pricing_type['product']['type']!='pack' && $pricing_type['product']['type']=='gas')
            
            <div class="col-md-3 col-3">
            <ul>
            <li>@if($pricing_type['product']['pricing_type'] == 'variable') @lang('home.variable') @else @lang('home.fixed') @endif</li>

            </ul>
            </div>
       @endif
       @endforeach                          
						
					</div>
				</div>


                <div class="contactor-detail">
                	<div class="row">
                		<div class="col-md-3 col-3">
                			<h5>@lang('home.Who_is_this')    </h5>
                		</div>
                                            
                                            @foreach ($res as $cont_for)
                                            
                		<div class="col-md-3 col-3">
                                  @if(Session::get('customer_type') == 'residential') 
                                                    
                @php                                               
                if(Session::get('locale')=='fr'){
                $string=$feature[2]['FR_description'];
                }else{
                $string=$feature[2]['NL_description'];
                }

                $replace = ['{duration}'];
                $duration=$cont_for['price']['validity_period']['end'];
                $info = [
                'duration' => $duration,
                ];

                @endphp
                                                          
                    <p>@lang('home.This_contract_residential_users_only') @lang('home.residential')</p>
                    <p>{{$cont_for['product']['tariff_description']}}</p>
                    @else
                    <p>@if(Session::get('locale')=='fr'){{$feature[3]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[3]['NL_description']}} @endif</p>
                    @endif
                    <div class="contract-style">
                    @if($cont_for['product']['customer_condition']=='EV' ) 
                    <p>@if(Session::get('locale')=='fr'){{$feature[5]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[5]['NL_description']}} @endif</p>
                    @elseif($cont_for['product']['customer_condition']=='PV' )
                    <p>@if(Session::get('locale')=='fr'){{$feature[6]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[6]['NL_description']}} @endif</p>
                    @elseif($cont_for['product']['customer_condition']=='CH' )
                    <p>@if(Session::get('locale')=='fr'){{$feature[7]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[7]['NL_description']}} @endif</p>
                    @elseif($cont_for['product']['customer_condition']=='COMP' )
                    <p>@if(Session::get('locale')=='fr'){{$feature[8]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[8]['NL_description']}} @endif</p>
                    @else
                    <p></p>
                    @endif
                    </div>
                	</div>
                                            
                    @endforeach
                		
                		
                	</div>
                </div>
				<div class="particular-sec">
					<div class="row">
						<div class="col-md-3 col-3">
							<h5>@lang('home.Particular_Conditions')</h5>
						</div>
                                            @foreach ($res as $par_cond)  
						                            <div class="col-md-3 col-3 under-sec">
						               
                                                
                                                    @if($par_cond['product']['ff_pro_rata'] == 'Y')
                                                    <p>
                                                       @if(Session::get('locale')=='fr')
                                                            {{$feature[0]['FR_description']}} 
                                                            <a class="parti-a" href="https://www.veriftarif.be/faq-foire-aux-questions/les-particuliers-et-petits-consommateurs-professionnels-ne-paieront-plus-de-frais-de-resiliation-de-leurs-contrats-d-energie" target="_blank">FAQ</a>
                                                        @else 
                                                            {{$feature[0]['NL_description']}}
                                                            <a class="parti-a" href="https://www.tariefchecker.be/faq/geen-verbrekingsvergoedingen-meer-voor-particulieren-en-kmo-s" target="_blank">FAQ</a>
                                                        @endif
                                                    </p>
                                                    @else
                                                    <p>
                                                       @if(Session::get('locale')=='fr')
                                                            {{$feature[1]['FR_description']}} 
                                                            <a class="parti-a" href="https://www.veriftarif.be/faq-foire-aux-questions/les-particuliers-et-petits-consommateurs-professionnels-ne-paieront-plus-de-frais-de-resiliation-de-leurs-contrats-d-energie" target="_blank">FAQ</a>
                                                        @else 
                                                            {{$feature[1]['NL_description']}} 
                                                            <a class="parti-a" href="https://www.tariefchecker.be/faq/geen-verbrekingsvergoedingen-meer-voor-particulieren-en-kmo-s" target="_blank">FAQ</a>
                                                        @endif 
                                                    </p>
                                                    @endif
                                                    
						 </div> 
                                            @endforeach
						
						
					</div>
					
				</div>


				<div class="service-sec">
					<div class="row">
						<div class="col-md-3 col-3">
							<h5>@lang('home.Service_limitations')</h5>
						</div>
                                            
                                             @foreach ($res as $ser_limit)
						<div class="col-md-3 col-3">
				        	@if($ser_limit['product']['service_level_payment'] == 'free' && $ser_limit['product']['service_level_invoicing'] == 'free' && $ser_limit['product']['service_level_contact'] == 'free')
                                           <p>@if(Session::get('locale')=='fr'){{$service[0]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[0]['NL_description']}}@endif </p>
                                           @elseif($ser_limit['product']['service_level_payment'] == 'domi' && $ser_limit['product']['service_level_invoicing'] == 'free' && $ser_limit['product']['service_level_contact'] == 'free')
                                           <p>@if(Session::get('locale')=='fr'){{$service[1]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[1]['NL_description']}} @endif</p>
                                           @elseif($ser_limit['product']['service_level_payment'] == 'prepaid')
                                           <p>@if(Session::get('locale')=='fr'){{$service[2]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[2]['NL_description']}} @endif</p>
                                           @elseif($ser_limit['product']['service_level_payment'] == 'free' && $ser_limit['product']['service_level_invoicing'] == 'email' && $ser_limit['product']['service_level_contact'] == 'free')
                                           <p>@if(Session::get('locale')=='fr'){{$service[3]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[3]['NL_description']}} @endif</p>
                                           @elseif($ser_limit['product']['service_level_payment'] == 'domi' && $ser_limit['product']['service_level_invoicing'] == 'email' && $ser_limit['product']['service_level_contact'] == 'free')
                                           <p>@if(Session::get('locale')=='fr'){{$service[4]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[4]['NL_description']}}@endif</p>
                                           @elseif($ser_limit['product']['service_level_payment'] == 'free' && $ser_limit['product']['service_level_invoicing'] == 'free' && $ser_limit['product']['service_level_contact'] == 'online')
                                           <p>@if(Session::get('locale')=='fr'){{$service[5]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[5]['NL_description']}}@endif</p>
                                           @elseif($ser_limit['product']['service_level_payment'] == 'domi' && $ser_limit['product']['service_level_invoicing'] == 'free' && $ser_limit['product']['service_level_contact'] == 'online')
                                           <p>@if(Session::get('locale')=='fr'){{$service[6]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[6]['NL_description']}}@endif</p>
                                           @elseif($ser_limit['product']['service_level_payment'] == 'free' && $ser_limit['product']['service_level_invoicing'] == 'email' && $ser_limit['product']['service_level_contact'] == 'online')
                                           <p>@if(Session::get('locale')=='fr'){{$service[7]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[7]['NL_description']}}@endif</p>
                                           @else($ser_limit['product']['service_level_payment'] == 'domi' && $ser_limit['product']['service_level_invoicing'] == 'email' && $ser_limit['product']['service_level_contact'] == 'online')
                                           <p>@if(Session::get('locale')=='fr'){{$service[8]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[8]['NL_description']}}@endif</p>

                            @endif
						</div>                                            
                                             @endforeach
						
					</div>
				</div>



				<div class="document-sec">
					<div class="row">
						<div class="col-md-3 col-3">
							<h5>@lang('home.Documents')</h5>
						</div>
                                            
                                             @foreach ($res as $pdf)
						<div class="col-md-3 col-3">
						<ul>
                                                        @if($pdf['product']['type']=='pack') 
                                                            <li><a href="{{$pdf['product']['underlying_products']['electricity']['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Electricity')</a></li>
                                                            <li><a href="{{$pdf['product']['underlying_products']['gas']['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Gas')</a></li>
                                                            <li><a href="{{$pdf['product']['terms_url']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_General_conditions')</a></li>
                                                        @elseif ($pdf['product']['type']=='electricity')
                                                            <li><a href="{{$pdf['product']['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Electricity')</a></li>
                                                            <li><a href="{{$pdf['product']['terms_url']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_General_conditions')</a></li>
                                                        @elseif ($pdf['product']['type']=='gas')
                                                            <li><a href="{{$pdf['product']['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Gas')</a></li>
                                                            <li><a href="{{$pdf['product']['terms_url']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_General_conditions')</a></li>
                                                        @else
                                                            <li><a href="{{$pdf['product']['terms_url']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_General_conditions')</a></li>
                                                        @endif
                                                    </ul>
						</div>
                                             @endforeach
                                            
						
						
					</div>
				</div>
			</div>
		</div>
                        </div>
                </div>

		<!-- Product Description -->

		<div class="Product-com-sec">
			<div class="container">
				<h2>@lang('home.Product_Description')</h2>
				<div class="row">
					<div class="col-md-3 col-3">
						
					</div>
                                    
                                    
                                     @foreach ($res as $descr)
					<div class="col-md-3 col-3">
						<h5>{{$descr['supplier']['name']}} - {{$descr['product']['name']}}</h5>
						<ul>                       
                        @php 
                        $desc=explode(" - ",$descr['product']['description']);
                        @endphp
                                                
                                                 @foreach($desc as $descs)
                        <li>
                        <div class="row">
                            <div class="col-md-12 col-10">
                                <p>@php echo $descs @endphp</p>
                            </div>
                        </div>
                        </li>                          
                        @endforeach
						</ul>
					</div>
				@endforeach        
				</div>
			</div>
		</div>

		<!-- Discount -->
   
		<div class="discount-sec-com">
			<div class="container">
				<h2>@lang('home.Discounts')</h2>
                                
				<div class="row p-sec-dis">
                                    
                                    <div class="col-md-3">
						
					</div> 
                                    
				@foreach($res as $discSub)

				@php                                               
						$string = trans('home.switch_to');
						$replace = ['{SUPPLIER}','{PRODUCT}','{VALIDITYDATE}'];

						$info = [
						'SUPPLIER' => $discSub['supplier']['name'],
						'PRODUCT' => $discSub['product']['name'],
						'VALIDITYDATE' => Carbon\Carbon::parse($discSub['price']['validity_period']['end'])->format('d/m/Y'),
						];
				@endphp 

				@if($discSub['price']['totals']['year']['incl_promo']!=$discSub['price']['totals']['year']['excl_promo'])		                                   
				<div class="col-md-3">
					<p>
						@php echo str_replace($replace, $info, $string); @endphp
					</p>
				</div>

				@else
				
				<div class="col-md-3">
					<p>
						
					</p>
				</div>
				
				@endif

				@endforeach
                   
                                    
				</div>
                                
			<div class="com-bg">
				<div class="row pad-com">                                            
                   <div class="col-md-3">						
					</div>    
                                            
                                     @php  $disc_total="0"; $i="0"; 
                                     
                                                $discPromo=false;
                                                $discService=false;
                                                $discloyalty=false;
                                                if(Session::get('promo')=='true'){
                                                
                                                $discPromo=true;
                                                }else{
                                                
                                                
                                                $discPromo=false;
                                                }
                                                
                                                if(Session::get('domi')=='true'){
                                                $discService=true;
                                                
                                                }else{
                                                
                                                
                                                $discService=false;
                                                }
                                                if(Session::get('email')=='true'){
                                                
                                                $discloyalty=true;
                                                }else{
                                                
                                                
                                                $discloyalty=false;
                                                }
                                                          
                                     $posFlag=0;
                                     @endphp       
                                        @foreach($res as $discounts)  
                                        
                                       @php $i=$i+1; $posFlag=$posFlag+1;                          
                                        @endphp
  
						@php  $discounts['price']['breakdown']['discounts'] @endphp
                                                
                                               
                                                @php  $disc_total="0"; $i="0"; @endphp
                                                
                        <div class="col-md-3 com-elec">
							<div class="row"> 
                                                            @php $s="0"; 
                                                            
                                                              
                                                            @endphp
                                                            
                                                            
                                                            @php  $disc_total="0"; $discountE=0; $discountG=0; $discountS=0; $discountL=0; $checkPlus=0; $i="0"; 
                                                    
                                                    
                                                    if($discPromo==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    
                                                    }
                                                    
                                                     if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discService==true){
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='servicelevel'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discloyalty==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    
                                                    
                                                    @endphp
                                               
                                               
                                               
                                               
                             @foreach($filteredE as $discountss) 
                                        @php 
                                        $s++;
                                        if($s % 2 == 0)
                                        {
                                        $pos="even";
                                        }
                                        else
                                        {
                                        $pos="odd";
                                        }
                                      
                                        $discountE=$discountE+$discountss['amount'];
                                        @endphp
                                                @php  $disc_total=$disc_total+$discountss['amount']; $i=$i+1; @endphp

								<div class="col-md-7 col-7 com-pad ">
									<div class="check">
@if($discountss['parameters']['discount_type']=='servicelevel')
<span class="online_web online_web_compare"><i class="fas fa-at"></i></span>
@elseif($discountss['parameters']['discount_type']=='loyalty')
<img class="online_web online_web_compare" src="{{url('images/loyality.png')}}">
@else
@if($discountss['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif 

@endif
										
										<div>
											@if($discountss['parameters']['discount_type']=='servicelevel')
<p class="mode amt">Beperkte dienstverlening</p>
@elseif($discountss['parameters']['discount_type']=='loyalty')
<p class="mode amt">Getrouwheidskorting</p>
@else
<p class="mode amt">@if($discountss['parameters']['fuel_type']=='gas') @else  @endif @if($discountss['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

@endif
											<p class="check-p1" data-id="{{$discountss['id']}}" id="check-p1">@lang('home.Explanation')  <i class="fa fa-sort-down disc-arrow{{$discountss['id']}}"></i></p>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-5 com-euro com-pad">
									<p class="checkp1">&#8364; {{ number_format($discountss['amount'],2,',', '.')}}</p>
									<p class="checkp2">@if($discountss['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>
									@if($discountss['parameters']['unit']=='eurocent')
<p class="checkp2">{{ number_format($discountss['parameters']['value'],2,',', '.')}} €c/kWh </p>
									@endif
									
				@if($discountss['parameters']['unit']=='pct')
<p class="checkp2">{{$discountss['parameters']['value']*100}} % @lang('home.on_consumption')</p>
									@endif
									
								</div>
                                               
								<div class="col-12 com-content-dis cont{{$discountss['id']}}" id="com-content-dis">
									<h6>
										{{$discountss['name']}}
									</h6>
									<p>
										{{$discountss['description']}}
									</p>
								</div>      

                                                @endforeach
                                                
                                                
                                     @foreach($filteredG as $discountss) 
                                        @php 
                                        $s++;
                                        if($s % 2 == 0)
                                        {
                                        $pos="even";
                                        }
                                        else
                                        {
                                        $pos="odd";
                                        }
                                        
                                        $discountG=$discountG+$discountss['amount'];
                                        @endphp
                                                @php  $disc_total=$disc_total+$discountss['amount']; $i=$i+1; @endphp

								<div class="col-md-7 col-7 com-pad ">
									<div class="check">
@if($discountss['parameters']['discount_type']=='servicelevel')
<span class="online_web online_web_compare"><i class="fas fa-at"></i></span>
@elseif($discountss['parameters']['discount_type']=='loyalty')
<img class="online_web online_web_compare" src="{{url('images/loyality.png')}}">
@else
@if($discountss['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif 

@endif
										
										<div>
											@if($discountss['parameters']['discount_type']=='servicelevel')
<p class="mode amt">Beperkte dienstverlening</p>
@elseif($discountss['parameters']['discount_type']=='loyalty')
<p class="mode amt">Getrouwheidskorting</p>
@else
<p class="mode amt">@if($discountss['parameters']['fuel_type']=='gas') @else  @endif @if($discountss['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

@endif
											<p class="check-p1" data-id="{{$discountss['id']}}" id="check-p1">@lang('home.Explanation')  <i class="fa fa-sort-down disc-arrow{{$discountss['id']}}"></i></p>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-5 com-euro com-pad">
									<p class="checkp1">&#8364; {{ number_format($discountss['amount'],2,',', '.')}}</p>
									<p class="checkp2">@if($discountss['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>
									@if($discountss['parameters']['unit']=='eurocent')
<p class="checkp2">{{ number_format($discountss['parameters']['value'],2,',', '.')}} €c/kWh </p>
									@endif
									
				@if($discountss['parameters']['unit']=='pct')
<p class="checkp2">{{$discountss['parameters']['value']*100}} % @lang('home.on_consumption')</p>
									@endif
									
								</div>
                                              
								<div class="col-12 com-content-dis cont{{$discountss['id']}}" id="com-content-dis">
									<h6>
										{{$discountss['name']}}
									</h6>
									<p>
										{{$discountss['description']}}
									</p>
								</div>
                                                   

                                                @endforeach
                                                
                                                @foreach($filteredAll as $discountss) 
                                        @php 
                                        $s++;
                                        if($s % 2 == 0)
                                        {
                                        $pos="even";
                                        }
                                        else
                                        {
                                        $pos="odd";
                                        }
                                        
                                        $discountG=$discountG+$discountss['amount'];
                                        @endphp
                                                @php  $disc_total=$disc_total+$discountss['amount']; $i=$i+1; @endphp

								<div class="col-md-7 col-7 com-pad ">
									<div class="check">
@if($discountss['parameters']['discount_type']=='servicelevel')
<span class="online_web online_web_compare"><i class="fas fa-at"></i></span>
@elseif($discountss['parameters']['discount_type']=='loyalty')
<img class="online_web online_web_compare" src="{{url('images/loyality.png')}}">
@else
@if($discountss['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif 

@endif
										
										<div>
											@if($discountss['parameters']['discount_type']=='servicelevel')
<p class="mode amt">Beperkte dienstverlening</p>
@elseif($discountss['parameters']['discount_type']=='loyalty')
<p class="mode amt">Getrouwheidskorting</p>
@else
<p class="mode amt">@if($discountss['parameters']['fuel_type']=='gas') @else  @endif @if($discountss['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

@endif
											<p class="check-p1" data-id="{{$discountss['id']}}" id="check-p1">@lang('home.Explanation')  <i class="fa fa-sort-down disc-arrow{{$discountss['id']}}"></i></p>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-5 com-euro com-pad">
									<p class="checkp1">&#8364; {{ number_format($discountss['amount'],2,',', '.')}}</p>
									<p class="checkp2">@if($discountss['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>
									@if($discountss['parameters']['unit']=='eurocent')
<p class="checkp2">{{ number_format($discountss['parameters']['value'],2,',', '.')}} €c/kWh </p>
									@endif
									
				@if($discountss['parameters']['unit']=='pct')
<p class="checkp2">{{$discountss['parameters']['value']*100}} % @lang('home.on_consumption')</p>
									@endif
									
								</div>
                                               
								<div class="col-12 com-content-dis cont{{$discountss['id']}}" id="com-content-dis">
									<h6>
										{{$discountss['name']}}
									</h6>
									<p>
										{{$discountss['description']}}
									</p>
								</div>
                                        

                                                @endforeach
                                                
                                     @foreach($filteredS as $discountss) 
                                        @php 
                                        $s++;
                                        if($s % 2 == 0)
                                        {
                                        $pos="even";
                                        }
                                        else
                                        {
                                        $pos="odd";
                                        }
                                        
                                        $discountS=$discountS+$discountss['amount'];
                                        @endphp
                                                @php  $disc_total=$disc_total+$discountss['amount']; $i=$i+1; @endphp

								<div class="col-md-7 col-7 com-pad ">
									<div class="check">
@if($discountss['parameters']['discount_type']=='servicelevel')
<span class="online_web online_web_compare"><i class="fas fa-at"></i></span>
@elseif($discountss['parameters']['discount_type']=='loyalty')
<img class="online_web online_web_compare" src="{{url('images/loyality.png')}}">
@else
@if($discountss['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif 

@endif
										
										<div>
											@if($discountss['parameters']['discount_type']=='servicelevel')
<p class="mode amt">Beperkte dienstverlening</p>
@elseif($discountss['parameters']['discount_type']=='loyalty')
<p class="mode amt">Getrouwheidskorting</p>
@else
<p class="mode amt">@if($discountss['parameters']['fuel_type']=='gas') @else  @endif @if($discountss['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

@endif
											<p class="check-p1" data-id="{{$discountss['id']}}" id="check-p1">@lang('home.Explanation')  <i class="fa fa-sort-down disc-arrow{{$discountss['id']}}"></i></p>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-5 com-euro com-pad">
									<p class="checkp1">&#8364; {{ number_format($discountss['amount'],2,',', '.')}}</p>
									<p class="checkp2">@if($discountss['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>
									@if($discountss['parameters']['unit']=='eurocent')
<p class="checkp2">{{ number_format($discountss['parameters']['value'],2,',', '.')}} €c/kWh </p>
									@endif
									
				@if($discountss['parameters']['unit']=='pct')
<p class="checkp2">{{$discountss['parameters']['value']*100}} % @lang('home.on_consumption')</p>
									@endif
									
								</div>
                                         
								<div class="col-12 com-content-dis cont{{$discountss['id']}}" id="com-content-dis">
									<h6>
										{{$discountss['name']}}
									</h6>
									<p>
										{{$discountss['description']}}
									</p>
								</div>
                                      

                                                @endforeach
                                                
                                     @foreach($filteredL as $discountss) 
                                        @php 
                                        $s++;
                                        if($s % 2 == 0)
                                        {
                                        $pos="even";
                                        }
                                        else
                                        {
                                        $pos="odd";
                                        }
                                        
                                        $discountL=$discountL+$discountss['amount'];
                                        @endphp
                                                @php  $disc_total=$disc_total+$discountss['amount']; $i=$i+1; @endphp

								<div class="col-md-7 col-7 com-pad ">
									<div class="check">
@if($discountss['parameters']['discount_type']=='servicelevel')
<span class="online_web online_web_compare"><i class="fas fa-at"></i></span>
@elseif($discountss['parameters']['discount_type']=='loyalty')
<img class="online_web online_web_compare" src="{{url('images/loyality.png')}}">
@else
@if($discountss['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif 

@endif
										
										<div>
											@if($discountss['parameters']['discount_type']=='servicelevel')
<p class="mode amt">Beperkte dienstverlening</p>
@elseif($discountss['parameters']['discount_type']=='loyalty')
<p class="mode amt">Getrouwheidskorting</p>
@else
<p class="mode amt">@if($discountss['parameters']['fuel_type']=='gas') @else  @endif @if($discountss['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

@endif
											<p class="check-p1" data-id="{{$discountss['id']}}" id="check-p1">@lang('home.Explanation')  <i class="fa fa-sort-down disc-arrow{{$discountss['id']}}"></i></p>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-5 com-euro com-pad">
									<p class="checkp1">&#8364; {{ number_format($discountss['amount'],2,',', '.')}}</p>
									<p class="checkp2">@if($discountss['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>
									@if($discountss['parameters']['unit']=='eurocent')
<p class="checkp2">{{ number_format($discountss['parameters']['value'],2,',', '.')}} €c/kWh </p>
									@endif
									
				@if($discountss['parameters']['unit']=='pct')
<p class="checkp2">{{$discountss['parameters']['value']*100}} % @lang('home.on_consumption')</p>
									@endif
									
								</div>
                                        
								<div class="col-12 com-content-dis cont{{$discountss['id']}}" id="com-content-dis">
									<h6>
										{{$discountss['name']}}
									</h6>
									<p>
										{{$discountss['description']}}
									</p>
								</div>
                                         
                                                @endforeach
                                                
                                                
                                                
                                                
                                                
							</div>
						</div>
                                                    
                                                    
                                        
                                            
                                             @endforeach 
						
					</div>

				</div>
                                
                                

			



				
			</div>
		</div>


		<!-- Pricing -->

		<div class="pricing-sec-com">
			<div class="container">
				<h2>@lang('home.PRICING')</h2>
                                
                       @if($res[0]['product']['type']=='electricity' || $res[0]['product']['type']=='pack')
				<div class="row">
					<div class="col-md-12 com-electricity">
						<h4><i class="fa fa-bolt"></i> @lang('home.Electricity')</h4>
					</div>
				</div>

				<div class="energy-cost-com">
					<h5>@lang('home.Energy_Cost')</h5>
					<div class="fixed-cost-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Fixed_cost')</p>
							</div>
                                                    
                                                    @foreach($res as $fixed_cost)
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; {{number_format($fixed_cost['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100,2,',', '.') }}</p>
							</div>
							
                                                    @endforeach
							
                                                    
						</div>
					</div>

					<div class="consumption-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Consumption')</p>
							</div>
                                                    @foreach($res as $consump)
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; {{number_format($consump['price']['breakdown']['electricity']['energy_cost']['single']/100+$consump['price']['breakdown']['electricity']['energy_cost']['day']/100+$consump['price']['breakdown']['electricity']['energy_cost']['night']/100+$consump['price']['breakdown']['electricity']['energy_cost']['excl_night']/100,2,',', '.') }}</p>
							</div>
                                                     @endforeach
							
							
						</div>
					</div>

					<div class="certificates-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Certificates')</p>
							</div>
                                                    
                                                     @foreach($res as $certif)
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; {{number_format($certif['price']['breakdown']['electricity']['energy_cost']['certificates']/100,2,',', '.') }}</p>
							</div>
                                                     @endforeach
							
						</div>
					</div>
					


					<div class="discount-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">{{ucfirst(trans('home.Discounts'))}}</p>
							</div>
                                                    @php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0"; @endphp                                                    
                                                   
                                                    @foreach($res as $discs)
                                                   @php $getTotal="0";  @endphp 
                                               @php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $promo_discE="0";
                                                    $promo_discG="0";
                                                    $loyalty_disc="0";
                                                    $all_discTotal="0";
                                                    $promo_discAll=0;
                                                    
                                                    $test_disc=0;
                                                    
                                                    
                                                    
                                                foreach($discs['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                               
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discAll=$promo_discAll+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                @endphp
                                                 
							<div class="col-md-3 col-3">
							     @if((Session::get('promo')=='true' && $discs['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $discs['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $discs['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
								 @php
                                                            $fixF=$discs['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discs['price']['breakdown']['electricity']['energy_cost']['single']/100+$discs['price']['breakdown']['electricity']['energy_cost']['day']/100+$discs['price']['breakdown']['electricity']['energy_cost']['night']/100+$discs['price']['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                                            $cer=$discs['price']['breakdown']['electricity']['energy_cost']['certificates']/100;
                                                            
                                                            if((($fixF+$cun+$cer)-($promo_discE))<=0){
                                                            $activeStar=true;
                                                            $promo_discE=$fixF+$cun+$cer;
                                                            }
                                                            
                                                            @endphp
								<p class="dis-com">- &#8364; {{number_format($promo_discE,2,',', '.')}}</p>
							
								@else
								<p class="dis-com">- &#8364; 0,00</p>
								
								@endif
							</div>
                                                    @endforeach
							
						</div>
					</div>
					
				</div>

				<div class="net-cost-com">
					<h5>@lang('home.Net_costs')</h5>
					<div class="distribution-net">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Distribution')</p>
							</div>
                                                      @foreach($res as $distri)
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; {{number_format($distri['price']['breakdown']['electricity']['distribution_and_transport']['distribution']/100,2,',', '.')  }}</p>
							</div>							
						      @endforeach
						</div>
					</div>

					<div class="transport-net">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Transport')</p>
							</div>
                                                    @foreach($res as $trans)
							<div class="col-md-3 col-3">
								<p>&#8364; {{number_format($distri['price']['breakdown']['electricity']['distribution_and_transport']['transport']/100,2,',', '.')  }}</p>
							</div>
                                                    @endforeach
							
						</div>
					</div>
				</div>


				<div class="taxing-com">
					<h5>@lang('home.Taxing')</h5>
					<div class="taxing-net">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Taxing')</p>
							</div>
                                                    
                                                     @foreach($res as $taxing)
							<div class="col-md-3 col-3">
								<p>&#8364; {{number_format($taxing['price']['breakdown']['electricity']['taxes']['tax']/100,2,',', '.')  }}</p>
							</div>
                                                     @endforeach
							
						</div>
					</div>

				</div>
                                
                             @endif   

				<!-- gas -->
                                
                                
 @if($res[0]['product']['type']=='gas'|| $res[0]['product']['type']=='pack')

				<div class="row">
					<div class="col-md-12 com-electricity">
						<h4><i class="fa fa-fire"></i> @lang('home.Gas')</h4>
					</div>
				</div>

				<div class="energy-cost-com">
					<h5>@lang('home.Energy_Cost')</h5>
					<div class="fixed-cost-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Fixed_cost')</p>
							</div>
                                                    
                                                    
							@foreach($res as $fixed_cost)
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; {{number_format($fixed_cost['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100,2,',', '.') }}</p>
							</div>
							
                                                       @endforeach
							
							
						</div>
					</div>

					<div class="consumption-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Consumption')</p>
							</div>
                                                    
                                                    
					             @foreach($res as $consump)
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; {{number_format($consump['price']['breakdown']['gas']['energy_cost']['usage']/100,2,',', '.') }}</p>
							</div>
                                                     @endforeach
							
							
						</div>
					</div>
					
				

					<div class="discount-gas">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">{{ucfirst(trans('home.Discounts'))}}</p>
							</div>                                                    
                                                    @foreach($res as $dis)
                                                    
						          @php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $promo_discE="0";
                                                    $promo_discG="0";
                                                    $loyalty_disc="0";
                                                    $all_discTotal="0";
                                                    
                                                    $test_disc=0;
                                                    
                                                    
                                                    
                                                foreach($dis['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                @endphp
                                               
                                               
                                               
							<div class="col-md-3 col-3 fix-p">
							    @if((Session::get('promo')=='true' && $dis['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $dis['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $dis['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
								@php
                                                            $fixF=$dis['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                                            $cun=$dis['price']['breakdown']['gas']['energy_cost']['usage']/100;
                                                            if((($fixF+$cun)-($promo_discG))<=0){
                                                            
                                                            $promo_discG=$fixF+$cun;
                                                            $activeStar=true;
                                                            }
                                                            
                                                            @endphp
								<p class="dis-com">- &#8364; @if(count($dis['price']['breakdown']['discounts']) >0) {{number_format($promo_discG,2,',', '.')}} @else 0,00 @endif</p>
								
						@else
						<p class="dis-com">- &#8364; 0,00</p>
					
						
						@endif
							</div>
                                                    @endforeach
							
							
						</div>
					</div>
					
				</div>
@endif
				<div class="net-cost-com">
					<h5>@lang('home.Net_costs')</h5>
                                         @if($res[0]['product']['type']=='gas' || $res[0]['product']['type']=='pack')
					<div class="distribution-net">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Distribution')</p>
							</div>
                                                    
							@foreach($res as $distri)
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; {{number_format($distri['price']['breakdown']['gas']['distribution_and_transport']['distribution']/100,2,',', '.')  }}</p>
							</div>							
						      @endforeach
							
							
						</div>
					</div>
                                         @endif
                                         
  @if($res[0]['product']['type']=='gas' || $res[0]['product']['type']=='pack')
					<div class="transport-net">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Transport')</p>
							</div>
                                                    
							@foreach($res as $trans)
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; {{number_format($distri['price']['breakdown']['gas']['distribution_and_transport']['transport']/100,2,',', '.')  }}</p>
							</div>
                                                        @endforeach
                                                    
							
							
						</div>
					</div>
  @endif
				</div>
 
 

  @if($res[0]['product']['type']=='gas' || $res[0]['product']['type']=='pack')
				<div class="taxing-com">
					<h5>@lang('home.Taxing')</h5>
					<div class="taxing-net">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Taxing')</p>
							</div>
                                                    
							@foreach($res as $taxing)
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; {{number_format($taxing['price']['breakdown']['gas']['taxes']['tax']/100,2,',', '.')  }}</p>
							</div>
                                                     @endforeach
                                                    
							
							
						</div>
					</div>

				</div>
  @endif

				<div class="total-com">
					<h5>@lang('home.Total')</h5>
					<div class="total-com-gas-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								 @if($res[0]['product']['type']=='pack')
								<p class="pricing-head-com">@lang('home.Gas') + @lang('home.Electricity')</p>
								@endif
								 @if($res[0]['product']['type']=='electricity')
								 <p class="pricing-head-com"> @lang('home.Electricity')</p>
								@endif
								 @if($res[0]['product']['type']=='gas')
								 <p class="pricing-head-com">@lang('home.Gas')</p>
								@endif

							</div>
                                                    @foreach($res as $total)
							<div class="col-md-3 col-3">
							    
								<p>&#8364; {{number_format($total['price']['totals']['year']['excl_promo']/100,2,',', '.')  }}</p>
							</div>
							
						    @endforeach
						</div>
					</div>

					<div class="total-com-discount">
						<div class="row">
						    
						    @php $disc_total="0"; 
						     $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE=0;
                                                    $promo_discG=0;
                                                    $promo_discAll=0;
						    @endphp
                            @foreach($res as $discounts)
                            
                            <!--discount-->
                                     
                                       
                                        @php
                                                    
                                                   
                                                    
                                                foreach($discounts['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discAll=$promo_discAll+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                @endphp
                                                
                                                @endforeach
							<div class="col-md-3 col-3">
								@if(($promo_discG+$promo_discE+$promo_discAll)>0)<p class="pricing-head-com">Welkomstkortingen</p>@endif
								@if($sl_disc>0)<p class="pricing-head-com">Beperkte dienstverlening</p>@endif
								@if($loyalty_disc>0)<p class="pricing-head-com">Getrouwheidskortingen</p>@endif
							</div>
                            @php $disc_total="0"; @endphp
                            @foreach($res as $discounts)
                            
                            <!--discount-->
                                     
                                       
                                        @php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE="0";
                                                    $promo_discG="0";
                                                    $promo_discAll="0";
                                                    
                                                foreach($discounts['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discAll=$promo_discAll+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                @endphp
                            
                            
                            <!--discount end-->
                            
                            @php $discs=$discounts['price']['totals']['year']['excl_promo']-$discounts['price']['totals']['year']['incl_promo'];  @endphp
							<div class="col-md-3 col-3">
							    @if((Session::get('promo')=='true' && $discounts['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
							
							
							     @php 
                                                            $fixF=$discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discs['price']['breakdown']['electricity']['energy_cost']['day']/100+$discs['price']['breakdown']['electricity']['energy_cost']['night']/100+$discs['price']['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                                            $cer=$discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100;
                                                            
                                                            if((($fixF+$cun+$cer)-($promo_discE))<=0){
                                                            $activeStar=true;
                                                            $promo_discE=$fixF+$cun+$cer;
                                                            } 
								                            
								                            
								                            
								                            $fixF=$discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discounts['price']['breakdown']['gas']['energy_cost']['usage']/100;
                                                            if((($fixF+$cun)-($promo_discG))<=0){
                                                            
                                                            $promo_discG=$fixF+$cun;
                                                            $activeStar=true;
                                                            }
                                                            
                                @endphp
                                                            
                                                            
								@if($promo_discE+$promo_discG+$promo_discAll>0)<p class="dis-com-1">- &#8364; {{ number_format($promo_discE+$promo_discG+$promo_discAll,2,',', '.')  }}</p>@endif
								@if($sl_disc>0)<p class="dis-com-1">- &#8364; {{ number_format($sl_disc,2,',', '.')  }}</p>@endif
							    @if($loyalty_disc>0)<p class="dis-com-1">- &#8364; {{ number_format($loyalty_disc,2,',', '.')  }}</p>@endif
								@else
								@endif
							</div>
							@endforeach
					            
						</div>
					</div>
					<div class="total-com-total">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Total')</p>
							</div>
                                                     @foreach($res as $totals)
                                                     
                                                     
                                                     @php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE="0";
                                                    $promo_discG="0";
                                                    $promo_discAll="0";
                                                    
                                                foreach($totals['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discAll=$promo_discAll+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                @endphp
                                                
                                                
							<div class="col-md-3 col-3">
							    @if((Session::get('promo')=='true' && $totals['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $totals['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $totals['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
								
									  @php 
                                                            $fixF=$totals['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                                                            $cun=$totals['price']['breakdown']['electricity']['energy_cost']['single']/100+$discs['price']['breakdown']['electricity']['energy_cost']['day']/100+$discs['price']['breakdown']['electricity']['energy_cost']['night']/100+$discs['price']['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                                            $cer=$totals['price']['breakdown']['electricity']['energy_cost']['certificates']/100;
                                                            
                                                            if((($fixF+$cun+$cer)-($promo_discE))<=0){
                                                            $activeStar=true;
                                                            $promo_discE=$fixF+$cun+$cer;
                                                            } 
								                            
								                            
								                            
								                            $fixF=$totals['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                                            $cun=$totals['price']['breakdown']['gas']['energy_cost']['usage']/100;
                                                            if((($fixF+$cun)-($promo_discG))<=0){
                                                            
                                                            $promo_discG=$fixF+$cun;
                                                            $activeStar=true;
                                                            }
							@endphp
								
								
								<p class="dis-com-1">&#8364; {{number_format(($totals['price']['totals']['year']['excl_promo']/100)-($promo_discE+$promo_discG+$promo_discAll+$sl_disc+$loyalty_disc),2,',', '.')  }}</p>
								
								@else
								<p class="dis-com-1">&#8364; {{number_format($totals['price']['totals']['year']['excl_promo']/100,2,',', '.')  }}</p>
								@endif
							</div>
                                                     @endforeach
							
                                                    
						</div>
					</div>
				</div>

 @php $parameters=Session::get('getParameters'); @endphp
				<div class="unite-com">
					<h5>@lang('home.Unit_Prices')</h5>
					
					 @if($res[0]['parameters']['values']['comparison_type']=='pack')
					 
					<div class="unit-price-elec">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Electricity')</p>
							</div>
							
						
							 @foreach($res as $discounts)
							 
						
                                    <!--discount-->
                            
                                    @php $s="0"; 
                                                            
                                                              
                                                            @endphp
                                                            
                                                            
                                                            @php  $disc_total="0"; $discountE=0; $discountG=0; $discountS=0; $discountL=0; $checkPlus=0; $i="0"; 
                                                    
                                                    
                                                    if($discPromo==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    
                                                    }
                                                    
                                                     if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discService==true){
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='servicelevel'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discloyalty==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    
                                                  $discountE=0; $discountG=0; $discountS=0; $discountL=0; $discountAll="0"; 
                                                    @endphp
                                                    
                                       @foreach($filteredE as $discountss) 
                                       
                                        @php   $discountE=$discountE+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       
                                       @foreach($filteredG as $discountss) 
                                       
                                         @php $discountG=$discountG+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       @foreach($filteredAll as $discountss) 
                                       
                                         @php $discountAll=$discountAll+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       @foreach($filteredS as $discountss) 
                                       
                                        @php  $discountS=$discountS+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       @foreach($filteredL as $discountss) 
                                       
                                       @php   $discountL=$discountL+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       
                                       
                                        @php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE=0;
                                                    $promo_discG=0;
                                                    $promo_discAll=0;
                                                    
                                                foreach($discounts['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discAll=$promo_discAll+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                @endphp
                            
                            
                            <!--discount end-->
							
							 
							 	@php
                                                          $totalElec=$discounts['parameters']['values']['usage_single']+$discounts['parameters']['values']['usage_day']+$discounts['parameters']['values']['usage_night']+$discounts['parameters']['values']['usage_excl_night'];
                                                            $totalgas=$discounts['parameters']['values']['usage_gas'];
                                                            
                                                            @endphp
							 
							 
                                                            <div class="col-md-3 col-3">
                             @if((Session::get('promo')=='true' && $discounts['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                       @php
                                                            $fixF=$discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['day']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['night']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                                            $cer=$discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100;
                                                            
                                                            if((($fixF+$cun+$cer)-($promo_discE))<=0){
                                                            $activeStar=true;
                                                            $promo_discE=$fixF+$cun+$cer;
                                                            }
                                                            
                                                            @endphp
                                                            
                                                          
                                                     
                                                        @if(isset($discounts['price']['breakdown']['electricity']['unit_cost']['energy_cost'])) 

                                                        @if($totalElec>0)
                                                         {{number_format(((($discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['day']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['night']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['excl_night']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100)-($promo_discE))/$totalElec)*100,2,',', '.')}} &#8364;c/kWh @endif
                                                         @endif
                                                        @else
                                                        @if(isset($discounts['price']['breakdown']['electricity']['unit_cost']['energy_cost']))

                                                        @if($totalElec>0)

                                                          {{number_format(((($discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['day']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['night']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['excl_night']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100))/$totalElec)*100,2,',', '.')}} &#8364;c/kWh @endif
                                                        @endif
                                                           
                                                        @endif
                                                        
                                                        </div>
                                                            
						
							@endforeach
						
						</div>
					</div>
					@endif
					
					 @if($res[0]['parameters']['values']['comparison_type']=='pack')
					<div class="unit-price-gas">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Gas')</p>
							</div>
							 @foreach($res as $discounts)
							 
							  <!--discount-->
                            
                                    @php $s="0"; 
                                                            
                                                              
                                                            @endphp
                                                            
                                                            
                                                            @php  $disc_total="0"; $discountE=0; $discountG=0; $discountS=0; $discountL=0; $checkPlus=0; $i="0"; $discountAll="0"; 
                                                    
                                                    
                                                    if($discPromo==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    
                                                    }
                                                    
                                                     if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discService==true){
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='servicelevel'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discloyalty==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    
                                                  $discountE=0; $discountG=0; $discountS=0; $discountL=0; $discountAll="0";  
                                                    @endphp
                                                    
                                       @foreach($filteredE as $discountss) 
                                       
                                        @php   $discountE=$discountE+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       
                                       @foreach($filteredG as $discountss) 
                                       
                                         @php $discountG=$discountG+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       @foreach($filteredAll as $discountss) 
                                       
                                         @php $discountAll=$discountAll+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       @foreach($filteredS as $discountss) 
                                       
                                        @php  $discountS=$discountS+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       @foreach($filteredL as $discountss) 
                                       
                                       @php   $discountL=$discountL+$discountss['amount']; @endphp
                                        
                                       @endforeach
                            
                            
                            <!--discount end-->
							 
							  @php $getTotal=null; @endphp
						     @foreach($discounts['price']['breakdown']['discounts'] as $disc) 
                                               
                                               @if($disc['parameters']['fuel_type']=='gas')
                                               
                                               @php $getTotal=$getTotal+$disc['amount'];
                                               
                                               
                                               @endphp
                                               
                                               @endif
                                               
                                               @endforeach
                                               
                                             @php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE=0;
                                                    $promo_discG=0;
                                                    
                                                foreach($discounts['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                @endphp
							 
							@php 
							$totalElec=$discounts['parameters']['values']['usage_single']+$discounts['parameters']['values']['usage_day']+$discounts['parameters']['values']['usage_night']+$discounts['parameters']['values']['usage_excl_night'];
                            $totalgas=$discounts['parameters']['values']['usage_gas'];
                            @endphp
							    <div class="col-md-3 col-3">
                             @if((Session::get('promo')=='true' && $discounts['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                           
                                                            
                                                            @php
                                                            $fixF=$discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discounts['price']['breakdown']['gas']['energy_cost']['usage']/100;
                                                            if((($fixF+$cun)-($promo_discG))<=0){
                                                            
                                                            $promo_discG=$fixF+$cun;
                                                            $activeStar=true;
                                                            }
                                                            
                                                            @endphp
                                           
                                            @if(isset($discounts['price']['breakdown']['gas']['unit_cost']['energy_cost']))  
                                            @if($totalgas>0)
                                            {{number_format(((($discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['gas']['energy_cost']['usage']/100)-($promo_discG))/$totalgas)*100,2,',', '.')}} &#8364;c/kWh  @endif @endif
                                                        @else
                                                            @if(isset($discounts['price']['breakdown']['gas']['unit_cost']['energy_cost'])) 
                                                            @if($totalgas>0)
                                                             {{number_format(((($discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['gas']['energy_cost']['usage']/100))/$totalgas)*100,2,',', '.')}} &#8364;c/kWh  @endif @endif
                                                        
                                                        @endif
                                                        
                                                        </div>
							     
							      
							     
						    @endforeach
						
						</div>
					</div>
					 @endif
					
					
					
					
                     @if($res[0]['parameters']['values']['comparison_type']=='gas')
					<div class="unit-price-gas">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@lang('home.Gas')</p>
							</div>
							 @foreach($res as $discounts)
							 
							    <!--discount-->
                            
                                    @php $s="0"; 
                                                            
                                                              
                                                            @endphp
                                                            
                                                            
                                                            @php  $disc_total="0"; $discountE=0; $discountG=0; $discountS=0; $discountL=0; $checkPlus=0; $i="0"; $discountAll=0;
                                                    
                                                    
                                                    if($discPromo==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    
                                                    }
                                                    
                                                     if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discService==true){
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='servicelevel'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discloyalty==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    
                                                  $discountE=0; $discountG=0; $discountS=0; $discountL=0;  
                                                    @endphp
                                                    
                                       @foreach($filteredE as $discountss) 
                                       
                                        @php   $discountE=$discountE+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       
                                       @foreach($filteredG as $discountss) 
                                       
                                         @php $discountG=$discountG+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       @foreach($filteredAll as $discountss) 
                                       
                                         @php $discountAll=$discountAll+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       @foreach($filteredS as $discountss) 
                                       
                                        @php  $discountS=$discountS+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       @foreach($filteredL as $discountss) 
                                       
                                       @php   $discountL=$discountL+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       
                                       
                                            @php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE=0;
                                                    $promo_discG=0;
                                                    
                                                foreach($discounts['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                @endphp
                            
                            
                            <!--discount end-->
							 
							@php 
							$totalElec=$discounts['parameters']['values']['usage_single']+$discounts['parameters']['values']['usage_day']+$discounts['parameters']['values']['usage_night']+$discounts['parameters']['values']['usage_excl_night'];
                            $totalgas=$discounts['parameters']['values']['usage_gas'];
                            @endphp
							     <div class="col-md-3 col-3">
                             @if((Session::get('promo')=='true' && $discounts['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                            
                                              
                                                            
                                                            @php
                                                            $fixF=$discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discounts['price']['breakdown']['gas']['energy_cost']['usage']/100;
                                                            if((($fixF+$cun)-($promo_discG))<=0){
                                                            
                                                            $promo_discG=$fixF+$cun;
                                                            $activeStar=true;
                                                            }
                                                            
                                                            @endphp
                                            @if(isset($discounts['price']['breakdown']['gas']['unit_cost']['energy_cost']))  {{number_format(((($discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['gas']['energy_cost']['usage']/100)-($promo_discG))/$totalgas)*100,2,',', '.')}} &#8364;c/kWh  @endif
                                                        @else
                                                            @if(isset($discounts['price']['breakdown']['gas']['unit_cost']['energy_cost']))  {{number_format(((($discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['gas']['energy_cost']['usage']/100))/$totalgas)*100,2,',', '.')}} &#8364;c/kWh  @endif
                                                        
                                                        @endif
                                                        
                                                        </div>
							     
							       
							     
						    @endforeach
						
						</div>
					</div>
					 @endif
					 
					 @if($res[0]['parameters']['values']['comparison_type']=='electricity')
					 
					 @php $type=$res[0]['parameters']['values']['comparison_type']; @endphp
					<div class="unit-price-gas">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com">@if($res[0]['parameters']['values']['comparison_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>
							</div>
							 @foreach($res as $discounts)
							 
							  <!--discount-->
                            
                                    @php $s="0"; 
                                                            
                                                              
                                                            @endphp
                                                            
                                                            
                                                            @php  $disc_total="0"; $discountE=0; $discountG=0; $discountS=0; $discountL=0; $checkPlus=0; $i="0"; $discountAll=0;
                                                    
                                                    
                                                    if($discPromo==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    
                                                    }
                                                    
                                                     if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                              if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discService==true){
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='servicelevel'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discloyalty==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    
                                                  $discountE=0; $discountG=0; $discountS=0; $discountL=0;  
                                                    @endphp
                                                    
                                       @foreach($filteredE as $discountss) 
                                       
                                        @php   $discountE=$discountE+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       
                                       @foreach($filteredG as $discountss) 
                                       
                                         @php $discountG=$discountG+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                        @foreach($filteredAll as $discountss) 
                                       
                                         @php $discountAll=$discountAll+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       @foreach($filteredS as $discountss) 
                                       
                                        @php  $discountS=$discountS+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       @foreach($filteredL as $discountss) 
                                       
                                       @php   $discountL=$discountL+$discountss['amount']; @endphp
                                        
                                       @endforeach
                                       
                                       
                                        @php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE=0;
                                                    $promo_discG=0;
                                                    
                                                foreach($discounts['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                @endphp
                            
                            
                            <!--discount end-->
							   @php
							   $totalElec=$discounts['parameters']['values']['usage_single']+$discounts['parameters']['values']['usage_day']+$discounts['parameters']['values']['usage_night']+$discounts['parameters']['values']['usage_excl_night'];
                            
							   @endphp
							        <div class="col-md-3 col-3">
                             @if((Session::get('promo')=='true' && $discounts['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                  @php
                                                            $fixF=$discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['day']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['night']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                                            $cer=$discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100;
                                                            
                                                            if((($fixF+$cun+$cer)-($promo_discE))<=0){
                                                            $activeStar=true;
                                                            $promo_discE=$fixF+$cun+$cer;
                                                            }
                                                            
                                                            @endphp
                                                            
                                                           
                                                
                                                
                                                       @if(isset($discounts['price']['breakdown']['electricity']['unit_cost']['energy_cost'])) {{number_format(((($discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['day']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['night']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['excl_night']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100)-($promo_discE))/$totalElec)*100,2,',', '.')}} &#8364;c/kWh @endif
                                                        @else
                                                        @if(isset($discounts['price']['breakdown']['electricity']['unit_cost']['energy_cost'])) {{number_format(((($discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['day']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['night']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['excl_night']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100))/$totalElec)*100,2,',', '.')}} &#8364;c/kWh @endif
                                                           
                                                        @endif
                                                        
                                                        </div>
							  
						    @endforeach
						
						</div>
					</div>
					 @endif
					
					
					
				</div>

			</div>
		</div>

		<!-- bottom content -->

		<div class="bottom-content-com">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						@php                                               
$string = trans("home.These_prices_comp");
$replace = ['{X1}','{X2}','{X3}','{X6}'];

$month=date("F");
$month = strtolower($month);
$year=date("Y");
$x1=strtolower(trans('home.Electricity'));
$p_type=Session::get('p_type');
if($p_type=='pack' || $p_type=='gas' || $p_type=='electricity' ){
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
}

if($customer_type=='residential'){
$x1 = trans('home.x5_res');
$x6=trans('home.x6_res');
}
if($customer_type=='professional'){
$x1 = trans('home.x5_pro');
$x6=trans('home.x6_pro');
}
$info = [
    'X1' => $x1,
    'X2'  => $x2,
    'X3'   => $year,
    'X6'      => $x6,
   
];

@endphp
                                                
                                                <p>@php echo str_replace($replace, $info, $string); @endphp</p>
					</div>
				</div>
			</div>
		</div>
                
                 <script>
$(document).ready(function(){
 $(".check-p1").click(function(){
     
     var id=$(this).data('id');
     $('.disc-arrow'+id).toggleClass('rotate');
   $(".cont"+id).slideToggle();
 });
});
</script>
<script>
$(document).ready(function(){
 $("#check-p11").click(function(){
     
   $("#com-content-dis1").slideToggle();
 });
});
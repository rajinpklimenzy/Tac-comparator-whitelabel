      <?php
      /*Just for your server-side code*/
      header('Content-Type:text/html; charset=UTF-8');
      ?>
                          @php  
                          $parameters=Session::get('getParameters');
                          $product = $getdetails['product'];
                          $parameters = $getdetails['parameters'];
                          $supplier = $getdetails['supplier'];
                          $price = $getdetails['price'];
                          $count=DB::table('user_logs')->where('product_id',$product['id'])->count();
                          $tot_count=DB::table('user_logs')->count();
                          $choose=($count/$tot_count)*100;
                          $p_type=$product['type'];
                          $activeStar=false;
                          $activeStarG=false;
                          $activeStarE=false;
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

                          @endphp

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

                          foreach($price['breakdown']['discounts'] as $disc){
                          $test_disc=$test_disc+$disc['amount'];
                          }

                          foreach($price['breakdown']['discounts'] as $disc){

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


                          @if($product['type']=="pack")  
                          @php $all_discTotal=$all_disc;  @endphp
                          @else

                          @php $all_discTotal=$all_disc; @endphp

                          @endif
                          @php  


                          $discAmount=($price['totals']['year']['excl_promo']/100)-($promo_discE+$promo_discG+$promo_discAll+$sl_disc+$loyalty_disc);

                          if($product['type']=='electricity'){

                          $fixF=$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                          $cun=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;
                          $cer=$price['breakdown']['electricity']['energy_cost']['certificates']/100; 


                          if(($fixF+$cun+$cer)-$promo_discE<0){

                          $discAmount=($price['totals']['year']['excl_promo']/100)-($fixF+$cun+$cer);

                          $discAmount=$discAmount-($promo_discAll+$sl_disc+$loyalty_disc);

                          }

                          }

                          if($product['type']=='gas'){

                          $fixF=$price['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                          $cun=$price['breakdown']['gas']['energy_cost']['usage']/100;

                          if(($fixF+$cun)-$promo_discG<0){

                          $discAmount=($price['totals']['year']['excl_promo']/100)-($fixF+$cun);
                          $discAmount=$discAmount-($promo_discAll+$sl_disc+$loyalty_disc);
                          }

                          }

                          if($product['type']=='pack'){
                          $discAmountG=$promo_discG; $discAmountE=$promo_discE;


                          $fixF=$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                          $cun=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;

                          $cer=$price['breakdown']['electricity']['energy_cost']['certificates']/100;

                          if((($fixF+$cun+$cer)-($promo_discE))<0){
                          $discAmountE=($fixF+$cun+$cer);
                          $discAmount=($price['totals']['year']['excl_promo']/100)-($discAmountE+$discAmountG);
                          $discAmount=$discAmount-($promo_discAll+$sl_disc+$loyalty_disc);
                          }

                          $fixF=$price['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                          $cun=$price['breakdown']['gas']['energy_cost']['usage']/100;

                          if((($fixF+$cun)-($promo_discG))<0){
                          $discAmountG=($fixF+$cun);

                          }

                          $discAmount=($price['totals']['year']['excl_promo']/100)-($discAmountG+$discAmountE+$promo_discAll+$sl_disc+$loyalty_disc);



                          }



                          @endphp


                            <input type="hidden" class="locale" value="{{$parameters['values']['locale']}}">
                            <input type="hidden" class="postalCode" value="{{$parameters['values']['postal_code']}}">
                            <input type="hidden" class="customerGroup" value="{{$parameters['values']['customer_group']}}">
                            <input type="hidden" class="first_residence" value="1">
                            <input type="hidden" class="registerNormal" value="{{$parameters['values']['usage_single']}}">
                            <input type="hidden" class="registerDay" value="{{$parameters['values']['usage_day']}}">
                            <input type="hidden" class="registerNight" value="{{$parameters['values']['usage_night']}}">
                            <input type="hidden" class="registerExclNight" value="{{$parameters['values']['usage_excl_night']}}">
                            <input type="hidden" class="registerG" value="{{$parameters['values']['usage_gas']}}">
                            <input type="hidden" class="meterType" value="{{$parameters['values']['meter_type']}}">
                            <input type="hidden" class="IncludeG" value="{{$parameters['values']['includeG']}}">
                            <input type="hidden" class="IncludeE" value="{{$parameters['values']['includeE']}}">
                            <input type="hidden" class="uuid" value="{{$parameters['uuid']}}">

                            <!-- for pack  -->

                             @if($packType=='pack')
                             <input type="hidden" name="ff" class="pr_fixed_fee" value="{{($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['fixed_fee'])/100}}">
                             @elseif($packType=='electricity')

                              <input type="hidden" name="ff" class="pr_fixed_fee" value="{{($price['breakdown']['electricity']['energy_cost']['fixed_fee'])/100}}">
                              @elseif($packType=='gas')

                               <input type="hidden" name="ff" class="pr_fixed_fee" value="{{($price['breakdown']['gas']['energy_cost']['fixed_fee'])/100}}">
                             @endif

                              @if($price['totals']['year']['excl_promo']>$price['totals']['year']['incl_promo'])
                             <input type="hidden" name="discount" class="pr_discount" value="{{($price['totals']['year']['excl_promo']-$price['totals']['year']['incl_promo'])/100}}">
                              @else
                             <input type="hidden" name="discount" class="pr_discount" value="0">
                              @endif

                               @if($packType=='pack')
                             <input type="hidden" name="consumption" class="pr_consumption" value="{{($price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['gas']['energy_cost']['usage'])/100}}">
                             @elseif($packType=='electricity')
                             <input type="hidden" name="consumption" class="pr_consumption" value="{{($price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night'])/100}}">

                             @elseif($packType=='gas')

                              <input type="hidden" name="consumption" class="pr_consumption" value="{{($price['breakdown']['gas']['energy_cost']['usage'])/100}}">

                             @endif

                             @if($packType=='electricity')
                             <input type="hidden" name="certificate" class="pr_certificate" value="{{($price['breakdown']['electricity']['energy_cost']['certificates'])/100}}">
                             @endif


                              @php
                              if($packType=='pack'){
                              $impact_ev_market=(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['fixed_fee'])/100)+(($price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['gas']['energy_cost']['usage'])/100)+(($price['breakdown']['electricity']['energy_cost']['certificates'])/100)-(($price['totals']['year']['excl_promo']-$price['totals']['year']['incl_promo'])/100);
                              }

                              @endphp
                              @if($packType=='pack')
                              <input type="hidden" name="impact_evolution_market_live" class="impact_evolution_market_live{{$product['id']}}" value="{{$impact_ev_market}}">
                              @endif

                              <input type="hidden" name="Scenario" class="scenario{{$product['id']}}">

                            

                            <!-- for pack -->



          <div class="@if($min==$product['id']) featured-sec @endif">

              @if($min==$product['id'])
              <div class="row justify-content-end">

              <div class="featured-text ">
              <p>@lang('home.This_cheap')</p>
              </div>

              </div>
              @endif
              @php $excl="";  @endphp
              @foreach($price['breakdown']['discounts'] as $disc)
              @php
              if($disc['parameters']['channel']=='exclusive_to_comparators'){
              $excl='exclusive_to_comparators';
              }
              @endphp
              @endforeach

              <div class="section-3-sec @if($min==$product['id']) featured @endif" id="{{$product['id']}}">
              <div class="col-md-3 col-sm-12 part-1 part-1-mob">
              <img src="{{$supplier['logo']}}" alt="Supplier Logo"><div>  @if($supplier['greenpeace_rating'] > 0.75)<span class="tool-1-sec"><span class="exc" style="background-color: #147b13;" > @lang('home.greenest')<span class="tool-sec-tip" rel="tooltip" title="@lang('home.exc_greenest')"  ><i class="fas fa-info-circle"></i></span> </span></span> @endif  @if($min==$product['id']) <span class="tool-1-sec"><span class="exc" style="background-color: blue;" > @lang('home.cheapest') <span class="tool-sec-tip" rel="tooltip" title="@lang('home.exc_cheapest')"  ><i class="fas fa-info-circle"></i></span> </span></span> @endif  @if($excl=='exclusive_to_comparators')<span class="tool-1-sec"> <span class="exc"> @lang('home.exclusive') <span class="tool-sec-tip" rel="tooltip" title="@lang('home.exc_exclusive')"><i class="fas fa-info-circle"></i></span> </span></span><span class="tool-1-sec"> @endif  @if($product['contract_duration']=='4' || $product['contract_duration']=='5' && $product['pricing_type']=='fixed') <span class="exc"> @lang('home.most_sec') <span class="tool-sec-tip" rel="tooltip" title="@lang('home.exc_secure')"  ><i class="fas fa-info-circle"></i></span></span></span> @endif</div>

              </div>
              <div class="row section-3">
              <div class="col-md-12 sec-3-head">
              <input type="hidden" value="overzicht/{{$parameters['values']['comparison_type']}}/{{$parameters['values']['dgo_id_electricity']}}-{{$parameters['values']['dgo_id_gas']}}-{{$parameters['values']['postal_code']}}?u=@if(isset($_COOKIE['uuid'])){{$_COOKIE['uuid']}}@else{{$parameters['uuid']}}@endif" class="changeurl">
                  <form action="{{url('bevestiging')}}" method="get">
                  {{csrf_field()}}
                  <input type="hidden" name="pri_save" class="pri_save{{$si}}">
                  <input type="hidden" name="pro_id"  value="{{$product['id']}}">
                  <input type="hidden" name="supplier"  value="{{$supplier['name']}}">
                  <input type="hidden" name="product"  value="{{$product['name']}}">
                  <input type="hidden" name="pro_type"  value="{{$parameters['values']['comparison_type']}}">
                  <input type="hidden" name="type" id="get_type" value="{{Session::get('customer_type')}}">
                  <input type="hidden" name="postalcode" id="get_postalcode" value="{{Session::get('postal_code')}}">
                  <input type="hidden" name="elect_day" id="" @if (isset($usage_elec_day)) value="{{$usage_elec_day}}" @endif>
                  <input type="hidden" name="elect_night" @if (isset($usage_elec_night)) value="{{$usage_elec_night}}" @endif >
                  <input type="hidden" name="gas_cons" @if (isset($usage_gas)) value="{{$usage_gas}}" @endif>
                  @if($packType=='elecrticity')
                  <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
                  @elseif($packType=='gas')
                  <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
                  @else
                  <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
                  @endif
                  <input type="hidden" name="from" value="pack" >
                  <input type="hidden" name="pr_type" id="pr_type" value="">
                  <div class="tool-sec-1">
                  <button  data-id="{{$product['id']}}" type="submit" class="sec-head-btn">{{$supplier['name']}} - {{$product['name']}}</button>  
                  </div>
                  </form>
              </div>
          </div>

          <div class="row part">
          <div class="col-md-3 col-sm-5 part-2">
                  <ul>
                  <li><p style="text-transform: capitalize"><i class="fa fa-check"></i>@if($p_type=="pack" && $packType!="electricity" && $packType!="gas") @lang('home.Gas') + @lang('home.Electricity') @elseif($p_type=='gas' || $packType=="gas") @lang('home.Gas') @elseif($p_type=='electricity' || $packType=="electricity") @lang('home.Electricity') @else @endif</p></li>
                  <li>
                  <p><i class="fa fa-check"></i>
                  @if(Session::get('locale')=='nl') 
                  @if($product['contract_duration']=='123') @lang('home.123year')@elseif($product['contract_duration']=='13') @lang('home.13year')@elseif($product['contract_duration']=='0') @lang('home.Undetermined')@else {{$product['contract_duration']}} @if($product['contract_duration']>1) @lang('home.Year')s @else @lang('home.Year') @endif
                  @endif,

                  @if($product['type']=='pack') 

                  @if($product['underlying_products']['electricity']['pricing_type']!=$product['underlying_products']['gas']['pricing_type'])

                  Combinatie vast en variabel

                  @else
                  @if($product['underlying_products']['electricity']['pricing_type']=='fixed') @lang('home.fixed')  @else @lang('home.variable')  @endif 

                  @endif


                  @else 

                  @if($product['pricing_type']== 'fixed') @lang('home.fixed') @else @lang('home.variable') @endif 

                  @endif 


                  @else
                  @if($product['contract_duration']=='123') @lang('home.123year')@elseif($product['contract_duration']=='13') @lang('home.13year')@elseif($product['contract_duration']=='0') @lang('home.Undetermined')@else {{$product['contract_duration']}} @if($product['contract_duration']>1) @lang('home.Year')s @else @lang('home.Year') @endif
                  @endif,

                  @if($product['type']=='pack') 

                  @if($product['underlying_products']['electricity']['pricing_type']!=$product['underlying_products']['gas']['pricing_type'])

                  Combinaison fixe et variable

                  @else


                  @if($product['underlying_products']['electricity']['pricing_type']=='fixed')  @lang('home.fixed') @else  @lang('home.variable') @endif 

                  @endif
                  @else 

                  @if($product['pricing_type']== 'fixed') @lang('home.rate') @lang('home.fixed') @else  @lang('home.variable') @endif @endif
                  @endif
                  </p>
                  </li>
                  @if($product['type']=='electricity' || $product['type']=='pack')
                  <li><p><i class="fa fa-check"></i>@if($product['origin']=='BE' &&  $product['green_percentage'] > 0)<img src="{{url('images/bel-flag.png')}}">@endif {{$product['green_percentage']}} % @lang('home.green')</p></li>
                  @endif
                  </ul>
          </div>








          <div class="col-md-2 col-sm-7 part-sec-4-3">

              <div class="row @if(Session::get('currentValue')) save-sec @endif">
              <div class="col-md-2 col-sm-6 col-6 part-4">
              <ul>
                    @if($p_type=='pack' && $packType=='electricity' )
                    @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                    @endif

                    @if($p_type=='electricity')
                    @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                    @endif

                    @if($p_type=='pack' && $packType=='gas' )
                    @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                    @endif

                    @if($p_type=='gas')
                    @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                    @endif

                    @if($p_type=='pack' && $packType!='electricity' && $packType!='gas')
                    @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                    @endif
                    <li>
                    <p class="@if($per1!=0) red @endif years">@lang('home.All_in_costs_Year')</p>
                    <p class="@if($per1!=0) red @endif month" style="display:none;">@lang('home.All_in_costs_Month')</p>
                    </li>

                    @if($p_type=='pack' && $packType=='electricity' )

                    <input type="hidden" value="{{number_format(($price['breakdown']['electricity']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['certificates']+$price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['electricity']['distribution_and_transport']['distribution']+$price['breakdown']['electricity']['distribution_and_transport']['transport']+$price['breakdown']['electricity']['taxes']['tax'])/100,2)}}" class="get_year_val">
                    <input type="hidden" value="{{number_format(($price['breakdown']['electricity']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['certificates']+$price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['electricity']['distribution_and_transport']['distribution']+$price['breakdown']['electricity']['distribution_and_transport']['transport']+$price['breakdown']['electricity']['taxes']['tax'])/100,2)}}" class="get_month_val">
                    @endif
                    @if($p_type=='electricity')

                    <input type="hidden" value="{{number_format(($price['breakdown']['electricity']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['certificates']+$price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['electricity']['distribution_and_transport']['distribution']+$price['breakdown']['electricity']['distribution_and_transport']['transport']+$price['breakdown']['electricity']['taxes']['tax'])/100,2)}}" class="get_year_val">
                    <input type="hidden" value="{{number_format(($price['breakdown']['electricity']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['certificates']+$price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['electricity']['distribution_and_transport']['distribution']+$price['breakdown']['electricity']['distribution_and_transport']['transport']+$price['breakdown']['electricity']['taxes']['tax'])/100,2)}}" class="get_month_val">
                    @endif
                    @if($p_type=='gas')

                    <input type="hidden" value="{{number_format(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['taxes']['tax'])/100,2)}}" class="get_year_val">
                    <input type="hidden" value="{{number_format(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['taxes']['tax'])/100,2)}}" class="get_month_val">
                    @endif

                    @if($p_type=='pack')
                    <input type="hidden" value="{{number_format($price['totals']['year']['incl_promo']/100,2)}}" class="get_year_val">
                    <input type="hidden" value="{{number_format($price['totals']['month']['incl_promo']/100,2)}}" class="get_month_val">
                    @endif



                    @if($p_type=='pack' && $packType=='electricity' )
                    @php $per1=100-((($discAmount/12)/($price['totals']['month']['excl_promo']/100))*100) @endphp

                    <li>
                    <p class="@if($per1!=0) red @endif euro years "><b>&#8364; </i>@php $prc=number_format($price['breakdown']['electricity']['taxes']['tax']/100+$price['breakdown']['electricity']['distribution_and_transport']['transport']/100+$price['breakdown']['electricity']['distribution_and_transport']['distribution']/100+$price['breakdown']['electricity']['energy_cost']['certificates']/100+$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100+$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p><p class=" euro month"  style="display:none;"><b>&#8364;</i>@php $prc=number_format($price['totals']['month']['incl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                    </li>
                    <li>

                    @if($per1!=0) <p class="strike years"> <strike> &#8364; </i>{{number_format($price['totals']['year']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p><p class="strike month" style="display:none;"> <strike> &#8364;</i>{{number_format($price['totals']['month']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc"> -{{number_format($per1, 2,',', '.')}}%</span></p>@endif

                    </li>
                    @endif

                    @if($p_type=='electricity')
                    @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp

                    @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))

                    <li>
                    <p class="@if($per1!=0) red @endif euro years "><b>&#8364; </i>@php $prc=number_format($discAmount,2,',', '.'); $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p> <p class="@if($per1!=0) red @endif euro month" style="display:none;"><b>&#8364; </i>@php $prc=number_format(($discAmount/12),2,',', '.'); $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                    </li>
                    <li>
                    @if($per1!=0)<p class="strike years"> <strike> &#8364; </i>{{number_format($price['totals']['year']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p><p class="strike month" style="display:none;"> <strike> &#8364; </i>{{number_format($price['totals']['month']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-((($discAmount/12)/($price['totals']['month']['excl_promo']/100))*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p>@endif

                    </li>
                    @else
                    @php $per1=100-(round((round($discAmount)/12)*100/round($price['totals']['month']['excl_promo']))*100) @endphp
                    <li>
                    <p class=" euro years "><b>&#8364; </i>@php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.'); $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p> <p class="@if($per1!=0) red @endif euro month" style="display:none;"><b>&#8364; </i>@php $prc=number_format($price['totals']['month']['excl_promo']/100,2,',', '.'); $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                    </li>

                    @endif



                    @endif

                    @if($p_type=='pack' && $packType=='gas' )
                    @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                    <li>
                    <p class="@if($per1!=0) red @endif euro years "><b>&#8364; </i>@php $prc=number_format(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['taxes']['tax'])/100,2,',', '.'); $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p> <p class=" euro month " style="display:none;"><b>&#8364; </i>@php $prc=number_format(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['taxes']['tax'])/100,2,',', '.'); $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                    </li>
                    <li>

                    @if($per1!=0)<p class="strike years"> <strike> &#8364; </i>{{number_format($price['totals']['year']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p><p class="strike month" style="display:none;"> <strike> &#8364; </i>{{number_format($price['totals']['month']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-((($discAmount/12)/($price['totals']['month']['excl_promo']/100))*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p>@endif

                    </li>
                    @endif

                    @if($p_type=='gas')
                    @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp




                    @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))


                    <li>
                    <p class="@if($per1!=0) red @endif euro years "><b>&#8364; </i>@php $prc=number_format($discAmount,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup</p><p class="@if($per1!=0) red @endif euro month"  style="display:none;"><b>&#8364;</i>@php $prc=number_format($price['totals']['month']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                    </li>
                    <li>
                    @if($per1!=0)<p class="strike years"> <strike> &#8364; </i>{{number_format($price['totals']['year']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p><p class="strike month" style="display:none;"> <strike> &#8364; </i>{{number_format(($discAmount/12)/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-((($discAmount/12)/$price['totals']['month']['excl_promo'])*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p>@endif

                    </li>

                    @else
                    @php $per1=100-(round((round($discAmount)/12)*100/round($price['totals']['month']['excl_promo']))*100) @endphp
                    <li>
                    <p class=" euro years "><b>&#8364; </i>@php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup</p><p class="@if($per1!=0) red @endif euro month"  style="display:none;"><b>&#8364;</i>@php $prc=number_format($price['totals']['month']['incl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                    </li>

                    @endif


                    @endif


                    @if($p_type=='pack' && $packType!='electricity' && $packType!='gas')

                    @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp

                    @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                    <li>

                    <p class="@if($per1!=0) red @endif euro years " ><b>&#8364; </i>@php $prc=number_format($discAmount,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p><p class="@if($per1!=0) red @endif euro month"  style="display:none;"><b>&#8364;</i>@php $prc=number_format(($discAmount/12),2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                    </li>
                    <li class="{{$parameters['values']['promo_discount']['promo']}}" >
                    @if($per1!=0)<p class="strike years"> <strike> &#8364; </i>{{number_format($price['totals']['year']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p><p class="strike month" style="display:none;"> <strike> &#8364; </i>{{number_format($price['totals']['month']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-((($discAmount/12)/($price['totals']['month']['excl_promo']/100))*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p>@endif

                    </li>


                    @else
                    @php $per1=100-(round((round($discAmount)/12)*100/round($price['totals']['month']['excl_promo']))*100) @endphp
                    <li>

                    <p class=" euro years "><b>&#8364; </i>@php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p><p class="@if($per1!=0) red @endif euro month"  style="display:none;"><b>&#8364;</i>@php $prc=number_format($price['totals']['month']['incl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>

                    </li>

                    @endif

                    @endif

              </ul>

              @php

              $string = trans("home.Choose");
              $replace = ['{X}'];
              $info = [
              'X' => $product['popularity_score'],
              ];
              @endphp


          </div>



          <div class="col-md-2 col-sm-6 col-6  part-3">



              <!-- historical price -->

            
                  <img src="{{url('images/hisLoader.gif')}}" width="120px" class="historicalLoading historicalLoading{{$product['id']}}" style="display: none;">
                  <p class="historicalPriceError red herror{{$product['id']}}" style="display: none;color: red;" >Historical price not available for this date</p>
            <ul class="year_savings historicalPrice historicalPrice{{$product['id']}}" style="display: none;">
                  <input type="hidden" class="histProId" name="histProId" value="{{$product['id']}}">
                  
            <!-- <li><p>@lang('home.Savings_Year')</p></li> -->
            <li><p>Historische prijs/jaar</p></li>

            <li><p class="euro" ><b>&#8364; <span class="price_savings"><span class="a{{$product['id']}}"></span><sup>,<span class="b{{$product['id']}}"></span></sup></span> </b></p></li>
            </ul>
           

            <!-- historical end -->




          @php $currentValue=Session::get('currentValue'); 
          @endphp
          @php 
          if(Session::get('cur_invoice_moth_year')=='year'){

          $invamount=(int)$currentValue;

          }else{
          $invamount=(int)$currentValue*12;
          }

          if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')){
          $prc=number_format($invamount-($discAmount),2,',', '.');
          }else{
          $prc=number_format($invamount-($price['totals']['year']['excl_promo']/100),2,',', '.');
          }

          $sp_pricea=preg_split("/,/",$prc)
          @endphp

          @if($prc>0)
          <ul @if(Session::get('currentValue'))    @else style="display:none;" @endif class="year_savings years">
              <li><p>@lang('home.Savings_Year')</p></li>

              <li><p class="euro" ><b>&#8364; <span class="price_savings">{{$sp_pricea[0]}}<sup>,{{$sp_pricea[1]}}</sup></span> </b></p></li>
              </ul>

              @else

              @endif



              @php 
              $currentValue=Session::get('currentValue');  

              if(Session::get('cur_invoice_moth_year')=='month'){

              $invamount=(int)$currentValue;

              }else{
              $invamount=(int)$currentValue/12;
              }
              if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')){

              $prc=number_format($invamount-($price['totals']['month']['incl_promo']/100),2,',', '.');
              }else{
              $prc=number_format($invamount-($price['totals']['month']['excl_promo']/100),2,',', '.');
              }
              $sp_pricem=preg_split("/,/",$prc)
              @endphp
              @if($prc>0)
              <ul  style="display:none;" class="month_savings month">
              <li><p>@lang('home.Savings_Month')</p></li>

              <li><p class="euro" ><b>&#8364; <span class="price_savings"> {{$sp_pricem[0]}}<sup>,{{$sp_pricem[1]}}</sup></span> </b></p></li>
              </ul>
              @else



              @endif
              <p class="heart"><i class="fa fa-heart"></i>{{str_replace($replace, $info, $string)}}</p>
              </div>

              </div>
              </div>

              <div class="col-md-2 col-sm-12 part-5">

              <input type="hidden" class="load-type" value="{{$packType}}">

              @if(!$packType)

              <form action="{{url('bevestiging')}}" method="get">
              {{csrf_field()}}
              <input type="hidden" name="pri_save" class="pri_save{{$si}}">
              <input type="hidden" name="pro_id" id="pro_id" value="{{$product['id']}}">
              <input type="hidden" name="supplier"  value="{{$supplier['name']}}">
              <input type="hidden" name="product"  value="{{$product['name']}}">
              <input type="hidden" name="pro_type"  value="{{$parameters['values']['comparison_type']}}">
              <input type="hidden" name="type"  value="{{Session::get('customer_type')}}">
              <input type="hidden" name="postalcode"  value="{{Session::get('postal_code')}}">
              <input type="hidden" name="elect_day" id="" @if (isset($usage_elec_day)) value="{{$usage_elec_day}}" @endif>
              <input type="hidden" name="elect_night" @if (isset($usage_elec_night)) value="{{$usage_elec_night}}" @endif >
              <input type="hidden" name="gas_cons" @if (isset($usage_gas)) value="{{$usage_gas}}" @endif>
              @if($packType=='elecrticity')
              <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
              @elseif($packType=='gas')
              <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
              @else
              <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
              @endif

              <input type="hidden" name="pr_type" id="pr_type" value="">
              <input type="hidden" name="from" value="pack" >
              <input type='hidden' name='this_url' class="this_url">
              <button id="choose{{$product['id']}}" data-id="{{$product['id']}}" type="submit" class="choose" rel="tooltip" title="@lang('home.To_Request')">@lang('home.To_Request')</button>
              @php

              $string = trans("home.Choose");
              $replace = ['{X}'];
              $info = [
              'X' => $product['popularity_score'],
              ];
              @endphp
              </form>

              @else

              @php  $sel=Session::get('select-pro'); 

              if($packType=='electricity'){

              $sub_url=$product['subscribe_url'];


              }else{

              $sub_url=$product['underlying_products']['gas']['subscribe_url'];


              }

              @endphp

              @if($sel['id']==$product['id'] && $sel['type']==$packType && (Session::get('elecID') || Session::get('gasID') ))


              <button id="getchoose{{$product['id']}}" data-id="{{$product['id']}}" type="submit"  class="choose getchoose sel{{$packType}}" rel="tooltip" data-supplier="{{$supplier['name']}}" data-product="{{$product['name']}}" data-type='{{$product['type']}}' title="@lang('home.To_Request')"><i class='fa fa-check' aria-hidden='true'></i>@lang('home.check_select')</button>
              @php

              $string = trans("home.Choose");
              $replace = ['{X}'];
              $info = [
              'X' => $product['popularity_score'],
              ];
              @endphp
              @else
              @php $egid="";  @endphp
              @if($packType=='electricity')

              @php $egid=$product['id']; @endphp
              @else

              @php  $egid=$product['id']; @endphp
              @endif


              <button id="getchoose{{$product['id']}}" data-id="{{$product['id']}}" data-url="{{$sub_url}}" type="submit" class="choose getchoose sel{{$packType}}" data-egid={{$egid}} data-pid='{{$product['id']}}'  data-url="{{$sub_url}}" rel="tooltip" data-supplier="{{$supplier['name']}}" data-product="{{$product['name']}}" data-type='{{$product['type']}}' title="@lang('home.To_Request')">@if(Session::get('selected_product')==$product['id']) <i class='fa fa-check' aria-hidden='true'></i> @lang('home.check_select')  @else @lang('home.To_Request') @endif</button>
              @php

              $string = trans("home.Choose");
              $replace = ['{X}'];
              $info = [
              'X' => $product['popularity_score'],
              ];
              @endphp
              @endif

              @endif
              </div>
              </div>


              <div class="row more-content more-content{{$product['id']}}">
              <div class="col-md-12 more-tab">
              <div id="accordion">
              <div class="underline">
              <div class="card">
              <div class="card-header" role="tab" id="headingOne">
              <h5 class="mb-0">
              <button class="tablinks btn btn-link collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#collapseOne{{$product['id']}}">
              @lang('home.PRICING') <span class="arrow-down"><i class="fa fa-chevron-down"></i></i></span>
              </button>
              </h5>
              </div>

              @php

              $ele_disc="0";
              $gas_disc="0";
              foreach($price['breakdown']['discounts'] as $disc){

              if($disc['parameters']['fuel_type']=='electricity'){

              $ele_disc=$ele_disc+$disc['amount'];
              }
              if($disc['parameters']['fuel_type']=='gas'){

              $gas_disc=$gas_disc+$disc['amount'];
              }

              }

              @endphp

              <div id="collapseOne{{$product['id']}}" class="collapse multi-collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
              <div class="card-body">
              <div id="" class="">
              <div class="row pricing-elec">

              @if($product['type']=='pack'||$product['type']=='electricity')
              <div class="col-md-4 col-lg-4 col-sm-12 elec-sec">
              <div class="row elec-sec-head">
              <div class="col-md-12 col-lg-12 col-sm-12 mt-3 ">
              <h5><i class="fa fa-bolt"></i> @lang('home.Electricity')</h5>
              </div>
              </div>
              <div class="row elec-sec-1">
              <div class="col-md-12 col-lg-12 col-sm-12 mt-4">
              <h6><b>@lang('home.Energy_Cost')</b></h6>
              </div>
              </div>
              <div class="row energy-sec mt-1">
              <div class="col-md-6 col-6 col-lg-6 energy ">
              <ul>
              <li>@lang('home.Fixed_cost')</li>
              <li>@lang('home.Consumption')</li>
              <li>@lang('home.Certificates')</li>
              @if($parameters['values']['digital_meter']==1)
              <li>@lang('home.fixed_fee_inj')</li>
              <li>@lang('home.injection')</li>
              @endif
              @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
              @php
              $activeStarE=false;
              $fixF=$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
              $cun=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;
              $cer=$price['breakdown']['electricity']['energy_cost']['certificates']/100;

              if((($fixF+$cun+$cer)-($promo_discE))<=0){
              $activeStarE=true;

              }
              @endphp

              <li>@lang('home.Discounts') @if($activeStarE==true) * @endif</li>
              @else
              <li>@lang('home.Discounts')</li>
              @endif
          </ul>
          </div>

          <div class="col-md-6 col-6 col-lg-6 energy-price red-color text-right">
              <ul>
                  <li>&#8364; {{number_format($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100,2,',', '.') }}</li>
                  <li >&#8364; {{number_format($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100,2,',', '.') }}</li>
                  <li>&#8364;  {{number_format($price['breakdown']['electricity']['energy_cost']['certificates']/100,2,',', '.') }}</li>
                  @php $inj=0; @endphp
                  @if($parameters['values']['digital_meter']==1)
                  <li>&#8364;  {{number_format($price['breakdown']['electricity']['energy_cost']['fixed_fee_inj']/100,2,',', '.') }}</li>
                  <li>&#8364;  {{number_format($price['breakdown']['electricity']['energy_cost']['injection']/100,2,',', '.') }}</li>
                  @php $inj=$price['breakdown']['electricity']['energy_cost']['fixed_fee_inj']+$price['breakdown']['electricity']['energy_cost']['injection']; @endphp
                  @endif
                  @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                  @php
                  $fixF=$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                  $cun=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;
                  $cer=$price['breakdown']['electricity']['energy_cost']['certificates']/100;

                  if((($fixF+$cun+$cer)-($promo_discE))<=0){
                  $activeStar=true;
                  $promo_discE=$fixF+$cun+$cer;
                  }

                  @endphp
                  <li class="red-text">- &#8364; {{number_format(($promo_discE),2,',', '.')}}</li>

                  @else
                  <li class="gray-text">- &#8364; 0,00</li>
                  @endif
              </ul>
          </div>
          </div>
          <div class="row elec-sec-1">
              <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                  <h6><b>@lang('home.Net_costs')</b></h6>
              </div>
          </div>
          <div class="row net-sec mt-1">
              <div class="col-md-6 col-6 col-lg-6 energy">
                  <ul>
                      <li>@lang('home.Distribution')</li>
                      <li>@lang('home.Transport')</li>
                  </ul>
              </div> 
              <div class="col-md-6 col-6 col-lg-6 energy-price text-right">
                  <ul>
                      <li>&#8364; {{number_format($price['breakdown']['electricity']['distribution_and_transport']['distribution']/100,2,',', '.')  }}</li>
                      <li>&#8364; {{number_format($price['breakdown']['electricity']['distribution_and_transport']['transport']/100,2,',', '.')  }}</li>
                  </ul>
              </div>
            </div>
                    <div class="row elec-sec-1">
                        <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                            <h6><b>@lang('home.Taxing')</b></h6>
                        </div>
                    </div>
                    <div class="row tax-sec mt-2">
                        <div class="col-md-6 col-6 col-lg-6 energy">
                            <ul>
                                <li>@lang('home.Taxing')</li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-6 col-lg-6 energy-price text-right">
                            <ul>
                                <li>&#8364; {{number_format($price['breakdown']['electricity']['taxes']['tax']/100,2,',', '.') }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row total-sec mt-4">
                        <div class="col-md-6 col-6 col-lg-6 energy">
                            <ul>
                                <li><b>@lang('home.Sub_Total') E</b></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-6 col-lg-6 energy-price text-right">
                            <ul>
                                <li><b>&#8364; {{number_format($price['breakdown']['electricity']['taxes']['tax']/100+$price['breakdown']['electricity']['distribution_and_transport']['transport']/100+$price['breakdown']['electricity']['distribution_and_transport']['distribution']/100+$price['breakdown']['electricity']['energy_cost']['certificates']/100+$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100+$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100+$inj/100,2,',', '.')  }} </b></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
        <!-- end of electricity -->

        <!-- gas-sec -->
        
        @if($product['type']=='pack'||$product['type']=='gas')
                <div class="col-md-4 col-lg-4 col-sm-12 gas-sec">
                    <div class="row elec-sec-head">
                        <div class="col-md-12 col-lg-12 col-sm-12 mt-3 ">
                            <h5><i class="fa fa-fire"></i> @lang('home.Gas')</h5>
                        </div>
                    </div>
                    <div class="row elec-sec-1">
                        <div class="col-md-12 col-lg-12 col-sm-12 mt-4">
                            <h6><b>@lang('home.Energy_Cost')</b></h6>
                        </div>
                    </div>
                    <div class="row energy-sec mt-1">
                        <div class="col-md-6 col-6 col-lg-6 energy ">
                           <ul>
                                <li>@lang('home.Fixed_cost')</li>
                                <li>@lang('home.Consumption')</li>
                                @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                
                                
                                @php
                                $activeStarG=false;
                                $fixF=$price['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                $cun=$price['breakdown']['gas']['energy_cost']['usage']/100;
                                if((($fixF+$cun)-($promo_discG))<=0){
                                
                               
                                $activeStarG=true;
                                }
                                
                                @endphp
                                <li>@lang('home.Discounts') @if($activeStarG==true) * @endif</li>
                                
                                @else
                                 <li>@lang('home.Discounts')</li>
                                @endif
                            </ul>
                        </div>

                        <div class="col-md-6 col-6 col-lg-6 energy-price red-color text-right">
                            <ul>
                                <li>&#8364;</i> {{number_format($price['breakdown']['gas']['energy_cost']['fixed_fee']/100,2,',', '.')}}</li>
                                <li>&#8364; {{number_format($price['breakdown']['gas']['energy_cost']['usage']/100,2,',', '.')}}</li>
                                   @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                
                                @php
                                $fixF=$price['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                $cun=$price['breakdown']['gas']['energy_cost']['usage']/100;
                                if((($fixF+$cun)-($promo_discG))<=0){
                                
                                $promo_discG=$fixF+$cun;
                                $activeStar=true;
                                }
                                
                                @endphp
                                
                                <li class="red-text">- &#8364; @if(isset($promo_discG)){{number_format(($promo_discG),2,',', '.')}} @endif</li>
                               
                                @else
                                <li class="gray-text">- &#8364; 0,00</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="row elec-sec-1">
                        <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                            <h6><b>@lang('home.Net_costs')</b></h6>
                        </div>
                    </div>
                    <div class="row net-sec mt-1">
                        <div class="col-md-6 col-6 col-lg-6 energy">
                            <ul>
                                <li>@lang('home.Distribution')</li>
                                <li>@lang('home.Transport')</li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-6 col-lg-6 energy-price text-right">
                            <ul>
                                <li>&#8364;{{number_format($price['breakdown']['gas']['distribution_and_transport']['distribution']/100,2,',', '.') }}</li>
                                <li>&#8364; {{number_format($price['breakdown']['gas']['distribution_and_transport']['transport']/100,2,',', '.') }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row elec-sec-1">
                        <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                            <h6><b>@lang('home.Taxing')</b></h6>
                        </div>
                    </div>
                    <div class="row tax-sec mt-2">
                        <div class="col-md-6 col-6 col-lg-6 energy">
                            <ul>
                                <li>@lang('home.Taxing')</li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-6 col-lg-6 energy-price text-right">
                            <ul>
                                <li>&#8364; {{number_format($price['breakdown']['gas']['taxes']['tax']/100,2,',', '.')}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row total-sec mt-4">
                        <div class="col-md-6 col-6 col-lg-6 energy">
                            <ul>
                                <li><b>@lang('home.Sub_Total') G</b></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-6 col-lg-6 energy-price text-right">
                            <ul>
                                <li><b>&#8364; {{number_format($price['breakdown']['gas']['taxes']['tax']/100+$price['breakdown']['gas']['distribution_and_transport']['transport']/100+$price['breakdown']['gas']['distribution_and_transport']['distribution']/100+$price['breakdown']['gas']['energy_cost']['usage']/100+$price['breakdown']['gas']['energy_cost']['fixed_fee']/100,2,',', '.')}} </b></li>
                            </ul>
                        </div>
                    </div>
                </div>                                            
                @endif
        
        
        
        <div class="col-md-4 col-lg-4 col-sm-12 total-sec">
                    <div class="row elec-sec-head">
                        <div class="col-md-12 col-lg-12 col-sm-12 mt-3 ">
                            <h5>@lang('home.Total')</h5>
                        </div>
                    </div>
                    
                    @php
                            
                            if(isset($ele_disc)){
                            $eleD=$ele_disc;
                            }else{
                            $eleD=0;
                            
                            }
                            if(isset($gas_disc)){
                            $gasD=$gas_disc;
                            }else{
                            $gasD=0;
                            }
                            
                            if(isset($all_disc)){
                            $all_disc=$all_disc;
                            }else{
                            $all_disc=0;
                            }
                            
                            
                            @endphp
                            @if($product['type']=="pack")  
                                    @php $all_discTotal=$all_disc;  @endphp
                                    @else
                                    
                                   @php $all_discTotal=$all_disc; @endphp
                                    
                                    @endif 
                    <div class="total-bg mt-2">
                          <div class="total_sec_last">
                            
                                <div class="left_total">
                                    @if($p_type=="pack" && $packType!="electricity" && $packType!="gas") @lang('home.Gas') + @lang('home.Electricity') @elseif($p_type=='gas' || $packType=="gas") @lang('home.Gas') @elseif($p_type=='electricity' || $packType=="electricity") @lang('home.Electricity') @else @endif
                                </div>
                                <div class="right_total">
                                  &#8364; {{ number_format($price['totals']['year']['excl_promo']/100,2,',', '.') }}
                                </div>
                                
                                @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                    
                                <div class="left_total">
                                    @if(Session::get('locale')=='nl')
                                    Welkomstkortingen
                                    @else
                                    Réductions de bienvenue
                                    @endif
                                </div>
                                <div class="right_total red-text">
                                  &#8364; -{{number_format(($promo_discG+$promo_discE+$promo_discAll),2,',', '.')}}
                                </div>
                                @if($sl_disc>0)
                                <div class="left_total">
                                    Beperkte dienstverlening
                                </div>
                                <div class="right_total red-text">
                                   &#8364; -{{number_format($sl_disc,2,',', '.')}}
                                </div>
                                @endif
                                @if($loyalty_disc>0)
                                <div class="left_total">
                                    Getrouwheidskorting
                                </div>
                                <div class="right_total red-text">
                                  &#8364;  -{{number_format($loyalty_disc,2,',', '.')}}
                                </div>
                                @endif
                                <div class="left_total">
                                    
                                </div>
                                <div class="right_total">
                                    
                                  &#8364;  {{ number_format(($price['totals']['year']['excl_promo']/100)-($promo_discG+$promo_discE+$promo_discAll+$sl_disc+$loyalty_disc),2,',', '.') }}
                                </div>
                                
                                
                                @else
                                
                                <div class="left_total">
                                   
                                </div>
                                <div class="right_total">
                                  &#8364;  {{ number_format(($price['totals']['year']['excl_promo']/100),2,',', '.') }}
                                </div>
                                
                                
                                 @endif
                            </div>
                    </div> 
                    <div class="row elec-sec-1">
                        <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                            <h6><b>@lang('home.Unit_Prices')</b></h6>
                        </div>
                    </div>
                    <div class="row net-sec mt-1">
                        <div class="col-md-6 col-6 col-lg-6 energy">
                           <ul>
                               @if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost']))  <li>@lang('home.Electricity')</li> @endif
                               @if(isset($price['breakdown']['gas']['unit_cost']['energy_cost']))  <li>@lang('home.Gas')</li> @endif
                            </ul>
                        </div>
                        <div class="col-md-6 col-6 col-lg-6 energy-price text-right">
                             <ul>
                                @php
                                $totalElec=$parameters['values']['usage_single']+$parameters['values']['usage_day']+$parameters['values']['usage_night']+$parameters['values']['usage_excl_night'];
                                $totalgas=$parameters['values']['usage_gas'];
                                
                                @endphp
                                
                             @if($activeStar==true)
                             
                             
                             @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                
                                 @if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost'])) <li>

                                @if($totalElec>0)
                               {{number_format(((($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100)+($price['breakdown']['electricity']['energy_cost']['certificates']/100)+($inj/100))/$totalElec)*100,2,',', '.')}}

                               @else
                               0,00
                               @endif
                                &#8364;c/kWh</li>@endif
                                @if(isset($price['breakdown']['gas']['unit_cost']['energy_cost'])) <li>

                                @if($totalgas>0)    
                                {{number_format(((($price['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($price['breakdown']['gas']['energy_cost']['usage']/100))/$totalgas)*100,2,',', '.')}} 

                                @else
                                0,00
                                @endif
                                &#8364;c/kWh</li> @endif

                                
                            @else
                               @if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost'])) <li>{{number_format(((($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100)+($price['breakdown']['electricity']['energy_cost']['certificates']/100)+($inj/100))/$totalElec)*100,2,',', '.')}} &#8364;c/kWh</li>@endif
                                @if(isset($price['breakdown']['gas']['unit_cost']['energy_cost'])) <li>{{number_format(((($price['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($price['breakdown']['gas']['energy_cost']['usage']/100))/$totalgas)*100,2,',', '.')}} &#8364;c/kWh</li> @endif
                            
                            @endif
                             
                             
                             @else
                                
                              @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                 
                                @if($totalElec>0)
                               @php  $uPrice=(($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100)+($price['breakdown']['electricity']['energy_cost']['certificates']/100)+($inj/100)-($promo_discE))/$totalElec;   @endphp
                                @else
                               @php $uPrice=0; @endphp
                                @endif
                                
                                @if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost'])) <li>{{number_format(($uPrice)*100,2,',', '.')}} &#8364;c/kWh</li>@endif
                                @if(isset($price['breakdown']['gas']['unit_cost']['energy_cost'])) <li>@if($totalgas>0) {{number_format(((($price['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($price['breakdown']['gas']['energy_cost']['usage']/100)-($promo_discG))/$totalgas)*100,2,',', '.')}} @else {{number_format(0*100,2,',', '.')}}  @endif &#8364;c/kWh</li> @endif
                            @else
                                @if($totalElec>0)
                               @php  $uPrice=(($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100)+($price['breakdown']['electricity']['energy_cost']['certificates']/100)+($inj/100))/$totalElec;   @endphp
                                @else
                               @php $uPrice=0; @endphp
                                @endif
                            
                               @if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost'])) <li>{{number_format(($uPrice)*100,2,',', '.')}} &#8364;c/kWh</li>@endif
                                @if(isset($price['breakdown']['gas']['unit_cost']['energy_cost'])) <li>@if($totalgas>0) {{number_format(((($price['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($price['breakdown']['gas']['energy_cost']['usage']/100))/$totalgas)*100,2,',', '.')}} @else {{number_format(0*100,2,',', '.')}}  @endif &#8364;c/kWh</li> @endif
                            
                            @endif
                            
                            @endif
                            </ul>
                        </div>
                    </div>

                    <div class="row elec-sec-1">
                      <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                        <h6><b>@lang('home.Documents')</b></h6>
                        </div>

                        <div class="row net-sec net-sec-1 mt-1">
                        <div class="col-md-12 col-12 energy">
                          <ul>
                            @if($product['type']=='pack') 
                            <li><a href="{{$product['underlying_products']['electricity']['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Electricity')</a></li>
                            <li><a href="{{$product['underlying_products']['gas']['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Gas')</a></li>
                            @if($parameters['values']['digital_meter']==1)
                            <li><a href="{{$product['underlying_products']['electricity']['terms_url_dynamic_inj']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.tariff_card_inj')</a></li>
                            @endif

                            @elseif ($product['type']=='electricity')
                            <li><a href="{{$product['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Electricity')</a></li>

                             @if($parameters['values']['digital_meter']==1)
                             @if($product['type']=='pack') 
                            <li><a href="{{$product['underlying_products']['electricity']['terms_url_dynamic_inj']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.tariff_card_inj')</a></li>
                            @elseif($product['type']=='electricity')

                            <li><a href="{{$product['terms_url_dynamic_inj']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.tariff_card_inj')</a></li>

                            @endif
                            @endif

                            @elseif ($product['type']=='gas')
                            <li><a href="{{$product['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Gas')</a></li>

                            @else

                            @endif
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 mt-4 text-right" >
                        <form action="{{url('bevestiging')}}" method="get">
                            {{csrf_field()}}
                            <input type="hidden" name="pri_save" class="pri_save{{$si}}">
                            <input type="hidden" name="pro_id"  value="{{$product['id']}}">
                            <input type="hidden" name="supplier"  value="{{$supplier['name']}}">
                            <input type="hidden" name="product"  value="{{$product['name']}}">
                            <input type="hidden" name="pro_type"  value="{{$parameters['values']['comparison_type']}}">
                            <input type="hidden" name="type"  value="{{Session::get('customer_type')}}">
                            <input type="hidden" name="postalcode"  value="{{Session::get('postal_code')}}">
                            <input type="hidden" name="elect_day" id="" @if (isset($usage_elec_day)) value="{{$usage_elec_day}}" @endif>
                            <input type="hidden" name="elect_night" @if (isset($usage_elec_night)) value="{{$usage_elec_night}}" @endif >
                            <input type="hidden" name="gas_cons" @if (isset($usage_gas)) value="{{$usage_gas}}" @endif>
                            @if($packType=='elecrticity')
                            <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
                            @elseif($packType=='gas')
                            <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
                            @else
                            <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
                            @endif
                            <input type="hidden" name="from" value="pack" >
                            <input type="hidden" name="pr_type" id="pr_type" value="">
                            <button id="choose{{$product['id']}}" data-id="{{$product['id']}}" type="submit" class="choose1">@lang('home.To_Request')</button>
                        </form>
                      </div>
                    </div>
                </div>
         </div>
      <div class="row section-last mt-4">
            <div class="col-md-8">


            @php
            Session::put('p_type',$p_type);
            $string = trans("home.prices_text");
            $replace = ['{X5}','{X2}','{X3}'];
            $string1 = trans("home.prices_text_continuation");
            $replace1 = ['{X6}'];

            $time=strtotime($price['validity_period']['end']);
            $date = new DateTime('now');
            $modifiedDate=$date->modify('last day of this month');
            $month=$date->format('d/m/Y');

            $year=date("Y",$time);
            $x1=trans('home.Electricity');
            $customer_type=Session::get('customer_type');
            $x2="";

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


            @endphp

            <p>{!!str_replace($replace, $info, $string)!!} <a href="" class="disctab-active" onclick="openCity(event, 'discount{{$product['id']}}')">{{ ucfirst(trans('home.Discounts')) }}</a> {!!str_replace($replace1, $info1, $string1)!!}</p>

            @if((Session::get('promo')!='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')!='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')!='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
            @if(Session::get('locale')=='nl')<button class="disc-activate">Op dit tarief zijn kortingen beschikbaar. Klik hier om ze te activeren.</button>@else <button class="disc-activate">Ce tarif contient des réductions de bienvenu. Clicquez ici pour les activer.</button> @endif

            @endif


            <br/>
            @if($activeStar==true)

            <p>* De kortingen kunnen nooit hoger zijn dan de vaste vergoeding + de verbruikskosten. Daarom is de waarde hier lager dan in het overzicht van de kortingen</p>  

            @endif
            </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="underline">
      <div class="card">
      <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
      <button class="tablinks btn btn-link collapsed discountact" data-parent="#accordion" data-toggle="collapse" data-target="#collapseTwo{{$product['id']}}">
      {{ucfirst(trans('home.Discounts'))}} <span class="arrow-down"><i class="fa fa-chevron-down"></i></i></span>
      </button>
      </h5>
      </div>
      <div id="collapseTwo{{$product['id']}}" class="collapse multi-collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="head-p">
            @php $ab=array();  @endphp
            @foreach($price['breakdown']['discounts'] as $discounts)

            @php 
            array_push($ab,$discounts['validity_period']['end']);
            @endphp

            @endforeach

            <?php

            $date_arr=$ab;

            usort($date_arr, function($a, $b) {
            $dateTimestamp1 = strtotime($a);
            $dateTimestamp2 = strtotime($b);

            return $dateTimestamp1 < $dateTimestamp2 ? -1: 1;
            });
            ?>
            @if(isset($endDate)) {{$endDate}} @endif

            @php                                               
            $string = trans("home.switch_to");
            $replace = ['{SUPPLIER}','{PRODUCT}','{VALIDITYDATE}'];
            $info = [
            'SUPPLIER' => $supplier['name'],
            'PRODUCT' => $product['name'],
            'VALIDITYDATE'=>Carbon\Carbon::parse(current($date_arr))->format('d/m/Y'),

            ];

            @endphp
            @if($per1!=0)   
            <p>@php echo str_replace($replace, $info, $string); @endphp</p>
            @else
            <p>@lang('home.Currently_no_discount')</p>
            @endif
      </div>
      <div class="card-body dis-main">
      <div id="" class="">
      <div class="accordion" id="accordionExample">
      @php  $disc_total="0"; $checkPlus=0; $i="0"; 
                        
                        
                        if($discPromo==true){
                        $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                        $s=0;
                        if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                            $s++;
                            }
                            return $s;
                            });

                        $filteredE=$filtered->all();
                        }else{
                        
                        $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                        $s=0;
                        if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                            $s++;
                            }
                            return $s;
                            });

                        $filteredE=$filtered->all();
                        
                        }
                        
                         if($discPromo==true){
                         $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                        $s=0;
                        if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                            $s++;
                            }
                            return $s;
                            });

                        $filteredG=$filtered->all();
                        
                        }else{
                        
                         $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                        $s=0;
                        if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                            $s++;
                            }
                            return $s;
                            });

                        $filteredG=$filtered->all();
                        
                        
                        }
                        
                        if($discPromo==true){
                         $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                        $s=0;
                        if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                            $s++;
                            }
                            return $s;
                            });

                        $filteredAll=$filtered->all();
                        
                        }else{
                        
                         $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                        $s=0;
                        if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                            $s++;
                            }
                            return $s;
                            });

                        $filteredAll=$filtered->all();
                        
                        
                        }
                        
                        if($discService==true){
                        
                         $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                        $s=0;
                        if($value['parameters']['discount_type']=='servicelevel'){
                            $s++;
                            }
                            return $s;
                            });

                        $filteredS=$filtered->all();
                        }else{
                        
                        $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                        $s=0;
                        if($value['parameters']['discount_type']=='unknown'){
                            $s++;
                            }
                            return $s;
                            });

                        $filteredS=$filtered->all();
                        
                        
                        }
                        
                        if($discloyalty==true){
                        $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                        $s=0;
                        if($value['parameters']['discount_type']=='loyalty'){
                            $s++;
                            }
                            return $s;
                            });

                        $filteredL=$filtered->all();
                        }else{
                        
                        $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                        $s=0;
                        if($value['parameters']['discount_type']=='unknown'){
                            $s++;
                            }
                            return $s;
                            });

                        $filteredL=$filtered->all();
                        
                        
                        }
                        
                        
                        
                        
                        @endphp
                        
                        @php $checkPlus=count($filteredE)+count($filteredG)+count($filteredS)+count($filteredL)+count($filteredAll); @endphp
                     
                        
                        @foreach($filteredE as $discounts)
                        

                        @php
                        
                        
                        $disc_total=$disc_total+$discounts['amount']; $i++; @endphp

                        
                <div class="card more-dis">
                        <div class="card-header" id="headingOne1">
                        <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne1{{$discounts['id']}}" aria-expanded="true">
                        <span>
                        <div class="row">

                        <div class="col-md-7 col-7">
                        <div class="check">
                        @if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif 
                        <div>
                        <p class="check-p">@if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>
                        <p class="check-p1" id="check-p1">@lang('home.Explanation') <i class="fa fa-sort-down"></i></p>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-5 col-5 com-euro">
                        <p class="checkp1">@if($discounts['parameters']['unit']=='euro') 
                        &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                        @endif

                        @if($discounts['parameters']['unit']=='eurocent') 
                        &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                        @endif

                        @if($discounts['parameters']['unit']=='pct')
                        &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                        @endif</p>

                        <p class="checkp2">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @else @lang('home.variable') @endif</p>
                        @if($discounts['parameters']['unit']=='eurocent')
                        <p class="amt">{{number_format($discounts['parameters']['value'],2,',', '.')}} €c/kWh </p>
                        @endif
                        @if($discounts['parameters']['unit']=='pct')
                        <p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
                        @endif
                        </div>
                        </div>
                        </span>
                        </button>
                        </h2>
                        </div>

                        <div id="collapseOne1{{$discounts['id']}}" class="collapse multi-collapse" aria-labelledby="headingOne1" data-parent="#accordionExample">
                        <div class="card-body">
                        <p><b><?php echo $discounts['name']; ?></b><br><?php echo $discounts['description']; ?>.</p>
                        </div>
                        </div>
                </div>
      @endforeach  


               @foreach($filteredG as $discounts)
                        @php  $disc_total=$disc_total+$discounts['amount']; $i=$i+1; @endphp

                        
        <div class="card more-dis">
            <div class="card-header" id="headingOne1">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne1{{$discounts['id']}}" aria-expanded="true">
                        <span>
                            <div class="row">
                                
                                <div class="col-md-7 col-7">
                                    <div class="check">
                                        @if($discounts['parameters']['discount_type']=='servicelevel')
                                            <p><i class="fas fa-at"></i> Beperkte dienstverlening</p>
                                        @elseif($discounts['parameters']['discount_type']=='loyalty')
                                            <p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}">Getrouwheidskorting</p>
                                        @else
                                            @if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif 
                                        @endif
                                        <div>
                                            <p class="check-p">@if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>
                                            <p class="check-p1" id="check-p1">@lang('home.Explanation') <i class="fa fa-sort-down"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-5 com-euro">
                                    <p class="checkp1">@if($discounts['parameters']['unit']=='euro') 
                                    &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                                    @endif

                                    @if($discounts['parameters']['unit']=='eurocent') 
                                    &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                                    @endif

                                    @if($discounts['parameters']['unit']=='pct')
                                    &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                                    @endif</p>

                                    <p class="checkp2">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @else @lang('home.variable') @endif</p>
                                    @if($discounts['parameters']['unit']=='eurocent')
                                    <p class="amt">{{number_format($discounts['amount']['value'],2,',', '.')}} €c/kWh </p>
                                    @endif
                                    @if($discounts['parameters']['unit']=='pct')
                                    <p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
                                     @endif
                                </div>
                            </div>
                        </span>
                    </button>
                </h2>
            </div>

            <div id="collapseOne1{{$discounts['id']}}" class="collapse multi-collapse" aria-labelledby="headingOne1" data-parent="#accordionExample">
                <div class="card-body">
                    <p><b><?php echo $discounts['name']; ?></b><br><?php echo $discounts['description']; ?>.</p>
                </div>
            </div>
        </div>
      @endforeach



               @foreach($filteredAll as $discounts)
                        @php  $disc_total=$disc_total+$discounts['amount']; $i=$i+1; @endphp

                        
        <div class="card more-dis">
            <div class="card-header" id="headingOne1">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne1{{$discounts['id']}}" aria-expanded="true">
                        <span>
                            <div class="row">
                                
                                <div class="col-md-7 col-7">
                                    <div class="check">
                                        @if($discounts['parameters']['discount_type']=='servicelevel')
                                            <p><i class="fas fa-at"></i> Beperkte dienstverlening</p>
                                        @elseif($discounts['parameters']['discount_type']=='loyalty')
                                            <p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}">Getrouwheidskorting</p>
                                        @else
                                            @if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif 
                                        @endif
                                        <div>
                                            <p class="check-p">@if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>
                                            <p class="check-p1" id="check-p1">@lang('home.Explanation') <i class="fa fa-sort-down"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-5 com-euro">
                                    <p class="checkp1">@if($discounts['parameters']['unit']=='euro') 
      &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
      @endif

      @if($discounts['parameters']['unit']=='eurocent') 
      &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
      @endif

      @if($discounts['parameters']['unit']=='pct')
      &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
      @endif</p>
                                   
                                    <p class="checkp2">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @else @lang('home.variable') @endif</p>
      @if($discounts['parameters']['unit']=='eurocent')
      <p class="amt">{{number_format($discounts['amount']['value'],2,',', '.')}} €c/kWh </p>
      @endif
      @if($discounts['parameters']['unit']=='pct')
      <p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
      @endif
                                </div>
                            </div>
                        </span>
                    </button>
                </h2>
            </div>

            <div id="collapseOne1{{$discounts['id']}}" class="collapse multi-collapse" aria-labelledby="headingOne1" data-parent="#accordionExample">
                <div class="card-body">
                    <p><b><?php echo $discounts['name']; ?></b><br><?php echo $discounts['description']; ?>.</p>
                </div>
            </div>
        </div>
      @endforeach


      @foreach($filteredS as $discounts)
      @php  $disc_total=$disc_total+$discounts['amount']; $i=$i+1; @endphp

                        
        <div class="card more-dis">
            <div class="card-header" id="headingOne1">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne1{{$discounts['id']}}" aria-expanded="true">
                        <span>
                            <div class="row">
                                
                                <div class="col-md-7 col-7">
                                    <div class="check">
                                        @if($discounts['parameters']['discount_type']=='servicelevel')
                                            <p><i class="fas fa-at"></i> </p>
                                        @elseif($discounts['parameters']['discount_type']=='loyalty')
                                            <p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}"></p>
                                        @else
                                       @if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif 
                                        @endif
                                        <div>
                                             @if($discounts['parameters']['discount_type']=='servicelevel')
                                             <p class="check-p">Beperkte dienstverlening</p>
                                              @elseif($discounts['parameters']['discount_type']=='loyalty')
                                             <p class="check-p">Getrouwheidskorting</p>
                                             @else
                                            <p class="check-p">@if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>
                                             @endif
                                            <p class="check-p1" id="check-p1">@lang('home.Explanation') <i class="fa fa-sort-down"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-5 com-euro">
                                  <p class="checkp1">@if($discounts['parameters']['unit']=='euro') 
                                  &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                                  @endif

                                  @if($discounts['parameters']['unit']=='eurocent') 
                                  &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                                  @endif

                                  @if($discounts['parameters']['unit']=='pct')
                                  &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                                  @endif</p>

                                  <p class="checkp2">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @else @lang('home.variable') @endif</p>
                                  @if($discounts['parameters']['unit']=='eurocent')
                                  <p class="amt">{{number_format($discounts['parameters']['value'],2,',', '.')}} €c/kWh </p>
                                  @endif
                                  @if($discounts['parameters']['unit']=='pct')
                                  <p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
                                  @endif
                                </div>
                            </div>
                        </span>
                    </button>
                </h2>
            </div>

            <div id="collapseOne1{{$discounts['id']}}" class="collapse multi-collapse" aria-labelledby="headingOne1" data-parent="#accordionExample">
                <div class="card-body">
                    <p><b><?php echo $discounts['name']; ?></b><br><?php echo $discounts['description']; ?>.</p>
                </div>
            </div>
        </div>
      @endforeach

        @foreach($filteredL as $discounts)
        @php  $disc_total=$disc_total+$discounts['amount']; $i=$i+1; @endphp

                        
        <div class="card more-dis">
            <div class="card-header" id="headingOne1">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne1{{$discounts['id']}}" aria-expanded="true">
                        <span>
                            <div class="row">
                                
                                <div class="col-md-7 col-7">
                                    <div class="check">
                                        @if($discounts['parameters']['discount_type']=='servicelevel')
                                            <p><i class="fas fa-at"></i> </p>
                                        @elseif($discounts['parameters']['discount_type']=='loyalty')
                                            <p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}"></p>
                                        @else
                                       @if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif 
                                        @endif
                                        <div>
                                             @if($discounts['parameters']['discount_type']=='servicelevel')
                                             <p class="check-p">Beperkte dienstverlening</p>
                                              @elseif($discounts['parameters']['discount_type']=='loyalty')
                                             <p class="check-p">Getrouwheidskorting</p>
                                             @else
                                            <p class="check-p">@if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>
                                             @endif
                                            <p class="check-p1" id="check-p1">@lang('home.Explanation') <i class="fa fa-sort-down"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-5 com-euro">
                              <p class="checkp1">@if($discounts['parameters']['unit']=='euro') 
                              &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                              @endif

                              @if($discounts['parameters']['unit']=='eurocent') 
                              &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                              @endif

                              @if($discounts['parameters']['unit']=='pct')
                              &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                              @endif</p>

                              <p class="checkp2">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @else @lang('home.variable') @endif</p>
                              @if($discounts['parameters']['unit']=='eurocent')
                              <p class="amt">{{number_format($discounts['parameters']['value'],2,',', '.')}} €c/kWh </p>
                              @endif
                              @if($discounts['parameters']['unit']=='pct')
                              <p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
                                @endif
                                </div>
                            </div>
                        </span>
                    </button>
                </h2>
            </div>

            <div id="collapseOne1{{$discounts['id']}}" class="collapse multi-collapse" aria-labelledby="headingOne1" data-parent="#accordionExample">
                <div class="card-body">
                    <p><b><?php echo $discounts['name']; ?></b><br><?php echo $discounts['description']; ?>.</p>
                </div>
            </div>
        </div>
      @endforeach
        

        
      @if($disc_total!=0)     
        <div class="row sec-total">
            <div class="col-md-6 col-6 dis-total-elec-gas">
                <p class="total-head">@lang('home.Total') @lang('home.Discounts')</p>
                <p class="gas-elec-dis">
                  @if($parameters['values']['comparison_type']=="electricity")  @lang('home.Electricity') @endif
                  @if($parameters['values']['comparison_type']=="gas")  @lang('home.Gas') @endif
                  @if($parameters['values']['comparison_type']=="pack")  @lang('home.Gas') + @lang('home.Electricity') @endif
                </p>
            </div>
            <div class="col-md-6 col-6">
                <p class="total-dis">&#8364; {{number_format($disc_total,2,',', '.')}}</p>
            </div>
        </div>
      @endif

      </div>
      @if($per1!=0)
      <div class="row dis-btn">
        <div class="col-md-12">
         <form action="{{url('bevestiging')}}" method="get">
            {{csrf_field()}}
            <input type="hidden" name="pri_save" class="pri_save{{$si}}">
            <input type="hidden" name="pro_id"  value="{{$product['id']}}">
            <input type="hidden" name="supplier"  value="{{$supplier['name']}}">
            <input type="hidden" name="product"  value="{{$product['name']}}">
             <input type="hidden" name="pro_type"  value="{{$parameters['values']['comparison_type']}}">
            <input type="hidden" name="type"  value="{{$customer_type}}">
            <input type="hidden" name="postalcode"  value="{{Session::get('postal_code')}}">
            <input type="hidden" name="elect_day" id="" @if (isset($usage_elec_day)) value="{{$usage_elec_day}}" @endif>
            <input type="hidden" name="elect_night" @if (isset($usage_elec_night)) value="{{$usage_elec_night}}" @endif >
            <input type="hidden" name="gas_cons" @if (isset($usage_gas)) value="{{$usage_gas}}" @endif>
            @if($packType=='elecrticity')
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
            @elseif($packType=='gas')
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
            @else
            <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
            @endif
            <input type="hidden" name="from" value="pack" >
              <input type="hidden" name="pr_type" id="pr_type" value="">
            <button type="submit" class="choose1">@lang('home.To_Request')</button>
                              </form>
        </div>
      </div>
      @endif
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="underline">
      <div class="card">
      <div class="card-header" id="headingThree">
      <h5 class="mb-0">
      <button class="tablinks btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree{{$product['id']}}" aria-expanded="false">
      @lang('home.Product_Description') <span class="arrow-down"><i class="fa fa-chevron-down"></i></i></span>
      </button>
      </h5>
      </div>
      <div id="collapseThree{{$product['id']}}" class="collapse multi-collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">

      <div class="row product-tab mt-4">
      <div class="col-md-12">
                    
                    <h5>{{$supplier['name']}} - {{$product['name']}}:</h5>
                    
                     @php 
                    $desc=explode(" - ",$product['description']);
                    @endphp
        <ul class="mt-2">
            @foreach($desc as $descs)
       @if($descs)<li class="product-desc-i">@php echo $descs; @endphp</li>@endif
           @endforeach
               </ul>
               
              
                </div>
      </div>
      <div class="row product-tab-btn">
      <div class="col-md-12 text-right">
            <form action="{{url('bevestiging')}}" method="get">
            {{csrf_field()}}
            <input type="hidden" name="pri_save" class="pri_save{{$si}}">
            <input type="hidden" name="pro_id"  value="{{$product['id']}}">
            <input type="hidden" name="supplier"  value="{{$supplier['name']}}">
            <input type="hidden" name="product"  value="{{$product['name']}}">
             <input type="hidden" name="pro_type"  value="{{$parameters['values']['comparison_type']}}">
            <input type="hidden" name="type"  value="{{$customer_type}}">
            <input type="hidden" name="postalcode"  value="{{Session::get('postal_code')}}">
            <input type="hidden" name="elect_day" id="" @if (isset($usage_elec_day)) value="{{$usage_elec_day}}" @endif>
            <input type="hidden" name="elect_night" @if (isset($usage_elec_night)) value="{{$usage_elec_night}}" @endif >
            <input type="hidden" name="gas_cons" @if (isset($usage_gas)) value="{{$usage_gas}}" @endif>
            @if($packType=='elecrticity')
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
            @elseif($packType=='gas')
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
            @else
            <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
            @endif
            <input type="hidden" name="from" value="pack" >
              <input type="hidden" name="pr_type" id="pr_type" value="">
            <button type="submit" class="choose1">@lang('home.To_Request')</button>
          </form>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="underline">
      <div class="card">
      <div class="card-header" id="headingThree">
      <h5 class="mb-0">
      <button class="tablinks btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour{{$product['id']}}" aria-expanded="false">
      @lang('home.Contract_Details') <span class="arrow-down"><i class="fa fa-chevron-down"></i></i></span>
      </button>
      </h5>
      </div>
      <div id="collapseFour{{$product['id']}}" class="collapse multi-collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      <div id="" class="">
      <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="duration-sec">
                        <h5>@lang('home.Duration')</h5>
                        <p class="year">{{$product['contract_duration']}} @lang('home.Year')</p>
                        <p class="year-p-1">
                            @lang('home.After_the_first')
                        </p>
      <!--                                                    <a class="more-info" href="#">@lang('home.More_info')</a>-->
                    </div>
                     <div class="pri-type-sec">
                        <div class="pri-type-1 pri-type">
                          <div class="pri-type-left-1 pri-type-left">
                              @if($product['type']=='pack')
                              <div><i class="fa fa-bolt"></i>  @lang('home.Electricity')</div>
                              @endif
                          </div>
                          <div class="pri-type-right-1 pri-type-right">
                              @if($product['type']=='pack')
                                <div>@if($product['underlying_products']['electricity']['pricing_type']=='fixed') @lang('home.fixed') @else @lang('home.variable') @endif</div>
                              @endif
                          </div>
                      </div>
                       @if($product['type']=='electricity' || $product['type']=='pack')
                      <div class="pri-type-2 pri-type">
                          <div class="pri-type-left-2 pri-type-left">
                              <div><i class="fa fa-plug"></i> @lang('home.Source_Power')</div>
                          </div>
                          <div class="pri-type-right-2 pri-type-right">
                              <div class=image-sec-pri>@if($product['origin']=='BE' && $product['green_percentage'] > 0 )<img src="{{url('images/bel-flag.png')}}">@endif {{$product['green_percentage']}}% @if($product['origin'] !='BE') @lang('home.green') @endif @if($product['green_percentage']>0 && $product['origin']=='BE') @lang('home.green_from_Belgium') @endif</div>
                          </div>
                      </div>
                      @endif
                      <div class="pri-type-3 pri-type">
                          <div class="pri-type-left-3 pri-type-left">
                              @if($product['type']=='pack')
                              <!--<li><i class="fa fa-fire"></i> @lang('home.Gas')</li>-->
                              <div><i class="fa fa-fire"></i> @lang('home.pricetab_gas')</div>
                              @endif
                          </div>
                          <div class="pri-type-right-3 pri-type-right">
                              @if($product['type']=='pack')
                              <div>@if($product['underlying_products']['gas']['pricing_type']=='fixed') @lang('home.fixed') @else @lang('home.variable') @endif</div>
                              @endif
                          </div>
                      </div>
                      <div class="pri-type-4 pri-type">
                          <div class="pri-type-left-4 pri-type-left">
                              @if($product['type']=='electricity')
                                  <div><i class="fa fa-bolt"></i> @lang('home.Electricity') </div>
                              @endif
                          </div>
                          <div class="pri-type-right-4 pri-type-right">
                              @if($product['type']=='electricity')
                                  <div>@if($product['pricing_type']=='fixed') @lang('home.fixed') @else @lang('home.variable') @endif</div>
                              @endif
                          </div>
                      </div>
                      <div class="pri-type-5 pri-type">
                          <div class="pri-type-left-5 pri-type-left">
                              @if($product['type']=='gas')
                                  <div><i class="fa fa-fire"></i> Aardgas</div>
                              @endif
                          </div>
                          <div class="pri-type-right-5 pri-type-right">
                              @if($product['type']=='gas')
                                  <div>@if($product['pricing_type']=='fixed') @lang('home.fixed') @else @lang('home.variable') @endif</div>
                              @endif
                          </div>
                      </div>
                    </div>
                    <div class="contract-for">
                        <h5>@lang('home.Who_is_this')</h5>
                          @if(Session::get('customer_type') == 'residential') 

                          @php                                               
                          if(Session::get('locale')=='fr'){
                          $string=$feature[2]['FR_description'];
                          }else{
                          $string=$feature[2]['NL_description'];
                          }
                          $replace = ['{duration}'];
                          $duration=$price['validity_period']['end'];
                          $info = [
                          'duration' => $duration,
                          ];

                          @endphp
                          <p>@lang('home.This_contract_residential_users_only') {{strtolower(trans('home.residential'))}} </p>
                          @if($parameters['values']['digital_meter']==1)
                          <p>@if(Session::get('locale')=='fr'){{$feature[9]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[9]['NL_description']}} @endif</p>

                          @endif
                          <p>{{$product['tariff_description']}}</p>
                          @else
                          <p>@if(Session::get('locale')=='fr'){{$feature[3]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[3]['NL_description']}} @endif</p>
                          @endif
                          <div class="contract-style">
                          @if($product['customer_condition']=='EV' ) 
                          <p>@if(Session::get('locale')=='fr'){{$feature[5]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[5]['NL_description']}} @endif</p>
                          @elseif($product['customer_condition']=='PV' )
                          <p>@if(Session::get('locale')=='fr'){{$feature[6]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[6]['NL_description']}} @endif</p>
                          @elseif($product['customer_condition']=='CH' )
                          <p>@if(Session::get('locale')=='fr'){{$feature[7]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[7]['NL_description']}} @endif</p>
                          @elseif($product['customer_condition']=='COMP' )
                          <p>@if(Session::get('locale')=='fr'){{$feature[8]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[8]['NL_description']}} @endif</p>
                          @else
                          <p></p>
                          @endif 
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="particular">
                        <h5>@lang('home.Particular_Conditions')</h5>
                       @if($product['ff_pro_rata'] == 'Y')
                        
                        <ul class="parti">
                            <li class="info"><i class="fas fa-info-circle"></i></li>
                            
                            @if(Session::get('locale')=='fr')
                            <li> {{$feature[0]['FR_description']}} </li>
                            @else 
                            <li> {{$feature[0]['NL_description']}} </li>
                            @endif
                            
                        </ul>
                        
                         @else
                         
                         <ul class="parti">
                            <li class="info"><i class="fas fa-info-circle"></i></li>
                           
                            @if(Session::get('locale')=='fr')
                            <li> {{$feature[1]['FR_description']}} </li>
                            @else 
                            <li> {{$feature[1]['NL_description']}} </li>
                            @endif
                            
                        </ul>
                        
                        @endif
                      
                              <p>
                              @if(Session::get('locale')=='fr')
                              En principe, une redevance fixe vous sera chargée pro rata la durée de votre fourniture. Par exemple: si vous restez que 6 mois, la redevance fixe sera chargée pour la moitié.</br>

                              Certain fournisseurs appliquent une autre règle pour la première année de fourniture.</br>
                              En général il est râre que cela vaut la peine de changer de fournisseur en moins d’un an, mais si vous le souhaitez, tenez bien compte de cette règle. Plus d’info sur notre

                              <a class="parti-a" href="https://www.veriftarif.be/energie/faq" target="_blank">FAQ</a>
                              @else 
                              In principe wordt een vaste vergoeding pro rata de duurtijd van je leveringscontract aangerekend. Bijvoorbeeld: als je na 6 maanden vertrekt, wordt de vaste vergoeding voor de helft aangerekend.</br>

                              Sommige leveranciers passen een andere regel toe voor het eerste leveringsjaar.</br> 
                              In de praktijk is het zelden zinvol om binnen het eerste jaar opnieuw te veranderen, maar als de vaste vergoeding volledig wordt aangerekend hou je daar best rekening mee. Meer info in onze

                              <a class="parti-a" href="https://www.tariefchecker.be/energie/faq" target="_blank">FAQ</a>
                              @endif

                              </p>
                    </div>
                    <div class="service-limitations">
                       <h5>@lang('home.Service_limitations')</h5>
                        @if($product['service_level_payment'] == 'free' && $product['service_level_invoicing'] == 'free' && $product['service_level_contact'] == 'free')
                        <p>@if(Session::get('locale')=='fr'){{$service[0]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[0]['NL_description']}}@endif </p>
                        @elseif($product['service_level_payment'] == 'domi' && $product['service_level_invoicing'] == 'free' && $product['service_level_contact'] == 'free')
                        <p>@if(Session::get('locale')=='fr'){{$service[1]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[1]['NL_description']}} @endif</p>
                        @elseif($product['service_level_payment'] == 'prepaid')
                        <p>@if(Session::get('locale')=='fr'){{$service[2]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[2]['NL_description']}} @endif</p>
                        @elseif($product['service_level_payment'] == 'free' && $product['service_level_invoicing'] == 'email' && $product['service_level_contact'] == 'free')
                        <p>@if(Session::get('locale')=='fr'){{$service[3]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[3]['NL_description']}} @endif</p>
                        @elseif($product['service_level_payment'] == 'domi' && $product['service_level_invoicing'] == 'email' && $product['service_level_contact'] == 'free')
                        <p>@if(Session::get('locale')=='fr'){{$service[4]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[4]['NL_description']}}@endif</p>
                        @elseif($product['service_level_payment'] == 'free' && $product['service_level_invoicing'] == 'free' && $product['service_level_contact'] == 'online')
                        <p>@if(Session::get('locale')=='fr'){{$service[5]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[5]['NL_description']}}@endif</p>
                        @elseif($product['service_level_payment'] == 'domi' && $product['service_level_invoicing'] == 'free' && $product['service_level_contact'] == 'online')
                        <p>@if(Session::get('locale')=='fr'){{$service[6]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[6]['NL_description']}}@endif</p>
                        @elseif($product['service_level_payment'] == 'free' && $product['service_level_invoicing'] == 'email' && $product['service_level_contact'] == 'online')
                        <p>@if(Session::get('locale')=='fr'){{$service[7]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[7]['NL_description']}}@endif</p>
                        @else($product['service_level_payment'] == 'domi' && $product['service_level_invoicing'] == 'email' && $product['service_level_contact'] == 'online')
                        <p>@if(Session::get('locale')=='fr'){{$service[8]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[8]['NL_description']}}@endif</p>
                        

                        @endif
                    </div>
                    <div class="documents">
                        <h5>@lang('home.Documents')</h5>
                        <ul>
                        @if($product['type']=='pack') 
                                <li><a href="{{$product['underlying_products']['electricity']['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Electricity')</a></li>
                                <li><a href="{{$product['underlying_products']['gas']['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Gas')</a></li>
                                <li><a href="{{$product['terms_url']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_General_conditions')</a></li>
                            @elseif ($product['type']=='electricity')
                                <li><a href="{{$product['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Electricity')</a></li>
                                <li><a href="{{$product['terms_url']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_General_conditions')</a></li>
                            @elseif ($product['type']=='gas')
                                <li><a href="{{$product['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Gas')</a></li>
                                <li><a href="{{$product['terms_url']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_General_conditions')</a></li>
                            @else
                                <li><a href="{{$product['terms_url']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_General_conditions')</a></li>
                            @endif
                            </ul>
                    </div>
                    <div class="request float-right">
                        
                <form action="{{url('bevestiging')}}" method="get">
            {{csrf_field()}}
            <input type="hidden" name="pri_save" class="pri_save{{$si}}">
            <input type="hidden" name="pro_id"  value="{{$product['id']}}">
            <input type="hidden" name="supplier"  value="{{$supplier['name']}}">
            <input type="hidden" name="product"  value="{{$product['name']}}">
             <input type="hidden" name="pro_type"  value="{{$parameters['values']['comparison_type']}}">
            <input type="hidden" name="type"  value="{{$customer_type}}">
            <input type="hidden" name="postalcode"  value="{{Session::get('postal_code')}}">
            <input type="hidden" name="elect_day" id="" @if (isset($usage_elec_day)) value="{{$usage_elec_day}}" @endif>
            <input type="hidden" name="elect_night" @if (isset($usage_elec_night)) value="{{$usage_elec_night}}" @endif >
            <input type="hidden" name="gas_cons" @if (isset($usage_gas)) value="{{$usage_gas}}" @endif>
            @if($packType=='elecrticity')
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
            @elseif($packType=='gas')
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
            @else
            <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
            @endif
            <input type="hidden" name="from" value="pack" >
              <input type="hidden" name="pr_type" id="pr_type" value="">
            <button type="submit" class="choose1">@lang('home.To_Request')</button>
                              </form>
                    </div>
                </div>
            </div>
      </div>


        



      </div>
      </div>


      </div>
      </div>


      <div class="underline history">
          <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                   <button class="tablinks btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive{{$product['id']}}" aria-expanded="false">
                  @lang('home.history')<span class="arrow-down"><i class="fa fa-chevron-down"></i></i></span>
                  </button>
                </h5>
              </div>
              <div id="collapseFive{{$product['id']}}" class="collapse multi-collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                  <div id="" class="">
                    <div class="row">
                      <div class="col-md-6 col-lg-6 col-sm-6">
                        <div class="duration-sec">
                               
                  

                  <div class="a1{{$product['id']}}" style="display: none">
                  <p>Het is opnieuw tijd voor de kwartaalcheck van jouw energietarieven.</p>
                  <p>De vraag: <b>zit je nog goed?</b></p>
                  <p>Het antwoord: <b>JA</b></p>
                  <p>De energiemarkten zijn eerder duurder geworden, en je huidige tarieven zijn scherper dan de beste aanbiedingen op dit moment. Er is dus geen actie vereist</p>
                  <p>Over drie maanden volgt je volgende check. </p>
                  </div>

                  <div class="a2{{$product['id']}}" style="display: none">
                  <p>Het is opnieuw tijd voor de kwartaalcheck van jouw energietarieven.</p>
                  <p>De vraag: <b>zit je nog goed?</b></p>
                  <p>Het antwoord: <b>JA</b></p>
                  <p>De energiemarkten zijn ietsje goedkoper geworden, maar als je nu overstapt verlies je de kortingen op je huidige contract, waardoor je uiteindelijk toch duurder zou uitkomen. Er is dus geen actie vereist.</p>
                  <p>Over drie maanden volgt je volgende check. </p>
                  </div>

                  <div class="b1{{$product['id']}}" style="display: none">
                  <p>Het is opnieuw tijd voor de kwartaalcheck van jouw energietarieven.</p>
                  <p>De vraag: <b>zit je nog goed?</b></p>
                  <p>Het antwoord: <b>JA</b></p>
                  <p>De scherpste aanbieding is goedkoper geworden dan je huidige tarieven, en aangezien de kortingen van je huidige contract pro rata zijn kan je overstappen zonder die kortingen te verliezen.</p>

                  <p>Het goedkoopste tarief op dit ogenblik is [PRODUCT NAME] van [SUPPLIER NAME] en is [IMPACT TOTAL] goedkoper dan je huidige tarieven. Klik hier [LINK] als je wil aangaan op het nieuwe aanbod. Het is geldig tot [VALIDITY].</p>
                  <p>Link niet klikbaar, kopieer de volgende link in je browser: [SIGNUP URL].</p>
                  <p>Als je opnieuw overstapt worden je data in onze systemen voor de kwartaalcheck gereset, en anders gaan we gewoon door met je huidige voor de volgende kwartaalcheck.
                  </p>
                  
                  </div>

                  <div class="b2{{$product['id']}}" style="display: none">
                  <p>Het is opnieuw tijd voor de kwartaalcheck van jouw energietarieven.</p>
                  <p>De vraag: <b>zit je nog goed?</b></p>
                 
                  <p>Het antwoord: NEEN, je kan [TOTAL IMPACT] euro besparen</p>
                  <p>De scherpste aanbieding is [IMPACT MARKET] euro goedkoper dan jouw huidige tarieven. De kortingen die bij je huidige contract horen zullen vervallen als je zou overstappen, maar de winst is groter dan het verlies.</p>
                  <p>Het goedkoopste tarief op dit ogenblik is [PRODUCT NAME] van [SUPPLIER NAME] en is [IMPACT TOTAL] goedkoper dan je huidige tarieven. Klik hier [LINK] als je wil aangaan op het nieuwe aanbod. Het is geldig tot [VALIDITY].</p>
                  <p>Link niet klikbaar, kopieer de volgende link in je browser: [SIGNUP URL].</p>
                  <p>Als je opnieuw overstapt worden je data in onze systemen voor de kwartaalcheck gereset, en anders gaan we gewoon door met je huidige voor de volgende kwartaalcheck.</p>

                  </div>

            
                        </div>
                      </div>
                    </div>
                  </div>
                </div>     
              </div>
          </div>
        </div>

      </div>

      </div>                   
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"></div>

      <div class="row part-last">
      <div class="col-md-6 compare">
        <input aria-label="compare" type="checkbox"  class="compare myCheck{{$product['id']}}" name="compare" value="{{$product['id']}}"> @lang('home.Compare')<br>
      </div>
      <div class="col-md-6 sec-3-btn more-det" data-id="{{$product['id']}}">
        <button id="myButton1" data-supplier="{{$supplier['name']}}" data-product="{{$product['name']}}"  class="more-details more1 "><i class="fas fa-sort-down"></i> @lang('home.More_details')</button>
      </div>
      </div>

      </div>
      <!-- End of listing-1 -->

      </div>

      <script>
      $(document).ready(function(){

      var a=$('#month').hasClass('active');
      var b=$('#year').hasClass('active');

      if(a==true) {
      $('.month').addClass("active");
      $('.years').removeClass("active");
      $('.month').css('display', 'block');
      $('.years').css('display', 'none');
      };

      if(b==true){
      $('.years').addClass("active");
      $('.month').removeClass("active");
      $('.years').css('display', 'block');
      $('.month').css('display', 'none');
      };


      $(".disctab-active").click(function() { 
      $(".discountact").addClass('active')            
      });
      });

      </script>
          
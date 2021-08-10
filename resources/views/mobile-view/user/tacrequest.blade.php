<!DOCTYPE html>

<html> 
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/5371eb2245.js"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/teriefchecker.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/tcrequest.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css')}}">
        @if(Session::get('locale')=='nl') 
                <title>Bevestigen</title>
            @else
                <title>Confirmation</title>
            @endif
    </head>
    <body>
        
        <div class="tcrequest">
            @include('mobile-view.home.includes.header')
           
           
           @php 
           

$date = new DateTime('now');
$modifiedDate=$date->modify('last day of this month');
$endofMonth=$date->format('d/m/Y');
           
           @endphp
           
           @if($selected['packData'])
            @foreach($selected['packData'] as $product)
           
            <div class="container-fluid" style="background-image: url('/images/{{$request_banner_image->banner_image}}');">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="header-banner">
                            <div class="content text-center">
                                 @php


                               $string1 = trans("home.request_page");
                               $replace1 = ['{X13}','{X14}'];
                               $info1 = [
                               'X13' => $product['supplier']['name'],
                               'X14' => $product['product']['name'],
                               ];

                           
                               @endphp
			
                                <h3 class="reqest-banner">{{str_replace($replace1, $info1, $string1)}} <br></h3>
                                <h3 class="reqest-banner-2">{{$product['supplier']['name']}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
            @endif
            
           
            
            @if($selected['eleData'] && !$selected['gasData'])
            
            @foreach($selected['eleData'] as $product)
           
            <div class="container-fluid" style="background-image: url('/images/{{$request_banner_image->banner_image}}');">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="header-banner">
                            <div class="content text-center">
                                 @php


                               $string1 = trans("home.request_page");
                               $replace1 = ['{X13}','{X14}'];
                               $info1 = [
                               'X13' => $product['supplier']['name'],
                               'X14' => $product['product']['name'],
                               ];

                           
                               @endphp
			
                                <h3 class="reqest-banner">{{str_replace($replace1, $info1, $string1)}} <br></h3>
                                <h3 class="reqest-banner-2">{{$product['supplier']['name']}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
            @endif
            
           
            
            @if($selected['gasData'] && !$selected['eleData'])
            @foreach($selected['gasData'] as $product)
           
            <div class="container-fluid" style="background-image: url('/images/{{$request_banner_image->banner_image}}');">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="header-banner">
                            <div class="content text-center">
                                 @php


                               $string1 = trans("home.request_page");
                               $replace1 = ['{X13}','{X14}'];
                               $info1 = [
                               'X13' => $product['supplier']['name'],
                               'X14' => $product['product']['name'],
                               ];

                           
                               @endphp
			
                                <h3 class="reqest-banner">{{str_replace($replace1, $info1, $string1)}} <br></h3>
                                <h3 class="reqest-banner-2">{{$product['supplier']['name']}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
            @endif
             
            
            @if($selected['gasData'] && $selected['eleData'])
            
            
            @foreach($selected['eleData'] as $product)
           
            <div class="container-fluid" style="background-image: url('/images/{{$request_banner_image->banner_image}}');">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="header-banner">
                            <div class="content text-center">
                                 @php


                               $string1 = trans("home.request_page");
                               $replace1 = ['{X13}','{X14}'];
                               $info1 = [
                               'X13' => $product['supplier']['name'],
                               'X14' => $product['product']['name'],
                               ];

                           
                               @endphp
			
                                <h3 class="reqest-banner">{{str_replace($replace1, $info1, $string1)}} <br></h3>
                                <h3 class="reqest-banner-2">{{$product['supplier']['name']}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
            @endif
            
            
            
            <div class="bg-sec-2">
                
            
        <!--side section-->
        
          <div class="inner-box-full">
             
        @if($selected['packData'])
        @foreach($selected['packData'] as $product)
            <div class="container inner-box">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="row Box">
                            


                            <div class="col-md-4">
                                <div class="right-box">
                                    <img src="{{$product['supplier']['logo']}}" alt="boxtop">
                                    <h6 class="font-weight-bold">{{$product['supplier']['name']}} - {{$product['product']['name']}}</h6>
                                    <ul class="box-top">
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                           @if($product['product']['type']=='pack') @lang('home.Gas') + @lang('home.Electricity') @elseif($product['product']['type']=='gas') @lang('home.Gas') @else @lang('home.Electricity')  @endif
                                        </li>
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                           
                                            @if(Session::get('locale')=='nl') 
                                                @if($product['product']['type']=='pack') @if($product['product']['pricing_type']=='Fix') @lang('home.fixed') (E) @else @lang('home.variable') (E) @endif (E) + @if($product['product']['pricing_type']=='Fix') @lang('home.fixed') (G) @else @lang('home.variable') (G) @endif (G)  @else {{$product['product']['pricing_type']}} @endif 
                                            @else
                                                @if($product['product']['type']=='pack') @if($product['product']['pricing_type']=='Fix')  @lang('home.fixed') (E) @else  @lang('home.variable') (E) @endif (E) + @if($product['product']['pricing_type']=='Fix') @lang('home.fixed') (G) @else @lang('home.variable') (G) @endif (G)  @else {{$product['product']['pricing_type']}} @endif
                                            @endif
                                        </li>
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                           @if($product['product']['green_percentage']==100 && $product['product']['origin'] == 'BE') <img src="{{url('images/flag.png')}}" alt="flag"> @endif
                                            {{$product['product']['green_percentage']}}% @lang('home.green')
                                        </li>
                                    </ul>
                                    <div class="cost">
                                        <div class="row">
                                            
                                            
                                            
                                            
                                            @if($data['pri_save'])
                                            
                                                <div class="col-md-6 saving-sec-req">
                                                    <span>@lang('home.Savings_Year')</span><br>
                                                    <h5 class="font-weight-sec">&#8364; @php $prc=$data['pri_save'];  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                                </div>
                                            
                                             @endif
                                             
                                                <div class="@if($data['pri_save']) col-md-6 @else col-md-12 @endif  cost-sec-req" style="text-align: center;">
                                                    
                                                    
                                                    @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                      
                                                              @php       
                
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')!='true'){
                
               
                 $prc=$product['price']['totals']['year']['incl_promoD'];
            }
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_slD'];
                
            }
            if(Session::get('promo')!='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                $prc=$product['price']['totals']['year']['incl_loyaltyD'];
               
                
            }
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_promoD_slD'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_promoD_loyaltyD'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                $prc=$product['price']['totals']['year']['incl_promoD_slD_loyaltyD'];
                
                
            }
            
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_slD_loyaltyD'];
                
            }
            
            @endphp
                                                      
                                                      
                                                       <span class="cost2"> @lang('home.All_in_costs_Year') </span><br>
                                                        <h5 class="cost2  cost2-bold">&#8364; @php $prc1=number_format($prc,2,',', '.');   $sp_price=preg_split("/,/",$prc1)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                                    @else
                                                        <span class="cost2 cost4"> @lang('home.All_in_costs_Year') </span><br>
                                                        <h5 class="cost3  cost2-bold">&#8364; @php $prc=number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                                    @endif
                                                </div> 
                                            
                                        </div>
<!--                                        <ul>
                                            @if($data['pri_save'])
                                            <li>
                                                <span>savings / Year</span><br>
                                                <h5 class="font-weight-bold"><i class="fa fa-euro-sign"></i> {{$data['pri_save']}}</h5>
                                            </li>
                                            @endif
                                            <li>
                                                <span class="cost2">All in cost / Year</span><br>
                                                <h5 class="cost2 font-weight-bold"><i class="fa fa-euro-sign"></i> {{$product['price']['totals']['year']['incl_promo']}}</h5>
                                            </li>
                                        </ul>-->
                                    </div>
                                    @php
                                        $total_discount = 0; 
                                                    
                                        foreach($product['price']['breakdown']['discounts'] as $discount) {
                                            $total_discount = $total_discount + $discount['amount'];
                                        }
                                    @endphp
                                    <div class="bottom-texts">

                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.All_in_costs_Year')</li>
                                            @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @else
                                             <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>
                                          @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                            
                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.One_Time_Discount')</li>
                                            <li class="right right-dis"><strong>-&#8364; {{number_format(($product['price']['totals']['year']['excl_promo']/100)-$prc,2,',', '.')}}</strong></li>
                                        </ul>
                                        @endif
                                        <div class="clear"></div>
                                        <hr class="line-under">

                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.Expected_annual_cost')</li>
                                            @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                            
                                            <li class="right"><strong>&#8364; {{number_format($prc,2,',', '.')}}</strong></li>
                                            @else
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>
                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.Expected_monthly_costs')</li>
                                             @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                            
                                            <li class="right"><strong>&#8364; {{number_format($prc/12,2,',', '.')}}</strong></li>
                                            @else
                                             <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['month']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>

                                        <div class="clear"></div>
                                        <p class="bottom-box-p">* @lang('home.Prices_for_individuals')</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-8">
                                 @php
                               $string2 = trans("home.Switch_Free_and_Direct");
                               $replace2 = ['{SUPPLIER}','{PRODUCT}','{VALIDITYDATE}'];
                              
                               $info2 = [
                               'SUPPLIER' => $product['supplier']['name'],
                               'PRODUCT'=> $product['product']['name'],
                               'VALIDITYDATE'=>Carbon\Carbon::parse($product['price']['validity_period']['end'])->format('d/m/Y')
                               ];
                               
                               $string = trans("home.to_receive_the_prices_and_discountsX15");
                               $replace = ['{X15}'];
                               $info = [
                                'X15'=>Carbon\Carbon::parse($product['price']['validity_period']['end'])->format('d/m/Y')
                               ];
                               @endphp
			
                                <h4>@php echo str_replace($replace2, $info2, $string2); @endphp</h4>
                                <!--<p class="italic-text-sec"><i>* {!!str_replace($replace, $info, $string)!!}</i></p>-->
                                <p class="italic-text-sec"><i>* @lang('home.To_recieve_the') <strong>{{$endofMonth}}</strong></i></p>
                                <div class="row">
                                    <div class="col-md-5 col-sm-5">
                                      
                                        <div id="reg-form">
                                           <form id="request-button">

                                            <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                                                <label id="email-label"> @lang('home.Email_Address') </label>
                                                <input type="email" required="required" id="email" name="email" value="{{$product['parameters']['values']['email']}}">
                                                
                                            </div>
                                            <p id="error_email" style="color: red;"></p>
                                            @if ($errors->has('email'))
                                            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                            <div class="form-group row {{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                                <label> @lang('home.First_name') </label>
                                                <input type="text" required="required" id="firstname" name="firstname" value="{{$product['parameters']['values']['firstname']}}"><br>
                                            </div>
                                            @if ($errors->has('first_name'))
                                            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('first_name') }}</div>
                                            @endif
                                            <div class="form-group row {{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                                <label> @lang('home.Last_name') </label>
                                                <input type="text" required="required" id="lastname" name="lastname" value="{{$product['parameters']['values']['lastname']}}">
                                            </div>
                                            @if ($errors->has('last_name'))
                                            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('last_name') }}</div>
                                            @endif
                                            
                                         
                                          @if(Session::get('url'))
                                          
                                                @if($data['type']=='electricity')
                                             
                                                     @php $eid=$data['egid']; @endphp
                                             
                                                    @else
                                             
                                                    @php $eid=$product['product']['_id']; @endphp
                                            
                                             @endif
                                             
                                                 @if($data['type']=='gas')
                                                 
                                                   @php $gid=$data['egid']; @endphp
                                                
                                                 @else
                                                     @php $gid=$product['product']['_id']; @endphp
                                                     
                                                 @endif
                                          
                                        
                                        
                                           <input type="hidden" class="get_url" value="bevestiging/{{$product['supplier']['name']}}/{{$product['product']['name']}}?type=dual&eid={{$eid}}&gid={{$gid}}&u=@if(isset($_COOKIE['uuid'])){{$_COOKIE['uuid']}}@endif">


                                            
                                             
                                             @if($data['type']=='electricity' && $data['pr_type']=="")
                                             
                                              
                                             <input type="hidden" id="type" name="type" value="gas">
                                             <input type="hidden" id="eid" name="eid" value="{{$data['egid']}}">
                                             @else
                                             <input type="hidden" id="type" name="type" value="dual">
                                             <input type="hidden" id="eid" name="eid" value="{{$product['product']['id']}}">
                                             @endif
                                             
                                             @if($data['type']=='gas' && $data['pr_type']=="")
                                             <input type="hidden" id="type" name="type" value="gas">
                                             <input type="hidden" id="gid" name="gid" value="{{$data['egid']}}">
                                             @else
                                             <input type="hidden" id="type" name="type" value="dual">
                                             <input type="hidden" id="gid" name="gid" value="{{$data['id']}}">
                                             @endif
                                           
                                          
                                             @else
                                          
                                           
                                          <input type="hidden" id="get_url" class="get_url" value="bevestiging/{{$product['supplier']['name']}}/{{$product['product']['name']}}?u=@if(isset($_COOKIE['uuid'])){{$_COOKIE['uuid']}}@endif&type={{$product['parameters']['values']['comparison_type']}}&id={{$product['product']['_id']}}">
                                          <input type="hidden" id="type" name="type" value="{{$product['parameters']['values']['comparison_type']}}">
                                           <input type="hidden" id="id" name="id" value="{{$product['product']['id']}}">
                                          
                                          @endif
                                          
                                          <input type="hidden" id="id" name="id" value="{{$product['product']['id']}}">
               
                                          
                                            @php $arr=Session::get('select-pro'); @endphp
                                             <input type="hidden" id="url1" name="url1" value="{{Session::get('url')}}">

                                            <input type="hidden" id="uuid" name="uuid" value="@if(isset($_COOKIE['uuid'])){{$_COOKIE['uuid']}}@endif">
                                            <input type="hidden" class="locale" name="locale" value="{{Session::get('locale')}}">
                                           
                                           
                                        <p id="msg" style="display:none;color:red;">@lang('home.request_page_submit_error')</p>
                                            <button class="req-btn-new ladda-button" type="submit"  id="request-button-submit" name="submit" value="@lang('home.Submit')" id="send">@lang('home.Submit')&nbsp; &nbsp;&nbsp; <span class="spinner-border" id="loading" style="display:none;"></span></button>


                                     
                                        <p class="message">@lang('home.We_never_give')</p>
                                        <div class="loading_sec_home loading_sec_home_mobile" style="display: none;">
                                           <i class="fas fa-spinner fa-spin fa-3x"></i>
                                         </div>
                                       </form>
                                        </div>
                                       
                                        
                                        <div id="success" style="display:none;color:green;" class="req-sub">
                                            <div class="row mt-10">
                                                <div class="col-md-12 text-center">
                                                    <span class="text-center req-img"><img src="{{url('images/Green-Round-Tick.png')}}" alt=""></span><br>
Uw aanvraag is ingediend 
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-md-6 linkone">
                                                    <span class="req-btn-sec-down link-one"><a href="#">button</a></span>
                                                </div>
                                                <div class="col-md-6 linktwo">
                                                    <span class="req-btn-sec-down link-two"><a href="#">button</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-7 col-sm-7 thumps-up-icon">
                                        <img src="{{url('images/man_image.png')}}" alt="man">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
          
           
              @endforeach 
            @endif
                
                
                
            @if($selected['eleData'] && $selected['gasData'])
             @foreach($selected['eleData'] as $product)
            <div class="container inner-box">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="row Box">
                            


                            <div class="col-md-4">
                                <div class="right-box">
                                    <img src="{{$product['supplier']['logo']}}" alt="boxtop">
                                    <h6 class="font-weight-bold">{{$product['supplier']['name']}} - {{$product['product']['name']}}</h6>
                                    <ul class="box-top">
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                           @if($product['product']['type']=='pack') @lang('home.Gas') + @lang('home.Electricity') @elseif($product['product']['type']=='gas') @lang('home.Gas') @else @lang('home.Electricity')  @endif
                                        </li>
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            @if($product['product']['type']=='pack') @if($product['product']['pricing_type']=='Fix') @lang('home.fixed') (E) @else @lang('home.variable') (E) @endif (E) + @if($product['product']['pricing_type']=='Fix') @lang('home.fixed') (G) @else @lang('home.variable') (G) @endif (G)  @else {{$product['product']['pricing_type']}} @endif 
                                            
                                        </li>
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                           @if($product['product']['green_percentage']==100) <img src="{{url('images/flag.png')}}" alt="flag"> @endif
                                            {{$product['product']['green_percentage']}}% @lang('home.green')
                                        </li>
                                    </ul>
                                    <div class="cost">
                                        <div class="row">
                                            @if($data['pri_save'])
                                            <div class="col-md-6 saving-sec-req">
                                                <span>@lang('home.Savings_Year')</span><br>
                                                <h5 class="font-weight-sec">&#8364; @php $prc=$data['pri_save'];  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                            </div>
                                             @endif
                                             <div class="@if($data['pri_save']) col-md-6 @else col-md-12 @endif  cost-sec-req" style="text-align: center;">
                                                     @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                              @php       
                
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')!='true'){
                
               
                 $prc=$product['price']['totals']['year']['incl_promoD'];
            }
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_slD'];
                
            }
            if(Session::get('promo')!='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                $prc=$product['price']['totals']['year']['incl_loyaltyD'];
               
                
            }
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_promoD_slD'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_promoD_loyaltyD'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                $prc=$product['price']['totals']['year']['incl_promoD_slD_loyaltyD'];
                
                
            }
            
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_slD_loyaltyD'];
                
            }
            
            @endphp
                                                      
                                                       <span class="cost2"> @lang('home.All_in_costs_Year') </span><br>
                                                        <h5 class="cost2  cost2-bold">&#8364; @php $prc1=number_format($prc,2,',', '.');   $sp_price=preg_split("/,/",$prc1)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                                    @else
                                                        <span class="cost2 cost4"> @lang('home.All_in_costs_Year') </span><br>
                                                        <h5 class="cost3  cost2-bold">&#8364; @php $prc=number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                                    @endif
                                                    </div> 
                                            
                                        </div>
<!--                                        <ul>
                                            @if($data['pri_save'])
                                            <li>
                                                <span>savings / Year</span><br>
                                                <h5 class="font-weight-bold"><i class="fa fa-euro-sign"></i> {{$data['pri_save']}}</h5>
                                            </li>
                                            @endif
                                            <li>
                                                <span class="cost2">All in cost / Year</span><br>
                                                <h5 class="cost2 font-weight-bold"><i class="fa fa-euro-sign"></i> {{$product['price']['totals']['year']['incl_promo']}}</h5>
                                            </li>
                                        </ul>-->
                                    </div>
                                    @php
                                        $total_discount = 0; 
                                                    
                                        foreach($product['price']['breakdown']['discounts'] as $discount) {
                                            $total_discount = $total_discount + $discount['amount'];
                                        }
                                    @endphp
                                    <div class="bottom-texts">

                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.All_in_costs_Year')</li>
                                             @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                      
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @else
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>
                                         @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                               
                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.One_Time_Discount')</li>
                                            <li class="right right-dis"><strong>-&#8364; {{number_format(($product['price']['totals']['year']['excl_promo']/100)-$prc,2,',', '.')}}</strong></li>
                                        </ul>
                                        @endif
                                        <div class="clear"></div>
                                        <hr class="line-under">

                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.Expected_annual_cost')</li>
                                             @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                               
                                            <li class="right"><strong>&#8364; {{number_format($prc,2,',', '.')}}</strong></li>
                                            @else
                                             <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>
                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.Expected_monthly_costs')</li>
                                            @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                               
                                            <li class="right"><strong>&#8364; {{number_format($prc/12,2,',', '.')}}</strong></li>
                                            @else
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['month']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>

                                        <div class="clear"></div>
                                        <p class="bottom-box-p">* @lang('home.Prices_for_individuals')</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-8">
                                 @php
                               $string2 = trans("home.Switch_Free_and_Direct");
                               $replace2 = ['{SUPPLIER}','{PRODUCT}','{VALIDITYDATE}'];
                              
                               $info2 = [
                               'SUPPLIER' => $product['supplier']['name'],
                               'PRODUCT'=> $product['product']['name'],
                               'VALIDITYDATE'=>Carbon\Carbon::parse($product['price']['validity_period']['end'])->format('d/m/Y')
                               ];
                               
                               $string = trans("home.to_receive_the_prices_and_discountsX15");
                               $replace = ['{X15}'];
                               $info = [
                                'X15'=>Carbon\Carbon::parse($product['price']['validity_period']['end'])->format('d/m/Y')
                               ];
                               @endphp
			
                                <h4>@php echo str_replace($replace2, $info2, $string2); @endphp</h4>
                                <!--<p class="italic-text-sec"><i>* {!!str_replace($replace, $info, $string)!!}</i></p>-->
                                <p class="italic-text-sec"><i>* @lang('home.To_recieve_the') <strong>{{$endofMonth}}</strong></i></p>
                                <div class="row">
                                    <div class="col-md-5 col-sm-5">
                                      
                                        <div id="reg-form">
                                           <form id="request-button">

                                            <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                                                <label id="email-label"> @lang('home.Email_Address') </label>
                                                <input type="email" required="required" id="email" name="email" value="{{$product['parameters']['values']['email']}}">
                                                
                                            </div>
                                            <p id="error_email" style="color: red;"></p>
                                            @if ($errors->has('email'))
                                            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                            <div class="form-group row {{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                                <label> @lang('home.First_name') </label>
                                                <input type="text" required="required" id="firstname" name="firstname" value="{{$product['parameters']['values']['firstname']}}"><br>
                                            </div>
                                            @if ($errors->has('first_name'))
                                            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('first_name') }}</div>
                                            @endif
                                            <div class="form-group row {{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                                <label> @lang('home.Last_name') </label>
                                                <input type="text" required="required" id="lastname" name="lastname" value="{{$product['parameters']['values']['lastname']}}">
                                            </div>
                                            @if ($errors->has('last_name'))
                                            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('last_name') }}</div>
                                            @endif
                                            
                                         
                                          @if(Session::get('url'))
                                          
                                                @if($data['type']=='electricity')
                                             
                                                     @php $eid=$data['egid']; @endphp
                                             
                                                    @else
                                             
                                                    @php $eid=$product['product']['_id']; @endphp
                                            
                                             @endif
                                             
                                                 @if($data['type']=='gas')
                                                 
                                                   @php $gid=$data['egid']; @endphp
                                                
                                                 @else
                                                     @php $gid=$product['product']['_id']; @endphp
                                                     
                                                 @endif
                                          
                                        
                                        
                                           <input type="hidden" class="get_url" value="bevestiging/{{$product['supplier']['name']}}/{{$product['product']['name']}}?type=dual&eid={{$eid}}&gid={{$gid}}&u=@if(isset($_COOKIE['uuid'])){{$_COOKIE['uuid']}}@endif">


                                            
                                             
                                             @if($data['type']=='electricity' && $data['pr_type']=="")
                                             
                                              
                                             <input type="hidden" id="type" name="type" value="gas">
                                             <input type="hidden" id="eid" name="eid" value="{{$data['egid']}}">
                                             @else
                                             <input type="hidden" id="type" name="type" value="dual">
                                             <input type="hidden" id="eid" name="eid" value="{{$product['product']['id']}}">
                                             @endif
                                             
                                             @if($data['type']=='gas' && $data['pr_type']=="")
                                             <input type="hidden" id="type" name="type" value="gas">
                                             <input type="hidden" id="gid" name="gid" value="{{$data['egid']}}">
                                             @else
                                             <input type="hidden" id="type" name="type" value="dual">
                                             <input type="hidden" id="gid" name="gid" value="{{$data['id']}}">
                                             @endif
                                           
                                          
                                             @else
                                          
                                           
                                          <input type="hidden" id="get_url" class="get_url" value="bevestiging/{{$product['supplier']['name']}}/{{$product['product']['name']}}?u=@if(isset($_COOKIE['uuid'])){{$_COOKIE['uuid']}}@endif&type={{$product['parameters']['values']['comparison_type']}}&id={{$product['product']['_id']}}">
                                          <input type="hidden" id="type" name="type" value="{{$product['parameters']['values']['comparison_type']}}">
                                           <input type="hidden" id="id" name="id" value="{{$product['product']['id']}}">
                                          
                                          @endif
                                          
                                          <input type="hidden" id="id" name="id" value="{{$product['product']['id']}}">
               
                                          
                                            @php $arr=Session::get('select-pro'); @endphp
                                             <input type="hidden" id="url1" name="url1" value="{{Session::get('url')}}">
                                             

                                            <input type="hidden" id="uuid" name="uuid" value="@if(isset($_COOKIE['uuid'])){{$_COOKIE['uuid']}}@endif">
                                           <input type="hidden" id="type" name="type" value="dual">
                                           <input type="hidden" class="locale" name="locale" value="{{Session::get('locale')}}">
                                           
                                        <p id="msg" style="display:none;color:red;">@lang('home.request_page_submit_error')</p>
                                            <button class="req-btn-new ladda-button" type="submit"  id="request-button-submit" name="submit" value="@lang('home.Submit')" id="send">@lang('home.Submit')&nbsp; &nbsp;&nbsp; <span class="spinner-border" id="loading" style="display:none;"></span></button>


                                     
                                        <p class="message">@lang('home.We_never_give')</p>
                                        <div class="loading_sec_home loading_sec_home_mobile" style="display: none;">
                                           <i class="fas fa-spinner fa-spin fa-3x"></i>
                                         </div>
                                       </form>
                                        </div>
                                       
                                        
                                        <div id="success" style="display:none;color:green;" class="req-sub">
                                            <div class="row mt-10">
                                                <div class="col-md-12 text-center">
                                                    <span class="text-center req-img"><img src="{{url('images/Green-Round-Tick.png')}}" alt=""></span><br>
Uw aanvraag is ingediend 
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-md-6 linkone">
                                                    <span class="req-btn-sec-down link-one"><a href="#">button</a></span>
                                                </div>
                                                <div class="col-md-6 linktwo">
                                                    <span class="req-btn-sec-down link-two"><a href="#">button</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-7 col-sm-7 thumps-up-icon">
                                        <img src="{{url('images/man_image.png')}}" alt="man">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
          
           
              @endforeach  
             @endif
             
             
             
             @if($selected['eleData'] && !$selected['gasData'])
             @foreach($selected['eleData'] as $product)
            <div class="container inner-box">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="row Box">
                            


                            <div class="col-md-4">
                                <div class="right-box">
                                    <img src="{{$product['supplier']['logo']}}" alt="boxtop">
                                    <h6 class="font-weight-bold">{{$product['supplier']['name']}} - {{$product['product']['name']}}</h6>
                                    <ul class="box-top">
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                           @if($product['product']['type']=='pack') @lang('home.Gas') + @lang('home.Electricity') @elseif($product['product']['type']=='gas') @lang('home.Gas') @else @lang('home.Electricity')  @endif
                                        </li>
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            @if($product['product']['pricing_type']=='Fix') @lang('home.fixed') @else @lang('home.variable') @endif 
                                            
                                        </li>
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                           @if($product['product']['green_percentage']==100) <img src="{{url('images/flag.png')}}" alt="flag"> @endif
                                            {{$product['product']['green_percentage']}}% @lang('home.green')
                                        </li>
                                    </ul>
                                    <div class="cost">
                                        <div class="row">
                                            @if($data['pri_save'])
                                            <div class="col-md-6 saving-sec-req">
                                                <span>@lang('home.Savings_Year')</span><br>
                                                <h5 class="font-weight-sec">&#8364; @php $prc=$data['pri_save'];  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                            </div>
                                             @endif
                                             <div class="@if($data['pri_save']) col-md-6 @else col-md-12 @endif  cost-sec-req" style="text-align: center;">
                                                     @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                       
                                                              @php       
                
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')!='true'){
                
               
                 $prc=$product['price']['totals']['year']['incl_promoD'];
            }
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_slD'];
                
            }
            if(Session::get('promo')!='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                $prc=$product['price']['totals']['year']['incl_loyaltyD'];
               
                
            }
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_promoD_slD'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_promoD_loyaltyD'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                $prc=$product['price']['totals']['year']['incl_promoD_slD_loyaltyD'];
                
                
            }
            
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_slD_loyaltyD'];
                
            }
            
            @endphp 
                                                       
                                                       <span class="cost2"> @lang('home.All_in_costs_Year') </span><br>
                                                        <h5 class="cost2  cost2-bold">&#8364; @php $prc1=number_format($prc,2,',', '.');   $sp_price=preg_split("/,/",$prc1)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                                    @else
                                                        <span class="cost2 cost4"> @lang('home.All_in_costs_Year') </span><br>
                                                        <h5 class="cost3  cost2-bold">&#8364; @php $prc=number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                                    @endif
                                                      </div> 
                                            
                                        </div>
<!--                                        <ul>
                                            @if($data['pri_save'])
                                            <li>
                                                <span>savings / Year</span><br>
                                                <h5 class="font-weight-bold"><i class="fa fa-euro-sign"></i> {{$data['pri_save']}}</h5>
                                            </li>
                                            @endif
                                            <li>
                                                <span class="cost2">All in cost / Year</span><br>
                                                <h5 class="cost2 font-weight-bold"><i class="fa fa-euro-sign"></i> {{$product['price']['totals']['year']['incl_promo']}}</h5>
                                            </li>
                                        </ul>-->
                                    </div>
                                    @php
                                        $total_discount = 0; 
                                                    
                                        foreach($product['price']['breakdown']['discounts'] as $discount) {
                                            $total_discount = $total_discount + $discount['amount'];
                                        }
                                    @endphp
                                    <div class="bottom-texts">

                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.All_in_costs_Year')</li>
                                             @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                     
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @else
                                             <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>
                                          @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                 
                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.One_Time_Discount')</li>
                                            <li class="right right-dis"><strong>-&#8364; {{number_format(($product['price']['totals']['year']['excl_promo']/100)-$prc,2,',', '.')}}</strong></li>
                                        </ul>
                                        @endif
                                        <div class="clear"></div>
                                        <hr class="line-under">

                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.Expected_annual_cost')</li>
                                              @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                            
                                            <li class="right"><strong>&#8364; {{number_format($prc,2,',', '.')}}</strong></li>
                                            @else
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>
                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.Expected_monthly_costs')</li>
                                             @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                            
                                            <li class="right"><strong>&#8364; {{number_format($prc/12,2,',', '.')}}</strong></li>
                                            @else
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['month']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>

                                        <div class="clear"></div>
                                        <p class="bottom-box-p">* @lang('home.Prices_for_individuals')</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-8">
                                 @php
                               $string2 = trans("home.Switch_Free_and_Direct");
                               $replace2 = ['{SUPPLIER}','{PRODUCT}','{VALIDITYDATE}'];
                              
                               $info2 = [
                               'SUPPLIER' => $product['supplier']['name'],
                               'PRODUCT'=> $product['product']['name'],
                               'VALIDITYDATE'=>Carbon\Carbon::parse($product['price']['validity_period']['end'])->format('d/m/Y')
                               ];
                               
                               $string = trans("home.to_receive_the_prices_and_discountsX15");
                               $replace = ['{X15}'];
                               $info = [
                                'X15'=>Carbon\Carbon::parse($product['price']['validity_period']['end'])->format('d/m/Y')
                               ];
                               @endphp
			
                                <h4>@php echo str_replace($replace2, $info2, $string2); @endphp</h4>
                                <!--<p class="italic-text-sec"><i>* {!!str_replace($replace, $info, $string)!!}</i></p>-->
                                <p class="italic-text-sec"><i>* @lang('home.To_recieve_the') <strong>{{$endofMonth}}</strong></i></p>
                                <div class="row">
                                    <div class="col-md-5 col-sm-5">
                                      
                                        <div id="reg-form">
                                           <form id="request-button">

                                            <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                                                <label id="email-label"> @lang('home.Email_Address') </label>
                                                <input type="email" required="required" id="email" name="email" value="{{$product['parameters']['values']['email']}}">
                                                
                                            </div>
                                            <p id="error_email" style="color: red;"></p>
                                            @if ($errors->has('email'))
                                            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                            <div class="form-group row {{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                                <label> @lang('home.First_name') </label>
                                                <input type="text" required="required" id="firstname" name="firstname" value="{{$product['parameters']['values']['firstname']}}"><br>
                                            </div>
                                            @if ($errors->has('first_name'))
                                            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('first_name') }}</div>
                                            @endif
                                            <div class="form-group row {{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                                <label> @lang('home.Last_name') </label>
                                                <input type="text" required="required" id="lastname" name="lastname" value="{{$product['parameters']['values']['lastname']}}">
                                            </div>
                                            @if ($errors->has('last_name'))
                                            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('last_name') }}</div>
                                            @endif
                                            
                                         
                                          @if(Session::get('url'))
                                          
                                                @if($data['type']=='electricity')
                                             
                                                     @php $eid=$data['egid']; @endphp
                                             
                                                    @else
                                             
                                                    @php $eid=$product['product']['_id']; @endphp
                                            
                                             @endif
                                             
                                                 @if($data['type']=='gas')
                                                 
                                                   @php $gid=$data['egid']; @endphp
                                                
                                                 @else
                                                     @php $gid=$product['product']['_id']; @endphp
                                                     
                                                 @endif
                                          
                                        
                                        
                                           <input type="hidden" class="get_url" value="bevestiging/{{$product['supplier']['name']}}/{{$product['product']['name']}}?type=dual&eid={{$eid}}&gid={{$gid}}&u=@if(isset($_COOKIE['uuid'])){{$_COOKIE['uuid']}}@endif">


                                            
                                             
                                             @if($data['type']=='electricity' && $data['pr_type']=="")
                                             
                                              
                                             <input type="hidden" id="type" name="type" value="gas">
                                             <input type="hidden" id="eid" name="eid" value="{{$data['egid']}}">
                                             @else
                                             <input type="hidden" id="type" name="type" value="dual">
                                             <input type="hidden" id="eid" name="eid" value="{{$product['product']['id']}}">
                                             @endif
                                             
                                             @if($data['type']=='gas' && $data['pr_type']=="")
                                             <input type="hidden" id="type" name="type" value="gas">
                                             <input type="hidden" id="gid" name="gid" value="{{$data['egid']}}">
                                             @else
                                             <input type="hidden" id="type" name="type" value="dual">
                                             <input type="hidden" id="gid" name="gid" value="{{$data['id']}}">
                                             @endif
                                           
                                          
                                             @else
                                          
                                           
                                          <input type="hidden" id="get_url" class="get_url" value="bevestiging/{{$product['supplier']['name']}}/{{$product['product']['name']}}?u=@if(isset($_COOKIE['uuid'])){{$_COOKIE['uuid']}}@endif&type={{$product['parameters']['values']['comparison_type']}}&id={{$product['product']['_id']}}">
                                          <input type="hidden" id="type" name="type" value="{{$product['parameters']['values']['comparison_type']}}">
                                           <input type="hidden" id="id" name="id" value="{{$product['product']['id']}}">
                                          
                                          @endif
                                          
                                          <input type="hidden" id="id" name="id" value="{{$product['product']['id']}}">
               
                                          
                                            @php $arr=Session::get('select-pro'); @endphp
                                             <input type="hidden" id="url1" name="url1" value="{{Session::get('url')}}">

                                            <input type="hidden" id="uuid" name="uuid" value="@if(isset($_COOKIE['uuid'])){{$_COOKIE['uuid']}}@endif">
                                            <input type="hidden" class="locale" name="locale" value="{{Session::get('locale')}}">
                                           
                                           
                                        <p id="msg" style="display:none;color:red;">@lang('home.request_page_submit_error')</p>
                                            <button class="req-btn-new ladda-button" type="submit"  id="request-button-submit" name="submit" value="@lang('home.Submit')" id="send">@lang('home.Submit')&nbsp; &nbsp;&nbsp; <span class="spinner-border" id="loading" style="display:none;"></span></button>


                                     
                                        <p class="message">@lang('home.We_never_give')</p>
                                        <div class="loading_sec_home loading_sec_home_mobile" style="display: none;">
                                           <i class="fas fa-spinner fa-spin fa-3x"></i>
                                         </div>
                                       </form>
                                        </div>
                                       
                                        
                                        <div id="success" style="display:none;color:green;" class="req-sub">
                                            <div class="row mt-10">
                                                <div class="col-md-12 text-center">
                                                    <span class="text-center req-img"><img src="{{url('images/Green-Round-Tick.png')}}" alt=""></span><br>
Uw aanvraag is ingediend 
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-md-6 linkone">
                                                    <span class="req-btn-sec-down link-one"><a href="#">button</a></span>
                                                </div>
                                                <div class="col-md-6 linktwo">
                                                    <span class="req-btn-sec-down link-two"><a href="#">button</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-7 col-sm-7 thumps-up-icon">
                                        <img src="{{url('images/man_image.png')}}" alt="man">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
          
           
              @endforeach  
             @endif
             
             
           
             @if($selected['eleData'] && $selected['gasData'])
             @foreach($selected['gasData'] as $product)
            <div class="container inner-box">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="row Box">
                            


                            <div class="col-md-4">
                                <div class="right-box">
                                    <img src="{{$product['supplier']['logo']}}" alt="boxtop">
                                    <h6 class="font-weight-bold">{{$product['supplier']['name']}} - {{$product['product']['name']}}</h6>
                                    <ul class="box-top">
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                           @if($product['product']['type']=='pack') @lang('home.Gas') + @lang('home.Electricity') @elseif($product['product']['type']=='gas') @lang('home.Gas') @else @lang('home.Electricity')  @endif
                                        </li>
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            @if($product['product']['type']=='pack') @if($product['product']['pricing_type']=='Fix') @lang('home.fixed') (E) @else @lang('home.variable') (E) @endif (E) + @if($product['product']['pricing_type']=='Fix') @lang('home.fixed') (G) @else @lang('home.variable') (G) @endif (G)  @else {{$product['product']['pricing_type']}} @endif 
                                            
                                        </li>
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                           @if($product['product']['green_percentage']==100) <img src="{{url('images/flag.png')}}" alt="flag"> @endif
                                            {{$product['product']['green_percentage']}}% @lang('home.green')
                                        </li>
                                    </ul>
                                    <div class="cost">
                                        <div class="row">
                                            @if($data['pri_save'])
                                            <div class="col-md-6 saving-sec-req">
                                                <span>@lang('home.Savings_Year')</span><br>
                                                <h5 class="font-weight-sec">&#8364; @php $prc=$data['pri_save'];  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                            </div>
                                             @endif
                                             <div class="@if($data['pri_save']) col-md-6 @else col-md-12 @endif  cost-sec-req" style="text-align: center;">
                                                      @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                              @php       
                
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')!='true'){
                
               
                 $prc=$product['price']['totals']['year']['incl_promoD'];
            }
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_slD'];
                
            }
            if(Session::get('promo')!='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                $prc=$product['price']['totals']['year']['incl_loyaltyD'];
               
                
            }
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_promoD_slD'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_promoD_loyaltyD'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                $prc=$product['price']['totals']['year']['incl_promoD_slD_loyaltyD'];
                
                
            }
            
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_slD_loyaltyD'];
                
            }
            
            @endphp
                                                      
                                                       <span class="cost2"> @lang('home.All_in_costs_Year') </span><br>
                                                        <h5 class="cost2  cost2-bold">&#8364; @php $prc1=number_format($prc,2,',', '.');   $sp_price=preg_split("/,/",$prc1)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                                    @else
                                                        <span class="cost2 cost4"> @lang('home.All_in_costs_Year') </span><br>
                                                        <h5 class="cost3  cost2-bold">&#8364; @php $prc=number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                                    @endif
                                                    </div> 
                                            
                                        </div>
<!--                                        <ul>
                                            @if($data['pri_save'])
                                            <li>
                                                <span>savings / Year</span><br>
                                                <h5 class="font-weight-bold"><i class="fa fa-euro-sign"></i> {{$data['pri_save']}}</h5>
                                            </li>
                                            @endif
                                            <li>
                                                <span class="cost2">All in cost / Year</span><br>
                                                <h5 class="cost2 font-weight-bold"><i class="fa fa-euro-sign"></i> {{$product['price']['totals']['year']['incl_promo']}}</h5>
                                            </li>
                                        </ul>-->
                                    </div>
                                    @php
                                        $total_discount = 0; 
                                                    
                                        foreach($product['price']['breakdown']['discounts'] as $discount) {
                                            $total_discount = $total_discount + $discount['amount'];
                                        }
                                    @endphp
                                    <div class="bottom-texts">

                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.All_in_costs_Year')</li>
                                              @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                       
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @else
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>
                                        @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                
                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.One_Time_Discount')</li>
                                            <li class="right right-dis"><strong>-&#8364; {{number_format(($product['price']['totals']['year']['excl_promo']/100)-$prc,2,',', '.')}}</strong></li>
                                        </ul>
                                        @endif
                                        <div class="clear"></div>
                                        <hr class="line-under">

                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.Expected_annual_cost')</li>
                                            @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                           
                                            <li class="right"><strong>&#8364; {{number_format($prc,2,',', '.')}}</strong></li>
                                            @else
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>
                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.Expected_monthly_costs')</li>
                                             @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                           
                                            <li class="right"><strong>&#8364; {{number_format($prc/12,2,',', '.')}}</strong></li>
                                            @else
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['month']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>

                                        <div class="clear"></div>
                                        <p class="bottom-box-p">* @lang('home.Prices_for_individuals')</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-8">
                                 @php
                               $string2 = trans("home.Switch_Free_and_Direct");
                               $replace2 = ['{SUPPLIER}','{PRODUCT}','{VALIDITYDATE}'];
                              
                               $info2 = [
                               'SUPPLIER' => $product['supplier']['name'],
                               'PRODUCT'=> $product['product']['name'],
                               'VALIDITYDATE'=>Carbon\Carbon::parse($product['price']['validity_period']['end'])->format('d/m/Y')
                               ];
                               
                               $string = trans("home.to_receive_the_prices_and_discountsX15");
                               $replace = ['{X15}'];
                               $info = [
                                'X15'=>Carbon\Carbon::parse($product['price']['validity_period']['end'])->format('d/m/Y')
                               ];
                               @endphp
			
                               
                            </div>

                        </div>
                    </div>
                </div>
            </div>
          
           
              @endforeach  
             @endif
             
             
           @if(!$selected['eleData'] && $selected['gasData'])
             @foreach($selected['gasData'] as $product)
            <div class="container inner-box">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="row Box">
                            <div class="col-md-4">
                                <div class="right-box">
                                    <img src="{{$product['supplier']['logo']}}" alt="boxtop">
                                    <h6 class="font-weight-bold">{{$product['supplier']['name']}} - {{$product['product']['name']}}</h6>
                                    <ul class="box-top">
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                           @if($product['product']['type']=='pack') @lang('home.Gas') + @lang('home.Electricity') @elseif($product['product']['type']=='gas') @lang('home.Gas') @else @lang('home.Electricity')  @endif
                                        </li>
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            @if($product['product']['pricing_type']=='Fix') @lang('home.fixed') @else @lang('home.variable') @endif 
                                        </li>
                                        <li>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                           @if($product['product']['green_percentage']==100) <img src="{{url('images/flag.png')}}" alt="flag"> @endif
                                            {{$product['product']['green_percentage']}}% @lang('home.green')
                                        </li>
                                    </ul>
                                    <div class="cost">
                                        <div class="row">
                                            @if($data['pri_save'])
                                            <div class="col-md-6 saving-sec-req">
                                                <span>@lang('home.Savings_Year')</span><br>
                                                <h5 class="font-weight-sec">&#8364; @php $prc=$data['pri_save'];  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                            </div>
                                             @endif
                                             <div class="@if($data['pri_save']) col-md-6 @else col-md-12 @endif  cost-sec-req" style="text-align: center;">
                                                 @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                      
                                                              @php       
                
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')!='true'){
                
               
                 $prc=$product['price']['totals']['year']['incl_promoD'];
            }
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_slD'];
                
            }
            if(Session::get('promo')!='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                $prc=$product['price']['totals']['year']['incl_loyaltyD'];
               
                
            }
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_promoD_slD'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_promoD_loyaltyD'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                $prc=$product['price']['totals']['year']['incl_promoD_slD_loyaltyD'];
                
                
            }
            
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                $prc=$product['price']['totals']['year']['incl_slD_loyaltyD'];
                
            }
            
            @endphp
                                                       <span class="cost2"> @lang('home.All_in_costs_Year') </span><br>
                                                        <h5 class="cost2  cost2-bold">&#8364; @php $prc1=number_format($prc,2,',', '.');   $sp_price=preg_split("/,/",$prc1)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                                    @else
                                                        <span class="cost2 cost4"> @lang('home.All_in_costs_Year') </span><br>
                                                        <h5 class="cost3  cost2-bold">&#8364; @php $prc=number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></h5>
                                                    @endif   
                                                    
                                                      </div> 
                                            
                                        </div>
<!--                                        <ul>
                                            @if($data['pri_save'])
                                            <li>
                                                <span>savings / Year</span><br>
                                                <h5 class="font-weight-bold"><i class="fa fa-euro-sign"></i> {{$data['pri_save']}}</h5>
                                            </li>
                                            @endif
                                            <li>
                                                <span class="cost2">All in cost / Year</span><br>
                                                <h5 class="cost2 font-weight-bold"><i class="fa fa-euro-sign"></i> {{$product['price']['totals']['year']['incl_promo']}}</h5>
                                            </li>
                                        </ul>-->
                                    </div>
                                    @php
                                        $total_discount = 0; 
                                                    
                                        foreach($product['price']['breakdown']['discounts'] as $discount) {
                                            $total_discount = $total_discount + $discount['amount'];
                                        }
                                    @endphp
                                    <div class="bottom-texts">

                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.All_in_costs_Year')</li>
                                             @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                   
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @else
                                             <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>
                                          @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                
                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.One_Time_Discount')</li>
                                            <li class="right right-dis"><strong>-&#8364; {{number_format(($product['price']['totals']['year']['excl_promo']/100)-$prc,2,',', '.')}}</strong></li>
                                        </ul>
                                        @endif
                                        <div class="clear"></div>
                                        <hr class="line-under">

                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.Expected_annual_cost')</li>
                                              @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                
                                            <li class="right"><strong>&#8364; {{number_format($prc,2,',', '.')}}</strong></li>
                                            @else
                                             <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['year']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>
                                        <ul class="bottom-box-list">
                                            <li class="left">@lang('home.Expected_monthly_costs')</li>
                                             @if((Session::get('promo')=='true' && $product['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $product['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                
                                            <li class="right"><strong>&#8364; {{number_format($prc/12,2,',', '.')}}</strong></li>
                                            @else
                                            
                                            <li class="right"><strong>&#8364; {{number_format($product['price']['totals']['month']['excl_promo']/100,2,',', '.')}}</strong></li>
                                            @endif
                                        </ul>

                                        <div class="clear"></div>
                                        <p class="bottom-box-p">* @lang('home.Prices_for_individuals')</p>
                                    </div>
                                </div>
                            </div>


                             <div class="col-md-8">
                                 @php
                               $string2 = trans("home.Switch_Free_and_Direct");
                               $replace2 = ['{SUPPLIER}','{PRODUCT}','{VALIDITYDATE}'];
                              
                               $info2 = [
                               'SUPPLIER' => $product['supplier']['name'],
                               'PRODUCT'=> $product['product']['name'],
                               'VALIDITYDATE'=>Carbon\Carbon::parse($product['price']['validity_period']['end'])->format('d/m/Y')
                               ];
                               
                               $string = trans("home.to_receive_the_prices_and_discountsX15");
                               $replace = ['{X15}'];
                               $info = [
                                'X15'=>Carbon\Carbon::parse($product['price']['validity_period']['end'])->format('d/m/Y')
                               ];
                               @endphp
			
                                <h4>@php echo str_replace($replace2, $info2, $string2); @endphp</h4>
                                <!--<p class="italic-text-sec"><i>* {!!str_replace($replace, $info, $string)!!}</i></p>-->
                                <p class="italic-text-sec"><i>* @lang('home.To_recieve_the') <strong>{{$endofMonth}}</strong></i></p>
                                <div class="row">
                                    <div class="col-md-5 col-sm-5">
                                      
                                        <div id="reg-form">
                                           <form id="request-button">

                                            <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                                                <label id="email-label"> @lang('home.Email_Address') </label>
                                                <input type="email" required="required" id="email" name="email" value="{{$product['parameters']['values']['email']}}">
                                                
                                            </div>
                                            <p id="error_email" style="color: red;"></p>
                                            @if ($errors->has('email'))
                                            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                            <div class="form-group row {{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                                <label> @lang('home.First_name') </label>
                                                <input type="text" required="required" id="firstname" name="firstname" value="{{$product['parameters']['values']['firstname']}}"><br>
                                            </div>
                                            @if ($errors->has('first_name'))
                                            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('first_name') }}</div>
                                            @endif
                                            <div class="form-group row {{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                                <label> @lang('home.Last_name') </label>
                                                <input type="text" required="required" id="lastname" name="lastname" value="{{$product['parameters']['values']['lastname']}}">
                                            </div>
                                            @if ($errors->has('last_name'))
                                            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('last_name') }}</div>
                                            @endif
                                            
                                         
                                          @if(Session::get('url'))
                                          
                                                @if($data['type']=='electricity')
                                             
                                                     @php $eid=$data['egid']; @endphp
                                             
                                                    @else
                                             
                                                    @php $eid=$product['product']['_id']; @endphp
                                            
                                             @endif
                                             
                                                 @if($data['type']=='gas')
                                                 
                                                   @php $gid=$data['egid']; @endphp
                                                
                                                 @else
                                                     @php $gid=$product['product']['_id']; @endphp
                                                     
                                                 @endif
                                          
                                        
                                        
                                           <input type="hidden" class="get_url" value="bevestiging/{{$product['supplier']['name']}}/{{$product['product']['name']}}?type=dual&eid={{$eid}}&gid={{$gid}}&u=@if(isset($_COOKIE['uuid'])){{$_COOKIE['uuid']}}@endif">


                                            
                                             
                                             @if($data['type']=='electricity' && $data['pr_type']=="")
                                             
                                              
                                             <input type="hidden" id="type" name="type" value="gas">
                                             <input type="hidden" id="eid" name="eid" value="{{$data['egid']}}">
                                             @else
                                             <input type="hidden" id="type" name="type" value="dual">
                                             <input type="hidden" id="eid" name="eid" value="{{$product['product']['id']}}">
                                             @endif
                                             
                                             @if($data['type']=='gas' && $data['pr_type']=="")
                                             <input type="hidden" id="type" name="type" value="gas">
                                             <input type="hidden" id="gid" name="gid" value="{{$data['egid']}}">
                                             @else
                                             <input type="hidden" id="type" name="type" value="dual">
                                             <input type="hidden" id="gid" name="gid" value="{{$data['id']}}">
                                             @endif
                                           
                                          
                                             @else
                                          
                                           
                                          <input type="hidden" id="get_url" class="get_url" value="bevestiging/{{$product['supplier']['name']}}/{{$product['product']['name']}}?u=@if(isset($_COOKIE['uuid'])){{$_COOKIE['uuid']}}@endif&type={{$product['parameters']['values']['comparison_type']}}&id={{$product['product']['_id']}}">
                                          <input type="hidden" id="type" name="type" value="{{$product['parameters']['values']['comparison_type']}}">
                                           <input type="hidden" id="id" name="id" value="{{$product['product']['id']}}">
                                          
                                          @endif
                                          
                                          <input type="hidden" id="id" name="id" value="{{$product['product']['id']}}">
               
                                          
                                            @php $arr=Session::get('select-pro'); @endphp
                                             <input type="hidden" id="url1" name="url1" value="{{Session::get('url')}}">

                                            <input type="hidden" id="uuid" name="uuid" value="@if(isset($_COOKIE['uuid'])){{$_COOKIE['uuid']}}@endif">
                                            
                                            <input type="hidden" class="locale" name="locale" value="{{Session::get('locale')}}">
                                           
                                           
                                        <p id="msg" style="display:none;color:red;">@lang('home.request_page_submit_error')</p>
                                            <button class="req-btn-new ladda-button" type="submit"  id="request-button-submit" name="submit" value="@lang('home.Submit')" id="send">@lang('home.Submit')&nbsp; &nbsp;&nbsp; <span class="spinner-border" id="loading" style="display:none;"></span></button>


                                     
                                        <p class="message">@lang('home.We_never_give')</p>
                                        <div class="loading_sec_home loading_sec_home_mobile" style="display: none;">
                                           <i class="fas fa-spinner fa-spin fa-3x"></i>
                                         </div>
                                       </form>
                                        </div>
                                       
                                        
                                        <div id="success" style="display:none;color:green;" class="req-sub">
                                            <div class="row mt-10">
                                                <div class="col-md-12 text-center">
                                                    <span class="text-center req-img"><img src="{{url('images/Green-Round-Tick.png')}}" alt=""></span><br>
Uw aanvraag is ingediend 
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-md-6 linkone">
                                                    <span class="req-btn-sec-down link-one"><a href="#">button</a></span>
                                                </div>
                                                <div class="col-md-6 linktwo">
                                                    <span class="req-btn-sec-down link-two"><a href="#">button</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-7 col-sm-7 thumps-up-icon">
                                        <img src="{{url('images/man_image.png')}}" alt="man">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
          
           
              @endforeach  
             @endif
             
             
           
           <!--secont product-->
           
        
                       
                            
                            <!--end second product-->
           
           
           
           
           
           </div>
             
             

           
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row Box1">
                            
                            <div class="col-md-4">
                                <div class="right-box01">
                                    <h3>@if(Session::get('locale')=='fr'){!!$subcontent[0]['FR_title']!!} @else (Session::get('locale')=='nl'){!!$subcontent[0]['NL_title']!!}@endif</h3>

                                     <div class="bottom-texts01">
                                    @foreach ($subcontent as $content)
                                    
                                        <div class="request-head1">
                                        <span class="count-num">0{{$loop->iteration}}</span>
                                        <span class="span1">@if(Session::get('locale')=='fr'){!!$content->FR_subtitle!!} @endif @if(Session::get('locale')=='nl') @php echo $content->NL_subtitle; @endphp @endif</span>
                                        

                                    </div>
                                    <p>@if(Session::get('locale')=='fr'){{$content->FR_content}} @endif @if(Session::get('locale')=='nl') @php echo $content->NL_content; @endphp @endif</p>
                                    @endforeach
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="left-contents">
                                    <!-- <video width="100%" height="281" reload="auto" poster="{{url('images/Dimitri.png')}}" controls>
                                        <source src="{{url('images/video/request_page_vido.mp4')}}" type="video/mp4" />
                                        <source src="{{url('images/video/request_page_vido.ogg')}}" type="video/ogg" />
                                        <source src="{{url('images/video/request_page_vido.webm')}}" type="video/webm" />
                                    </video> -->
                                    
                                   <a href="https://atv.be/nieuws/in-de-rand-rond-antwerpen-betaalt-u-een-pak-meer-voor-uw-elektriciteit-54862" target="_blank"><img src="{{url('images/Dimitri.png')}}" alt="Dimitri"></a>
                                    <!--<iframe width="100%" height="400" src="https://www.youtube.com/embed/PkZNo7MFNFg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                                    <div class="bottom-content">
                                        <h3>@if(Session::get('locale')=='fr'){!!$videocontent[0]['FR_title']!!} @else (Session::get('locale')=='nl'){!!$videocontent[0]['NL_title']!!} @endif</h3>
                                        <p>@if(Session::get('locale')=='fr'){!!$videocontent[0]['FR_content']!!} @else (Session::get('locale')=='nl'){!!$videocontent[0]['NL_content']!!} @endif<br>
                                        </p>
                                        <input type="hidden" id='active-price' value="{{$prc}}">
                                         <input type="hidden" id='active-title' value="{{$product['product']['name']}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            @include('home.includes.footer')
            


            

        </div>
    </body>
    
    
   <script>
    $(document).ready(function(){
       
      var change_url=$('.get_url').val();
       var originalURL = window.location.pathname;
      
      if(originalURL=='/bevestiging'){
          
           window.history.pushState('obj', 'newtitle',change_url);
      }
      
      
      
      $('#request-button-submit').click(function(){
          
          event.preventDefault();
         var uuid=$('#uuid').val();
         var email=$('#email').val();
         var firstname=$('#firstname').val();
         var lastname=$('#lastname').val();
         var type=$('#type').val();
         var eid=$('#eid').val();
         var gid=$('#gid').val();
         var id=$('#id').val();
       
         
         var active_title=$('#active-title').val();
         var active_price=$('#active-price').val();
         
         
         if(email && firstname && lastname){
          $('#msg').hide();
          $.ajax({
            url: '{{url('data-request')}}',
                    type: 'GET',
                    data: {'uuid':uuid, 'email':email,'firstname':firstname, 'lastname':lastname, 'type':type ,'eid':eid,'gid':gid,'id':id,'active_title':active_title,'active_price':active_price},
                    beforeSend: function() {
                                 $(".loading_sec_home").show();
                                 },
                     success: function(url) {
                        console.log(url);
                       
                        $(".loading_sec_home").hide();
                        $('#reg-form').hide();
                        $('#success').show();
                    if(url[1] && !url[2]){
                        $('.linktwo').hide(); 
                        $('.linkone').hide(); 
                       
                        window.location.replace(url[1]);
                        return false;
                                                  
                            }
                        if(url[1] && url[2]){
                             
                        
                            $('.link-one').html('<a href="'+url[1]+'" target="_blank">Klik hier</a>');
                            $('.link-two').html('<a href="'+url[2]+'" target="_blank">Klik hier</a>');
                        }
                        if(!url[1] && url[2]){
                            $('.linktwo').hide(); 
                            $('.linkone').hide();
                             window.location.replace(url[2]);
                             return false;
                             
                           
                        }
                        console.log(url[2]);
                        console.log(url[1]);
                    }
             });
           }else{
              $('#msg').show();
             }
         });
        
                    //     <!--Email Validation -->
        
             $("#email").keyup(function(){
             var email = $("#email").val();
             var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
             if (!filter.test(email)) {
               //alert('Please provide a valid email address');
               console.log('not valid');
               $("#error_email").html(email+" is geen geldig e-mailadres");
               $("#send").attr("disabled", true); 
               email.focus;
               //return false;
            } else {
                console.log(' valid');
                $("#error_email").html("");
                $("#send").attr("disabled", false);
            }
            if (email == "") {
               $("#error_email").html(""); 
               $("#send").attr("disabled", true);
            }
         });    
    });
</script>

   <script type="text/javascript">
        var form = document.getElementById('request'); // form has to have ID: <form id="formID">
form.noValidate = true;
form.addEventListener('submit', function(event) { // listen for form submitting
        if (!event.target.checkValidity()) {
            event.preventDefault(); // dismiss the default functionality
           // alert('Please, fill the form'); // error message
           $('#msg').show();
        }
    }, false);


    </script>

</html>


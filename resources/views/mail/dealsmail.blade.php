<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://use.fontawesome.com/2c807575d5.js"></script>
</head>
<body>
   
	<div class="container" style="max-width: 600px; margin: 0 auto;">
        @foreach ($productlist as $getdetails)
            @php  
                $product = $getdetails['product'];
                $parameters = $getdetails['parameters'];
                $supplier = $getdetails['supplier'];
                $price = $getdetails['price'];
                $count=DB::table('user_logs')->where('product_id',$product['id'])->count();
                $tot_count=DB::table('user_logs')->count();
               
                
                $p_type=$product['type'];
                                
            @endphp
            <table width = "100%" style="border: 1px solid #d1d5dc;border-radius: 5px;padding: 15px 5px;">
                <thead>
                    <tr>
                    <td colspan = "4" style="padding-bottom: 15px;"><a href="#" style="text-decoration: none; color: #000; font-weight: 600;">{{$supplier['name']}} - {{$product['name']}}</a></td>
                    </tr>
                </thead>
                
                <tbody style="font-size: 13px;">
                    <tr>
                    <td style="width: 20%;" rowspan="3"><img width="100" src="{{$supplier['logo']}}"></td>
                    <td style="width: 25%;"><i style="color:#cdcfd1;padding-right: 5px;" class="fa fa-check" aria-hidden="true"></i>@if($p_type=="pack") @lang('home.Gas') + @lang('home.Electricity') @elseif($p_type=='gas') @lang('home.Gas') @elseif($p_type=='electricity') @lang('home.Electricity') @else @endif</td>
                   
                    @if (Session::get('currentValue'))
                    <td style="width: 20%;" @if(Session::get('currentValue'))    @else style="visibility: none;" @endif>@lang('home.Savings_Year')</td>
                    @else
                    <td style="width: 20%;" @if(Session::get('currentValue'))    @else style="visibility: none;" @endif></td>
                    @endif
                                        @if($p_type=='pack')
                                          @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                                        @endif
                                         
                                        @if($p_type=='electricity')
                                          @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                                        @endif
                                        
                                        @if($p_type=='gas')
                                          @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                                        @endif
                                         
                                        
                    <td style="width: 20%;" class="years">@lang('home.All_in_costs_Year')</td>
                    <td rowspan=""><a href="{{$actual_link}}?mail=true&locale={{$parameters['values']['locale']}}&postal={{$parameters['values']['postal_code']}}&customer_group={{$parameters['values']['customer_group']}}" style="background: linear-gradient(180deg, rgba(211, 92, 92, 1) 21%, rgba(191, 59, 60, 1) 66%);border: none;padding: 5px 12px;color: #fff;border-radius: 5px;font-size: 10px;">SELECTEREN</a><br>
                    </td>
                    </tr>
                    <tr>
                    <td style="padding: 8px 0;"><i class="fa fa-check" style="color:#cdcfd1;padding-right: 5px;" aria-hidden="true"></i>
                        @if(Session::get('locale')=='nl') 
                                    @if($product['contract_duration']=='123') @lang('home.123year')@elseif($product['contract_duration']=='13') @lang('home.13year')@elseif($product['contract_duration']=='0') @lang('home.Undetermined')@else {{$product['contract_duration']}} @lang('home.Year')@endif,@if($product['type']=='pack') @if($product['underlying_products']['electricity']['pricing_type']=='fixed') @lang('home.fixed') (E) @else @lang('home.variable') (E) @endif (E) + @if($product['underlying_products']['gas']['pricing_type']=='fixed') @lang('home.fixed') (G) @else @lang('home.variable') (G) @endif (G)  @else {{$product['pricing_type']}} @endif @lang('home.rate')
                        @else
                                    @if($product['contract_duration']=='123') @lang('home.123year')@elseif($product['contract_duration']=='13') @lang('home.13year')@elseif($product['contract_duration']=='0') @lang('home.Undetermined')@else {{$product['contract_duration']}} @lang('home.Year')@endif,@if($product['type']=='pack') @if($product['underlying_products']['electricity']['pricing_type']=='fixed') @lang('home.rate') @lang('home.fixed') (E) @else @lang('home.rate') @lang('home.variable') (E) @endif (E) + @if($product['underlying_products']['gas']['pricing_type']=='fixed') @lang('home.fixed') (G) @else @lang('home.variable') (G) @endif (G)  @else {{$product['pricing_type']}} @endif
                        @endif
                    </td>
                     
                                    @php $currentValue=Session::get('currentValue');
                                        if(Session::get('cur_invoice_moth_year')=='year'){   
                                        $invamount=(int)$currentValue; 
                                        }else{
                                        $invamount=(int)$currentValue*12;
                                        }
                                        if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')){
                                          $prc=number_format($invamount-($price['totals']['year']['incl_promo']/100),2,',', '.');
                                        } else {
                                        $prc=number_format($invamount-($price['totals']['year']['excl_promo']/100),2,',', '.');
                                        }
                                        $sp_pricea=preg_split("/,/",$prc)
                                    @endphp
                                  
                    @if($prc>0)    
                    <td style="font-weight: 700;font-size: 20px;">&euro; {{$sp_pricea[0]}}<sup style="font-size: 11px;font-weight: 400;">,{{$sp_pricea[1]}}</sup></td>
                    @else
                    <td style="font-weight: 700;font-size: 20px; visibility: none;"> <sup style="font-size: 11px;font-weight: 400;"></sup></td>
                    @endif
                    
                    @if ($p_type=='pack')
                        @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                            <td rowspan="2" style="font-weight: 700;color: red; font-size: 20px;">&euro; @php $prc=number_format($price['totals']['year']['incl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}<sup style="font-weight: 400;font-size: 11px;">,{{$sp_price[1]}}</sup>
                                @if ($per1!=0)<br><span style="color:#000;font-size: 13px;"><strike>&euro; {{number_format($price['totals']['year']['excl_promo']/100,2,',', '.')}}</strike> @php $per=100-(($price['totals']['year']['incl_promo']/$price['totals']['year']['excl_promo'])*100) @endphp -{{number_format($per,2,',', '.')}}%</span>  @endif
                            </td>
                        @else
                            <td rowspan="2" style="font-weight: 700; font-size: 20px;">&euro; @php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}<sup style="font-weight: 400;font-size: 11px;">,{{$sp_price[1]}}</sup></td>
                        @endif
                    @endif
                    @if ($p_type=='electricity')
                         @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                            <td rowspan="2" style="font-weight: 700;color: red;font-size: 20px;">&euro; @php $prc=number_format($price['totals']['year']['incl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}<sup style="font-weight: 400;font-size: 11px;">,{{$sp_price[1]}}</sup>
                            @if ($per1!=0)<br><span style="color:#000;font-size: 13px;"><strike>&euro; {{number_format($price['totals']['year']['excl_promo']/100,2,',', '.')}}</strike> @php $per=100-(($price['totals']['year']['incl_promo']/$price['totals']['year']['excl_promo'])*100) @endphp -{{number_format($per,2,',', '.')}}%</span>  @endif
                            </td>
                        @else
                            <td rowspan="2" style="font-weight: 700; font-size: 20px;">&euro; @php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}<sup style="font-weight: 400;font-size: 11px;">,{{$sp_price[1]}}</sup></td>
                        @endif
                            
                    @endif
                    @if ($p_type=='gas')
                        @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                            <td rowspan="2" style="font-weight: 700;color: red;font-size: 20px;">&euro; @php $prc=number_format($price['totals']['year']['incl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}<sup style="font-weight: 400;font-size: 11px;">,{{$sp_price[1]}}</sup>
                            @if ($per1!=0)<br><span style="color:#000;font-size: 13px;"><strike>&euro; {{number_format($price['totals']['year']['excl_promo']/100,2,',', '.')}}</strike> @php $per=100-(($price['totals']['year']['incl_promo']/$price['totals']['year']['excl_promo'])*100) @endphp -{{number_format($per,2,',', '.')}}%</span>  @endif
                            </td>
                        @else
                            <td rowspan="2" style="font-weight: 700; font-size: 20px;">&euro; @php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}<sup style="font-weight: 400;font-size: 11px;">,{{$sp_price[1]}}</sup></td>
                        @endif
                    @endif
                    
                    @php
                            $string = trans("home.Choose");
                            $replace = ['{X}'];
                            $info = [
                            'X' => $product['popularity_score'],
                            ];
                   @endphp  
                    <td style="text-align: center;"><i class="fa fa-heart" style="color:#cdcfd1;margin-right: 5px;" aria-hidden="true"></i>
                        {{str_replace($replace, $info, $string)}}
                    </td>
                    </tr>
                    <tr>
                    <td><i class="fa fa-check" style="color:#cdcfd1;padding-right: 5px;" aria-hidden="true"></i>@if($product['origin']=='BE' &&  $product['green_percentage'] > 0)<img src="{{url('images/bel-flag.png')}}" alt="belgium flag">@endif {{$product['green_percentage']}} % @lang('home.green')</td>
                    </tr>
                </tbody>
            </table>
        @endforeach
	</div>	
</body>
</html>

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

});

</script>  

@php $disc_total="0"; $checkPlus=0; $i="0"; 


if($locale=='nl'){
	
$fixed='Vast';
$on_consumption='op verbruik';
$Electricity='Elektriciteit';
$Gas='Gas';
$Total='Totaal';
$Discounts='Kortingen';

}else{
	
$fixed='Fix';
$on_consumption='le prix';
$Electricity='Electricité';
$Gas='Gaz';
$Total='Total';
$Discounts='Réductions';


}

@endphp
@foreach($filteredE as $discounts)



                    @php
                    $disc_total=$disc_total+$discounts['amount']; $i++; @endphp

                    <li class="nav-item">
                    <a class="nav-link @if($i==1) active @endif " id="home-tab{{$discounts['_id']}}" data-toggle="tab" href="#home{{$discounts['_id']}}" role="tab" aria-controls="home" aria-selected="true">
                    <span class="main-sec">
                    <span class="main-sec-1">
                    <h5><b> 
                    @if($discounts['parameters']['unit']=='euro') 
                    &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                    @endif

                    @if($discounts['parameters']['unit']=='eurocent') 
                    &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                    @endif
                    @php $priceTot=$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['single']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['day']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['night']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['excl_night']/100;  @endphp

                    @if($discounts['parameters']['unit']=='pct')
                    &#8364; {{ number_format(($discounts['amount']),2,',', '.') }}
                    @endif</b></h5>


                    <p class="amt">@if($discounts['parameters']['value_type']=='fixed') {{$fixed}} @endif</p>

                    @if($discounts['parameters']['unit']=='eurocent')
                    <p class="amt">{{number_format($discounts['parameters']['value'],2,',', '.')}} €c/kWh </p>
                    @endif
                    @if($discounts['parameters']['unit']=='pct')
                    <p class="amt">{{$discounts['parameters']['value']*100}} % {{$on_consumption}}</p>
                    @endif
                    @if($discounts['parameters']['discount_type']=='servicelevel')
                    <p class="mode amt"><i class="fas fa-at"></i> Beperkte dienstverlening</p>
                    @elseif($discounts['parameters']['discount_type']=='loyalty')
                    <p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}">Getrouwheidskorting</p>
                    @else
                    <p class="mode amt">@if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif @if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

                    @endif
                    </span>
                    </span>
                    </a>
                    </li><span class="plus">@if($checkPlus> $i) + @endif</span>

                @endforeach

                 @foreach($filteredG as $discounts)
                    @php  $disc_total=$disc_total+$discounts['amount']; $i++;  @endphp
                    <li class="nav-item">
                    <a class="nav-link @if($i==1) active @endif " id="home-tab{{$discounts['_id']}}" data-toggle="tab" href="#home{{$discounts['_id']}}" role="tab" aria-controls="home" aria-selected="true">
                    <span class="main-sec">
                    <span class="main-sec-1">
                    <h5><b> 
                    @if($discounts['parameters']['unit']=='euro') 
                    &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                    @endif

                    @if($discounts['parameters']['unit']=='eurocent') 
                    &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                    @endif

                    @if($discounts['parameters']['unit']=='pct')
                    &#8364; {{ number_format(($discounts['amount']),2,',', '.') }}
                    @endif</b></h5>
                    <p class="amt">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>

                    @if($discounts['parameters']['unit']=='eurocent')
                    <p class="amt">{{number_format($discounts['parameters']['value'],2,',', '.')}} €c/kWh </p>
                    @endif
                    @if($discounts['parameters']['unit']=='pct')
                    <p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
                    @endif
                    @if($discounts['parameters']['discount_type']=='servicelevel')
                    <p class="mode amt"><i class="fas fa-at"></i> Beperkte dienstverlening</p>
                    @elseif($discounts['parameters']['discount_type']=='loyalty')
                    <p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}">Getrouwheidskorting</p>
                    @else
                    <p class="mode amt">@if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif @if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

                    @endif
                    </span>
                    </span>
                    </a>
                    </li><span class="plus">@if($checkPlus> $i) + @endif</span>

                @endforeach
                    
                @foreach($filteredAll as $discounts)
                    @php  $disc_total=$disc_total+$discounts['amount']; $i++;  @endphp
                    <li class="nav-item">
                    <a class="nav-link @if($i==1) active @endif " id="home-tab{{$discounts['_id']}}" data-toggle="tab" href="#home{{$discounts['_id']}}" role="tab" aria-controls="home" aria-selected="true">
                    <span class="main-sec">
                    <span class="main-sec-1">
                    <h5><b> 
                    @if($discounts['parameters']['unit']=='euro') 
                    &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                    @endif

                    @if($discounts['parameters']['unit']=='eurocent') 
                    &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                    @endif

                    @if($discounts['parameters']['unit']=='pct')
                    &#8364; {{ number_format(($discounts['amount']),2,',', '.') }}
                    @endif</b></h5>


                    <p class="amt">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>

                    @if($discounts['parameters']['unit']=='eurocent')
                    <p class="amt">{{number_format($discounts['parameters']['value'],2,',', '.')}} €c/kWh </p>
                    @endif
                    @if($discounts['parameters']['unit']=='pct')
                    <p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
                    @endif
                    @if($discounts['parameters']['discount_type']=='servicelevel')
                    <p class="mode amt"><i class="fas fa-at"></i> Beperkte dienstverlening</p>
                    @elseif($discounts['parameters']['discount_type']=='loyalty')
                    <p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}">Getrouwheidskorting</p>
                    @else
                    <p class="mode amt">@if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif @if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

                    @endif
                    </span>
                    </span>
                    </a>
                    </li><span class="plus">@if($checkPlus> $i) + @endif</span>

                @endforeach
                    
                @foreach($filteredS as $discounts)


                    @php  $disc_total=$disc_total+$discounts['amount']; $i++;  @endphp


                    <li class="nav-item">
                    <a class="nav-link @if($i==1) active @endif " id="home-tab{{$discounts['_id']}}" data-toggle="tab" href="#home{{$discounts['_id']}}" role="tab" aria-controls="home" aria-selected="true">
                    <span class="main-sec">
                    <span class="main-sec-1">
                    <h5><b> 
                    @if($discounts['parameters']['unit']=='euro') 
                    &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                    @endif

                    @if($discounts['parameters']['unit']=='eurocent') 
                    &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                    @endif

                    @if($discounts['parameters']['unit']=='pct')
                    &#8364; {{ number_format(($discounts['amount']),2,',', '.') }}
                    @endif</b></h5>


                    <p class="amt">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>

                    @if($discounts['parameters']['unit']=='eurocent')
                    <p class="amt">{{number_format($discounts['parameters']['value'],2,',', '.')}} €c/kWh </p>
                    @endif
                    @if($discounts['parameters']['unit']=='pct')
                    <p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
                    @endif
                    @if($discounts['parameters']['discount_type']=='servicelevel')
                    <p class="mode amt"><i class="fas fa-at"></i> Beperkte dienstverlening</p>
                    @elseif($discounts['parameters']['discount_type']=='loyalty')
                    <p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}">Getrouwheidskorting</p>
                    @else
                    <p class="mode amt">@if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif @if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

                    @endif
                    </span>
                    </span>
                    </a>
                    </li><span class="plus">@if($checkPlus> $i) + @endif</span>

                @endforeach
                    
                    
                @foreach($filteredL as $discounts)


                    @php  $disc_total=$disc_total+$discounts['amount']; $i++;  @endphp


                    <li class="nav-item">
                    <a class="nav-link @if($i==1) active @endif " id="home-tab{{$discounts['_id']}}" data-toggle="tab" href="#home{{$discounts['_id']}}" role="tab" aria-controls="home" aria-selected="true">
                    <span class="main-sec">
                    <span class="main-sec-1">
                    <h5><b> 
                    @if($discounts['parameters']['unit']=='euro') 
                    &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                    @endif

                    @if($discounts['parameters']['unit']=='eurocent') 
                    &#8364; {{ number_format($discounts['amount'],2,',', '.')}}
                    @endif

                    @if($discounts['parameters']['unit']=='pct')
                    &#8364; {{ number_format(($discounts['amount']),2,',', '.') }}
                    @endif</b></h5>


                    <p class="amt">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>

                    @if($discounts['parameters']['unit']=='eurocent')
                    <p class="amt">{{number_format($discounts['parameters']['value'],2,',', '.')}} €c/kWh </p>
                    @endif
                    @if($discounts['parameters']['unit']=='pct')
                    <p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
                    @endif
                    @if($discounts['parameters']['discount_type']=='servicelevel')
                    <p class="mode amt"><i class="fas fa-at"></i> Beperkte dienstverlening</p>
                    @elseif($discounts['parameters']['discount_type']=='loyalty')
                    <p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}">Getrouwheidskorting</p>
                    @else
                    <p class="mode amt">@if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif @if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

                    @endif
                    </span>
                    </span>
                    </a>
                    </li><span class="plus">@if($checkPlus> $i) + @endif</span>

                @endforeach


                @if($disc_total!=0)
                    <span class="plus">=</span>
                    <li class="nav-item">
                        <div class="nav-link lst" aria-controls="contact" aria-selected="false">
                            <span class="main-sec">
                                <span class="main-sec-1">
                                    <h5 class="dis-bold"><b>&#8364;</i>{{number_format($disc_total,2,',', '.')}}</b></h5>
                                    <p class="amt dis-amt">{{$Total}} {{$Discounts}}</p>
                                    <p class="mode amt">
                                        @if($response['products'][0]['parameters']['values']['comparison_type']=="electricity")<i class="fa fa-bolt"></i></p>@endif
                                        @if($response['products'][0]['parameters']['values']['comparison_type']=="gas")<i class="fa fa-fire"></i></p>@endif
                                        @if($response['products'][0]['parameters']['values']['comparison_type']=="pack")<i class="fa fa-bolt"></i> + <i class="fa fa-fire"></i></p>@endif
                                </span>
                            </span>
                        </div>
                    </li>
            @endif
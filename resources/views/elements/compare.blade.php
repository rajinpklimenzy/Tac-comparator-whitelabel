    <div class="compare-sec">
		<div class="container">
			<div class="row">
				<div class="col-md-3 sec-part-1">
                                    <span class="com-button" id="compareme">
						@lang('home.Compare_plans') <i class="fa fa-chevron-up"></i>
					</span>
				</div>
                          
                            @foreach($get_res as $get_result)
				<div class="col-md-3 sec-part-2">
					<div class="selected">
						<div class="row">
							<div class="col-md-6">
								<img src="{{$get_result['supplier']['logo']}}">
							</div>
						</div>
						<p>{{$get_result['supplier']['name']}} - {{$get_result['product']['name']}}</p>
						
					</div>
				</div>
                            @endforeach
                            
                            @if($get_res->count()==1)
                            <div class="col-md-3 sec-part-4">
					<div class="selected-span">
						<span>@lang('home.selected_tarif_compare')</span>	
					
					</div>
				</div>
                             <div class="col-md-3 sec-part-4">
					<div class="selected-span">
						<span>@lang('home.selected_tarif_compare')</span>	
					
					</div>
				</div>
                            @endif
                            @if($get_res->count()==2)
                            <div class="col-md-3 sec-part-4">
					<div class="selected-span">
						<span>@lang('home.selected_tarif_compare')</span>	
					
					</div>
				</div>
                            
                            @endif
                            
                           
                            
                            
                         
				
                                
                            
                            
			</div>
		</div>
	</div>
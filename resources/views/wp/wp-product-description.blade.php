 @php $disc="0";  @endphp
                    @foreach($filteredE as $discountss)
                    @php $disc=$disc+1;  @endphp

                    <div class="tab-pane fade show @if($disc=='1') active @endif" id="home{{$discountss['_id']}}" role="tabpanel" aria-labelledby="home-tab">
                         <p><b>@php echo $discountss['name']; @endphp</b><br>@php echo $discountss['description']; @endphp</p>
                    </div>

                    @endforeach 
                    
                    @foreach($filteredG as $discountss)
                    @php $disc=$disc+1;  @endphp

                    <div class="tab-pane fade show @if($disc=='1') active @endif" id="home{{$discountss['_id']}}" role="tabpanel" aria-labelledby="home-tab">
                         <p><b>@php echo $discountss['name']; @endphp</b><br>@php echo $discountss['description']; @endphp</p>
                    </div>

                    @endforeach 
                    
                    @foreach($filteredAll as $discountss)
                    @php $disc=$disc+1;  @endphp

                    <div class="tab-pane fade show @if($disc=='1') active @endif" id="home{{$discountss['_id']}}" role="tabpanel" aria-labelledby="home-tab">
                         <p><b>@php echo $discountss['name']; @endphp</b><br>@php echo $discountss['description']; @endphp</p>
                    </div>

                    @endforeach 
                    
                    @foreach($filteredS as $discountss)
                    @php $disc=$disc+1;  @endphp

                    <div class="tab-pane fade show @if($disc=='1') active @endif" id="home{{$discountss['_id']}}" role="tabpanel" aria-labelledby="home-tab">
                         <p><b>@php echo $discountss['name']; @endphp</b><br>@php echo $discountss['description']; @endphp</p>
                    </div>

                    @endforeach 
                    
                    @foreach($filteredL as $discountss)
                    @php $disc=$disc+1;  @endphp

                    <div class="tab-pane fade show @if($disc=='1') active @endif" id="home{{$discountss['_id']}}" role="tabpanel" aria-labelledby="home-tab">
                         <p><b>@php echo $discountss['name']; @endphp</b><br>@php echo $discountss['description']; @endphp</p>
                    </div>

                    @endforeach 
	@php 
	$desc=explode(" - ",$response['products'][0]['product']['description']);
	@endphp

	@foreach($desc as $descs)
	@if($descs)<li class="product-desc-i">@php echo $descs; @endphp</li>@endif
	@endforeach
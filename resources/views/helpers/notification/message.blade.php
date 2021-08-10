<script>

@foreach (session('atr_notification', collect())->toArray() as $message)
    @if(strtolower($message['service']) =='toaster')
       if (window.hasOwnProperty('toastr')) {  
            window.toastr.{{$message['level']}}('{{$message['message']}}', '{{ucfirst($message['title'])}}')
       }
    @endif
@endforeach
</script>
{{ session()->forget('atr_notification') }}

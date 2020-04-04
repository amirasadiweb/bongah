@if(session()->has('flash_message'))
    <script>
        swal({
            title: "{{session('flash_message.title')}}",
            text: "{{session('flash_message.messgae')}}",
            type: "{{session('flash_message.level')}}",
           timer:2000,
            confirmButtonText:false
        });
    </script>
@endif

@if(session()->has('flash_message_overlay'))
    <script>
        swal({
            title: "{{session('flash_message_overlay.title')}}",
            text: "{{session('flash_message_overlay.messgae')}}",
            type: "{{session('flash_message_overlay.level')}}",
            confirmButtonText:"Okay"
        });
    </script>
@endif
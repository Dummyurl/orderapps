@if(session('status') && session('status') == 101)
    <script type="text/javascript">
        var status = {!! json_encode(session('status')) !!}
        var message = {!! json_encode(session('message')) !!}
 </script>
@endif
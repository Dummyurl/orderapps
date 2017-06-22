<!DOCTYPE html>
<html>

@include('layout.headdefault')


<body class="theme-red">

<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
</script>
@if(session('returnStatus'))
    @include('partials.message')
@endif

@include('layout.headerdefault')


@include('layout.asidebardefault')



@yield('main-content')




@include('layout.scriptdefault')


</body>

</html>
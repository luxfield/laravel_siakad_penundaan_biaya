<!DOCTYPE html>
<html lang="en">

@include('component.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('adminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div>

        
        @if(Session::get('user') != "TU")
        @extends('component.sidebar')
        @else
        @extends('component.tu.sidebar')
        @endif
        @yield('item')
        @yield('content')
        @include('component.footer')
    </div>
    @extends('component.script')
</body>

</html>
<!DOCTYPE html>
<html lang="en">
    
        @include('layouts.head')
    
    <body class="sb-nav-fixed">
        
        @include('layouts.header')
        <div id="layoutSidenav">
            @if(Auth::user()->type == 'user')
                @include('layouts.user_sidebar')
            @elseif(Auth::user()->type == 'admin')
                @include('layouts.admin_sidebar')
            @endif
            <div id="layoutSidenav_content">
                <main>
                    @include('flash-message')
                    @yield('content')
                </main>
                
                @include('layouts.footer')
                
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('demo/chart-area-demo.js')}}"></script>
        <script src="{{ asset('demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/datatables-simple-demo.js')}}"></script>
        
    </body>
</html>
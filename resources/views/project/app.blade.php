<!DOCTYPE html>
<html lang="en">

<!-- ======= Head ======= -->
@include('layouts.head')
<!-- End Head -->

<body>


    @guest
    @else
        <!-- ======= Header ======= -->
        @include('layouts.header')
        <!-- End Header -->

        <!-- ======= Sidebar ======= -->
        @include('layouts.sidebar')
        <!-- End Sidebar-->
    @endguest


    <main id="main" class="main
    
    @guest
{{ 'ms-0 mt-0' }}
@else @endguest

    ">

        @yield('content')

    </main><!-- End #main -->
    @guest
    @else
        <!-- ======= Footer ======= -->
        @include('layouts.footer')
        <!-- End Footer -->
    @endguest

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    @include('layouts.script')

</body>

</html>

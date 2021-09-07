<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>POS</title>

  <!--==========================================================-->
  <!--======================  CSS Plugin  ======================-->
  <!--==========================================================-->
  <link rel="stylesheet" href="{{ asset('dashboard/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/vendors/ti-icons/css/themify-icons.css')}}">

  <!--==========================================================-->
  <!--======================  Boostrap CSS  ======================-->
  <!--==========================================================-->
  <link rel="stylesheet" href="{{ asset('dashboard/css/bootstrap.min.css')}}">

  <!--==========================================================-->
  <!--====================  Dashboard CSS  =====================-->
  <!--==========================================================-->
  <link rel="stylesheet" href="{{ asset('dashboard/css/style.css')}}">

  <!--==========================================================-->
  <!--======================  Custom CSS  ======================-->
  <!--==========================================================-->
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">

  <!--==========================================================-->
  <!--======================    FavIcon   ======================-->
  <!--==========================================================-->
  <link rel="shortcut icon" href="{{ asset('dashboard/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
  
  <!--======================    NavBar    ======================-->
                       @include('includes.navbar')
  <!--======================    NavBar    ======================-->


    <div class="container-fluid page-body-wrapper">

  <!--======================    SideBar   ======================-->
                        @include('includes.sidebar')
  <!--======================    SideBar   ======================-->


  <!--=====================   main Content   ===================-->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('main-content')
        </div>
  <!--=====================   Footer   ==========================-->
        <footer class="footer">

        </footer>
      </div>
   <!--====================  main Content End  =================-->

    </div>
  </div>

  

  <!--==========================================================-->
  <!--========================   JQuery  =======================-->
  <!--==========================================================-->
  <script src="{{ asset('dashboard/js/jquery-3.6.0.min.js')}}"></script>

  <!--==========================================================-->
  <!--======================   JS Plugin  ======================-->
  <!--==========================================================-->
  <script src="{{ asset('dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{ asset('dashboard/js/off-canvas.js')}}"></script>
  <script src="{{ asset('dashboard/js/hoverable-collapse.js')}}"></script>


  <!--==========================================================-->
  <!--======================   Custom JS  ======================-->
  <!--==========================================================-->
  <script src="{{ asset('dashboard/js/template.js')}}"></script>

  <!--==========================================================-->
  <!--======================   Bootstrap JS  ======================-->
  <!--==========================================================-->
  <!-- <script src="{{ asset('dashboard/js/bootstrap.min.js')}}"></script> -->

</body>

</html>

<script>
  $( document ).ready(function() {
    console.log('Jquery Working');
});
  
</script>

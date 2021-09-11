@php 
$tools= App\Models\Setting::first();
        if($tools== null){
            $tools= [
                'id' => null,               
                'title'=> 'POS',
                'favicon' => 'favicon.png', 
                'logo' => 'logo.svg', 
                'minilogo' => 'mini.svg'
            ];
            $tools= (object) $tools;
        }

@endphp


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
  <!--======================  Toastr CSS  ======================-->
  <!--==========================================================-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--==========================================================-->
  <!--===================    Datatables CSS  ===================-->
  <!--==========================================================-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.css">

  <!--==========================================================-->
  <!--==================    Google Icon CSS  ===================-->
  <!--==========================================================-->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">

  <!--==========================================================-->
  <!--======================    FavIcon   ======================-->
  <!--==========================================================-->
  <link rel="shortcut icon" href="{{ asset('dashboard/images')}}/{{$tools->favicon}}" />
  <!--==========================================================-->
  <!--==================    Single Page css   ==================-->
  <!--==========================================================-->
@stack('css')


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
  <!--======================   Toastr JS  ======================-->
  <!--==========================================================-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!--==========================================================-->
  <!--====================   Datatables JS  ====================-->
  <!--==========================================================-->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script>

  <!--==========================================================-->
  <!--======================   SweetAlert JS  ======================-->
  <!--==========================================================-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!--==========================================================-->
  <!--======================   Bootstrap JS  ===================-->
  <!--==========================================================-->
  <!-- <script src="{{ asset('dashboard/js/bootstrap.min.js')}}"></script> -->

</body>

</html>
<!--======================   Bootstrap JS  ===================-->
<script>
  //======================= DataTables ===========================// 
  $(document).ready(function() {
    $('#datatables').DataTable();
  });

  //======================= SweetAlert ===========================// 
  $('.submit-btn').on('click', function(e) {
    e.preventDefault();
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $(this).closest("#delete-form").submit();
        }
      });
  });

  //======================= ToastrAlert ==========================// 
  toastr.options = {
    "progressBar": true,
    "timeOut": "3000",
    
  }
</script>

@if(session('success'))
<script>
  toastr.success("{{ session('success')}}");
</script>
@endif
@if(session('fail'))
<script>
  toastr.error("{{ session('fail')}}");
</script>
@endif

<!--====================== single Page Script =======================-->
@stack('scripts')

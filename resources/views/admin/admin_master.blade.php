<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href=" {{ asset('backend/images/favicon.ico')}}">

    <title>Easy School management system -Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href=" {{ asset('backend/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href=" {{ asset('backend/css/style.css')}}">
    <link rel="stylesheet" href=" {{ asset('backend/css/skin_color.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

     @stack('stylesheet')

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        {{-- header part --}} @include('admin.body.header')

        <!-- Left side column. contains the logo and sidebar -->
        {{-- side bar --}} @include('admin.body.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('admin')
        <!-- /.content-wrapper -->
        {{-- footer --}} @include('admin.body.footer')

        <!-- Control Sidebar -->


        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->
    @stack('script')

    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
    <script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
    <script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

    <!-- Sunny Admin App -->
    <script src="{{ asset('backend/js/template.js')}}"></script>')}}
    <script src="{{ asset('backend/js/pages/dashboard.js')}}"></script>

    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/pages/form-validation.js')}}"></script>

    <script src="{{ asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="../assets/vendor_components/datatable/datatables.min.js"></script>
    <script src="{{ asset('backend/js/pages/data-table.js')}}"></script>

    {{-- start of sweet alert resources --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    {{-- end of sweet alert resources --}}


    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete this file!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            });
        });
    </script>




    <script>
        @if(Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
        @endif
    </script>


</body>

</html>

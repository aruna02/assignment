<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Assignment</title>

    {{-- Global Stylesheets --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
    type="text/css">
    <link href="{{asset('admin/global/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets_1/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets_1/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets_1/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets_1/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets_1/css/colors.min.css')}}" rel="stylesheet" type="text/css">

    {{-- Core js files --}}
    <script src="{{asset('admin/global/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('admin/global/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/ui/slinky.min.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/ui/fab.min.js')}}"></script>

    {{-- Theme Js files --}}
    <script src="{{asset('admin/global/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script src="{{asset('admin/assets_1/js/app.js')}}"></script>
    <script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/alertify.js') }}"></script>
    <script src="{{asset('admin/global/js/demo_pages/datatables_basic.js')}}"></script>
    <script src="{{asset('admin/master.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    {{-- Custom css --}}
    <link href="{{asset('admin/style.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    {{-- for loading pace at top --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pace.css') }}">
    @yield('script')
</head>
<body>
    {{-- Page Header --}}
    <div class="page-header page-header-dark" >
        {{-- Main Navbar --}}
        @include('admin::includes.header')
        {{-- Floating Menu --}}
        @include('admin::includes.menu')
    </div>
    {{-- Page Content --}}
    <div class="page-content">
        {{-- Main Content --}}
        <div class="content-wrapper">
            <div class="content">
                {{-- @include('admin::includes.page_header') --}}
                @include('alertify::alertify')
                @yield('content')
            </div>
        </div>
    </div>
    {{-- Footer --}}
    @include('admin::includes.footer')
</body>
<script type="text/javascript">
    {{-- setup for ajax requests --}}
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</html>

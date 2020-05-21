<!DOCTYPE html>
<html style="height: auto; min-height: 100%;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title-admin','Hệ Thống Website')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="ZTo8Q43nC6h2LDIfWSoMCPtUannCdZsoGdaf9Pkx">
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('/backend/dist/img/avatar5.png')!!}" />
    <link rel="stylesheet" href="{!! asset('backend/css/all.min.css') !!}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="{!! asset('backend/ckeditor/ckeditor.js') !!}"></script>
    <script src="{!! asset('backend/ckfinder/ckfinder.js') !!}"></script>
    <script src="{!! asset('backend/js/func_ckfinder.js') !!}"></script>
    <script>
        var baseURL = "{!! url('/')!!}"
    </script>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('backend.templates.int_message')
        <header class="main-header">
            @include('backend.templates.int_header')
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            @include('backend.templates.int_sidebar')
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 612px;">
            @yield('main-content')
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.1.0
            </div>
            <strong>Copyright &copy; 2018-2019 : <a href=""></a>.</strong> All rights
            reserved.
        </footer>
        @include('backend.templates.int_setting')
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <script src="{!! asset('backend/js/all.min.js') !!}"></script>
</body>
</html>

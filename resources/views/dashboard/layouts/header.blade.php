<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="">
  <title>AdminLTE</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  

  {{--noty--}}
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
  <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/summernote/summernote-bs4.min.css') }}">
  {{--tables --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

  <!-- Theme style -->
  @if ( session('lang') == 'ar')
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard_files/dist/css/custom.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>

      .to-left {
        /* margin-left: 0;
        padding-left: 0;
        width: 1%;
        
  */
      }
      body, h1, h2, h3, h4, h5, h6 {
          font-family: 'Cairo', sans-serif !important;
      }
      /* .card-body {
        word-break: break-all;
      } */
  </style>
  @endif  


</head>

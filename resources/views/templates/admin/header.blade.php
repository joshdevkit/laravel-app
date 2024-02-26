<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | {{ config('app.name') }}</title>
  <x-css-components />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('templates.admin.topbar')
        @include('templates.admin.sidebar')
        <div class="content-wrapper">
         @yield('content')

    @include('templates.admin.footer')

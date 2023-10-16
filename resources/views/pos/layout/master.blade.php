<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.layout.partials.head')
  </head>
  @if(!Route::is(['error-404','error-500']))
<body>
 @endif
@if(Route::is(['error-404','error-500']))
<body class="error-page">
@endif
@if(Route::is(['forgetpassword','resetpassword','admin/signin','signup']))
<body class="account-page">
@endif
{{--  @include('admin.layout.partials.loader')  --}}
  <!-- Main Wrapper -->
<div class="main-wrapper">
  @if(!Route::is(['error-404','error-500','forgetpassword','resetpassword','admin.signin','admin.add']))
    @include('pos.layout.partials.header')
  @endif
  {{--  @if(!Route::is(['error-404','error-500','forgetpassword','pos','resetpassword','admin.signin','admin.add']))
    @include('pos.layout.partials.sidebar')
  @endif  --}}
    @yield('content')
</div>
<!-- /Main Wrapper -->
    @include('pos.layout.partials.footer-scripts')
  </body>
</html>

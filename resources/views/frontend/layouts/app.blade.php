<!DOCTYPE html>
<html lang="en">
@include('frontend.layouts.message')
@include('frontend.layouts.header')
<body>
@include('frontend.layouts.navbar')
@yield('content')
</body>
@include('frontend.layouts.footer')
</html>

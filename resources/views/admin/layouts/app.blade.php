<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.head')
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            @include('admin.layouts.sidebar')
            @include('admin.layouts.header')
            @yield('content')
        </div>
    </div>
</div>
</body>
@include('admin.layouts.footer')
@include('flashMessage')
</html>

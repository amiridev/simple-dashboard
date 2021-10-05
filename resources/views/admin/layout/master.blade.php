<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    @include('admin.layout.style')
    @include('admin.layout.top-scripts')
</head>
<body class="fixed-left">
<div id="wrapper">
    <div class="topbar">
    @include('admin.layout.topbar')
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
            @include('admin.layout.navbar-left')
                @include('admin.layout.navbar-right')
            </div>
        </div>
    </div>
    @include('admin.layout.left-sidebar')
    <div class="content-page">
        @yield('content')
    </div>
    @include('admin.layout.right-sidebar')
</div>
@include('admin.layout.bottom-scripts');
</body>
</html>

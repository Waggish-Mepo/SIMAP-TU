<!DOCTYPE html>
<html lang="id">
<head>
    @include('layout.head')
    <title>SIMAP Tata Usaha
        @hasSection('title')
            - @yield('title')
        @endif
    </title>
</head>
<body>
    <!-- main content -->
    @include('layout.script')
</body>
</html>

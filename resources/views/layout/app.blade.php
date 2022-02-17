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
    <div class="relative min-h-screen flex">
        @include('layout.sidebar.index')
        <div class="flex-1 bg-gray-200">
            @include('layout.navbar')
            <main class="w-11/12 mx-auto mt-4">
                @yield('content')
            </main>
        </div>
    </div>
    @include('layout.script')
    @yield('script')
</body>
</html>

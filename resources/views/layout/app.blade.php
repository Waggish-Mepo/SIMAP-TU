<!DOCTYPE html>
<html lang="id">
<head>
    @include('layout.head')
    @yield('head')
    <title>
        @hasSection('title')
            @yield('title') -
        @endif
        SIMAP Tata Usaha
    </title>
</head>
<body>
    <div class="relative min-h-screen flex">
        @include('layout.sidebar.index')
        <div class="flex-1 bg-gray-100">
            @include('layout.navbar')
            <main class="w-11/12 mx-auto my-8">
                @include('components.alert')
                @yield('content')
            </main>
        </div>
    </div>
    @include('layout.script')
    @yield('script')
</body>
</html>

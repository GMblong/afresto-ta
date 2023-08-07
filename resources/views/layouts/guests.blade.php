<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- Styles --}}
    @include('partials.back.styles')
</head>

<body>
    {{-- Body --}}
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        {{-- Sidebar --}}
        @include('partials.back.sidebar-guests')
        {{-- Main --}}
        <div class="body-wrapper">
            {{-- Navbar --}}
            @include('partials.back.navbar-guest')
            {{-- Content --}}
            @yield('content')
        </div>
        {{-- Footer --}}
        @include('partials.back.footer')
    </div>
    {{-- Scripts --}}
    @include('partials.back.scripts')
</body>

</html>

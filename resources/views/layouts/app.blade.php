<!DOCTYPE html>
<html lang="es">
    @include('partials.head')
    <body>
        
        @include('partials.header')
        @include('partials.search-overlay')
        @yield('content')
        @include('partials.footer')
        @include('partials.footerscripts')

    </body>
</html>

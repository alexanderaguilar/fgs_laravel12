<!DOCTYPE html>
<html lang="es">
    @include('partials.head')
    <body>
        
        @include('partials.header')
        @yield('content')
        @include('partials.footer')
        @include('partials.footerscripts')

    </body>
</html>

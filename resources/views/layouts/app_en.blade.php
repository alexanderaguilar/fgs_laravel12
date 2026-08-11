<!DOCTYPE html>
<html lang="es">
    @include('partials.head')
    <body>
        
        @include('partials.header_en')
        @yield('content')
        @include('partials.footer_en')
        @include('partials.footerscripts')

    </body>
</html>

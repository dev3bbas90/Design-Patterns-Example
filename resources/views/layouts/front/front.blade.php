<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        @include('layouts.front.header')
    </head>
    <body>
        @include('layouts.front.menu')

        @yield('content')

        @include('layouts.front.footer')
    </body>
</html>

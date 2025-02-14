<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Welcome')</title>
    @include('partials.head-css')
</head>
<body>

    @include('partials.navbar')

    <div class="container mt-5">
        @yield('content')
    </div>

    @include('partials.footer')
    @include('partials.vendor-scripts')

</body>
</html>


{{--  FOR PUBLIC PAGES  --}}
{{--  
Acts as the main template for your project.
Contains common structures like <html>, <head>, <body>, navbar, sidebar, footer, etc.
Other pages extend this file to maintain consistency.  --}}

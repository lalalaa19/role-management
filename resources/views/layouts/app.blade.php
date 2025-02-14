<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @include('partials.head-css')
</head>
<body>

    <div id="layout-wrapper">
        @include('partials.sidebar') <!-- Sidebar for Authenticated Users -->

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('partials.footer')
    </div>

    @include('partials.vendor-scripts')

</body>
</html>

{{--  FOR AUTHENTICATED PAGES  --}}

{{--  A more specific layout that extends master.blade.php, often used for authenticated user dashboards or app-related views.
It might include additional styles/scripts or different sections.  --}}
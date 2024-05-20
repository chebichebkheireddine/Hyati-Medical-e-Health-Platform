@props(['tag', 'itemPermission'])

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- @vite('resources/css/app.css') --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Hyati medical
    </title>

    <link rel="shortcut icon" type="image/png" href="" />
    <script src="https://kit.fontawesome.com/3c5df3e96c.js" crossorigin="anonymous"></script>
    {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/multi-select-tag.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!--  Header -->

        {{ $slot }}
    </div>
    </header>
    <script src="{{ asset('/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('/assets/js/multi-select-tag.js') }}"></script>
    <script>
        new MultiSelectTag('specialization');
    </script>

    <script>
        {{ $tagitem ?? ' ' }}
    </script>
    <script>
        {{ $tag_permission ?? '' }}
    </script>
</body>

</html>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <title>{{ config('app.name', 'Discord Bot Panel') }}</title>
</head>
<body class="mt-3">
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="" class="nav-link">
                        Archive
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        Settings
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-sm-12 col-md-9">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>

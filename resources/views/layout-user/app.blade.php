<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" />

    {{-- Local CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @yield('css')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark m-3 sticky-top" style="background-color: #fff">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
                <ul class="navbar-nav d-grid">
                    <li class="nav-item" style="display: flex; align-items: center;">
                        @if ($identitas)
                            <a href="#">
                                <img src="{{ asset('afiliasi_image/' . $identitas->first()->afiliasi_image) }}"
                                    class="img-fluid" width="100px" height="100px">
                            </a>
                            <a class="nav-link" href="#"
                                style="color: #000; font-weight:bolder; margin-left: 0.5em;">
                                <h1>{{ $identitas->first()->afiliasi }}</h1>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <div class="">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    @yield('js')
</body>

</html>

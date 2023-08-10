<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caleg</title>
    <link rel="stylesheet" href="css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
    <div class="navbar">
        <div class="atas">
            <a href="/" class="text active">
                <p>Beranda</p>
            </a>
            <a href="/profile" class="text">
                <p>Profile</p>
            </a>
            <a href="#" class="text">
                <p>Berita</p>
            </a>
            <a href="#" class="text">
                <p>Dukungan</p>
            </a>
            <a href="#" class="text">
                <p>Relawan</p>
            </a>
        </div>
        <div class="bawah">
            <table>
                <thead>
                    <tr style="display: flex;">
                        <th class="kiri" style="display: flex;">
                            <div class="nav-image">
                                <img src="{{ asset('image/' . $identitas->first()->image) }}" alt="caleg">
                            </div>
                            <div class="identitas">
                                <p id="atas">{{ $identitas->first()->nama }}</p>
                                <p id="bawah1">Calon Presiden Indonesia</p>
                                <p id="bawah2">Tahun 2099</p>
                            </div>
                        </th>
                        <th class="kanan" style="display: flex; margin-left: 43rem;">
                            <div class="nomor-urut">
                                <h1 style="color: white;">02</h1>
                            </div>
                            <div class="identitas">
                                <p id="bawah3">Calon Presiden Indonesia</p>
                                <p id="bawah4">Tahun 2099</p>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @yield('content')

    {{-- footer --}}
    <div class="footer" style="display: flex; background-color: #111111;height: 250px; z-index: 1;">
        <table>
            <thead>
                <th class="kiri" style="display: flex; margin-left: 30rem; margin-top: 2rem;">
                    <div class="nav-image">
                        <img src="{{ asset('image/' . $identitas->first()->image) }}" alt="caleg">
                    </div>
                    <div class="identitas">
                        <p id="atas">{{ $identitas->first()->nama }}</p>
                        <p id="bawah1">Calon Presiden Indonesia</p>
                        <p id="bawah2">Tahun 2099</p>
                    </div>
                </th>
            </thead>
        </table>
    </div>
    <div class="copy">Copyright &copy PT JAGAT 2023</div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".text").on("click", function(event) {
                // Prevent the default link behavior
                event.preventDefault();

                // Remove "active" class from all links
                $(".text").removeClass("active");

                // Add "active" class to the clicked link
                $(this).addClass("active");
            });
        });
    </script>

</body>

</html>

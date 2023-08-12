<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caleg</title>
    <link rel="stylesheet" href="css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    @php
        use App\Models\Setting;

        $partai = Setting::where('id_partai', 23)->get();

    @endphp
    @foreach ($partai as $s)
        <style>
            .text.active {
                background-color: {{ $s->warna }};
            }

            .nomor-urut {
                border: 2px solid {{ $s->warna }};
            }

            #bawah1 {

                color: {{ $s->warna }};
            }

            #bawah2 {

                color: {{ $s->warna }};
            }

            #bawah3 {

                color: {{ $s->warna }};

            }

            .copy {
                color: white;
            }
        </style>
    @endforeach
</head>

<body>
    <div class="navbar">
        <div class="atas">
            <a href="/" class="text">
                <p>Beranda</p>
            </a>
            <a href="/profile" class="text">
                <p>Profile</p>
            </a>
            <a href="/berita" class="text">
                <p>Berita</p>
            </a>
            <a href="/dukungan" class="text">
                <p>Dukungan</p>
            </a>
            <a href="/relawan" class="text">
                <p>Relawan</p>
            </a>
        </div>
        <div class="bawah">
            <table>
                <thead>
                    <tr style="display: flex;">
                        <th class="kiri" style="display: flex;">
                            <div class="nav-image">
                                <img src="images/muhyidin.png" alt="">
                            </div>
                            <div class="prof">
                                <p id="atas">{{ $profile->nama_lengkap }}</p>
                                <p id="bawah1">Calon Legislatif Indonesia</p>
                                <p id="bawah2">Tahun 2024</p>
                            </div>
                        </th>
                        <th class="kanan" style="display: flex;">
                            <div class="nomor-urut">
                                <h1 style="color: white;">{{ $partai->where('id_partai', 23)->first()->no_urut }}</h1>
                            </div>
                            <div class="prof">
                                <p id="bawah3">Calon Legislatif Indonesia</p>
                                <p id="bawah4">Tahun 2024</p>
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
                <th class="foot" style="display: flex;  margin-top: 2rem;">
                    <div class="nav-image">
                        <img src="images/muhyidin.png" alt="">
                    </div>
                    <div class="prof">
                        <p id="atas">{{ $profile->nama_lengkap }}</p>
                        <p id="bawah1">Calon Legislatif Indonesia</p>
                        <p id="bawah2">Tahun 2024</p>
                    </div>
                </th>
            </thead>
        </table>
    </div>
    <div class="copy">Copyright &copy PT JAGAT 2023</div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     $(".text").on("click", function() {
        //         // Prevent the default link behavior
        //         event.preventDefault();

        //         // Remove "active" class from all links
        //         $(".text").removeClass("active");

        //         // Add "active" class to the clicked link
        //         $(this).addClass("active");
        //     });
        // });


        // Get all the navigation links with class "text"
        const navigationLinks = document.querySelectorAll('.text');

        // Retrieve the active link from local storage on page load
        document.addEventListener('DOMContentLoaded', () => {
            const activeLink = localStorage.getItem('activeLink');
            if (activeLink) {
                navigationLinks.forEach(link => {
                    if (link.getAttribute('href') === activeLink) {
                        link.classList.add('active');
                    }
                });
            }
        });

        // Click event listener for navigation links
        navigationLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                // Remove "text-active" class from all links
                navigationLinks.forEach(link => link.classList.remove('active'));

                // Add "text-active" class to the clicked link
                link.classList.add('active');

                // Save the active link to local storage
                localStorage.setItem('activeLink', link.getAttribute('href'));
            });
        });
    </script>

</body>

</html>

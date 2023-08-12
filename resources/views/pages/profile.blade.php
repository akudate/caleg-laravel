@extends('layout-user.app')


@section('content')
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @php
        use App\Models\Setting;

        $partai = Setting::where('id_partai', 23)->get();

    @endphp
    @foreach ($partai as $s)
        <style>
            hr {
                background-color: {{ $s->warna }};
            }
        </style>
    @endforeach

    <table>
        <thead>
            <tr>
                <th class="foto">
                    <img src="images/kangidin.png" alt="">
                </th>
                <th class="kanan">
                    <h1>{{ $profile->nama_lengkap }}</h1> <br>
                    <hr>
                    <p class="posisi">Calon Presiden Indonesia Tahun 2099</p>
                    <p class="partai">{{ $profile->partai->nama_partai }}</p>
                    <div class="sosmed">
                        <a href="#">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="bi bi-youtube"></i>
                        </a>
                        <a href="#">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="bi bi-geo-alt-fill"></i>
                        </a>
                    </div>
                    <div class="desc">
                        {{ $profile->nama_lengkap }} (lahir 17 Oktober 1951) adalah
                        seorang politisi, pengusaha, dan perwira tinggi militer Indonesia. Ia menempuh pendidikan dan
                        jenjang karier militer selama 28 tahun sebelum berkecimpung dalam dunia bisnis, politik dan
                        pemerintahan. Pada tanggal 23 Oktober 2019, Prabowo dilantik menjadi Menteri Pertahanan ke-26
                        Republik Indonesia dalam Kabinet Indonesia Maju untuk periode 2019 hingga 2024.

                    </div>
                </th>
            </tr>
        </thead>
    </table>
@endsection

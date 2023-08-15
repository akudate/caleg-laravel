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
                        <a href="{{ $ig->link_medsos }}">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="{{ $fb->link_medsos }}">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="{{ $yt->link_medsos }}">
                            <i class="bi bi-youtube"></i>
                        </a>
                        <a href="{{ $tiktok->link_medsos }}">
                            <i class="bi bi-tiktok"></i>
                        </a>
                    </div>
                    <div class="desc">
                        {{ $profile->nama_lengkap }} atau akrab disapa Kang Idin, merupakan sosok yang tulus dalam
                        peranannya sebagai Ketua Yayasan Pendidikan Islam Al-Wathaniyah Wargabinangun Kaliwedi Kabupaten
                        Cirebon. Kepemimpinannya yang visioner telah mengangkat institusi ke arah keunggulan akademik,
                        sambil merawat nilai-nilai kuat dalam struktur pendidikan.
                        <br><br>
                        Pengaruh Kang Idin meluas di luar dunia pendidikan, karena beliau juga memegang peran penting
                        sebagai Wakil Ketua Pengurus Cabang Nahdlatul Ulama (PCNU) Kabupaten Cirebon. Keterlibatannya yang
                        aktif dalam kapasitas ini menegaskan komitmennya dalam memupuk persatuan dan harmoni di tengah
                        masyarakat.
                        <br><br>
                        Sebagai pendidik berpengalaman, gelar M.Pd yang dimilikinya mencerminkan pemahamannya yang mendalam
                        terhadap metodologi pendidikan. Kepemimpinannya ditandai oleh dedikasi yang teguh untuk
                        memberdayakan pikiran-pikiran muda dengan pengetahuan yang holistik, memberi mereka daya untuk masa
                        depan yang menjanjikan.
                        <br><br>
                        Dengan peran gandanya, Kang Idin mencerminkan harmonisasi antara kepemimpinan pendidikan dan
                        pelayanan komunitas. Kontribusinya telah meninggalkan jejak yang tak terhapuskan dalam lanskap
                        pendidikan dan promosi persatuan dalam masyarakat.
                    </div>
                </th>
            </tr>
        </thead>
    </table>
@endsection

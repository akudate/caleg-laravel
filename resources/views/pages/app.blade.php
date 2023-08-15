@extends('layout-user.app')


@section('content')
    <link rel="stylesheet" href="css/beranda.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @foreach ($partai as $s)
        <style>
            .konten-atas {
                background-color: {{ $s->warna }};
            }

            .no-skew {

                color: {{ $s->warna }};
            }

            .dukungan {
                background-color: {{ $s->warna }};
            }

            .relawan:hover,
            .relawan:focus {
                background-color: {{ $s->warna }};
            }

            .konten-tengah-bawah button:hover,
            .konten-tengah-bawah:focus {
                background-color: {{ $s->warna }};
            }

            .satu button {
                background-color: {{ $s->warna }};
                color: #111111;
            }

            .dua button {
                background-color: {{ $s->warna }};
            }

            .kanan-berita {
                background-color: {{ $s->warna }};
            }
        </style>
    @endforeach
    <div class="konten-atas">
        <table>
            <thead>
                <tr>
                    <th class="atas-kiri">
                        <img src="images/kangidin.png" alt="">
                    </th>
                    <th>
                        <div class="jajar">
                            <p class="no-skew">Untuk Indonesia yang Lebih Baik</p>
                            <p class="no-skew2">Mewujudkan Lembaga DPRD yang Aspiratif, Transparan, Akuntabel dan Smart
                                dalam mendorong terwujudnya masyarakat yang sejahtera dalam perekonomian dan pertanian</p>
                            <button class="dukungan">Dukungan</button>
                            <button class="relawan">Relawan</button>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="konten-tengah">
        <table>
            <thead>
                <tr>
                    <th>
                        <button class="info">
                            <h2>SEKILAS INFO</h2>
                        </button>
                    </th>
                    <th>
                        <div class="moving-text-container">
                            <p class="moving-text">AYO DUKUNG KANGIDIN AYO DUKUNG KANGIDIN AYO DUKUNG KANGIDIN AYO DUKUNG
                                KANGIDIN AYO DUKUNG KANGIDIN AYO DUKUNG KANGIDIN AYO DUKUNG KANGIDIN.</p>
                        </div>
                    </th>

                </tr>
            </thead>
        </table>
        <table class="konten-tengah-berita">
            <thead>
                <tr>
                    @foreach ($berita as $item)
                        <th class="berita-1">
                            <img src="{{ asset($item->gambar) }}" alt="">
                            <h2 class="judul" style="color: white; text-align:left; margin-left: 1rem;">{{ $item->judul }}
                            </h2>
                            <p>{{ \Illuminate\Support\Str::limit($item->isi_berita, 200) }}</p>

                        </th>
                    @endforeach
                    @foreach ($berita as $item)
                        <th class="berita-1">
                            <img src="{{ asset($item->gambar) }}" alt="">
                            <h2 class="judul" style="color: white; text-align:left; margin-left: 1rem;">
                                {{ $item->judul }}</h2>
                            <p>{{ \Illuminate\Support\Str::limit($item->isi_berita, 200) }}</p>
                        </th>
                    @endforeach
                </tr>
            </thead>
        </table>
    </div>
    <div class="konten-tengah-bawah">
        <h3>BANTU SAYA DENGAN CARA MEMBERIKAN <br> SUPPORT DUKUNGAN UNTUK PERJUANGAN INI</h3>
        <table class="dukung">
            <thead>
                <tr>
                    <th class="satu">
                        <h3>JADI RELAWAN</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem est praesentium vero unde
                            cum sint non voluptatibus eos tenetur iure, facere quidem iusto! Corporis iusto est architecto
                            ex vel similique.</p>
                        <a href="https://kangidin.online/#/">
                            <button>
                                BERGABUNG
                            </button>
                        </a>
                    </th>
                    <th>
                        <h1>{{ $jumlah }} Orang</h1>
                        <h4>Telah Memberikan Dukungan</h4>
                        <a href="dukungan">
                            <button class="dukungan2">
                                BERI DUKUNGAN
                            </button>
                        </a>
                    </th>
                    <th class="dua">
                        <h3>JADI RELAWAN</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem est praesentium vero unde
                            cum sint non voluptatibus eos tenetur iure, facere quidem iusto! Corporis iusto est architecto
                            ex vel similique.</p>
                        <a href="https://kangidin.online/#/">
                            <button>
                                BERGABUNG
                            </button>
                        </a>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="gambar-aff">
        <img src="images/fotopkb.png" alt="" style="filter: brightness(50%);">
        <p style="filter: brightness(100%);">Mari Dukung Kami<br> Dan Bergabung Bersama Kami.</p>
    </div>
    <div class="sosmed" style="">
        <table>
            <thead>
                <tr>
                    <th class="nama">
                        <h2>{{ $profile->nama_lengkap }}</h2>
                    </th>
                    <th class="no-urut"><button>{{ $partai->where('id_partai', 23)->first()->no_urut }}</button></th>
                    <th class="link">
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
                    </th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

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
                            <h1 class="no-skew">Untuk Indonesia yang Lebih Baik</h1>
                            <p class="no-skew2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam iusto soluta,
                                fugit, ad et corporis cumque alias beatae perspiciatis asperiores blanditiis. Suscipit
                                architecto est a magnam esse, deserunt nihil tempora?</p>
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
                            <p class="moving-text">Lorem ipsum dolor sit amet, Reynanda anak kesayangan Papa Bin. Lorem
                                ipsum dolor sit amet, Reynanda anak kesayangan Papa Bin. Lorem ipsum dolor sit amet,
                                Reynanda anak kesayangan Papa Bin.</p>
                        </div>
                    </th>

                </tr>
            </thead>
        </table>
        <table class="konten-tengah-berita">
            <thead>
                <tr>
                    <th class="berita-1">
                        <img src="images/kangidin.png" alt="">
                        <button>
                            <h2>25 Juli 2023</h2>
                        </button>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate temporibus dolore distinctio
                            omnis exercitationem animi harum placeat illo accusamus consectetur atque, magni cupiditate
                            error nulla deserunt, aspernatur quaerat laboriosam quibusdam!</p>
                    </th>
                    <th class="berita-1">
                        <img src="images/kangidin.png" alt="">
                        <button>
                            <h2>25 Juli 2023</h2>
                        </button>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate temporibus dolore distinctio
                            omnis exercitationem animi harum placeat illo accusamus consectetur atque, magni cupiditate
                            error nulla deserunt, aspernatur quaerat laboriosam quibusdam!</p>
                    </th>
                    <th class="berita-1">
                        <img src="images/kangidin.png" alt="">
                        <button>
                            <h2>25 Juli 2023</h2>
                        </button>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate temporibus dolore distinctio
                            omnis exercitationem animi harum placeat illo accusamus consectetur atque, magni cupiditate
                            error nulla deserunt, aspernatur quaerat laboriosam quibusdam!</p>
                    </th>
                    <th class="kanan-berita">
                        <div class="buttprof">
                            <button>
                                <h2>PROFILE</h2>
                            </button>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et qui quis, id non beatae illo
                                delectus quisquam ducimus unde dolorum reiciendis rerum, voluptatibus ipsam neque sit
                                maiores similique. Minima, modi.</p>
                        </div>
                    </th>
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
                        <button>
                            BERGABUNG
                        </button>
                    </th>
                    <th>
                        <h1>10 Juta Orang</h1>
                        <h4>Telah Memberikan Dukungan</h4>
                        <button class="dukungan2">
                            BERI DUKUNGAN
                        </button>

                    </th>
                    <th class="dua">
                        <h3>JADI RELAWAN</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem est praesentium vero unde
                            cum sint non voluptatibus eos tenetur iure, facere quidem iusto! Corporis iusto est architecto
                            ex vel similique.</p>
                        <button>
                            BERGABUNG
                        </button>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="gambar-aff">
        <img src="images/kangidin.png" alt="">
        <p>Lorem ipsum, dolor sit amet <br> consectetur adipisicing elit.</p>
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
                    </th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@extends('layout-user.app')


@section('content')
    <link rel="stylesheet" href="css/berita.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="template2/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="template2/style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="template2/css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="template2/css/colors.css" rel="stylesheet">

    @php
        use App\Models\Setting;
        
        $partai = Setting::where('id_partai', 23)->get();
        
    @endphp
    @foreach ($partai as $s)
        <style>
            .form-control {
                background-color: {{ $s->warna }};
            }

            .form-control::placeholder {
                color: white;
                opacity: 0.5;
            }
        </style>
    @endforeach
    <div class="berita">
        <div class="row">
            <div class="col-8">
                <table>
                    <thead>
                        <tr>
                            <th>
                                <h1>Berita Terbaru</h1>
                            </th>
                        </tr>
                        <tr>
                            @foreach ($berita as $item)
                                <th class="berita-1">
                                    <img src="{{ asset($item->gambar) }}" alt="">
                                    <h2 class="judul">{{ $item->judul }}</h2>
                                    <p>{{ \Illuminate\Support\Str::limit($item->isi_berita, 200) }}</p>
                                </th>
                            @endforeach
                        </tr>

                    </thead>
                </table>
            </div>
            <div class="col-4">
                <div class="input-box">
                    <i class="uil uil-search"></i>
                    <input type="text" placeholder="Cari Berita" />
                </div>
            </div>
        </div>
    </div>
@endsection

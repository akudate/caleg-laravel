@extends('layout-user.app')


@section('content')

    <link rel="stylesheet" href="{{ asset('css/detailBerita.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
                <div class="berita-1">
                    <h1 class="judul">{{ $berita->judul }}</h1>
                    <img src="{{ asset($berita->gambar) }}" alt=""">
                    <p>{{ $berita->isi_berita }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('script')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
</script>

@extends('layout-user.app')


@section('content')

    <link rel="stylesheet" href="css/relawan.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @php
        use App\Models\Setting;

        $partai = Setting::where('id_partai', 23)->get();

    @endphp
    @foreach ($partai as $s)
        <style>
            .custom-hr {
                border-top: 3px solid {{ $s->warna }};
                /* Change color as desired */

            }
        </style>
    @endforeach

    <div class="relawan">
        <table>
            <thead>
                <tr>
                    <th>
                        <h1 class="judul">Relawan</h1>
                        <div class="custom-hr"></div>
                    </th>

                </tr>
                <tr>
                    <th class="relawan-1">
                        <p>Bergabunglah bersama kami untuk berkontribusi dalam membentuk masa depan yang lebih baik</p>
                    </th>
                </tr>
                <tr>
                    <th class="relawan-1" style="padding-top: 25px">
                        <p>
                        <form action="create-relawan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label class="form-label">Nama</label>
                            <input class="form-control" type="text" name="nama">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" name="email">
                            <label class="form-label">No HP</label>
                            <input class="form-control" type="number" name="no_hp">
                            <label class="form-label">Judul</label>
                            <input class="form-control" type="text" name="judul">
                            <label class="form-label">Pesan</label>
                            <textarea class="form-control" rows="4" name="pesan"></textarea>
                            <button class="form-control" type="submit">Kirim</button>
                        </form>
                        </p>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
{{-- @section('script')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
</script>

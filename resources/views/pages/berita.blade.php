@extends('layout-user.app')


@section('content')

    <link rel="stylesheet" href="css/berita.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <div class="berita">
        <table>
            <thead>
                <tr>
                    <th>
                        <h1>Berita Terbaru</h1>
                    </th>
                    <th>
                        <div class="input-box">
                            <i class="uil uil-search"></i>
                            <input type="text" placeholder="Cari Berita" />
                        </div>
                    </th>
                </tr>
                <tr>
                    <th class="berita-1">
                        <img src="image/berita1.png" alt="">
                        <h2 class="judul">Lorem Ipsum</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate temporibus dolore distinctio
                            omnis exercitationem animi harum placeat illo accusamus consectetur atque, magni cupiditate
                            error nulla deserunt, aspernatur quaerat laboriosam quibusdam!</p>
                    </th>
                    <th class="berita-2">
                        <img src="image/berita1.png" alt="">
                        <h2 class="judul">Lorem Ipsum</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate temporibus dolore distinctio
                            omnis exercitationem animi harum placeat illo accusamus consectetur atque, magni cupiditate
                            error nulla deserunt, aspernatur quaerat laboriosam quibusdam!</p>
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

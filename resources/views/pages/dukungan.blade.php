@extends('layout-user.app')


@section('content')

    <link rel="stylesheet" href="css/dukungan.css">
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
    <div class="dukungan">
        <div class="row">
            <div class="col-6">
                <table>
                    <thead>
                        <tr>
                            <th style="padding-right: 350px;">
                                <h1 class="judul">{{ $jumlah }} Dukungan</h1>
                                <div class="custom-hr"></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: left; padding-left: 20px;">
                                <div class="comments">
                                    <?php
                                    foreach ($dukungan as $comment) {
                                        echo '<div class="comment">';
                                        echo '<span class="author">' . $comment['nama'] . '</span><br>';
                                        echo '<span class="timestamp">' . $comment['created_at']->format('D, d M Y - H:i') . '</span>';
                                        echo '<p class="comment-text">' . $comment['pesan'] . '</p>';
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <table>
                    <thead>
                        <tr>
                            <th style="padding-right: 200px;">
                                <h1 class="judul">Tulis Dukunganmu</h1>
                                <div class="custom-hr"></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p>
                                <form action="create-dukungan" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <textarea class="form-control" rows="6" name="pesan" placeholder="Tulis pesan disini..."></textarea>
                                    <input class="form-control" type="text" name="nama"
                                        placeholder="Nama (wajib diisi)">
                                    <input class="form-control" type="email" name="email"
                                        placeholder="Email (wajib diisi)">

                                    <button class="form-control" type="submit">Kirim</button>
                                </form>
                                </p>

                            </td>
                        </tr>
                    </tbody>
                </table>
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

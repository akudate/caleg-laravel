@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h2>
                        Data Berita
                        <button class="float-right btn btn-icon btn-primary" data-toggle="modal" data-target="#modalCreate"
                            type="button">
                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                            <span class="btn-inner--text">Tambah</span>
                        </button>
                    </h2>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Image</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($berita as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td><img src="{{ asset('berita_image/' . $item->image) }}" class="img-fluid"
                                            width="100px"></td>
                                    <td>{{ $item->kategori }}</td>
                                    <td class="text-center">
                                        <a href="#" data-target="#modalEdit{{ $item->id_news }}" data-toggle="modal"
                                            class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ asset('admin/delete-berita/' . $item->id_news) }}" type="button"
                                            class="btn btn-danger"
                                            onclick="return confirm('Yakin akan menghapus data ini?')"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah-->
    <div class="modal fade" id="modalCreate">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Data</h3>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="create-berita" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label>Judul</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="judul" required="required"
                                placeholder="Masukkan Judul">
                        </div>
                        <label>Image</label>
                        <div class="form-group">
                            <input type="file" name="image" required="required" class="form-control">
                        </div>
                        <label>Kategori</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="kategori" required="required"
                                placeholder="Masukkan Kategori">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    @foreach ($berita as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Data</h3>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="edit-berita" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-2 text-center">
                                <img src="{{ asset('berita_image/' . $item->image) }}" class="img-fluid" width="200px">
                            </div>
                            <input type="hidden" class="form-control" id="id" name="id"
                                value="{{ $item->id }}">
                            <label>Judul</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="judul" required="required"
                                    value="{{ $item->judul }}" placeholder="Masukkan Judul">
                            </div>
                            <label>Image</label>
                            <div class="form-group">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <label>Kategori</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="kategori" required="required"
                                    value="{{ $item->kategori }}" placeholder="Masukkan Kategori">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

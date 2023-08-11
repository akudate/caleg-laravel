@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h2>
                        Data Profile
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
                                <th>Nama</th>
                                <th>Title</th>
                                <th>Alamat Kantor</th>
                                <th>Kontak</th>
                                <th>Biografi</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($profile as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->alamat_kantor }}</td>
                                    <td>{{ $item->kontak }}</td>
                                    <td>{{ $item->biografi }}</td>
                                    <td><img src="{{ asset('image/' . $item->foto) }}" class="img-fluid" width="100px">
                                    </td>
                                    <td class="text-center">
                                        <a href="#" data-target="#modalEdit{{ $item->id }}" data-toggle="modal"
                                            class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ asset('admin/delete-profile/' . $item->id) }}" type="button"
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
                <form action="create-profile" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label>Nama</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama" required="required"
                                placeholder="Masukkan Nama">
                        </div>
                        <label>Title</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" required="required"
                                placeholder="Masukkan Title">
                        </div>
                        <label>Alamat Kantor</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="alamat_kantor" required="required"
                                placeholder="Masukkan Alamat Kantor">
                        </div>
                        <label>Kontak</label>
                        <div class="form-group">
                            <input type="number" class="form-control" name="kontak" required="required"
                                placeholder="Masukkan Kontak">
                        </div>
                        <label>Biografi</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="biografi" required="required"
                                placeholder="Masukkan Biografi">
                        </div>
                        <label>Image</label>
                        <div class="form-group">
                            <input type="file" name="image" required="required" class="form-control">
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
    @foreach ($profile as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Data</h3>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="edit-profile" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-2 text-center">
                                <img src="{{ asset('profile_image/' . $item->image) }}" class="img-fluid" width="200px">
                            </div>
                            <input type="hidden" class="form-control" id="id" name="id"
                                value="{{ $item->id }}">
                            <label>Nama</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" required="required"
                                    value="{{ $item->nama }}" placeholder="Masukkan Nama">
                            </div>
                            <label>Title</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" required="required"
                                    value="{{ $item->title }}" placeholder="Masukkan Title">
                            </div>
                            <label>Alamat Kantor</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="alamat_kantor" required="required"
                                    value="{{ $item->alamat_kantor }}" placeholder="Masukkan Alamat Kantor">
                            </div>
                            <label>Kontak</label>
                            <div class="form-group">
                                <input type="number" class="form-control" name="kontak" required="required"
                                    value="{{ $item->kontak }}" placeholder="Masukkan Kontak">
                            </div>
                            <label>Biografi</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="biografi" required="required"
                                    value="{{ $item->biografi }}" placeholder="Masukkan Biografi">
                            </div>
                            <label>Image</label>
                            <div class="form-group">
                                <input type="file" name="image" class="form-control">
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

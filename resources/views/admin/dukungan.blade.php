@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h2>
                        Data Dukungan
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
                                <th>Pesan</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($dukungan as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->pesan }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="text-center">
                                        <a href="#" data-target="#modalEdit{{ $item->id }}" data-toggle="modal"
                                            class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ asset('admin/delete-dukungan/' . $item->id) }}" type="button"
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
                <form action="create-dukungan" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label>Pesan</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="pesan" required="required"
                                placeholder="Masukkan Pesan">
                        </div>
                        <label>Nama</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama" required="required"
                                placeholder="Masukkan Nama">
                        </div>
                        <label>Email</label>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" required="required"
                                placeholder="Masukkan Email">
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
    @foreach ($dukungan as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Data</h3>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="edit-dukungan" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="id" name="id"
                                value="{{ $item->id }}">
                            <label>Pesan</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="pesan" required="required"
                                    value="{{ $item->pesan }}" placeholder="Masukkan Pesan">
                            </div>
                            <label>Nama</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" required="required"
                                    value="{{ $item->nama }}" placeholder="Masukkan Nama">
                            </div>
                            <label>Email</label>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" required="required"
                                    value="{{ $item->email }}" placeholder="Masukkan Email">
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

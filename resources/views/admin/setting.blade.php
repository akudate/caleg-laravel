@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h2>
                        Setting Website
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
                                <th>Partai</th>
                                <th>Warna</th>
                                <th>Aktif</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($setting as $item)
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->partai }}</td>
                                    <td> <input type="color" value="{{ $item->warna }}" readonly>
                                    </td>
                                    <td>
                                        <form action="{{ route('updateStatus') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-primary status-btn" name="status"
                                                value="1">Terapkan</button>
                                        </form>
                                    </td>

                                    <td class="text-center">
                                        <a href="#" data-target="#modalEdit{{ $item->id }}" data-toggle="modal"
                                            class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ asset('admin/delete-setting/' . $item->id) }}" type="button"
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
                <form action="create-setting" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label>Partai</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="partai" required="required"
                                placeholder="Nama Partai">
                        </div>
                        <label>Warna</label>
                        <div class="form-group">
                            <input type="color" class="form-control" name="warna" required="required">
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
    @foreach ($setting as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Setting</h3>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="edit-setting" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="id" name="id"
                                value="{{ $item->id }}">
                            <label>Partai</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="partai" required="required"
                                    value="{{ $item->nama }}" placeholder="Nama Partai">
                            </div>
                            <label>Warna</label>
                            <div class="form-group">
                                <input type="color" class="form-control" name="warna" required="required"
                                    value="{{ $item->warna }}">
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

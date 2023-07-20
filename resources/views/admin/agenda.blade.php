@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h2>
                        Data Agenda
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
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Agenda</th>
                                <th>Lokasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($agenda as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->jam }}</td>
                                    <td>{{ $item->agenda }}</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td class="text-center">
                                        <a href="#" data-target="#modalEdit{{ $item->id }}" data-toggle="modal"
                                            class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ asset('admin/delete-agenda/' . $item->id) }}" type="button"
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
                <form action="create-agenda" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label>Tanggal</label>
                        <div class="form-group">
                            <input type="date" class="form-control" name="tanggal" required="required"
                                placeholder="Masukkan Tanggal">
                        </div>
                        <label>Jam</label>
                        <div class="form-group">
                            <input type="time" class="form-control" name="jam" required="required"
                                placeholder="Masukkan Jam">
                        </div>
                        <label>Agenda</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="agenda" required="required"
                                placeholder="Masukkan Agenda">
                        </div>
                        <label>Lokasi</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="lokasi" required="required"
                                placeholder="Masukkan Lokasi">
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
    @foreach ($agenda as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Data</h3>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="edit-agenda" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="id" name="id"
                                value="{{ $item->id }}">
                            <label>Tanggal</label>
                            <div class="form-group">
                                <input type="date" class="form-control" name="tanggal" required="required"
                                    value="{{ $item->tanggal }}" placeholder="Masukkan Tanggal">
                            </div>
                            <label>Jam</label>
                            <div class="form-group">
                                <input type="time" class="form-control" name="jam" required="required"
                                    value="{{ $item->jam }}" placeholder="Masukkan Jam">
                            </div>
                            <label>Agenda</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="agenda" required="required"
                                    value="{{ $item->agenda }}" placeholder="Masukkan Agenda">
                            </div>
                            <label>Lokasi</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="lokasi" required="required"
                                    value="{{ $item->lokasi }}" placeholder="Masukkan Lokasi">
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

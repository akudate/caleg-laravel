@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h2>
            Data Identitas
            <button class="float-right btn btn-icon btn-primary" data-toggle="modal" data-target="#modalCreate" type="button">
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
                <th>Visi</th>
                <th>Misi</th>
                <th>Afiliasi</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($identitas as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->visi}}</td>
                    <td>{{$item->misi}}</td>
                    <td>{{$item->afiliasi}}</td>
                    <td><img src="{{ asset('image/' . $item->image) }}" class="img-fluid" width="100px"></td>
                    <td class="text-center">
                        <a href="#" data-target="#modalEdit{{$item->id}}" data-toggle="modal" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="{{asset('admin/delete-identitas/'.$item->id)}}" type="button" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                </tbody>
                @endforeach
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
            <form action="create-identitas" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <label>Nama</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama">
                </div>
                <label>Visi</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="visi" required="required" placeholder="Masukkan Visi">
                </div>
                <label>Misi</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="misi" required="required" placeholder="Masukkan Misi">
                </div>
                <label>Afiliasi</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="afiliasi" required="required" placeholder="Masukkan Afiliasi">
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
@foreach ($identitas as $item)
<div class="modal fade" id="modalEdit{{$item->id}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Data</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="edit-identitas" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-2 text-center">
                    <img src="{{ asset('image/' . $item->image) }}" class="img-fluid" width="100px">
                </div>
                <input type="hidden" class="form-control" id="id" name="id" value="{{$item->id}}">
                <label>Nama</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" required="required" value="{{$item->nama}}" placeholder="Masukkan Nama">
                </div>
                <label>Visi</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="visi" required="required" value="{{$item->visi}}" placeholder="Masukkan Visi">
                </div>
                <label>Misi</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="misi" required="required" value="{{$item->misi}}" placeholder="Masukkan Misi">
                </div>
                <label>Afiliasi</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="afiliasi" required="required" value="{{$item->afiliasi}}" placeholder="Masukkan Afiliasi">
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

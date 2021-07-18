@extends('deskapp.dashboard')

@section('main-content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
             @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
             @endforeach
        </ul>
    </div>
@endif
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Tambah Data User</h4>
            <p class="mb-30">All bootstrap element classies</p>
        </div>
    </div>
    <form action="/user/simpan" method="POST" >
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
            <div class="col-sm-12 col-md-10">
                <input name="name" class="form-control" type="text" placeholder="Masukan Nama">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Username</label>
            <div class="col-sm-12 col-md-10">
                <input name="username" class="form-control" type="text" placeholder="Masukan Username">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
            <div class="col-sm-12 col-md-10">
                <input name="password" class="form-control" type="password" placeholder="Masukan Password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jabatan</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select form-control" name="jabatan">
                    <option>Pilih Jabatan</option>
                    <option value="admin">Admin</option>
                    <option value="pegawai">Pegawai</option>
                </select>
            </div>
        </div>
        <button type="submit" name="btn_submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
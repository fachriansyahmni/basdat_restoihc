@extends('deskapp.dashboard')

@section('main-content')
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Ubah Data User</h4>
            <p class="mb-30">Form untuk ubah data pengguna</p>
        </div>
    </div>
    <form action="/user/update/<?= $user->id; ?>" method="POST" >
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
            <div class="col-sm-12 col-md-10">
                <input name="name" value="<?= $user->name; ?>" class="form-control" type="text" placeholder="Masukan Nama">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Username</label>
            <div class="col-sm-12 col-md-10">
                <input name="username" value="<?= $user->username; ?>"  class="form-control" type="text" placeholder="Masukan Username">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
            <div class="col-sm-12 col-md-10">
                <input name="password" value="<?= $user->password; ?>"  class="form-control" type="password" placeholder="Masukan Password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jabatan</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select form-control" name="jabatan">
                    <option>Pilih Jabatan</option>
                    <option value="admin"  <?= $user->jabatan == "admin" ? "selected" : ""; ?>>Admin</option>
                    <option value="pegawai" <?= $user->jabatan == "pegawai" ? "selected" : ""; ?>>Pegawai</option>
                </select>
            </div>
        </div>
        <button type="submit" name="btn_submit" class="btn btn-primary">Ubah</button>
    </form>
</div>
@endsection
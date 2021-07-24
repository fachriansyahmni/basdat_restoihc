@extends('deskapp.dashboard')

@section('main-content')
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Tambah Data Cabang</h4>
            <p class="mb-30">halaman tambah data informasi cabang</p>
        </div>
    </div>
    <form action="/cabang/simpan" method="POST" >
        @csrf
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Id Cabang</label>
            <div class="col-sm-12 col-md-10">
                <input name="idCabang" class="form-control" type="text" placeholder="ID Cabang" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
            <div class="col-sm-12 col-md-10">
                <input name="alamat" class="form-control" type="text" placeholder="Masukan Alamat" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nomor Telepon</label>
            <div class="col-sm-12 col-md-10">
                <input name="noHp" class="form-control" type="text" placeholder="Masukan Nomor Telepon" required>
            </div>
        </div>
        
        <button type="submit" name="btn_submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
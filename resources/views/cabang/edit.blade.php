@extends('deskapp.dashboard')

@section('main-content')
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Ubah Data Cabang</h4>
            <p class="mb-30">All bootstrap element classies</p>
        </div>
    </div>
    <form action="/cabang/update/<?= $cabang->id; ?>" method="POST" >
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
            <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
            <div class="col-sm-12 col-md-10">
                <input name="alamat" class="form-control" value="<?= $cabang->alamat; ?>" type="text" placeholder="Masukan Alamat" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nomor Telepon</label>
            <div class="col-sm-12 col-md-10">
                <input name="noHp" class="form-control" value="<?= $cabang->noHp; ?>" type="text" placeholder="Masukan Nomor Telepon" required>
            </div>
        </div>
        
        <button type="submit" name="btn_submit" class="btn btn-primary">Ubah</button>
    </form>
</div>
@endsection
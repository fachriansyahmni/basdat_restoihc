@extends('deskapp.dashboard')

@section('main-content')
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Tambah Data Pesanan</h4>
            <p class="mb-30">All bootstrap element classies</p>
        </div>
    </div>
    <form action="/pesanan/simpan" method="POST" >
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nomor Receipt</label>
            <div class="col-sm-12 col-md-10">
                <input name="receiptid" class="form-control" type="text" placeholder="Nomor Receipt">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jumlah Menu</label>
            <div class="col-sm-12 col-md-10">
                <input name="jmlMenu" class="form-control" type="text" placeholder="Jumlah Menu">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nomor Meja</label>
            <div class="col-sm-12 col-md-10">
                <input name="noMeja" class="form-control" type="text" placeholder="Nomor Meja">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Id Menu</label>
            <div class="col-sm-12 col-md-10">
                <input name="idMenu" class="form-control" type="text" placeholder="Id Menu">
            </div>
        </div>
        <button type="submit" name="btn_submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
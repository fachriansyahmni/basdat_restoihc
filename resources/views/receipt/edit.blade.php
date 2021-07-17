@extends('deskapp.dashboard')

@section('main-content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Edit Receipt</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('pesanan')}}">Pesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
        </div>

    </div>
</div>
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Edit Data Pesanan</h4>
            <p class="mb-30">All bootstrap element classies</p>
        </div>
    </div>
    <form action="{{route('receipt.edit-save',$Receipt->id)}}" method="POST" >
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nomor Receipt</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" value="<?= $Receipt->id; ?>" type="text" readonly disabled placeholder="Nomor Receipt">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nomor Meja</label>
            <div class="col-sm-12 col-md-10">
                <input name="noMeja" class="form-control" value="<?= $Receipt->d_pesanan[0]->noMeja; ?>" type="text" placeholder="Nomor Meja">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nama Pembeli</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" value="<?= $Receipt->nama_pelanggan; ?>" type="text" name="nama_pelanggan" placeholder="Nama Pembeli">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jumlah Bayar</label>
            <div class="col-sm-12 col-md-10">
                <input name="jmlBayar" class="form-control" value="{{ $Receipt->jmlBayar }}" type="number" placeholder="Jumlah Bayar">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th width="20%">Jumlah</th>
                        <th>Total</th>
                    </tr>
                 </thead>
                 <tbody>
                     @foreach ($Receipt->d_pesanan as $index => $itemPesanan)
                     <input type="hidden" name="idPesanan[]" value="{{$itemPesanan->id}}"> 
                     <tr>
                         <td>{{$index + 1}}</td>
                         <td>{{$itemPesanan->d_menu->namaMenu}}</td>
                         <td><input type="number" name="jmlMenu[]" value="{{$itemPesanan->jmlMenu}}" class="form-control" id=""></td>
                         <td>
                             <div class="d-flex align-content-center">
                                 <span class="mr-auto">
                                     {{$itemPesanan->jmlMenu * $itemPesanan->d_menu->harga}}
                                 </span>
                                 <form action="">
                                     @csrf
                                     <button type="submit" class="btn btn-danger"><i class="fa fa-minus"></i></button>
                                 </form>
                             </div>
                        </td>
                     </tr>
                     @endforeach
                     <tr>
                         <td colspan="4" align="right"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button></td>
                     </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" name="btn_submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
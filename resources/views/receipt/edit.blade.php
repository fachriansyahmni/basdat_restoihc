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
            <p class="mb-30">@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif</p>
        </div>
    </div>
    <form action="{{route('receipt.edit-save',$Receipt->id)}}" method="POST" >
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="">Nomor Receipt</label>
                    <div class="">
                        <input class="form-control" value="<?= $Receipt->id; ?>" type="text" readonly disabled placeholder="Nomor Receipt">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="">Nomor Meja</label>
                    <div class="">
                        <input name="noMeja" class="form-control" value="<?= $Receipt->d_pesanan[0]->noMeja; ?>" type="text" placeholder="Nomor Meja">
                    </div>
                </div>
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
            <table class="table" id="tblMenuPesanan" >
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
                     <tr id="pesanan-{{$index}}">
                         <td>{{$index + 1}}</td>
                         <td>{{$itemPesanan->d_menu->namaMenu}}</td>
                         <td><input type="hidden" name="idPesanan[]" value="{{$itemPesanan->id}}"><input type="hidden" name="idMenu[]" class="mid-{{$itemPesanan->idMenu}}" value="{{$itemPesanan->idMenu}}"> <input type="number" name="jmlMenu[]" value="{{$itemPesanan->jmlMenu}}" class="form-control" id=""></td>
                         <td>
                             <div class="d-flex align-content-center">
                                 <span class="mr-auto">
                                     {{$itemPesanan->jmlMenu * $itemPesanan->d_menu->harga}}
                                 </span>
                                     <button type="button" class="btn btn-danger btbdelet-psn" onclick="deleteRow('pesanan-{{$index}}')"  data-rpsn="pesanan-{{$index}}"><i class="fa fa-minus"></i></button>
                             </div>
                        </td>
                     </tr>
                     @endforeach
                     {{-- <tr id="tr_add">
                         <td colspan="4" align="right"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#menuModal"><i class="fa fa-plus"></i></button></td>
                     </tr> --}}
                </tbody>
            </table>
            <button type="button" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#menuModal"><i class="fa fa-plus"></i></button>
        </div>
        <div class="mt-5">
            <button type="submit" name="btn_submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
        </div>
    </form>
</div>
<div class="h-75">.</div>
<div class="">
    
<div class="modal fade bs-example-modal-lg" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="menuModalLabel">Daftar Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <table class="data-table table stripe hover nowrap ">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Nama Menu</th>
                            <th>Harga</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($Menus) < 1)
                            <tr>
                                <td colspan="3">data kosong</td>
                            </tr>
                        @endif
                        @foreach ($Menus as $mn)
                        <tr>
                            <td class="table-plus" id="dnm{{$mn->id}}">{{$mn->namaMenu}}</td>
                            <td id="dhm{{$mn->id}}">{{$mn->harga}}</td>
                            <td>
                                <button type="button" class="btn btn-success btnadd-psn" data-rmenu="{{$mn->id}}"><i class="fa fa-plus">Add</i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
               </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        $( document ).ready(function() {
            // $('.btbdelet-psn').click(function(){ 
            //     var row = '#'+$(this).data('rpsn');
            //     alert(row);
            //     // $(row).remove(); 
            // });
            $('.btnadd-psn').click(function(){ 
                var idmenu = $(this).data('rmenu');
                var no = $('#tblMenuPesanan tbody tr:last td:first').text();
                var noRow = parseInt(no)+1;
                if($('.mid-'+idmenu).length){
                    alert("Sudah ada dinota");
                }else{   
                    markup = '<tr id="pesanan-'+no+'">';
                    markup += '<td>'+ noRow+'</td>';    
                    markup += '<td>'+$('#dnm'+idmenu).text()+'</td>';    
                    markup += '<td><input type="hidden" name="idMenu[]" class="mid-'+idmenu+'" value="'+idmenu+'"> <input type="number" name="jmlMenu[]" value="1" class="form-control" id=""></td>';    
                    var rpsn = "pesanan-"+no;
                    markup += '<td><div class="d-flex align-content-center"><span class="mr-auto">'+$('#dhm'+idmenu).text()+'</span><button type="button"  onclick="deleteRow(\''+rpsn+'\')" class="btn btn-danger btbdelet-psn" data-rpsn="pesanan-'+no+'"><i class="fa fa-minus"></i></button></div></td>';    
                    markup += '</tr>';
                    tableBody = $("#tblMenuPesanan tbody");
                    tableBody.append(markup);
                }
            });
        });
        function deleteRow(rpsn){
                var row = '#'+rpsn;
                $(row).remove(); 
         }
    </script>
@endpush    
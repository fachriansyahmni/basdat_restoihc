@extends('deskapp.dashboard')

@section('main-content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Home</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">@yield('title')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
            </div>

        </div>
    </div>
    <div class="card-box mb-30">
        <div class="card-header">
            <div class="d-flex justify-content-between align-content-center">
                <div class="card-title">
                    <h4 class="text-blue h4">Data Pesanan</h4>
                </div>
                <div class="">
                    <a href="{{route('pesanan-baru')}}" class="btn btn-success">Tambah Pesanan Baru</a>
                    <a href="{{route('pesanan.export')}}" class="btn btn-primary">Export Data</a>
                </div>
            </div>
        </div>
                    <div class="pd-20">
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <input type="text" name="cari" placeholder="Cari" class="form-control">
                                    </div>
                                    <div class="col-sm-2"><button type="submit" class="btn btn-primary">cari</button></div>
                                </div>
                            </form>
                    </div>
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Nomor Receipt</th>
                                    <th>Jumlah Menu</th>
                                    <th>Waktu Transaksi</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Receipts as $index => $item)
                                    <tr>
                                        <td class="table-plus"><?= $item->id; ?></td>
                                        <td>{{ count($item->d_pesanan) }}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#detailPesanan{{$item->id}}" type="button"><i class="dw dw-eye"></i> View</a>
                                                    <a class="dropdown-item" href="{{route('receipt.edit',$item->id)}}" ><i class="dw dw-edit2"></i> Edit</a>
                                                    <a class="dropdown-item" href="{{route('receipt.delete',$item->id)}}"><i class="dw dw-delete-3"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
    </div>

    @foreach ($Receipts as $item)
    <div class="modal fade bs-example-modal-lg" id="detailPesanan{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="detailPesanan{{$item->id}}Label" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Detail Pesanan {{$item->receiptid}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                   <table class="table" >
                       <thead>
                           <tr>
                               <th>No</th>
                               <th>Menu</th>
                               <th>Jumlah</th>
                               <th>Total</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->d_pesanan as $index => $itemPesanan) 
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$itemPesanan->d_menu->namaMenu}}</td>
                                <td>{{$itemPesanan->jmlMenu}}</td>
                                <td>{{$itemPesanan->jmlMenu * $itemPesanan->d_menu->harga}}</td>
                            </tr>
                            @endforeach
                       </tbody>
                   </table>
                   <div class="d-flex flex-column text-muted">
                       <div class="d-flex">
                           <div class=""><strong>Total Harga</strong></div>
                           <div class="ml-auto">{{$item->totalHarga}}</div>
                       </div>
                       <div class="d-flex">
                           <div class=""><strong>Jumlah Bayar</strong></div>
                           <div class="ml-auto">{{$item->jmlBayar}}</div>
                       </div>
                       <div class="d-flex">
                           <div class=""><strong>Nama Pelanggan</strong></div>
                           <div class="ml-auto">{{$item->nama_pelanggan}}</div>
                       </div>
                       <div class="d-flex">
                           <div class=""><strong>Tanggal Pembelian</strong></div>
                           <div class="ml-auto">{{$item->tglPembelian}}</div>
                       </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
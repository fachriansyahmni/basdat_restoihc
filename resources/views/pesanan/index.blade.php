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
                    <div class="pd-20">
                        <h4 class="text-blue h4">Data Pesanan</h4>
                        <a href="{{route('pesanan-baru')}}" class="btn btn-success">Tambah Pesanan Baru</a>
                        <a href="/pesanan/tambah" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Nomor Receipt</th>
                                    <th>Jumlah Menu</th>
                                    <th>Nomor Meja</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $item)
                                    <tr>
                                        <td class="table-plus"><?= $item->receiptid; ?></td>
                                        <td><?= $item->jmlMenu; ?></td>
                                        <td><?= $item->noMeja; ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                                    <a class="dropdown-item" href="/pesanan/edit/<?= $item->id; ?>"><i class="dw dw-edit2"></i> Edit</a>
                                                    <a class="dropdown-item" href="{{route('pesanan.delete',$item->id)}}"><i class="dw dw-delete-3"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
    </div>

@endsection
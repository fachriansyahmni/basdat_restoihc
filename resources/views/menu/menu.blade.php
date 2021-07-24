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
                        <li class="breadcrumb-item active" aria-current="page">Menu</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
            </div>

        </div>
    </div>
<div v class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Data Menu</h4>
                        <a href="#" role="button" data-toggle="modal" data-target="#bd-example-modal-lg" class="btn btn-success mb-3">Tambah Data</a>
                        <a href="/menu/export" role="button"  class="btn btn-primary mb-3">Export Data</a>
                        <a href="#" role="button" data-toggle="modal" data-target="#bd-example-modal-lg-import" class="btn btn-primary mb-3">Import Data</a>
                        <a href="#" role="button" data-toggle="modal" data-target="#filterModal" class="btn btn-primary mb-3">Filter</a>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($Menus) < 1)
                                    <tr>
                                        <td colspan="4">data kosong</td>
                                    </tr>
                                @endif
                                @foreach ($Menus as $mn)
                                <tr>
                                    <td class="table-plus">{{$mn->namaMenu}}</td>
                                    <td>{{$mn->harga}}</td>
                                    <td>@isset($mn->kategoriName)
                                        {{$mn->kategoriName->name}}
                                    @endisset</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="#" role="button"  data-toggle="modal" data-target="#editMenu{{$mn->id}}Modal"><i class="dw dw-edit2"></i> Edit</a>
                                                <a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#hapusMenu{{$mn->id}}Modal"><i class="dw dw-delete-3"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editMenu{{$mn->id}}Modal" tabindex="-1" role="dialog" aria-labelledby="editMenu{{$mn->id}}ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="editMenu{{$mn->id}}ModalLabel">Ubah Menu</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('submit.edit-menu',$mn->id)}}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="form-group">
                                                        <label for="">Nama Menu</label>
                                                        <input type="text" value="{{$mn->namaMenu}}" class="form-control" name="namaMenu" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Harga</label>
                                                        <input type="number" value="{{$mn->harga}}" class="form-control" name="harga" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Kategori</label>
                                                        <select name="kategori" id="" class="form-control">
                                                            <option value=""></option>
                                                            @foreach ($MenuKategories as $kateg)
                                                                <option value="{{$kateg->id}}" {{($kateg->id == $mn->menu_kategori_id) ? 'selected':''}}>{{$kateg->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="hapusMenu{{$mn->id}}Modal" tabindex="-1" role="dialog" aria-labelledby="hapusMenu{{$mn->id}}ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content bg-danger text-white">
                                            <div class="modal-body text-center">
                                                <h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Hapus Menu</h3>
                                                <p>Menu {{$mn->namaMenu}} akan dihapus.</p>
                                                <form action="{{route('submit.delet-menu',$mn->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="form-group">
                                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-light">Ya, Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
</div>  


<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

               <form action="{{route('submit.new-menu')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Menu</label>
                        <input type="text" class="form-control" value="{{old('namaMenu')}}" name="namaMenu" required>
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="number" class="form-control" value="{{old('harga')}}" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="kategori" id="" class="form-control">
                            <option value=""></option>
                            @foreach ($MenuKategories as $kateg)
                            <option value="{{$kateg->id}}" >{{$kateg->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- import modal --}}
<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg-import" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Import Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

               <form action="{{route('menu.import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Pilih Data</label>
                        <input type="file" class="form-control" name="excel" required>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="filterModalLabel">Filter Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

               <form action="{{route('menu')}}" method="get">
                    <div class="form-group">
                        <label for="">Nama Menu</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis</label>
                       <select class="form-control" name="kategori" id="">
                           <option value="0">Semua</option>
                           @foreach ($MenuKategories as $kateg)
                            <option value="{{$kateg->id}}" class="form-control">{{$kateg->name}}</option>
                            @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
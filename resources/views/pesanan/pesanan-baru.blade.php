@extends('deskapp.dashboard')

@section('main-content')
        <div class="pd-20">
            <a href="#">back</a>
        </div>
        <form action="{{route('submit-pesanan')}}" method="post">
            @csrf
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Pesanan</h4>
                </div>
                <div class="pd-20">
                    <div class="form-row mb-2">
                        <div class="col-2">
                            <label for="">Cabang</label>
                        </div>
                        <div class="col-10">
                            <select  name="cabang" class="form-control" required id="">
                                <option value=""></option>
                                @foreach (App\Cabang::get() as $cabang)
                                    <option value="{{$cabang->idCabang}}">{{$cabang->idCabang}} - {{$cabang->alamat}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-2">
                            <label for="">Nama Pembeli</label>
                        </div>
                        <div class="col-10">
                            <input type="text" name="namaPembeli" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-2">
                            <label for="">Nomor Meja</label>
                        </div>
                        <div class="col-10">
                            <input type="text" name="noMeja" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="pb-20">
                    <table class="checkbox-datatable table nowrap tbl-pesanan">
                        <thead>
                            <tr>
                                <th><div class="dt-checkbox">
                                        <input type="checkbox" name="select_all" value="1" id="example-select-all">
                                        <span class="dt-checkbox-label"></span>
                                    </div>
                                </th>
                                <th>Menu</th>
                                <th>Harga Satuan</th>
                                <th width=20%>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($Menus) < 1)
                                <tr>
                                    <td colspan="4">data kosong</td>
                                </tr>
                            @endif
                            @foreach ($Menus as $mn)
                            <tr onclick="pilihMenu(this)">
                                <td>{{$mn->id}}</td>
                                <td>{{$mn->namaMenu}}</td>
                                <td>{{$mn->harga}}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="card-box">
                <div class="pd-20">
                    <div class="mb-2">
                        <table class="table tbl-nota">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Menu</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                
                    <h2>Total Harga : Rp. <span class="totharga">0</span></h2>
                    <h4>Jumlah Bayar : Rp. <span class="jmlbyr"></span></h4>
                    <h4>Kembalian : Rp. <span class="hrgKembalian"></span></h4>
                </div>
                <input type="hidden" value="" name="payload">
                <div class="mb-2 row pd-20">
                    <div class="col-2">
                        <label for="">Jumlah Bayar</label>
                    </div>
                    <div class="col-10">
                        <input type="number" name="jmlBayar" onkeyup="updateHarga()" class="form-control" required>
                    </div>
                </div>
                <div class="pd-20">
                    <button class="btn btn-success btn-block" type="submit">Pesan</button>
                </div>
            </div>
        </form>
@endsection

@push('script')
<script src="{{ asset('/vendors/dash-deskapp/vendors/scripts/datatable-setting.js')}}"></script>
<script type="text/javascript">
    function pilihMenu(row)
    {
        // var firstInput = row.getElementsByTagName('input')[0];
        // firstInput.checked = !firstInput.checked;
        updateNota();
    }

    function updateNota(){
        var totalHarga = 0;
         var tblnota = [];
        var tableControl= $('.tbl-pesanan');
        var checkBoxes = tableControl.find("input[type=checkbox]");
        var numberQty = tableControl.find("input[type=number]");
        var arrayOfValues = [];
        for (var i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked) {
                var row = checkBoxes[i].parentNode.parentNode.parentNode;
                namaMenu = row.cells[1].innerHTML;
                hrgmenu = row.cells[2].innerHTML;
                qtym = numberQty[i-1].value;
                total =  qtym * hrgmenu;
                tblnota.push({nm:namaMenu,hrg:hrgmenu,qtymenu:qtym,totalHrg:total});
            }
        }
        
        var listPesanan = '';
        for(var i = 0; i < tblnota.length; i++) {
            listPesanan += '<tr>' +
                                        '<td>'+(i+1)+'</td>' +
                                        '<td>'+tblnota[i].nm+'</td>' +
                                        '<td>'+tblnota[i].hrg+'</td>' +
                                        '<td>'+tblnota[i].qtymenu+'</td>' +
                                        '<td>'+tblnota[i].totalHrg+'</td>'
                                    +'</tr>';
            
            totalHarga += tblnota[i].totalHrg;
        }
        $('input[name="payload"]').val(JSON.stringify(tblnota));
        $('.tbl-nota tbody').html(listPesanan);
        $('.totharga').text(totalHarga);
        updateHarga();
    }

    function updateHarga(){
        var totharga = $('.totharga').text();
        var jmlByrInput = $('input[name="jmlBayar"]').val();
        var labelJmlByr = $('.jmlbyr');
        var labelKembalian = $('.hrgKembalian');
        var kembalian = parseInt(jmlByrInput) - parseInt(totharga);
        
        if(jmlByrInput < totharga){
            labelJmlByr.html('<span class="text-danger">'+jmlByrInput+'</span>');
        }else{
            labelJmlByr.html('<span class="">'+jmlByrInput+'</span>');
        }
        if(!isNaN(kembalian)){
            if(kembalian < 0){
                labelKembalian.html('<span class="text-danger">'+kembalian+'</span>');
            }else{
                labelKembalian.html('<span class="text-success">'+kembalian+'</span>');
            }
        }
    }
    </script>
@endpush
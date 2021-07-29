<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan</title>
</head>
<body>
    <h1>Laporan</h1>
    <div class="">
        <table border="2">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">No. Receipt</th>
                    <th colspan="2">Menu</th>
                    <th rowspan="2" colspan="2">Jumlah</th>
                    <th rowspan="2">Total Harga</th>
                </tr>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($Receipts as $index => $receipt) {
                        ?>
                            <tr>
                                <td >{{$index+1}}</td>
                                <td>{{$receipt->receiptId}}</td>
                                <td>
                                    <?php 
                                    foreach ($receipt->d_pesanan as $pesananItem) {
                                    ?>
                                        {{$pesananItem->d_menu->namaMenu}} <br>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    foreach ($receipt->d_pesanan as $pesananItem) {
                                    ?>
                                        {{$pesananItem->d_menu->harga}} <br>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    foreach ($receipt->d_pesanan as $pesananItem) {
                                    ?>
                                        {{$pesananItem->jmlMenu}} <br>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    foreach ($receipt->d_pesanan as $pesananItem) {
                                    ?>
                                        {{$pesananItem->jmlMenu * $pesananItem->d_menu->harga}} <br>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>{{$receipt->totalHarga}}</td>
                            </tr>
                        <?php
                    }    
                ?>
            </tbody>
        </table>
    </div>
    <div class="">
        <p>oleh : {{Auth::user()->name}} <br>dicetak : <?= date('Y-m-d H:i:s') ?></p>
    </div>
</body>
</html>
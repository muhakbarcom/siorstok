<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />
    <style>
        .word-table {
            border: 1px solid black !important;
            border-collapse: collapse !important;
            width: 100%;
        }

        .word-table tr th,
        .word-table tr td {
            border: 1px solid black !important;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <h2>View_laporan_penjualan List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Kode Nota</th>
            <th>Nama Konsumen</th>
            <th>Jumlah Item</th>
            <th>Total Bayar</th>

        </tr><?php
                foreach ($view_laporan_penjualan_data as $view_laporan_penjualan) {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $view_laporan_penjualan->tanggal_transaksi ?></td>
                <td><?php echo $view_laporan_penjualan->kode_nota ?></td>
                <td><?php echo $view_laporan_penjualan->nama_konsumen ?></td>
                <td><?php echo $view_laporan_penjualan->qty ?></td>
                <td><?php echo $view_laporan_penjualan->total_bayar ?></td>
            </tr>
        <?php
                }
        ?>
    </table>
</body>

</html>
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
    <h2>View_laporan_harian List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Jumlah Item Terjual</th>
            <th>Total Pendapatan</th>

        </tr><?php
                foreach ($view_laporan_harian_data as $view_laporan_harian) {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $view_laporan_harian->tanggal_transaksi ?></td>
                <td><?php echo $view_laporan_harian->qty_terjual ?></td>
                <td><?php echo $view_laporan_harian->total_pendapatan ?></td>
            </tr>
        <?php
                }
        ?>
    </table>
</body>

</html>
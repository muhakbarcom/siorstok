<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Rekapan_stok List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Menu</th>
		<th>Tanggal Penjualan</th>
		<th>Stok Terjual</th>
		<th>Stok Sisa</th>
		
            </tr><?php
            foreach ($rekapan_stok_data as $rekapan_stok)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rekapan_stok->id_menu ?></td>
		      <td><?php echo $rekapan_stok->tanggal_penjualan ?></td>
		      <td><?php echo $rekapan_stok->stok_terjual ?></td>
		      <td><?php echo $rekapan_stok->stok_sisa ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
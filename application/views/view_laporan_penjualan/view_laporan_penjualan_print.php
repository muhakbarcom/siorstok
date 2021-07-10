<!DOCTYPE html>
<html>
<head>
    <title>Tittle</title>
    <style type="text/css" media="print">
    @page {
        margin: 0;  /* this affects the margin in the printer settings */
    }
      table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
      }
      table th{
          -webkit-print-color-adjust:exact;
        border: 1px solid;

                padding-top: 11px;
    padding-bottom: 11px;
    background-color: #a29bfe;
      }
   table td{
        border: 1px solid;

   }
        </style>
</head>
<body>
    <h3 align="center">DATA View Laporan Penjualan</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tanggal Transaksi</th>
		<th>Kode Nota</th>
		<th>Nama Konsumen</th>
		<th>Jumlah Item</th>
		<th>Total Bayar</th>
		
            </tr><?php
            foreach ($view_laporan_penjualan_data as $view_laporan_penjualan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $view_laporan_penjualan->tanggal_transaksi ?></td>
		      <td><?php echo $view_laporan_penjualan->kode_nota ?></td>
		      <td><?php echo $view_laporan_penjualan->nama_konsumen ?></td>
		      <td><?php echo $view_laporan_penjualan->jumlah_item ?></td>
		      <td><?php echo $view_laporan_penjualan->total_bayar ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
</body>
<script type="text/javascript">
      window.print()
    </script>
</html>
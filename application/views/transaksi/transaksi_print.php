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
    <h3 align="center">DATA Transaksi</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Jumlah Item</th>
		<th>Nama Konsumen</th>
		<th>Tanggal Transaksi</th>
		<th>Total Bayar</th>
		<th>Status Transaksi</th>
		<th>Status Pelayanan</th>
		<th>Id User</th>
		
            </tr><?php
            foreach ($transaksi_data as $transaksi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $transaksi->jumlah_item ?></td>
		      <td><?php echo $transaksi->nama_konsumen ?></td>
		      <td><?php echo $transaksi->tanggal_transaksi ?></td>
		      <td><?php echo $transaksi->total_bayar ?></td>
		      <td><?php echo $transaksi->status_transaksi ?></td>
		      <td><?php echo $transaksi->status_pelayanan ?></td>
		      <td><?php echo $transaksi->id_user ?></td>	
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
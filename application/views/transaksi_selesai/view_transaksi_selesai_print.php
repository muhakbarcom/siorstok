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
    <h3 align="center">DATA View Transaksi Selesai</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Transaksi</th>
		<th>Nama Konsumen</th>
		<th>Status Transaksi</th>
		<th>Tanggal Transaksi</th>
		
            </tr><?php
            foreach ($transaksi_selesai_data as $transaksi_selesai)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $transaksi_selesai->id_transaksi ?></td>
		      <td><?php echo $transaksi_selesai->nama_konsumen ?></td>
		      <td><?php echo $transaksi_selesai->status_transaksi ?></td>
		      <td><?php echo $transaksi_selesai->tanggal_transaksi ?></td>	
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
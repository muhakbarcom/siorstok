<!DOCTYPE html>
<html>

<head>
  <title>Tittle</title>
  <style type="text/css" media="print">
    @page {
      margin: 0;
      /* this affects the margin in the printer settings */
    }

    table {
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
    }

    table th {
      -webkit-print-color-adjust: exact;
      border: 1px solid;

      padding-top: 11px;
      padding-bottom: 11px;
      background-color: #a29bfe;
    }

    table td {
      border: 1px solid;

    }
  </style>
</head>

<body>
  <h3 align="center">DATA Detail Transaksi</h3>
  <h4>Tanggal Cetak : <?= date("d/M/Y"); ?> </h4>
  <table class="word-table" style="margin-bottom: 10px">
    <tr>
      <th>No</th>
      <th>Id Transaksi</th>
      <th>Id Menu</th>
      <th>Jumlah Item</th>
      <th>Total Bayar</th>
      <th>Tanggal Transaksi</th>
      <th>Catatan</th>

    </tr><?php
          foreach ($detail_transaksi_data as $detail_transaksi) {
          ?>
      <tr>
        <td><?php echo ++$start ?></td>
        <td><?php echo $detail_transaksi->id_transaksi ?></td>
        <td><?php echo $detail_transaksi->id_menu ?></td>
        <td><?php echo $detail_transaksi->qty ?></td>
        <td><?php echo $detail_transaksi->total_bayar ?></td>
        <td><?php echo $detail_transaksi->tanggal_transaksi ?></td>
        <td><?php echo $detail_transaksi->catatan ?></td>
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
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
  <h3 align="center">DATA View Laporan Bulanan</h3>
  <h4>Tanggal Cetak : <?= date("d/M/Y"); ?> </h4>
  <table class="word-table" style="margin-bottom: 10px">
    <tr>
      <th>No</th>
      <th>Tanggal Transaksi</th>
      <th>Jumlah Item Terjual</th>
      <th>Total Pendapatan</th>
      <?php $total_keseluruhan = 0; ?>
    </tr><?php
          foreach ($view_laporan_bulanan_data as $view_laporan_bulanan) {
          ?>
      <tr>
        <td><?php echo ++$start ?></td>
        <td><?php echo bulan_transaksi($view_laporan_bulanan->tanggal_transaksi) ?></td>
        <td><?php echo $view_laporan_bulanan->qty_terjual ?></td>
        <td><?php echo rupiah($view_laporan_bulanan->total_pendapatan) ?></td>
        <?php $total_keseluruhan = $total_keseluruhan + $view_laporan_bulanan->total_pendapatan; ?>
      </tr>
    <?php
          }
    ?>
    Total Keseluruhan = <?= rupiah($total_keseluruhan); ?>
  </table>
</body>
<script type="text/javascript">
  window.print()
</script>

</html>
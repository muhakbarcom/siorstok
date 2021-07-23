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
  <h3 align="center">DATA Rekapan Stok</h3>
  <h4>Tanggal Cetak : <?= date("d/M/Y"); ?> </h4>
  <table class="word-table" style="margin-bottom: 10px">
    <tr>
      <th>No</th>
      <th>Nama Menu</th>
      <th>Stok Terjual</th>
      <?php $total_stok_terjual = 0; ?>
    </tr><?php
          foreach ($rekapan_stok_data as $rekapan_stok) {
          ?>
      <tr>
        <td><?php echo ++$start ?></td>
        <td><?php echo $rekapan_stok->nama_menu ?></td>
        <td><?php echo $rekapan_stok->stok_terjual ?></td>
        <?php $total_stok_terjual = $total_stok_terjual + $rekapan_stok->stok_terjual; ?>
      </tr>
    <?php
          }
    ?>
    Total Stok Terjual = <?= $total_stok_terjual; ?>
  </table>
</body>
<script type="text/javascript">
  window.print()
</script>

</html>
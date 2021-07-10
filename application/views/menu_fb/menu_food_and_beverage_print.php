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
    <h3 align="center">DATA Menu Food And Beverage</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Menu</th>
		<th>Harga Menu</th>
		<th>Gambar</th>
		<th>Deskripsi</th>
		<th>Kategori Menu</th>
		
            </tr><?php
            foreach ($menu_fb_data as $menu_fb)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $menu_fb->nama_menu ?></td>
		      <td><?php echo $menu_fb->harga_menu ?></td>
		      <td><?php echo $menu_fb->gambar ?></td>
		      <td><?php echo $menu_fb->deskripsi ?></td>
		      <td><?php echo $menu_fb->kategori_menu ?></td>	
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
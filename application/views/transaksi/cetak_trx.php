<div class="col-md-12">
    <table class="table">
        <p>
            Nama Konsumen : <?= $atas_nama; ?>
            <br>
            Waktu : <?= dateina($tanggal_trx); ?>
        </p>
        <thead class="thead-dark">
            <tr>
                <!-- <th>Gambar</th> -->
                <th>No</th>
                <th>Nama Menu</th>
                <th>Item</th>
                <th>Harga Menu</th>
                <th>Sub Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php echo form_open('transaksi/selesai_trx'); ?>
            <?php $i = 1; ?>
            <?php
            foreach ($cetak as $k) :
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $k->nama_menu; ?></td>
                    <td><?= $k->jumlah_item; ?></td>
                    <td><?= rupiah($k->harga_menu); ?></td>
                    <td><?= rupiah($k->total_bayar); ?></td>
                    <!-- <td><input type="text" class="form-control" name="<?php echo $i . 'catatan'; ?>"></td> -->
                </tr>
                <?php $i++; ?>
            <?php endforeach ?>

        </tbody>
    </table>
    <div class="row">
        <div class="col-md-4 text-right"></div>
        <div class="col-md-8"> <b>Total Bayar</b> <?= rupiah($total_bayar); ?></div>
    </div>
    <div class="row">
        <div class="col-md-4 text-right"></div>
        <div class="col-md-8"> <b>Bayar(CASH)</b> <?= rupiah($bayar); ?></div>
    </div>
    <div class="row">
        <div class="col-md-4 text-right"></div>
        <div class="col-md-8"> <b>Kembalian</b> <?= rupiah($kembalian); ?></div>
    </div>
    <script>
        window.print();
    </script>
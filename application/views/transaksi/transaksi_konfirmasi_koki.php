<div class="col-md-12">
    <table class="table">
        <?= $atas_nama; ?>
        <thead class="thead-dark">
            <tr>
                <!-- <th>Gambar</th> -->
                <th>No</th>
                <th>Nama Menu</th>
                <th>Item</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            <?php echo form_open('transaksi/konfirmasi_trx_koki/' . $id_trx); ?>
            <?php $i = 1; ?>
            <?php
            foreach ($konfirmasi as $k) :
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $k->nama_menu; ?></td>
                    <td><?= $k->jumlah_item; ?></td>
                    <td><?= $k->catatan; ?></td>
                    <!-- <td><input type="text" class="form-control" name="<?php echo $i . 'catatan'; ?>"></td> -->
                </tr>
                <?php $i++; ?>
            <?php endforeach ?>

        </tbody>
    </table>
</div>
<!-- <div class="row mt-3">
        <div class="col-md-12 text-center"><b>Atas Nama</b> <input type="text" name="atas_nama" class=""></div>
    </div> -->
<div class="row mt-5">
    <div class="col-md-6"></div>
    <div class="col-md-6 text-right"><button type="submit" class="btn btn-primary">Konfirmasi</button></div>
</div>
<?= form_close(); ?>



</div>
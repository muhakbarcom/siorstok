<div class="col-md-12">
    <table class="table">
        <!-- <?= $atas_nama; ?> -->
        <thead class="thead-dark">
            <tr>
                <!-- <th>Gambar</th> -->
                <th>No</th>
                <th>Nama Konsumen</th>
                <th>Status</th>
                <th>Aksi</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php echo form_open('transaksi/konfirmasi_trx'); ?>
            <?php $i = 1; ?>
            <?php
            foreach ($selesai as $s) :
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $s->nama_kosumen; ?></td>
                    <td><?= $s->status; ?></td>
                    <td><a href="#" class="btn btn-sm btn-info">Cetak</a></td>
                    <td><?= $s->tanggal_transaksi; ?></td>
                    <!-- <td><input type="text" class="form-control" name="<?php echo $i . 'catatan'; ?>"></td> -->
                </tr>
                <?php $i++; ?>
            <?php endforeach ?>

        </tbody>
    </table>
    <input id="total" type="hidden" class="form-group" name="total" value="<?= $total_bayar; ?>">
    <input id="id_trx" type="hidden" class="form-group" name="id_trx" value="<?= $id_trx; ?>">
    <div class="row">
        <div class="col-md-4 text-right"></div>
        <div class="col-md-2"> <b>Bayar(CASH)</b> </div>
        <div class="col-md-3"> <input id="bayar" type="text" class="form-group" name="bayar" onkeyup="sum();"></div>
        <div class="col-md-3"> </div>
    </div>
    <div class="row">
        <div class="col-md-4 text-right"></div>
        <div class="col-md-2"> <b>Kembalian</b> </div>
        <div class="col-md-3"> <input id="kembalian" type="text" class="form-group" name="kembalian"></div>
        <div class="col-md-3"> </div>
    </div>
</div>
<!-- <div class="row mt-3">
        <div class="col-md-12 text-center"><b>Atas Nama</b> <input type="text" name="atas_nama" class=""></div>
    </div> -->
<div class="row mt-5">
    <div class="col-md-6"></div>
    <div class="col-md-6 text-right"><button type="submit" class="btn btn-primary">Selesai</button></div>
</div>
<?= form_close(); ?>



</div>
<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('bayar').value;
        var txtSecondNumberValue = document.getElementById('total').value;
        var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('kembalian').value = result;
        }
    }
</script>
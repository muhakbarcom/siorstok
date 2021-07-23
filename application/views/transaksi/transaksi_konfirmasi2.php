<div class="col-md-12">
    <table class="table">
        <?= $atas_nama; ?>
        <thead class="thead-dark">
            <tr>
                <!-- <th>Gambar</th> -->
                <th>No</th>
                <th>Nama Menu</th>
                <th>Qty</th>
                <th>Harga Menu</th>
                <th>Sub Harga</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            <?php echo form_open('transaksi/selesai_trx'); ?>
            <?php $i = 1; ?>
            <?php
            foreach ($konfirmasi as $k) :
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $k->nama_menu; ?></td>
                    <td><?= $k->qty; ?></td>
                    <td><?= rupiah($k->harga_menu); ?></td>
                    <td><?= rupiah($k->total_bayar); ?></td>
                    <td><?= $k->catatan; ?></td>
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
    <input id="total" type="hidden" name="total" class="form-group" name="total" value="<?= $total_bayar; ?>">
    <input id="id_trx" type="hidden" class="form-group" name="id_trx" value="<?= $id_trx; ?>">
    <div class="row">
        <div class="col-md-4 text-right"></div>
        <div class="col-md-2"> <b>Bayar(CASH)</b> </div>
        <div class="col-md-3"> <input id="bayar" type="text" class="form-group" name="bayar" onkeyup="sum();" onkeydown="sum();" required></div>
        <div class="col-md-3"> </div>
    </div>
    <div class="row">
        <div class="col-md-4 text-right"></div>
        <div class="col-md-2"> <b>Kembalian</b> </div>

        <div class="col-md-3">
            <p id="demo"></p><input id="kembalian" type="hidden" class="form-group" name="kembalian">
        </div>
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

        if (isNaN(result)) {
            document.getElementById('kembalian').value = 0;
            document.getElementById("demo").innerHTML = 0;
        }
        if (!isNaN(result)) {
            document.getElementById('kembalian').value = result;
            document.getElementById("demo").innerHTML = result;
        }
    }
</script>
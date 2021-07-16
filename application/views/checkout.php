<div class="col-md-12">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <!-- <th>Gambar</th> -->
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Sub Total</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            <?php echo form_open('konsumen/selesai'); ?>
            <?php $i = 1; ?>
            <?php
            foreach ($this->cart->contents() as $items) :
            ?>
                <tr>
                    <!-- <td>Gambar</td> -->
                    <td><?= $items['name']; ?></td>
                    <td><?= rupiah($items['price']); ?></td>
                    <td><?= $items['qty']; ?></td>
                    <td><?= rupiah($items['subtotal']); ?></td>
                    <td><input type="text" class="form-control" name="<?php echo $i . 'catatan'; ?>"></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach ?>

        </tbody>
    </table>
    <div class="row">
        <?php $jumlah_menu_item = count($this->cart->contents()); ?>
        <div class="col-md-6 text-right"><b> Total Item </b><?= $jumlah_menu_item; ?>
            <b> Total Quantity </b> <?= $this->cart->total_items(); ?>
        </div>

        <div class="col-md-6"> <b>Total Bayar</b> <?= rupiah($this->cart->total()); ?></div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 text-center"><b>Atas Nama</b> <input type="text" name="atas_nama" required></div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6"></div>
        <div class="col-md-6 text-right"><button type="submit" class="btn btn-primary">Selesai</button></div>
    </div>
    <?= form_close(); ?>



</div>
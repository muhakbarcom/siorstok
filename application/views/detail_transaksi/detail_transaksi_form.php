<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button; ?> Detail_transaksi</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="int">Id Transaksi <?php echo form_error('id_transaksi') ?></label>
                        <input type="text" class="form-control" name="id_transaksi" id="id_transaksi" placeholder="Id Transaksi" value="<?php echo $id_transaksi; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Id Menu <?php echo form_error('id_menu') ?></label>
                        <input type="text" class="form-control" name="id_menu" id="id_menu" placeholder="Id Menu" value="<?php echo $id_menu; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Jumlah Item <?php echo form_error('qty') ?></label>
                        <input type="text" class="form-control" name="qty" id="qty" placeholder="Jumlah Item" value="<?php echo $qty; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Total Bayar <?php echo form_error('total_bayar') ?></label>
                        <input type="text" class="form-control" name="total_bayar" id="total_bayar" placeholder="Total Bayar" value="<?php echo $total_bayar; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Tanggal Transaksi <?php echo form_error('tanggal_transaksi') ?></label>
                        <input type="text" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" placeholder="Tanggal Transaksi" value="<?php echo $tanggal_transaksi; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Catatan <?php echo form_error('catatan') ?></label>
                        <input type="text" class="form-control" name="catatan" id="catatan" placeholder="Catatan" value="<?php echo $catatan; ?>" />
                    </div>
                    <input type="hidden" name="id_detail_transaksi" value="<?php echo $id_detail_transaksi; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('detail_transaksi') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
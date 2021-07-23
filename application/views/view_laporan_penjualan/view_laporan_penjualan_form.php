<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> View_laporan_penjualan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                     <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
              <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Tanggal Transaksi <?php echo form_error('tanggal_transaksi') ?></label>
            <input type="text" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" placeholder="Tanggal Transaksi" value="<?php echo $tanggal_transaksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kode Nota <?php echo form_error('kode_nota') ?></label>
            <input type="text" class="form-control" name="kode_nota" id="kode_nota" placeholder="Kode Nota" value="<?php echo $kode_nota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Konsumen <?php echo form_error('nama_konsumen') ?></label>
            <input type="text" class="form-control" name="nama_konsumen" id="nama_konsumen" placeholder="Nama Konsumen" value="<?php echo $nama_konsumen; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jumlah Item <?php echo form_error('qty') ?></label>
            <input type="text" class="form-control" name="qty" id="qty" placeholder="Jumlah Item" value="<?php echo $qty; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total Bayar <?php echo form_error('total_bayar') ?></label>
            <input type="text" class="form-control" name="total_bayar" id="total_bayar" placeholder="Total Bayar" value="<?php echo $total_bayar; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('view_laporan_penjualan') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>
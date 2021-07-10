<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> View_laporan_bulanan</h3>
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
            <label for="decimal">Jumlah Item Terjual <?php echo form_error('jumlah_item_terjual') ?></label>
            <input type="text" class="form-control" name="jumlah_item_terjual" id="jumlah_item_terjual" placeholder="Jumlah Item Terjual" value="<?php echo $jumlah_item_terjual; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Total Pendapatan <?php echo form_error('total_pendapatan') ?></label>
            <input type="text" class="form-control" name="total_pendapatan" id="total_pendapatan" placeholder="Total Pendapatan" value="<?php echo $total_pendapatan; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('view_laporan_bulanan') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>
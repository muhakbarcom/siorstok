<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Rekapan_stok</h3>
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
            <label for="int">Id Menu <?php echo form_error('id_menu') ?></label>
            <input type="text" class="form-control" name="id_menu" id="id_menu" placeholder="Id Menu" value="<?php echo $id_menu; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Penjualan <?php echo form_error('tanggal_penjualan') ?></label>
            <input type="text" class="form-control" name="tanggal_penjualan" id="tanggal_penjualan" placeholder="Tanggal Penjualan" value="<?php echo $tanggal_penjualan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stok Terjual <?php echo form_error('stok_terjual') ?></label>
            <input type="text" class="form-control" name="stok_terjual" id="stok_terjual" placeholder="Stok Terjual" value="<?php echo $stok_terjual; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stok Sisa <?php echo form_error('stok_sisa') ?></label>
            <input type="text" class="form-control" name="stok_sisa" id="stok_sisa" placeholder="Stok Sisa" value="<?php echo $stok_sisa; ?>" />
        </div>
	    <input type="hidden" name="id_rekapan_stok" value="<?php echo $id_rekapan_stok; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rekapan_stok') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>
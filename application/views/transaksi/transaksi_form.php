<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Transaksi</h3>
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
            <label for="int">Jumlah Item <?php echo form_error('jumlah_item') ?></label>
            <input type="text" class="form-control" name="jumlah_item" id="jumlah_item" placeholder="Jumlah Item" value="<?php echo $jumlah_item; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Konsumen <?php echo form_error('nama_konsumen') ?></label>
            <input type="text" class="form-control" name="nama_konsumen" id="nama_konsumen" placeholder="Nama Konsumen" value="<?php echo $nama_konsumen; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tanggal Transaksi <?php echo form_error('tanggal_transaksi') ?></label>
            <input type="text" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" placeholder="Tanggal Transaksi" value="<?php echo $tanggal_transaksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total Bayar <?php echo form_error('total_bayar') ?></label>
            <input type="text" class="form-control" name="total_bayar" id="total_bayar" placeholder="Total Bayar" value="<?php echo $total_bayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Transaksi <?php echo form_error('status_transaksi') ?></label>
            <input type="text" class="form-control" name="status_transaksi" id="status_transaksi" placeholder="Status Transaksi" value="<?php echo $status_transaksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Pelayanan <?php echo form_error('status_pelayanan') ?></label>
            <input type="text" class="form-control" name="status_pelayanan" id="status_pelayanan" placeholder="Status Pelayanan" value="<?php echo $status_pelayanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>
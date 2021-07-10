<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> DAFTAR MENU</h3> 
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
        <?php echo form_open_multipart($action); ?>
	    <div class="form-group">
            <label for="varchar">Nama Menu <?php echo form_error('nama_menu') ?></label>
            <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="Nama Menu" value="<?php echo $nama_menu; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Harga Menu <?php echo form_error('harga_menu') ?></label>
            <input type="text" class="form-control" name="harga_menu" id="harga_menu" placeholder="Harga Menu" value="<?php echo $harga_menu; ?>" />
        </div>
	    <div class="form-group">
                    <label for="varchar">Gambar Menu <?php echo form_error('gambar') ?></label>
                    <input type="file" class="form-control" name="gambar" id="gambar" placeholder="gambar" value="<?php echo $gambar; ?>" />
                    <?php if ($gambar) : ?>
                        <img src="<?= base_url('assets/uploads/image/menu/') . $gambar ?>" class="img-thumbnail">
                   <?php else : ?>
                    <?php endif ?>
	    <div class="form-group">
            <label for="varchar">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kategori Menu <?php echo form_error('kategori_menu') ?></label>
            <input type="text" class="form-control" name="kategori_menu" id="kategori_menu" placeholder="Kategori Menu" value="<?php echo $kategori_menu; ?>" />
        </div>
	    <input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('menu_fb') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>
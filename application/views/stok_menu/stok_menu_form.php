<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button; ?> Stok Menu</h3>
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
                    <?php if ($fungsi == 'create') : ?>
                        <div class="form-group"> <label>Menu</label>
                            <select class="selectpicker form-control" name="id_menu" id="id_menu" data-placeholder="Select a Parent" data-live-search="true" style="width: 100%;">
                                <option value="<?php echo $id_menu; ?>">-- Pilih Menu -- </option>
                                <?php
                                foreach ($nama_menu as $key => $value) {
                                    echo "<option value='" . $value->id_menu . "'>" . $value->nama_menu . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    <?php else : ?>
                        <input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>" />
                    <?php endif; ?>


                    <div class="form-group">
                        <label for="int">Jumlah Stok Menu <?php echo form_error('jumlah_stok_menu') ?></label>
                        <input type="text" class="form-control" name="jumlah_stok_menu" id="jumlah_stok_menu" placeholder="Jumlah Stok Menu" value="<?php echo $jumlah_stok_menu; ?>" />
                    </div>
                    <input type="hidden" class="form-control" name="terjual" id="terjual" placeholder="Terjual" value="<?php echo $terjual; ?>" />
                    <input type="hidden" class="form-control" name="sisa" id="sisa" placeholder="Sisa" value="<?php echo $sisa; ?>" />

                    <input type="hidden" name="id_stok_menu" value="<?php echo $id_stok_menu; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('stok_menu') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
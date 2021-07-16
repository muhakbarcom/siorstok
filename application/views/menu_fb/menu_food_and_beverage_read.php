<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Menu Food And Beverage Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td>Nama Menu</td>
                        <td><?php echo $nama_menu; ?></td>
                    </tr>
                    <tr>
                        <td>Harga Menu</td>
                        <td><?php echo $harga_menu; ?></td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td><?php echo $gambar; ?></td>
                    </tr>
                    <!-- <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr> -->
                    <tr>
                        <td>Kategori Menu</td>
                        <td><?php echo $kategori_menu; ?></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('menu_fb') ?>" class="btn bg-purple">Cancel</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
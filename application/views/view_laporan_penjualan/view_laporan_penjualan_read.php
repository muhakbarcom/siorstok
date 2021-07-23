<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">View Laporan Penjualan Detail</h3>
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
                        <td>Tanggal Transaksi</td>
                        <td><?php echo $tanggal_transaksi; ?></td>
                    </tr>
                    <tr>
                        <td>Kode Nota</td>
                        <td><?php echo $kode_nota; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Konsumen</td>
                        <td><?php echo $nama_konsumen; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Item</td>
                        <td><?php echo $qty; ?></td>
                    </tr>
                    <tr>
                        <td>Total Bayar</td>
                        <td><?php echo $total_bayar; ?></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('view_laporan_penjualan') ?>" class="btn bg-purple">Cancel</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
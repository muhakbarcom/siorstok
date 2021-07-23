<?php $total_pendapatan = 0; ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Laporan Penjualan Harian</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">

                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('view_laporan_harian/printdoc_filter'); ?>" class="form-inline" method="get" style="margin-top:10px">
                            <?php if ($sampai) : ?>
                                <input type="hidden" class="form-control formdate" name="sampai" id="SampaiTanggal" required="true" placeholder="Sampai Tanggal" value="<?= $sampai; ?>">
                            <?php endif ?>
                            <?php if ($dari) : ?>
                                <input type="hidden" class="form-control formdate" name="dari" id="DariTanggal" required="true" placeholder="Dari Tanggal" value="<?= $dari; ?>">
                            <?php endif ?>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i>Print</button>
                        </form>
                        <?php echo anchor(site_url('View_laporan_harian/excel'), '<i class="fa fa-file-excel"></i> Excel', 'class="btn btn-success"'); ?>
                        <?php echo anchor(site_url('View_laporan_harian/word'), '<i class="fa fa-file-word"></i> Word', 'class="btn btn-primary"'); ?><form action="<?php echo site_url('View_laporan_harian/index'); ?>" class="form-inline" method="get" style="margin-top:10px">
                            <!-- <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
                                    ?>
                                        <a href="<?php echo site_url('View_laporan_harian'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div> -->
                        </form>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;margin-left:10px">
                    <form action="<?php echo base_url('View_laporan_harian'); ?>" class="form-inline" method="post">
                        <div class="col input-group">
                            <!-- <label><b>Filter :</b></label> -->
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-calendar"></i></button></span>
                            <input type="text" class="form-control formdate" name="dari" id="DariTanggal" required="true" placeholder="Dari Tanggal">
                        </div>
                        <div class="col input-group">
                            <span class="input-group-addon" id="sizing-addon1">
                                <i class="fas fa-chevron-right"></i></span>
                            <input type="text" class="form-control formdate" name="sampai" id="SampaiTanggal" required="true" placeholder="Sampai Tanggal">
                        </div>
                        <div class="col input-group">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-check-circle"></i> Submit</button>
                        </div>
                    </form>
                </div>
                <form method="post" action="<?= site_url('View_laporan_harian/deletebulk'); ?>" id="formbulk">
                    <table class="table table-bordered" style="margin-bottom: 10px" style="width:100%">
                        <tr>
                            <!-- <th style="width: 10px;"><input type="checkbox" name="selectall" /></th> -->
                            <th>No</th>
                            <th>Tanggal Transaksi</th>
                            <th>Jumlah Item Terjual</th>
                            <th>Jumlah Qty Terjual</th>
                            <th>Total Pendapatan</th>
                            <?php $total_keseluruhan = 0; ?>
                            <!-- <th>Action</th> -->
                        </tr><?php
                                foreach ($view_laporan_harian_data as $view_laporan_harian) {
                                    $total_keseluruhan = $total_keseluruhan + $view_laporan_harian->total_pendapatan;
                                ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo tanggal_transaksi($view_laporan_harian->tanggal_transaksi) ?></td>
                                <td><?php echo $view_laporan_harian->jumlah_items ?></td>
                                <td><?php echo $view_laporan_harian->qty_terjual ?></td>
                                <td><?php echo rupiah($view_laporan_harian->total_pendapatan) ?></td>
                            </tr>
                        <?php
                                }
                        ?>
                    </table>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-9">
                            <a href="#" class="btn bg-yellow">Total Record : <?php echo $total_rows ?></a>
                        </div>
                        <div class="col-md-3">
                            <!-- <?php echo  $_SESSION['jumlah']; ?> -->
                            <?php foreach ($view_laporan_harian_data_x as $vlx) {
                                $total_pendapatan = $total_pendapatan + $vlx->total_pendapatan;
                            } ?>
                            Total Keseluruhan : <?= rupiah($total_pendapatan); ?>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmdelete(linkdelete) {
        alertify.confirm("Apakah anda yakin akan  menghapus data tersebut?", function() {
            location.href = linkdelete;
        }, function() {
            alertify.error("Penghapusan data dibatalkan.");
        });
        $(".ajs-header").html("Konfirmasi");
        return false;
    }
    $(':checkbox[name=selectall]').click(function() {
        $(':checkbox[name=id]').prop('checked', this.checked);
    });

    $("#formbulk").on("submit", function() {
        var rowsel = [];
        $.each($("input[name='id']:checked"), function() {
            rowsel.push($(this).val());
        });
        if (rowsel.join(",") == "") {
            alertify.alert('', 'Tidak ada data terpilih!', function() {});

        } else {
            var prompt = alertify.confirm('Apakah anda yakin akan menghapus data tersebut?',
                'Apakah anda yakin akan menghapus data tersebut?').set('labels', {
                ok: 'Yakin',
                cancel: 'Batal!'
            }).set('onok', function(closeEvent) {

                $.ajax({
                    url: "View_laporan_harian/deletebulk",
                    type: "post",
                    data: "msg = " + rowsel.join(","),
                    success: function(response) {
                        if (response == true) {
                            location.reload();
                        }
                        //console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

            });
            $(".ajs-header").html("Konfirmasi");
        }
        return false;
    });
</script>
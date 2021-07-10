<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">DAFTAR MENU</h3>
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
                        <?php echo anchor(site_url('menu_fb/create'), '<i class="fa fa-plus"></i> Create', 'class="btn bg-purple"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">

                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('menu_fb/index'); ?>" class="form-inline" method="get" style="margin-top:10px">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
                                    ?>
                                        <a href="<?php echo site_url('menu_fb'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <form method="post" action="<?= site_url('menu_fb/deletebulk'); ?>" id="formbulk">
                    <table class="table table-bordered" style="margin-bottom: 10px" style="width:100%">
                        <tr>
                            <!-- <th style="width: 10px;"><input type="checkbox" name="selectall" /></th> -->
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Harga Menu</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Kategori Menu</th>
                            <th>Action</th>
                        </tr><?php
                                foreach ($menu_fb_data as $menu_fb) {
                                ?>
                            <tr>

                                <!-- <td style="width: 10px;padding-left: 8px;"><input type="checkbox" name="id" value="<?= $menu_fb->id_menu; ?>" />&nbsp;</td> -->

                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $menu_fb->nama_menu ?></td>
                                <td><?php echo $menu_fb->harga_menu ?></td>
                                <td> <img src="<?= base_url('assets/uploads/image/menu/') . $menu_fb->gambar; ?>" class="img-thumbnail" width="50px"></td>
                                <td><?php echo $menu_fb->deskripsi ?></td>
                                <td><?php echo $menu_fb->kategori_menu ?></td>
                                <td style="text-align:center" width="200px">
                                    <?php if ($submenu == 1) : ?>
                                        <?php
                                        echo anchor(site_url('menu_fb/read/' . $menu_fb->id_menu), '<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"');
                                        echo ' ';
                                        echo anchor(site_url('menu_fb/update/' . $menu_fb->id_menu), ' <i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"');
                                        echo ' ';
                                        echo anchor(site_url('delete/' . $menu_fb->id_menu) . '/' . $title, ' <i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="javasciprt: return confirmdelete(\'delete/' . $menu_fb->id_menu . '/' . $title . '\')"  data-toggle="tooltip" title="Delete" ');
                                        ?>
                                    <?php else : ?>
                                        <?php
                                        echo anchor(site_url('menu_fb/read/' . $menu_fb->id_menu), '<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"');
                                        echo ' ';
                                        echo anchor(site_url('menu_fb/update/' . $menu_fb->id_menu), ' <i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"');
                                        echo ' ';
                                        echo anchor(site_url('menu_fb/delete/' . $menu_fb->id_menu), ' <i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="javasciprt: return confirmdelete(\'menu_fb/delete/' . $menu_fb->id_menu . '\')"  data-toggle="tooltip" title="Delete" ');
                                        ?>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php
                                }
                        ?>
                    </table>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <a href="#" class="btn bg-yellow">Total Record : <?php echo $total_rows ?></a>
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
                    url: "menu_fb/deletebulk",
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
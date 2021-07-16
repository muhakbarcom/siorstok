<!-- Default box -->
<div class="row">

  <!-- Pemilik -->
  <?php if ($this->ion_auth->in_group(array(1))) : ?>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="fa fa-user"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">USERS</span>
          <span class="info-box-number"><?= $jml_user; ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Jumlah Users
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

  <?php endif ?>

  <!-- kasir -->
  <?php if ($this->ion_auth->in_group(array(2))) : ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box bg-blue">
        <span class="info-box-icon"><i class="fa fa-cart-plus"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">TRANSAKSI HARI INI</span>
          <span class="info-box-number"><?= $jml_trx_today; ?> </span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Daftar Transaksi Hari Ini
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  <?php endif ?>

  <!-- Koki -->
  <?php if ($this->ion_auth->in_group(array(32))) : ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="fa fa-refresh"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">PESANAN MASUK</span>
          <span class="info-box-number"><?= $jml_pesanan_masuk; ?> </span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Jumlah Pesanan Masuk
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-check"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">PESANAN SELESAI</span>
          <span class="info-box-number"><?= $jml_pesanan_selesai; ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Jumlah Pesanan Selesai
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  <?php endif ?>

  <!-- Operator-->
  <?php if ($this->ion_auth->in_group(array(33))) : ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="fa fa-bars"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">MENU FOOD</span>
          <span class="info-box-number"><?= $jml_food; ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Jumlah Menu Food
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box bg-blue">
        <span class="info-box-icon"><i class="fa fa-bars"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">MENU BEVERAGE</span>
          <span class="info-box-number"><?= $jml_bvrg; ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Jumlah Menu Beverage
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  <?php endif ?>
</div>
<!-- pemilik grafik -->
<?php if ($this->ion_auth->in_group(array(1))) : ?>
  <?php foreach ($grafik as $g) {
    // var_dump($grafik);
    // exit;
    $x[] = $g->total_pendapatan;
    $y[] = cari_bulan(substr($g->tanggal_transaksi, 5, 5));
  } ?>
  <div class="row">
    <div class="col-md-6">
      <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right">
          <li class="pull-left header"><i class="fa fa-inbox"></i> Statistik Pendapatan Bulanan</li>
        </ul>
        <div class="tab-content no-padding">
          <canvas id="myChart" width="200" height="100"></canvas>
          <script>
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: <?= json_encode($y); ?>,
                datasets: [{
                  label: '# Penjualan',
                  data: <?= json_encode($x); ?>,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>
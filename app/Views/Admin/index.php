<?= $this->extend('Admin/template/dashboard'); ?>

<?= $this->section('content'); ?>


<div class="content-header">

  <center>
    <h1> SISTEM INFORMASI PARKIR </h1>
  </center>

</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-6 ">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>Data Kendaraan</h3>

            <p> - </p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="/Admin/data" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>

        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6 ">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>Kendaraan Masuk</h3>

            <p>-</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- ./col -->
      <div class="col-lg-4 col-6 ">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>Kendaraan Keluar</h3>

            <p>-</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <?php if (in_groups('admin')) : ?>
        <div class="col-lg-4 col-6 ">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>Data Pengguna</h3>

              <p>Jumlah = </p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <?php endif; ?>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


<?= $this->endsection(); ?>
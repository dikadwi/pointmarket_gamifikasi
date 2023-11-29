<?= $this->extend('Admin/template/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

  <div class="content-header">

    <center>
      <h1><b> POINT MARKET </b></h1>
    </center>

  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6 ">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h2>Leaderboards</h2>

              <p>-</p>
            </div>
            <div class="icon">
              <i class="ion ion-trophy"></i>
            </div>
            <a href="#" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6 ">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h2>Rewards</h2>

              <p> <?= $totaldata ?> Point </p>
            </div>
            <div class="icon">
              <i class="ion ion-ribbon-a"></i>
            </div>
            <a href="/Admin/data" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>

          </div>
        </div>

        <?php if (in_groups('admin')) : ?>
          <div class="col-lg-3 col-6 ">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h2>Badges</h2>

                <p> <?= $totaldata ?> Point </p>
              </div>
              <div class="icon">
                <i class="ion ion-ribbon-b"></i>
              </div>
              <a href="/Admin/data" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <div class="col-lg-3 col-6 ">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h2>Level</h2>

                <p> <?= $totaldata ?> Point </p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-graph-up-right"></i>
              </div>
              <a href="/Admin/data" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>


          <div class="col-lg-3 col-6 ">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h2>Data Pengguna</h2>

                <p> <?= $totaluser ?> Pengguna </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/Admin/user" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endif; ?>

      </div>
      <!-- /.row -->
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

</div>

<?= $this->endsection(); ?>
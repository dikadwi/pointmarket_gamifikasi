<?= $this->extend('template/dashboard'); ?>

<?= $this->section('content'); ?>

<!-- <div class="content-wrapper" style="background-image: url(https://media.istockphoto.com/id/1149543417/id/vektor/konsep-gamifikasi-mengintegrasikan-permainan.jpg?s=612x612&w=0&k=20&c=124BYzvn0F760W-djUx8B-icV0yB9K5LCl21fdberzk=);"> -->
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
            <a href="#leaderboard" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6 ">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h2>Rewards</h2>
              <!-- Total Rewards -->
              <p> <?= $totalReward ?> Items </p>
            </div>
            <div class="icon">
              <i class="ion ion-ribbon-a"></i>
            </div>
            <a href="/Transaksi/reward" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6 ">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h2>Challanges</h2>
              <!-- Total Challanges  -->
              <p> <?= $totalChallanges ?> Items </p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="/Transaksi/challange" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <?php if (in_groups('admin')) : ?>
          <div class="col-lg-3 col-6 ">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h2>Badges</h2>
                <!-- Total data Badges -->
                <p> <?= $totalBadges ?> Items </p>
              </div>
              <div class="icon">
                <i class="ion ion-ribbon-b"></i>
              </div>
              <a href="/Transaksi/badges" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6 ">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h2>Data Pengguna</h2>
                <!-- Total data pengguna -->
                <p> <?= $totaluser ?> Pengguna </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/Admin/user" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endif; ?>

        <div class="col-lg-3 col-6 ">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h2>Market</h2>
              <!-- Total item pada market -->
              <!-- <p> <?= $totaldata ?> Items </p> -->
              <p>.</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/Market" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

</div>

<?= $this->endsection(); ?>
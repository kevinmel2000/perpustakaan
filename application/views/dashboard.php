<!DOCTYPE html>
<html lang="en">

<head>

  <title>Dashboard</title>
  
  <?php $this->load->view('_partials/head'); ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('_includes/sidebar'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view('_includes/topbar'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Peminjaman</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_peminjaman ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book-open fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Buku</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_buku ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Anggota</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $total_anggota ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Belum Dikembalikan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $belum_dikembalikan ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Peminjaman</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="grafik_peminjaman"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Buku Terlaris</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="buku_terlaris"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <?php foreach ($buku_terlaris['judul'] as $key => $val): ?>
                      <span class="mr-2">
                        <i class="fas fa-circle <?php echo $key == 0 ? 'text-primary' : ($key == 1 ? 'text-success' : 'text-info') ?>"></i> <?php echo $val ?>
                      </span>
                    <?php endforeach ?>
                    <!-- <?php for ($i=0; $i < 3; $i++) { ?>
                    <?php } ?> -->
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Anggota Terajin</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="anggota_terajin"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <?php foreach ($anggota_terajin['nama'] as $key => $val): ?>
                      <span class="mr-2">
                        <i class="fas fa-circle <?php echo $key == 0 ? 'text-primary' : ($key == 1 ? 'text-success' : 'text-info') ?>"></i> <?php echo $val ?>
                      </span>
                    <?php endforeach ?>
                    <!-- <?php for ($i=0; $i < 3; $i++) { ?>
                    <?php } ?> -->
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $this->session->userdata('perpustakaan')->nama; ?></h6>
                </div>
                <div class="card-body">
                  <p><?php echo $this->session->userdata('perpustakaan')->tentang; ?></p>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view('_includes/footer'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <?php $this->load->view('_partials/foot'); ?>

  <!-- Page level plugins -->
  <script src="<?php echo base_url() ?>assets/sbadmin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    let grafik_peminjaman = JSON.parse('<?php echo json_encode($grafik_peminjaman) ?>')
    let buku_terlaris = JSON.parse('<?php echo json_encode($buku_terlaris) ?>')
    let anggota_terajin = JSON.parse('<?php echo json_encode($anggota_terajin) ?>')
  </script>
  <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Data Pengguna</title>
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/sbadmin/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
          <h1 class="h3 mb-4 text-gray-800">Data Pengguna</h1>

          <!-- Content Row -->
          <div class="card shadow mb-4">
            <div class="card-header align-items-center py-6 d-flex">
              <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
              <div class="col d-flex p-0 justify-content-end">
                <div>
                  <button class="btn btn-primary shadow-sm btn-sm" id="tambah">Tambah</button>
                  <button class="btn btn-danger shadow-sm btn-sm action d-none" id="hapus">Hapus</button>
                  <button class="btn btn-success shadow-sm btn-sm action d-none" id="edit">Edit</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellpadding="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                  </tr>
                </thead>
              </table>
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

  <div class="modal">
  <div class="modal-dialog">
  <div class="modal-content">
  <form id="form">
    <div class="modal-header">
      <h5 class="modal-title">Tambah</h5>
      <button class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" placeholder="Username" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <input type="password" name="password" placeholder="Password" class="form-control" required>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-primary shadow" type="submit">Tambah</button>
      <button class="btn btn-danger shadow" data-dismiss="modal">Batal</button>
    </div>
  </form>
  </div>
  </div>
  </div>

  <?php $this->load->view('_partials/foot'); ?>

  <!-- Page level plugins -->
  <script src="<?php echo base_url() ?>assets/sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/sbadmin/vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?php echo base_url() ?>assets/sbadmin/vendor/sweetalert2/sweetalert2.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    let add_url = '<?php echo site_url('pengguna/add') ?>'
    let read_url = '<?php echo site_url('pengguna/read') ?>'
    let edit_url = '<?php echo site_url('pengguna/edit') ?>'
    let delete_url = '<?php echo site_url('pengguna/delete') ?>'
  </script>
  <script src="<?php echo base_url() ?>assets/js/pengguna.js"></script>

</body>

</html>

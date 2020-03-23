<!DOCTYPE html>
<html lang="en">

<head>

  <title>Data Buku</title>
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/sbadmin/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/sbadmin/vendor/select2/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/sbadmin/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Buku</h1>
            <a href="<?php echo site_url('buku/cetak') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak</a>
          </div>

          <!-- Content Row -->
          <div class="card shadow mb-4">
            <div class="card-header align-items-center py-6 d-flex">
              <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
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
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Dipinjam</th>
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
        <label>Kode</label>
        <input type="text" name="kode" placeholder="Kode" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Nama" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Kategori</label>
        <select name="kategori" class="select2 form-control" required></select>
      </div>
      <div class="form-group">
        <label>Jumlah</label>
        <input type="number" name="jumlah" placeholder="Jumlah" class="form-control" required>
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
  <script src="<?php echo base_url() ?>assets/sbadmin/vendor/select2/js/select2.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    let add_url = '<?php echo site_url('buku/add') ?>'
    let read_url = '<?php echo site_url('buku/read') ?>'
    let edit_url = '<?php echo site_url('buku/edit') ?>'
    let delete_url = '<?php echo site_url('buku/delete') ?>'
    let get_kategori_url = '<?php echo site_url('kategori_buku/get_kategori') ?>'
  </script>
  <script src="<?php echo base_url() ?>assets/js/buku.js"></script>

</body>

</html>

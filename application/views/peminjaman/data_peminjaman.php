<!DOCTYPE html>
<html lang="en">

<head>

  <title>Data Peminjaman</title>
  
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
            <h1 class="h3 mb-0 text-gray-800">Data Peminjaman</h1>
            <a href="<?php echo site_url('peminjaman/cetak') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak</a>
          </div>

          <!-- Content Row -->
          <div class="card shadow mb-4">
            <div class="card-header align-items-center py-6 d-flex">
              <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
              <div class="col d-flex p-0 justify-content-end">
                <div>
                  <button class="btn btn-primary shadow-sm btn-sm" id="tambah">Tambah</button>
                  <button class="btn btn-info shadow-sm btn-sm action d-none" id="perpanjang">Perpanjang</button>
                  <button class="btn btn-success shadow-sm btn-sm action d-none" id="kembalikan">Kembalikan</button>
                  <button class="btn btn-danger shadow-sm btn-sm d-none" id="hapus">Hapus</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellpadding="0">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Judul</th>
                    <th>Peminjam</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Terlambat</th>
                    <th>Status</th>
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

  <div class="modal tambah">
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
        <select name="kode" class="form-control select2" required></select>
      </div>
      <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control" name="judul" disabled>
      </div>
      <div class="form-group">
        <label>Peminjam</label>
        <select name="peminjam" class="form-control select2" required></select>
      </div>
      <div class="form-group">
        <label>Jumlah</label>
        <input type="number" name="jumlah" placeholder="Jumlah" class="form-control" required>
        <small class="text-muted d-block" id="sisa"></small>
      </div>
      <div class="form-group">
        <label>Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" class="form-control" required>
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

  <div class="modal kembalikan">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Kembalikan</h5>
      <button class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Terlambat</label>
        <input type="text" class="form-control" name="terlambat" disabled>
      </div>
      <div class="form-group">
        <label>Denda</label>
        <input type="text" class="form-control" name="denda" disabled>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-primary shadow kembalikanBtn">Kembalikan</button>
      <button class="btn btn-danger shadow" data-dismiss="modal">Batal</button>
    </div>
  </div>
  </div>
  </div>

  <div class="modal perpanjang">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Perpanjang</h5>
      <button class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Sampai</label>
        <input type="date" class="form-control" name="sampai">
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-primary shadow perpanjangBtn" disabled>Perpanjang</button>
      <button class="btn btn-danger shadow" data-dismiss="modal">Batal</button>
    </div>
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
    let add_url = '<?php echo site_url('peminjaman/add') ?>'
    let read_url = '<?php echo site_url('peminjaman/read') ?>'
    let edit_url = '<?php echo site_url('peminjaman/edit') ?>'
    let delete_url = '<?php echo site_url('peminjaman/delete') ?>'
    let get_buku_url = '<?php echo site_url('buku/get_buku') ?>'
    let get_anggota_url = '<?php echo site_url('anggota/get_anggota') ?>'
    let kembalikan_url = '<?php echo site_url('peminjaman/kembalikan') ?>'
    let perpanjang_url = '<?php echo site_url('peminjaman/perpanjang') ?>'
    let denda = '<?php echo $this->session->userdata('perpustakaan')->denda; ?>'
  </script>
  <script src="<?php echo base_url() ?>assets/js/peminjaman.js"></script>

</body>

</html>

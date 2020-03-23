<!DOCTYPE html>
<html lang="en">

<head>

  <title>Login</title>
  
  <?php $this->load->view('_partials/head'); ?>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login</h1>
              </div>
              <form class="user">
                <div class="notif"></div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
              </form>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <?php $this->load->view('_partials/foot'); ?>

  <!-- Page level plugins -->
  <script src="<?php echo base_url() ?>assets/sbadmin/vendor/jquery-validation/jquery.validate.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    let login_url = '<?php echo site_url('auth/login') ?>'
  </script>
  <script src="<?php echo base_url() ?>assets/js/login.js"></script>

</body>

</html>

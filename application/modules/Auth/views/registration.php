<body class="text-center">
    <?php
          if (isset($error)) {
            echo "ERROR UPLOAD : <br/>";
            print_r($error);
            echo "<hr/>";
          }
        ?>
<main class="form-signin">
  <div class="card">
    <div class="card-body register-card-body">
      <form action="<?= base_url('Auth/registration'); ?>" method="post" enctype="multipart/form-data">
        <h1 class="h3 mb-3 fw-normal">Registrasi Akun Masyarakat</h1>
        <p>Fullname</p>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="fullname" name="fullname" value="<?= set_value('fullname'); ?>">
          <?= form_error('fullname', '<small class="text-danger">', '</small>'); ?>
        </div>
        <p>NIK</p>
       <div class="input-group mb-3">
          <input type="number" class="form-control" id="nik" name="nik" value="<?= set_value('nik'); ?>">
          <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
        </div>
        <p>Email</p>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
          <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
        </div>
        <p>No. Telp</p>
        <div class="input-group mb-3">
          <input type="number" class="form-control" id="telp" name="telp" value="<?= set_value('telp'); ?>">
          <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
        </div>
        <p>Password</p>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password">
          <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>
        <p>Retype Password</p>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password2" name="password2">
        </div>
        <p>Swafoto dengan KTP</p>
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="berkas" name="berkas">
        </div>
      </div>
        <div class="checkbox mb-3">
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>
      </form>
    </div>
  </div>
</main>


    
</body>
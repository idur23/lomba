<body class="text-center">
    
<main class="form-signin">
  <div class="card">
    <div class="card-body register-card-body">
      <form action="<?= base_url('auth_petugas/registration'); ?>" method="post">
        <h1 class="h3 mb-3 fw-normal">Registration</h1>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Fullname" id="fullname" name="fullname" value="<?= set_value('fullname'); ?>">
          <?= form_error('fullname', '<small class="text-danger">', '</small>'); ?>
        </div>
       <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NIK" id="nik" name="nik" value="<?= set_value('nik'); ?>">
          <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email'); ?>">
          <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password">
          <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" id="password2" name="password2">
          </div>
        </div>
        <div class="row">
          <div class="col-8"></div>
        </div>

        <div class="checkbox mb-3">
          <label>
            <a href="<?php echo base_url('auth'); ?>">Already have a membership</a>
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>
      </form>
    </div>
  </div>
</main>


    
</body>
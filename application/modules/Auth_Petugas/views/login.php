<body class="text-center">
    
<main class="form-signin">
  <div class="card">
    <div class="card-body register-card-body">
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('auth_petugas'); ?>" method="post">
        <h1 class="h3 mb-3 fw-normal">Login Sebagai Admin</h1>
        <div class="input-group mb-4">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
          </div>
        <div class="input-group mb-4">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
          <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>
    </div>
  </div>
</main>


    
</body>
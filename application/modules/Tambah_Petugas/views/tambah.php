<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('Admin/header'); ?>
</head>
<body>
	<?php $this->load->view('Admin/navbar'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('Admin/side'); ?>
			<main class="col-md-9 ms-sm-auto col-lg-8 px-md-1">
		      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		        <h1 class="h2">Tambah Admin</h1>
		      </div>
		      <div class="container">
		        <form action="<?php echo base_url(). 'tambah_petugas/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
					<table class="table" width="100" align="center">
						<tr>
							<td>NIK</td>
							<td>
								<input type="number" class="form-control" placeholder="NIK" id="nik" name="nik" value="<?= set_value('nik'); ?>">
          						<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
							</td>
						</tr>
						<tr>
							<td>Fullname</td>
							<td>
							<input type="text" class="form-control" placeholder="Fullname" id="fullname" name="fullname" value="<?= set_value('fullname'); ?>">
							<?= form_error('fullname', '<small class="text-danger">', '</small>'); ?>
							</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>
								<input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email'); ?>">
								<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
							</td>
						</tr>
						<tr>
							<td>Telp</td>
							<td>
								<input type="number" class="form-control" placeholder="telp" id="telp" name="telp" value="<?= set_value('telp'); ?>">
								<?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
							</td>
						</tr>
						<tr>
							<td>Password</td>
							<td>
								<input type="password" class="form-control" placeholder="Password" id="password" name="password">
								<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
							</td>
						</tr>
						<tr>
							<td>Retype Password</td>
							<td>
								<input type="password" class="form-control" placeholder="Retype password" id="password2" name="password2">
							</td>
						</tr>
						<tr>
							<td>Foto</td>
							<td>
								<input type="file" class="form-control" placeholder="Retype " id="berkas" name="berkas">
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button class="btn btn-primary" type="submit">Submit</button>
								<a href="<?php echo base_url('tambah_petugas'); ?>" class="btn btn-danger" >Batal</a>
							</td>
						</tr>
					</table>
				</form>
		    </div>
		  	</main>
		</div>
	</div>
</body>
<?php $this->load->view('Admin/js'); ?>
</html>
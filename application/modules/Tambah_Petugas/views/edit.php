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
		        <h1 class="h2">Tambah Pegawai</h1>
		      </div>
		      <div class="container">
		        <h3>Petugas & Admin</h3>
		        <?php foreach ($petugas as $key => $value) {
		        ?>
		        <form action="<?php echo base_url(). 'Tambah_Petugas/update'; ?>" method="post" enctype="multipart/form-data">
					<table class="table" width="100" align="center">
						<tr>
							<td>NIK</td>
							<td>
								<input type="hidden" name="id" value="<?php echo $value->id ?>">
								<input type="text" class="form-control" placeholder="NIK" id="nik" name="nik" value="<?php echo $value->nik ?>" readonly>
							</td>
						</tr>
						<tr>
							<td>Fullname</td>
							<td>
							<input type="text" class="form-control" placeholder="Fullname" id="fullname" name="fullname" value="<?php echo $value->fullname ?>" readonly>
							</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>
								<input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?php echo $value->email ?>" readonly>
							</td>
						</tr>
						<tr>
							<td>telp</td>
							<td>
								<input type="number" class="form-control" placeholder="telp" id="telp" name="telp" value="<?php echo $value->telp ?>">
							</td>
						</tr>
						<tr>
							<td>Foto</td>
							<td>
								<img src="<?php echo base_url(); ?>upload/<?php echo $value->nama_berkas ?>" width="100px" height="100px">
								<input type="file" class="form-control" placeholder="berkas" id="berkas" name="berkas">
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button class="btn btn-info" type="submit">Simpan</button>
								<a href="<?php echo base_url('Tambah_Petugas'); ?>" class="btn btn-danger" >Batal</a>
							</td>
						</tr>
					</table>
				</form>
			<?php } ?>
		    </div>
		  	</main>
		</div>
	</div>
</body>
<?php $this->load->view('Admin/js'); ?>
</html>
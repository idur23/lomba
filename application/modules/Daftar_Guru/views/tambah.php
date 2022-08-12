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
		        <h1 class="h2">Tambah Guru</h1>
		      </div>
		      <div class="container">
		        <form action="<?php echo base_url(). 'Daftar_Guru/aksi_upload'; ?>" method="post" enctype="multipart/form-data">
					<table class="table" width="100" align="center">
						<tr>
							<td>Nama Lengkap</td>
							<td>
							<input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama">
							</td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>
								<input type="date" class="form-control" placeholder="Tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>">
							</td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>
								<select class="form-control" name="jk" id="jk">
									<option value="L">Laki-laki</option>
									<option value="P">Perempuan</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Foto</td>
							<td>
								<input type="file" class="form-control" placeholder="Pilih Foto " id="berkas" name="berkas">
							</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>
								<textarea type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat"></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button class=" btn btn-primary" type="submit">Submit</button>
								<a href="<?php echo base_url('Daftar_Guru'); ?>" class="btn btn-danger">Batal</a>
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
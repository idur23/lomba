<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('Anak/header'); ?>
</head>
<body>
	<?php $this->load->view('Anak/navbar'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('Anak/side'); ?>
			<main class="col-md-9 ms-sm-auto col-lg-8 px-md-1">
		      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		        <h1 class="h2">Input Data Anak</h1>
		      </div>
		      	<?php
					if (isset($error)) {
						echo "ERROR UPLOAD : <br/>";
						print_r($error);
						echo "<hr/>";
					}
				?>
		      <div class="container">
				<?php echo form_open_multipart('Daftar_Anak/aksi_upload'); ?>
		        <form action="" enctype="multipart/form-data" method="post">
					<table class="table" width="100" align="center">
						<tr>
							<td>Nama Lengkap</td>
							<td>
								<input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama" >
							</td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>
								<input type="number" class="form-control" placeholder="NIK" id="nik" name="nik">
							</td>
						</tr>
						<tr>
							<td>Tempat Lahir</td>
							<td>
								<input type="text" class="form-control" placeholder="Kota, Provinsi" id="tempat_lahir" name="tempat_lahir">
							</td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>
    							<input type="date" name="tanggal_lahir" class="form-control" />
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
							<td>Alamat Tinggal</td>
							<td>
								<textarea class="form-control" placeholder="Alamat Tinggal" id="alamat" name="alamat"></textarea>
							</td>
						</tr>
						<tr>
							<td>Foto</td>
							<td>
							<input type="file" class="form-control" placeholder="Foto" id="berkas" name="berkas" accept="image">
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button class="btn btn-info" type="submit">Simpan</button>
								<a href="<?php echo base_url('Pengaduan'); ?>"><button class="btn btn-danger">Batal</button></a>
							</td>
						</tr>
					</table>
				</form>
		    </div>
				<?php echo form_close(); ?>
		  	</main>
		</div>
	</div>
</body>
<?php $this->load->view('Anak/js'); ?>
</html>
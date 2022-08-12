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
		        <h1 class="h2">Verifikasi & Validasi</h1>
		      </div>
		      <?php
					if (isset($error)) {
						echo "ERROR UPLOAD : <br/>";
						print_r($error);
						echo "<hr/>";
					}
				?>
		      <div class="container">
		      	<?php foreach ($anak as $key => $value) {?>
				<?php echo form_open_multipart('Daftar_Anak_Admin/upload_edit/'); ?>
		       <form action="" enctype="multipart/form-data" method="post">
					<table class="table" width="100" align="center">
						<tr>
							<td>Nama</td>
							<td>
								<input type="hidden" name="id" id="id" value="<?php echo $value->id ?>">
								<input type="text" readonly class="form-control" placeholder="nama" id="nama" name="nama" value="<?php echo $value->nama ?>">
							</td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>
								<input type="text" class="form-control" placeholder="NIK" id="nik" name="nik" value="<?php echo $value->nik ?>" readonly >
							</td>
						</tr>
						<tr>
							<td>Tempat Lahir</td>
							<td>
								<input type="text" class="form-control" placeholder="Tempat Lahir" id="tempat_lahir" name="tempat_lahir" value="<?php echo $value->tempat_lahir ?>" readonly >
							</td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>
								<input type="date" class="form-control" placeholder="tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $value->tanggal_lahir ?>" readonly >
							</td>
						</tr>
						<tr>
							<td>Foto</td>
							<td>
								<img src="<?php echo base_url(); ?>upload/<?php echo $value->nama_berkas ?>" name="berkas" width="100px" height="100px">
								<input type="hidden" name="old" value="<?php echo $value->nama_berkas ?>">
							</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>
								<textarea type="text" class="form-control" placeholder="Almat" id="alamat" name="alamat"><?php echo $value->alamat ?></textarea>
							</td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>
								<input type="text" class="form-control" placeholder="Jenis Kelamin" id="jk" name="jk" value="<?php if($value->jk == 'L'){echo "Laki-Laki";} else{echo "Perempuan";} ?>" readonly >
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button class="btn btn-info" type="submit">Simpan</button>
				<?php echo form_close(); ?>
			<?php } ?>
								<a href="<?php echo base_url('Daftar_Anak_Admin'); ?>" class="btn btn-danger" >Batal</a>
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
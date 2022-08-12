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
		        <h1 class="h2">Tanggapan</h1>
		      </div>
		      <?php
					if (isset($error)) {
						echo "ERROR UPLOAD : <br/>";
						print_r($error);
						echo "<hr/>";
					}
				?>
		      <div class="container">
		      	<?php foreach ($tanggap as $key => $value) {?>
				<?php echo form_open_multipart('Verifikasi_Admin/upload_edit/'); ?>
		        <form action="" enctype="multipart/form-data" method="post">
					<table class="table" width="100" align="center">
						<tr>
							<td>Judul Pengaduan</td>
							<td>
								<input type="hidden" name="id" value="<?php echo $value->id ?>">
								<input type="text" readonly class="form-control" placeholder="Judul" id="judul" name="judul" value="<?php echo $value->judul ?>">
							</td>
						</tr>
						<tr>
							<td>Tanggal Pengaduan</td>
							<td>
								<input type="text" class="form-control" placeholder="Tanggal" id="tanggal" name="tanggal" value="<?php echo $value->tanggal ?>" readonly >
							</td>
						</tr>
						<tr>
							<td>NIK Pengadu</td>
							<td>
								<input type="text" class="form-control" placeholder="NIK" id="nik" name="nik" value="<?php echo $value->nik ?>" readonly >
							</td>
						</tr>
						<tr>
							<td>Isi Pengaduan</td>
							<td>
								<textarea type="text" class="form-control" placeholder="Isi Tanggapan" id="isi" name="isi" readonly><?php echo $value->isi ?></textarea>
							</td>
						</tr>
						<tr>
							<td>Tanggal Tanggapan</td>
							<td>
								<input type="text" class="form-control" placeholder="TAnggal Tanggapan" id="tanggal_tanggapan" name="tanggal_tanggapan" value="<?php echo $value->tanggal_tanggapan ?>" readonly >
							</td>
						</tr>
						<tr>
							<td>Isi Tanggapan</td>
							<td>
								<textarea type="text" class="form-control" placeholder="Isi Tanggapan" id="tanggapan" name="tanggapan" readonly><?php echo $value->tanggapan ?></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button class="btn btn-info" type="submit">Simpan</button>
								<a href="<?php echo base_url('Tanggapan_Admin'); ?>"><button class="btn btn-danger">Batal</button></a>
							</td>
						</tr>
					</table>
				</form>
		    </div>
				<?php echo form_close(); ?>
			<?php } ?>
		</div>
	</div>
</body>
<?php $this->load->view('Admin/js'); ?>
</html>
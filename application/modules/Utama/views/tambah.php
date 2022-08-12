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
		      <div class="container">
				<?php
				if (isset($error)) {
					echo "ERROR UPLOAD : <br/>";
					print_r($error);
					echo "<hr/>";
				}
				?>
				<?php echo form_open_multipart('Tanggapan_Admin/tambah_aksi'); ?>
				<form action="<?php echo base_url(). 'Tanggapan_Admin/tambah_aksi'; ?>" method="post">
					<table class="table" width="100" align="center">
						<tr>
							<td>Judul</td>
							<td>
								<select name="pengaduan" id="pengaduan" class="form-control">
								<?php foreach ($pengaduan as $key => $value) {?>
									<option value="<?php echo $value['id']; ?>"><?php echo $value['judul']; ?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Isi Tanggapan</td>
							<td>
								<textarea type="text" class="form-control" placeholder="tanggapan" id="tanggapan" name="tanggapan"></textarea>
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
				<?php echo form_close(); ?>
		  	</main>
		</div>
	</div>
</body>
<?php $this->load->view('Admin/js'); ?>
</html>
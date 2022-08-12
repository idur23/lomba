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
		        <?php foreach ($guru as $key => $value) {
		        ?>
		        <form action="<?php echo base_url(). 'Daftar_Guru/update'; ?>" method="post" enctype="multipart/form-data">
					<table class="table" width="100" align="center">
						<tr>
							<td>Nama</td>
							<td>
								<input type="hidden" name="id" value="<?php echo $value->id ?>">
								<input type="text" class="form-control" placeholder="NIK" id="nama" name="nama" value="<?php echo $value->nama ?>" readonly>
							</td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>
							<input type="date" class="form-control" placeholder="Tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $value->tanggal_lahir ?>" readonly>
							</td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>
								<input type="text" class="form-control" placeholder="Jenis Kelamin" id="jk" name="jk" value="<?php if($value->jk == 'L'){echo "Laki-Laki";} else{echo "Perempuan";} ?>" readonly >
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
							<td>Alamat</td>
							<td>
								<textarea class="form-control" placeholder="Alamat" id="alamat" name="alamat" ><?php echo $value->alamat ?></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button class="btn btn-info" type="submit">Simpan</button>
								<a href="<?php echo base_url('Daftar_Guru'); ?>" class="btn btn-danger" >Batal</a>
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
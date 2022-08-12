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
		        <table class="table" width="100%">
					<tr>
						<td><a href="<?php echo base_url('Daftar_Guru/tambah'); ?>"><button class="btn btn-info">Tambah Data</button></td>
					</tr>
				</table>
		        <table id="table" class="table" border="1" cellspacing="0" width="100%">
		                <tr>
		                	<th>No</th>
		                	<th>Foto</th>
		                	<th>Nama</th>
		                	<th>Tanggal Lahir</th>
		                	<th>Jenis Kelamin</th>
		                	<th>Alamat</th>
		                	<th>Aksi</th>
		                </tr>
		            	<?php $no=1; ?>
		            	<?php foreach ($guru as $key => $value) {?>
		            	<tr>
							<td><?php echo $no++ ?></td>
							<td><img src="<?php echo base_url(); ?>upload/<?php echo $value['nama_berkas'] ?>" width="150px" height="150px"></td>
							<td><?php echo $value['nama'] ?></td>
							<td><?php echo date("d-m-Y", strtotime($value['tanggal_lahir'])); ?></td>
							<td><?php if($value['jk'] == 'L'){echo "Laki-Laki";} else{echo "Perempuan";}?></td>
							<td><?php echo $value['alamat'] ?></td>
							<td>
								<a href="<?php echo base_url('Daftar_Guru/edit/'.$value['id']); ?>"><button class="btn btn-info">Edit</button></a>
								<a href="<?php echo base_url('Daftar_Guru/hapus/'.$value['id']); ?>"><button class="btn btn-danger">Hapus</button></a>
							</td>
		            	</tr>
		            <?php } ?>
		        </table>
		    </div>
		  	</main>
		</div>
	</div>
</body>
<?php $this->load->view('Admin/js'); ?>
</html>
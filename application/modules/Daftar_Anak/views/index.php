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
		        <h1 class="h2">Rekap Data Pendaftar</h1>
		      </div>
		      <div class="container">
		        <table id="table" class="table" border="1" cellspacing="0" width="100%">
			<thead>
		                <tr>
		                	<th width="5%">No</th>
		                	<th width="25%">Foto</th>
		                	<th width="10%">Nama</th>
		                	<th width="8%">Tempat Lahir</th>
		                	<th width="8%">Tanggal Lahir</th>
		                	<th width="8%">Jenis Kelamin</th>
		                	<th width="20%">Alamat</th>
		                </tr>
	                </thead>
		            	<?php $no=1; ?>
		            	<?php foreach ($anak as $key => $value) {?>
		            	<tr>
		            		<td><?php echo $no++ ?></td>
		            		<td><img src="<?php echo base_url(); ?>upload/<?php echo $value['nama_berkas'] ?>" width="150px" height="150px"></td>
		            		<td><?php echo $value['nama'] ?></td>
		            		<td><?php echo $value['tempat_lahir'] ?></td>
		            		<td><?php echo date("d-m-Y", strtotime($value['tanggal_lahir'])); ?></td>
		            		<td><?php if($value['jk'] == 'L'){echo "Laki-Laki";} else{echo "Perempuan";}?></td>
		            		<td><?php echo $value['alamat'] ?></td>
		            	</tr>
		            <?php } ?>
		        </table>
		    </div>
		  	</main>
		</div>
	</div>
</body>
<?php $this->load->view('Anak/js'); ?>
</html>

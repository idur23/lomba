<!DOCTYPE html>
<html>
<head>
	<title>Print Laporan</title>
</head>
<body onload="window.print()">
			<table id="table" class="table" border="1" cellspacing="0" width="100%">
				<tr>
					<th width="5%">No</th>
                	<th width="25%">Foto</th>
                	<th width="16%">Nama</th>
                	<th width="8%">Jenis Kelamin</th>
                	<th width="20%">Alamat</th>
				</tr>
				<tr>
				<?php $no=1 ; foreach ($guru as $key => $value):?>
					<td><?php echo $no++ ?></td>
					<td><img src="<?php echo base_url(); ?>upload/<?php echo $value['nama_berkas'] ?>" width="150px" height="150px"></td>
					<td><?php echo $value['nama'] ?></td>
					<td><?php echo $value['jk'] ?></td>
					<td><?php echo $value['alamat'] ?></td>
				</tr>
		<?php endforeach ?>
			</table>
	
</body>
</html>
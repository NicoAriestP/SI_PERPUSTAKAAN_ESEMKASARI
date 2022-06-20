
<?php include 'config.php'; ?>

<div class="row">
                <div class="col-md-12">
	<center><h2><strong>DATA BUKU PERPUSTAKAAN SMKN PURWOSARI</strong></h2></center>
	<center>
	<?php if ($_SESSION['admin']) {?> 
	<a href="?page=buku&aksi=tambah" class="btn btn-success me-2" style="margin-top:  8px;"><i class="fa fa-plus"></i> Tambah Data</a>
	<a href="?page=buku&aksi=import2" class="btn btn-info" style="margin-top: 8px"><i class="fa fa-user-plus"></i> Import Data</a>
	<br>
	<br>
	<?php } ?>
<div class="tabel" style="overflow-x: auto;">
	<table class="table table-hover" id="datatables">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Pengarang</th>
				<th>Penerbit</th>
				<th>Tahun</th>
				<th>ISBN</th>
				<th>Jumlah</th>
				<th>Lokasi</th>
				<?php if ($_SESSION['admin']) {?>
				<th>Tanggal Input</th> 
      			<th width="19%">Aksi</th>
      			<?php } ?>
			</tr>
		</thead>
		<tbody>

		<?php 
        $data = $koneksi->query("select * from tb_buku"); 
	if ($data=== FALSE) {
		die(mysqli_error());
	}
    $no = 1;
    while($d = mysqli_fetch_assoc($data)){
?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['judul'];?></td>
			<td><?php echo $d['pengarang'];?></td>
			<td><?php echo $d['penerbit'];?></td>
			<td><?php echo $d['tahun_terbit'];?></td>
			<td><?php echo $d['isbn'];?></td>
			<td><?php echo $d['jumlah_buku'];?></td>
			<td><?php echo $d['lokasi'];?></td>
			<?php if ($_SESSION['admin']) {?>
			<td><?php echo $d['tgl_input'];?></td>
			 
			<td>
				<a href="?page=buku&aksi=ubah&id=<?php echo $d['isbn']; ?>" class="btn btn-warning" ><i class="fa fa-edit"></i> Ubah</a>
				<a onclick="return confirm('Anda yakin ingin menghapus?')" href="?page=buku&aksi=hapus&id_buku=<?php echo $d['isbn']; ?>" class="btn btn-danger" ><i class="fa fa-trash"></i> Hapus</a>

			</td>
			<?php } ?>
		</tr>


		<?php  } ?>
		</tbody>
	</table>
	</center>
    </div>
</div>
</div>
<?php include 'config.php';?>
<center><h2><strong>DATA SISWA PERPUSTAKAAN SMKN PURWOSARI</strong></h2></center>
<center>
<?php if ($_SESSION['admin']) {?> 
<a href="?page=anggota&aksi=tambah" class="btn btn-success me-2" style="margin-top: 8px"><i class="fa fa-plus"></i> Tambah Data</a>
<a href="?page=anggota&aksi=import" class="btn btn-info" style="margin-top: 8px"><i class="fa fa-user-plus"></i> Import Data</a>
<?php } ?>
<br>
<br>
<div class="tabel" style="overflow-x: auto;">
<table id="datatables" class="table table-hover">
  <thead>
    <tr>
      <th>No</th>
      <?php if ($_SESSION['admin']) {?>
      <th>NISN</th>
      <?php } ?>
      <th>Nama</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Jenis Kelamin</th>
      <th>Kelas</th>
      <?php if ($_SESSION['admin']) {?> 
      <th>Tanggal Input</th>
      <th width="19%">Aksi</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
  <?php 
        $data = $koneksi->query("select * from tb_anggota");
	if ($data=== FALSE) {
		die(mysqli_error());
	}
    $no = 1;
    while($d = mysqli_fetch_assoc($data)){
    $jk = ($d['jk']==l)?"Laki-laki":"Perempuan";
?>
   
    <tr>
      <td><?php echo $no++; ?></td>
      <?php if ($_SESSION['admin']) {?>
      <td><?php echo $d['nis'];?></td>
      <?php  } ?>
      <td><?php echo $d['nama'];?></td>
      <td><?php echo $d['tempat_lahir'];?></td>
      <td><?php echo $d['tgl_lahir'];?></td>
      <td><?php echo $jk;?></td>
      <td><?php echo $d['kelas'];?></td>
      <?php if ($_SESSION['admin']) {?>
      <td><?php echo $d['tgl_input'];?></td>
       
      <td>
        <a href="?page=anggota&aksi=ubah&id=<?php echo $d['nis']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
        <a onclick="return confirm('Anda ingin menghapus?')" href="?page=anggota&aksi=hapus&id=<?php echo $d['nis']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
      </td>
    <?php  } ?>
    </tr>

    <?php  } ?>
  </tbody>
  </table>
</center>
</div>
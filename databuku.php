<!DOCTYPE html>
<html>
  <head>
    <title>DATA BUKU</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
  </head>
  <body>
    <div class="sosmed" style="padding: 0.1px 0;">
      <div class="container">
        <ul>
          <li>
            <a href="#"><i class="fab fa-facebook"></i></a>
          </li>
          <li>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </li>
          <li>
            <a href="#"><i class="fab fa-twitter"></i></a>
          </li>
        </ul>
      </div>
    </div>
    <h1>
      <a href="index.html">PERPUSTAKAAN ESEMKASARI</a>
    </h1>
    <marquee style="background-color: red; color: white; letter-spacing: 20px;padding: 1px;"><strong>SATU HATI MENUJU PRESTASI</strong></marquee>
    <div class="menu">
      <ul>
        <li><a href="index.php">DASHBOARD</a></li>
        <li><a href="databuku.html">DATA BUKU</a></li>
        <li><a href="datasiswa.html">DATA SISWA</a></li>
        <li><a href="datapeminjaman.html">DATA PEMINJAMAN</a></li>
        <li><a href="tentang.html">TENTANG</a></li>
      </ul>
    </div>
	<center><h2>DATA BUKU PERPUSTAKAAN SMKN PURWOSARI</h2></center>
	<a href="?page=buku&aksi=tambah" class="btn btn-success" style="margin-top:  8px;"><i class="fa fa-plus"></i> Tambah Data</a>
    <table class="table table-hover">
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
				<th width="19%">Aksi</th>
			</tr>
		</thead>
		<tbody>

			<?php

			$no = 1;

			$sql = $koneksi->query("select * from tb_buku");

			while ($data= $sql->fetch_assoc()) {

		?>

		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['judul'];?></td>
			<td><?php echo $data['pengarang'];?></td>
			<td><?php echo $data['penerbit'];?></td>
			<td><?php echo $data['tahun_terbit'];?></td>
			<td><?php echo $data['isbn'];?></td>
			<td><?php echo $data['jumlah_buku'];?></td>
			<td><?php echo $data['lokasi'];?></td>
			<td>
				<a href="?page=buku&aksi=ubah&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-warning" ><i class="fa fa-edit"></i> Ubah</a>
				<a onclick="return confirm('Anda yakin ingin menghapus?')" href="?page=buku&aksi=hapus&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-danger" ><i class="fa fa-trash"></i> Hapus</a>

			</td>
		</tr>


		<?php  } ?>
		</tbody>
    </table>
    <footer style="margin-top: 400px;">
      <center><small>Copyright &copy;2021-Kelompok1.All Rights Reserved.</small></center>
    </footer>
  </body>
</html>

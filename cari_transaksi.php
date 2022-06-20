<?php error_reporting (E_ALL^E_NOTICE); ?>
<?php  error_reporting(E_ALL ^ E_DEPRECATED);  ?>
<?php include 'config.php' ?>
<?php
	error_reporting(0);
    session_start();
    
    $koneksi = new mysqli("localhost","root","","perpus_db");

    include "function.php";

    if($_SESSION['admin'] || $_SESSION['user']){

?>
<!DOCTYPE html>
<html>
<head>
    <title>HALAMAN UTAMA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <style>
       
        .navbar {
            padding: 0px;
        }
        nav ul li a:hover {
            background-color: white;
            border-radius: 10px;
        }
        nav ul li {
            border: 1px solid white;
            border-radius: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body style="background-color: lightskyblue;color:black;">
<div id="wrapper" style="background-color: lightskyblue;">
    <div class="header" style="position: fixed;top: 0;left: 0;
    right: 0;z-index: 1;">
<div class="sosmed" style="padding:0.1px;">
	<div class="container">
		<ul>
		<li><a href="https://m.facebook.com/SMKN-Purwosari-172753320078781/"><i class="fab fa-facebook"></i></a></li>
		<li><a href="https://www.youtube.com/channel/UCc0mMPRw6sMiKy_gpDSP20g"><i class="fab fa-youtube"></i></a></li>
        <li><a href="https://www.instagram.com/galeri_smknpurwosari"><i class="fab fa-instagram"></i></a></li>
        <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
		</ul>
	</div>
</div>
<h1>
    <a href="index.php">PERPUSTAKAAN ESEMKASARI</a>
    <div class="logout" style="color: white;
padding: 5px 50px 5px 50px;
float: right;
font-size: 16px;"><?php date_default_timezone_set('Asia/Jakarta'); echo date('d-M-Y H:i:s'); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
</h1>

<marquee style="background-color:red;color: white;letter-spacing: 20px;padding:1px;"><strong>SATU      HATI     MENUJU      PRESTASI</strong></marquee>
</div>

<div id="page-wrapper" style= "margin-top:105px;" >
            <div id="page-inner">
                <div class="row" >
                    <div class="col-md-12" style="background-color: grey;color: white;">

                    <?php error_reporting (E_ALL^E_NOTICE); ?>
  <?php  error_reporting(E_ALL ^ E_DEPRECATED);  ?>
<?php include 'config.php'; ?>
<?php error_reporting (E_ALL^E_NOTICE); ?>
<center><h2>DATA PEMINJAMAN PERPUSTAKAAN SMKN PURWOSARI</h2></center>
<center>
<?php if ($_SESSION['admin']) {?> 
<a href="?page=anggota&aksi=tambah" class="btn btn-success" style="margin-top: 8px"><i class="fa fa-plus"></i> Tambah Data</a>
<?php } ?>
<form action="cari_siswa.php" method="get">
    <label>Cari :</label>
    <div class="form-floating">
  <input type="password" style="width:20%;" class="form-control" name="cari" id="floatingPassword" placeholder="Masukkan Nama Peminjam">
  <label for="floatingPassword">Cari</label>
</div>
    <input type="submit" value="Cari">
</form>
<?php 
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        echo "<b>Hasil pencarian : ".$cari."</b>";
    }
?>

<table class="table table-hover">
<thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Terlambat</th>
                        <th width="21%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        
            <?php 
                if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $data = mysql_query("select * from tb_transaksi where nama like '%".$cari."%'"); 
                }
                else{
                    $data = mysql_query("select * from tb_transaksi"); 
                }
                if ($data=== FALSE) {
                    die(mysql_error());
                }
                $no = 1;
                while($d = mysql_fetch_array($data)){
            ?>

                  
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>
                            <?php 
                                $test = $d['id_buku'];
                                // echo $test;
                                $jbuku = $koneksi->query("SELECT * FROM tb_buku WHERE id_buku=$test");
                                $jjbuku = $jbuku->fetch_assoc();
                                echo $jjbuku['judul'];
                             ?>
                        </td>
                        <td>
                            <?php 
                                $anggota = $d['nis'];
                                // echo $test;
                                $anggotaa = $koneksi->query("SELECT * FROM tb_anggota WHERE nis=$anggota");
                                $show = $anggotaa->fetch_assoc();
                                echo $show['nis'];
                             ?>
                        </td>
                        <td><?php echo $show['nama'];;?></td>
                        <td><?php echo $d['tgl_pinjam'];?></td>
                        <td><?php echo $d['tgl_kembali'];?></td>
                        <td><?php echo $d['status'];?></td>
                        
                        <td>
                        	<?php
                        	$denda = 1000;

                        	$tanggal_dateline = $d['tgl_kembali'];

                        	$tgl_kembali=date('Y-m-d');

                        	$lambat = terlambat($tanggal_dateline, $tgl_kembali);

                        	$denda1 = $lambat*$denda;

                        	if ($lambat>0) {
                        		echo "<font color='red'>Terlambat $lambat hari. </font>";
                                echo "<br>";
                                echo "<font color='red'> Denda sejumlah $denda1 </font>";
                        	}else{
                        		echo $lambat . "hari";
                        	}

                        	?>
                        </td>
                        
                        <td>
                            <a href="?page=transaksi&aksi=kembali&id=<?php echo $d['id']; ?>&judul=<?php echo $d['judul']?>" class="btn btn-info" >Kembali</a>
                            <a href="?page=transaksi&aksi=perpanjang&id=<?php echo $d['id']; ?>&judul=<?php echo $d['judul'];?>&tgl_kembali=<?php echo $d['tgl_kembali']?>&lambat=<?php echo $lambat; ?>" class="btn btn-danger" >Perpanjang</a>
                        </td>
                    </tr>
                    <?php  } ?>
                </tbody>
                </table>
                        </center>
    </div>
                    </div>
                </div>
            </div>
</div>           
	</center>
    <footer style="padding:15px 0;position: fixed;display: flex;bottom: 0;z-index: 1;right: 0;left: 0;justify-content: center;
    align-items: center;">
	<center><small>Copyright &copy;2021-Kelompok1.All Rights Reserved.</small></center>
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>
<?php
    }else{
        header("location:login.php");
    }
?>

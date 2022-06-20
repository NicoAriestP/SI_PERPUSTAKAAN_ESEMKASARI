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
<center><h2>DATA PENGGUNA PERPUSTAKAAN SMKN PURWOSARI</h2></center>
<center>
         <a href="?page=pengguna&aksi=tambah" class="btn btn-success" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data</a>
            <table class="table table-hover"id="dataTables-example" >
                <thead>
                <br>
                <table class="table table-hover">
                <form action="cari_pengguna.php" method="get">
                    <label>Cari :</label>
                    <input type="text" name="cari">
                    <input type="submit" value="Cari">
                </form>
                <?php 
                    if(isset($_GET['cari'])){
                        $cari = $_GET['cari'];
                        echo "<b>Hasil pencarian : ".$cari."</b>";
                    }
                ?>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Foto</th>
                        <th width="19%">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $data = mysql_query("select * from tb_user where nama like '%".$cari."%'"); 
                }
                else{
                    $data = mysql_query("select * from tb_user"); 
                }
                if ($data=== FALSE) {
                    die(mysql_error());
                }
                $no = 1;
                while($d = mysql_fetch_array($data)){
            ?>


                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['username'];?></td>
                        <td><?php echo $d['nama'];?></td>
                        <td><?php echo $d['level'];?></td>
                        <td> <img src="img/<?php echo  $d['foto'];?>" width="75" height="50"> </td>

                         <td>
                            <a href="?page=pengguna&aksi=ubah&id=<?php echo $d['id']; ?>" class="btn btn-warning" ><i class="fa fa-edit"></i> Ubah</a>
                            <a onclick="return confirm('Anda yakin ingin menghapus?')" href="?page=pengguna&aksi=hapus&id=<?php echo $d['id']; ?>" class="btn btn-danger" ><i class="fa fa-trash"></i> Hapus</a>

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

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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link href="assets/dataTables/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
          .dropdown-item {
        color: white;
        text-align: center;
      }
      .dropdown-item:hover {
        background-color: white;
      }
      .navbar {
        padding: 0px;
      }
      nav ul li a:hover {
        background-color: #333;
        color: white;
      }
      nav ul li a.dropdown-item:hover {
        background-color: #333;
        color: white;
      }
      nav ul li {
        margin-top: 10px;

      }
      .dataTables_length {
        margin-right: 120px;
      }
      div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin: 2px 0;
        white-space: nowrap;
        float: right;
        margin-right: 120px;
      }
      #datatables_previous {
        border: 1px solid black;
      }
      #datatables_next {
        border: 1px solid black;
      }
      li.paginate_button.active {
        border: 1px solid black;
      }
      
      }
      h2 {
        border-bottom: 1px solid black;
      }
      .jam-digital-malasngoding {
        margin-left: 25px;
      }
        .kotak{
        float: left;
        width: 30px;
        height: 40px;
        background-color: black;
        
    }
    .jam-digital-malasngoding p {
        color: #fff;
        font-size: 28px;
        text-align: center;
        

    }
      table.dataTable {
            clear: both;
            margin-top: 6px !important;
            margin-bottom: 6px !important;
            max-width: none !important;
            
            }
      nav ul li i {
        float: left;
        font-size: 1.5em;
        margin-top: 5px;
        margin-left: 5px;
      }      
    </style>
  </head>
  <body style=" color: black">
    <div id="wrapper" style="background-color: #333">
      <!-- untuk reponsif hp position dihapus?  -->
      <div class="header" style="">
        <div class="sosmed" style="padding: 0.1px">
          <div class="container-sm-md-lg">
            <div class="row">  
              
                <div class="col-6">
                  <ul>
                  <li>
                    <a href="https://m.facebook.com/SMKN-Purwosari-172753320078781/"><i class="fab fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="https://www.youtube.com/channel/UCc0mMPRw6sMiKy_gpDSP20g"><i class="fab fa-youtube"></i></a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/galeri_smknpurwosari"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li>
                    <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                  </li>
            </ul>
                </div>
                <div class="col-6">
                  <ul>
                  <li>
                    <?php 
                    
                    include 'config.php';
                      if ($_SESSION['admin']) {
                        $user_login = $_SESSION['admin'];
                      }elseif ($_SESSION['user']) {
                        $user_login = $_SESSION['user'];
                      }
                      $sql_user = mysqli_query($koneksi,"select * from tb_user where id ='$user_login'") or die(mysqli_error());
                      $data_user = mysqli_fetch_assoc($sql_user);
                    ?>
                    <p class="welcome">Selamat datang di Perpustakaan,<?php echo $data_user['nama'];?></p>
                  </li>
                </div>
              </ul>
            </div>
          </div>
        </div>
        <h1>
          <div class="container-sm-md-lg">
            <div class="row">
              <div class="col-8">
          <a href="https://www.smknegeripurwosaribjn.sch.id/">PERPUSTAKAAN ESEMKASARI</a>
              </div>
              <div class="col-4">
          <div class="waktu" style="">
            <?php date_default_timezone_set('Asia/Jakarta'); echo date('d-M-Y'); ?>
           &nbsp; <a onclick="return confirm('Anda ingin keluar?')" href="logout.php" class="btn btn-danger square-btn-adjust" title="Keluar dari sini">Logout</a>
          </div>
              </div>
            </div>
          </div>
        </h1>

        <marquee class="marquee "><strong>SATU HATI MENUJU PRESTASI</strong></marquee>
      </div>
      <div class="content" style="">
        
 
        <nav style="display: flex; float: left; text-align: center;" class="navbar bg-black">
          <ul class="navbar-nav" style="">
            <div class="logo" style="background-color: #333">
              <img style="width: 100px; float: left; margin-left: 50px" src="img/smklogo.png" />
            </div>
             <div class="jam-digital-malasngoding" style=";text-align: center;justify-content: center;">
    <div class="kotak">
        <p id="jam"></p>
    </div>
    <div class="kotak" id="jarak"></div>
    <div class="kotak">
        <p id="menit"></p>
    </div>
    <div class="kotak" id="jarak2"></div>
    <div class="kotak">
        <p id="detik"></p>
    </div>
</div>

            <li class="nav-item"><i class="fas fa-tachometer-alt"></i><a style=""class="nav-link" href="index.php">DASHBOARD</a></li>
            <li class="nav-item dropdown"><i class="fas fa-database"></i>
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">DATA MASTER</a>
              <ul style="padding: 0px;background-color: black; color: white" class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li style="color: white"><i class="fas fa-book"></i><a class="dropdown-item" href="?page=buku">DATA BUKU</a></li>
                <li><i class="fas fa-user-graduate"></i><a class="dropdown-item" href="?page=anggota">DATA SISWA</a></li>
                <?php if ($_SESSION['admin']) {?>
                <li><i class="fas fa-exchange-alt"></i><a class="dropdown-item" href="?page=transaksi">DATA PEMINJAMAN</a></li>
                <li><i class="fas fa-users"></i><a class="dropdown-item" href="?page=pengguna">DATA PENGGUNA</a></li>
                <?php } ?>
              </ul>
            </li>
            <li class="nav-item"><i class="fas fa-mobile-alt"></i><a class="nav-link" href="?page=kontak">KONTAK</a></li>
            <?php if ($_SESSION['admin']) {?>
            <li style="" class="nav-item dropdown"><i class="fas fa-file-signature"></i>
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">LAPORAN</a>
              <ul style="padding: 0px; background-color: black;" class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><i style="color: white;" class="fas fa-book"></i><a class="dropdown-item" href="?page=buku&aksi=cetak">LAPORAN BUKU</a></li>
                <li><i style="color: white;"class="fas fa-user-graduate"></i><a class="dropdown-item" href="?page=anggota&aksi=cetak">LAPORAN ANGGOTA</a></li>
                <li><i style="color: white;"class="fas fa-exchange-alt"></i><a class="dropdown-item" href="?page=transaksi&aksi=cetak">LAPORAN PINJAM</a></li>
                <li><i style="color: white;"class="fas fa-receipt"></i><a class="dropdown-item" href="?page=transaksi&aksi=bukti">BUKTI PINJAM</a></li>
              </ul>
            </li>
            <?php } ?>
            <li class="nav-item" style="margin-bottom: 10px;"><i class="fas fa-id-badge"></i><a class="nav-link" onclick="document.getElementById('id01').style.display='block'">PROFIL SAYA</a></li>
          </ul>
        </nav>
        <div id="id01" class="modal">
          <div class="card" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;background-color: #c00;">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Tutup">&times;</span>
            <img src="img/<?php echo $data_user['foto'];?>" style="width:100%">
            <h1><?php echo $data_user['nama'];?></h1>
            <p class="title">Level:<?php echo $data_user['level']; ?></p>
            <p class="title">Password:<?php echo $data_user['password']; ?></p>
          </div>
          
        </div>
        <!--PAGE-->
            <div class="container">
            <div class="row" style="border-radius: ;margin-top: -2px; min-height: 800px">
              <div class="col-md-12" style="background-color: #fff; color: black">
                <?php

                     		$page = $_GET['page'];
                     		$aksi = $_GET['aksi'];


                     		if ($page == "buku") {
                     			if ($aksi == "") {
                     				include "page/buku/buku.php";
                     			      }elseif ($aksi== "tambah") {
                                    include "page/buku/tambah.php";
                                }elseif ($aksi== "ubah") {
                                    include "page/buku/ubah.php";
                                }elseif ($aksi== "hapus") {
                                    include "page/buku/hapus.php";
                                }elseif ($aksi== "cetak") {
                                    include "page/buku/form_laporan_buku.php";
                                }elseif ($aksi== "cari")   {
                                    include "page/buku/cari_buku.php";
                                }elseif ($aksi== "import2"){
                                  include "page/buku/importbuku.php";
                                }
                     		}elseif ($page == "lokasi" ) {
                                if ($aksi == "") {
                                    include "page/lokasi/lokasi.php";
                                }elseif ($aksi == "tambah") {
                                    include "page/lokasi/tambah.php";
                                }elseif ($aksi == "ubah") {
                                    include "page/lokasi/ubah.php";
                                }elseif ($aksi == "hapus") {
                                    include "page/lokasi/hapus.php";
                                }
                            }elseif ($page == "anggota" ) {
                     			if ($aksi == "") {
                     				include "page/anggota/anggota.php";
                     			}elseif ($aksi == "tambah") {
                                    include "page/anggota/tambah.php";
                                }elseif ($aksi == "ubah") {
                                    include "page/anggota/ubah.php";
                                }elseif ($aksi == "hapus") {
                                    include "page/anggota/hapus.php";
                                }elseif ($aksi == "cetak") {
                                    include "page/anggota/form_laporan_anggota.php";
                                }elseif($aksi == "import"){
                                    include "page/anggota/importsiswa.php";
                                }
                                
                     		}elseif ($page == "transaksi" ) {
                     			if ($aksi == "") {
                     				include "page/transaksi/transaksi.php";
                     			      }elseif ($aksi == "tambah") {
                                    include "page/transaksi/tambah.php";
                                }elseif ($aksi == "kembali") {
                                    include "page/transaksi/kembali.php";
                                }elseif ($aksi == "perpanjang") {
                                    include "page/transaksi/perpanjang.php";
                                }elseif ($aksi == "cetak") {
                                    include "page/transaksi/form_laporan_transaksi.php";
                                }elseif ($aksi == "bukti") {
                                    include "page/transaksi/buktipeminjaman.php";
                                }
                     		}elseif ($page == "pengguna" ) {
                          if ($aksi == "") {
                            include "page/pengguna/pengguna.php";
                                }elseif ($aksi == "tambah") {
                                    include "page/pengguna/tambah.php";
                                }elseif ($aksi == "ubah") {
                                    include "page/pengguna/ubah.php";
                                }elseif ($aksi == "hapus") {
                                    include "page/pengguna/hapus.php";
                                }
                            }elseif ($page=="") {
                                include "home.php";
                            }elseif ($page=="kontak") {
                                if ($aksi == "") {
                                    include "page/kontak/kontak.php";
                                }
                            }elseif ($page=="profil") {
                                if ($aksi == "") {
                                    include "page/profil/profil.php";
                                }
                            }
                            
                       ?>
                       </div>
                                }
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer style="padding: 15px 0; position: fixed; display: flex; bottom: 0; z-index: 1; right: 0; left: 0; justify-content: center; align-items: center">
        <center><small style="border:2px solid white;border-radius: 5px;">Copyright &copy;2021-RPL.All Rights Reserved.</small></center>
      </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/dataTables/datatables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $("#datatables").DataTable();
      });
    </script>
<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        var jarak = ':';
        var jarak2 = ':';
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("jarak").innerHTML = jarak;
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("jarak2").innerHTML = jarak2;
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
</script>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
        
  </body>
</html>
<?php
    }else{
        header("location:login.php");
    }
?>

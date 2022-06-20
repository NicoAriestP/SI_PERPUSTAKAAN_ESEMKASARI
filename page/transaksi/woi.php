<?php
include 'koneksi.php';
$nim = $_GET['id_buku'];
$query = mysqli_query($koneksi, "select * from tb_buku where id_buku='$id_buku'");
$buku = mysqli_fetch_array($query);
$data = array(
            'judul'      =>  $buku['judul'];
 echo json_encode($data);
?>
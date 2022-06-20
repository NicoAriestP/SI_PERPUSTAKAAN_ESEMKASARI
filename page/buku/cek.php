<?php 
include '../../config.php';
$id = 12314;
$sql = $conn->query("update tb_buku set judul='bwa', pengarang='bwa', penerbit='bwa', tahun_terbit='bwa', isbn='4323', jumlah_buku='3', lokasi='Rak 1'
            where isbn='$id'");

if ($sql) {
	echo "BERHASIL";
}
	 ?>
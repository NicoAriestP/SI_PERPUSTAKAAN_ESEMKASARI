<?php
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

$tanggalan =  date('d-M-Y H:i:s');
$koneksi = new mysqli("localhost","root","","perpus_db");
$content ='

<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;     }
	h1 {border : 1px solid black;}
</style>


';


 $content .= '
<page>
<p align="center"><h1 style="border:1px solid black;">PERPUSTAKAAN SMKN PURWOSARI</h1></p>
<br>
<div class="garis1" style ="border:1px solid black;"></div>
<h3>Bukti Peminjaman</h3>
<h4>Alamat</h4>
    <p>Jl. Ngambon No.Km. 1.5, Pojok, Purwosari, Kabupaten Bojonegoro, Jawa Timur 62161</p>
<h4>Telepon</h4>
    <p>Telp/Fax : (0353) 5215446</p>
<h4>Email</h4>
    <p>email : smknpwrbjn@yahoo.co.id / admin@smknegeripurwosaribjn.sch.id</p>
<h5>Tanggal:'.$tanggalan.'</h5>
<table border="1px" class="tabel"  >

<tr>
<th>No </th>
<th>Judul</th>
<th>NIS</th>
<th>Nama</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>

</tr>';

if (isset($_POST['bukti'])) {


	
	$nis1 = $_POST['nis'];


	
		
	$no = 1;
	$sql = $koneksi->query("select * from tb_transaksi where nis='$nis1' ");
	while ($tampil=$sql->fetch_assoc()) {
		$judulbuku = $koneksi->query('SELECT judul FROM tb_buku WHERE id_buku=$tampil->judul');
		$content .='
			<tr>
				<td align="center">'.$no++.'</td>
				<td align="center">'.$tampil['judul'].'</td>
				<td align="center">'.$tampil['nis'].'</td>
				<td align="center">'.$tampil['nama'].'</td>
				<td align="center">'.$tampil['tgl_pinjam'].'</td>
				<td align="center">'.$tampil['tgl_kembali'].'</td>
				
			</tr>
		';
	
}
}


$content .='


</table>
<h3>Keterangan</h3>
<p>1.Waktu peminjaman buku adalah 1 minggu</p>
<p>2.Denda terlambat mengembalikan buku sejumlah Rp.1000/hari </p>
<p>3.Bila buku hilang harus mengganti buku yang sama</p>
</page>';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
?>

<?php
error_reporting(0);
$koneksi = new mysqli("localhost","root","","perpus_db");
$tgl1 = $_POST['tanggal1'];
$tgl2 = $_POST['tanggal2'];
$content ='

<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 1px 1px;width:90px;  background-color:  #cccccc;  }
	.tabel td{padding: 1px 1px; width:90px;  }
</style>


';


 $content .= '
<page>
<h1>Laporan Data Siswa</h1>
<br>
<h4>Dari Tanggal '.$tgl1.'</h4>
<br>
<h4>Sampai Tanggal '.$tgl2.'</h4>
<table border="1px" class="tabel"  >
<tr>
<th>No </th>
<th>NIS</th>
<th>Nama</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Jenis Kelamin</th>
<th>Kelas</th>

</tr>';

if (isset($_POST['cetak'])) {


	
	$tgl1 = $_POST['tanggal1'];
	$tgl2 = $_POST['tanggal2'];

	
		
	$no = 1;
	$sql = $koneksi->query("select * from tb_anggota where tgl_pinjam between '$tgl1' and '$tgl2' ");
	while ($tampil=$sql->fetch_assoc()) {

	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['nis'].'</td>
			<td align="center">'.$tampil['nama'].'</td>
			<td align="center">'.$tampil['tempat_lahir'].'</td>
			<td align="center">'.$tampil['tgl_lahir'].'</td>
			<td align="center">'.$tampil['jk'].'</td>
			<td align="center">'.$tampil['kelas'].'</td>
		</tr>
	';
	
}
}else{

$no=1;

$sql = $koneksi->query("select * from tb_anggota");
while ($tampil=$sql->fetch_assoc()) {
	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['nis'].'</td>
			<td align="center">'.$tampil['nama'].'</td>
			<td align="center">'.$tampil['tempat_lahir'].'</td>
			<td align="center">'.$tampil['tgl_lahir'].'</td>
			<td align="center">'.$tampil['jk'].'</td>
			<td align="center">'.$tampil['kelas'].'</td>
		</tr>
	';
}
}


$content .='


</table>
</page>';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
?>

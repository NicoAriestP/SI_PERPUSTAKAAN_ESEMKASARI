<?php
include "koneksi.php"; //Include file koneksi
$searchTerm = $_GET['term']; // Menerima kiriman data dari inputan pengguna

$sql="SELECT * FROM tb_anggota WHERE nis LIKE '%".$searchTerm."%' ORDER BY nis ASC"; // query sql untuk menampilkan data dengan operator LIKE

$hasil=mysqli_query($kon,$sql); //Query dieksekusi

//Disajikan dengan menggunakan perulangan
while ($row = mysqli_fetch_array($hasil)) {
    $data[] = $row['nis'];
    
}
//Nilainya disimpan dalam bentuk json
echo json_encode($data);
?>
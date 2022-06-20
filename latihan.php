<?php 
include 'fungsi.php';
// var_dump($alat);
// echo "<br>";
// print_r($alat);
// echo $alat[1];
// $alat = array();
// $alat[]="Buku";
// $alat[]="Pensil";
// $alat[]="Orotan";
// print_r($alat[1]);
// echo "<br>";
//  echo $alat[1];
// $hitung1=6;
// $hitung2=5;
// $sum=$hitung1 + $hitung2;
// echo $sum;
// $hasil = "Saya memiliki ".$sum.$alat[1];
// echo $hasil;
// echo "<br>";
// $panjang_arr = count($alat);
// for ($i=0; $i <$panjang_arr ; $i++) { 
// 	echo $alat[$i]."<br>";
// }
// echo strlen($alat[1])."<br>";
// if ($hitung1 >= $hitung2) {
// 	echo "hitung1 lebih besar";
// 	// code...
// }else echo "salah";
// echo "<br>";
// $hoo = $alat[0].$alat[2];
// echo $hoo;
$x = 0;
while ($x < 10) {
    echo $x." YOYOY<br>";
    $x++;
}
$angka = ["Nico Ariest Putra","Rahmatul Afis Sholiqin","Revallendra",1,2,3];
print_r($angka);
echo "$angka[0]<br>";
foreach ($angka as $k) {
    echo "$k<br>";
}
// function cetakarray($pertama,$kedua){
// // 	$alat =   array("Pensil","Penghapus","Buku",100,true);
// // 	foreach ($alat as $value) {
// // 	echo $value."<br>";
// // }
// 	$sum = $pertama + $kedua;
// 	echo "Hasil nya ".$sum;
// }
// $angka1 = 10;
// $angka2 = 30;
// cetakarray($angka1,$angka2);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title></title>
    <style>
        .kotak {
            width: 30px;
            height: 30px;
            background-color: greenyellow;
            text-align: center;
            line-height: 30px;
            margin: 4px;
            float: left;
            transition: 1s;
        }
        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 50%;
        }
    </style>
 </head>
 <body>
 <input type="text" ondblclick="getnilai1();" id="angka1" name="">
 <input type="text" ondblclick="getnilai2();" id="angka2" name="">
<video width="400" height="240" controls>
  <source src="asa.mkv">
  
Your browser does not support the video tag.
</video>
<audio controls><source src="as.mp3"></audio>
<?php for ($i=0;$i < 10; $i++) : ?>
    <h1><?= "Halo";  ?></h1>
<?php endfor; ?>

<?php
$_GET['nama'] = "Nico Ariest Putra";
$_GET['no'] = "083832108514";
print_r($_GET);
print_r($_GET['no']);

$book = query("select * from tb_buku");

date_default_timezone_set('Asia/Jakarta');
echo date('l-F-Y,H:i');
 ?>
 <?php foreach ($book as $buku) :  ?>
 <h1><?php echo $buku['judul']; ?><h2><?php echo $buku['isbn']." ".$buku['penerbit']. " ".$buku['pengarang']; ?></h2></h1>
<?php endforeach; ?>
<?php $siswa = query("select * from tb_anggota");?>
<?php foreach ($siswa as $sis): ?>
    <h1><?php echo $sis['nama']; ?></h1> 
<?php endforeach; ?>
<?php $guna = query("select * from tb_user"); ?>
<?php foreach ($guna as $user) :?>
    <h1><?php echo $user['nama']; ?></h1>
<?php endforeach; ?>
 </body>
 <script>
 	// var umur;
 	// umur = prompt("Masukkan Umur Anda");
 	// umur = parseInt(umur);
 	// if (umur < 20) {
 	// 	alert("Dilarang");
 	// }else {
 	// 	alert("Boleh");
 	// }
 	
 	// console.log(umur);
 	// var k =umur;
 	// do {
 	// 	document.write("Haloo<br>");
 	// 	k++;
 	// }while (k < 20);
 
 	function getnilai1 () {
 		var pertama =document.getElementById('angka1').value;
 		console.log(pertama);
 	}
 	function getnilai2 () {
 		var kedua = document.getElementById('angka2').value;
 		console.log(kedua);
 	}

 	for (var i = 0; i < 10; i++) {
        console.log(i + " Halo");
    }
 	
 	// var hasil = pertama + kedua;
 	// console.log(hasil);
 </script>
 </html>
 <?php 
// $nama = $_POST['nama'];
// $umur = $_POST['umur'];
// $alamat = $_POST['alamat'];
// $jenkel = $_POST['jenkel'];
// if ($nama == "" OR $umur "" OR $alamat == "" $jenkel == "") {
//     alert("Tidak boleh kosong");

// }
// else{
//     $simpan=$conn->query("INSERT INTO tb_siswa (nama,umur,alamat,jenkel) VALUES ('$nama','$umur','$alamat','$jenkel')");
// }
 
?>

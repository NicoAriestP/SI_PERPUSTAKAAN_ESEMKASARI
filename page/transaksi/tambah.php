<!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 -->
<script>
            $(function() {
                $("#nama").autocomplete({
                    source: 'page/transaksi/autocompletenama.php'
                });
            });
        </script>
<script>
            $(function() {
                $("#nis").autocomplete({
                    source: 'page/transaksi/autocomplete.php'
                });
            });
        </script>
<script>
            $(function() {
                $("#id_buku").autocomplete({
                    source: 'page/transaksi/autocompleteid_buku.php'
                });
            });
        </script>
<script>
            $(function() {
                $("#judul").autocomplete({
                    source: 'page/transaksi/autocompletejudulbuku.php'
                });
            });
        </script>
        

 <?php
	$pinjam = date("d-m-Y");
	$tuju_hari = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
	$kembali = date("d-m-Y", $tuju_hari);
?>

<div class="panel panel-default">
<div class="panel-heading">
		Tambah Data Transaksi
</div> 
<div class="panel-body">
	<div class="row">
	<div class="col-md-12">

	<form method="POST" action="#">

		<div class="form-group">
            <label for="sel1">ISBN</label>
            <input type="text" id="id_buku"  name="isbn" value="" class="form-control" placeholder="Masukkan ISBN"  required/>
        </div>    
		<div class="form-group">
            <label for="sel1">Judul Buku</label>
            <input type="text" id="judul" name="judul" value="" class="form-control" placeholder="Masukkan Judul"  required/>
        </div>    

		<div class="form-group">
            <label for="sel1">NISN Siswa:</label>
            <input type="text" id="nis" name="nis" value="" class="form-control" placeholder="Masukkan NISN" required/>
        </div>     

	     <div class="form-group">
            <label for="sel1">Nama Siswa:</label>
            <input type="text" id="nama" name="nama" value="" class="form-control" placeholder="Masukkan Nama"  required/>
        </div>     

	    

	      <div class="form-group">
	        <label>Tanggal Pinjam</label>
	        <input class="form-control" type="date" name="pinjam" value="" />
	      </div>


	       <div class="form-group">
	        <label>Tanggal Kembali</label>
	        <input class="form-control" type="text" name="kembali" value="<?php echo $kembali; ?>" readonly />
	      </div>

	    <div>
	    	<br>
	    	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
	    	<input type="reset" name="simpan" value="Reset" class="btn btn-warning">
	    </div>
	</div>

	</form>
	</div>
 </div>  
 </div>  
 </div>


 <?php
 
	

if (isset($_POST['simpan'])) 
{
	$tgl_pinjam		= isset($_POST['pinjam']) ? $_POST['pinjam'] : "";
	$tgl_kembali	= isset($_POST['kembali']) ? $_POST['kembali'] : "";

	
	$judul			= isset($_POST['judul']) ? $_POST['judul'] : "";

	$isbn		=isset($_POST['isbn']) ? $_POST['isbn'] : "";
	
	$id_siswa = isset($_POST['nis']) ? $_POST['nis'] : "";

	$siswa	= isset($_POST['nama']) ? $_POST['nama'] : "";

	//$pecah_siswa	= explode (".", $dapat_siswa);
	//$id_siswa 		= $pecah_siswa[0];
	//$siswa			= $pecah_siswa[1];
	$id = $_POST['isbn'];
	


		$query=$koneksi->query("SELECT * FROM tb_buku WHERE isbn = '$id'");
		while ($hasil=$query->fetch_assoc()) {
			$sisa=$hasil['jumlah_buku'];

			//cek data yang duplikate
			$cek=$koneksi->query("SELECT * FROM tb_transaksi WHERE nis='$id_siswa' AND isbn='$id'");
			$num1 = mysqli_num_rows($cek);

			
			

			if ($sisa == 0) {
				echo "<script>alert('Stok bukunya telah habis, tidak bisa melakukan transaksi, tambahkan stok buku segera');</script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=transaksi&aksi=tambah'>";
	
			}
			
			elseif(!$num1)
			{
				$qt = $koneksi->query("INSERT INTO tb_transaksi (id,isbn,judul,nis,nama,tgl_pinjam,tgl_kembali,status) VALUES (null, '$isbn', '$judul', '$id_siswa', '$siswa', '$tgl_pinjam', '$tgl_kembali', 'Pinjam')") or die ("Gagal Masuk".mysqli_error($koneksi));
					if ($qt) {
						$qr = $koneksi ->query("INSERT INTO tb_laporan VALUES (null,'$isbn','$judul','$id_siswa','$siswa','$tgl_pinjam','$tgl_kembali','Pinjam')") or die ("Gagal Masuk".mysqli_error($koneksi));
					}
				$qu	= $koneksi->query("UPDATE tb_buku SET jumlah_buku=(jumlah_buku-1) WHERE isbn='$id'");		
					if ($qt&&$qu) {
		        		echo "<script>alert('Transaksi Sukses');</script>";
		        		echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
					} else {
						echo "<script>alert('Tran
						saksi Gagal');</script>";
						// echo "<meta http-equiv='refresh' content='0; url=?page=input-transaksi'>";
					}
			}
			else
			{
				echo "<script>alert('Anda sudah meminjam buku yang sama');</script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=transaksi&aksi=tambah'>";
			
			}
		}
}

?>
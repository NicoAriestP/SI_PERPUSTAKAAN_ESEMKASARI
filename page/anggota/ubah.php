<script type="text/javascript">
    function validasi(form){
        if (form.nis.value=="") {
            swal("Peringatan","NIS Tidak Boleh Kosong","warning");
            form.nis.focus()
            return(false);
        }if (form.nama.value=="") {
            swal("Peringatan","Nama Tidak Boleh Kosng","warning");
            form.nama.focus();
            return(false);
        }if (form.tmpt_lahir.value=="") {
            swal("Peringatan","Tempat Lahir Tidak Boleh Kosong","warning");
            form.tmpt_lahir.focus();
            return(false);
        }if (form.kelas.value=="") {
            swal("Peringatan","Kelas Tidak Boleh Kosong","warning");
            form.tmpt_lahir.focus();
            return(false);
        }if (form.tgl.value=="") {
            swal("Peringatan","Tanggal Tidak Boleh Kosong","warning");
            form.tgl.focus();
            return(false);
        }if (form.jkl.value=="") {
            swal("Peringatan","Jenis Kelamin tidak boleh Kosong","warning");
            form.jkl.focus();
            return(false);
        }
        return(true);
    }
</script>
<?php
	

	$nis = $_GET['id'];

	$sql = $koneksi->query("select * from tb_anggota where nis = '$nis'");

	$tampil = $sql->fetch_assoc();

    $jkl = $tampil['jk'];
    $kelas = $tampil['kelas'];


?>

<div class="panel panel-default">
<div class="panel-heading">
		Ubah Data
 </div> 
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" onsubmit="return validasi(this)" >
                <div class="form-group">
                    <label>NISN</label>
                    <input class="form-control" name="nis" value="<?php echo $tampil['nis']?>" readonly/>
                    
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input class="form-control" name="nama" value="<?php echo $tampil['nama']?>"/>
                    
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input class="form-control" name="tmpt_lahir" value="<?php echo $tampil['tempat_lahir']?>" />
                    
                </div>

                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $tampil['tgl_lahir']?>"  />
                    
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label><br/>
                    <label class="checkbox-inline">
                <input type="checkbox" value="l" name="jk" id="jkl" <?php echo($jkl==l)?"checked":"";?> /> Laki-laki
                    </label>
                    <label class="checkbox-inline">
                <input type="checkbox" value="p" name="jk" id="jkl" <?php echo($jkl==p)?"checked":"";?> /> Perempuan
                    </label>
                    
                    
                </div>

                <div class="form-group">
                <label> Kelas</label>
                <select class="form-control" name="kelas">
                    <option value="X" <?php if ($kelas=='X') {echo "selected";} ?>>X</option>
                    <option value="XI"<?php if ($kelas=='XI') {echo "selected";} ?>>XI</option>
                    <option value="XII"<?php if ($kelas=='XII') {echo "selected";} ?>>XII</option>
                </select>
                </div>
                <br>
                <div>
                	
                	<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                </div>
         </div>

         </form>
      </div>
</div>  
 </div>  
 </div>


 <?php

 	$nis = $_POST ['nis'];
 	$nama = $_POST ['nama'];
 	$tmpt_lahir = $_POST ['tmpt_lahir'];
 	$tgl_lahir = $_POST ['tgl_lahir'];
 	$jk = $_POST ['jk'];
 	$kelas = $_POST ['kelas'];
 	
 	$simpan = $_POST ['simpan'];


 	if ($simpan) {
 		
 		$sql = $koneksi->query("update  tb_anggota set nama='$nama', tempat_lahir='$tmpt_lahir', tgl_lahir='$tgl_lahir', jk='$jk', kelas='$kelas' where nis='$nis' ");
 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					
 					alert ("Data Berhasil Disimpan");
 					window.location.href="?page=anggota";

 				</script>
 			<?php
 		}
 	}

 ?>
                             
                             


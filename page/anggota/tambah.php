<script type="text/javascript">
    function validasi(form){
        if (form.nis.value == "" ) {
            swal("Peringatan","NISN tidak boleh kosong","warning");
            form.nis.focus();
            return(false);
        }if (form.nis.value.length != 10) {
            swal("Peringatan","Jumlah NISN harus sesuai","warning");
            form.nis.focus();
            return(false);
        }if (form.nama.value=="") {
            swal("Peringatan","Nama Tidak Boleh Kosong","warning");
            form.nama.focus();
            return(false);
        }if (form.tmpt_lahir.value=="") {
            swal("Peringatan","tempat Lahir Tidak Boleh Kosong","warning");
            form.tmpt_lahir.focus();
            return(false);
        }if (form.kelas.value=="") {
            swal("Peringatan","Kelas Tidak Boleh Kosong","warning");
            form.kelas.focus();
            return(false);
        }if (form.tgl.value=="") {
            swal("Peringatan","Tanggal Tidak Boleh Kosong","w");
            form.tgl.focus();
            return(false);
        }
        return(true);
    }
</script>

<div class="panel panel-default">
<div class="panel-heading">
		Tambah Data Siswa
 </div> 
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            
            <form method="POST" onsubmit="return validasi(this)">
                <div class="form-group">
                    <label>NISN</label>
                    <input placeholder="Masukkan NISN" class="form-control" name="nis" id="nis" />
                    
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input placeholder="Masukkan Nama" class="form-control" name="nama" id="nama" />
                    
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input placeholder="Masukkan Tempat Lahir" class="form-control" name="tmpt_lahir" id="tmpt_lahir" />
                    
                </div>

                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input class="form-control" type="date" name="tgl_lahir" id="tgl" />
                    
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label><br/>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="l" name="jk"  /> Laki-laki
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="p" name="jk"  /> Perempuan
                    </label>
                    
                    
                </div>

                 <div class="form-group">
                    <label> Kelas</label>
                    <select class="form-control" name="kelas">
                        <option> == Pilih Kelas ==</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <br>
                <div>
                	
                	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
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
 		
 		$sql = $koneksi->query("insert into tb_anggota (nis, nama, tempat_lahir, tgl_lahir, jk, kelas )values('$nis', '$nama', '$tmpt_lahir', '$tgl_lahir', '$jk', '$kelas')");

 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					
 					swal("Sukses!","Data Berhasil Disimpan","success");
 					window.location.href="?page=anggota";

 				</script>       
 			<?php
 		}
 	}

 ?>
                             
                             


<?php error_reporting (E_ALL^E_NOTICE); ?>
<?php  error_reporting(E_ALL ^ E_DEPRECATED);  ?>
<?php include 'config.php'; ?>
<?php error_reporting (E_ALL^E_NOTICE); ?>
<center><h2 style=""><strong>DATA PEMINJAMAN PERPUSTAKAAN SMKN PURWOSARI</strong></h2></center>
<center>
<a href="?page=transaksi&aksi=tambah" class="btn btn-success" style="margin-top: 8px"><i class="fa fa-plus"></i> Tambah Data</a>
<br>
<div class="tabel" style="overflow-x: auto;">
<table class="table table-hover" id="datatables">
<thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Tanggal Input</th>
                        <th>Terlambat</th>
                        <th width="21%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        
            <?php 
                    $data = mysqli_query($koneksi,"select * from tb_transaksi"); 
                if ($data=== FALSE) {
                    die(mysqli_error());
                }
                $no = 1;
                while($d = mysqli_fetch_assoc($data)){
            ?>

                  
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>
                            <?php 
                                
                                echo $d['judul'];
                             ?>
                        </td>
                        <td>
                            <?php 
                                $anggota = $d['nis'];
                                // echo $test;
                                $anggotaa = $koneksi->query("SELECT * FROM tb_anggota WHERE nis=$anggota");
                                $show = $anggotaa->fetch_assoc();
                                echo $show['nis'];
                             ?>
                        </td>
                        <td><?php echo $show['nama'];;?></td>
                        <td><?php echo $d['tgl_pinjam'];?></td>
                        <td><?php echo $d['tgl_kembali'];?></td>
                        <td><?php echo $d['status'];?></td>
                        <td><?php echo $d['tgl_input'];?></td>
                        <td>
                        	<?php
                        	$denda = 1000;

                        	$tanggal_dateline = $d['tgl_kembali'];

                        	$tgl_kembali=date('Y-m-d');

                        	$lambat = terlambat($tanggal_dateline, $tgl_kembali);

                        	$denda1 = $lambat*$denda;

                        	if ($lambat>0) {
                        		echo "<font color='red'>Terlambat $lambat hari. </font>";
                                echo "<br>";
                                echo "<font color='red'> Denda sejumlah $denda1 </font>";
                        	}else{
                        		echo $lambat . "hari";
                        	}

                        	?>
                        </td>
                        
                        <td>
                            <a href="?page=transaksi&aksi=kembali&id=<?php echo $d['id']; ?>&judul=<?php echo $d['judul']?>" class="btn btn-info" >Kembali</a>
                            <br>
                            <a href="?page=transaksi&aksi=perpanjang&id=<?php echo $d['id']; ?>&judul=<?php echo $d['judul'];?>&tgl_kembali=<?php echo $d['tgl_kembali']?>&lambat=<?php echo $lambat; ?>" class="btn btn-danger" >Perpanjang</a>
                            <br>
                            <a href="?page=transaksi&aksi=bukti&nis=<?php echo $d['nis']; ?>" class="btn btn-warning" >Struk</a>
                        </td>
                    </tr>
                    <?php  } ?>
                </tbody>
                </table>
                        </center>
                    </div>
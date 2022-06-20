<?php error_reporting (E_ALL^E_NOTICE); ?>
<?php  error_reporting(E_ALL ^ E_DEPRECATED);  ?>
<?php include 'config.php'; ?>
<?php error_reporting (E_ALL^E_NOTICE); ?>
<center><h2><strong>DATA PENGGUNA PERPUSTAKAAN SMKN PURWOSARI</strong></h2></center>
<center>
         <a href="?page=pengguna&aksi=tambah" class="btn btn-success me-2" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data</a>
         <a href="?page=anggota&aksi=importuser" class="btn btn-info" style="margin-top: 8px"><i class="fa fa-user-plus"></i> Import Data</a>
         <div class="tabel" style="overflow-x: auto;">
                <table class="table table-hover" id="datatables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Foto</th>
                        <th width="19%">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    $data = $koneksi->query("select * from tb_user");
                if ($data=== FALSE) {
                    die(mysqli_error());
                }
                $no = 1;
                while($d = mysqli_fetch_assoc($data)){
            ?>


                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['username'];?></td>
                        <td><?php echo $d['nama'];?></td>
                        <td><?php echo $d['level'];?></td>
                        <td> <img src="img/<?php echo  $d['foto'];?>" width="75" height="50"> </td>

                         <td>
                            <a href="?page=pengguna&aksi=ubah&id=<?php echo $d['id']; ?>" class="btn btn-warning" ><i class="fa fa-edit"></i> Ubah</a>
                            <a onclick="return confirm('Anda yakin ingin menghapus?')" href="?page=pengguna&aksi=hapus&id=<?php echo $d['id']; ?>" class="btn btn-danger" ><i class="fa fa-trash"></i> Hapus</a>

                        </td>
                    </tr>


                    <?php  } ?>
                </tbody>

                </table>
 </center>
                </div>         
<div class="panel panel-default">
<div class="panel-heading">
		<center><h2><strong>Cetak Laporan Peminjaman</strong></h2></center>
 </div> 
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <form method="POST" action="laporan/laporan_transaksi.php"  >

                                        <div class="form-group">
                                            <label>Dari Tanggal </label>
                                            <input class="form-control" name="tanggal1" type="date"  />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Sampai Tanggal </label>
                                            <input class="form-control" name="tanggal2" type="date"  />
                                            
                                        </div>

                                        <div>
                                        	
                                        	<input type="submit" name="cetak" value="Cetak" target="blank"  class="btn btn-primary">
                                             <a href="./laporan/laporan_transaksi.php" class="btn btn-default" target="blank" style="margin-top: 8px; margin-left: 5px;"> Cetak Semua</a>
                                        </div>
                                 

                                 </form>
                              </div>
                              <div style="" class="alert alert-primary" role="alert">
Catatan:Tanggal yang dimasukkan berdasarkan Tanggal Pinjam
</div>
 </div>  
 </div>  
 </div>


 
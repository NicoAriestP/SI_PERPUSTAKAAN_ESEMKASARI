<?php 
$nis = $_GET['nis']; ?>
<div class="panel panel-default">
<div class="panel-heading">
		Cetak Bukti Peminjaman
 </div> 
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <form method="POST" action="laporan/strukpeminjaman.php"  >

                                        

                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input value="<?php echo $nis ?>" class="form-control" name="nis" id="nis" />
                                            
                                        </div>

                                         <div>
                                        	
                                        	<input type="submit" name="bukti" value="Cetak" target="blank"  class="btn btn-primary">
                                            </div>
                                 

                                 </form>
                              </div>
 </div>  
 </div>  
 </div>


 
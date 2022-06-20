<?php 
	error_reporting(0);
	ob_start();

	session_start();

	include "parser-php-version.php";
   $koneksi = new mysqli("localhost","root","","perpus_db");

   if($_SESSION['admin'] || $_SESSION['user']){
   		 header("location:index.php");
   }else{

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<script src="
	https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
	<style type="text/css">
		body {
			margin: 0;
		}
		.loginan {

		}
		.banner  {
			height: 90vh;
			background-image: url(IMG/smk1.jpeg);
			background-size: cover;
			position: relative;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.banner:after {
			content: '';
			display: block;
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: rgba(0, 0, 0, .3);
		}
		.container {
			z-index: 1;
		}
		footer {
			padding: 30px 0;
			background-color: #333;
			color: white;
			text-align: center;
		}
	</style>
</head>
<body>

<section class="banner">

<div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">Silakan <span class="font-weight-bold text-primary">Masuk</span></h5></div>
            <div class="card-body">
              <form action="" role="form" method="POST" >
                <div class="form-group">
                  <input type="text" name="nama" class="form-control" placeholder="Username" autofocus autocomplete="off">
                </div>
                <div class="form-group">
                        <span class="input-group-addon"></span>
                                <input type="password" class="form-control"  placeholder="Your Password" name="pass" />
            	 </div>
                <div class="form-group custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                  <label class="custom-control-label" for="customControlAutosizing">Ingatkan Saya</label>
                </div>
                <center><div class="form-group">
                  <input type="submit" name="login" value="Masuk" class="btn btn-primary btn-block"></center>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
    <footer>
	<small>Copyright &copy;2021-RPL.All Rights Reserved.</small>
</footer>	
</body>
</html>


<?php 

if	(isset($_POST['login']))	{

	$nama=$_POST['nama'];
	$pass=$_POST['pass'];

	$ambil = $koneksi->query("select * from tb_user where username='$nama' and password='$pass'");
	$data =$ambil->fetch_assoc();
	$ketemu = $ambil->num_rows;

	if($ketemu >=1){

	session_start();

	$_SESSION[username] = $data [username];
	$_SESSION[pass] = $data [password];
	$_SESSION[level] = $data [level];

	if($data['level'] == "admin"){
		$_SESSION['admin'] = $data[id];
		header("location:index.php");

	}else if($data['level']== "user"){
		$_SESSION['user'] = $data[id];
		header("location:index.php");

	}
}	else{
			?>
				<script type="text/javascript">
					alert("Username dan Password Anda Salah");
				</script>
			<?php
		}


}
}
?>
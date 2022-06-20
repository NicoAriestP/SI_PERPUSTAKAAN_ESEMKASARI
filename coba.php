<!DOCTYPE html>
<html>
<head>
	<title>SIGN IN</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<style type="text/css">
		body {
			margin: 0;
		}
		.banner {
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
			background-color: rgba(0, 0, 0, .6);
		}
		.banner .welcome {
			z-index: 1;
		}
		.banner h2 {
			color:white ;
			z-index: 1;
			padding: 15px 20px;
			border: 4px solid red;

		}
		.banner img {
			margin-right: 140px;
			z-index: 1;
		}
		.banner button {
			z-index: 1;
			margin-left: 50vh;
			font-size: 20px;
		}
		footer {
			padding: 30px 0;
			background-color: #333;
			color: white;
			text-align: center;
		}
		a {
			text-decoration: none;
		}
		a:visited {
			text-decoration: none;
			color: white;
		}
	</style>
</head>
<body>
<!-- banner -->
<section class="banner">
	<img src="IMG/smklogo.png"><div class="welcome">
	<h2>SELAMAT DATANG DI PERPUSTAKAAN ESEMKASARI</h2> <br>
		<button type="button" class="btn btn-danger"><a href="LOGIN.php">MASUK</a></button>

</div>
</section>
<footer>
	<small>Copyright &copy;2021-Kelompok1.All Rights Reserved.</small>
</footer>	
</body>
</html>
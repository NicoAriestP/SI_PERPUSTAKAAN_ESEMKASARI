<?php 
$conn =new mysqli("localhost","root","","perpus_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else {
	echo "NYAMBUNG";
}
function query($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];

	while ($row = mysqli_fetch_assoc($result)) {
		$rows [] = $row;
	}
	return $rows;
}
 ?>
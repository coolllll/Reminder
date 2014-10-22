<?php
	include "connect.php";
	$conn = connToServ();
	$name = $_POST["user"];
	$pass = $_POST["pass"];
	$toret[];
	//$toret['stat']=0;
	//return json_encode($toret);
	if(mysqli_query($conn,"SELECT * FROM loginsys WHERE user='$user'"))
	{
		$toret['stat']=0;
	}
	else 
	{
		$sql = "INSERT INTO loginsys(user,pass) VALUES ('$user','MD5($pass)')";
		mysqli_query($conn, $sql);
		$toret['stat']=1;
	}
	echo json_encode($toret);
?>

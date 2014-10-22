<?php
	include "connect.php";
	$conn = connToServ();
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$toret = array();
	//echo $name;
	//$toret['stat']=1;
	//return json_encode($toret);
	$result = mysqli_query($conn,"SELECT * FROM loginsys WHERE user='$user'");
	if(mysqli_fetch_array($result))
	{
		$toret['stat']=0;
	}
	else 
	{
		$sql = "INSERT INTO loginsys(user,pass) VALUES ('$user',MD5('$pass'))";
		mysqli_query($conn, $sql);
		$toret['stat']=1;
	}
	echo json_encode($toret);
?>

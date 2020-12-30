<?php
header('Content-Type: text/html; charset=utf-8');



	include 'dbOpenCon.php';

	$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
	mysqli_set_charset($conn, "utf8");

	if($conn->connect_error){
		die("Ops, falhou...:".$conn->connect_error);
	}

	
	$conn->query("delete FROM clientes where id=".$_POST['sid']);

	
$conn->close();



?>
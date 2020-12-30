<?php
header('Content-Type: text/html; charset=utf-8');


$pedidos = array();
	
	include 'dbOpenCon.php';

	$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
	mysqli_set_charset($conn, "utf8");

	if($conn->connect_error){
		die("Ops, falhou...:".$conn->connect_error);
	}
	
	$lid = "'".$_POST['sid']."'";
	$lproduto = "'".$_POST['sproduto']."'";
	$lvariacao = "'".$_POST['svariacao']."'";
	$ldescricao = "'".$_POST['sdescricao']."'";
	$lusuario = "'".$_POST['susuario']."'";

	$result = mysqli_query($conn,"UPDATE pedidosabertos SET produto=$lproduto,variacao=$lvariacao,descricao=$ldescricao,usuario=$lusuario WHERE id=".$_POST['sid']);
	
	
	

$conn->close();


?>
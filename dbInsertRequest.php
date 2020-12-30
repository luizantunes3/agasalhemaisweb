<?php
header('Content-Type: text/html; charset=utf-8');



if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	include 'dbOpenCon.php';

	$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
	mysqli_set_charset($conn, "utf8");

	if($conn->connect_error){
		die("Ops, falhou...:".$conn->connect_error);
	}


	$Produto = "'".$_POST['Produto']."'";
	$Variacao = "'".$_POST['Variacao']."'";
	$Descricao = "'".$_POST['Descricao']."'";
	$Usuario = "'".$_POST['Usuario']."'";

	$sql = "INSERT INTO pedidosabertos (id, produto, variacao, descricao, data, usuario) VALUES (NULL, $Produto, $Variacao, $Descricao, NULL, $Usuario)";
	$sql = "INSERT INTO pedidosabertos (produto, variacao, descricao, usuario) VALUES ($Produto, $Variacao, $Descricao, $Usuario)";

	if ($conn->query($sql) === TRUE) {
		echo"<script language='javascript' type='text/javascript'>
        alert('Cadastrado com sucesso');window.location
        .href='requests.php';</script>";
	} else {
		echo"<script language='javascript' type='text/javascript'>
        alert('Ops, algo deu errado!!!');window.location
        .href='requests.php';</script>";
	}
	
$conn->close();

}


?>
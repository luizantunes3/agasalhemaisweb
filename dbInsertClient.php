<?php
header('Content-Type: text/html; charset=utf-8');



if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	include 'dbOpenCon.php';

	$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
	mysqli_set_charset($conn, "utf8");

	if($conn->connect_error){
		die("Ops, falhou...:".$conn->connect_error);
	}


	$nome = "'".$_POST['nome']."'";
	$endereco = "'".$_POST['endereco']."'";
	$bairro = "'".$_POST['bairro']."'";
	$numero = "'".$_POST['numero']."'";
	$telefone = "'".$_POST['telefone']."'";
	$celular = "'".$_POST['celular']."'";

	//$sql = "INSERT INTO pedidosabertos (id, produto, variacao, descricao, data, usuario) VALUES (NULL, $Produto, $Variacao, $Descricao, NULL, $Usuario)";
	$sql = "INSERT INTO clientes (nome, endereco, bairro, numero,telefone,celular) VALUES ($nome, $endereco, $bairro, $numero, $telefone, $celular)";

	if ($conn->query($sql) === TRUE) {
		echo"<script language='javascript' type='text/javascript'>
        alert('Cadastrado com sucesso');window.location
        .href='client.php';</script>";
	} else {
		echo"<script language='javascript' type='text/javascript'>
        alert('Ops, algo deu errado!!!');window.location
        .href='cadClient.php';</script>";
	}
	
$conn->close();

}


?>
<?php
header('Content-Type: text/html; charset=utf-8');



	include 'dbOpenCon.php';

	$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
	mysqli_set_charset($conn, "utf8");

	if($conn->connect_error){
		die("Ops, falhou...:".$conn->connect_error);
	}
	
	$result = mysqli_query($conn,"select * FROM pedidosrecebidos where id =".$_POST['sticket']);
	$response = mysqli_fetch_array($result);
	
	$ticketdb = $response['ticket'];
	$usuariodb = $response['usuario'];
	$produtodb = $response['produto'];
	$variacaodb = $response['variacao'];
	$datapedidodb = $response['data_pedido'];
	$idpedidodb = $response['id_pedido'];
	$doadordb = $response['doador'];
	$datadoacaodb = $response['data_doacao'];
	
	
	//$sql1 = "INSERT INTO pedidosrecebidos (ticket, usuario, produto, variacao, data_pedido, id_pedido, doador, data_doacao) VALUES ($response['ticket'], $response['usuario'], $response['produto'], $response['variacao'], $response['data_pedido'], $response['id_pedido'], $response['doador'], $response['data_doacao'])";
	//$sql1 = "INSERT INTO pedidoshistorico (`id`, `produto`, `variacao`, `descricao`, `data`, `usuario`) VALUES (NULL, '$produtodb', '$variacaodb', 'Pedido reinserido(?)', current_timestamp(), '$usuariodb')";
	$sql1 = "INSERT INTO pedidoshistorico(`id`, `ticket`, `usuario`, `produto`, `variacao`, `data_pedido`, `id_pedido`, `doador`, `data_doacao`) VALUES (NULL, '$ticketdb', '$usuariodb', '$produtodb', '$variacaodb', '$datapedidodb', '$idpedidodb', '$doadordb', '$datadoacaodb')";
	$result1 = $conn->query($sql1);
	echo $result1;
	
	$conn->query("INSERT INTO pedidoshistorico (`id`, `produto`, `variacao`, `descricao`, `data`, `usuario`) VALUES (NULL, '$produtodb', '$variacaodb', 'Pedido reinserido(?)', current_timestamp(), '$usuariodb')");
		
	$conn->query("delete FROM pedidosrecebidos where id=".$_POST['sticket']);

	
$conn->close();



?>
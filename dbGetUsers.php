<?php
header('Content-Type: text/html; charset=utf-8');


$pedidos = array();
	
	include 'dbOpenCon.php';

	$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
	mysqli_set_charset($conn, "utf8");

	if($conn->connect_error){
		die("Ops, falhou...:".$conn->connect_error);
	}

	
	$result = mysqli_query($conn,"SELECT * FROM usuarios");
	
	echo "<table border='1'>
		<tr>
			<th>ID</th>
			<th>USUARIO</th>
			<th>SENHA</th>
			<th>EMAIL</th>
			<th>NOME</th>
			<th>ENDERECO</th>
			<th>BAIRRO</th>
			<th>Nº</th>
			<th>TEL</th>
			<th>CEL</th>
		</tr>";

	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['usuario'] . "</td>";
		echo "<td>" . $row['senha'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $row['nome'] . "</td>";
		echo "<td>" . $row['endereco'] . "</td>";
		echo "<td>" . $row['bairro'] . "</td>";
		echo "<td>" . $row['numero'] . "</td>";
		echo "<td>" . $row['telefone'] . "</td>";
		echo "<td>" . $row['celular'] . "</td>";
		//echo "<td><input type='button' name='' value='X'></td>";
		echo "</tr>";
	}
	echo "</table>";
	
	function runMyFunction() {
		echo 'I just ran a php function';
	}
	

$conn->close();


?>
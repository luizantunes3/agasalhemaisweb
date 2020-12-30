<?php
header('Content-Type: text/html; charset=utf-8');


$pedidos = array();
	
	include 'dbOpenCon.php';

	$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
	mysqli_set_charset($conn, "utf8");

	if($conn->connect_error){
		die("Ops, falhou...:".$conn->connect_error);
	}

	
	$result = mysqli_query($conn,"SELECT * FROM clientes");
	
	echo "<table border='1'>
		<tr>
			<th>ID</th>
			<th>NOME</th>
			<th>ENDERECO</th>
			<th>BAIRRO</th>
			<th>NUMERO</th>
			<th>TELEFONE</th>
			<th>CELULAR</th>
			<th>AÇÃO</th>
		</tr>";

	while($row = mysqli_fetch_array($result)){
		
		echo '<tr id="' . $row['id'] . '">
			<td>' . $row['id'] . '</td>
			 <td>' . $row['nome'] . '</td>
			 <td> '. $row["endereco"] . '</td>' . 
			 '<td>' . $row["bairro"] . '</td>' . 
			 '<td>' . $row["numero"] . '</td>' . 
			 '<td>' . $row["telefone"] . '</td>' . 
			 '<td>' . $row["celular"] . '</td>' . 
			 '<td ><a class="deleteLink" style="Color: red;"  onclick="deleteStudent('.$row['id'].')">Excluir</a></td>' .
			 '</tr>';
	

		//echo "</tr>";
	}
	echo "</table>";
	

	

$conn->close();


?>
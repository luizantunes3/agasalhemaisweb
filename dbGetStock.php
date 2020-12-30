<?php
header('Content-Type: text/html; charset=utf-8');

$pedidos = array();
	
	include 'dbOpenCon.php';

	$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
	mysqli_set_charset($conn, "utf8");

	if($conn->connect_error){
		die("Ops, falhou...:".$conn->connect_error);
	}

	
	$result = mysqli_query($conn,"SELECT * FROM pedidosrecebidos");
	
	echo "<table border='1' id='lista1'>
		<tr>
			<th>ID</th>
			<th>PRODUTO</th>
			<th>VARIACÃO</th>
			<th>CLIENTE</th>
			<th>DATA RECEBIMENTO</th>
			<th>DOADOR</th>
			<th>AÇÃO</th>
		</tr>";

	while($row = mysqli_fetch_array($result)){
		echo '<tr id="' . $row['id'] . '">
			<td>' . $row['id'] . '</td>
			 <td>' . $row['produto'] . '</td>
			 <td> '. $row["variacao"] . '</td>' . 
			 '<td>' . $row["usuario"] . '</td>' . 
			 '<td>' . $row["data_doacao"] . '</td>' .
			 '<td>' . $row["doador"] . '</td>' . 			 
			 '<td ><a class="fas fa-folder-open" style="Color: green;font-size:24px"  onclick="moveRequest('.$row['id'].')"></a></td>' .
			 '</tr>';
	}
	echo "</table>";
	

$conn->close();


?>
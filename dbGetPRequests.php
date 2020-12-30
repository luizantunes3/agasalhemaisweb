<?php
header('Content-Type: text/html; charset=utf-8');


$pedidos = array();
	
	include 'dbOpenCon.php';

	$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
	mysqli_set_charset($conn, "utf8");

	if($conn->connect_error){
		die("Ops, falhou...:".$conn->connect_error);
	}

	
	$result = mysqli_query($conn,"SELECT * FROM pedidospendentes");
	
	echo "<table border='1'>
		<tr>
			<th>TICKET</th>
			<th>CLIENTE</th>
			<th>PRODUTO</th>
			<th>VARIAÇÃO</th>
			<th>DATA DO PEDIDO</th>
			<th>DOADOR</th>
			<th>DATA DOAÇÃO</th>
			<th>AÇÃO</th>
		    <th>AÇÃO</th>
			<th>AÇÃO</th>
		</tr>";

	while($row = mysqli_fetch_array($result)){

		echo '<tr ticket="' . $row['ticket'] . '">
			<td>' . $row['ticket'] . '</td>
			 <td>' . $row['usuario'] . '</td>
			 <td> '. $row["produto"] . '</td>' . 
			 '<td>' . $row["variacao"] . '</td>' . 
			 '<td>' . $row["data_pedido"] . '</td>' . 
			 '<td>' . $row["doador"] . '</td>' . 
			 '<td>' . $row["data_doacao"] . '</td>' . 
			 '<td ><a class="fas fa-minus-circle" style="Color: red; font-size:24px"  onclick="deleteStudent('.$row['ticket'].')"></a></td>' .
			 '<td ><a class="far fa-handshake" style="Color: green;font-size:24px"  onclick="confirmRequest('.$row['ticket'].')"></a></td>' .
			 '<td ><a class="fas fa-recycle" style="Color: yellow;font-size:24px"  onclick="moveRequest('.$row['ticket'].')"></a></td>' .
			 '</tr>';
	}
	echo "</table>";
	

$conn->close();


?>
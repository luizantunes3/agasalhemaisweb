<?php
header('Content-Type: text/html; charset=utf-8');

$pedidos = array();
	
	include 'dbOpenCon.php';

	$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
	mysqli_set_charset($conn, "utf8");

	if($conn->connect_error){
		die("Ops, falhou...:".$conn->connect_error);
	}

	
	$result = mysqli_query($conn,"SELECT * FROM pedidosabertos");
	
	echo "<table border='1' id='lista1'>
		<tr>
			<th>ID</th>
			<th>PRODUTO</th>
			<th>VARIACÃO</th>
			<th>DESCRIÇÃO</th>
			<th>DATA</th>
			<th>CLIENTE</th>
			<th>AÇÃO</th>
			<th>AÇÃO</th>
		</tr>";

	while($row = mysqli_fetch_array($result)){
		echo '<tr id="' . $row['id'] . '">
			<td>' . $row['id'] . '</td>
			 <td>' . $row['produto'] . '</td>
			 <td> '. $row["variacao"] . '</td>' . 
			 '<td>' . $row["descricao"] . '</td>' . 
			 '<td>' . $row["data"] . '</td>' . 
			 '<td>' . $row["usuario"] . '</td>' .  
			 '<td ><a class="fas fa-minus-circle" style="Color: red; font-size:24px"  onclick="deleteStudent('.$row['id'].')"></a></td>' .
			 '<td ><a class="fas fa-edit" style="Color: gray; font-size:24px"  onclick="editRequest('.$row['id'].')"></a></td>' .
			 '</tr>';
	}
	echo "</table>";
	

$conn->close();


?>
<?php
	include 'dbOpenCon.php';
	
	$openrequests=0;
	$pendingrequests=0;

	$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
	mysqli_set_charset($conn, "utf8");

	if($conn->connect_error){
		die("Ops, falhou...:".$conn->connect_error);
	}

	
	$result = mysqli_query($conn,"SELECT * FROM pedidosabertos");
	$result1 = mysqli_query($conn,"SELECT * FROM pedidospendentes");
	

	while($row = mysqli_fetch_array($result)){
		$openrequests += 1;
	}
	
	while($row = mysqli_fetch_array($result1)){
		$pendingrequests += 1;
	}
	
	$conn->close();
	
# PHPlot Example: Pie/text-data-single
require_once 'phplot.php';

# The data labels aren't used directly by PHPlot. They are here for our
# reference, and we copy them to the legend below.
$data = array(
			//array('PEDIDOS ABERTOS' , $openrequests ), 
            //array('PEDIDOS PENDENTES' , $pendingrequests ),
			
			//PEDIDOS ANO - BARRAS
			array('PEDIDOS ABERTOS' , 110 ), 
            array('PEDIDOS PENDENTES' , 100 ),
            array('PEDIDOS RECEBIDOS' , 80 ),
			array('PEDIDOS DOADOS' , 80 ),
);

$plot = new PHPlot(900,350);
$plot->SetImageBorderType('none');

$plot->SetPlotType('pie');
$plot->SetDataType('text-data-single');
$plot->SetDataValues($data);

# Set enough different colors;
$plot->SetDataColors(array('red', 'green', 'blue'));

# Main plot title:
$plot->SetTitle("Volume de pedidos, 2020\n(Banco de dados Agasalhe+)");

# Build a legend from our data array.
# Each call to SetLegend makes one line as "label: value".
foreach ($data as $row)
  $plot->SetLegend(implode(': ', $row));
# Place the legend in the upper left corner:
$plot->SetLegendPixels(5, 5);

$plot->DrawGraph();



?>
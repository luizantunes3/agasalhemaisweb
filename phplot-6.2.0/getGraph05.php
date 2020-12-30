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

			//PEDIDOS PENDETES MESES - PIZZA
			array('JAN' , 0 ), 
            array('FEV' , 0 ),
            array('MAR' , 0 ),
			array('ABR' , 0 ),
			array('MAI' , 0 ),
			array('JUN' , 15 ),
			array('JUL' , 20 ),
			array('AGO' , 30 ),
			array('SET' , 15 ),
			array('OUT' , 0 ),
			array('NOV' , 0 ),
			array('DEZ' , 0 ),
);

$plot = new PHPlot(900,350);
$plot->SetImageBorderType('none');

$plot->SetPlotType('pie');
$plot->SetDataType('text-data-single');
$plot->SetDataValues($data);

# Set enough different colors;
$plot->SetDataColors(array('red', 'green', 'blue', 'yellow', 'gray', 'pink', 'orange', 'purple', 'brown', 'white', 'black', 'violet'));

# Main plot title:
$plot->SetTitle("Volume de pedidos PENDENTES, meses\n(Banco de dados Agasalhe+)");

# Build a legend from our data array.
# Each call to SetLegend makes one line as "label: value".
foreach ($data as $row)
  $plot->SetLegend(implode(': ', $row));
# Place the legend in the upper left corner:
$plot->SetLegendPixels(5, 5);

$plot->DrawGraph();



?>
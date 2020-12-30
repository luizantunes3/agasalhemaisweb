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
	
// requisição da classe PHPlot
require_once 'phplot.php';
  
// Array com dados de Ano x Índice de fecundidade Brasileira 1940-2000
// Valores por década
$data = array(

			//PEDIDOS ABERTOS MESES - BARRA
            array('JAN' , 0 ), 
            array('FEV' , 0 ),
            array('MAR' , 0 ),
			array('ABR' , 0 ),
			array('MAI' , 0 ),
			array('JUN' , 20 ),
			array('JUL' , 30 ),
			array('AGO' , 40 ),
			array('SET' , 10 ),
			array('OUT' , 0 ),
			array('NOV' , 0 ),
			array('DEZ' , 0 ),
             );     
# Cria um novo objeto do tipo PHPlot com 500px de largura x 350px de altura                 
$plot = new PHPlot(500 , 350);     
  
// Organiza Gráfico -----------------------------
$plot->SetTitle('Volume de Pedidos em 2020');
# Precisão de uma casa decimal
$plot->SetPrecisionY(0);
# tipo de Gráfico em barras (poderia ser linepoints por exemplo)
$plot->SetPlotType("bars");
# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (valores de porcentagem)
$plot->SetDataType("text-data");
# Adiciona ao gráfico os valores do array
$plot->SetDataValues($data);
// -----------------------------------------------
  
// Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none');
# Texto abaixo do eixo X
$plot->SetXLabel("Fonte: Banco de dados Agasalhe+ 2020");
# Tamanho da fonte que varia de 1-5
$plot->SetXLabelFontSize(2);
$plot->SetAxisFontSize(2);
// -----------------------------------------------
  
// Organiza eixo Y -------------------------------
# Coloca nos pontos os valores de Y
$plot->SetYDataLabelPos('plotin');
// -----------------------------------------------
  
// Desenha o Gráfico -----------------------------
$plot->DrawGraph();
// -----------------------------------------------




?>
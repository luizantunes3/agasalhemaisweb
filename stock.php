<html>

<head>

	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Agasalhe+</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<script>
	
		document.addEventListener("DOMContentLoaded", function(event) { 
			$("#content-center").load("dbGetStock.php"); 
		});
		
		function deleteStudent(ticket) {
			$.post("dbdelPRequest.php" , {sticket:ticket} , function(data){
				window.alert("Pedido deletado com sucesso!");
				$("#" + ticket).fadeOut('slow' , function(){$(this).remove();if(data)alert(data);});
			});	
		}
		
		function confirmRequest(ticket) {
			$.post("dbconfirmRequest.php" , {sticket:ticket} , function(data){
				window.alert("Pedido recebido com sucesso!");
				$("#" + ticket).fadeOut('slow' , function(){$(this).remove();if(data)alert(data);});
			});	
		}
		
		function getSearchRequest(searchtxt) {
			//window.alert(searchtxt);
			if(searchtxt==""){
				window.alert("O campo não pode ser vazio!");
			}else{
				$("#content-center").load("dbGetSearchStock.php", {ssearchtxt:searchtxt}); 
			}
		
		}
		
		function moveRequest(ticket) {
			
			if (confirm("Deseja confirmar a doação do pedido: "+ticket+"?")) {
				$.post("dbMoveRequest2.php" , {sticket:ticket} , function(data){
					//$("#" + ticket).fadeOut('slow' , function(){$(this).remove();if(data)alert(data);});
				});	
			} else {
			
			}
		}
		
		
	
	
   </script>
   
	
	<style>
	
	input[type=text], select {
			width: 45%;
			float: left;
			padding: 12px 20px;
			margin: 8px 20px;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		
		input[type=password], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type=submit] {
			width: 100%;
			background-color: #3897f2;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type=submit]:hover {
			background-color: #298be8;
		}
	
		body{
			background-color:#e5e5e5;
		}
	
		#menu_bar{
			width: 100%;
			height: 80px;
			margin-top: -8px;
			margin-left: -8px;
			padding-right: 16px;
	        box-shadow: 0 5px 6px -6px black;
			background-color: white;

		}
		
		.menu_barLogo{
			padding-top: 15px;
		}
		
		#content-area{
			width: 100%;
			background-color: #e5e5e5;
		}
		
		
		#side-menu{
			float:left;
			width: 250px;
			height: 100%;
			background-color: #404040;
			margin-left: -8px;
			text-align: center;
			float:left;
		}
		
		#main-area{
			background-color: #e5e5e5;
			display: flex;  
			flex-wrap: wrap;
		}
		
		.button {
			font-family: Arial, Helvetica, sans-serif;
			background-color: #3897f2;
			border: none;
			color: white;
			padding: 70px 70px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
		}
		
		.button1 {
			background-color: Transparent;
			font-family: Arial, Helvetica, sans-serif;
			border: none;
			color: white;
			padding: 15px 89px;
			text-align: left;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			white-space:nowrap;
			margin: 0px -3px;
			cursor: pointer;
			float: left;
			border-left: 5px solid Transparent;
		}
		
		.button1:hover {
			font-family: Arial, Helvetica, sans-serif;
			color: white;
			padding: 15px 89px;
			text-align: left;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 0px -3px;
			cursor: pointer;
			background-color: Transparent;
			border-left: 5px solid white;
		}
	
		#content-top{
			font-family: Arial, Helvetica, sans-serif;
			background-color:white;
			width: 1000px;
			height: 150px;
			margin-top: 10px;
			float:left;
		}
		
		#content-center{
			font-family: Arial, Helvetica, sans-serif;
			background-color:white;
			width: 1000px;
			height: 400px;
			margin-top: 10px;
			float:left;
		}
		
		table{
			width: 100%;
			text-align: center;
		}
		
		table, th, td {
			border: 1px solid white;
			color: gray;
			
		}
		
		input[type=text] {
			width: 150px;
			-webkit-transition: width 0.4s ease-in-out;
			transition: width 0.4s ease-in-out;
		}

		/* When the input field gets focus, change its width to 100% */
			input[type=text]:focus {
			width: 33%;
		}
		
		
	</style>


</head>

<body>
	
	
	<div id="menu_bar">
		<div class="menu_barLogo">
			<img src="Resources\logo.PNG" width="200px" height="47px"/>
		</div>
	</div>
	
	
	<div id="content-area">
		<div id="side-menu">
			<input type="button" class="button1" onclick="location.href='openrequests.php';" value="Pedidos abertos"> <span class="fas fa-sticky-note" style="Color: white; margin-right:115px; margin-top:-35px; font-size:22px"></span> </input>
			<input type="button" class="button1" onclick="location.href='pendingrequests.php';" value="Pedidos Pendentes"><span class="far fa-sticky-note" style="Color: white; margin-right:115px; margin-top:-35px; font-size:22px"></span> </input>
			<input type="button" class="button1" onclick="location.href='stock.php';" value="Estoque"> <span class="fas fa-box" style="Color: white; margin-right:115px; margin-top:-35px; font-size:22px"></span> </input>
			<input type="button" class="button1" onclick="location.href='requests.php';" value="Cadastrar pedidos"> <span class="fas fa-clipboard-check" style="Color: white; margin-right:115px; margin-top:-35px; font-size:22px"></span> </input>
			<input type="button" class="button1" onclick="location.href='users.php';" value="Usuários (App)"> <span class="fas fa-user" style="Color: white; margin-right:115px; margin-top:-35px; font-size:22px"></span> </input>
			<input type="button" class="button1" onclick="location.href='client.php';" value="Clientes"> <span class="fas fa-user-shield" style="Color: white; margin-right:115px; margin-top:-35px; font-size:22px"></span> </input>
			<input type="button" class="button1" onclick="location.href='reports.php';" value="Relatorios"> <span class="fas fa-chart-pie" style="Color: white; margin-right:115px; margin-top:-35px; font-size:22px"></span> </input>
			<a href="index.php" class="button1">Sair</a> <span class="fas fa-exchange-alt" style="Color: white; margin-right:115px; margin-top:-35px; font-size:22px"></span>
		</div>
		
		<div id="content-top">
			<h2 style="margin-left: 20px;color:gray;"> Estoque </h2>
			<p style="margin-left: 20px;color:gray;"> Nesta página você poderá encotrar todos os pedidos já foram recebidos e estão no estoque. </p>
			<input type="text" id = "search1" style="margin-top:-7px;" name="search" placeholder="Buscar...">
			<a class="fab fa-sistrix" style="Color: gray;font-size:24px;margin-left:-50px;"  onclick="getSearchRequest(document.getElementById('search1').value)"></a>
			
			<div class="content-info" style="margin-top: -19px;">
				<a class="fas fa-folder-open" style="Color: green;font-size:15px;"></a>
				<a style="font-size:12px">Confirmar doação</a>
			</div>

		</div>
		
		<div id="content-center">
		
		</div>
		
	</div>


</body>

</html>
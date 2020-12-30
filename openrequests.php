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
			$("#content-center").load("dbGetRequests.php"); 
		});
		
		function deleteStudent(id) {
			$.post("dbdelRequest.php" , {sid:id} , function(data){
				$("#" + id).fadeOut('slow' , function(){$(this).remove();if(data)alert(data);});
			});	
		}
		
		function editRequest(id) {
			 $("#"+id).after('<tr id="editRequest" style=""> <td> <input type="" id="txtid" placeholder="" style="width: 25px;" disabled="disabled"> </td>      <td> <input type="" id="txtproduto" placeholder="" style="width: 150px;"> </td>      <td> <input type="" id="txtvariacao" placeholder="" style="width: 50px;"> </td>      <td> <input type="" id="txtdescricao" placeholder="" style="width: 150px;"> </td>      <td> <input type="" id="" placeholder="" style="width: 152px;" disabled="disabled"> </td>      <td> <input type="" id="txtusuario" placeholder="" style="width: 150px;"> </td>      <td ><a class="fas fa-chevron-circle-down" style="Color: green; font-size:24px"  onclick="updateRequest('+id+')"></a></td>      <td ><a class="fas fa-window-close" style="Color: gray; font-size:24px"  onclick="cancelEdit()"></a></td>');
		}
		
		function cancelEdit() {
			 $("#editRequest").fadeOut('slow' , function(){$(this).remove();if(data)alert(data);});
		}
		
		function updateRequest(id) {
			alert("Pedido atualizado com sucesso!");
			$produto = document.getElementById('txtproduto').value;
			$variacao = document.getElementById('txtvariacao').value;
			$descricao = document.getElementById('txtdescricao').value;
			$usuario = document.getElementById('txtusuario').value;
			$.post("dbUpdateRequest.php" , {sid:id, sproduto:$produto, svariacao:$variacao, sdescricao:$descricao, susuario:$usuario} , function(data){
				$("#editRequest").fadeOut('slow' , function(){$(this).remove();if(data)alert(data);});
			});	
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
			<h2 style="margin-left: 20px;color:gray;"> Pedidos em aberto </h2>
			<p style="margin-left: 20px;color:gray;"> Nesta página você poderá encotrar todos os pedidos em aberto no banco de dados. </p>
			
			<div class="content-info" style="margin-top: 25px; margin-left:20px;">
				<a class="fas fa-minus-circle" style="Color: red;font-size:15px;"></a>
				<a style="font-size:12px">Deletar pedido</a>
				<a class="fas fa-edit" style="Color: gray;font-size:15px;"></a>
				<a style="font-size:12px">Editar pedido</a>
				<a class="fas fa-chevron-circle-down" style="Color: green;font-size:15px;"></a>
				<a style="font-size:12px">Confirmar alterações</a>
				<a class="fas fa-window-close" style="Color: gray;font-size:15px;"></a>
				<a style="font-size:12px">Cancelar alterações</a>
			</div>

		</div>
		
		<div id="content-center">
		
		</div>
		
	</div>


</body>

</html>
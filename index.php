<html>

<head>

	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Agasalhe+</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
			
	<script>
	
		//document.addEventListener("DOMContentLoaded", function(event) { 
			//$("#content-area").load("login.php"); 
		//});
		
   </script>


	<style>
	
		#menu_bar{
			width: 100%;
			height: 80px;
			margin-top: -8px;
			margin-left: -8px;
			padding-right: 16px;
	        box-shadow: 0 5px 6px -6px black;
		}
		
		.menu_barLogo{
			padding-top: 15px;
		}
		
		#content-area{
			display: flex;  
			flex-wrap: wrap;
		}
		
		.login-box{
			width: 400px;
			height: 450px;
			margin: 0 auto;
			margin-top: 50px;
			
			
		}
		
		
		input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
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
		
		h3 {
			font-family: Arial, Helvetica, sans-serif;
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
		<div class="login-box">
		<h3> Entre para acessar o sistema </h3>
		<form name="form-login" action="dbLoginCheck.php" autocomplete="off" method="POST">
			<input type="text" id="fname" name="email" placeholder="E-mail">
			<input type="password" id="lname" name="senha" placeholder="Senha">

			<input type="submit" name="" value="Entrar" >
		</form>
		
	</div>
	</div>


</body>

</html>
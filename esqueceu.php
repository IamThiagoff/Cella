<!DOCTYPE html>
<?php

?>
<html lang="pt" dir="ltr">
	<head>
	
		<meta charset="utf-8">
		<!--meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"-->
		<meta name="author" content="Cella">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<title>Cella-login</title>
		<!-- BOOTSTRAP -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<!-- ESTILOS PARA ESTA PÁGINA -->
		<!-- Nesse caso, este estilo é apenas para inserir imagens -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="style.css">
		<!--meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no"-->
		<link rel="sortcut icon" href="img/icone_cella.jpg" type="image/jpg" />
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<style>
			.botao{
	background-color: #662b84;
	color: #fff;
	border-radius: 25px;
	border: none;
	width: 275px;
	height: 48px;
	font-size: 15px;
	font-weight: 600;
	min-height: 48px;
	transition: 0.5s;
	}
	.botao:hover{background-color: #522b84;}
		</style>

	</head>
	<body>
		<div class="d-flex justify-content-center align-items-center login-container">
			<!--img src="img/Cella.png" id="img_circular" LOGO-->
			<form action='esqueceu_2.php' method='POST' autocomplete='off' class="login-form text-center">
				<h3 class="mb-5 font-weight-light text-uppercase"><br>CELLA</h3><hr>
				<h5>Esqueceu sua senha?</h5><hr>
				<div class="form-group">
					<input type="email" class="form-control rounded-pill form-control-lg"  placeholder="Coloque seu e-mail" name='email' style="border: none;" required id="senha">
				</div>
				Digite um e-mail que você lembra de ter usado para entrar na sua conta, os e-mail's podem ir para na caixa de span então fique alerta
				<b><input type='submit' name='salvar' value='Enviar' class="botao text-uppercase btn-block btn mt-5 rounded-pill btn-lg" style="color: #fff;"></b><br>
			</form>

		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

			<div class="footer">
			<img src="img/Senai_-_AZUL.jpg" class="imglogo" alt="Logo_senai" title="Logo_senai">
			&copy; Copyright 2019 - 2020
			</div>

	</body>
</html>
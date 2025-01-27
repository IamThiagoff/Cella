<?php
	include "../conexao.php";
	session_start();
	$id_professor = $_SESSION['id_professor'];
	$professor = $_SESSION['nome_professor'];
	$numero = $_SESSION['numero'];
	$tipo = $_SESSION['tipo_usuario'];
	$senha = $_SESSION['senha_professor'];
	$email = $_SESSION['email'];
	$img   = $_SESSION['img'];
	$sql = "SELECT * FROM tipo_user WHERE tipo_usuario = $tipo "; 
	$materiais = $fusca -> prepare($sql);
	$materiais -> execute();
	foreach($materiais as $material){
		$user = $material['nome_usuario'];
	}
?>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>				
			.meuPerfil{
					width:65vw;
					position: relative;
					padding: 5px;
					height: 38vh;
					margin-bottom:45px;
					border: 1px solid lightgray;
					border-radius:10px;
					display: flex;
					flex-direction: column;
					justify-content: space-between;
					overflow:auto;
					font-size:2.5vh;
				}
				.teste{
					width:15vh;
					height:15vh;
					border: 1px solid #000;
					border-radius:50%;
				}
				.circle {
				  width:15vh;
				  height:15vh;
				  padding: 0;
				  position: relative;
				  background: #cccccc;
				  border-radius: 50%;
				  overflow: hidden;
				  clear: both;
				}
				.circle .text {
					 font-size: 2rem;
					 width:15vh;
					 height:7.5vh;
					 top: 30vh;
					 position: absolute;
					 background: rgba(0, 0,0, 0.2);
					 border-radius: 0 0 100px 100px;
					 -webkit-transition: all 0.7s ease;
					 transition: all 0.7s ease;
				}
				.circle:hover .text {
				  top: 8vh;
				  -webkit-box-shadow: 0px 0px 15px 2px rgba(255, 255, 255, .75);
				  box-shadow: 0px 0px 15px 2px rgba(255, 255, 255, .75);
				}
				.text p {
				  text-align: center;
				  color:black;
				}
				img{
					width:15vh;
				    height:15vh;
				}
				.dropdown-toggle{
					overflow:visible;
				}
				input[type='file'] {
				  display: none
				}
				label {
				  cursor: pointer;
				}
				label:hover {
				  text-decoration:underline;
				}
				article{
					border-top: 0.7px solid lightgray;
					padding:10px;
					cursor:pointer;
					display: flex;
					flex-direction: row;
					flex-wrap: wrap;
					justify-content: space-between;
				}
				article:hover{
					background-color:#e6e6e6;
				}
				.alinhamento{
					display: flex;
					justify-content: center;
				}
				a:link
				{
				text-decoration:none;
				color:#333;
				}
		</style>
	</head>	
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
					<center>
					<form action="carrega.php" method="POST" enctype="multipart/form-data" id="formulario"> <!--Form para imagem do perfil-->
						<div class="circle">				
							<?php
								if($img == NULL){
									echo "<img src='imagens/user.png'>";
								}
								else{
									echo "<img src='imagens/$img'>";
								}
							?>
							<div class="text">
								<p>
									<label for='tucano' style="color: black;">Editar</label>
									<input id='tucano' type='file' name="tucano" onchange="enviaForm(this.value)">
									<input type="hidden" name="id" id="id" value="<?php echo $id_professor;?>">
								</p>
							</div>
						</div>
					</form>
					</center>
					<hr>
					<div class="alinhamento"><!---Div de alinhamento no centro-->
						<div class="meuPerfil">
							<p style="padding-left: 10px;">Perfil</p>
							<article class="nome">
								Nome <b><?php echo $professor;?></b><span class="glyphicon glyphicon-chevron-right"></span>
							</article>
							<article class="numero">
								Número<b><?php echo $numero;?></b><span class="glyphicon glyphicon-chevron-right"></span>
							</article>
							<article class="contato">
								Contato<b><?php echo $email;?></b><span class="glyphicon glyphicon-chevron-right"></span>
							</article>
							<?php
							echo "<a href='editar_senha.php'>
									<article class='senha' style='color:#333;'>
										Senha<b>••••••••</b><span class='glyphicon glyphicon-chevron-right'></span>
									</article>
								</a>";
							?>
							<article>
								Cargo<b><?php echo $user;?></b><span class="glyphicon glyphicon-chevron-right"></span>
							</article>
						</div>
					</div>
				<script>
					$(document).ready(function(){
					  $(".nome").click(function(){
						$("#suaDiv").load('editar_nome.php');     
					  });
					});
					$(document).ready(function(){
					  $(".numero").click(function(){
						$("#suaDiv").load('editar_numero.php');     
					  });
					});
					$(document).ready(function(){
					  $(".contato").click(function(){
						$("#suaDiv").load('editar_contato.php');     
					  });
					});
					function enviaForm(valor){
					    var res = valor.split(".");
					    if(res[1] == 'png' || res[1] == 'jpeg' || res[1] == 'jpg'){
							formEnviar();
						}
						else{
							alert("Formato do arquivo incorreto.");
						}
					}
					function formEnviar(){
						document.getElementById("formulario").submit();
					}
				</script>
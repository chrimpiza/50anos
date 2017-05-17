<?php

	$nomeArquivo="template.php"; //Coloar o nome do arquivo, para impedir o acesso direto do arquivo.
	if(basename($_SERVER["PHP_SELF"]) == $nomeArquivo){
		die("<script>alert('Sem permição de acesso !')</script>\n<script>window.location=('../index.php')</script>");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" >
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>50 Anos - GEPJ</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<style type="text/css">
			html, body, .princip {
				border: 0px;
				margin: 0px;
				padding: 0px;
				width: 100%;
				height: 100%;
				resize: none !important;
				overflow: hidden;
				background-color: transparent;
			}
			.container, .row, .navbar, .navbar-default, .container-fluid{
				border: 0px;
				margin: 0px;
				padding: 0px;
				width: 100%;
				resize: none !important;
			}
			.btn-env-fotos{
				margin-right: 25%;				
			}
			.navbar-default{
				background-color: transparent;

			}
			.texto{
				margin-top: 5%;
				background-color: rgba(238, 238, 238, 0.6);
			}
		</style>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	</head>
	<body>
		<div class="princip">
			<div class="container">
				<div class="row">
					<nav class="navbar navbar-default">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<div class="navbar-right">
									<button type="button" class="btn btn-lg btn-primary navbar-btn btn-env-fotos" data-toggle="modal" data-target="#myModal">Envie Suas Fotos</button>
								</div>
							</div>
						</div>						
					</nav>		
				</div>
				<div class="row">
					<div class="col-xs-0 col-md-1"></div>
					<div class="col-xs-12 col-md-10">
						<div class="jumbotron texto">
							<h1>Ajude-nos a recuperar nossa hist&oacute;ria!</h1>
							<p>Estamos a procura de fotos antigas de nosso grupo, para serem usadas na comemora&ccedil;&atilde;o dos 50 anos. Clique no bot&atilde;o de baixou ou no de cima para enviar suas fotos.<br>SAPS</p>
							<p><a class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#myModal">Envie Suas Fotos</a></p>
						</div>
					</div>
				</div>		
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Envie suas fotos</h4>
					</div>
					<div class="modal-body" id="troca">
						<form enctype="multipart/form-data" method="post" id="formulario">
							<div class="form-group" id="divnome">
								<label for="exampleInputEmail1">Nome</label>
								<input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
							</div>
							<div class="form-group" id="divemail">
								<label for="exampleInputEmail1">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email" name="email">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Data de ingresso</label>
								<input type="text" class="form-control" id="ingresso" placeholder="Data de ingresso" name="dtingresso">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Data de saida</label>
								<input type="text" class="form-control" id="saida" placeholder="Data de saida" name="dtsaida">
							</div>
							<div class="form-group">
								<label for="exampleInputFile">File input</label>
								<input type="file" id="exampleInputFile" name="fotos[]" multiple="">
							</div>
							<button type="submit" class="btn btn-default" id="enviar">Submit</button>
						</form>					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">fechar</button>
					</div>
				</div>
			</div>
		</div>
		<script src="js/jquery-3.2.1.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/front.js"></script>
	</body>
</html>
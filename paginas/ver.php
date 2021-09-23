<DOCTYPE>
	<html>

	<head>
		<title>Detalhes da saida</title>
		<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/visualizarCarro.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/styleIndex.css" />
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
		<link rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

	</head>

	<body>
		<?php
		     include_once "../Controler/paginasSession.php";
		?>
		<div id="toda_pagina">
			<div id="container_nav">
				<div class="container-fluid" id="container_navSuperior">

				</div>
				<div id="container_navInferior">
					<nav class="navbar navbar-expand-lg navbar-light" id="nav_inferior">
						<a class="navbar-brand" href="../index.php" id="link-home"><i class="fa fa-home"
								id="figurinha_home"></i> Gestor de Estacionamento</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
							aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link" id="links" href="clientes.php"><i class="fa fa-book"></i>
										Clientes</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="links" href="Carros.php"><i class="fa fa-automobile"></i>
										Veiculos</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" id="links" href="marcarSaida.php"><i class="fa fa-book"></i>S.
										parque</a>
								</li>

								<li class="nav-item dropdown" id="dadosUser">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdown" href="#"
										role="button">Menu</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#"><i class="fa fa-cog"></i>Definições</a>
										<a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Trocar senha</a>
										<a class="dropdown-item" href="#" onclick="sair()"><i class="fa fa-power-off">
											</i> Sair</a>
									</div>
								</li>
							</ul>
						</div>
					</nav>
				</div>

				<div class="container" id="conteudo1">
					<div class="container " id='estetica'>
						<hr>
						<h4 id="tituloDados">Dados da Entrada<h4>
								<hr>
					</div>

					<div class="container" id="dados">
						<form id="form">
							<div class="form-group" id="email_cont">
								<label for="email">Email do cliente :</label>
								<input type="email" class="form-control" placeholder="Ex: EscrevSeumail@gmail.com"
									id="email" />
								<i id="erroMail"></i>
							</div>

							<div id="radios">
								<p><b>proprietario:</b> </p>
								<div class="form-check" id="pergunta_cont">
									<input class="form-check-input" type="radio" name="pergunta" id="pergunta"
										value="Sim" />
									<label class="form-check-label" for="exampleRadios1">
										Sim
									</label>
								</div>
								<div class="form-check" id="pergunta1_cont">
									<input class="form-check-input" type="radio" name="pergunta" id="pergunta"
										value="Nao" />
									<label class="form-check-label" for="exampleRadios2">
										Não
									</label>
								</div>
							</div>
							<div class="form-group" id="outroDono">
								<label for="donoOcasional">Dono ocasional :</label>
								<input type="text" class="form-control" placeholder="Escreva o nome"
									id="donoOcasional" />
								<label id="mensagemErro"></label>
							</div>

							<div class="form-group" id="matricula_cont">
								<label for="matricula">Matricula :</label>
								<input type="text" class="form-control" id="matricula" />
							</div>
							<div class="container" id="botao_autorizacao">
								<button type="submit" class="btn btn-success">Autorizar entrada</button>
							</div>
						</form>
					</div>
					<div id="processing">
						<img src="../assets/imagem/processing.gif" width="100px" height="100px" />
					</div>

				</div>
			</div>
		</div>

		<script src="../assets/jquery/jquery.min.js"></script>
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="../assets/js/verCarro.js"></script>
		<script src="../assets/js/sair.js"></script>
	</body>

	</html>
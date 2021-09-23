<!DOCTYPE>
<html>

<head>
	<title>Detalhes da saida</title>
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/saida.css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Oregano&display=swap" rel="stylesheet" />
</head>

<body>
	<?php
		     include_once "../Controler/paginasSession.php";
		 ?>


	<div id="container_nav">
		<div class="container-fluid" id="container_navSuperior">

		</div>
		<div class="container-fluid" id="container_navInferior">
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
							<a class="nav-link" id="links" href="clientes.php"><i class="fa fa-book"></i> Clientes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="links" href="Carros.php"><i class="fa fa-automobile"></i>
								Veiculos</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" id="links" href="marcarSaida.php"><i class="fa fa-book"></i>Sparque</a>
						</li>


						<li class="nav-item dropdown" id="dadosUser">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdown" href="#"
								role="button">Menu</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Definições</a>
								<a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Trocar senha</a>
								<a class="dropdown-item" href="#" onclick="sair()"><i class="fa fa-power-off"> </i>
									Sair</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>

	</br></br></br>
	<h4 class="text-center mx-auto " style="font-size:58px; text-transform:uppercase;">Escaneie o QrCode aqui </h4>
	<div class="container mx-auto mt-5  w-25 h-25 ">
		<video class="container  mx-auto  border" id="qrReader">
		</video>
	</div>

	<div class="container" id="resultados">

	</div>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/js/leitorQrCode.js"></script>
	<script src="../assets/js/sair.js"></script>

</body>

</html>

<DOCTYPE html>

 <html>
     <head>
	    <title>Clientes</title>
		<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../assets/css/estiloCarro.css"/>
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"/>
		  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"/>
		  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet"/>
	 </head>
	 
	<body>
		 <?php
                 include "../Controler/controlSessao.php";
		 ?>	
		          <div	>	
							<div class="container-fluid" id="container_navSuperior">
						 
							</div>
					<div class="container-fluid col-sm-4"  id="container_navInferior">
									<nav class="navbar navbar-expand-lg navbar-light" id="nav_inferior">
									<a class="navbar-brand" href="../index.php" id="link-home"><i class="fa fa-home" id="figurinha_home"></i> Gestor de Estacionamento</a>
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
									</button>
									<div class="collapse navbar-collapse" id="navbarNav">
									<ul class="navbar-nav" >
										<li class="nav-item">
											<a class="nav-link" id="links" href="clientes.php"><i class="fa fa-book"></i> Clientes</a>
									   </li>
									   <li class="nav-item">
											<a class="nav-link" id="links" href="#"><i class="fa fa-automobile"></i> Veiculos</a>
										</li>
										
										<li class="nav-item">
											<a class="nav-link" id="links" href="marcarSaida.php"><i class="fa fa-book"></i>Sparque</a>
										</li>
										  
										  
											<li class="nav-item dropdown" id="dadosUser">
											<a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdown" href="#" role="button"><i class="fa fa-user-circle" aria-hidden="true"></i> Virgilio Mulungo</a>
											<div class="dropdown-menu" id="menuDrop">
												<a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Definições</a>
												<a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Trocar senha</a>
												<a class="dropdown-item" href="#" onclick="sair()"><i class="fa fa-power-off"> </i> Sair</a>
											</div>
										 </li>									 
									</ul>
									</div>
								</nav>		   
						</div>
					
					 
					 <div class="container-fluid col-sm-6" id="listaCarros">
					        <div  id="contentBotao">
                                 	<button type = "submit" class="btn btn-primary" id="addNewCarBtn" data-toggle="modal" data-target="#novoCarro"> Novo Carro </button>		   
						    </div>
							
							<div  id="listaCar">
									<table class="table table-borderless" id="listaCompleta">
											  <thead id="topoLista">
												<tr>
												  <th scope="col">#</th>
												  <th scope="col">Marca</th>
												  <th scope="col">Modelo</th>
												  <th scope="col">Cor</th>
												  <th scope="col">Matrícula</th>
												  <th scope="col">Categoria</th>
												  <th scope="col">Acçao</th>
												  <th scope="col">Acçao1</th>
												  <th scope="col">Mais Informações</th>
												</tr>
											  </thead>
											  <tbody id="CorpoApresentacao">
												
											  </tbody>
											</table>								 

								 </div>

		      </div>
			
		<script src="../assets/jquery/jquery.min.js"></script>
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="../assets/js/sair.js"></script>
	</body>
 </html><Doctype html>
	
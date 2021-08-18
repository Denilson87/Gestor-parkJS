 <DOCTYPE>

 <html>
    <head>
       <title>Gestor do parque de estacionamento</title>
	   <meta charset="utf-8"/>
	   <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css"/>
	   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	   <link rel="stylesheet" type="text/css" href="assets/css/styleIndex.css"/>
	   <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"/>
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	   <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet"/>
	   <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet"/>
	   <meta http-equiv="Cache-control" content="no-cache"/>
	</head>
    <body>        
	     <?php
		     include "Controler/controlSessao.php";
			 include "Controler/estatisticas.php";
		 ?>
        <div id="toda_pagina">
		        <div id="container_nav">
			            <div id="container_navSuperior">
					 
					    </div>
			            <div id="container_navInferior">
						   <nav class="navbar navbar-expand-lg navbar-light" id="nav_inferior">
								<a class="navbar-brand" href="#" id="link-home"><i class="fa fa-home" id="figurinha_home"></i> Gestor de Estacionamento</a>
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarNav">
								<ul class="navbar-nav" >
								    <li class="nav-item">
								    	<a class="nav-link" id="links" href="paginas/clientes.php"><i class="fa fa-book"></i> Clientes</a>
								   </li>
								   <li class="nav-item">
									    <a class="nav-link" id="links" href="paginas/Carros.php"><i class="fa fa-automobile"></i> Veiculos</a>
								    </li>
								    <li class="nav-item">
									    <a class="nav-link" id="links" href="#"><i class="fa fa-book"></i> Funcionarios</a>
								    </li>
									
									<li class="nav-item">
									    <a class="nav-link" id="links" href="paginas/marcarSaida.php"><i class="fa fa-book"></i>S.parque</a>
								    </li>
					                  
					                  
									 <li class="nav-item dropdown" id="dadosUser">
											<a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdown" href="#" role="button"><?php echo $_SESSION['username'] ?></a>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Definições</a>
											<a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Trocar senha</a>
											<a class="dropdown-item" href="#" onclick="sair()"><i class="fa fa-power-off"> </i> Sair</a>
										</div>
									 </li>									 
								</ul>
							  </div>
							</nav>		   
					</div>
					
					    <div class="container" id="conteudo" onclick="bazar()">
					        <div class="container" id="pesquisa_rapida">
							     <input type="search" class="form-control"  id="form-pesquisa" placeholder="Buscar dados pela matricula do carro"/>
								 <i class ="fa fa-search" id="figurinha_pesquisa"></i> 
							</div>
							<div class="container" id="respostas">
							      <br/><p id="detalhe"></p>	  				    
							</div>
							
							<div class="container" id="estatisticas">
							   <div class="container" id="entrada">
							     <h2 class="dadaosEst"><?php echo $numeroCarrosH['carrosHoje']; ?></Strong></h2>
								  <p class="textosAbaixo">Entrada(s) hoje</p>
							   </div>
							   <div class="container" id="saida">
							      <h2 class="dadaosEst"><?php echo $saida['saidas'];?></h2>
								  <p class="textosAbaixo">Saida(s) hoje</p>
							   </div>
							   <div class="container" id="total">
							     <h2 class="dadaosEst"><?php echo $valorDiario;?></h2>
								 <p class="textosAbaixo">Dinheiro pago hoje</p>
							   </div>
							   <div class="container" id="ActivoParque">
							     <h2 class="dadaosEst"><?php echo $carrosPark['carrosPark'];?></h2>
								 <p class="textosAbaixo">Carro(s) no Parque
							   </div>
							</div>
				</div>
			</div>
		</div>
  
	<script src="assets/jquery/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/funcoes.js"></script>
	<script src="assets/js/sair.js"></script>
  </body>
</html>


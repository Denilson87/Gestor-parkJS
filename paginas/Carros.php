
<DOCTYPE html>

 <html>
     <head>
	    <title>Carros</title>
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
					<div class="container-fluid"  id="container_navInferior">
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
											<a class="nav-link" id="links" href="Carros.php"><i class="fa fa-automobile"></i> Veiculos</a>
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
					
					 
					 <div class="container-fluid" id="listaCarros">
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
								  <div class="container" id="paginas">
							           	<nav aria-label="Page navigation example">
  											<ul class="pagination">

  											</ul>
  										</nav>
							           </div>
								</div>
								 

								<!-- Modal de registo de novos carros -->
					              <div class="modal fade" id="novoCarro">
                                    <div class="modal-dialog modal-lg">
									     <div class="modal-content">
										 	 <div class="modal-header" id="tituloDiv">
                                                   <h4 id="tituloModal"><i class="fa fa-car fa"></i>Novo Carro</h4>
                                               </div>
														<div class="modal-body" id="corpoModal">
														<form id="formulario">
														<div class="row">
														    <div class="col" id="marca_cont">
															   <input type="text" class="form-control" placeholder="Marca" id="marca">
															   <i id="erroMarca"></i>
															</div>
															<div class="col" id="modelo_cont">
															    <input type="text" class="form-control" placeholder="Modelo" id="modelo">
															    <i id="erroModelo"></i>
															</div>
														</div><br/>

															 <div class="container" id="matricula_cont">
															 <i id="subtitle">Matricula :</i>
															     <input type="text" class="form-control" placeholder="Ex: Axxyyyzz" id="matricula">
															      <i id="erroMatricula"></i>
															 </div><br/>
															 
															 <div class="container" id="cor_cont">
															 	<i id="subtitle">Cor :</i>
															 	<input type="text" class="form-control" placeholder="Ex: verde" id="cor">
															 	 <i id="erroCor"></i>
															</div><br/>

															<div class="row">
															<div class="col" id="numeroTel">
															     <input type="text" class="form-control" placeholder="Numero de telemovel" id="telefone"/>
															      <i id="erroTelefone"></i>
															 </div>
															 <div class="col" id="categoria_cont">
															 <select id="categoria">
																<option selected>Escolha a categoria</option>
															</select>
															 <i id="erroCategoria1"></i>
															</div>
														</div><br/>
														    
															<div class="container" id="botaoAdd_cont1">
                                                                 <button type="submit" class="btn btn-primary" id="botaoAdd">Adicionar</button>
                                                                  <p id="respostaSucesso"></p>
															</div>
														</form>
														</div>

														<div class="modal-footer">
														<button type="button"  class="btn btn-secondary" data-dismiss="modal">Fechar</button>
														</div>
												</div>
											 </div>
										 </div>
									</div>
								  </div>


								<!--Modal de confirmacao de exclusao-->
								  <div class="modal fade" id="apagar">
                                    <div class="modal-dialog modal-sm">
									     <div class="modal-content">
										 	 <div class="modal-header" style="background-color: #e6001a; heigth:15px">
                                                   <i class="fa fa-trash"></i>
                                               </div>
														<div class="modal-body">
															 <p>Deseja apagar esta informação 
														</div>


														<div class="modal-footer">
														<button type="button"  class="btn btn-danger" data-dismiss="modal">Não</button>
														<button type="submit" class="btn btn-success" id="sim" value="Sim">Sim</button>
														</div>														   
												</div>
											 </div>
										 </div>
									</div>
								  </div>


								<!--Modal de confirmacao de exclusao-->
								  <div class="modal fade" id="mensagem">
                                    <div class="modal-dialog modal-sm">
									     <div class="modal-content">
										 	 <div class="modal-header" style="background-color: #009933; heigth:15px">
                                                   <i class="fa fa-trash"></i>
                                               </div>
														<div class="modal-body">
															 <p>Informação  apagada com sucesso</p>
														</div>												   
												</div>
											 </div>
										 </div>
									</div>
								  </div>

								<!-- modal para editar informacoes do veiculo-->
								<div class="modal fade" id="editarCarro">
                                    <div class="modal-dialog modal-lg">
									     <div class="modal-content">
										 	 <div class="modal-header"  style="background-color:#f2610d">
                                                   <h4 id="tituloModal"><i class="fa fa-pencil-square-o"></i>Editar Carro</h4>
                                               </div>
														<div class="modal-body">
														<form id="formulario">
														<div class="row">
														    <div class="col">
															   <input type="text" class="form-control"  id="marca1">
															   <i id="erroMarca1"></i>
															</div>
															<div class="col">
															    <input type="text" class="form-control"  id="modelo1">
															    <i id="erroModelo1"></i>
															</div>
														</div><br/>

															 <div class="container" id="matricula_cont1">
															 <i id="subtitle">Matricula :</i>
															     <input type="text" class="form-control"  id="matricula1">
															      <i id="erroMatricula1"></i>
															 </div><br/>
															 
															 <div class="container" id="cor_cont1">
															 	<i id="subtitle">Cor :</i>
															 	<input type="text" class="form-control"  id="cor1">
															 	 <i id="erroCor1"></i>
															</div><br/>

															<div class="row">
															<div class="col" id="numeroTel1">
															     <input type="text" class="form-control" placeholder="Numero de telemovel" id="telefone1"/>
															      <i id="erroTelefone1"></i>
															 </div>
															 <div class="col" id="categoria_cont1">
															 <select id="categoria1">
																<option selected>Escolha a categoria</option>
															</select>
															 <i id="erroCategoria1"></i>
															</div>
														</div><br/>
															<div class="container" id="botaoAdd_cont1">
                                                                 <button type="submit" class="btn btn-warning" id="botaoEditar">Editar</button>
                                                                 <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                  <p id="respostaSucesso1"></p>	  
															</div>
														</form>
														</div>

												</div>
											 </div>
										 </div>
									</div>
								  </div>

		      </div>
			
		<script src="../assets/jquery/jquery.min.js"></script>
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="../assets/js/RegistoCarro.js"></script>
		<script src="../assets/js/sair.js"></script>
	</body>
 </html>
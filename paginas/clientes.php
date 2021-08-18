
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
		  <link rel="stylesheet" type="text/css" href="../assets/css/cliente.css"/>
		  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet"/>
		  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet"/>
	 </head>
	<body>
		 <?php
                 include "../Controler/controlSessao.php";
		 ?>	
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
											<a class="nav-link" id="links" href="marcarSaida.php"><i class="far fa-abacus"></i> S.parque</a>
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

						<div class="container" id="containerBotao">
							<button type="submit" class="btn btn-success" id="btnCliente" data-toggle="modal" data-target="#registoCliente">Novo cliente</button>
						</div>

					   
                       		 <div class="container" id="containerFormPesquisa">
								<input type="text" class="form-control" placeholder="Pesquisa por nome ou contacto" id="dadoPesquisa"/>
								<i class="fa fa-exclamation-triangle" id="exclamacaoErro"></i>
							</div>
							<div class="container" id="btnProcurarCont">
						 		<button type="text" class="btn btn-secondary" id="btnProcura"><i class="fa fa-search"></i> Procurar</button>
							</div>

							<div class="container" id="lista_cliente"><br/>
											<table class="table table-borderless" id="custumerList">
											  <thead>
												<tr>
												  <th scope="col">#</th>
												  <th scope="col">Nome</th>
												  <th scope="col">N° tel</th>
												  <th scope="col">N° Alternativo</th>
												  <th scope="col">Bairro</th>
												  <th scope="col">Avenida</th>
												  <th scope="col">N° casa</th>
												  <th scope="col">Registado por</th>
												  <th scope="col">acçao1</th>
												  <th scope="col">acçao2</th>
												</tr>
											  </thead>
											  <tbody id="listaCliente">	
											  </tbody>
											</table>
							</div>

							 <nav aria-label="Page navigation example" id="pagination">
								  <ul class="pagination">
								  </ul>
							</nav>

							 <div class="modal fade" id="registoCliente" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
								  <div class="modal-dialog  modal-lg">
								    <div class="modal-content">
								      <div class="modal-header">
								       <h5 class="modal-title" id="TituloModalCentralizado"><i class='fas fa-user-edit'></i> Adição do novo cliente</h5></center>
								
								      </div>
								      <div class="modal-body" id="modalCustumerModal">
								      	<form id="formulario">
											  <div class="form-row">
											    <div class="col">
											    	<label class="subtitulos">Nome completo :</label>
											      <input type="text" class="form-control" placeholder="Nome Completo" id="nome"/>
											      <i class="erros" id="erroNome"></i>
											    </div>
											    <div class="col">
											    	<label class="subtitulos">Numero casa :</label>
											      <input type="number" class="form-control" id="nCasa" placeholder="N⁰ Casa"/>
											      <i class="erros" id="erroNumCasa"></i>
											    </div>
											  </div>

											  <div class="form-row">
											    <div class="col">
											    	<label class="subtitulos">Bairro :</label>
											      <input type="text" class="form-control" id="bairro" placeholder="Bairro"/>
											      <i class="erros" id="erroBairro"></i>
											    </div>
											    <div class="col">
											    	<label class="subtitulos">Avenida :</label>
											      <input type="text" class="form-control" id="avenida" placeholder="Avenida"/>
											      <i class="erros" id="erroAvenida"></i>
											    </div>
											  </div>

											  <div class="form-row">
											    <div class="col">
											    	<label class="subtitulos">Numero Tel :</label>
											      <input type="number" class="form-control" id="numTel" placeholder="Numero telemovel"/>
											     <i class="erros" id="erroNumTel"></i>
											    </div>
											    <div class="col">
											    	<label class="subtitulos">Numero Alternativo :</label>
											      <input type="number" class="form-control" id="numAlternativo" placeholder="N⁰ Alternativo"/>
											      <i class="erros" id="erroNumAlternativo"></i>
											    </div>
											  </div>
											  <div class="col">
											    <label class="subtitulos">Funcionario registador:</label>
											      <input type="text" class="form-control" id="funcionario" value="<?php echo $_SESSION['username']; ?>" readonly>
											    </div><br/>

		                                         <div class="container" id="botoes">
											      	<button type="button" class="btn btn-danger" data-dismiss="modal" id="registarCliente">Cancelar</button>
											        <button type="submit" class="btn btn-success">Registar</button>
											        <i id="acerto"></i>
										    	</div>
											</form>
								      </div>
								    </div>
								  </div>
								</div>


 		                  <!--modal delete -->

 		                  <div class="modal fade" id="apagarCliente" tabindex="-1" role="dialog" aria-hidden="true">
								  <div class="modal-dialog  modal-md">
								    <div class="modal-content">
								      <div class="modal-header">
								          <h5 class="modal-title" ><i class='fas fa-trash'></i> Deseja apagar este registo</h5></center>
								         </div>
								     		 <div class="modal-body" id="modalCustumerModal">
								      	    		 <p style="color:red; font-size:16px;">A exclusão deste cliente pode implicar a <b>exclusão do(s) seu(s) carro(s)</b>, na lista de carros...<Strong>Deseja Mesmo excluir este cliente</strong></p>
					                            	<div class="container" id="botoes">
											      		<button type="button" class="btn btn-danger" data-dismiss="modal" id="registarCliente">Não</button>
											      	  <button type="submit" class="btn btn-success" id="apagar">Sim</button>
											        	<i id="acerto"></i>
										    		</div>
								     		 </div>
								    	</div>
								  </div>
								</div>



 					<!-- Modal que vai dar conta da informacao do cliente-->
 					     
 			        <div class="modal fade" id="sucesso" tabindex="-1" role="dialog" aria-hidden="true">
								  <div class="modal-dialog  modal-md">
								    <div class="modal-content">
								      <div class="modal-header">
								       <h5 class="modal-title" style="color:green;" ><i class="fa fa-check-square"></i>Apagado com sucesso</h5></center>
								      </div>
								      <div class="modal-body" id="modalCustumerModal">
								      	     <p style="color:white; font-size:16px;">Cliente e carro(s) associados ao mesmo apagados</p>
					                      </div>  
								      </div>
								    </div>
								  </div>

								  <div class="modal fade" id="errorApgar" tabindex="-1" role="dialog">
								  <div class="modal-dialog  modal-md">
								    <div class="modal-content">
								      <div class="modal-header">
								       <h5 class="modal-title" style="color:red;" ><i class="fa fa-window-close"></i> Apagado com sucesso</h5></center>
								      </div>
								      <div class="modal-body" id="modalCustumerModal">
								      	     <p style="color:red; font-size:16px;">Ocorreu algum erro</p>
					                      </div>  
								      </div>
								    </div>
								  </div>


								  <!-- Modal para editar os dados -->

								 <div class="modal fade" id="custumerEdit" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
								  <div class="modal-dialog  modal-lg">
								    <div class="modal-content">
								      <div class="modal-header">
								       <h5 class="modal-title" style="color:#FFC107"><i class="fa fa-exclamation-triangle"></i> Editar dados do cliente</h5></center>
			
								      </div>
								      <div class="modal-body" id="modalCustumerModalEdit">
								      	<form id="formularioEdit">
											  <div class="form-row">
											    <div class="col">
											    	<label class="subtitulosEdit">Nome completo :</label>
											      <input type="text" class="form-control" placeholder="Nome Completo" id="nomeEdit"/>
											      <i class="errosEdit" id="erroNomeEdit"></i>
											    </div>
											    <div class="col">
											    	<label class="subtitulosEdit">Numero casa :</label>
											      <input type="number" class="form-control" id="nCasaEdit" placeholder="N⁰ Casa"/>
											      <i class="errosEdit" id="erroNumCasaEdit"></i>
											    </div>
											  </div>

											  <div class="form-row">
											    <div class="col">
											    	<label class="subtitulosEdit">Bairro :</label>
											      <input type="text" class="form-control" id="bairroEdit" placeholder="Bairro"/>
											      <i class="errosEdit" id="erroBairroEdit"></i>
											    </div>
											    <div class="col">
											    	<label class="subtitulosEdit">Avenida :</label>
											      <input type="text" class="form-control" id="avenidaEdit" placeholder="Avenida"/>
											      <i class="errosEdit" id="erroAvenidaEdit"></i>
											    </div>
											  </div>

											  <div class="form-row">
											    <div class="col">
											    	<label class="subtitulosEdit">Numero Tel :</label>
											      <input type="number" class="form-control" id="numTelEdit" placeholder="Numero telemovel"/>
											     <i class="errosEdit" id="erroNumTelEdit"></i>
											    </div>
											    <div class="col">
											    	<label class="subtitulosEdit">Numero Alternativo :</label>
											      <input type="number" class="form-control" id="numAlternativoEdit" placeholder="N⁰ Alternativo"/>
											      <i class="errosEdit" id="erroNumAlternativoEdit"></i>
											    </div>
											  </div>
											  <div class="col">
											    <label class="subtitulosEdit">Funcionario registador:</label>
											      <input type="text" class="form-control" id="funcionarioEdit" value="<?php echo $_SESSION['username'];?>" readonly>
											    </div><br/>

		                                         <div class="container" id="botoes">
											      	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
											        <button type="submit" class="btn btn-warning">Editar</button>
											        <i id="acertoEdit"></i>
										    	</div>
											</form>
								      </div>
								    </div>
								  </div>
								</div>

								<!-- Modal de actualizacao do sucesso -->
			 			        <div class="modal fade" id="sucessoUpdate" tabindex="-1" role="dialog" aria-hidden="true">
								  <div class="modal-dialog  modal-md">
								    <div class="modal-content">
								      <div class="modal-header">
								       <h5 class="modal-title" style="color:green;" ><i class="fa fa-check-square"></i>Dados actualizados com sucesso</h5></center>
								      </div>
								      <div class="modal-body" id="modalCustumerModal">
								      	     <p style="color:white; font-size:16px;">Dados do cliente Actualizados com sucesso</p>
					                      </div>  
								      </div>
								    </div>
								  </div>
                          
                          <!-- modal do erro na actualizacao-->
                          		  <div class="modal fade" id="errorActualizar" tabindex="-1" role="dialog">
								  <div class="modal-dialog  modal-md">
								    <div class="modal-content">
								      <div class="modal-header">
								       <h5 class="modal-title" style="color:red;" ><i class="fa fa-window-close"></i>Erro inesperado/h5></center>
								      </div>
								      <div class="modal-body" id="modalCustumerModal">
								      	     <p style="color:red; font-size:16px;">Ocorreu algum erro inesperado! Por favor volte a tentar esta operacao</p>
					                      </div>  
								      </div>
								    </div>
								  </div>

  

 					   </div>
														
		<script src="../assets/jquery/jquery.min.js"></script>
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<script src="../assets/js/sair.js"></script>
		<script src="../assets/js/cliente.js"></script>
	</body>
 </html>
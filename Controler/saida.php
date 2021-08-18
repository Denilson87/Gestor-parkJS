<?php
     include_once "conexao.php";
      if(isset($_POST['id_entrada'])){
		        // verificar se o carro ainda esta no parque
	        $id_entrada = $_POST['id_entrada'];
			$estaNoParque = mysqli_query($con," select saiu from saida where id_entrada='$id_entrada'");
			$saiu = mysqli_fetch_array($estaNoParque);
			 
			   if($saiu['saiu']=="sim"){
				   echo "Este carro ja saiu do nosso parque";
				   exit();
			   }
			
			//verificar se o carro chegou a entrar no parque
		    $busca_dados = mysqli_query($con,"select *from entrada where id_entrada='$id_entrada'");
			$dados = mysqli_fetch_array($busca_dados);
			if($dados['entrou']=="0"){
				echo "Este carro nao foi autorizado a entrar";
				
			}elseif($dados['entrou']=="1"){
				 $idCarro = $dados['id_carro'];
				 // busca pelos dados do carro
				 $dadosCarro = mysqli_query($con,"select marca, modelo, id_categoria from carro where id_carro='$idCarro'");
				 $carro = mysqli_fetch_array($dadosCarro);
				 $idCateg = $carro['id_categoria'];
				  
				 //busca pela categoria certa
				 $dadosCategoria = mysqli_query($con,"select preco,categoria from categoria where id_categoria ='$idCateg'");
				 $categoria = mysqli_fetch_array($dadosCategoria);
			
				  // cliente
				  $custemar_name; 				  
				  $idCliente = $dados['id_cliente'];
				  $dadoCliente = mysqli_query($con,"select  nome_cliente from cliente where id_cliente ='$idCliente'");
				  $nomeCliente = mysqli_fetch_array($dadoCliente);
		  
				     //verificacao de quem entrou com o carro ao parque
					  if(strlen($dados['nome_donoOcasional'])== 0){
						  $nome_cliente = $nomeCliente['nome_cliente'];
					   }else{
						  $nome_cliente = $dados['nome_donoOcasional'];
					   }
                    				  
				 echo $dados['id_carro']."|".$dados['id_cliente']."|".$dados['matricula']."|".$dados['email']."|".$dados['hora_entrada']."|".$dados['id_carro']."|".$carro['marca']."|".$carro['modelo']."|".$categoria['preco']."|".$categoria['categoria']."|".$nome_cliente;
			}
	  }else{
		echo "erro";
	  }
?>



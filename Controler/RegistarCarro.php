<?php
     include_once "conexao.php";


     if (isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['matricula']) && isset($_POST['cor']) && isset($_POST['telemovel']) && isset($_POST['categoria'])) {
     	      $marca = $_POST['marca'];
     	      $modelo = $_POST['modelo'];
     	      $matricula = $_POST['matricula'];
     	      $telemovel = $_POST['telemovel'];
     	      $categoria = $_POST['categoria'];
     	      $cor = $_POST['cor'];
     	            
     	      // busca pelo ID do cliente ;
     	      $sqlId = "select id_cliente from cliente where numeTel='$telemovel'";
     	      $pesquisaId = mysqli_query($con,$sqlId);
     	      $dadoId = mysqli_fetch_array($pesquisaId);
     	      $id_cliente = $dadoId['id_cliente'];

     	      //busca por categoria
     	       $pesquisaCategoria = mysqli_query($con,"select id_categoria from categoria where categoria='$categoria'");
     	       $dadoCat = mysqli_fetch_array($pesquisaCategoria);
     	       $id_categoria = $dadoCat['id_categoria'];
     	       
                //verificar a existencia de um carro com a mesma matricula
                 $sqlMatricula = "select matricula from carro where matricula ='$matricula'";
                 $pesquisaMatricula = mysqli_query($con, $sqlMatricula);
                 $ocorrenciasMat = mysqli_num_rows($pesquisaMatricula);
                    if($ocorrenciasMat != 0){
                         echo "Ja existe";
                         exit();
                    }
     	       
     	      if(strlen($id_cliente)==0){
     	      	echo "Nao existe nenhum cliente com este contacto";
     	      	exit();
     	      }else{
     	          $sqlRegisto = "insert into carro(matricula, marca, modelo, cor, id_cliente, id_categoria)
                    values('$matricula','$marca','$modelo','$cor','$id_cliente','$id_categoria')";

                    if(mysqli_query($con,$sqlRegisto)){
                         echo "Sucesso";
                    }else{
                         echo "Falha no registo";
                    }


     	      }
              
     }else{
     	echo "erro desconhecido! volte a tentar";
     	exit();
     }

               
?>
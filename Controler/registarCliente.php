<?php
     include 'conexao.php';
      if (isset($_POST['nome']) && isset($_POST['nCasa']) && isset($_POST['bairro']) && isset($_POST['avenida']) && isset($_POST['numTel']) && isset($_POST['numAlternativo']) && isset($_POST['funcionario'])){
      	   
      	     $numTel = $_POST['numTel'];

      	     // verificacao do contacto//
      	      $sqlContacto = "select numeTel from cliente where numeTel='$numTel'";
      	      $verificaoCont = mysqli_query($con,$sqlContacto);
      	      $existe = mysqli_num_rows($verificaoCont);
      	          if ($existe>0) {
      	          	echo "O contacto ja foi antes registado a nossa base de dados";
      	          	exit();
      	          }
      	          $nome = $_POST['nome'];
      	          $numCasa = $_POST['nCasa'];
      	          $bairro = $_POST['bairro'];
      	          $avenida = $_POST['avenida'];
      	          $numTel = $_POST['numTel'];
      	          $numeroAlternativo = $_POST['numAlternativo'];
      	          $funcionario = $_POST['funcionario'];
      	          // pegar o username e obter o id em seguida obter o valor de id de login e dai o id do user;

                       //pegar id do cliente....
                        $queryUser = mysqli_query($con,"select user.id_user as id from login, user where login.username='$funcionario'");
                        $id_user = mysqli_fetch_array($queryUser);
                        $id_user = $id_user['id'];
                        
               // verificar o id do user funcionario 
      	        $funcionario = $id_user;;
      	         
      	        // sql para registar o cliente 
      	        $sqlRegistar = "insert into cliente(nome_cliente, numeTel, numeroAlternativo, bairro, avenida, numeroCasa, regId_user)
      	         values('$nome','$numTel','$numeroAlternativo','$bairro','$avenida','$numCasa','$funcionario')";

      	         if(mysqli_query($con,$sqlRegistar)){
      	         	 echo "Sucesso";
      	         }else{
      	         	echo "Falha ao registar";
      	         	exit();
      	         }

      }else{
        echo "Erro inesperado";
      }
?>
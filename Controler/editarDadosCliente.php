

 <?php
       include 'conexao.php';
    
        if (isset($_POST['id_cliente']) && isset($_POST['nome']) && isset($_POST['numCasa']) && isset($_POST['avenida'])
        	 && isset($_POST['numTel']) && isset($_POST['numAlternativo']) && isset($_POST['bairro'])) {
               	
               	$id_cliente = $_POST['id_cliente'];
                $nome = $_POST['nome'];
                $numCasa = $_POST['numCasa'];
                $avenida = $_POST['avenida'];
                $bairro = $_POST['bairro'];
                $numTel  = $_POST['numTel'];
                $numAlternativo = $_POST['numAlternativo'];

                  // verificacao do contacto
                    $queryVerificar = mysqli_query($con,"select id_cliente from cliente where numeTel='$numTel'");
                    $ocorrencias = mysqli_num_rows($queryVerificar);
                         
                      if ($ocorrencias<1) {
                      	  echo "contacto nao registado";
                      	  exit();
                      }

               	 $sqlUpdate ="update cliente set nome_cliente ='$nome', numeTel='$numTel', numeroAlternativo='$numAlternativo', bairro='$bairro', 
               	   avenida='$avenida', numeroCasa='$numCasa' where id_cliente='$id_cliente'";

               	  if(mysqli_query($con,$sqlUpdate)){
               	    	 echo "Actualizado com sucesso";
               	  }else{
               	  	 echo "Erro ao actualizar";
               	  }
        }else{
           echo "Erro inesperado";
        }
 ?>


<?php 
         include 'conexao.php';

      if (isset($_POST['id_carro'])&& isset($_POST['marca']) && isset($_POST['cor'])&& isset($_POST['categoria'])&& isset($_POST['matricula']) && isset($_POST['modelo']) && isset($_POST['telefone'])) {
      	    $id_carro = $_POST['id_carro'];
      	    $marca = $_POST['marca'];
      	    $modelo  = $_POST['modelo'];
      	    $matricula = $_POST['matricula'];
      	    $cor = $_POST['cor'];
      	    $categoria = $_POST['categoria'];
      	    $telefone = $_POST['telefone'];

     
      	       //confirmacao do contacto
      	        $numeroTel = mysqli_query($con,"select id_cliente from cliente where numeTel = '$telefone'");
      	        $id_cliente = mysqli_fetch_array($numeroTel);
      	        $id_cliente = $id_cliente['id_cliente'];
      	        $numeroOcorrencias = mysqli_num_rows($numeroTel);

      	         /// Categorias
      	           $pegarCat = mysqli_query($con,"select id_categoria from categoria where categoria = '$categoria'");
      	           $categoria =  mysqli_fetch_array($pegarCat);
      	           $categoria = $categoria['id_categoria'];

      	          if ($numeroOcorrencias<1) {
      	           	 echo "Nenhum cliente com o seguinte contacto";
      	           	 exit();
      	           }else{
      	           	   $sqlUpdate = "update carro set marca ='$marca', modelo='$modelo', matricula='$matricula',cor='$cor', id_categoria='$categoria',
      	           	 id_cliente='$id_cliente' where id_carro ='$id_carro'";

      	           	      if(mysqli_query($con, $sqlUpdate)){
      	           	      	 echo "Actualizado com sucesso";
      	           	      }else{
      	           	      	 echo "Houve um erro ao actualizar";
      	           	      	  exit();
      	           	      }

      	           }
      
      }else{
      	echo " erro inesperado";
      }
?>
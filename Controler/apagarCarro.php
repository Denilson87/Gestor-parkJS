
 <?php 
     include_once("conexao.php");
    	if(isset($_POST['id_carro'])){
    		  $id_carro = $_POST['id_carro'];
    	      $sqlApagar = "delete from carro where id_carro='$id_carro'";
    	      if (mysqli_query($con,$sqlApagar)) {
    	      	echo "sucesso";
    	      }else{
    	      	echo "houve um erro inesperado";
    	      }
    	}else{
    		echo "Ocorreu um problema muito grave ao apagar";
    	}
 ?>


<?php
    include "conexao.php";
	
       if(isset($_POST)){
		    $matricula =$_POST['matricula'];
			$categoria = $_POST['categoria'];
			$valorPago = $_POST['preco'];
			$id_carro = $_POST['id_carro'];
			$id_entrada = $_POST['id_entrada'];
			$data_saida =  Date('Y-m-d H:i:s');
			
			 //primeiro vamos mudar o estado da entrada;
			  if(mysqli_query($con," update entrada set entrou =0 where id_entrada='$id_entrada'")){
				    $sql = "insert into saida(id_entrada,saiu,data_saida,matricula,id_carro,valorPago,categoria)
					values('$id_entrada','sim','$data_saida','$matricula','$id_carro','$valorPago','$categoria')";
					
					if(mysqli_query($con,$sql)){
					   echo "sucesso";
					}else{
						echo "erro desconhecido";
					}
			  }
	   }else{
		   echo "erro inesperado";
	   }
?>
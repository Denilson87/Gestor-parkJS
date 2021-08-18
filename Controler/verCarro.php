<?php
     include("conexao.php");
	     
		 if($_POST['id_carro']){
		     $id = $_POST['id_carro'];
			     $id = intval($id);	
                if(is_int($id)){
					 
					 $sql = "select matricula, id_carro, id_cliente from carro where id_carro ='$id'";
					 $pesquisa = mysqli_query($con,$sql);
					 $infoCarro = mysqli_fetch_array($pesquisa);
					 echo $infoCarro['matricula']."|".$infoCarro['id_carro']."|".$infoCarro['id_cliente'];
				}else{
					echo "Este valor nao e valido! volte a tentar";
				}
		 }else{
			 echo "Houve um erro inesperado";
		 }
?>
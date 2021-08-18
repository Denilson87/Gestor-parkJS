     
<?php
   include_once "conexao.php";
   if(isset($_POST['matricula'])){   
		$matricula = $_POST['matricula'];
	    $matricula = strtoupper($matricula);
                $dadosAtransferir =array();
        $sql = "select id_carro, marca, matricula from carro where matricula like '%$matricula%' or marca like '%$matricula%'";         
			 if(mysqli_query($con,$sql)){
						$pesquisa = mysqli_query($con,$sql);
					    while($dadosCarro = mysqli_fetch_array($pesquisa)){
							echo $dadosCarro['id_carro']." ".$dadosCarro['matricula']." ".$dadosCarro['marca']."|";
						}
							 
			 }else{ 
				    echo "Aconteceu algum erro inesperado";
			 }
			    
				
   }else{
	    echo "Nao ha ndada";
   }
?>	 
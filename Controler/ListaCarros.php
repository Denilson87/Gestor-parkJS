<?php
         include_once("conexao.php");
 		   
 		   //condicao de verificacao de get
 		   $pagina = (isset($_GET['pagina'])) ? $_GET['pagina']:1;
           
           //busca pelo total de carros 
    	   $sqlTotalCarro = "select id_carro as totalCarro from carro";
    	   $dadoCar = mysqli_query($con,$sqlTotalCarro);
    	   $totalCarros = mysqli_num_rows($dadoCar);
            
            // dita o limite de registos por pagina 
    	    $carroPorPagina = 8;

    	    //numero de paginas que terei
    	    $numeroCarrosPorPag = ceil($totalCarros/$carroPorPagina);

    	    //variavel inicio ditara de onde irao comecar a exibicao de registos 
 			$inicio = ($carroPorPagina*$pagina)-$carroPorPagina;

 			 //dados ja limitados
             $carList=array();
 			 $sqlCarrosLim = "select *from carro limit $inicio,$carroPorPagina";
 			 $dados1 = mysqli_query($con,$sqlCarrosLim);
 			 while($carro=mysqli_fetch_array($dados1)){
 			  // $carList = array($carros['id_carro'],$carros['marca'], $carros['modelo'],$carros['cor'],$carros['matricula'],$carros['id_categoria'],$carros['cor']);
               array_push($carList, $carro);
            }
             echo  json_encode(($carList))."?$totalCarros";


?>
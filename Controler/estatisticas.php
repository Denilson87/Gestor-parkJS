<?php
   
    include "conexao.php";
	    
		 ///buscar o numero de carros no parque de estacionamento
		 $sqlNumeroCarros = "select count(*) as carrosPark from entrada where entrou ='1'";
		 $pesquisaCarro = mysqli_query($con,$sqlNumeroCarros);
		 $carrosPark = mysqli_fetch_array($pesquisaCarro);
		 
		 // busca por entradas ao nosso parque por data;
	    	 $dataActual = Date('Y-m-d');
			 $dataUmDiaAvanco =  explode("-",$dataActual);
			 $data = $dataActual; 
			 $outraData = date('Y/m/d', strtotime("+2 days",strtotime($data)));
			 $sqlCarrosH = "select count(id_entrada) as carrosHoje from entrada where hora_entrada between '$dataActual' and '$outraData'";
   			 $contarCarroHj = mysqli_query($con,$sqlCarrosH);
			 $numeroCarrosH = mysqli_fetch_array($contarCarroHj);
		
		//busca por saidas em um dia
		   $sqlSaida = "select count(id_saida) as saidas from saida where data_saida between '$dataActual' and '$outraData'";
		   $numeroSaidaD = mysqli_query($con,$sqlSaida);
		   $saida = mysqli_fetch_array($numeroSaidaD);
		  // echo $saida['saidas'];
		
		
		 //total pago hoje
		  $valorDiario=0;
		 $sqlPag = "select valorPago from saida where data_saida between '$dataActual' and '$outraData'";
		 $pag = mysqli_query($con,$sqlPag);
		   while($total = mysqli_fetch_array($pag)){
			   $valorDiario += $total['valorPago'];
		   }
		   $valorDiario;
		  
		 
 ?> 
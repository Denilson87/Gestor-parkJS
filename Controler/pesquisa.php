<?php
   include 'conexao.php';

      if (isset($_POST['parametro'])){

      	      $parametro = $_POST['parametro'];
      	      $sqlPesquisa =" select cliente.*, login.username as username from cliente,login where nome_cliente like '$parametro%' or numeTel like '$parametro%'";
      	      $queryPesquisa = mysqli_query($con,$sqlPesquisa);
      	      	$dados = array();

      	        while ($ln = mysqli_fetch_array($queryPesquisa)){
      	              array_push($dados,$ln);	
      	        }

                 echo json_encode($dados);
      	        

      }else{
      	  echo "erro inesperado";
      }
?>
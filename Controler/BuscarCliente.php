

<?php
   include 'conexao.php';
       
       $pagina = (isset($_GET['pagina'])) ? $_GET['pagina']:1;
        
       $sqlBusca = "select *from cliente";
       $queryTotal = mysqli_query($con,$sqlBusca);
       $total = mysqli_num_rows($queryTotal);
       $total;

       $clientesPorPagina = 8;
        $inicio =($clientesPorPagina*$pagina)-$clientesPorPagina;

        $clientes=array();
         $sqlDados = " select cliente.*, login.username as username from cliente,login order by cliente.nome_cliente desc limit $inicio,$clientesPorPagina";
         $queryDados = mysqli_query($con,$sqlDados);
         while ($dados = mysqli_fetch_array($queryDados)){
         	   array_push(($clientes), $dados);
         }

          $dadosCliente = $clientes;
          echo(json_encode($dadosCliente))."?".$total;


?>
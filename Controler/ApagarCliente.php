
<?php
          include 'conexao.php';

        if(isset($_POST['id_cliente'])){
            
            $id_cliente = $_POST['id_cliente'];

            // Apagar carro//
              $sqlApagar ="delete from carro where id_cliente ='$id_cliente'"; 
              //apagar cliente//
              $sqlApagarCliente ="delete from cliente where id_cliente='$id_cliente'";

               if(mysqli_query($con,$sqlApagar)){

                   if (mysqli_query($con,$sqlApagarCliente)){
                   	  echo "Cliente apagado com sucesso";
                   }else{
                   	 echo "erro ao apagar cliente";
                   }

               }else{

               	echo "erro apagar os carros do cliente";
               }

        }else{
        	echo "erro inesperado";
        }
?>
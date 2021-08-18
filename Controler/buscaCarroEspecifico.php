  <?php
    include 'conexao.php';

        if (isset($_POST['id_carro'])){
        	 $id_carro =  $_POST['id_carro'];
             
             $sql = "select * from carro where id_carro = '$id_carro' ";
             $selectCar = mysqli_query($con,$sql);
              $dados=array();
               $car = mysqli_fetch_array($selectCar);
             
                $idCliente = $car['id_cliente'];
                $idCategoria = $car['id_categoria'];
                 array_push(($dados), $car);

                $buscarCat = mysqli_query($con,"select categoria from categoria where id_categoria ='$idCategoria'");
                 $categoria =  mysqli_fetch_array($buscarCat);
                  $categoria['categoria'];
                    array_push($dados, $categoria);

                $buscarCliente = mysqli_query($con,"select numeTel from cliente where id_cliente ='$idCliente'");
                $cliente =  mysqli_fetch_array($buscarCliente);
                  array_push($dados, $cliente);

                  echo  json_encode($dados);
        }else{
    		echo "Erro inesperado";
        }
?>
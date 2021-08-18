
<?php
   include 'conexao.php';

    if (isset($_POST['id_cliente'])){
             $id_cliente = $_POST['id_cliente'];
                $sqlBusca = "select *from cliente where id_cliente ='$id_cliente'";
                $query = mysqli_query($con,$sqlBusca);
                $dados = mysqli_fetch_array($query);
                echo json_encode($dados);
    }else{
    	echo "Erro inesperado";
    }
?>
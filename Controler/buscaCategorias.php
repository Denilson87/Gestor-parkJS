<?php
    include_once "conexao.php";
         $sql = "select *from categoria";
         $buscarCat = mysqli_query($con,$sql);
        
        while($cat = mysqli_fetch_array($buscarCat)){
           echo $cat['id_categoria']." ".$cat['preco']." ".$cat['categoria']."|";
        }
        
?>
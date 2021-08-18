
  <?php
        include_once("conexao.php");
		 
			 if(isset($_GET['username'])&& isset($_GET['senha'])){
				$username = $_GET['username'];
				$senha = $_GET['senha'];
				$sql = "select *from login  where username ='$username' and senha='$senha'";
				$pesquisa = mysqli_query($con,$sql);
					    if( mysqli_query($con,$sql)){
					                $numeroCorrespo = mysqli_num_rows($pesquisa);
									       if($numeroCorrespo ==1){
											        $dadosLogin = mysqli_fetch_array($pesquisa);
											        $id_login = $dadosLogin['id_login'];
													$username = $dadosLogin['username'];
											     session_start();
												    $_SESSION['id_login'] = $id_login;
												    $_SESSION['username'] = $username;
											        echo "sucesso";
										   }else{
											    echo "Login Invalido! Verifique as suas crendenciais e volte a tentar";
										   }
									    
						}else{
							echo "há algum erro na busca de dados";
						}
				   
			 }else{
				 echo "erro inesperado";
			 }
  ?>
<?php
 
    include_once "conexao.php";
	include_once'../assets/bibliotecasPhp/phpqrcode/qrlib.php';
	include_once '../assets/bibliotecasPhp/pdf/mpdf.php';
	header('Content-type: application/pdf');
	include_once "../assets/bibliotecasPhp/PHPMailer-master/PHPMailerAutoload.php";

       if($_POST){
		    $id_carro = $_POST['id_carro'];
			$id_cliente =$_POST['id_cliente'];
			$matricula = $_POST['matricula'];
			$outroDono = $_POST['donoAlternativo'];
			$email = $_POST['email'];
			$dataActual = Date('Y-m-d H:i:s');
			$entrou =0;
			   if(strlen($email)<7){
				   echo "problemas com o seu email";
				   exit;
			   }
			       $nome_cliente ;
			      ///Cliente proprietario do carro 
				        $pesquisaDono = mysqli_query($con,"select nome_cliente from cliente where id_cliente ='$id_cliente'");
					    $dadosCliente = mysqli_fetch_array($pesquisaDono);
						 $nomeCl = $dadosCliente['nome_cliente']; 
			   
			$sql = "insert into entrada(id_carro,id_cliente,nome_donoOcasional,matricula,email,hora_entrada, entrou) 
			    values('$id_carro','$id_cliente','$outroDono','$matricula','$email','$dataActual','$entrou')";
					  
					    if(mysqli_query($con,$sql)){
							 echo "Sucesso no registo";
			                      
			 				    // pesquisar pelo ultimo Id
								 $ultimoId = mysqli_insert_id($con);
								 $FicheiroAserCodificado = "info ".$ultimoId;
								 $diretorio ="../qrGerados/";
                                 QRcode::png($FicheiroAserCodificado, $diretorio.$FicheiroAserCodificado.".png",QR_ECLEVEL_M); 
								 
								 // Ultimo qr code criado;
								    $ultimoQrCriado ="../qrGerados/info ".$ultimoId.".png"; 
								        
								// Buscar dados do carro
								   $pesquisaCarro =  mysqli_query($con,"select marca, modelo from carro where id_carro='$id_carro'");
								      $dados = mysqli_fetch_array($pesquisaCarro);
									     $marca = $dados['marca'];
                                         $modelo = $dados['modelo'];			
  
                                // Verificar nome do cliente que esta na base de dados;
								       
										 if($outroDono ==""){
											  $nome_cliente = $nomeCl;
										 }else{
										    $nome_cliente = $outroDono;
										 }
								 // Criar o pdf, e no pdf iremos escrever o nome do cliente e iremos passar o id de entrada
								     $pagina = '
									  <html>
									        
									     <body style="background-color:#bfbfff;">
												<h1 style="margin-left:20%; font-family:cursive; opacity:0.9"; margin-top:100px; >Credênciais para saida</h1>
												  <div style="border:1px solid black; height:70px; width:70px; margin-left:47%;">
													<img src="'.$ultimoQrCriado.'" style="height:100px;	width:100px;"/>
												  </div><br/><br/><br/>
                                                   <p style="margin-left:42%; margin-bottom:40px">'.$dataActual.'</p>
                                                     <i><b>Nome do cliente:</b></i><p>'.$nome_cliente.'</p><br/><hr/>
													 <i><b>Matricula :</b></i><p>'.$matricula.'</p><hr>
													 <i><b>Email:</b></i> <p>'.$email.'</p><hr/>
													 <i><b>Marca do carro:</b></i><p>'.$marca.'</p><hr/>
												     <i><b>Modelo :</b></i> <p>'.$modelo.'</p>													 
										</body>
									 </html>
									 ';
									 $ficheiroPdf = "../pdfGerados/infoSaida".$ultimoId.".pdf";
									 $mpdf = new mPDF();
									 $mpdf->WriteHTML($pagina); /// esse e o metodo dessa lib para transformar o html em pdf
									 $mpdf->Output($ficheiroPdf,'F'); //  i,f,d sao para abrir no navegador, salvar no servidor, e salvar o arquivo na maquina, respectivamente
								      
									   $mail = new PHPMailer();
  									//configuração do gmail
										$mail->Port = '465'; //porta usada pelo gmail.
										$mail->Host = 'smtp.gmail.com'; 
										$mail->IsHTML(true); 
										$mail->Mailer = 'smtp'; 
										$mail->SMTPSecure = 'ssl';
										//configuração do usuário do gmail
										$mail->SMTPAuth = true; 
										$mail->Username = 'virgiliojmulungo@gmail.com'; // usuario gmail.   
										$mail->Password = 'tryitn0w'; // senha do email.
										
												$mail->SingleTo = true; 
													$mail->SMTPAuth = true; 
													$mail->Username = 'virgiliojmulungo@gmail.com'; // usuario gmail.   
													$mail->Password = 'amendoim'; // senha do email.
													$mail->SingleTo = true; 


													// configuração do email a ver enviado.
													$mail->From = "virgiliojmulungo@gmail.com"; 
													$mail->FromName = "Virgilio.";
													 
													$file_to_attach = '../pdfGerados/infoSaida'.$ultimoId.'.pdf';
													$mail->AddAttachment( $file_to_attach , 'Dados de entrada ao sistema');

													$mail->addAddress($email); // email do destinatario.

													$mail->Subject = "Dados do registo de entrada ao parque"; 
													$mail->Body ="Estas sao as credenciais de saida do parque";
													if(!$mail->Send()){
													  echo "Erro ao enviar Email:" . $mail->ErrorInfo;
													}else{
														 echo "Email enviado";
														   mysqli_query($con,"update entrada set entrou='1' where id_entrada='$ultimoId'");
													}


																	  
						}else{
							 echo "Algo de anormal aconteceu aqui";
						}
			       
	   }else{
		   echo "erro inesperado";
	   }
?>

 
     // criando a instancia do scan ou leitura do qrcode
	 // A instancia do scanner, leva o parametro video e o id
		 let leitura = new Instascan.Scanner({video: document.getElementById("qrReader") });
		     // adicionar um escutador de eventos para o evento scan da instancia leitura
			 var dadosClone =[];
			 var idEntradaClone;
			 leitura.addListener("scan", function(conteudoLeitura){
				    var infoQr = conteudoLeitura.trim();
				         dado = infoQr.split(" ");
					var id_entrada = dado[1];
					   idEntradaClone = id_entrada;
					  
					$.post("http://localhost/Gestor_parque/Controler/saida.php",{"id_entrada":id_entrada},function(resposta){
						 resposta = resposta.trim();
						 if(resposta=="Este carro ja saiu do nosso parque"){
							 $("#resultados").html('<h4> Este codigo ja saiu do nosso parque</h4>');
							 $("#resultados").css("display","block");
							 setTimeout(function(){
								 $("#resultados").html('');
								 $("#resultados").css("display","none");
								 //location.reload();
							 },5000);
						 }else if(resposta=="erro"){
							 $("#resultados").html('<h4 color="red">Este codigo não é valido</h4>');
							 $("#resultados").css("display","block");
							 setTimeout(function(){
								 $("#resultados").html('');
								 $("#resultados").css("display","none");
								 //location.reload();
							 },5000);
						 }else if(resposta=="Este carro nao foi autorizado a entrar"){
							 $("#resultados").html("Este carro ja saiu do nosso parque</h4>");
							 $("#resultados").css("display","block");
							 setTimeout(function(){
                                 location.reload();
							 },5000);
							 $("#resultados").html();
						 }else{
							 
							  var dadosPagina = resposta.split("|");
							      dadosClone = dadosPagina;
								  
							    $("#resultados").append('<h5 style="color:white; font-family: , cursive; margin-left:40%;">'+ dadosPagina[6]+" "+dadosPagina[7]+'</h5>');
							    $("#resultados").append('<ul id="test">');
							    $("#resultados").append('<li class="info"> Matricula do carro :'+'<b>'+dadosPagina[2]+'</b>'+'</li>');
								$("#resultados").append('<li class="info"> Data e hora de entrada ao parque :'+'<b>'+dadosPagina[4]+'</b>'+'</li>');
								$("#resultados").append('<li class="info"> email da pessoa que entrou com o carro :'+'<b>'+dadosPagina[10]+'</b>'+'</li>');
								$("#resultados").append('<li class="info"> id do proprietario :'+'<b>'+dadosPagina[1]+'</b>'+'</li>');
								$("#resultados").append('<li class="info"> Veiculo de categoria :'+'<b>'+dadosPagina[9]+'</b>'+'</li>');
								$("#resultados").append('<li class="info"> preco a pagar  :'+'<b>'+dadosPagina[8]+'</b>'+'</li>');
								$("#resultados").append('</ul>');
								$("#resultados").append('<label> Sim </label><input type ="radio" id="pago" name="pago" value="sim" onchange="valor1()"/><br/>');
								$("#resultados").append('<label> Nao </label><input type ="radio" id="pago" name="pago" value="nao" onchange="valor1()" checked="true"/>');
								$("#resultados").css("display","block");
						 }
					})
					    
			 });
			 
	   // usaremos as funcoes do instascan para saber se o nosso dispositivo tem ou nao uma camera;
	       Instascan.Camera.getCameras().then(function(cameras){
			    if(cameras.length>0){
				leitura.start(cameras[0]);
				}else{
					document.write("este dispositivo nao contem cameras");
				}
		   })
		   
		   function valor(){
			   $opcoes = $("pago")
			    for(i=0; i<pago.length;i++){
					if(pago[i].checked){
					return pago[i].value;
				}
			}
				return null;
		  }
		                                 
		   
		   function valor1(){
			   if(valor()=="nao"){
				 alert("Este carro nao pode sair ate pagar");
				 return false;
				  
			   }else{
				 var confirmacao = confirm("Tens Certeza que esta tudo aposto para esse carro sair ?");	
				     if(confirmacao ==true){
						 console.log(dadosClone);
						 idEntradaClone;
						   $.post("http://localhost/Gestor_parque/Controler/saidaMarcada.php",{"id_entrada":idEntradaClone,"id_carro":dadosClone[0],"matricula":dadosClone[2],"categoria":dadosClone[9],"preco":dadosClone[8]},function(resposta){
							   alert(resposta);
                             $("#resultados").html("Este carro ja saiu do nosso parque</h4>");
							 $("#resultados").css("display","block");
							 setTimeout(function(){
                                 location.reload();
							 },5000);							   
						   });
					 }else{
						   $("pago").attr("checked", false);
						   return false;
					 }
				 }
		   }
		   
		   
			$( document ).ready(function(){
				$.ajaxSetup({
					cache: false
				});	 
			});
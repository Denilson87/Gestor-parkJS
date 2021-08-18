      
	   
	      formulario = $("#dadosLogin");
		     addEventListener("submit",function(event){
				  event.preventDefault();
				    username = $("#username").val();
					senha = $("#senha").val();
					
					if(username ==""){
						$("#mensagem-erroLogin").css("display","contents");
						$("#mensagem-erroLogin").html("Username invalido! por favor digite um username valido");
						$("#username").focus();
						desaparecerUsername();
						return false;
						  
					}else if(senha =="" || (senha.length<8 || senha.length>15)){
						$("#mensagem-erroSenha").css("display","contents");
						$("#mensagem-erroSenha").html("senha invalida! porfavor digite com mais de 8 caracteres e menos de 15");
			            $("#senha").focus();
						desaparecerSenha();
						return false;
					}else{
						   $.get("http://localhost/Gestor_parque/Controler/validarLogin.php?rand="+(new Date().getTime())+"",{"username":username,"senha":senha},function(resposta){
							        if(resposta.trim() =="sucesso"){
										location.href ='http://localhost/Gestor_parque/index.php';
									}else{
										$("#mensagem-erroSenha").css("display","contents");
										$("#mensagem-erroSenha").html(resposta);
										$("#username").focus();
										$("#senha").focus();
										desaparecerSenha();
										return false;
									  }
						   });
							       
					}
		});
		
		    //funcao para fazer desaparecer o elemeto que apresenta o texto de erro
			    
				    function desaparecerUsername(){
						setTimeout(function(){
							$("#mensagem-erroLogin").fadeOut();
						},2000);
					}
					
					function desaparecerSenha(){
						setTimeout(function(){
							$("#mensagem-erroSenha").fadeOut();
						},2000);
					}
					
	        // gerador de datas aleatorias para evuitar cache do brouse;
			
			
			$( document ).ready(function(){
				$.ajaxSetup({
					cache: false
				});	 
			});
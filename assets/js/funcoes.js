 

       
	    addEventListener("keyup",function(event){
		
            var dadosPesquisa1 = $("#form-pesquisa").val();
			$.post("http://localhost/Gestor_parque/Controler/busca_carro.php",{'matricula':dadosPesquisa1},function(resposta){
			         var dadosPesquisa = resposta.trim();
					 var dadosCarro = dadosPesquisa.split("|");
					 var dadosCompilados = dadosCarro;
					 var tamanho = dadosCompilados.length-1;
                     var dadosLista = dadosCompilados.splice(0,tamanho);	
					     $("#detalhe").html("");
                        if(dadosLista.length != 0){						 
							for(i=0; i<dadosLista.length; i++){
								 var listaOpcoes = dadosLista[i].split(" ");
								 $("#detalhe").append("<a href='paginas/ver.php?carroId="+listaOpcoes[0]+"' id='opcao'><h6>"+listaOpcoes[2]+" "+listaOpcoes[1]+"</h6></a><hr>");
								 $("#respostas").css("display","block");							
							}
						}else{
							$("#detalhe").html("<h5>"+"Nenhum carro encotrado, Volte a tentar"+"</h5>");
						}
				           
						if(dadosPesquisa1.length==0){
							$("#respostas").hide();
						}
			})			 
	  });
	  
	  function bazar(){
		     estado = $("#respostas").css("display","none");
	  }
	        
	  
	  
       
	  
	  
	  
	  // evitando caching do browser
	  	  $( document ).ready(function(){
				$.ajaxSetup({
					cache: false
				});	 
			});
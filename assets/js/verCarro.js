     
   addEventListener("click", function(event){
	    	   if(pegarValorRadio()=="Nao"){
				   $("#outroDono").css("display","block");
			   }else{
				   $("#outroDono").css("display","none");
			   }
	   });
	   
	
	function pegarValorRadio(){
	  var opcoes = $("pergunta");
		for(var i = 0; i < pergunta.length; i++){
	        if(pergunta[i].checked){
		       return pergunta[i].value;
            }
   
        }
   
      return null;
    }

         
		 //funcao para pegar o valor da url e fazer uma requisicao aassincro e preencher os Inputs
		     
             var dadosClone =[];    			 
		   
		  function pegarDadosDaEntrada(url){
			  dados = url.split("=");
			  id_carro = dados[1];	
				  $.post("../Controler/verCarro.php",{"id_carro":id_carro}, function(resposta){
					   resposta = resposta.trim();
					      dadosCarro = resposta.split("|");
                          $("#matricula")[0].value=dadosCarro[0];
						  $("#matricula")[0].disabled="true";
                          dadosClone.push(resposta);						  
				  });
		  }
		  
                                  
		  linkActual =window.location.href;
		  pegarDadosDaEntrada(linkActual);
		  
		  
		  
		  
		  
		  
		  //funcao para registar os dados de entrada no evento onsubmit
		  addEventListener("submit",function(event){
			  event.preventDefault();
			  var email = $("#email").val();
			  dadosSubmeter = dadosClone[0].split("|");
			  var id_cliente = dadosSubmeter[2];
			  var id_carro = dadosSubmeter[1];
			  var matricula = dadosSubmeter[0];
			  var outroDono = "";
			      
				  if(email.indexOf("@")==-1 && email.indexOf(".com")==-1){
					  $("#erroMail").html("Ha algum erro, por favor escreva o email correcto");
					     setInterval( function(){$("#erroMail").css("display","none")},3000);
					  return false;
				 }
			   
			     if(pegarValorRadio()=="Nao"){
					 outroDono = $("#donoOcasional").val();
					    if(outroDono.length<2){
							 $("#mensagemErro").html("Por favor escreva um nome");
							 setInterval(function(){ $("#mensagemErro").css("display","none"); }, 3000);
							 $("#donoOcasional").focus();
							 return false;
						}
				 }else if(pegarValorRadio()=="Sim"){
					 outroDono ="";
				 }
                      $("#processing").css("display","block");				 
			     $.post("../Controler/registarEntrada.php",{"id_cliente":id_cliente, "email":email, "id_carro":id_carro, "matricula":matricula,"donoAlternativo":outroDono}, function(resposta){
                        $("#processing").css("display","none");				     
					 alert(resposta); 
					  
			   })
		  });
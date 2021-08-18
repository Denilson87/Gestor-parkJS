  

       var formulario = $("#formulario");
        
       formulario[0].addEventListener("submit",function(event){
       	 	event.preventDefault();
       	    var nome = $("#nome").val();
       	    var numCasa = $("#nCasa").val();
       	    var bairro = $("#bairro").val();
       	    var avenida = $("#avenida").val();
       	    var numTel = $("#numTel").val();
       	    var numAlternativo = $("#numAlternativo").val();
       	    var funcionario = $("#funcionario").val();

       	     if (nome.length <3){
       	     	$("#erroNome").html("Por favor! Escreva um nome com mais de 3 caracteres");
       	     	setTimeout(function(){$("#erroNome").hide();},3000);
       	     	return false;

       	     }else if(numCasa.length==0){
				$("#erroNumCasa").html("Por favor! Escreva um nome com mais de 3 caracteres");
       	     	setTimeout(function(){$("#erroNumCasa").hide();},3000);
       	     	return false;       	     	
       	     }else if(bairro.length<2){
       	     	$("#erroBairro").html("Por favor! Escreva um bairro valido ");
       	     	setTimeout(function(){$("#erroBairro").hide();},3000);
       	     	return false;
       	     }else if (avenida.length<3) {
       	     	$("#erroAvenida").html("Por favor! Escreva uma avenida com mais de 3 caracteres");
       	     	setTimeout(function(){$("#erroAvenida").hide();},3000);
       	     	return false;

       	     }else if(numTel.length<9 || numTel.length >9){
       	     	$("#erroNumTel").html("Por favor! Escreva um contacto nao com menos e nem mais de 9 caracteres");
       	     	setTimeout(function(){$("#erroNumTel").hide();},3000);
       	     	return false;

       	     }else if (numAlternativo.length<9 || numAlternativo.length >9) {
       	     	$("#erroNumAlternativo").html("Por favor! Escreva um contacto nao com menos e nem mais de 9 caracteres");
       	     	setTimeout(function(){$("#erroNumAlternativo").hide();},3000);
       	     	return false;
       	     }else if(numAlternativo==numTel){
                $("#erroNumAlternativo").html("O numero numero alternativo e principal nao pode ser o mesmo");
       	     	setTimeout(function(){$("#erroNumAlternativo").hide();},3000);
       	     	return false;
       	     }else if(numCasa<1){
       	     	$("#erroNumCasa").html("Por favor! digite numero de casa valido");
       	     	setTimeout(function(){$("#erroNumCasa").hide();},3000);
       	     	return false;  
       	     }

       	    $.post("http://localhost/Gestor_parque/Controler/registarCliente.php",{"nome":nome,"nCasa":numCasa,"bairro":bairro,"avenida":avenida,"numTel":numTel,"numAlternativo":numAlternativo,"funcionario":funcionario},function(resposta){
       	    	resposta = resposta.trim();
       	    	  alert(resposta);
       	    	  if (resposta=="O contacto ja foi antes registado a nossa base de dados"){
 					  $("#erroNumTel").html("Temos um cliente com este contacto");
 					  setTimeout(function(){$("#erroNumTel").hide();},3000);
       	    	  }else if(resposta =="Sucesso"){
                       $("#acerto").html("<br/><i style='color:green;'>Cliente registado com Sucesso</i>");
                        setTimeout(function(){$("#acerto").hide()
                        var nome = $("#nome").val("");
			       	    var numCasa = $("#nCasa").val("");
			       	    var bairro = $("#bairro").val("");
			       	    var avenida = $("#avenida").val("");
			       	    var numTel = $("#numTel").val("");
			       	    var numAlternativo = $("#numAlternativo").val("");
                       },3000);
       	    	  }else{

       	    	  	$("#acerto").html("<br/><i style='color:Red;'>Erro inesperado! porfavor volte a tentar</i>");
       	    	  	   setTimeout(function(){$("#acerto").hide()},3000);
       	    	  }
       	    });
       });


         // Limpar os formularios sempre que o modal e fechado//
     $('#registoCliente').on('hidden.bs.modal', function (e) {
						var nome = $("#nome").val("");
			       	    var numCasa = $("#nCasa").val("");
			       	    var bairro = $("#bairro").val("");
			       	    var avenida = $("#avenida").val("");
			       	    var numTel = $("#numTel").val("");
			       	    var numAlternativo = $("#numAlternativo").val("");
			       	    setTimeout(function(){location.reload();},500);
				});


  // No evento onload do documento, ele deve ir buscar os dados dos clientes todos e fazer append a tabelas
     $( document ).ready(function() {
			           
            //verificacao de parametos no link
 	        var linkActual = location.href;

 	        //Caso Nao encontre o paramentro pagina no link, entao vai 
            if (linkActual.indexOf("pagina=")==-1){
   			 $.get("http://localhost/Gestor_parque/Controler/BuscarCliente.php?hora="+RetornaDataHoraAtual()+"",function(resposta){
                  resposta = resposta.trim();
 
                  var dados = resposta.split("?");
                  var lista = JSON.parse(dados[0]);
                  var total_clientes =  dados[1];
                  var numeroPag = Math.ceil(total_clientes/lista.length);
                  if (lista.length==0) {
                       	  $("#custumerList").html("Nenhum cliente encontrado");
                       };  
             					  
                  		for(var i=0; i<lista.length; i++){
                  		  $("#listaCliente").append('<tr><td>'+lista[i].id_cliente+'</td> <td>'+lista[i].nome_cliente+'</td> <td>'+lista[i].numeTel+'</td> <td>'+lista[i].numeroAlternativo+'</td> <td>'+lista[i].bairro+'</td> <td>'+lista[i].avenida+'</td> <td>'+lista[i].numeroCasa+'</td> <td>'+lista[i].username+'</td> <td><a href="#" data-toggle="modal" data-target="#apagarCliente" onclick="apagar('+lista[i].id_cliente+')"><i class="fa fa-trash"></i></a></td> <td><a  href="#" data-toggle="modal" data-target="#custumerEdit" onclick="editar('+lista[i].id_cliente+')"><i class="fa fa-pencil-square-o"></i></a></td></tr>');
                  		}
                  		//criar a paginacao
                  		 if (numeroPag<2) {

                  		 }else{
                  		for(var j=1; j<=numeroPag; j++){
                  			$(".pagination").append('<li class="page-item"><a class="page-link" href="clientes.php?pagina='+j+'">'+j+'</a></li>');                  		
                  		}
                  	}
   			 });

   		    }else if (linkActual.indexOf("pagina=")!=1) {
   		    	  var texto= linkActual.split("=");
   		    	   var pagina = texto[1];


   		    	$.get("http://localhost/Gestor_parque/Controler/BuscarCliente.php?pagina="+pagina+"& hora="+RetornaDataHoraAtual()+"",function(resposta){
                     resposta = resposta.trim();
              		 var dados = resposta.split("?");
                  	 var lista = JSON.parse(dados[0]);
                     var total =  dados[1];
                     var pag = Math.ceil(total/8);

                     if (lista.length==0) {
                       	  $("#custumerList").html("Nenhum cliente encontrado");
                     } 
                     
                     for(var i=0; i<lista.length; i++){ 
                         $("#listaCliente").append('<tr><td>'+lista[i].id_cliente+'</td> <td>'+lista[i].nome_cliente+'</td> <td>'+lista[i].numeTel+'</td> <td>'+lista[i].numeroAlternativo+'</td> <td>'+lista[i].bairro+'</td> <td>'+lista[i].avenida+'</td> <td>'+lista[i].numeroCasa+'</td> <td>'+lista[i].username+'</td> <td><a href="#" data-toggle="modal" data-target="#apagarCliente" onclick="apagar('+lista[i].id_cliente+')"><i class="fa fa-trash"></i></a></td> <td><a href="#" data-toggle="modal" data-target="#custumerEdit" onclick="editar('+lista[i].id_cliente+')"><i class="fa fa-pencil-square-o"></i></a></td></tr>');
   			         }

   			        for(var j=1; j<=pag; j++){
                 			$(".pagination").append('<li class="page-item"><a class="page-link" href="clientes.php?pagina='+j+'">'+j+'</a></li>');                  		
                  	
                 }
   			 });
   		    }
		});


     // hora actual
      function RetornaDataHoraAtual(){
        var dNow = new Date();
        var localdate = dNow.getDate() + '/' + (dNow.getMonth()+1) + '/' + dNow.getFullYear() + ' ' + dNow.getHours() + ':' + dNow.getMinutes();
        return localdate;
      }


	  function apagar(id){
	       var id_cliente = id;
	       var btnApagar =  $("#apagar");

	            btnApagar[0].addEventListener("click",function(event){
	            	
                     $("#apagarCliente").modal('hide');

                       $.post("http://localhost/Gestor_parque/Controler/ApagarCliente.php",{"id_cliente":id_cliente}, function(resposta){
                           resposta = resposta.trim();
                             if(resposta =="Cliente apagado com sucesso"){
 								$("#sucesso").modal("show");
 								 setTimeout(function(){
                                  location.reload();
 								 },2000);
                             }else{
                             	 $("#errorApgar").modal('show');
                             	  setTimeout(function(){location.reload();},2000);
                             }
                       	   	
                       })

	            });
	  }



	   function editar(id){

	   		    $('#custumerEdit').on('show.bs.modal', function (event){  	
    	            $.post("http://localhost/Gestor_parque/Controler/buscarClienteEspec.php",{"id_cliente":id}, function(resposta){
                	
                	 if (resposta =="Erro inesperado"){
                	 		alert("erro inesperado");
                	 		return false;
                	 }else{
                	      resposta = resposta.trim();
                	 	  var dadosCliente = JSON.parse(resposta);
                	 	  $("#nomeEdit").val(dadosCliente.nome_cliente); 
                	 	  $("#nCasaEdit").val(dadosCliente.numeroCasa); 
                	 	  $("#bairroEdit").val(dadosCliente.bairro); 
                	 	  $("#numTelEdit").val(dadosCliente.numeTel); 
                	 	  $("#numAlternativoEdit").val(dadosCliente.numeroAlternativo);
                	 	  $("#avenidaEdit").val(dadosCliente.avenida); 
                	 	 
                	 	   }
                	 	});
            		});	

                    
                    var formulario = $("#formularioEdit");
                       formulario[0].addEventListener("submit",function(event){
                       	event.preventDefault();
                       	  var nome = $("#nomeEdit").val();
                       	  var numCasa = $("#nCasaEdit").val();
                       	  var bairro = $("#bairroEdit").val();
                       	  var avenida = $("#avenidaEdit").val();
                       	  var numTel =  $("#numTelEdit").val();
                       	  var numAlternativo = $("#numAlternativoEdit").val();
                       	  var funcionario = $("#funcionarioEdit").val();
       	     				

                 //validacao de formulario
           	     if (nome.length <3){
	       	     	$("#erroNomeEdit").html("Por favor! Escreva um nome com mais de 3 caracteres");
	       	     	setTimeout(function(){$("#erroNomeEdit").hide();},3000);
	       	 
	       	     	return false;

	       	     }else if(numCasa.length==0){
					$("#erroNumCasaEdit").html("Por favor! Escreva um nome com mais de 3 caracteres");
	       	     	setTimeout(function(){$("#erroNumCasaEdit").hide();},3000);
	       	     	alert("Aqui");;
	       	     	return false;       	     	
	       	     }else if(bairro.length<2){
	       	     	$("#erroBairroEdit").html("Por favor! Escreva um bairro valido ");
	       	     	setTimeout(function(){$("#erroBairroEdit").hide();},3000);
	       	     	alert("Aqui");
	       	     	return false;
	       	     }else if (avenida.length<3) {
	       	     	$("#erroAvenidaEdit").html("Por favor! Escreva uma avenida com mais de 3 caracteres");
	       	     	setTimeout(function(){$("#erroAvenidaEdit").hide();},3000);
	       	     	return false;
	       	     }else if(numTel.length<9 || numTel.length >9){
	       	     	$("#erroNumTelEdit").html("Por favor! Escreva um contacto nao com menos e nem mais de 9 caracteres");
	       	     	setTimeout(function(){$("#erroNumTelEdit").hide();},3000);
	                 alert("Aqui");
	       	     	return false;

	       	     }else if (numAlternativo.length<9 || numAlternativo.length >9) {
	       	     	$("#erroNumAlternativoEdit").html("Por favor! Escreva um contacto nao com menos e nem mais de 9 caracteres");
	       	     	setTimeout(function(){$("#erroNumAlternativoEdit").hide();},3000);
	       	     	return false;
	       	     }else if(numAlternativo==numTel){
	                $("#erroNumAlternativoEdit").html("O numero numero alternativo e principal nao pode ser o mesmo");
	       	     	setTimeout(function(){$("#erroNumAlternativoEdit").hide();},3000);
	       	     	return false;
	       	     }else if(numCasa<1){
	       	     	$("#erroNumCasaEdit").html("Por favor! digite numero de casa valido");
	       	     	setTimeout(function(){$("#erroNumCasaEdit").hide();},3000);
	       	     	return false; 
                   }
                       setTimeout(function(){$("#custumerEdit").modal('hide')},1000);

                  $.post("http://localhost/Gestor_parque/Controler/editarDadosCliente.php",{"id_cliente":id,"nome":nome,"numCasa":numCasa,"bairro":bairro,"avenida":avenida,"numTel":numTel,"numAlternativo":numAlternativo,"funcionario":funcionario},function(resposta){
                  	   resposta = resposta.trim();
                  	   if (resposta=="contacto nao registado"){
                  	   	  $("#erroNumTelEdit").html("Nenhum cliente com este contacto na Base de dados");
                  	   	  setTimeout(function(){$("#erroNumTelEdit").hide()},3000);
 						 alert("aqui");
                  	   }else if (resposta =="Actualizado com sucesso"){
                  	   	  $("#sucessoUpdate").modal('show');
                  	   	  setTimeout(function(){location.reload();},2500);

                  	   }else if (resposta =="Erro ao actualizar"){
                  	   	   $("#errorActualizar").modal('show');
                  	   	   setTimeout(function(){location.reload();},2700);
                  	   }else{
                  	   	      alert("erro inesperado! Por favor contact a equipa tecnica");
                  	   }
                  })
   	  		});

  				// limpar os formularios
                 $('#custumerEdit').on('hidden.bs.modal', function (event){  
                    location.reload();
                  });    
			}

			var btnProcura =  $("#btnProcura");
			      btnProcura[0].addEventListener("click",function(){
			      	 var pesquisa =  $("#dadoPesquisa").val();
			      	 	if (pesquisa.length<2 || pesquisa.length>11) {
			      	 		$("#exclamacaoErro").css("display","block");
                   setTimeout(function(){$("#exclamacaoErro").hide();},1600);

			      	 	}else{
			      	 		$.post("http://localhost/Gestor_parque/Controler/pesquisa.php",{"parametro":pesquisa}, function(resposta){
			      	 			  resposta.trim();
                       var lista = JSON.parse(resposta);

                       if (lista.length ==0) {
                             $("#listaCliente").html("");  
                       }else{

                            var tamanho =lista.length;
                            $("#listaCliente").html("");
                              for(var i=0; i<=tamanho; i++){
                              $("#listaCliente").append('<tr><td>'+lista[i].id_cliente+'</td> <td>'+lista[i].nome_cliente+'</td> <td>'+lista[i].numeTel+'</td> <td>'+lista[i].numeroAlternativo+'</td> <td>'+lista[i].bairro+'</td> <td>'+lista[i].avenida+'</td> <td>'+lista[i].numeroCasa+'</td> <td>'+lista[i].username+'</td> <td><a href="#" data-toggle="modal" data-target="#apagarCliente" onclick="apagar('+lista[i].id_cliente+')"><i class="fa fa-trash"></i></a></td> <td><a href="#" data-toggle="modal" data-target="#custumerEdit" onclick="editar('+lista[i].id_cliente+')"><i class="fa fa-pencil-square-o"></i></a></td></tr>');

                          }
                       }
			      	 		});

			      	 	}
 			      });


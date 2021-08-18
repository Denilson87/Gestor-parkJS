   

        //funcao que retorna hora actual para poder ser utilizado como parametro para evitar caching
        function RetornaDataHoraAtual(){
        var dNow = new Date();
        var localdate = dNow.getDate() + '/' + (dNow.getMonth()+1) + '/' + dNow.getFullYear() + ' ' + dNow.getHours() + ':' + dNow.getMinutes();
        return localdate;
      }

          // Quando o ficheiro for carregado
          $( document ).ready(function() {
            $.ajaxSetup({ cache: false });
                   // verificando no link se houve Get ou nao 
                    link = location.href;
                    var numeroPaginas;
              if(link.indexOf("pagina=")== -1){
               $.get("http://localhost/Gestor_parque/Controler/ListaCarros.php?value="+RetornaDataHoraAtual()+"",function(resp){
                        dados = resp.split("?");
                        resp = dados[0]+"";
                        numeroPaginas = Math.ceil(dados[1]/8);
                       
                     resp = JSON.parse(resp);
                     var tamanho  =  resp.length; 
                      for(i=0; i<tamanho; i++){
                          $("#CorpoApresentacao").append('<tr><th scope="row">'+resp[i].id_carro+'</th><td>'+resp[i].marca+'</td><td>'+resp[i].modelo+'</td><td>'+resp[i].cor+'</td><td>'+resp[i].matricula+'</td><td>'+resp[i].id_categoria+'</td><td><a href="#" data-toggle="modal" data-target="#apagar" onclick="apagar('+resp[i].id_carro+')"><i class="fa fa-trash-o"></i></td><td><a href="#" onclick="editarCarro('+resp[i].id_carro+')"><i class="fa fa-pencil-square-o"></i></a></td><td><a href="maisInfo.php?id_carro='+resp[i].id_carro+'"><i class="fa fa-info-circle"></i></td></tr>');
                      } 
                       if(numeroPaginas>1){
                            for(i=1; i<=numeroPaginas; i++){
                               $(".pagination").append('<li class="page-item"><a class="page-link" href="Carros.php?pagina='+i+'">'+i+'</a></li>');
                            }
                        }
                        
               });  
                }else{
                      var procura =  link.split("=");
                      pagina = procura[1];
               $.get("http://localhost/Gestor_parque/Controler/ListaCarros.php?pagina="+pagina+"& value="+RetornaDataHoraAtual()+"",function(resp){1
                        dados = resp.split("?");
                         resp = dados[0]+"";
                        numeroPaginas = Math.ceil(dados[1]/8);
                      resp = JSON.parse(resp);
                     var tamanho  =  resp.length;

                      for(i=0; i<tamanho; i++){
                        $("#CorpoApresentacao").append('<tr><th scope="row">'+resp[i].id_carro+'</th><td>'+resp[i].marca+'</td><td>'+resp[i].modelo+'</td><td>'+resp[i].cor+'</td><td>'+resp[i].matricula+'</td><td>'+resp[i].id_categoria+'</td><td><a href="#" data-toggle="modal" data-target="#apagar" onclick="apagar('+resp[i].id_carro+')"><i class="fa fa-trash-o"></i></a></td><td><a href="#" onclick="editarCarro('+resp[i].id_carro+')"><i class="fa fa-pencil-square-o"></i></a></td><td><a href="maisInfo.php?id_carro='+resp[i].id_carro+'"><i class="fa fa-info-circle"></i></td></tr>');
                 }

                      if(numeroPaginas>1){
                            for(i=1; i<=numeroPaginas; i++){
                             $(".pagination").append('<li class="page-item"><a class="page-link" href="Carros.php?pagina='+i+'">'+i+'</a></li>');
                            }
                        }

               });
                 
              }
          });

    $('#novoCarro').on('show.bs.modal', function (e) {
            $.post("http://localhost/Gestor_parque/Controler/buscaCategorias.php",function(response){
                       response = response.trim();
                       posicao = response.length-1;
                       var novoValor =  response.substring(0,posicao);
                       var dadosTodos = novoValor.split("|");
                       //console.log(dadosTodos);
                       var arrayPosicao =[];
                         for(var i=0; i<dadosTodos.length; i++){
                             var arrayPosicao = dadosTodos[i].split(" ");
                             $("#categoria").append('<option>'+arrayPosicao[2]+'</option>');
                          }
            });
      })



      //comportamento que o modal deve ter sempre que for fechado
     $('#novoCarro').on('hidden.bs.modal', function (e) {
               $("#marca").val("");
               $("#modelo").val("");
               $("#matricula").val("");
               $("#telefone").val("");
               $("#categoria").val(""); 
               $("#cor").val("");
               $("#categoria").html(""); 
    });
      var formulario = $("#formulario");

      formulario[0].addEventListener("submit", function(event){
        event.preventDefault();
           var marca =  $("#marca").val();
           var modelo = $("#modelo").val();
           var cor =  $("#cor").val();
           var matricula = $("#matricula").val();
           var categoria = $("#categoria").val();
           var telemovel = $("#telefone").val();
                
                // validacao do formulario marca
                  if(marca.length<4){
                      $("#erroMarca").html("Porfavor escreva uma marca valida");
                      setTimeout(function(){$("#erroMarca").html("")},5000);
                      $("#marca").focus();
                       return false;
                  }

              // validacao do formulario modelo
                   if(modelo.length <2){
                      $("#erroModelo").html("Porfavor escreva um Modelo valido");
                      setTimeout(function(){$("#erroModelo").html("")},5000);
                      $("#modelo").focus();
                      return false;
                  }

                
                  //validacao do formulario da matricula
                   if(matricula.length < 7 || matricula.indexOf("-") != "-1"){
                        $("#erroMatricula").html("Porfavor escreva uma matricula valida");
                         setTimeout(function(){$("#erroMatricula").html(""),5000});
                         $("#matricula").focus();
                         return false;
                   }

                //validacao da cor
                if(cor.length <2){
                      $("#erroCor").html("Porfavor escreva uma Cor existente");
                      setTimeout(function(){$("#erroCor").html(""); },5000);
                      $("#cor").focus();
                      return false;
                  }

                //numero de telemovel
                if(telemovel.length<9 || telemovel.length>9){
                    $("#erroTelefone").html("Por favor digite um numero valido");
                    setTimeout(function(){ $("#erroTelefone").html(""); },5000);
                    $("#telefone").focus();
                    return false;
                } 
                  // verificacao das opcoes 
                 if(categoria.length!=1){
                    $("#erroCategoria").html("<br/>Escolha uma categoria porfavor");
                    setTimeout(function(){ $("#erroCategoria").html(""); },5000);
                    return false;
                 }
                  
                  //requsicao ajax com resposta
                 $.post("http://localhost/Gestor_parque/Controler/RegistarCarro.php",{"marca":marca,"modelo":modelo,"matricula":matricula,"cor":cor,"telemovel":telemovel,"categoria":categoria},function(resposta){
                      resposta = resposta.trim();

                      //verificacao das respostas e accoes
                      if(resposta=="Nao existe nenhum cliente com este contacto"){
                          $("#erroTelefone").html('<p style="color:red; font-family:cursive">Não ha cliente nenhum registado com esse contacto, Porfavor confira bem o numero</p>');
                          setTimeout(function(){$("#erroTelefone").html("");},6000);
                          $("#telefone").focus();

                     }else if(resposta == "Sucesso"){
                          $("#respostaSucesso").html('<p style="color:green"><b>Carro Registado com sucesso</b></p>');
                           setTimeout(function(){
                              //limpar os inputs
                               $("#marca").val("");
                               $("#modelo").val("");
                               $("#matricula").val("");
                               $("#telefone").val("");
                               $("#categoria").val(""); 
                               $("#cor").val("");
                               $("#respostaSucesso").html("");
                             },5000);

                     }else if(resposta =="Ja existe"){
                           $("#erroMatricula").html('<p style="color:red">Ja existe um veiculo registado com essa matricula </p>');
                           setTimeout(function(){$("#erroMatricula").html("");},5000);
                           $("#matricula").focus();
                     }else{

                     }
                 });

     });
                
    

     function apagar(id){
          var id_carro = id;
          var botaoSim  = $("#sim")[0];
          botaoSim.addEventListener("click", function(){
              $("#apagar").modal("hide");
              $.post("http://localhost/Gestor_parque/Controler/apagarCarro.php",{"id_carro":id_carro},function(resposta){
                    resposta =  resposta.trim();
                     if (resposta=="sucesso") {
                        $("#mensagem").modal("show");
                        setTimeout(function(){
                         location.reload();
                        },1800)
                   }else{
                      $("#paginas").html("<p style='color:red; font-size:22px; font-family:'Roboto Condensed', sans-serif;'>Ocorreu um erro inesperado ao apagar Carro! Porfavor volte a tentar</p>");
                   }
              });
          })
  }

    function editarCarro(id){
              var id_carro = id;
              $('#editarCarro').on('show.bs.modal', function (e) {
              e.preventDefault;
              $.post("http://localhost/Gestor_parque/Controler/buscaCategorias.php",function(response){
                 response = response.trim();
                 posicao = response.length-1;
                 var novoValor =  response.substring(0,posicao);
                 var dadosTodos = novoValor.split("|");
                 //console.log(dadosTodos);
                 var arrayPosicao =[];
                   for(var i=0; i<dadosTodos.length; i++){
                       var arrayPosicao = dadosTodos[i].split(" ");
                      $("#categoria1").append('<option>'+arrayPosicao[2]+'</option>');
                  }
            });
  
             $.post("http://localhost/Gestor_parque/Controler/buscaCarroEspecifico.php",{"id_carro":id_carro},function(resposta){  
               var dados =  JSON.parse(resposta);
                $("#marca1").val(dados[0].marca);
                $("#modelo1").val(dados[0].modelo);
                $("#cor1").val(dados[0].cor);
                $("#matricula1").val(dados[0].matricula);
                $("#telefone1").val(dados[2].numeTel);
                $("#categoria1").val(dados[1].categoria);

                  });      
         });
          $('#editarCarro').on('hidden.bs.modal', function (e) {

               $("#marca1").val("");
               $("#modelo1").val("");
               $("#matricula1").val("");
               $("#telefone1").val("");
               $("#cor1").val("");
               $("#categoria1").html(""); 
               location.reload();
    });

            $("#editarCarro").modal('show');

              var botaoEditar = $("#botaoEditar")[0];
              /// espera de um evento do botao;
              botaoEditar.addEventListener("click", function(){
                var marca = $("#marca1").val();
                var modelo = $("#modelo1").val();
                var matricula = $("#matricula1").val();
                var telefone = $("#telefone1").val();
                var cor = $("#cor1").val();
                var categoria = $("#categoria1").val();

                 // validacao dos campos
                    if (marca.length<4) {
                       $("#erroMarca1").html('Marca invalida! por favor escreva uma marca valida');
                       setTimeout(function(){$("#erroMarca1").hide();},2000);
                       return false;
                    }else if(modelo.length<2){
                       $("erroModelo1").html('Escreva um modelo valido');
                       setTimeout(function(){$("#erroModelo1").hide();},2000);
                       return false;
                    }else if(matricula.length<8 || matricula.length>8){
                      $("#erroMatricula1").html("Escreva uma matricula valida");
                      setTimeout(function(){$("#erroMatricula1").hide();},2000);
                      return false;
                    }else if (telefone.length !=9){
                      $("#erroTelefone1").html("Escreva um numero com 9 digitos");
                      setTimeout(function(){$("#erroMarca1").hide();},2000);
                    }else if(categoria =="Escolha a categoria"){
                        $("#erroCategoria1").html("Escolha uma categoria");
                        return false;
                    } 
                     
                    $.post("http://localhost/Gestor_parque/Controler/EditarCarro.php",{"id_carro":id_carro, "marca":marca, "modelo":modelo, "matricula":matricula,"telefone":telefone, "cor":cor,"categoria":categoria}, function(resposta){
                            resposta = resposta.trim();
                             if(resposta =="Nenhum cliente com o seguinte contacto"){
                              $("#erroTelefone1").html("Nenhum cliente com o seguinte contacto");
                              setTimeout(function(){$("#erroTelefone1").hide();},1500);

                             }else if(resposta =="Actualizado com sucesso"){
                                $("#respostaSucesso1").html("Actualizado com sucesso");
                                setTimeout(function(){$("#respostaSucesso1").hide();
                                    $("#EditarCarro").modal('hide');
                                     location.reload();
                               },5000);
      
                             }else{
                                    alert("Problemas desconhecidos! Porfavor volte a tentar");
                             }
                    });
                
              });
    }
 
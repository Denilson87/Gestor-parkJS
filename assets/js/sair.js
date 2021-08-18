


				
           function sair(){
				response = confirm("Deseja mesmo sair");
				if(response==true){
				$.post("http://localhost/Gestor_parque/Controler/sair.php",{"sair":response},function(resp){
				resp = resp.trim();
				if(resp=" sucesso"){				
					paginaActual = location.href;
					proximoLocal = paginaActual.split("/");
					if(proximoLocal[4]!="index.php#"){
					location.href="../login.html";
					}else{
					location.href="login.html";
					}
				}
			});
		}
	}
		
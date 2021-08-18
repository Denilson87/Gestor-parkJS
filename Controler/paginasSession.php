		
		<?php
		
				session_start();
			    if(isset($_SESSION['id_login']) || isset($_SESSION['username'])){
				}else{
					?>
					<script>
					  
					    paginaActual = location.href;
							proximoLocal = paginaActual.split("/");
							if(proximoLocal[4]!="index.php"){
							location.href="../login.html";
							}else{
							location.href="login.html";
							}


					</script>
					<?php
				}
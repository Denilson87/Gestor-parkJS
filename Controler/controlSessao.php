		
		
		<?php
		         session_start();
			    if(isset($_SESSION['id_login']) || isset($_SESSION['username'])){
				}else{
					?>
					<script>
					    location.href="login.html";
					</script>
					<?php
				}
		   ?>
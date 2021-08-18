
<?php
        session_start();
	    unset($_SESSION['id_login']);
		unset($_SESSION['username']);
		session_destroy();
		echo"sucesso";
?>
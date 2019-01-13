<?PHP
	session_start();
	echo "Signing out ".$_SESSION["loggued_on_user"];
	$_SESSION["loggued_on_user"] = "";
?>

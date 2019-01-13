<?PHP
	session_start();
	echo "<p> Signing out : ".$_SESSION['loggued_on_user']." </p>";
	$_SESSION["loggued_on_user"] = "";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>logout</title>
	</head>
	<body>
		<a href="index.php">Return to Home page.</a>
	</body>
</html>

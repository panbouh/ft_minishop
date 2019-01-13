<?php
	session_start();
	include("src/auth.php");
	include("src/get_file.php");
	if ($_SESSION["loggued_on_user"])
	{
		echo "<p>you are loggued as: ".$_SESSION["loggued_on_user"]."</p>";
		return;
	}
	if (!auth($_POST["login"], $_POST["pwd"]))
	{
		echo "<p>wrong login and/or password</p>";
		echo "<a href='index.php'>Return to Home page.</a>";
		return;
	}
	$_SESSION["loggued_on_user"] = $_POST["login"];
	$user = get_user($_POST["login"]);
	$_SESSION["user_lvl"] = $user['lvl'];
	$cart = get_file("db/carts");
	if (($cart) && (isset($cart[$_POST["login"]])))
	{
		$_SESSION["cart"] = $cart[$_POST["login"]];
	}
	echo "<p>".$_POST["login"]." loggued on successfully</p>";
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sign in</title>
	</head>
	<body>
		<a href="index.php">Return to 	Home page.</a>
	</body>
</html>

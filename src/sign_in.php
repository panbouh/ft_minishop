<?PHP
session_start();
include("showcase.php");
	include("auth.php");
	if ($_SESSION["loggued_on_user"])
	{
		echo "you are loggued as: ".$_SESSION["loggued_on_user"]."\n";
		return;
	}
	if (!auth($_POST["login"], $_POST["pwd"]))
	{
		echo "wrong login and/or password";
		return;
	}
	$_SESSION["loggued_on_user"] = $_POST["login"];
	$cart = get_file("../db/carts");
	if (($cart) && (isset($cart[$_POST["login"]])))
	{
		$_SESSION["cart"] = $cart[$_POST["login"]];
	}
	echo $_POST["login"]." loggued on successfully";
?>

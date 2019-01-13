<?PHP
	session_start();
    include("src/get_file.php");

function is_existant(&$db, $login)
{
	foreach ($db as $credentials)
	{
		if ($credentials["login"] == $login)
			return TRUE;
	}
	return FALSE;
}

function insert_user($db, $lvl)
{
	$hashed_passwd = hash("whirlpool", $_POST["passwd"]);
	$credentials = array("login" => $_POST["login"], "email" => $_POST["email"], "passwd" => $hashed_passwd, "lvl" => $lvl);
	$db[] = $credentials;
	file_put_contents("db/users", serialize($db));
}

if ($_SESSION["loggued_on_user"])
{
	echo "you are loggued as: ".$_SESSION["loggued_on_user"]."\n";
	return;
}

if (($_POST["login"]) && ($_POST["email"]) && ($_POST["passwd"]) && ($_POST["confirm_passwd"]) && ($_POST["submit"] === "create"))
{
	if (file_exists("db/users"))
		$data = get_file("db/users");
	else
		$data = array();
	if (is_existant($data, $_POST["login"]))
		$retry_msg = $_POST["login"]." is already taken as login";
	else if ($_POST["passwd"] !== $_POST["confirm_passwd"])
		$retry_msg = "password and confirm password not the same";
	else
	{
		insert_user($data, 0);	
		echo "<p>".$_POST["login"]." created succesfully </p>";
		echo "<a href='index.php'> Return to Home page.</a>";
		return;	
	}	
}
else
	$retry_msg = "il manque un truc";

if ($retry_msg)
	echo $retry_msg;
?>

<html>
	<head>
	</head>
	<body>
	<form method="POST" action="create_account.php" name="signup">
		Login: <input type="text" name="login" > <br/>
		Email: <input type="email" name="email"> <br/>
		Mot de passe <input type="password" name="passwd"> <br/>
		Confirmez mot de passe <input type="password" name="confirm_passwd"> <br/>
		<input type="submit" name="submit" value="create"> <br/>
	</body>
</html>

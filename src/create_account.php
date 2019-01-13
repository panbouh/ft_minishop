<?PHP
	session_start();

function is_existant(&$db, $login)
{
	foreach ($db as $credentials)
	{
		if ($credentials["login"] == $login)
			return TRUE;
	}
	return FALSE;
}

function insert_user(&$db)
{
	$hashed_passwd = hash("sha256", $_POST["passwd"]);
	$credentials = array("login" => $_POST["login"], "email" => $_POST["email"], "passwd" => $hashed_passwd);
	$db[] = $credentials;
	file_put_contents("../db/users", serialize($db));
}

if ($_SESSION["loggued_on_user"])
{
	echo "you are loggued as: ".$_SESSION["loggued_on_user"]."\n";
	return;
}

if (($_POST["login"]) && ($_POST["email"]) && ($_POST["passwd"]) && ($_POST["confirm_passwd"]) && ($_POST["submit"] == "create"))
{
	if (file_exists("../db/users"))
	{
		$file = file_get_contents("../db/users");
		$data = unserialize($file);
	}
	else
		$data = array();
	if (is_existant($data, $_POST["login"]))
		$retry_msg = $_POST["login"]." is already taken as login";
	else if ($_POST["passwd"] !== $_POST["confirm_passwd"])
		$retry_msg = "password and confirm password not the same";
	else
	{
		insert_user($data);	
		echo $_POST["login"]." created succesfully";
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
	Email: <input type="text" name="email"> <br/>
	Mot de passe <input type="text" name="passwd"> <br/>
	Confirmez mot de passe <input type="text" name="confirm_passwd"> <br/>
	<input type="submit" name="submit" value="create"> <br/>
</body>
</html>

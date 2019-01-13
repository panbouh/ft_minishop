<?PHP
    session_start();
	function auth($login, $passwd)
	{
		if (!file_exists("db/users"))
			return FALSE;
		$file = file_get_contents("db/users");
		$data = unserialize($file);
		foreach ($data as &$credentials)
		{
			if ($credentials["login"] == $login)
			{
				if ($credentials["passwd"] == hash("whirlpool", $passwd))
					return TRUE;
				return FAlSE;
			}
		}
	}
?>

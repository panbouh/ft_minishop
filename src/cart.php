<?php
    session_start();
	function print_cart()
	{
		if (!isset($_SESSION["cart"]))
		{
			echo "Your cart is empty";
			return;
		}
		$count = 0;
		foreach($_SESSION["cart"] as $item)
		{
			$count++;
		}
		echo "You have ".$count." articles\n";
	}

	function create_cart()
	{

    }

    function add_to_cart($id, $login, $quantity)
    {
		if (!($carts = get_file("db/carts")))
			$carts = array();
		if (isset($cart[$login]))
		{
			$cart[$login][] = array($id, $quantity);	
			return;
		}
		$carts[] = $login;
		$carts[$login][] = array($id, $quantity);
		file_put_contents("db/carts", serialize($carts));
	}

    function get_cart()
    {

    }
?>

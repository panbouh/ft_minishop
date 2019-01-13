<?php
    session_start();
    include("src/showcase.php");
	if ($_GET["add-to-cart"])
	{
		$_SESSION[$_GET["add-to-cart"]] = 1;
	}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style/index.css">
        <title>ft_minishop</title>
    </head>
    <body>
        <header>
            <div id="sel-box">
                <label for="sel-item">Category</label>
                    <select name="" id="sel-item">
                        <option value="cat1">cat1</option>
                        <option value="cat2">cat2</option>
                        <option value="cat3">cat3</option>
                        <option value="cat4">cat4</option>
                    </select>
            </div>
            <h1>ft_minishop</h1>
            
			<?php if ($_SESSION["loggued_on_user"]): 
            echo "Loggued as ".$_SESSION["loggued_on_user"]; ?>
				<form action="src/logout.php">
					<button type="submit" action="src/logout.php" name="logout">LOGOUT</button>
                </form>
            
			<?php else: ?>
            <div id="sign-box">
                <form action="src/sign_in.php" method="POST">
                    <label for="login">login</label>
                    <input type="text" name="login" id="login">
                    <label for="pwd">password</label>
                    <input type="password" name="pwd" id="pwd">
					<button type="submit" name="sign-in">sign in</button>
				</form>
				<form action="src/create_account.php">
                    <button type="submit" name="sign-up">sign up</button>
                </form>
			</div>
			<?php endif; ?>
        </header>

        <?php print_showcase(); ?>

        <section id="cart-box">
           <?php print_cart(); ?>
        </section>
    </body>
</html>
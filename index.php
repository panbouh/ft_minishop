<?php
    include("src/showcase.php");
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
            <div id="sign-box">
                <form action="get">
                    <label for="login">login</label>
                    <input type="text" name="login" id="login">
                    <label for="pwd">password</label>
                    <input type="password" name="pwd" id="pwd">
                    <button type="submit" name="sign-in">sign in</button>
                    <button type="submit" name="sign-up">sign up</button>
                </form>
            </div>
        </header>

        <?php print_showcase(); ?>

        <section id="cart-box">
            <p>You have an empty cart.</p>
        </section>
    </body>
</html>
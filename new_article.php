<?php
    session_start();
    include("src/showcase.php");

    if ($_POST['submit'] === 'OK')
    {
        echo "COUCOU\n";
        $art = array("name" => $_POST['name'], "img" => $_POST['img'], "description" => $_POST['description'], "price" => $_POST['price']);
        create_article($art);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add new article</title>
    </head>
    <body>
        <form action="new_article.php" method="POST">
            
            <label for="name">Name :</label>
            <input type="text" name="name" id="name" required>*
            <br>
            
            <label for="price">Price :</label>
            <input type="number" name="price" id="price" required>*
            <br>
            
            <label for="description">Description :</label>
            <input type="text" name="description" id="description" required>*
            <br>

            <label for="img">Image url :</label>
            <input type="url" name="img" id="img" >
            <br>
            
            <button type="submit" name="submit" value ="OK">ok</button>    
            <button type="reset">reset</button>
            <p>* marked field are required</p>
        </form>
    </body>
</html>
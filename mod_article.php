<?php
    session_start();
    include("src/showcase.php");
    
    $file_in = get_file("article/showcase");

    $id = $_GET['id'];
    echo "id to find = ".$_GET['id']."\n";
    print_r($file_in[$id]);
    // foreach ($file_in as &$article)
    //     if ($article['id'] == $_GET['id'])
    //         break;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>modify article</title>
    </head>
    <body>
        <form action="src/showcase.php" method="POST">
            
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
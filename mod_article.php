<?php
    session_start();
    include("src/showcase.php");
    
    $file_p = "article/showcase";
    $file_in = get_file($file_p);
    print_r($file_in);

    if ($id = $_GET['id'])
        $article = $file_in[$id - 1];

    if ($_POST['submit'] === "OK")
    {
        echo "STOP ID : ".$_POST['id']."\n";
        print_r($file_in);
        echo "<p>Article modified\n</p>";
        $article['name'] = $_POST['name'];
        $article['price'] = $_POST['price'];
        $article['description'] = $_POST['description'];
        $article['img'] = $_POST['img'];
        print_r($file_in);
        file_put_contents($file_p, serialize($file_in));
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>modify article : <?php echo($article['name']);?></title>
    </head>
    <body>
        <form action="mod_article.php" method="POST">
            
            <label for="name">Name :</label>
            <input type="text" name="name" id="name" value=<?php echo($article['name']);?>>
            <br>
            
            <label for="price">Price :</label>
            <input type="number" name="price" id="price" value=<?php echo($article['price']);?>>
            <br>
            
            <label for="description">Description :</label>
            <input type="text" name="description" id="description" value=<?php echo($article['description']);?>>
            <br>

            <label for="img">Image url :</label>
            <input type="url" name="img" id="img" value=<?php echo($article['img']);?>>
            <br>
            <p name="id" value=<?php echo($article['id']); ?>> <?php echo($article['id']); ?> </p>
            <button type="submit" name="submit" value ="OK">ok</button>    
            <button type="reset">reset</button>

        </form>
    </body>
</html>
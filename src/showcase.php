<?php
    function create_article($article)  
    {
        $file_p = "../article/showcase";
        if (file_exists($file))
            $file_in = unserialise(file_get_contents($file_p));
        $file_in[] = $article;
        file_put_contents($file_p, serialize($file_in));
    }
    
    function get_showcase()
    {
        echo "
        <img src='img/blank.png' alt='blank'>
        <article>
            <h2>item_name</h2><h3>item_price</h3>
            <p>item description item description item description item description item description item description item description item description...</p>
        </article>
        <button type='submit' name='add-to-cart'>add</button> 
        ";
    }

    $art = array("name" => "name", "img" => "img.png", "description" => "description", "price" => 0);

    create_article($art);
?>
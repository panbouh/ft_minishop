<?php
    function create_article($article)  
    {
        $file_p = "../article/showcase";
        $file_in = get_file($file_p);
        $file_in[] = $article;
        file_put_contents($file_p, serialize($file_in));
    }
    
    function get_file($file_p)
    {
        if (file_exists($file_p))
            return (unserialize(file_get_contents($file_p)));
        return (FALSE);
    }

    function print_showcase()
    {
        $file_p = "article/showcase";
        $showcase = get_file($file_p);
        foreach ($showcase as $article)
        {
        echo "
                <section class='item-box'>
                    <img src='".$article['img']."' alt='img-article'>
                    <article>
                        <h2>".$article['name']."</h2><h3>".$article['price']."</h3>
                        <p>".$article['description']."</p>
                    </article>
                    <button type='submit' name='add-to-cart'>add</button>
                </section>
            ";
        }
    }

    $art = array("name" => "name", "img" => "img/blank.png", "description" => "description", "price" => "0");

    if ($_POST['submit'] === 'OK')
    {
        create_article($art);
    }
?>
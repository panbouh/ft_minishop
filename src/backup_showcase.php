<?php
    session_start();
    include("get_file.php");
    function create_article($article)  
    {
        $file_p = "db/showcase";
        if (!($file_in = get_file($file_p)))
            $file_in = NULL;                    //for count is 0 with empty, else is 1
        $file_in[] = $article;
        $file_in = set_id($file_in);
        file_put_contents($file_p, serialize($file_in));
    }

    function set_id($file_in)
    {
        $id = 1;
        foreach ($file_in as &$article)
        {
            $article['id'] = $id;
            $id++;
        }
        return ($file_in);
    }

    function print_showcase()
    {
        $file_p = "db/showcase";
        $showcase = get_file($file_p);
        foreach ($showcase as $article)
        {
        echo "
                <section class='item-box'>
                    <img src='".$article['img']."' alt='img-article'>
                    <article>
                        <h2>".$article['name']."</h2><h3>".$article['price']." $</h3>
                        <p>".$article['description']."</p>
                    </article>
                    <button type='submit' name='add-to-cart'>add</button>
                    <form action='mod_article.php' method='get'>
                        <button type='submit' name='id' value='".$article['id']."'>modify</button>
                    </form>
                </section>
            ";
        }
    }
?>

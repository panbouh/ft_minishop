<?php
    function create_article($article)  
    {
        $file_p = "../article/showcase";
        if (!($file_in = get_file($file_p)))
            $file_in = NULL;                    //for count is 0 with empty, else is 1
        set_id($file_in);
        $file_in[] = $article;
        file_put_contents($file_p, serialize($file_in));
    }
    
    function set_id($file_in)
    {
        foreach ($file_in as &$article)
        {
            
        }
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

    if ($_POST['submit'] === 'OK')
    {
        $art = array("name" => $_POST['name'], "img" => $_POST['img'], "description" => $_POST['description'], "price" => $_POST['price']);
        create_article($art);
    }
?>
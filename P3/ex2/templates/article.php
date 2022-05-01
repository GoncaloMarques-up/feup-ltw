<?php

    require_once('common.php');

    function printArticle(array $article, int $key = 0) {
        echo "<article>";
            echo "<header>";
                echo "<h1><a href=\"item.php?id=".$article["id"]."\">".$article["title"]."</a>";
                echo "</header>";
            echo "<img src=\"https://picsum.photos/600/300?".images[$key % count(images)]."\" alt=\"\">";
            echo "<p>".$article["introduction"]."</p>";
            
            foreach (explode("\n", $article["fulltext"]) as $paragraph)
                if (!empty($paragraph))
                    echo "<p>".$paragraph."</p>";

            printArticleFooter($article, $article['comments']);

        echo "</article>";
    }
?>

<?php function printArticles(array $articles) { ?>
    <section id="news">
    <?php
        session_start();

        if (isset($_SESSION['username']))
            echo '<span id="create-article"><a href="/add_item.php">New post</a></span>';
    ?>
    <?php 
        foreach ($articles as $key=>$article)
            printArticle($article, $key);
    ?>
    </section>
<?php } ?>
<?php function printComment(array $comment) { ?>
    <article class="comment">
        <span class="user"><?=$comment["username"]?></span>
        <span class="date"><?=date('F j', $comment['published'])?></span>
        <p><?=$comment["text"]?></p>
    </article>
<?php } ?>

<?php function outputCommentForm(int $article_id) { ?>
    <form>
        <h2>Add your voice...</h2>
        <label>Comment
            <textarea name="comment"></textarea>            
        </label>
        <input type="hidden" name="article_id" value="<?=$article_id?>">
        <input type="hidden" name="referer" value="/item.php?id=<?=$article_id?>">
        <button formaction="../actions/action_create_comment.php" formmethod="post">Reply</button>
    </form>
<?php } ?>

<?php function printCommentsSection(int $article_id, array $comments, int $comments_count) { ?>
    <section id="comments">
        <h1><?= $comments_count ?> Comments</h1>

        <?php 
            foreach($comments as $comment)
                printComment($comment);
        ?>

    <?php 
        session_start();

        if (isset($_SESSION['username']))
            outputCommentForm($article_id);
    ?>
    </section>
<?php } ?>

<?php function printArticleExtended(array $article, array $comments, int $comments_count) { ?>
    <section id="news">
      <article>
        <header>
          <h1><a href="#"><?=$article['title']?></a></h1>
        </header>
        <img src="https://picsum.photos/600/300?business" alt="">
        
        <p><?=$article['introduction']?></p>
        <?php foreach (explode("\n", $article["fulltext"]) as $paragraph)
          if (!empty($paragraph))
        ?>
        <p><?=$paragraph?></p>

        <?php if (array_key_exists("username", $_SESSION) && strcmp($article['username'], $_SESSION["username"]) === 0) { ?>
        <span id="edit-button"><a href="/edit_item.php?id=<?=$article['id']?>">Edit</a></span>
        <span id="delete-button"><a href="../actions/action_delete_article.php?id=<?=$article['id']?>">Delete</a></span>
        <?php } ?>

        <?php printCommentsSection($article['id'], $comments, $comments_count); ?>
        
        <?php printArticleFooter($article, $comments_count); ?>
      </article>
    </section>
<?php } ?>
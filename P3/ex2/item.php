<?php

  session_start();

  require_once("./database/connection.php");
  require_once("./database/news.php");
  require_once("./database/comments.php");

  require_once("./templates/common.php");
  require_once("./templates/item.php");
  
  $db = getDBConnection('./database/news.db');
  
  if (!($article = getArticle($db, $_GET['id'])))
    die('Article not found');

  if (!($results = getCommentsFor($db, $_GET['id'])))
    die('Comments not found');

  list($comments, $comments_count) = $results;

?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Super Legit News</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles/style.css" rel="stylesheet">
    <link href="./styles/layout.css" rel="stylesheet">
    <link href="./styles/responsive.css" rel="stylesheet">
    <link href="./styles/comments.css" rel="stylesheet">
    <link href="./styles/forms.css" rel="stylesheet">
  </head>
  <body>
    <?php outputHeader(); ?>
    <?php outputMenu(); ?>
    <?php outputRelated(); ?>
    <?php printArticleExtended($article, $comments, $comments_count['comment_count']); ?>
    <?php outputFooter(); ?>
  </body>
</html>
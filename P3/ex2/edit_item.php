<?php 

    session_start();

    if (!array_key_exists("username", $_SESSION))
        header('Location: /index.php');

    if (!isset($_GET['id']))
        die("Must provide an id");

    require_once('./database/connection.php');
    require_once('./database/news.php');

    $db = getDBConnection('./database/news.db');
    
    if (!($article = getArticle($db, $_GET['id'])))
        die("Failed to get article");

    require_once('./templates/common.php');

    require_once('./templates/form.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
</head>
<body>
    <?php outputHeader(); ?>
    <?php outputMenu(); ?>
    <?php outputRelated(); ?>
    <?php printEditItemForm($article); ?>
    <?php outputFooter(); ?>
</body>
</html>
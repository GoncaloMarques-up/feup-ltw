<?php 

    if (strcmp($_SERVER['REQUEST_METHOD'], "POST") !== 0) {
        header("Location: /index.php");
        die;
    }

    session_start();

    if (!array_key_exists("username", $_SESSION))
        header('Location: /index.php');

    if (!isset($_POST['id']) || !isset($_POST['title']) || !isset($_POST['introduction']) || !isset($_POST['fulltext']))
        die("Error: some form data isn't set");

    require_once('../database/connection.php');
    require_once('../database/news.php');

    $db = getDBConnection('../database/news.db');

    updateArticle($db, $_POST['id'], array($_POST['title'],  $_POST['introduction'], $_POST['fulltext']));

    header('Location: /item.php?id='.$_POST['id']);
?>
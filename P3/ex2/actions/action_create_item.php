<?php

    if (strcmp($_SERVER['REQUEST_METHOD'], "POST") !== 0) {
        header("Location: /index.php");
        die;
    }

    session_start();

    if (!isset($_SESSION['username']))
        header('Location: ' . $_POST['referer']);

    if (!isset($_POST['title']) || empty($_POST['tags']) || !isset($_POST['introduction']) || !isset($_POST['fulltext'])) {
        die("Error: some form data isn't set");
        print_r($_POST);
    }

    require_once('../database/connection.php');
    require_once('../database/news.php');

    $db = getDBConnection('../database/news.db');

    $data = array(
        $_POST['title'],
        $_POST['tags'],
        $_SESSION['username'],
        $_POST['introduction'],
        $_POST['fulltext']
    );

    $articleId = createArticle($db, $data);

    header('Location: /item.php?id='.$articleId);
?>
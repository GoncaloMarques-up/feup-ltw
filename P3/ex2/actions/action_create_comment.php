<?php

    if (strcmp($_SERVER['REQUEST_METHOD'], "POST") !== 0) {
        header("Location: /index.php");
        die;
    }

    session_start();

    if (!isset($_SESSION['username']))
        header('Location: ' . $_POST['referer']);

    if (!isset($_POST['comment']) || empty($_POST['comment']) || !isset($_POST['article_id']) || !isset($_POST['referer'])) {
        die("Error: some form data isn't set");
        print_r($_POST);
    }

    require_once('../database/connection.php');
    require_once('../database/comments.php');

    $db = getDBConnection('../database/news.db');

    createComment($db, array($_POST['article_id'], $_SESSION['username'], $_POST['comment']));

    header('Location: ' . $_POST['referer']);
?>
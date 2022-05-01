<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die;
    }

    if (!isset($_GET['id'])) {
        die("Error: some form data isn't set");
        print_r($_POST);
    }

    require_once('../database/connection.php');
    require_once('../database/news.php');

    $db = getDBConnection('../database/news.db');

    deleteArticle($db, $_GET['id']);

    header('Location: /index.php');
?>
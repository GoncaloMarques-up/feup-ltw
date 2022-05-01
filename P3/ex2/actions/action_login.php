<?php

    if (strcmp($_SERVER['REQUEST_METHOD'], "POST") !== 0) {
        header("Location: /index.php");
        die;
    }

    session_start();

    if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['referer'])) {
        die("Error: some form data isn't set");
        print_r($_POST);
    }

    require_once('../database/connection.php');
    require_once('../database/users.php');

    $db = getDBConnection('../database/news.db');

    if (userExists($db, $_POST['username'], $_POST['password']))
        $_SESSION['username'] = $_POST['username'];

    header('Location: ' . $_POST['referer']);
?>
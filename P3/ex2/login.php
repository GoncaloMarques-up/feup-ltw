<?php

  session_start();

  require_once("./templates/common.php");

  require_once("./templates/form.php");

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
    <?php outputLoginForm(); ?>
    <?php outputFooter(); ?>
  </body>
</html>
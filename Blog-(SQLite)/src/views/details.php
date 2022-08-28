<?php
require ('../controllers/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../styles/css/main.css" rel="stylesheet">
    <link href="../styles/css/reset.css" rel="stylesheet">
    <title>Detail</title>
</head>
<body>
<header class="navbar">
    <p id="banner">My Blog</p>
    <a href="./home.php">Home</a>
</header>
<main>
    <p class="header"></p>
    <?php
    $article = new Articles();
    $title = $_GET['title'];
    if (count($article->getArticles()) > 0){
        $myArticle = $article->findArticle($title);
        echo '<div class="articles">';
        echo '<div class="article">';
        echo '<p class="title">'.$myArticle['title'].'</p>';
        echo '<p class="summery">'.$myArticle['description'].'</p>';
        echo '</div>';
    }
    ?>
</main>
</body>
</html>
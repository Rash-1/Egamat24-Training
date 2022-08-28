<?php
require ('../controllers/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../styles/css/main.css" rel="stylesheet">
    <link href="../styles/css/reset.css" rel="stylesheet">
    <title>Home</title>
</head>
<body>
<header class="navbar">
    <p id="banner">My Blog</p>
    <a href="./login.php">Admins</a>
</header>
<main>
    <p class="header">Articles</p>
    <?php
    $articles = new Articles();
    if (count($articles->getArticles()) > 0){
        $myArticles = $articles->getArticles();
        echo '<div class="articles">';
        foreach ($myArticles as $article){
            echo '<div class="article">';
            echo '<p class="title">'.$article['title'].'</p>';
            echo '<p class="summery">'.$article['summery'].'<a href="./details.php?title='.$article['title'].'"'.'>...+more</a>'.'</p>';
            echo '</div>';
        }
    }
    ?>
</main>
</body>
</html>
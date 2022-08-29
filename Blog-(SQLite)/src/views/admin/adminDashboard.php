<?php
require('../../controllers/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../../styles/css/main.css" rel="stylesheet">
    <link href="../../styles/css/reset.css" rel="stylesheet">
    <title>Home</title>
</head>
<body>
<header class="navbar">
    <p id="banner">My Blog</p>
    <a href="./createArticle.php">Create Article</a>
    <a href="../home.php">Log Out</a>
</header>
<main>
    <p class="header">Dashboard</p>
    <div class="admin-articles">
        <div class="admin-article">
            <p>title1</p><hr>
            <p>summery1</p><hr>
            <p>description1</p><hr>
            <div class="buttons">
                <a href="../../controllers/handleDelete.php?title=title1"  class="delete-button">Delete</a>
                <a href="./editArticle.php?title=title1" >Edit</a>
            </div>
        </div>
        <?php
            $articles = new Articles();
            $myArticles = $articles->getArticles();
            foreach ($myArticles as $article){
                echo '<div class="admin-article">';
                    echo '<p>'.$article['title'].'</p><hr>';
                    echo '<p>'.$article['summery'].'</p><hr>';
                    echo '<p>'.$article['description'].'</p><hr>';
                    echo '<div class="buttons">';
                        echo '<a href="../../controllers/handleDelete.php?title='.$article['title'].'"'.'class="delete-button">Delete</a>';
                        echo '<a href="./editArticle.php?title'. $article['title'].'"'.'>Edit</a>';
                    echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
</main>
</body>
</html>
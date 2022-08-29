<?php
require_once ('../../controllers/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../../styles/css/main.css" rel="stylesheet">
    <link href="../../styles/css/reset.css" rel="stylesheet">
    <title>Edit Article</title>
</head>
<body>
<header class="navbar">
    <p id="banner">My Blog</p>
    <a href="../home.php">Home</a>
    <a href="./adminDashboard.php">Dashboard</a>
</header>
<main>
    <p class="header">Edit Article</p>
    <div class="login-form">
        <?php
        if (!empty($_GET['massage'])){
            echo '<p class="error">'.$_GET['massage'].'</p>';
        }
        $articleTitle = $_GET['title'];
        $article = new Articles();
        $myArticle = $article->findArticle($articleTitle);
        ?>
        <form action="../../controllers/handleEdit.php?oldTitle=<?php echo $articleTitle ?>" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input value="<?php echo $myArticle['title']?>"  type="text" name="newTitle" id="title">
            </div>
            <div class="form-group">
                <label for="summery">Summery</label>
                <textarea name="newSummery" id="summery"> <?php echo $myArticle['summery']?> </textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="newDescription" id="description"> <?php echo $myArticle['description']?> </textarea>
            </div>
            <div class="login-footer">
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
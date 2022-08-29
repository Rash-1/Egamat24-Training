<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../../styles/css/main.css" rel="stylesheet">
    <link href="../../styles/css/reset.css" rel="stylesheet">
    <title>Create Article</title>
</head>
<body>
<header class="navbar">
    <p id="banner">My Blog</p>
    <a href="../home.php">Home</a>
    <a href="./adminDashboard.php">Dashboard</a>
</header>
<main>
    <p class="header">Create Article</p>
    <div class="login-form">
        <?php
        if (!empty($_GET['massage']))
            echo '<p class="error">'.$_GET['massage'].'</p>';
        ?>
        <form action="../../controllers/handleCreate.php" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input  type="text" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="summery">Summery</label>
                <textarea   name="summery" id="summery"></textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea   name="description" id="description"></textarea>
            </div>
            <div class="login-footer">
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
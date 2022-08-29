<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../../styles/css/main.css" rel="stylesheet">
    <link href="../../styles/css/reset.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<header class="navbar">
    <p id="banner">My Blog</p>
    <a href="../home.php">Home</a>
</header>
<main>
    <p class="header">Login</p>
    <div class="login-form">
        <?php
        if (!empty($_GET['massage']))
            echo '<p class="error">'.$_GET['massage'].'</p>';
        ?>
        <form action="../../controllers/handleLogin.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input  type="text" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input  type="password" name="password" id="password">
            </div>
            <div class="login-footer">
                <button type="submit">Login</button>
                <a href="register.php">Not Registered Yet!</a>
            </div>
        </form>
    </div>
</main>
</body>
</html>
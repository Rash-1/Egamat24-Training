<?php

require_once('database.php');

$title = $_POST['title'];
$summery = $_POST['summery'];
$description = $_POST['description'];

if (!empty($title)){
    $article = new Articles();
    $result = $article->addArticle($title,$summery,$description);
    if ($result) {
        $location = 'http://localhost:8080/Egamat24-training/Blog-(SQLite)/src/views/admin/createArticle.php?massage=Article Created Successfully';
        header('location:' . $location);
    } else {
        $location = 'http://localhost:8080/Egamat24-training/Blog-(SQLite)/src/views/admin/createArticle.php?massage=Article Creation Failed';
        header('location:' . $location);
    }
} else {
    $location = 'http://localhost:8080/Egamat24-training/Blog-(SQLite)/src/views/admin/createArticle.php?massage=Title Cannot Be Empty';
    header('location:' . $location);
}
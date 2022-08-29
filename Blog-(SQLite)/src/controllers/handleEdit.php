<?php

require_once('database.php');
$newTitle = $_POST['newTitle'];
$newSummery = $_POST['newSummery'];
$newDescription = $_POST['newDescription'];
$oldTitle = $_GET['oldTitle'];

$article = new Articles();
$result = $article->editArticle($oldTitle,$newTitle,$newSummery,$newDescription);

if ($result) {
    $location = 'http://localhost:8080/Egamat24-training/Blog-(SQLite)/src/views/admin/editArticle.php?massage=Article Edited Successfully';
    header('location:' . $location);
} else {
    $location = 'http://localhost:8080/Egamat24-training/Blog-(SQLite)/src/views/admin/editArticle.php?massage=Article  Edition Failed';
    header('location:' . $location);
}

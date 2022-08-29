<?php
require_once ('database.php');
$username = $_POST['username'];
$password = $_POST['password'];

$admins = new Admins();
$result = $admins->isAdmin($username,$password);
if (!empty($username)&&!empty($password)){
    if ($result){
        $location = 'http://localhost:8080/Egamat24-training/Blog-(SQLite)/src/views/admin/adminDashboard.php';
        header('location:'.$location);
    }else{
        $location = 'http://localhost:8080/Egamat24-training/Blog-(SQLite)/src/views/admin/login.php?massage=Login Failed';
        header('location:'.$location);
    }
}else{
    $location = 'http://localhost:8080/Egamat24-training/Blog-(SQLite)/src/views/admin/login.php?massage=Username And Password Cannot Be Empty';
    header('location:'.$location);
}

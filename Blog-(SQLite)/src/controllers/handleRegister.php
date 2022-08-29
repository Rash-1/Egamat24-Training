<?php
require_once ('database.php');
$username = $_POST['username'];
$password = $_POST['password'];
if (!empty($username)&&!empty($password)){
    $admins = new Admins();
    $result = $admins->addAdmin($username,$password);
    if ($result){
        $location = 'http://localhost:8080/Egamat24-training/Blog-(SQLite)/src/views/admin/adminDashboard.php';
        header('location:'.$location);
    }else{
        $location = 'http://localhost:8080/Egamat24-training/Blog-(SQLite)/src/views/admin/login.php?massage=Register Failed';
        header('location:'.$location);
    }
}else{
    $location = 'http://localhost:8080/Egamat24-training/Blog-(SQLite)/src/views/admin/register.php?massage=Username And Password Cannot Be Empty';
    header('location:'.$location);
}
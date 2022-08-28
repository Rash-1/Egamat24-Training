<?php
class Database{
    function connect(){
        try {
            $dsn = "sqlite:../../database/myBlog.db";
            $pdo = new PDO($dsn);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $pdo;
        }catch (PDOException $exception){
            echo "Connection Failed".$exception->getMessage();
        }
    }
}


class Admins extends Database {
    function countAdmins(){
        $query = "SELECT * FROM admins";
        $pdo = $this->connect();
        $result = $pdo->query($query);
        return $result->rowCount();
    }
    function isAdmin($username,$password){
        $pdo = $this->connect();
        $query = "SELECT * FROM admins WHERE username=:username AND password=:password";
        $data = $data = ['username'=>$username,'password'=>$password];
        $result = $pdo->prepare($query);
        $result->execute($data);
        $admin = $result->fetchAll();
        return count($admin) > 0 ;

    }
    function addAdmin($username,$password){
        $pdo = $this->connect();
        $query = "INSERT INTO admins(username,password)VALUES (:username,:password)";
        $data = ['username'=>$username,'password'=>$password];
        $result = $pdo->prepare($query);
        return $result->execute($data);
    }
}
class Articles extends Database {
    function getArticles(){
        $pdo = $this->connect();
        $query = "SELECT * FROM articles";
        $result = $pdo->query($query);
        return $result->fetchAll();
    }
    function deleteArticle($articleTitle){
        $pdo = $this->connect();
        $query = "DELETE FROM articles WHERE title=:title";
        $data = ['title'=>$articleTitle];
        $result =$pdo->prepare($query);
        return $result->execute($data);
    }
    function addArticle($title,$summery,$description){
        $pdo = $this->connect();
        $query = "INSERT INTO articles(title,summery,description)VALUES (:title,:summery,:description)";
        $data = ['title'=>$title,'summery'=>$summery,'description'=>$description];
        $result = $pdo->prepare($query);
        return $result->execute($data);
    }
    function editArticle($oldArticleTitle,$newTitle,$newSummery,$newDescription){
        $pdo = $this->connect();
        $query = "UPDATE articles SET title=:newTitle, summery=:newSummery, description=:newDescription WHERE title=:title";
        $data = ['title'=>$oldArticleTitle,'newTitle'=>$newTitle,'newSummery'=>$newSummery,'newDescription'=>$newDescription];
        $result =$pdo->prepare($query);
        return $result->execute($data);
    }
}
<?php
define("Hostname", "localhost");
define("DBname", "taskdev");
define("Userserver", "root");
define("Passserver", "Admin!@#");
$pdo = new PDO('mysql:host=' . Hostname . ';dbname=' . DBname, Userserver, Passserver);

function connectToDB()
{
    try {
        return new PDO('mysql:host=' . Hostname . ';dbname=' . DBname, Userserver, Passserver);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function userGet($username, $conn)
{
    $statment = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $statment->bindParam("username", $username);
    $statment->execute();

    $user = $statment->fetch(PDO::FETCH_OBJ);

    return $user ? $user : false;
}

function userSave($data, $conn)
{
    $fullname = $data["fullname"];
    $username = $data["username"];
    $email = $data["email"];
    $password = $data["password"];
    $statment = $conn->prepare("INSERT INTO users (fullname , username , email , password ) VALUES (:fullname , :username , :email , :password )");
    $statment->bindParam("fullname", $fullname);
    $statment->bindParam("username", $username);
    $statment->bindParam("email", $email);
    $statment->bindParam("password", $password);
    return $statment->execute() ? true : false;
}

function postSave($datapost, $conn)
{
    $title = $datapost["title"];
    $Description = $datapost["Description"];
    $Category = $datapost["Category"];
    $img = $datapost["img"];
    $time = $datapost["time"];
    $userid = $datapost["userid"];
    $post = $conn->prepare("INSERT INTO post (users_id ,title , description , Category_id , images, Create_at  ) VALUES 
(:userid ,:title , :Description , :Category , :images, :create_at )");
    $post->bindParam("title", $title);
    $post->bindParam("Description", $Description);
    $post->bindParam("userid", $userid, PDO::PARAM_INT);
    $post->bindParam("Category", $Category, PDO::PARAM_INT);
    $post->bindParam("images", $img, PDO::PARAM_LOB);
    $post->bindParam("create_at", $time);
    return $post->execute() ? true : false;
}

function userupdate($dataup, $conn)
{
    $fullname = $dataup["fullname"];
    $username = $dataup["username"];
    $email = $dataup["email"];
    $password = $dataup["password"];
    $id = $dataup["id"];
    $userupdate = $conn->prepare("UPDATE users SET fullname  = :fullname, username = :username, email = :email, password = :password WHERE id = :id");
    $userupdate->bindParam("fullname", $fullname);
    $userupdate->bindParam("username", $username);
    $userupdate->bindParam("email", $email);
    $userupdate->bindParam("password", $password);
    $userupdate->bindParam("id", $id, PDO::PARAM_INT);
    return $userupdate->execute() ? true : false;
}

function postupdate($postup, $conn){
    $title= $postup["title"];
    $Descriptio= $postup["Description"];
    $Category= $postup["Category"];
    $img= $postup["img"];
    $id=$postup["id"];
    $postupdatedimg = $conn->prepare("UPDATE post SET title = :titleupdate, description = :descriptionupdate, Category_id = :Categoryupdate, images = :imagesupdate  WHERE id = :id;");
    $postupdatedimg->bindParam("titleupdate", $title);
    $postupdatedimg->bindParam("descriptionupdate", $Descriptio);
    $postupdatedimg->bindParam("Categoryupdate", $Category, PDO::PARAM_INT);
    $postupdatedimg->bindParam("imagesupdate", $img, PDO::PARAM_LOB);
    $postupdatedimg->bindParam("id", $id, PDO::PARAM_INT);
    return $postupdatedimg->execute()? true : false;
}
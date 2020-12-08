<?php
require_once "functions.php";
$pdo = new PDO('mysql:host='. Hostname .';dbname='. DBname,Userserver,Passserver);


$id = isset($_GET["userid"]) ? $_GET["userid"] : 0 ;
$selpost= $pdo->prepare("select username from users where id = :id ");
$selpost->bindParam("id" , $id , PDO::PARAM_INT);
$selpost->execute();
$user = $selpost->fetch(PDO::FETCH_OBJ);
$delpost =$pdo->prepare("delete from post where users_id =  :id ");
$delpost->bindParam("id" , $id , PDO::PARAM_INT);
$delpost->execute();
$id = (int)(isset($_GET["userid"]) ? $_GET["userid"] : 0) ;
$deluser =$pdo->prepare("delete from users where id=:id ");
$deluser->bindParam("id" , $id , PDO::PARAM_INT);
$reza = $deluser->execute();
$username = $_SESSION['username'];

if ($username == $user){
    redirect("index.php");
}
print_r("succes");
//redirect("adminpanel.php");
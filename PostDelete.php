<?php
require_once "functions.php";
$pdo = new PDO('mysql:host='. Hostname .';dbname='. DBname,Userserver,Passserver);
$id = isset($_GET["postid"]) ? $_GET["postid"] : 0 ;
$delpost =$pdo->prepare("delete from post where id =  :id ");
$delpost->bindParam("id" , $id , PDO::PARAM_INT);
$delpost->execute();

redirect("adminpanel.php");

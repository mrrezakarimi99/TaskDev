<?php
require_once "functions.php";
$pdo = new PDO('mysql:host='. Hostname .';dbname='. DBname,Userserver,Passserver);
$id = isset($_GET["userid"]) ? $_GET["userid"] : 0 ;
$ui = $_GET["userid"];
$delpho =$pdo->prepare("update post set images = null where id =  :id ");
$delpho->bindParam("id" , $id , PDO::PARAM_INT);
$delpho->execute();
redirect('PostUpdate.php?postid='.$ui);



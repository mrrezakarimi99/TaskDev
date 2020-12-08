<?php
require_once "functions.php";
$status = "";
$username = $_SESSION['username'];
$conn = connectToDB();
$userlogin = $conn->prepare("select * from users where username = '$username'");
$userlogin->execute();
$userlog = $userlogin->fetchAll();
$userid = $userlog[0]["id"];
if (isPost()) {
    if (isset($_FILES['images']['tmp_name'])){
        $imgs = file_get_contents($_FILES['images']['tmp_name']);
    }
    else{
        $imgs = null;
    }
    $datapost = [
        "title" => $_POST["title"],
        "Description" => $_POST["Description"],
        "Category" => $_POST["Category"],
        "time" => $_POST["time"],
        "img" => $imgs,
        "userid" => $userid
    ];
    if (validation_required([$_POST["title"], $_POST["Description"], $_POST["Category"], $_POST["time"]])) {
        $errors = array();
        if (isset($imgs)) {
            $imagesize = filesize($_FILES['images']['tmp_name']);
            var_dump($imagesize);
            $file_ext = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
            $expensions = array("jpeg", "jpg", "png");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                echo "extension not allowed, please choose a JPEG or PNG file.";
            } elseif ($imagesize > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
                echo "File size must be excately 2 MB";
            }
        }else{
            $errors = null ;
        }
        if (empty($errors) == true) {
            $conn = connectToDB();
            postSave($datapost, $conn) ? redirect("adminpanel.php") : var_dump($datapost);
        }
    } else {
        echo "Please fill in all fields ";
    }
}

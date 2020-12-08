<?php
require_once "functions.php";
$statusupdate = null;
extract($_POST);
$pdo = new PDO('mysql:host=' . Hostname . ';dbname=' . DBname, Userserver, Passserver);
$id = isset($_GET["postid"]) ? $_GET["postid"] : $idup;
$postupdate = $pdo->prepare(" select * from post where id =  :id");
$postupdate->bindParam("id", $id, PDO::PARAM_INT);
$postupdate->execute();
$postup = $postupdate->fetchAll(PDO::FETCH_OBJ);
$cid = $postup[0]->category_id;
$categorys = $pdo->prepare(" select * from category ");
$categorys->execute();
$cats = $categorys->fetchAll(PDO::FETCH_OBJ);
$category = $pdo->prepare(" select * from category where category_id =  $cid");
$category->execute();
$cat = $category->fetchAll(PDO::FETCH_OBJ);
if (isPost()) {
    if (validation_required([$_POST["titleupdate"], $_POST["Descriptionupdate"], $_POST["Categoryupdate"]])) {
        $Imgupdate = isset($_FILES["Imgupdate"]['tmp_name']) ? $_FILES["Imgupdate"]['tmp_name'] : null;
        $error = array();
        $conn = connectToDB();
        if (!$Imgupdate) {
            $postup = [
                "title" => $_POST["titleupdate"],
                "Description" => $_POST["Descriptionupdate"],
                "Category" => $_POST["Categoryupdate"],
                "id" => $id,
                "img" => $postup[0]->images
            ];
            postupdate($postup, $conn) ? redirect("adminpanel.php") : $statusupdate = "cant update";
        } else {
            $img = file_get_contents($_FILES["Imgupdate"]['tmp_name']);
            $imagesize = filesize($_FILES['Imgupdate']['tmp_name']);
            $file_ext = pathinfo($_FILES['Imgupdate']['name'], PATHINFO_EXTENSION);
            $expensions = array("jpeg", "jpg", "png");
            if (in_array($file_ext, $expensions) === false) {
                $error[] = "extension not allowed, please choose a JPEG or PNG file.";
                echo "extension not allowed, please choose a JPEG or PNG file.";
            } elseif ($imagesize > 2097152) {
                $error[] = 'File size must be excately 2 MB';
                echo "File size must be excately 2 MB";
            } else {
                $postup = [
                    "title" => $_POST["titleupdate"],
                    "Description" => $_POST["Descriptionupdate"],
                    "Category" => $_POST["Categoryupdate"],
                    "id" => $id,
                    "img" => $img
                ];
                postupdate($postup, $conn) ? redirect("adminpanel.php") : $statusupdate = "cant update";
            }
        }
    } else {
        $statusupdate = "Please fill in all fields";
    }
}
require "./views/Postupdate.view.php";
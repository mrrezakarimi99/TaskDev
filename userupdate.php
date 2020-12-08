<?php
require_once "functions.php";
$statusuupdate = null;
extract($_POST);
$id = isset($_GET["userid"]) ? $_GET["userid"] : $idup;
$userupdate = $pdo->prepare(" select * from users where id =  :id");
$userupdate->bindParam("id", $id, PDO::PARAM_INT);
$userupdate->execute();
$userup = $userupdate->fetchAll(PDO::FETCH_OBJ);
if (isPost()) {
    $dataup = [
        "fullname" => $_POST["fullnameupdate"],
        "username" => $_POST["usernameupdate"],
        "email" => $_POST["emailupdate"],
        "password" => $_POST["passwordupdate"],
        "id" => $id
    ];
    if (validation_required([$_POST["fullnameupdate"], $_POST["usernameupdate"], $_POST["emailupdate"], $_POST["passwordupdate"]])) {
        if (validation_email($_POST["emailupdate"])) {
            if ($_POST["passwordupdate"] == "********") {
                $passwordupdate = $userup[0]->password;
            } else {
                $passwordupdate = hash_hmac("sha256", $_POST["passwordupdate"], "secert");
            }
            $conn = connectToDB();
            if ($_POST["usernameupdate"] == $userup[0]->username) {
                userupdate($dataup, $conn) ? redirect("adminpanel.php") : $status = "user not save plase try again";
                $statusuupdate = "Update successful";
            } elseif (!userGet($_POST["usernameupdate"], $conn)) {
                userupdate($dataup, $conn) ? redirect("adminpanel.php") : $status = "user not save plase try again";
                $statusuupdate = "Update successful";
            } else {
                $statusuupdate = "this username is exists";
            }
        } else {
            $statusuupdate = "Invalid email format";
        }
    } else {
        $statusuupdate = "Please fill in all fields ";
    }
}
require "./views/userupdate.view.php";


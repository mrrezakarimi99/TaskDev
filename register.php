<?php

require_once "functions.php";
$status = null;

//AuthLogout();

if( isPost() ) {
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (validation_email($email)) {
        $password = hash_hmac("sha256", $password, "secert");
        $data = [
            "fullname" => $fullname,
            "username" => $username,
            "email" => $email,
            "password" => $password
        ];
        $conn = connectToDB();
        if (!userGet($username, $conn)) {
            if (userSave($data, $conn)) {
                $status = "add this username  ";
                print_r($status);

            } else {
                $status = "dont add this username";
                print_r($status);
            }
        } else {
            $status = "this username is exists";
            print_r($status);
        }
    } else {
        $status = "Invalid email format";
        print_r($status);
    }
}


//    if( validation_required([$fullname ,$username , $email , $password]) ) {
//        if(validation_email($email)) {
//            $password = hash_hmac("sha256" , $password , "secert");
//            $data = [
//                "fullname" => $fullname ,
//                "username" => $username ,
//                "email" => $email,
//                "password" => $password
//            ];
//            $conn = connectToDB();
//            if( ! userGet($username , $conn)) {
//                userSave($data , $conn) ? redirect("adminpanel.php") : $status = "user not save plase try again" ;
//            } else {
//                echo "this username is exists";
//            }
//        } else {
//            $status = "Invalid email format";
//        }
//    } else {
//        $status = "Please fill in all fields ";
//    }
//
//redirect("adminpanel.php" . $status = "user not save plase try again");
//require "views/register.view.php";

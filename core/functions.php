<?php
/**
 * Created by PhpStorm.
 * User: Boca
 * Date: 01.04.2016
 * Time: 13:15
 */
include "config.php";
session_start();
$target_file="";
function checkLogin(){
    if(isset($_SESSION["logat"]))
        header("Location: members.php");
}
function checkIfNotLogin(){
    if(!isset($_SESSION["logat"]))
        header("Location: login.php");
}
function logout(){
    if (isset($_GET["logout"])&& $_GET["logout"]==1){
        unset($_SESSION["logat"]);
        header("Location: login.php");
    }
}
function insert($data){
    include "config.php";
    if($data["nume"]!=""&&$data["prenume"]!=""&&$data["facebook"]!=""&&$data["departament"]!=""&&$data["email"]!=""&&$data["phone"]!="") {
        if(filter_var($data["facebook"],FILTER_VALIDATE_URL)===FALSE)
        return "Nu ai inserat un url de facebook valid.";
        if(!(strtolower($data["departament"])=="it"||strtolower($data["departament"])=="proiecte"||strtolower($data["departament"])=="pr&media"||strtolower($data["departament"])=="evaluari"||strtolower($data["departament"])=="ri"||strtolower($data["departament"])=="re")){
            return "Nu ai inserat un departament valid (Ex:\"it\", \"pr&media\",\"evaluari\",\"re\",\"ri\",\"proiecte\")";
        }
        if(!filter_var($data["email"],FILTER_VALIDATE_EMAIL))
        return "Nu ai inserat un email valid.";
        if(strlen($data["phone"])<10)
        return "Nu ai inserat un numar de telefon valid.";
        $mesage=uploadFile();
        if($mesage[0]=="u" &&$mesage[1]=="p"&&$mesage[2]=="l"){
            $sql = "INSERT INTO users (nume, prenume, facebook, departament, email, telefon , image) VALUES ('".htmlentities($data["nume"])."', '".htmlentities($data["prenume"])."', '".$data["facebook"]."', '".$data["departament"]."', '".$data["email"]."', '".$data["phone"]."', '".$mesage."')";
            if ($conn->query($sql) === TRUE) {
                return "New record created successfully";
            } else {
                return  $conn->error;
            }
        }
        else return $mesage;
    }
    else return "ceva";
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function uploadFile(){
    $target_dir = "upload/";
    $uploadOk = 1;
    $target = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target,PATHINFO_EXTENSION);
    $target_file = $target_dir . generateRandomString(50). "." . $imageFileType ;
    if(isset($_POST["submit"])) {
        if($imageFileType=="png"||$imageFileType=="jpg"||$imageFileType=="jpeg"){
            if ($_FILES["fileToUpload"]["size"] > 8000000) {
                return "Imaginea este prea mare";
            }
            else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    return $target_file;
                }
                else {
                    return "A aparut o eroare la procesul de uplaod";
                }
            }
        }
        else return "Nu ai inserat o imagine.";
    }
}
function delete($id){
    include "config.php";
    $sql = "DELETE FROM asii_users WHERE $id";
    if ($conn->query($sql) === TRUE) {
        return "Record deleted successfully";
    } else {
        return  $conn->error;
    }
}

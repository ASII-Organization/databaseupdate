<?php
/**
 * Created by PhpStorm.
 * User: Boca
 * Date: 01.04.2016
 * Time: 13:15
 */
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
    if (checkForDuplicate($data['facebook']))
        if($data["nume"]!=""&&$data["prenume"]!=""&&$data["facebook"]!=""&&$data["departament"]!=""&&$data["email"]!=""&&$data["phone"]!="") {
            if(filter_var($data["facebook"],FILTER_VALIDATE_URL)===FALSE)
                return "Nu ai inserat un url de facebook valid.";
            if(!(strtolower($data["departament"])=="it"||strtolower($data["departament"])=="proiecte"||strtolower($data["departament"])=="pr&media"||strtolower($data["departament"])=="evaluari"||strtolower($data["departament"])=="ri"||strtolower($data["departament"])=="re"||strtolower($data["departament"])=="alumni")){
                return "Nu ai inserat un departament valid (Ex:\"it\", \"pr&media\",\"evaluari\",\"re\",\"ri\",\"proiecte\",\"alumni\")";
            }
            if(!filter_var($data["email"],FILTER_VALIDATE_EMAIL))
                return "Nu ai inserat un email valid.";
            if(strlen($data["phone"])<10)
                return "Nu ai inserat un numar de telefon valid.";
            $mesage=uploadFile();
            if($mesage[0]=="u" &&$mesage[1]=="p"&&$mesage[2]=="l"){
                include "config.php";
                $sql = "INSERT INTO users (nume, prenume, facebook, departament, email, telefon , image) VALUES ('".htmlentities($data["nume"])."', '".htmlentities($data["prenume"])."', '".$data["facebook"]."', '".strtolower($data["departament"])."', '".$data["email"]."', '".$data["phone"]."', '".$mesage."')";
                if ($conn->query($sql)) {
                    return "Inregistrarea a avut loc cu succes!";
                } else {
                    return $conn->error;
                }
            }
            else return $mesage;
        }
        else return false;
    else {
        if(filter_var($data["facebook"],FILTER_VALIDATE_URL)===FALSE)
            return "Nu ai inserat un url de facebook valid.";
        if(!(strtolower($data["departament"])=="it"||strtolower($data["departament"])=="proiecte"||strtolower($data["departament"])=="pr&media"||strtolower($data["departament"])=="evaluari"||strtolower($data["departament"])=="ri"||strtolower($data["departament"])=="re"||strtolower($data["departament"])=="alumni")){
            return "Nu ai inserat un departament valid (Ex:\"it\", \"pr&media\",\"evaluari\",\"re\",\"ri\",\"proiecte\")";
        }
        include "config.php";
        $sql = "SELECT * FROM users WHERE facebook='".$data['facebook']."'";
        $results = $conn->query($sql);
        $membru = $results->fetch_assoc();
        if (strpos($membru['departament'], strtolower($data['departament'])) !== false) {
            return "Esti deja inscris la acest departament!";
        }
        else {
            $sql = "UPDATE users SET departament='".$membru['departament'].strtolower($data['departament'])."' WHERE facebook='".$data['facebook']."'";
        }
        $conn->query($sql);
        return "Inregistrarea a avut loc cu succes!";
    }
}
function checkForDuplicate($facebook) {
    include "config.php";
    $sql="SELECT * FROM users WHERE facebook='".$facebook."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        return false;
    else
        return true;
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
        if($imageFileType=="png"||$imageFileType=="jpg"||$imageFileType=="jpeg"||$imageFileType=="bmp"){
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
function delete($ids){
    include "config.php";
    $sql = "SELECT * FROM users WHERE id=".$ids;
    $results = $conn->query($sql);
    $membru = $results->fetch_assoc();
    $departament = str_replace($_SESSION['logat'], '', $membru['departament']);
    if ($departament=="") {
        $sql = "DELETE FROM users WHERE id=".$ids;
        $conn->query($sql);
        unlink($membru['image']);
        header("Location: members.php");
    }
    else {
        $sql = "UPDATE users SET ".$_SESSION['logat']."=0, departament='".$departament."' WHERE id=".$ids;
        $conn->query($sql);
        header("Location: members.php");
    }
}
function admite($ids){
    include "config.php";
    $sql = "UPDATE users SET ".$_SESSION['logat']."=1 WHERE id=".$ids;
    $conn->query($sql) ;
    header("Location: members.php");

}
function getMembers(){
    require "config.php";
    $sql = "SELECT * FROM users WHERE departament LIKE '%".$_SESSION["logat"]."%' AND ".$_SESSION['logat']."=0";
    $result = $conn->query($sql);
    $membrii =array();
    while($row = $result->fetch_assoc()){
        array_push($membrii, $row);
    }
    return $membrii;
}
function showMembers(){
    require "config.php";
    $sql = "SELECT * FROM users WHERE departament LIKE '%".$_SESSION["logat"]."%' AND ".$_SESSION['logat']."=1";
    $result = $conn->query($sql);
    $membrii =array();
    while($row = $result->fetch_assoc()){
        array_push($membrii, $row);
    }
    return $membrii;
}

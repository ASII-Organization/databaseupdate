<?php
/**
 * Created by PhpStorm.
 * User: Boca
 * Date: 01.04.2016
 * Time: 13:15
 */
    include "config.php";
    session_start();
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

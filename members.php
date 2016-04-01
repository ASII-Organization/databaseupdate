<?php
/**
 * Created by PhpStorm.
 * User: Boca
 * Date: 31.03.2016
 * Time: 18:36
 */
    require "core/functions.php";
    checkIfNotLogin();
    logout();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selectare membrii</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<a href="http://www.asii.ro" class="backBotton">
    <b>Inapoi pe asii.ro</b>
</a>
<a href="/members.php?logout=1" class="logoutBotton">
    <b>Logout</b>
</a>
<div class="content">
    <header>
        <img id="logo" src="img/logoASII.png"/>
        <span><b><?php echo strtoupper($_SESSION["logat"]) ?></b></span>
    </header>
    <div class="items">
        <div class="item">
            <div class="first" > <a href="#">Popescu Ion</a></div>
            <div class="second">
                <a class="admis" type="submit" href="#">Admis</a> <br>
                <a class="respins" type="submit" href="#">Respins</a>
            </div>
            <div class="clearFloat"></div>
        </div>
        <div class="item">
            <div class="first" > <a href="#">Popescu Ion</a></div>
            <div class="second">
                <a class="admis" type="submit" href="#">Admis</a> <br>
                <a class="respins" type="submit" href="#">Respins</a>
            </div>
            <div class="clearFloat"></div>
        </div>
        <div class="item">
            <div class="first" > <a href="#">Popescu Ion</a></div>
            <div class="second">
                <a class="admis" type="submit" href="#">Admis</a> <br>
                <a class="respins" type="submit" href="#">Respins</a>
            </div>
            <div class="clearFloat"></div>
        </div>
        <div class="item">
            <div class="first" > <a href="#">Popescu Ion</a></div>
            <div class="second">
                <a class="admis" type="submit" href="#">Admis</a> <br>
                <a class="respins" type="submit" href="#">Respins</a>
            </div>
            <div class="clearFloat"></div>
        </div>
    </div>
</div>
<footer id="footer">
    Asociaţia Studenţilor Informaticieni Ieşeni (AŞII) este reprezentată de un grup de persoane determinate, creative şi dinamice, ce au în comun pasiunea pentru Informatică şi împărtăşesc un set de<br>
    ţeluri şi valori. Activităţile organizate în cadrul asociaţiei se adresează studenţilor şi profesorilor Facultăţii de Informatică Iaşi, dar şi comunităţii IT din România, dorind să promoveze proactivitatea,<br>
    dezvoltarea profesională, personală şi socială.<br>
    Copyright © ASII 2016
</footer>
</body>
</html>
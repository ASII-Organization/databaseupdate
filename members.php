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
if(isset($_GET["ad"]))
    admite($_GET["ad"]);
else if(isset($_GET["respinge"]))
    delete($_GET["respinge"]);
if (!isset($_GET['showAdmis']))
    $membrii=getMembers();
else $membrii=showMembers();
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
        <br />
        <?php if(!isset($_GET["showAdmis"])): ?>
        <a class="madmis" href="/members.php?showAdmis=1">Afiseaza membrii admisi</a>
        <?php else: ?>
        <a class="madmis" href="/members.php">Lista de inscrisi</a>
        <?php endif;?>
    </header>
    <div class="items">
        <?php
        foreach ($membrii as $membru):
        ?>
        <div class="item">
            <img class="photo" src="<?php echo $membru["image"]?>" />
            <div class="first" > <a target="_blank" href="<?php echo $membru["facebook"] ?>"><?php echo $membru["nume"]. " " . $membru['prenume']?></a></div>
            <div class="second">
                <?php if($membru[$_SESSION['logat']]==0): ?>
                <a class="admis" type="submit" href="/members.php?ad=<?php echo $membru["id"]?>" >Admis</a> <br>
                <?php endif; ?>
                <a class="respins" type="submit" href="/members.php?respinge=<?php echo $membru["id"]?>" >Respins</a>
            </div>
            <div class="clearFloat"></div>
        </div>
        <?php endforeach; ?>
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
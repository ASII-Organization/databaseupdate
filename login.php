<?php
    require "core/functions.php";
    checkLogin();
    $err = 0;
    if(isset($_POST["nume"]) && isset($_POST["parola"])){
        $users = array();
        $password = "";
        foreach ($users as $user){
            if($user == strtolower($_POST["nume"])){
                if($password ==$_POST["parola"]){
                    $_SESSION["logat"] = $user;
                    checkLogin();
                }
                else {
                    $err = 1;
                }
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<a href="http://www.asii.ro" class="backBotton">
    <b>Inapoi pe asii.ro</b>
</a>
<div class="content">
    <header>
        <img id="logo" src="img/logoASII.png"/>
        <span><b>Database Update</b></span>
    </header>
    <footer>
        <form class="submitForm" method="post" action="login.php" enctype="multipart/form-data">
            <br>
            <input type="text" name="nume" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name' "/><br>
            <input type="password" name="parola" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password' "/><br>
            <button id="button" type="submit">Login</button> <br>
            <div>
                <?php
                    if($err == 1 ) {
                        echo '<p id="error"> Userul si parola nu sunt valide. </p>';
                    }
                ?>
            </div>

        </form>
    </footer>
</div>
<footer id="footer">
    Asociaţia Studenţilor Informaticieni Ieşeni (AŞII) este reprezentată de un grup de persoane determinate, creative şi dinamice, ce au în comun pasiunea pentru Informatică şi împărtăşesc un set de<br>
    ţeluri şi valori. Activităţile organizate în cadrul asociaţiei se adresează studenţilor şi profesorilor Facultăţii de Informatică Iaşi, dar şi comunităţii IT din România, dorind să promoveze proactivitatea,<br>
    dezvoltarea profesională, personală şi socială.<br>
    Copyright © ASII 2016
</footer>
</body>
</html>
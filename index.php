<?php
require "core/functions.php";
$mesage = "0";
if(isset($_POST["submit"])) {
    if (isset($_POST["nume"]) && isset($_POST["prenume"]) && isset($_POST["facebook"]) && isset($_POST["email"]) && isset($_POST["departament"]) && isset($_POST["phone"])) {
        $data = array(
            "nume" => $_POST["nume"],
            "prenume" => $_POST["prenume"],
            "facebook" => $_POST["facebook"],
            "email" => $_POST["email"],
            "departament" => $_POST["departament"],
            "phone" => $_POST["phone"]
        );
        $mesage = insert($data);
        if ($mesage == false) {
            $mesage = "Nu ai introdus toate datele obligatorii";
        }
    }
    else $mesage = "Campurile obligatorii nu au fost completate!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscriere membrii ASII</title>
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
    <section>
        <form class="submitForm" method="post" action="index.php" enctype="multipart/form-data">
            <br>
            <input type="text" name="nume" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name' "/><br>
            <input type="text" name="prenume" placeholder="Prenume" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Prenume' "/><br>
            <input type="text" name="facebook" placeholder="Facebook url" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Facebook url' "/><br>
            <input type="text" name="departament" placeholder="Departament(IT, Proiecte, Pr&amp;Media, Evaluari, RI, RE, Alumni)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Departament(IT, Proiecte, Pr&amp;Media, Evaluari, RI, RE, Alumni)' "/><br>

            <input type="text" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email' "/><br>
            <input type="text" name="phone" placeholder="Numar telefon" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Numar telefon' "/><br>

            <p id="imageUpload">Selecteaza imagine de profil(imaginea trebuie sa fie tip buletin):</p>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <button id="button" type="submit" name="submit" value="1">Trimite</button>
            <br>
        </form>
        <?php
        if($mesage != "0")
            if($mesage == "Datele tale au fost inscrise cu succes!")
                echo  '<p id="succes">Informatiile furnizate de tine au fost trimise cu success! <br>Multumim pentru timpul acordat!</p>';
            else echo '<p id="error"> '. $mesage.' <br> Pentru mai multe detalii te rog sa contactezi coordonatorul de departament din care faci parte. </p>';
        ?>
        <br>
    </section>
</div>
<footer id="footer">
    Asociaţia Studenţilor Informaticieni Ieşeni (AŞII) este reprezentată de un grup de persoane determinate, creative şi dinamice, ce au în comun pasiunea pentru Informatică şi împărtăşesc un set de<br>
    ţeluri şi valori. Activităţile organizate în cadrul asociaţiei se adresează studenţilor şi profesorilor Facultăţii de Informatică Iaşi, dar şi comunităţii IT din România, dorind să promoveze proactivitatea,<br>
    dezvoltarea profesională, personală şi socială.<br>
    Copyright © ASII 2016
</footer>
</body>
</html>
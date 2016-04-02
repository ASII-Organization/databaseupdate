<?php
/**
 * Created by PhpStorm.
 * User: Boca
 * Date: 30.03.2016
 * Time: 19:45
 */
$servername = "";
$username = "";
$password = "";
$database = "";
$conn = new mysqli($servername, $username, $password, $database);
if (!$conn) {
    die('Eșec la conectare: ' . mysql_error());
}

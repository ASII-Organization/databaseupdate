<?php
/**
 * Created by PhpStorm.
 * User: Boca
 * Date: 30.03.2016
 * Time: 19:45
 */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "asii_users";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
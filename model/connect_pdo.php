<?php

$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=fusion_food", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


// function connect_pdo() {
//     $servername = "localhost";
//     $username = "username";
//     $password = "password";
//     $dbname = "fusion_food  ";

//     try {
//         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         return $conn;
//     } catch(PDOException $e) {
//         echo "Connection failed: " . $e->getMessage();
//         return null;
//     }
// }

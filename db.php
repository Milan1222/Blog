<?php

$servername = "127.0.0.1";//ip adresa servera
$username = "root";
$password = "vivify";
$dbname = "blog";//ime baze iz sqlectrona

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // PDO
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e)
{
    echo $e->getMessage();
}

?>
<?php
    $servername = "mysql-gestionclientel.alwaysdata.net";
    $username = "369533_clientel";
    $password = "passer123";
    $dbname = "gestionclientel_examen";
    try {
        $connect = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password,
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            )
        );
    } catch (PDOException $e) {
        die("Une erreur est survenue lors de la connexion à la Base de données 1 !");
    } 
?>
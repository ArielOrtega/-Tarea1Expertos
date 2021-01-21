<?php

function createDatabase()
{
    $servername = "163.178.107.2";
    $username = "labsturrialba";
    $password = "Saucr.2191";
    $db = "if7103_2021_tarea1_b75567";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Hubo un error al conectarse con la base de datos.\nMensaje: " . $e->getMessage();
    }
}

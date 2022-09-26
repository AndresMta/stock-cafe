<?php


function conectarDB() {
    $db = mysqli_connect('', '', '', '');

    if(!$db) {
        echo 'Error en la base de datos';
        exit;
    } 

    return $db;
}
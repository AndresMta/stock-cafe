<?php 
require_once "../auxiliares/navbar.php";
require_once "../lib/database.php"; 
require_once "../lib/funciones.php";

$db = conectarDB(); 
$resultClientes = mysqli_query($db, "SELECT * FROM clientes WHERE cliente_borrado = 'N'");
$clientes = mysqli_fetch_all($resultClientes);    

require_once "./clientes.html"
?>
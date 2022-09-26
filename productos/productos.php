<?php 
require_once "../auxiliares/navbar.php";
require_once "../lib/database.php"; 
require_once "../lib/funciones.php";

$db = conectarDB(); 
$resultProductos = mysqli_query($db, "SELECT * FROM productos");
$productos = mysqli_fetch_all($resultProductos);    

require_once "./productos.html"
?>
<?php 
require_once "../auxiliares/navbar.php";
require_once "../lib/database.php"; 
require_once "../lib/funciones.php";

$db = conectarDB(); 
$resultProductos = mysqli_query($db, "SELECT * FROM productos WHERE producto_stock > 0");
$productos = mysqli_fetch_all($resultProductos);

$selectProductos = '';
foreach ($productos as $producto) {
    $selectProductos .= "<option value='$producto[0]' data-precio='$producto[2]'>$producto[1] ($$producto[2])</option>";
}

$resultClientes = mysqli_query($db, "SELECT * FROM clientes");
$clientes = mysqli_fetch_all($resultClientes);

$selectClientes = '';
foreach ($clientes as $cliente) {
    $selectClientes .= "<option value='$cliente[0]'>$cliente[1] $cliente[2]</option>"; 
}

require_once "./nuevoPedido.html";
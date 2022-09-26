<?php 
require_once '../lib/database.php';

$db = conectarDB();

if($_POST['type'] == 'add') {
    $nombre   = mysqli_real_escape_string($db, $_POST['producto_nombre']);
    $precio   = mysqli_real_escape_string($db, $_POST['producto_precio']);
    $stock    = mysqli_real_escape_string($db, $_POST['producto_stock']);

    $query = "INSERT INTO
                productos
            SET
                producto_nombre = '$nombre',
                producto_precio = '$precio',
                producto_stock  = '$stock'";

    if(mysqli_query($db, $query)) {
        header('Location: /stock-cafe/productos/productos.php?ok=true');
    } else {
        header('Location: /stock-cafe/productos/productos.php?ok=false');
    }
}

if($_POST['type'] == 'edit') {
    $nombre   = mysqli_real_escape_string($db, $_POST['producto_nombre']);
    $precio   = mysqli_real_escape_string($db, $_POST['producto_precio']);
    $stock    = mysqli_real_escape_string($db, $_POST['producto_stock']);
    $id       = mysqli_real_escape_string($db, $_POST['producto_id']);

    $query = "UPDATE
                productos
            SET
                producto_nombre = '$nombre',
                producto_precio = '$precio',
                producto_stock  = '$stock'
            WHERE
                producto_id = '$id'";

    if(mysqli_query($db, $query)) {
        header('Location: /stock-cafe/productos/productos.php?ok=true');
    } else {
        header('Location: /stock-cafe/productos/productos.php?ok=false');
    }
}

if($_POST['type'] == 'delete') {
    $id       = mysqli_real_escape_string($db, $_POST['producto_id']);

    $query = "DELETE FROM
                productos
            WHERE
                producto_id = '$id'";

    if(mysqli_query($db, $query)) {
        header('Location: /stock-cafe/productos/productos.php?ok=true');
    } else {
        header('Location: /stock-cafe/productos/productos.php?ok=false');
    }
}
<?php 
require_once '../lib/database.php';

$db = conectarDB();

if($_POST['type'] == 'add') {
    $nombre   = mysqli_real_escape_string($db, $_POST['cliente_nombre']);
    $apellido = mysqli_real_escape_string($db, $_POST['cliente_apellido']);
    $dni      = mysqli_real_escape_string($db, $_POST['cliente_dni']);

    $query = "INSERT INTO
                clientes
            SET
                cliente_nombre   = '$nombre',
                cliente_apellido = '$apellido',
                cliente_dni      = '$dni'";

    if(mysqli_query($db, $query)) {
        header('Location: /stock-cafe/clientes/clientes.php?ok=true');
    } else {
        header('Location: /stock-cafe/clientes/clientes.php?ok=false');
    }
}

if($_POST['type'] == 'edit') {
    $nombre   = mysqli_real_escape_string($db, $_POST['cliente_nombre']);
    $apellido = mysqli_real_escape_string($db, $_POST['cliente_apellido']);
    $dni      = mysqli_real_escape_string($db, $_POST['cliente_dni']);
    $id       = mysqli_real_escape_string($db, $_POST['cliente_id']);

    $query = "UPDATE
                clientes
            SET
                cliente_nombre   = '$nombre',
                cliente_apellido = '$apellido',
                cliente_dni      = '$dni'
            WHERE
                cliente_id = '$id'";

    if(mysqli_query($db, $query)) {
        header('Location: /stock-cafe/clientes/clientes.php?ok=true');
    } else {
        header('Location: /stock-cafe/clientes/clientes.php?ok=false');
    }
}


if($_POST['type'] == 'delete') {
    $id = mysqli_real_escape_string($db, $_POST['cliente_id']);

    $query = "UPDATE
                clientes
            SET 
                cliente_borrado = 'Y'
            WHERE
                cliente_id = '$id'";

    if(mysqli_query($db, $query)) {
        header('Location: /stock-cafe/clientes/clientes.php?ok=true');
    } else {
        header('Location: /stock-cafe/clientes/clientes.php?ok=false');
    }
}
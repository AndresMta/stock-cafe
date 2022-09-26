<?php
require_once '../lib/database.php';

try {
    $db = conectarDB();

    $cliente = mysqli_real_escape_string($db, $_POST['datosPedido']['cliente']);

    foreach ($_POST['datosPedido']['productos'] as $producto) {
        $idProd = $producto['productoId'];
        $cant = $producto['cantidad'];
        
        $query = "SELECT
                    producto_nombre,
                    producto_stock
                FROM
                    productos
                WHERE
                    producto_id = '$idProd'";
        
        $resultProducto = mysqli_query($db, $query);
        $producto = mysqli_fetch_all($resultProducto, MYSQLI_ASSOC)[0]; 

        $nuevoStock = $producto['producto_stock'] - $cant;

        if($nuevoStock < 0) {
            echo json_encode([
                'ok'  => false,
                'msg' => "No hay suficiente stock de " . $producto['producto_nombre']
            ]);
            return;
        }
    }

    $totalPedido = 0;
    foreach ($_POST['datosPedido']['productos'] as $producto) {
        $totalPedido += $producto['precio'] * $producto['cantidad']; 
    }

    $query = "INSERT INTO
                pedido
            SET
            pedido_valor   = $totalPedido,
            pedido_fecha   = CURDATE(),
            pedido_cliente = '$cliente'";

    mysqli_query($db, $query);

    $idPedido = mysqli_insert_id($db);

    foreach ($_POST['datosPedido']['productos'] as $producto) {

        $idProd = $producto['productoId'];
        $cant = $producto['cantidad'];

        $query = "INSERT INTO
                    pedidos_productos
                SET
                    pedido_producto_pedido   = '$idPedido',
                    pedido_producto_producto = '$idProd',
                    pedido_producto_cantidad = '$cant'";

        mysqli_query($db, $query);


        $query = "SELECT
                    producto_stock
                FROM
                    productos
                WHERE
                    producto_id = '$idProd'";
        
        $resultProducto = mysqli_query($db, $query);
        $producto = mysqli_fetch_all($resultProducto, MYSQLI_ASSOC)[0]; 

        $nuevoStock = $producto['producto_stock'] - $cant;

        $query = "UPDATE
                    productos
                SET
                    producto_stock = '$nuevoStock'
                WHERE
                    producto_id = '$idProd'";

        mysqli_query($db, $query);
    }

    echo json_encode([
        'ok' => true,
        'id' => $idPedido
    ]);

} catch (\Throwable $th) {
    echo json_encode([
        'ok'  => false,
        'msg' => "Algo salió mal"
    ]);
}

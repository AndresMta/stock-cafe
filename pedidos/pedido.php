<?php 
require_once "../auxiliares/navbar.php";
require_once "../lib/database.php"; 
require_once "../lib/funciones.php";


$db = conectarDB(); 

$pedidoId = mysqli_real_escape_string($db, $_GET['id']);

$query = "SELECT 
            pedido_valor,
            pedido_fecha,
            CONCAT(cliente_nombre, ' ', cliente_apellido) as cliente
        FROM 
            pedido
            LEFT JOIN clientes ON pedido_cliente = cliente_id 
        WHERE pedido_id = '$pedidoId'";

$resultPedido = mysqli_query($db, $query);
$pedido = mysqli_fetch_all($resultPedido, MYSQLI_ASSOC)[0];  


$query = "SELECT 
            pedido_producto_cantidad,
            producto_precio,
            producto_nombre
        FROM 
            pedidos_productos 
            LEFT JOIN productos ON pedido_producto_producto = producto_id
        WHERE 
            pedido_producto_pedido = '$pedidoId'";

$productosPedido = mysqli_query($db, $query);
$productos = mysqli_fetch_all($productosPedido, MYSQLI_ASSOC);  

require_once "./pedido.html"
?>
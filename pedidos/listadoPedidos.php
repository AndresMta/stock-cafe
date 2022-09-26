<?php 
require_once "../auxiliares/navbar.php";
require_once "../lib/database.php"; 
require_once "../lib/funciones.php";

$db = conectarDB(); 

$query = "SELECT
            pedido_id,
            pedido_valor,
            pedido_fecha,
            CONCAT(cliente_nombre, ' ', cliente_apellido) AS cliente
        FROM
            pedido LEFT JOIN clientes ON cliente_id = pedido_cliente
        ORDER BY
            pedido_fecha DESC";

$resultPedidos = mysqli_query($db, $query);
$pedidos = mysqli_fetch_all($resultPedidos, MYSQLI_ASSOC);

require_once "./listadoPedidos.html";
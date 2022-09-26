<?php
require_once "../lib/database.php";


function armarModalEditCliente($idCliente) {
    $db = conectarDB();

    $query = "SELECT 
                *
            FROM
                clientes
            WHERE
                cliente_id = '$idCliente'";

    $resultCliente = mysqli_query($db, $query);
    $cliente = mysqli_fetch_all($resultCliente); 
    

    echo '<div class="modal fade" id="staticBackdropEditProd-' . $idCliente . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header py-2">
                            <h5 class="modal-title" id="staticBackdropLabel">Editar Cliente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">                            
                            <div class="form-floating mb-3">
                                <input form="cliente-editar'.$idCliente.'" type="text" class="form-control" name="cliente_nombre" id="cliente_nombre_edit" placeholder="Nombre" value="'.$cliente['0']['1'].'" required>
                                <label for="cliente_nombre_edit">Nombre:</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input form="cliente-editar'.$idCliente.'" type="text" class="form-control" name="cliente_apellido" id="cliente_apellido_edit" placeholder="Apellido" value="'.$cliente['0']['2'].'" required>
                                <label for="cliente_apellido_edit">Apellido:</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input form="cliente-editar'.$idCliente.'" type="text" class="form-control" name="cliente_dni" id="cliente_dni_edit" placeholder="Dni" value="'.$cliente['0']['3'].'" required>
                                <label for="cliente_dni_edit">Dni:</label>
                            </div>

                            <button type="submit" form="cliente-editar'.$idCliente.'" type="submit" id="submitEditCli" class="btn btn-primary w-100">
                                Editar
                            </button>
                            <button class="btn btn-primary w-100 d-none" style="height: 38px;" id="loadingEditCli" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </button>
                        </div>

                        <input form="cliente-editar'.$idCliente.'" type="text" name="type" value="edit" hidden>
                        <input form="cliente-editar'.$idCliente.'" type="text" name="cliente_id" value="'.$idCliente.'" hidden>
                        <form id="cliente-editar'.$idCliente.'" action="./modelCliente.php" method="POST" onsubmit="loadingSubmit("submitEditCli", "loadingEditCli");"></form>
                    </div>
                </div>
            </div>';
}

function armarModalEditProducto($idProducto) {
    $db = conectarDB();

    $query = "SELECT 
                *
            FROM
                productos
            WHERE
                producto_id = '$idProducto'";

    $resultProducto = mysqli_query($db, $query);
    $producto = mysqli_fetch_all($resultProducto); 

    echo '<div class="modal fade" id="staticBackdropEditProd-' . $idProducto . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header py-2">
                            <h5 class="modal-title" id="staticBackdropLabel">Editar Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">                            
                            <div class="form-floating mb-3">
                                <input form="producto-editar'.$idProducto.'" type="text" class="form-control" name="producto_nombre" id="producto_nombre_edit" placeholder="Nombre" value="'.$producto['0']['1'].'" required>
                                <label for="producto_nombre_edit">Nombre:</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input form="producto-editar'.$idProducto.'" type="number" min="0" step="0.1" class="form-control" name="producto_precio" id="producto_precio_edit" placeholder="Apellido" value="'.$producto['0']['2'].'" required>
                                <label for="producto_precio_edit">Precio:</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input form="producto-editar'.$idProducto.'" type="number" min="0" class="form-control" name="producto_stock" id="producto_stock_edit" placeholder="Dni" value="'.$producto['0']['3'].'" required>
                                <label for="producto_stock_edit">Stock:</label>
                            </div>

                            <button type="submit" form="producto-editar'.$idProducto.'" type="submit" id="submitEditProd" class="btn btn-primary w-100">
                                Editar
                            </button>
                            <button class="btn btn-primary w-100 d-none" style="height: 38px;" id="loadingEditProd" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </button>
                        </div>

                        <input form="producto-editar'.$idProducto.'" type="text" name="type" value="edit" hidden>
                        <input form="producto-editar'.$idProducto.'" type="text" name="producto_id" value="'.$idProducto.'" hidden>
                        <form id="producto-editar'.$idProducto.'" action="./modelProductos.php" method="POST" onsubmit="loadingSubmit("submitEditProd", "loadingEditProd");"></form>
                    </div>
                </div>
            </div>';
}
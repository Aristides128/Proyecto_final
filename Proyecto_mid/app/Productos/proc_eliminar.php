<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>

<?php

require_once '../../config/server_connection.php';
$id_producto = $_REQUEST['id'];
$conexion = new ServerConnection();

$conexion->query = "DELETE FROM tbl_productos WHERE id_producto = '{$id_producto}'";

$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Producto eliminado',
text: 'El producto ha sido eliminado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";

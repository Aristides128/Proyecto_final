<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>
<?php
require_once '../../config/server_connection.php';

$id_proveedor = @$_REQUEST['id'];

$conexion = new ServerConnection();

$conexion->query = "DELETE  FROM tbl_proveedores WHERE id_proveedor = '{$id_proveedor}' ";

$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Proveedor eliminado',
text: 'El proveedor ha sido eliminado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";

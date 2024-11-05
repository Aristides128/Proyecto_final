<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>
<?php

require_once '../../config/server_connection.php';

date_default_timezone_set("America/El_Salvador");
$fecha_registro = date("Y-m-d");

$id_cliente = @$_REQUEST['id_cliente'];


if ($id_cliente == ' ') {
  echo "<script>
  Swal.fire({
  title: 'Error al eliminar',
  text: 'No se encontro el cliente',
  icon: 'error',
  confirmButtonText: 'Aceptar',
  }).then(() => {
  window.location.href = 'form_listar.php';
  });
  </script>
  ";
  exit();
}

$conexion = new ServerConnection();

$conexion->query = "DELETE tbl_clientes WHERE id_cliente = '{$id_cliente}';
";

$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Cliente eliminado',
text: 'El cliente ha sido eliminado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";


?>
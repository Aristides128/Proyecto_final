<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>

</body>

<?php
require_once '../../config/server_connection.php';


$id_servicio = @$_REQUEST['id_servicio'];


if ($id_servicio == ' ') {
  echo "<script>
  Swal.fire({
  title: 'Error al Eliminar',
  text: 'No se encontro el producto',
  icon: 'error',
  confirmButtonText: 'Aceptar',
  timer: 3000
  }).then(() => {
  window.location.href = 'form_listar.php';
  });
  </script>
  ";
  exit();
}

$conexion = new ServerConnection();
$conexion->query = "DELETE FROM tbl_servicios  WHERE id_servicio = '{$id_servicio}'";

$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Servicio eliminado',
text: 'El servicio ha sido eliminado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";

?>
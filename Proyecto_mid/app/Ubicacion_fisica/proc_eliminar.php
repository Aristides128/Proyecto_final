<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>

<?php
require_once '../../config/server_connection.php';

$id = @$_REQUEST['id'];

if ($id == ' ') {
  echo "<script>
  Swal.fire({
  title: 'Error al eliminar',
  text: 'No se ha seleccionado una Ubicacion',
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
$conexion->query = "DELETE FROM tbl_ubicaciones_fisicas WHERE id_ubicacion_fisica = '{$id}'";

$conexion->execute_query();

echo "<script>
    Swal.fire({
    title: 'Ubicacion eliminada',
    text: 'La Ubicacion fisica ha sido eliminado con éxito',
    icon: 'success',
    confirmButtonText: 'Aceptar',
    timer: 3000
    }).then(() => {
    window.location.href = 'form_listar.php';
    });
</script>";

?>
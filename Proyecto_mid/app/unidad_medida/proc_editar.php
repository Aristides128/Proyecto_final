<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>

<?php
require_once '../../config/server_connection.php';

$id = @$_REQUEST['id_unidad_medida'];
$nombre = @$_REQUEST['nombre'];

if ($id == ' ') {
  echo "<script>
  Swal.fire({
  title: 'Error al editar',
  text: 'El campo de editar unidad no puede ir vacio',
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
$conexion->query = ("UPDATE tbl_unidades_medida SET nombre = '{$nombre}' WHERE id_unidad_medida = '{$id}'");

$conexion->execute_query();

echo "<script>
    Swal.fire({
    title: 'Unidad Actualizada',
    text: 'La Unidad de medida ha sido editada con éxito',
    icon: 'success',
    confirmButtonText: 'Aceptar',
    timer: 3000
    }).then(() => {
    window.location.href = 'form_listar.php';
    });
</script>";

?>
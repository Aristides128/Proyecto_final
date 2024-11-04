<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>

<?php
require_once '../../config/server_connection.php';

$id = @$_REQUEST['id_marca'];
$nombre = @$_REQUEST['nombre'];

if ($id == ' ') {
  echo "<script>
  Swal.fire({
  title: 'Error al editar',
  text: 'El campo de editar categoria no puede ir vacio',
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
$conexion->query = ("UPDATE tbl_marcas SET nombre = '{$nombre}' WHERE id_marca = '{$id}'");

$conexion->execute_query();

echo "<script>
    Swal.fire({
    title: 'Marca Actualizada',
    text: 'La Marca ha sido editada con éxito',
    icon: 'success',
    confirmButtonText: 'Aceptar',
    timer: 3000
    }).then(() => {
    window.location.href = 'form_listar.php';
    });
</script>";

?>
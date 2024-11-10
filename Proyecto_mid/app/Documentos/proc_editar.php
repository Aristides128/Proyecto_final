<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>

<?php
require_once '../../config/server_connection.php';

$id = @$_REQUEST['id_documento_fiscal'];
$nombre = @$_REQUEST['nombre'];

if ($id == ' ') {
  echo "<script>
  Swal.fire({
  title: 'Error al editar',
  text: 'El campo de editar documento no puede ir vacio',
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
$conexion->query = ("UPDATE tbl_documentos_fiscales SET nombre = '{$nombre}' WHERE id_documento_fiscal = '{$id}'");

$conexion->execute_query();

echo "<script>
    Swal.fire({
    title: 'Documento Actualizado',
    text: 'El Documento ha sido editado con éxito',
    icon: 'success',
    confirmButtonText: 'Aceptar',
    timer: 3000
    }).then(() => {
    window.location.href = 'form_listar.php';
    });
</script>";

?>
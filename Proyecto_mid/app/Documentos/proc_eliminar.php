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
  text: 'No se ha seleccionado un Documento',
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
$conexion->query = "DELETE FROM tbl_documentos_fiscales WHERE id_documento_fiscal = '{$id}'";

$conexion->execute_query();

echo "<script>
    Swal.fire({
    title: 'Documento eliminado',
    text: 'El Documento ha sido eliminado con éxito',
    icon: 'success',
    confirmButtonText: 'Aceptar',
    timer: 3000
    }).then(() => {
    window.location.href = 'form_listar.php';
    });
</script>";

?>